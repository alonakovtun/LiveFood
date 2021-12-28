<div id="slides" class="cover-slides" style="height: 600px;!important">
	<!-- Start slides -->
	<ul class="slides-container">
		@foreach($sliders as $slider)
		<li class="text-left">
			<img src="{{ asset('assets/images/sliders') }}/{{$slider->image}}" alt="{{$slider->title}}">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="m-b-20">{{$slider->title}}</h1>
						<p class="m-b-40">{{$slider->subtitle}}</p>
						<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="{{$slider->link}}">Go</a></p>
					</div>
				</div>
			</div>
		</li>
		@endforeach
	</ul>
	<div class="slides-navigation">
		<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
		<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
	</div>
</div>
<!-- End slides -->

<!-- Start Categories -->
<div class="gallery-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="heading-title text-center">
					<h2>Category</h2>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
				</div>
			</div>
		</div>

		<div class="tz-gallery">
			@if($categories->count()>0)
			<div class="row justify-content-around">
				@foreach($categories as $category)
				<div class="col-sm-12 col-md-4 col-lg-4">
					<h3 class="text-center">{{$category->name}}</h3>
					<a class="lightbox" href="{{route('recipe.category', ['category_slug'=>$category->slug])}}">
						<img src="{{asset('assets/images/gallery-img-05.jpg')}}" class="img-fluid" alt="{{$category->name}}">
					</a>
				</div>
				@endforeach
			</div>
			@endif
		</div>
	</div>
</div>
<!-- End Categories -->

<!-- Start QT -->
<div class="qt-box qt-background">
	<div class="container">
		<div class="row">
			<div class="col-md-8 ml-auto mr-auto text-center">
				<p class="lead ">
					" There is no sincerer love than the love of food "
				</p>
				<span class="lead">George Bernard Shaw</span>
			</div>
		</div>
	</div>
</div>
<!-- End QT -->
<div class="gallery-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="heading-title text-center">
					<h2>Latest Recipes</h2>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
				</div>
			</div>
		</div>

		<div class="col">
			<div class="tab-content" id="v-pills-tabContent">
				<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
					@if($lrecipes->count()>0)
					<div class="row justify-content-around">
						@foreach($lrecipes as $lrecipe)
						<div class="col-lg-4 col-md-6 special-grid drinks">
							<div class="gallery-single fix">
								<img src="{{asset('assets/images/recipes')}}/{{$lrecipe->image}}" class="img-fluid" alt="{{$lrecipe->name}}" style="height: 200px; width: 100%!important;">
								<div class="why-text">
									<a href="{{route('recipe.details',['slug'=>$lrecipe->slug])}}">
										<h1 class="text-dark font-weight-light">{{$lrecipe->name}}</h1>
										<div class="recipe-favorite ">
											<a class="recipe-go" href="{{route('recipe.details',['slug'=>$lrecipe->slug])}}">
												<h1 class="text-dark font-weight-light"><i class="fa fa-long-arrow-right my-auto"></i> Go to recipe </h1>
											</a>
										</div>
									</a>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					@else
					<h1>No Recipes</h1>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Start Customer Reviews -->
<!-- <div class="customer-reviews-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Customer Reviews</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 mr-auto ml-auto text-center">
					<div id="reviews" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner mt-4">
							<div class="carousel-item text-center active">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="{{ asset('assets/images/quotations-button.png') }}" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Paul Mitchel</strong></h5>
								<h6 class="text-dark m-0">Web Developer</h6>
								<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
							</div>
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="{{ asset('assets/images/quotations-button.png') }}" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Steve Fonsi</strong></h5>
								<h6 class="text-dark m-0">Web Designer</h6>
								<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
							</div>
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="{{ asset('assets/images/quotations-button.png') }}" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Daniel vebar</strong></h5>
								<h6 class="text-dark m-0">Seo Analyst</h6>
								<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
							</div>
						</div>
						<a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
							<i class="fa fa-angle-left" aria-hidden="true"></i>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
							<span class="sr-only">Next</span>
						</a>
                    </div>
				</div>
			</div>
		</div>
	</div> -->
<!-- End Customer Reviews -->

<!-- Start Contact info -->
<!-- <div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4 arrow-right">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Phone</h4>
						<p class="lead">
							+01 123-456-4590
						</p>
					</div>
				</div>
				<div class="col-md-4 arrow-right">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							yourmail@gmail.com
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Location</h4>
						<p class="lead">
							800, Lorem Street, US
						</p>
					</div>
				</div>
			</div>
		</div>
	</div> -->
<!-- End Contact info -->