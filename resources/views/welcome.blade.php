@extends('layouts.app')

@section('content')

<div class="container">
	
	<div class="jumbotron arthropodiac-banner">
		<h1 class = "arthropodiac-banner-header"></h1>
		<hr class= "arthropodiac-banner-hr" />
		<p class = "arthropodiac-banner-content"></p>
	</div>
			
	 
	<h1> About </h1>
	<?php foreach ($generals as $general):  ?>
		<?php if ($general[0] == "about") : ?>
	<p>{{$general[1]}}</p>
	 <?php endif ?>
	<?php endforeach ?>
	<hr />
	
	<h2> New Articles </h2>
	<div class= "row col-md-12">
	<?php foreach ($articles as $article) : ?>
		<div class = "card-row">
		  <div class="card">
				<div class="card-body">
					<h5 class="card-title">{{$article[1]}}</h5>
					<hr class ="hr-card"/>
					<p class="card-text">{{$article[2]}}</p>
					<a href="/article/{{$article[0]}}" class="btn btn-primary">Keep Reading</a>
				</div>
			</div>
		</div>
	<?php endforeach ?>
	</div>

    <h2> On Fish </h2>
	<hr />
	<div class= "row col-md-12">
	<?php foreach ($fishes as $fish) : ?>
		<div class = "card-row">
		  <div class="card">
				<div class="card-body">
					<h5 class="card-title">{{$fish[1]}}</h5>
					<hr class ="hr-card"/>
					<p class="card-text">{{$fish[2]}}</p>
					<a href="/fish/{{$fish[1]}}" class="btn btn-primary">Keep Reading</a>
				</div>
			</div>
		</div>
	<?php endforeach ?>
	</div>

	<br />
	<button class="btn btn-secondary">More</button>
	<br />

	<h2> On Plants </h2>
	<hr />
	<div class= "row col-md-12">
	<?php foreach ($plants as $plant) : ?>
		<div class = "card-row">
		<div class="card">
				<div class="card-body">
					<h5 class="card-title">{{$plant[1]}}</h5>
					<hr class ="hr-card"/>
					<p class="card-text">{{$plant[2]}}</p>
					<a href="/plants/{{$plant[0]}}" class="btn btn-primary">Keep Reading</a>
				</div>
		  </div>
	    </div>
	<?php endforeach ?>
	</div>
    <br />
	<button class="btn btn-secondary">More</button>


	
	
	
	
		
		
	
	<br />
  </div>
</div>
@endsection