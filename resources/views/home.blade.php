@extends('layouts.app') @section('content')
<div class= "container">
	<div class="jumbotron">
		<h1>home</h1>	
	</div>
				

<h2> About <span class="font-weight-bold arthropodiac-muted">:</span> </h2>
<hr />
<p> asdfas asdfsadf asdfasdf asdfsadf asdfasdf asdfasdf </p>
<br />

<h2> Contribute <span class="font-weight-bold arthropodiac-muted">:</span> </h2>
<hr />
<p> if you have something to add, go ahead and add! </p>
<a class= "btn btn-primary" href= "{{url('/build/general')}}">Begin >>> </a>
<br />
<div class="arthropodiac-tab-manager" selectedtab="articles">
  <div class="arthropodiac-tab-selectors row justify-content-center">
	<button class="btn btn-primary arthropodiac-tab-selector" value="articles">My Articles</button>
	<button class="btn btn-secondary arthropodiac-tab-selector" value="pets">My Pets</button>
	<button class="btn btn-secondary arthropodiac-tab-selector" value="setup">My Setups</button>
    <button class="btn btn-secondary arthropodiac-tab-selector" value="etc">Suggested</button>
  </div>
  <hr class = "arthropodiac-hr-carousel"/>
    <div class="arthropodiac-tab articles" style="display: block">
      <div class = "alternate-carousel  text-center ">
				<div class = "row alternate-item-carousel col-md-12 justify-content-center " offset = "0">
					<?php for ($i = 0; $i < 21; $i++) : ?>
					<?php if ($i < 3) : ?>
					<div class="card alternate-item" style="width: 18rem; display: block">
						<?php else : ?>
					<div class="card alternate-item" style="width: 18rem; display: none">
							<?php endif ?>
						<div class="card-body">
							<h5 class="card-title">Articles {{$i}}</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							<div class="row justify-content-center">
								<button class="btn btn-primary">Edit</button>
								<button class="btn btn-secondary">View</button>
							</div>
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
    </div>
    <div class="arthropodiac-tab  pets" style="display: none">
      <div class = "alternate-carousel  text-center ">
				<div class = "row alternate-item-carousel col-md-12 justify-content-center " offset = "0">
					<?php for ($i = 0; $i < 21; $i++) : ?>
					<?php if ($i < 3) : ?>
					<div class="card alternate-item" style="width: 18rem; display: block">
						<?php else : ?>
					<div class="card alternate-item" style="width: 18rem; display: none">
							<?php endif ?>
						<div class="card-body">
							<h5 class="card-title">pets {{$i}}</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							<div class="row justify-content-center">
								<button class="btn btn-primary">Edit</button>
								<button class="btn btn-secondary">View</button>
							</div>
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
    </div>
    <div class="arthropodiac-tab  setup" style="display: none">
      <div class = "alternate-carousel  text-center ">
				<div class = "row alternate-item-carousel col-md-12 justify-content-center " offset = "0">
					<?php for ($i = 0; $i < 21; $i++) : ?>
					<?php if ($i < 3) : ?>
					<div class="card alternate-item" style="width: 18rem; display: block">
						<?php else : ?>
					<div class="card alternate-item" style="width: 18rem; display: none">
							<?php endif ?>
						<div class="card-body">
							<h5 class="card-title">setup {{$i}}</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							<div class="row justify-content-center">
								<button class="btn btn-primary">Edit</button>
								<button class="btn btn-secondary">View</button>
							</div>
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
    </div>
    <div class="arthropodiac-tab  etc" style="display: none">
      <div class = "alternate-carousel  text-center ">
				<div class = "row alternate-item-carousel col-md-12 justify-content-center " offset = "0">
					<?php for ($i = 0; $i < 21; $i++) : ?>
					<?php if ($i < 3) : ?>
					<div class="card alternate-item" style="width: 18rem; display: block">
						<?php else : ?>
					<div class="card alternate-item" style="width: 18rem; display: none">
							<?php endif ?>
						<div class="card-body">
							<h5 class="card-title"> etc {{$i}}</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							<div class="row justify-content-center">
								<button class="btn btn-primary">Edit</button>
								<button class="btn btn-secondary">View</button>
							</div>
							
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
    </div>	
</div>
					</div>
@endsection
