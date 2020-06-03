@extends('layouts.app')

@section('content')

<div class="container">
	
	<div class="jumbotron arthropodiac-banner">
			<h1 class = "arthropodiac-banner-header"></h1>
			<hr class= "arthropodiac-banner-hr" />
			<p class = "arthropodiac-banner-content"></p>
	</div>
			
	 
	<h1> Arthropodiac </h1>
	<hr />
	<div class="row">	
	<img src = "images/scorpion3.png" class ="arthropodiac-logo-welcome" />
	<p> <span class="font-weight-bold"> Trolls exist! </span> asdfasdf </p> 	  
	</div>

	
	  	
      <h2> Popular </h2>
      <hr />
      <br />
			<div class = "alternate-carousel  text-center ">
				<div class = "row alternate-item-carousel col-md-12 justify-content-center " offset = "0">
					<?php for ($i = 0; $i < 21; $i++) : ?>
					<?php if ($i < 3) : ?>
					<div class="card alternate-item" style="width: 18rem; display: block">
						<?php else : ?>
					<div class="card alternate-item" style="width: 18rem; display: none">
							<?php endif ?>
						<div class="card-body">
							<h5 class="card-title">Article {{$i}}</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							<a href="/creatures/scorpion/" class="btn btn-primary">Keep Reading</a>
						</div>
					</div>
						<?php endfor ?>
				</div>
				<div class = "item-carousel-controller">
					<img src="/images/leftstinger2.png" class="cntrl-left">
					<img src="/images/selectedbar.png" class = "carousel-dot selected" item = "0" />
					<?php for ($i = 0; $i < 6; $i++) : ?>
					<img src="/images/unselectedbar.png" class = "carousel-dot" item = "<?php echo ($i+1); ?>"  />
					<?php endfor ?>
					<img src="/images/rightstinger2.png" class="cntrl-right" />
				</div>
			</div>
				<h2>We have a place for you!</h2>
					<hr />
				<h3>Contribute</h3>
				<p> Sign up </p>
					<br />
		</div>
  </div>
</div>
@endsection