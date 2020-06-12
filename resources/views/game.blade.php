@extends('layouts.app')

@section('content')
<!-- perhaps best to use a database again -->
<div class="container"> 
    
    <?php for($i = 0; $i < 7; $i++) : ?>
      <p> hello {{$i}} </p>
    <?php endfor ?>

</div>
<div class = "card-row">
		<div class="card">
				<div class="card-body">
					<h5 class="card-title">Filler article</h5>
					<hr class ="hr-card"/>
					<p class="card-text">Filler content</p>
					<a href="/creatures/scorpion/" class="btn btn-primary">Keep Reading</a>
				</div>
		  </div>
	    </div>
<a href ="{{url('/games/chess')}}">Scorpion Chess</a>
@endsection
