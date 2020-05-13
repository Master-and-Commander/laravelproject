@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="container">
  <div class="jumbotron">
    <h1>About the <?php echo ucfirst($type) ?></h1>
    <p >{{ $summary[0] }}</p>
  </div>

  <h2>Basic Facts</h2>
  <?php foreach ($facts as $fact): ?>
    <h4>{{ $fact[0] }}</h4>
    <p class = "pnext">{{ $fact[1] }}</p>
  <?php endforeach ?>

  <h2>Common Questions</h2>
  <?php foreach ($questions as $question): ?>
    <h4>{{ $question[0] }}</h4>
    <p class = "pnext">{{ $question[1] }}</p>
  <?php endforeach ?>

  <h2>Resources</h2>
  <?php foreach ($resources as $resource): ?>
    <p>{{ $resource[0] }} <span class = "text-right">{{ $resource[1] }}</span></p>
  <?php endforeach ?>

  <hr />
  <br />
  <h2>Recent Articles about <?php echo ucfirst($type) ?>s</h2>
  <p>{Article Carousel}</p>
</div>
    </div>
</div>
@endsection
