
let beginningX = 0;
let beginningY = 0;


$(".piece").on("click drag", function(e) {

  e.preventDefault();
  console.log("type " + e.type );

  processString = $(this).attr("class");
  processString = processString.split(" ");
  for (var i = 0; i < processString.length; i++) {
      if (processString[i].length == 2)  {
          lastClicked = processString[i];
      }
  }
});

$("html").on("dragover", function(event) {
    event.preventDefault();  
    event.stopPropagation();
    $(this).addClass('dragging');
});

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
  
  let columns = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h']; // x
  let rows = [8, 7, 6, 5, 4, 3, 2, 1];
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
    
});

function calculateClickedSquare(x, y) {
    let columns = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h']; // x
    let rows = [8, 7, 6, 5, 4, 3, 2, 1];
    return 4;


}
$("html").on("drop", function(event) {
    event.preventDefault();  
    event.stopPropagation();

    let offset = $('.chess-game-container').offset();
    let columns = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h']; // x
    let rows = [8, 7, 6, 5, 4, 3, 2, 1];
    let x = columns[ Math.ceil(( event.pageX - offset.left)/($('.chess-game-container').width()/8)) - 1];
    let y = rows[ Math.ceil((event.pageY - offset.top)/($('.chess-game-container').height()/8)) - 1];
    
    $('.chess-game-container').find("." + lastClicked).removeClass(lastClicked).addClass(x+y+"");
    console.log("moved to " + x + y);
});