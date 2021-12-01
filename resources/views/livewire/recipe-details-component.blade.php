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
                            <a class="btn btn-lg btn-circle btn-outline-new-white mt-25" href="#">Add to favourites</a>


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
                                        <ul>
                                            <li><i class="zmdi zmdi-account"></i>Posted By : <span>{{$user}}</span></li>
                                            <li>|</li>
                                            <li><i class="zmdi zmdi-time"></i>Time : <span>{{$recipe->created_at}}</span></li>
                                        </ul>

                                        <h4><a href="{{route('recipe.details',['slug'=>$related_recipe->slug])}}">{{$related_recipe->name}}</a></h4>
                                        <p>{!! $related_recipe->short_description !!}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <!-- <h3>Recent Tag</h3>
                        <div class="blog-tag-box">
                            <ul class="list-inline tag-list">
                                <li class="list-inline-item"><a href="#">Food</a></li>
                                <li class="list-inline-item"><a href="#">Drink</a></li>
                                <li class="list-inline-item"><a href="#">Nature</a></li>
                                <li class="list-inline-item"><a href="#">Italian</a></li>
                                <li class="list-inline-item"><a href="#">Bootstrap4</a></li>
                                <li class="list-inline-item"><a href="#">Fashion</a></li>
                            </ul>
                        </div> -->
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