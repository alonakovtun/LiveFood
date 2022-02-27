<div>
    <!-- Start All Pages -->
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>{{$recipe->name}}</h1>
                    <div class="details-page pt-3 text-white">
                        {!! $recipe->short_description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Pages -->

    <!-- Start blog details -->
    <div class="blog-box">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-12">
                    <div class="blog-inner-details-page">
                        <div class="blog-inner-box">
                            <div class="inner-blog-detail details-page pt-0 pb-1 pl-0">
                                <ul>
                                    <li><i class="zmdi zmdi-account"></i>Posted By : <span>{{$user}}</span></li>
                                    <li>|</li>
                                    <li><i class="zmdi zmdi-time"></i>Time : <span>{{$recipe->created_at}}</span></li>
                                </ul>
                            </div>
                            <div class="side-blog-img">
                                <img class="img-fluid" src="{{asset('assets/images/recipes')}}/{{$recipe->image}}" alt="{{$recipe->name}}">
                            </div>
                            @if(Auth::user() && Auth::user()->utype != 'ADM' ) 

                                @if(!$exists)
                                <a class="btn btn-lg btn-circle btn-outline-new-white mt-25" href="#" wire:click.prevent="addToFavorite({{$recipe->id}}) ">Add to favourites</a>
                                @else
                                <a class="btn btn-lg btn-circle btn-outline-new-white mt-25 disabled" href="#">Added to favourites</a>
                                @endif
                                @if(Session::has('message'))
                                <div class="alert alert-success mt-2" role="alert">
                                    {{Session::get('message')}}
                                </div>
                                @endif
                            @endif
                            @if(!Auth::user()) 

                                <a class="btn btn-lg btn-circle btn-outline-new-white text-white mt-25 disabled" >Add to favourites</a>
                                <div class="d-flex mt-2">
                                    <p>You must log in.</p>
                                    <a class="ml-2 text-primary" href="{{ route('login') }}">Login</a>
                                </div>
                                
                            @endif
                           
                            <div class="inner-blog-detail details-page pt-2">
                                {!! $recipe->description !!}
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8 col-12 blog-sidebar">
                    <div class="right-side-blog">
                        <h3 class="pb-2">Category</h3>
                        <h4 class="pb-4">{{$category}}</h4>

                        <h3>Ingredients</h3>
                        <div class="blog-categories">
                            <ul>
                                @foreach($ingredients as $ingredient)
                                <li><span>{{ $ingredient->name }}</span></li>
                                @endforeach
                            </ul>
                        </div>
                        @if(!$related_recipes->isEmpty())
                        <h3>Related recipes</h3>
                        <div class="post-box-blog">
                            <div class="recent-post-box">
                                @foreach($related_recipes as $related_recipe)
                                <div class="recent-box-blog">
                                    <div class="recent-img" style="width:40%">
                                        <img class="img-fluid" src="{{asset('assets/images/recipes') }}/{{$related_recipe->image}}" alt="">
                                    </div>
                                    <div class="recent-info">
                                        <h4><a href="{{route('recipe.details',['slug'=>$related_recipe->slug])}}">{{$related_recipe->name}}</a></h4>
                                        <p>{!! $related_recipe->short_description !!}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-12">
                    @comments(['model' => $recipe])
                </div>

            </div>
        </div>
    </div>
    <!-- End details -->
</div>