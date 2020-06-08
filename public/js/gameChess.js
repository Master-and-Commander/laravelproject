// if a piece is clicked
// set pieceX and piece Y and actionbegun to true
// if a square is clicked and actionbegun is true and piece can move there
// move the piece

// only pieceX and pieceY need to be supplied to method

let actionBegun = false;
let pieceClicked = "";
let pieceX = 0;
let pieceY = 0;
let nextX = 0;
let nextY = 0;
let playercolor = "white";
let enemycolor = "black";
let columns = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h']; // x
let rows = [8, 7, 6, 5, 4, 3, 2, 1];
let pawnIdentities = [1,1,1,1,1,1,1,1];
let hasKingMoved = false;
let check = false;


let positions = {
 "white-pawn" : [[0,6], [1,6], [2,6], [3,6], [4,6], [5,6], [6,6], [7,6]],
 "white-king" : [[4,7]],
 "white-knight" : [[1,7],[6,7]],
 "white-bishop" : [[2,7], [5, 7]],
 "white-rook" : [[0,7], [7, 7]],
 "white-queen" : [[3,7]],
 "black-pawn" : [[0,1], [1,1], [2,1], [3,1], [4,1], [5,1], [6,1], [7,1]],
 "black-king" : [[4,0]],
 "black-knight" : [[1,0],[6,0]],
 "black-bishop" : [[2,0], [5, 0]],
 "black-rook" : [[0,0], [7, 0]],
 "black-queen" : [[3,0]],
}
let newShadow = positions;
// index 0 is type where 0 = range, 1 = square, 2 = special. indices 1 and 2 are x and y, 
let scopes = 
{
  "pawn" : [[2,0,-1],[2,0,-2], [2,-1,-1 ], [2,1,-1]],
  "king" : [[1,1,1],[1,1,0],[1,1,-1],[1,0,1],[1,0,-1],[1,-1,1],[1,-1,0],[1,-1,-1], [2,-2,0], [2,2,0]],
  "knight" : [[1,2,1], [1,-2,-1], [1,-2,1], [1,2,-1], [1,1,2], [1,-1,-2], [1,-1,2], [1,1,-2]],
  "bishop" :[[0,1,1],[0,-1,-1],[0,-1,1],[0,1,-1]],
  "rook" : [[0,1,0],[0,-1,0],[0,0,1],[0,0,-1]],
  "queen" : [[0,1,1],[0,-1,-1],[0,-1,1],[0,1,-1], [0,1,0],[0,-1,0],[0,0,1],[0,0,-1]]
}


let coordinatePieces =  [];
let toMoveX = "";
let toMoveY = "";
let options = [];


$('.hidden-square').on("drop click", function(e) {
  e.preventDefault();
  if(actionBegun) {
    $('.square').remove();
  $('.square-attack').remove();
  let square = $(this).attr("class").match(/[a-h][1-8]/g);
  let recentlyClickedPiece  = getPieceFromSquare(pieceX, pieceY) + "";
  let options = returnOptions(playercolor, enemycolor, recentlyClickedPiece.substring(recentlyClickedPiece.indexOf('-') + 1), pieceX, pieceY, "first");
  
  
  if(options.indexOf(square + "") != -1) {
    if(recentlyClickedPiece.includes("pawn")) {
      pawnIdentities[returnPawnIdentity(pieceX, pieceY)] = 0;
    }
    if(recentlyClickedPiece.includes("king")) {
      hasKingMoved = true;
    }
    // moved the touched piece
    $(".piece."+square).remove();
    $('.chess-game-container').find("." + recentlyClickedPiece + ".piece."+columns[pieceX] + rows[pieceY]).removeClass(lastClicked).addClass(square);
    $('.square').remove();
    $('.square-attack').remove();
    actionBegun = false;
    
  }
  }
  
});

$(".piece").on("click drag drop", function(e) {
  
  // only recognize pieces from own side
  let processString = $(this).attr("class");
  let recentlyClickedPiece = "";
  if (processString.includes(playercolor)) {
    actionBegun = true;
    $('.square').remove();
    $('.square-attack').remove();
    e.preventDefault();

    lastClicked = processString.match(/[a-h][0-9]/g) + "";
    stringtosplit = lastClicked.split('');
    pieceX = columns.indexOf(stringtosplit[0]);
    pieceY = rows.indexOf(parseInt(stringtosplit[1]));
    recentlyClickedPiece = getPieceFromSquare(pieceX, pieceY) + "";
    console.log(recentlyClickedPiece.substring(recentlyClickedPiece.indexOf('-') + 1));
    options = returnOptions(playercolor, enemycolor, recentlyClickedPiece.substring(recentlyClickedPiece.indexOf('-') + 1), pieceX, pieceY, "first");
        for(x in options) {
          $('.chess-game-container').append("<div class='square " + options[x] + "'></div>");
        } 

  }

  else if(processString.includes(enemycolor) && actionBegun) {
    recentlyClickedPiece = getPieceFromSquare(pieceX, pieceY) + "";
    if(recentlyClickedPiece.includes("pawn")) {
      pawnIdentities[returnPawnIdentity(pieceX, pieceY)] = 0;
    }
    if(recentlyClickedPiece.includes("king")) {
      hasKingMoved = true;
    }
    let square = $(this).attr("class").match(/[a-h][1-8]/g) + "";
    let splitSquare = square.split('');
    let x = columns.indexOf(splitSquare[0]);
    let y = rows.indexOf(parseInt(splitSquare[1]));
    if (options.indexOf(square + "") != -1) {
       // get rid of any pieces that might be there
    $(".piece."+square).remove();
    // moved the touched piece
    $('.chess-game-container').find("." + recentlyClickedPiece + ".piece."+columns[pieceX] + rows[pieceY]).removeClass(lastClicked).addClass(square);
    $('.square').remove();
    $('.square-attack').remove();

     updateShadow(recentlyClickedPiece, pieceX, pieceY, x, y);
    }
          
  }

  
  
});

// make sure there is a current version of the position
function updateShadow(piece, bx, by, ex, ey) {
  //first check if there are any existing pieces on ex and ey and set their values to 0;
  for(var key in positions) {
    var value = positions[key];
    for (var k = 0; k < value.length; k++) {
      if(value[k][0] == ex && value[k][1] == ey) {
        // this piece is the destroyed one
        console.log(key + " has been destroyed ");
        value[k][0] = 100;
        value[k][1] = 100;
      }
    }
  }
  
  for(var i = 0; i < positions[piece]; i++) {
    if(positions[piece][i][0] == bx && positions[piece][i][1] == by) {
      positions[piece][i][0] = ex;
      positions[piece][i][1] = ey;
    }
  }

}

$("html").on("dragover", function(event) {
    event.preventDefault();  
    event.stopPropagation();
    $(this).addClass('dragging');
});

function getPieceFromSquare(x,y) {
  let classes = $('.chess-game-container').find(".piece." + columns[x] + rows[y]).attr("class");
  let matching = classes.match(/(white|black)-[a-z]+/g);
  return matching;
}


function returnOptions(pColor, eColor, piece, x, y, tag) {
  

  options = [];
  let pieceScope = scopes[piece];
  let response = "";
  for(var i = 0; i < pieceScope.length; i++) {
    if(pieceScope[i][0] == 0) {
      // go through range
      for (var j = 1; j < 8 ; j++) {
        response = canMoveToSquare(piece, pColor, eColor, x+j*pieceScope[i][1], y+j*pieceScope[i][2], tag);
        if(response == 1) 
        {options.push(columns[x+j*pieceScope[i][1]] + rows[y+j*pieceScope[i][2]]);}
        else 
        {break;}
      }
    }
    else if(pieceScope[i][0] == 1) {
      response = canMoveToSquare(piece, pColor, eColor,x+pieceScope[i][1], y+pieceScope[i][2], tag);
      if(response == 1) {
        options.push(columns[x+pieceScope[i][1]] + rows[y+pieceScope[i][2]]);
      }
      // go through 1 square
    }
    else if(pieceScope[i][0] == 2) {
        if(specialOptionisPossible(pColor, eColor, piece, pieceScope[i][1], pieceScope[i][2])) {
          options.push(columns[x+pieceScope[i][1]] + rows[y+pieceScope[i][2]]);
        }
    }
  }
  return options;
}

function specialOptionisPossible(pColor, eColor, piece, x, y) {
   switch(piece) {
     case(pawn) :
       return pawnHandler(pColor, eColor, x, y);
     break;
     case(king) :
       if(!hasKingMoved && !check) {
         return true;
       }
       return kingHandler(x, y);
     break;
   }
   return false;
}

function pawnHandler() {
  return false;
}



function checkKingSafety(pColor, eColor, pieceToMove, startingX, startingY, x, y) {
  // iterate through all possible enemy movements
  newShadow = positions;
  // update shadow
  for(var key in newShadow) {
    var value = newShadow[key];
    if (value == pieceToMove) {

      // this is the piece that is going to move
      for (var k = 0; k < value.length; k++) {
        if(value[k][0] == startingX && value[k][1] == startingY) {
          // this piece is the exact one that is going to move
          value[k][0] = x;
          value[k][1] = y;
          
        }
      }
    }
    
  }
  let enemies = [];
  let stringToTest = "";
  let safe  = true;
  let kingClass = $('.chess-game-container').find(".piece."+pColor+"-king").attr("class") + "";

  $('.chess-game-container').children('.piece').each(function (item, index) {
    stringToTest = $(this).attr("class") + "";
    if (stringToTest.includes(eColor)) {
      var piece = stringToTest.match(/(white|black)-[a-z]+/g) + "";
      piece = piece.substring(piece.indexOf('-')+1);
      var square = stringToTest.match(/[a-h][1-8]/g) + "";
      splitSquare = square.split('');
      var possiblex = columns.indexOf(splitSquare[0]);
      var possibley = rows.indexOf(parseInt(splitSquare[1]));
      enemies.push({"piece": piece, "x" : possiblex , "y" : possibley});
      
    }
  }); 
  
  let index = 0;
  while(safe) {
    console.log("returning options for " + enemies[index]["piece"] +  " "  + enemies[index]["x"]);
    enemyOptions = returnOptions(eColor, pColor, enemies[index]["piece"], enemies[index]["x"], enemies[index]["y"], "options")
    if(enemyOptions.indexOf(columns[x]+rows[y]) != -1) {
      console.log("king is not safe");
      safe = false;
      break;
    }
    index++;
  }
  
  if(safe) {
    console.log("king is safe");
  }
  
  // to evaluate if king is safe check if any enemy pieces can attack
  return safe;
  
}

function canMoveToSquare(piece, pColor, eColor, x, y, tag) {
  let checkForSafety = true;
  if(tag != "options") {
    checkForSafety = checkKingSafety(pColor, eColor, piece, x, y);
  }
  
  // 1 is yes, 2 is no, 3 is attackable piece
  let response = 1;
  // check bounds
  if (x < 0 || x > 7 || y < 0 || y > 7) {
    response = 2;
    return response;
  }
  // check if attackable piece
  let classes = "";
  if(tag == "options") {
    for(var key in newShadow) {
      var value = newShadow[key];
      for (var k = 0; k < value.length; k++) {
        if(value[k][0] == x && value[k][1] == y) {
          // this piece is the destroyed one
          console.log(key + " can be attacked ");
          if (key.includes(pColor)) {
            return false;
          }
          else {
            return true;
          }
        }
      }
    }
  }
  else {
   classes = $('.chess-game-container').find(".piece." + columns[x] + rows[y]).attr("class") + "";
  }
  
  if (classes.includes(eColor)) {
    $('.chess-game-container').append("<div class='square-attack " + columns[x] + rows[y] + "'></div>");    
    return response;
  }
  // check if piece is player's own
  else if (classes.includes(pColor)) {
    response = 2;
    return response;
  }
  return response;
}


function returnPawnIdentity(x, y) {
  let identity = 100;
  console.log("finding " + columns[x] + rows[y]);
  let classes = $('.chess-game-container').find(".piece." + columns[x] + rows[y]).attr("class") + "";
  let identityRegex = new RegExp(playercolor + "-[0-9]", "i");
  let index = classes.search(identityRegex);
  if(index != -1) {
    console.log("identity is " + classes.charAt(index + playercolor.length + 1));
    identity = parseInt(classes.charAt(index + playercolor.length + 1));
  }
  console.log("returning this identity " + identity);
  return identity;
}



$("html").on("dragleave", function(event) {
    event.preventDefault();  
    event.stopPropagation();
    $(this).removeClass('dragging');
});




