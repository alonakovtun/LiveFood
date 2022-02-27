<div>
    <!-- Start All Pages -->
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Dish Recipes</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Pages -->

    <!-- Start Menu -->
    <div class="menu-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h2>Dish Recipes</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                    </div>

                    <div class="wrap-shop-control">

                        <div class="wrap-right mb-20">

                            <div class="sort-item orderby ">
                                <select name="orderby" class="use-chosen custom-select" wire:model="sorting">
                                    <option value="default" selected="selected">Default sorting</option>
                                    <option value="date-new">Sort by newness</option>
                                    <option value="date-old">Sort by oldest</option>
                                </select>
                            </div>

                            <div class="sort-item product-per-page">
                                <select name="post-per-page" class="use-chosen custom-select" wire:model="pagesize">
                                    <option value="6" selected="selected">6 per page</option>
                                    <option value="9">9 per page</option>
                                    <option value="12">12 per page</option>
                                    <option value="15">15 per page</option>
                                    <option value="18">18 per page</option>
                                    <option value="21">21 per page</option>
                                </select>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

            
            <div class="row inner-menu-box">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link" href="/dish-recipes">All</a>
                        @foreach($categories as $category)
                        <a class="nav-link" href="{{ route('recipe.category', ['category_slug'=>$category->slug])}}">{{$category->name}}</a>
                        @endforeach

                    </div>
                </div>
                
                <div class="col-9">
                    <div class="tab-content">
                        @if($recipes->count()>0)
                        <div class="row">
                            @foreach($recipes as $recipe)
                            <div class="col-lg-4 col-md-6 special-grid drinks">
                                <div class="gallery-single fix">
                                    <img src="{{asset('assets/images/recipes')}}/{{$recipe->image}}" class="img-fluid" alt="{{$recipe->name}}">
                                    <div class="why-text">
                                    <a href="{{route('recipe.details',['slug'=>$recipe->slug])}}">
                                            <h1 class="text-dark font-weight-light">{{$recipe->name}}</h1>
                                            <div class="recipe-favorite ">
                                                <a class="recipe-go" href="{{route('recipe.details',['slug'=>$recipe->slug])}}">
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
                        <div class="wrap-pagination-info">
                            {{$recipes->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Menu -->

    </div>