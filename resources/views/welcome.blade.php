@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="container">
  <div class="jumbotron">
    <h1>Delve deep into Arthropods!</h1>
    <p >Everything from the <a href="/creatures/scorpion" class="scorpion font-weight-bold">Scorpion</a> to the <a href="/creatures/spider" class="spider font-weight-bold">Spider</a></p>
  </div>
  


  <h2>Recent entries </h2>
  <div class = "animal-carousel" >
    <div class = "row item-carousel" offset = "0">
        <?php foreach ($scorpions as $scorpion) : ?>
          <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">{{$scorpion[1]}}</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="/creatures/scorpion/<?php echo strtolower(str_replace(" ", "_", $scorpion[1])); ?>" class="btn btn-primary">More</a>
        </div>
        </div>
        <?php endforeach ?>
    </div>
  </div>

    <div class = "item-carousel-btn">
      <a class="btn btn-primary item-carousel-btn-left"> < </a> <a class="btn btn-primary item-carousel-btn-right"> > </a>
    </div>

  <h2> Faster Entry response </h2>
  <div class = "alternate-carousel" >
  <div class = "row alternate-item-carousel" offset = "0">
    <?php for ($i = 0; $i < 21; $i++) : ?>
      <?php if ($i < 3) : ?>
      <div class="card alternate-item" style="width: 18rem; display: block">
      <?php else : ?>
        <div class="card alternate-item" style="width: 18rem; display: none">
      <?php endif ?>
      <div class="card-body">
        <h5 class="card-title">{{$i}}</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="/creatures/scorpion/<?php echo strtolower(str_replace(" ", "_", $scorpion[1])); ?>" class="btn btn-primary">More</a>
    </div>
    </div>
    <?php endfor ?>
  </div>
    </div>
  <div class = "item-carousel-controller">
    <a class="btn btn-primary cntrl-left"> < </a> <a class="btn btn-primary cntrl-right"> > </a>
  </div>

  
  

  <h2>We have a place for you!</h2>

  

  <hr />
  <br />
  <p>{Article Carousel}</p>
</div>
    </div>
</div>
@endsection