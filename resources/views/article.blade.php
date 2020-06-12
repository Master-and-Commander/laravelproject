@extends('layouts.app')

@section('content')
<!-- perhaps best to use a database again -->
<div class="container"> 
   <h1>{{$title}}</h1>
   <p>{{$introduction}}</p>
    
    <?php for($i = 0; $i < count($headers); $i++) : ?>
      <h2> {{$headers[$i]}} </h2>
      <p>{{$contents[$i]}}</p>
    <?php endfor ?>

</div>
@endsection