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
	

    <h2> Articles </h2>
	<hr />
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

	
	<button class="btn btn-secondary">More</button>
	

	<h2> Creatures </h2>
	<hr />
	<div class= "row col-md-12">
	<?php foreach ($creatures as $creature) : ?>
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
	<?php endforeach ?>
	</div>

	<button class="btn btn-secondary">More</button>

	<h2> New Joiners </h2>
	<hr />
    <div class= "row col-md-12">
	<?php foreach ($buddies as $buddy) : ?>
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
	<?php endforeach ?>
	</div>
	

	<button class="btn btn-secondary">More</button>
	
	
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