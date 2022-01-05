<div>
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1 href="" class="text-white">Favorite recipes</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-box">
        <div class="container">
            <div class="row inner-menu-box">
                <div class="col">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>
                        @endif
                            <div class="row">
                                @foreach($favourites as $fav)
                                <div class="col-md-4 col-sm-6">
                                    <div class="our-team">
                                        <div class="pic">
                                            <img src="{{asset('assets/images/recipes')}}/{{$fav->image}}">
                                            <ul class="social">
                                                <li><a href="#" wire:click.prevent="DeleteFromFav({{$fav->id}})" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete" class="bg-tooltip fa fa-trash"></a></li>
                                                <li><a href="{{route('recipe.details',['slug'=>$fav->slug])}}" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="To recipe" class="bg-tooltip fa fa-long-arrow-right"></a></li>
                                            </ul>
                                        </div>
                                        <div class="team-content">
                                            <h3 class="title">{{$fav->name}}</h3>
                                            <span class="post">{{$fav->short_description}}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Menu -->
</div>