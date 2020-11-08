@extends('layouts.app')

@section('content')
<!-- perhaps best to use a database again -->
<div class="container"> 
    
    <?php foreach ($fishes as $fish) : ?>
      <p> hello {{$fish[1]}} </p>
    <?php endforeach ?>

</div>
@endsection
