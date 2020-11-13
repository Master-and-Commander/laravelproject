@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="container">
    <h2>Fish Questions</h2>
    <p>{{$pH}}
    <?php  foreach ($fishdata as $data): ?>
      <p>{{$data[0]}} </p>
      <p>{{$data[1]}} </p>
      <p>{{$data[2]}} </p>
      <p>{{$data[3]}} </p>
    <?php endforeach?>
  
    

    <h2>Resources</h2>

 
    </div>
  </div>
</div>
@endsection
