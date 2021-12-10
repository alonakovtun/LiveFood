<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LiveFood</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon/favicon-16x16.png') }} ">
    <link rel="manifest" href="{{ asset('assets/images/favicon/site.webmanifest') }}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="antialiased">

    <!-- Start header -->
    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="mx-auto">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-rs-food">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a class="nav-link mr-1" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link mr-1" href="/dish-recipes">Dish Recipes</a></li>
                        <li class="nav-item"><a class="nav-link mr-1" href="/contact">Contact</a></li>
                        @if(Route::has('login'))
                        @auth
                        @if(Auth::user()->utype === 'ADM')
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex flex-row" href="#" id="dropdown-a" data-toggle="dropdown">
                                <img class="h-8 w-8 rounded-full object-cover mr-2" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </a>
                            <nav class="dropdown-menu" aria-labelledby="dropdown-a" id="nav">
                                <ul>
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.categories') }}">Categories</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.ingredients') }}">Ingredients</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.recipes') }}">Recipes</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.homeslider') }}">Manage Home Slider</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.users') }}">Manage Users</a></li>
                                    <hr class = "mt-0 mb-0">
                                    <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                </ul>
                                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                </form>
                            </nav>
                        </li>
                        <li class="nav-item my-auto">
                            <div class="recipe-favorite-header ml-4 my-auto ">
                                <a href="{{route('user.favorite')}}" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Favorites" class="bg-tooltip">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </li>
                        @elseif(Auth::user()->utype === 'MOD')
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex flex-row" href="#" id="dropdown-a" data-toggle="dropdown">
                                <img class="h-8 w-8 rounded-full object-cover mr-2" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <ul>
                                    <li><a class="dropdown-item" href="{{ route('moderator.dashboard') }}" }}>Dashboard</a></li>
                                    <li><a class="dropdown-item" href="{{ route('moderator.comments') }}" }}>Manage Comments</a></li>
                                    <hr class = "mt-0 mb-0">
                                    <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                </ul>
                                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <li class="nav-item my-auto">
                            <div class="recipe-favorite-header ml-4 my-auto ">
                                <a href="{{route('user.favorite')}}" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Favorites" class="bg-tooltip">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle d-flex flex-row" href="#" id="dropdown-a" data-toggle="dropdown">
                                <img class="h-8 w-8 rounded-full object-cover mr-2" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <ul>
                                    <li><a class="dropdown-item" href="{{ route('user.dashboard') }}" }}>Dashboard</a></li>
                                    <li><a class="dropdown-item" href="{{ route('user.recipes') }}">Recipes</a></li>
                                    <li><a class="dropdown-item" href="{{ route('user.ingredients') }}">Ingredients</a></li>
                                    <hr class = "mt-0 mb-0">
                                    <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                </ul>
                                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <li class="nav-item my-auto">
                            <div class="recipe-favorite-header ml-4 my-auto ">
                                <a href="{{route('user.favorite')}}" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Favorites" class="bg-tooltip">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </li>
                        @endif
                        @else
                        <li class="nav-item">
                            <ul class="navbar-nav ml-50">
                                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Sign Up</a></li>
                            </ul>
                        </li>
                        @endif

                        @endif
                    </ul>
                    @livewire('header-search-component')
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    <!-- Start Footer -->
    <footer class="footer-area bg-f">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <h3>About Us</h3>
                    <p>Integer cursus scelerisque ipsum id efficitur. Donec a dui fringilla, gravida lorem ac, semper magna. Aenean rhoncus ac lectus a interdum. Vivamus semper posuere dui.</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3>Subscribe</h3>
                    <div class="subscribe_form">
                        <form class="subscribe_form">
                            <input name="EMAIL" id="subs-email" class="form_input" placeholder="Email Address..." type="email">
                            <button type="submit" class="submit">SUBSCRIBE</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                    <!--  <ul class="list-inline f-social">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul> -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3>Contact information</h3>
                    <p class="lead">Ipsum Street, Lorem Tower, MO, Columbia, 508000</p>
                    <p class="lead"><a href="#">+01 2000 800 9999</a></p>
                    <p><a href="#"> info@admin.com</a></p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3>Opening hours</h3>
                    <p><span class="text-color">Monday: </span>Closed</p>
                    <p><span class="text-color">Tue-Wed :</span> 9:Am - 10PM</p>
                    <p><span class="text-color">Thu-Fri :</span> 9:Am - 10PM</p>
                    <p><span class="text-color">Sat-Sun :</span> 5:PM - 10PM</p>
                </div>
            </div>
        </div>

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="company-name">All Rights Reserved. &copy; 2018 <a href="#">Live Dinner Restaurant</a> Design By :
                            <a href="https://html.design/">html design</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <script src="https://kit.fontawesome.com/89b1dd48fe.js" crossorigin="anonymous"></script>
    <a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>

    <!-- ALL JS FILES -->
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('assets/js/jquery.superslides.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/images-loded.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/isotope.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/baguetteBox.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/form-validator.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/contact-form-script.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/custom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/function.js') }}" type="text/javascript"></script>
    <script src="https://cdn.tiny.cloud/1/wdrdh5p7wxth0sddw2md5sh2ld2pequng5bk7rtoe7ufhgvm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js" integrity="sha512-RtZU3AyMVArmHLiW0suEZ9McadTdegwbgtiQl5Qqo9kunkVg1ofwueXD8/8wv3Af8jkME3DDe3yLfR8HSJfT2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @livewireScripts

    @stack('scripts')
</body>

</html>