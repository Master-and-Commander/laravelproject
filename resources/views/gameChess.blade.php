@extends('layouts.app')

@section('content')
<div class="container"> 
<h1>Scorpion Chess</h1>

    <div class='chess-game-container'>
      <div class='piece white-queen b5' draggable= "true" ></div>
      <div class='piece white-rook c5' draggable= "true" ></div>
      <div class='piece white-bishop g5' draggable= "true" ></div>
    </div>


</div>
@endsection
