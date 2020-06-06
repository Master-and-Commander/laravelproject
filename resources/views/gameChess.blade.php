@extends('layouts.app')

@section('content')
<div class="container"> 
<h1>Scorpion Chess</h1>

    <div class='chess-game-container' draggable="false">

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
      <div class='piece white-knight g1' draggable="true"></div>
      <div class='piece white-rook a1' draggable="true"></div>
      <div class='piece white-rook h1' draggable="true"></div>

      <div class='piece black-pawn a7 black-1' draggable="false"></div>
      <div class='piece black-pawn b7 black-2' draggable="false"></div>
      <div class='piece black-pawn c7 black-3' draggable="false"></div>
      <div class='piece black-pawn d7 black-4' draggable="false"></div>
      <div class='piece black-pawn e7 black-5' draggable="false"></div>
      <div class='piece black-pawn f7 black-6' draggable="false"></div>
      <div class='piece black-pawn g7 black-7' draggable="false"></div>
      <div class='piece black-pawn h7 black-8' draggable="false"></div>

      <div class='piece white-pawn a2 white-1' draggable="true"></div>
      <div class='piece white-pawn b2 white-2' draggable="true"></div>
      <div class='piece white-pawn c2 white-3' draggable="true"></div>
      <div class='piece white-pawn d2 white-4' draggable="true"></div>
      <div class='piece white-pawn e2 white-5' draggable="true"></div>
      <div class='piece white-pawn f2 white-6' draggable="true"></div>
      <div class='piece white-pawn g2 white-7' draggable="true"></div>
      <div class='piece white-pawn h2 white-8' draggable="true"></div>
    </div>


</div>
@endsection
