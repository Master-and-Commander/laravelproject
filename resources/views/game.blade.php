@extends('layouts.app')

@section('content')
<div class="container"> 
    <h1>Games</h1>

    <?php for($i = 0; $i < 7; $i++) : ?>
      <p> hello {{$i}} </p>
    <?php endfor ?>

</div>
@endsection
