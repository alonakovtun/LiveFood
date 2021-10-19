<div>
    <!-- Start All Pages -->
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <a href="/dish-recipes" class="h1 text-white">Dish Recipes</a>
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
                                <select name="orderby" class="use-chosen" wire:model="sorting">
                                    <option value="default" selected="selected">Default sorting</option>
                                    <option value="date-new">Sort by newness</option>
                                    <option value="date-old">Sort by oldest</option>
                                </select>
                            </div>

                            <div class="sort-item product-per-page">
                                <select name="post-per-page" class="use-chosen" wire:model="pagesize">
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
                        @foreach($categories as $category)
                        <a class="nav-link" href="{{ route('recipe.category', ['category_slug'=>$category->slug])}}">{{$category->name}}</a>
                        @endforeach

                    </div>
                </div>

                <div class="col-9">
                    <div class="tab-content">
                        <div class="row">
                            @foreach($recipes as $recipe)
                            <div class="col-lg-4 col-md-6 special-grid drinks">
                                <div class="gallery-single fix">
                                    <img src="{{asset('assets/images/recipes')}}/{{$recipe->image}}" class="img-fluid" alt="{{$recipe->name}}">
                                    <div class="why-text">
                                        <h1><a href="{{route('recipe.details',['slug'=>$recipe->slug])}}">{{$recipe->name}}</a></h1>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="wrap-pagination-info">
                            {{$recipes->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Menu -->



    <!-- Start Customer Reviews -->
    <div class="customer-reviews-box">
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
                                    <img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
                                </div>
                                <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Paul Mitchel</strong></h5>
                                <h6 class="text-dark m-0">Web Developer</h6>
                                <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
                            </div>
                            <div class="carousel-item text-center">
                                <div class="img-box p-1 border rounded-circle m-auto">
                                    <img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
                                </div>
                                <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Steve Fonsi</strong></h5>
                                <h6 class="text-dark m-0">Web Designer</h6>
                                <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
                            </div>
                            <div class="carousel-item text-center">
                                <div class="img-box p-1 border rounded-circle m-auto">
                                    <img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
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
    </div>
    <!-- End Customer Reviews -->
</div>