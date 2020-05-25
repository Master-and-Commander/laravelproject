@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="container">
			<div class="jumbotron row">
				<div class = "col-md-6" >
					<h1>Delve deep into Arthropods!</h1>
					<p >Everything from the 
						<a href="/creatures/scorpion" class="scorpion font-weight-bold">Scorpion</a> to the 
						<a href="/creatures/spider" class="spider font-weight-bold">Spider</a>
					</p>
				</div>
				<div class ="col-md-6">
					<img src = "images/scorpion3.png" class ="arthropodiac-logo-welcome" />
				</div>
			</div>
			
	 
      
	  <h2>Did you know? </h2>
	  <hr />
	  <p> <span class="font-weight-bold"> Trolls exist! </span> asdfasdf </p> 
	  
	  <h2> In the News </h2>
	  <hr />
	  <p> <span class="font-weight-bold">5.14.2020</span> Elsewhere in the world.. </p> 
	  
	  <h2> Quote of the Day </h2>
	  <hr />
      <p> <span class="font-weight-bold"> Monday the 14th </span> A scorpion's sting is worse than its bite </p> 

			
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