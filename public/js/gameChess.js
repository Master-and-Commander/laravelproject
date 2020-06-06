
let beginningX = 0;
let beginningY = 0;
let actionBegun = false;
let pieceClicked = "";
let playercolor = "white";
let enemycolor = "black";
let columns = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h']; // x
let rows = [8, 7, 6, 5, 4, 3, 2, 1];
let pawnIdentities = [1,1,1,1,1,1,1,1];


let coordinatePieces =  [];
let toMoveX = "";
let toMoveY = "";
let options = [];

$(".piece").on("click drag", function(e) {
  $('.square').remove();
  $('.square-attack').remove();
  e.preventDefault();
  console.log("type " + e.type );

  processString = $(this).attr("class");
  processString = processString.split(" ");
  for (var i = 0; i < processString.length; i++) {
      if (processString[i].length == 2)  {
          lastClicked = processString[i];
      }
      else if (processString[i] != "piece") {
          pieceClicked = processString[i];
      }
  }

  if(e.type == "click") {
      coordinatePieces =  lastClicked.split('');
      toMoveX = columns.indexOf(coordinatePieces[0]);
      toMoveY = rows.indexOf(parseInt(coordinatePieces[1]));
      options = returnOptions(pieceClicked, toMoveX, toMoveY);

      for(x in options) {
        $('.chess-game-container').append("<div class='square " + options[x] + "'></div>");
      }
      //$('.chess-game-container').append(options);
      
      actionBegun = true;
      
  }
});

$("html").on("dragover", function(event) {
    $('.chess-game-container').remove('.square');
    event.preventDefault();  
    event.stopPropagation();
    $(this).addClass('dragging');
});

function returnOptions(piece, toMoveX, toMoveY) {
    console.log("checking " + toMoveX + toMoveY);
    let options = [];
    let upDirectionCounter = 1;
    let leftDirectionCounter = 1;
    let rightDirectionCounter = 1;
    let downDirectionCounter = 1;
    let leftTopDirectionCounter = 1;
    let leftBottomDirectionCounter = 1;
    let rightTopDirectionCounter = 1;
    let rightBottomDirectionCounter = 1;
    // diagonal movements
  if(piece == (playercolor + "-queen" )|| piece == (playercolor + "-bishop")) {
    while((toMoveX + rightBottomDirectionCounter < 8) && (toMoveY + rightBottomDirectionCounter < 8) && 
    ($('.chess-game-container').find("." +columns[toMoveX+(rightBottomDirectionCounter)] + rows[toMoveY+(rightBottomDirectionCounter)]+".piece").length == 0)) 
      {options.push(columns[toMoveX+(rightBottomDirectionCounter)] + rows[toMoveY+(rightBottomDirectionCounter)++]);}

    while((toMoveX - leftBottomDirectionCounter > (-1) ) && (toMoveY + leftBottomDirectionCounter < 8) && 
    ($('.chess-game-container').find("." +columns[toMoveX-(leftBottomDirectionCounter)] + rows[toMoveY+(leftBottomDirectionCounter)]+".piece").length == 0))  
      {options.push(columns[toMoveX-(leftBottomDirectionCounter)] + rows[toMoveY+(leftBottomDirectionCounter)++]);}

    while((toMoveX + rightTopDirectionCounter < 8 ) && (toMoveY  - rightTopDirectionCounter > (-1)) && 
    ($('.chess-game-container').find("." +columns[toMoveX+(rightTopDirectionCounter)] + rows[toMoveY-(rightTopDirectionCounter)]+".piece").length == 0)) 
      {options.push(columns[toMoveX+(rightTopDirectionCounter)] + rows[toMoveY-(rightTopDirectionCounter)++]);}

    while((toMoveX  - leftTopDirectionCounter > (-1) ) && (toMoveY  - leftTopDirectionCounter > (-1)) && 
    ($('.chess-game-container').find("." +columns[toMoveX-(leftTopDirectionCounter)] + rows[toMoveY-(leftTopDirectionCounter)]+".piece").length == 0)) 
      {options.push(columns[toMoveX-(leftTopDirectionCounter)] + rows[toMoveY-(leftTopDirectionCounter)++]);}
  }
  // movements along axis
  if(piece ==  (playercolor +"-rook") || piece ==( playercolor +  "-queen")) {
    while(toMoveY + downDirectionCounter < 8 && 
      ($('.chess-game-container').find("." +columns[toMoveX] + rows[toMoveY+(downDirectionCounter)]+".piece").length == 0)) 
     {options.push(columns[toMoveX] + rows[toMoveY+(downDirectionCounter)++]);}

    while(toMoveY - upDirectionCounter > (-1) && 
    ($('.chess-game-container').find("." +columns[toMoveX] + rows[toMoveY+(upDirectionCounter)]+".piece").length == 0) ) 
     {options.push(columns[toMoveX] + rows[toMoveY-(upDirectionCounter)++]);}

    while(toMoveX + rightDirectionCounter < 8 && 
      ($('.chess-game-container').find("." +columns[toMoveX+(rightDirectionCounter)] + rows[toMoveY]+".piece").length == 0)) 
      {options.push(columns[toMoveX+(rightDirectionCounter)++] + rows[toMoveY]);}

    while(toMoveX - leftDirectionCounter > (-1) && 
    ($('.chess-game-container').find("." +columns[toMoveX-(leftDirectionCounter)] + rows[toMoveY]+".piece").length == 0)) 
      {options.push(columns[toMoveX-(leftDirectionCounter)++] + rows[toMoveY]);}
  }
  if(piece == (playercolor+"-pawn")) {
    if(applyConstraints(toMoveX, toMoveY-1))
    options.push(columns[toMoveX] + rows[toMoveY-1]);
    if(pawnIdentities[returnPawnIdentity()] == 1 && applyConstraints(toMoveX, toMoveY-2 )) {
      options.push(columns[toMoveX] + rows[toMoveY-2]);
    }
    if(canAttackSquare(pieceClicked, toMoveX-1, toMoveY-1)) {
      $('.chess-game-container').append("<div class='square-attack " + columns[ toMoveX-1] + rows[ toMoveY-1] + "'></div>");
      options.push(columns[toMoveX-1] + rows[toMoveY-1]);
    }
    if(canAttackSquare(pieceClicked, toMoveX+1, toMoveY-1)) {
      $('.chess-game-container').append("<div class='square-attack " + columns[ toMoveX+1] + rows[ toMoveY-1]  + "'></div>");
      options.push(columns[toMoveX+1] + rows[toMoveY-1]);
    }

  }
  if(piece == (playercolor+"-knight")) {
    let loop = [[-1, -1],[1, -1], [1,1], [-1,1]];
    for(var j = 0; j < 4; j++) {
      if(applyConstraints(toMoveX+2*loop[j][0], toMoveY+1*loop[j][1])){
        options.push(columns[toMoveX+2*loop[j][0]] + rows[toMoveY+1*loop[j][1]]);
      }
      
      if(applyConstraints(columns[toMoveX+1*loop[j][0]], toMoveY+2*loop[j][1] )){
        
        options.push(columns[toMoveX+1*loop[j][0]] + rows[toMoveY+2*loop[j][1]]);
      }
    }

  }
  if(piece == (playercolor+"-king")) {
    let loop = [[0, -1],[0, 1], [1,1], [1,0], [1,-1],  [-1,1], [-1,0], [-1,-1] ];

    for(var j = 0; j < loop.length; j++) {
      if(applyConstraints(toMoveX + loop[j][0], toMoveY + loop[j][1])) {
        options.push(columns[toMoveX +  loop[j][0]] + rows[toMoveY+ loop[j][1]]);
      }
    }

  }
  return options;
}

function canAttackSquare(piece, x, y){
  let canAttack = false;
  let classes = $('.chess-game-container').find("." + columns[x] + rows[y]).attr("class") + "";
  if(classes.includes(enemycolor))
     canAttack = true;
  return canAttack;
}

function applyConstraints(x, y) 
{
   let response = true;
   if (x < 0 || x > 7 || y < 0 || y > 8) {
     response = false;
     return response;
   }
   return response;
}

function returnPawnIdentity () {
  return 4;
}

function pieceOnSquare(square) {
  let response = false;
  if($('.chess-game-container').find("." +square+".piece").length == 1);

}

$("html").on("dragstart click", function(event) {
    beginningX = event.clientX;
    beginningY = event.clientY;
});

$("html").on("dragleave", function(event) {
    event.preventDefault();  
    event.stopPropagation();
    $(this).removeClass('dragging');
});

function returnNewSquare(elementHeight, elementWidth, endX, endY) {
  let distanceX = endX - beginningX;
  let distanceY = endY - beginningY;
  let offsetX = Math.ceil(distanceX/elementWidth);
  let offsetY = Math.ceil(distanceY/elementHeight);
  
  
  let lastRow = parseInt( lastClicked[1]);
  let nextClass = columns[(columns.indexOf(lastClicked[0]) + offsetX) % 8] + "" + rows[(lastRow + offsetY) % 8];
  return nextClass;
}
$("html").click(function(e) {
    let offset = $('.chess-game-container').offset();
    let columns = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h']; // x
    let rows = [8, 7, 6, 5, 4, 3, 2, 1];
    let x = columns[ Math.ceil(( e.pageX - offset.left)/($('.chess-game-container').width()/8)) - 1];
    let y = rows[ Math.ceil((e.pageY - offset.top)/($('.chess-game-container').height()/8)) - 1];
   

    //check a piece has been clicked
    let options = returnOptions(pieceClicked, toMoveX, toMoveY);
    if(actionBegun) {
      if(options.indexOf(x+y+"") != -1) {
        if(pieceClicked.includes("pawn")) {
          pawnIdentities[returnPawnIdentity()] = 0;
          console.log("setting index " + lastClicked + " to 0 " );
        }
        $('.chess-game-container').find("." + lastClicked + ".piece").removeClass(lastClicked).addClass(x+y+"");
        $('.square').remove();
        $('.square-attack').remove();
        
      }
      else {
        console.log("movement not authorized");
      }
      

    }
    // if a piece has been clicked, initiate action
    else {

    }


    
});


$("html").on("drop", function(event) {
    event.preventDefault();  
    event.stopPropagation();

    let offset = $('.chess-game-container').offset();
    let columns = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h']; // x
    let rows = [8, 7, 6, 5, 4, 3, 2, 1];
    let x = columns[ Math.ceil(( event.pageX - offset.left)/($('.chess-game-container').width()/8)) - 1];
    let y = rows[ Math.ceil((event.pageY - offset.top)/($('.chess-game-container').height()/8)) - 1];


    
    let options = returnOptions(pieceClicked, toMoveX, toMoveY);
    
    if(options.indexOf(x+y+"") != -1) {
      if(pieceClicked.includes("pawn")) {
        pawnIdentities[returnPawnIdentity()] = 0;
      }
      $('.chess-game-container').find("." + lastClicked + ".piece").removeClass(lastClicked).addClass(x+y+"");
      
    }
    else {
      console.log("movement not authorized");
    }
    
});