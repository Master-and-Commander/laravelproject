@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="container">
    <h1>{{$common_name}}</h1>
    <hr />
    <h2>Fast Facts</h2>
    <hr />
    <div class="fish_blurb row">
    <div class = "col-md-6">
    <div class="row"><p><span class="fish_blurb_attribute">pH:</span> {{$pH}} </p></div>
    <div class="row"><p><span class="fish_blurb_attribute">Temp range:</span> {{$temperature}}</p></div>
    <div class="row"><p><span class="fish_blurb_attribute">Habitat:</span> {{$habitat}}</div>
    <div class="row"><p><span class="fish_blurb_attribute">Latin name:</span> <span class="latin">{{$family_name}} {{$species_name}}</span></div>
    </div>
    <div class = "col-md-6">
    <div class="row"><p><span class="fish_blurb_attribute">Water:</span> {{$water_type}}</p></div>
    <div class="row"><p><span class="fish_blurb_attribute">Feed type:</span> carnivorous</p></div>
    <div class="row"><p><span class="fish_blurb_attribute">Adult size:</span> 16cm</p></div>
    <div class="row"><p><span class="fish_blurb_attribute">Also known as:</span> Flatfish</p></div>
    </div>
    
    </div>

    <h2>Description</h2>
    <hr />
    <p>{{$description}}</p>

    <h2>Experience with {{$common_name}}</h2>
    
  
    

    <h2>Resources</h2>
    <hr />

 
    </div>
  </div>
</div>
@endsection
