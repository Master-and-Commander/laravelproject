@extends('layouts.app')

@section('content')
<div class="container"> 
<h1>Scorpion Chess</h1>

    <div class='chess-game-container' draggable="false">
      <div class="hidden-square a8"></div>
      <div class="hidden-square a7"></div>
      <div class="hidden-square a6"></div>
      <div class="hidden-square a5"></div>
      <div class="hidden-square a4"></div>
      <div class="hidden-square a3"></div>
      <div class="hidden-square a2"></div>
      <div class="hidden-square a1"></div>
      <div class="hidden-square b8"></div>
      <div class="hidden-square b7"></div>
      <div class="hidden-square b6"></div>
      <div class="hidden-square b5"></div>
      <div class="hidden-square b4"></div>
      <div class="hidden-square b3"></div>
      <div class="hidden-square b2"></div>
      <div class="hidden-square b1"></div>
      <div class="hidden-square c8"></div>
      <div class="hidden-square c7"></div>
      <div class="hidden-square c6"></div>
      <div class="hidden-square c5"></div>
      <div class="hidden-square c4"></div>
      <div class="hidden-square c3"></div>
      <div class="hidden-square c2"></div>
      <div class="hidden-square c1"></div>
      <div class="hidden-square d8"></div>
      <div class="hidden-square d7"></div>
      <div class="hidden-square d6"></div>
      <div class="hidden-square d5"></div>
      <div class="hidden-square d4"></div>
      <div class="hidden-square d3"></div>      
      <div class="hidden-square d2"></div>
      <div class="hidden-square d1"></div>
      <div class="hidden-square e8"></div>
      <div class="hidden-square e7"></div>
      <div class="hidden-square e6"></div>
      <div class="hidden-square e5"></div>      
      <div class="hidden-square e4"></div>
      <div class="hidden-square e3"></div>
      <div class="hidden-square e2"></div>
      <div class="hidden-square e1"></div>
      <div class="hidden-square f8"></div>
      <div class="hidden-square f7"></div>
      <div class="hidden-square f6"></div>
      <div class="hidden-square f5"></div>
      <div class="hidden-square f4"></div>  
      <div class="hidden-square f3"></div>
      <div class="hidden-square f2"></div>
      <div class="hidden-square f1"></div>
      <div class="hidden-square g8"></div>
      <div class="hidden-square g7"></div>
      <div class="hidden-square g6"></div>
      <div class="hidden-square g5"></div>      
      <div class="hidden-square g4"></div>
      <div class="hidden-square g3"></div>
      <div class="hidden-square g2"></div>
      <div class="hidden-square g1"></div>
      <div class="hidden-square h8"></div>
      <div class="hidden-square h7"></div>
      <div class="hidden-square h6"></div>
      <div class="hidden-square h5"></div>
      <div class="hidden-square h4"></div>
      <div class="hidden-square h3"></div>
      <div class="hidden-square h2"></div>
      <div class="hidden-square h1"></div>

      <div class='piece black-king e8' draggable="false"></div>
      <div class='piece black-queen d8' draggable="false"></div>
      <div class='piece black-bishop c8' draggable="false"></div>
      <div class='piece black-bishop f8' draggable="false"></div>
      <div class='piece black-knight b8' draggable="false"></div>
      <div class='piece black-knight g8' draggable="false"></div>
      <div class='piece black-rook a8' draggable="false"></div>
      <div class='piece black-rook h8' draggable="false"></div>

      
      <div class='piece white-king e1' draggable="true"></div>
      <div class='piece white-queen d1' draggable="true"></div>
      <div class='piece white-bishop c1' draggable="true"></div>
      <div class='piece white-bishop f1' draggable="true"></div>
      <div class='piece white-knight b1' draggable="true"></div>
      <div class='piece white-knight d5' draggable="true"></div>
      <div class='piece white-rook a1' draggable="true"></div>
      <div class='piece white-rook h1' draggable="true"></div>

      <div class='piece black-pawn a7 black-0' draggable="false"></div>
      <div class='piece black-pawn b7 black-1' draggable="false"></div>
      <div class='piece black-pawn c7 black-2' draggable="false"></div>
      <div class='piece black-pawn d7 black-3' draggable="false"></div>
      <div class='piece black-pawn e7 black-4' draggable="false"></div>
      <div class='piece black-pawn f7 black-5' draggable="false"></div>
      <div class='piece black-pawn g7 black-6' draggable="false"></div>
      <div class='piece black-pawn h7 black-7' draggable="false"></div>

      <div class='piece white-pawn a2 white-0' draggable="true"></div>
      <div class='piece white-pawn b2 white-1' draggable="true"></div>
      <div class='piece white-pawn c2 white-2' draggable="true"></div>
      <div class='piece white-pawn d2 white-3' draggable="true"></div>
      <div class='piece white-pawn e2 white-4' draggable="true"></div>
      <div class='piece white-pawn f2 white-5' draggable="true"></div>
      <div class='piece white-pawn g2 white-6' draggable="true"></div>
      <div class='piece white-pawn h2 white-7' draggable="true"></div>
    </div>


</div>
@endsection
