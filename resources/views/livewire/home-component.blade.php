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
				@php
					$i = 0;
				@endphp
				@foreach($categories as $category)
				@php
					$i++;
				@endphp
				<div class="col-sm-12 col-md-3 col-lg-3">
					<h3 class="text-center">{{$category->name}}</h3>
					<a class="lightbox" href="{{route('recipe.category', ['category_slug'=>$category->slug])}}">
						<img src="assets/images/category/{{$i}}.jpg" class="img-fluid" alt="{{$category->name}}">
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
