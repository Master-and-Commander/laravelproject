@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="container">
    <h1>{{$common_name}}</h1>
    <hr />

    <h2>Description</h2>
    <hr />
    <p><span class="latin">{{$family_name}} {{$species_name}} </span> is a plant that prefers a pH of {{$pH}}, a temperature range of ...</p>
    <p>{{$description}}</p>

    <h2>Experience with {{$common_name}}</h2>
    
  
    

    <h2>Resources</h2>
    <hr />

    </div>
  </div>
</div>
@endsection
