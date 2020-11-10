@extends('layouts.app')

@section('content')
<!-- perhaps best to use a database again -->
<div class="container"> 
<h2> On Plants </h2>
	<hr />
	<div class= "row col-md-12">
	<?php foreach ($plants as $plant) : ?>
		<div class = "card-row">
		<div class="card">
				<div class="card-body">
					<h5 class="card-title">Filler article</h5>
					<hr class ="hr-card"/>
					<p class="card-text">Filler content</p>
					<a href="/plants/{{$plant[0]}}" class="btn btn-primary">Keep Reading</a>
				</div>
		  </div>
	    </div>
	<?php endforeach ?>
	</div>


 </div>
@endsection