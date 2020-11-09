@extends('layouts.app')

@section('content')
<!-- perhaps best to use a database again -->
<div class="container"> 
    
<h2> Our Fish </h2>
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

</div>
@endsection
