
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
    let startY = offset.left;
    let startX = offset.top;
    
    console.log("startY " + startY + " startX: " + startX);
    console.log("clienty " + e.offsetY + " client x: " + e.offsetX );
    
});
$("html").on("drop", function(event) {
    event.preventDefault();  
    event.stopPropagation();
    let offset = $('.chess-game-container').offset();
    let startY = offset.left;
    let startX = offset.top;
    let elementWidth = $('.chess-game-container').width()/8;
    let elementHeight =  $('.chess-game-container').height()/8;

    console.log("first width: " + $('.chess-game-container').width()/8 );
    console.log("second width: " + $('.chess-game-container').find("." + lastClicked).width());

    console.log("first height: " + $('.chess-game-container').height()/8 );
    console.log("second height: " +$('.chess-game-container').find("." + lastClicked).height() );
    
    elementWidth =  $('.chess-game-container').find("." + lastClicked).width();
    elementHeight =   $('.chess-game-container').find("." + lastClicked).height();
    
    let nextClass = returnNewSquare(elementHeight, elementWidth, event.clientX, event.clientY);
    console.log("next class: " + nextClass);
    // have to determine which square client x and client y is on
    // x
    //console.log("end x: " +  event.clientX + " y: " + event.clientY);
    $('.chess-game-container').find("." + lastClicked).removeClass(lastClicked).addClass(nextClass);
});