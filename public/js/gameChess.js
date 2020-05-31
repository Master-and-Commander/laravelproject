
let beginningX = 0;
let beginningY = 0;
let actionBegun = false;
let pieceClicked = "";
let playercolor = "white";
let columns = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h']; // x
let rows = [8, 7, 6, 5, 4, 3, 2, 1];

$(".piece").on("click drag", function(e) {
  $('.square').remove();
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
      let coordinatePieces =  lastClicked.split('');
      let toMoveX = columns.indexOf(coordinatePieces[0]);
      let toMoveY = rows.indexOf(parseInt(coordinatePieces[1]));
      let options = returnOptions(pieceClicked, toMoveX, toMoveY);
      $('.chess-game-container').append(options);
      
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
    let options = "";
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
    while((toMoveX + rightBottomDirectionCounter < 8) && (toMoveY + rightBottomDirectionCounter < 8)) {
        options += "<div class='square " + columns[toMoveX+(rightBottomDirectionCounter)] + rows[toMoveY+(rightBottomDirectionCounter)++] + "'></div>";
      }

      while((toMoveX - leftBottomDirectionCounter > (-1) ) && (toMoveY + leftBottomDirectionCounter < 8))  {
        options += "<div class='square " + columns[toMoveX-(leftBottomDirectionCounter)] + rows[toMoveY+(leftBottomDirectionCounter)++] + "'></div>";
      }

      while((toMoveX + rightTopDirectionCounter < 8 ) && (toMoveY  - rightTopDirectionCounter > (-1))) {
        options += "<div class='square " + columns[toMoveX+(rightTopDirectionCounter)] + rows[toMoveY-(rightTopDirectionCounter)++] + "'></div>";
      }

      while((toMoveX  - leftTopDirectionCounter > (-1) ) && (toMoveY  - leftTopDirectionCounter > (-1))) {
        options += "<div class='square " + columns[toMoveX-(leftTopDirectionCounter)] + rows[toMoveY-(leftTopDirectionCounter)++] + "'></div>";
      }
  }
  // movements along axis
  if(piece ==  (playercolor +"-rook") || piece ==( playercolor +  "-queen")) {
    while(toMoveY + downDirectionCounter < 8) {
        options += "<div class='square " + columns[toMoveX] + rows[toMoveY+(downDirectionCounter)++] + "'></div>";
      }
      while(toMoveY - upDirectionCounter > (-1) ) {
        options += "<div class='square " + columns[toMoveX] + rows[toMoveY-(upDirectionCounter)++] + "'></div>";
      }
      while(toMoveX + rightDirectionCounter < 8) {
        options += "<div class='square " + columns[toMoveX+(rightDirectionCounter)++] + rows[toMoveY] + "'></div>";
      }
      while(toMoveX - leftDirectionCounter > (-1) ) {
        options += "<div class='square " + columns[toMoveX-(leftDirectionCounter)++] + rows[toMoveY] + "'></div>";
      }
  }
  return options;
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
   
    
    // display what square is being clicked
    console.log("clicked square is " + x+y);

    //check a piece has been clicked
    if(actionBegun) {
        $('.chess-game-container').find("." + lastClicked + ".piece").removeClass(lastClicked).addClass(x+y+"");

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
    
    $('.chess-game-container').find("." + lastClicked + ".piece").removeClass(lastClicked).addClass(x+y+"");
    console.log("moved to " + x + y);
});