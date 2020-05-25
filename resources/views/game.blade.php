@extends('layouts.app')

@section('content')
<div class="container"> 
    
    <?php for($i = 0; $i < 7; $i++) : ?>
      <p> hello {{$i}} </p>
    <?php endfor ?>

</div>
@endsection
