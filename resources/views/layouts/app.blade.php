<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href={{asset("assets/img/favicon.ico")}}>
    <title>Mitchell Mcdermott Blog</title>
    <!-- Bootstrap core CSS -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href={{asset("assets/css/bootstrap.min.css")}} rel="stylesheet">
    <!-- Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href={{asset("assets/css/mediumish.css")}} rel="stylesheet">


</head>
<body class="bg-white">
    <div id="app">
        <nav class="navbar navbar-toggleable-md navbar-light bg-white fixed-top mediumnavigation">

            <div class="container">


                <!-- End Logo -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Begin Menu -->
                    <!-- Begin Logo -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src={{asset("assets/logo.png")}} alt="logo">
                    </a>
                    <ul class="navbar-nav ml-auto z-0">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Stories <span class="sr-only">(current)</span></a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                                <li class="nav-item">
                                    <a href="{{ url('/post/create') }}" class="nav-link">Create Post</a>
                                </li>
                                <li class="nav-item dropdown pr-5 mr-3">
                                    <div class="position-absolute">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </li>


                        @endguest

                    </ul>
                    <!-- End Menu -->
                    <!-- Begin Search -->

                    <!-- End Search -->

                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search">
                            <span class="search-icon"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M20.067 18.933l-4.157-4.157a6 6 0 1 0-.884.884l4.157 4.157a.624.624 0 1 0 .884-.884zM6.5 11c0-2.62 2.13-4.75 4.75-4.75S16 8.38 16 11s-2.13 4.75-4.75 4.75S6.5 13.62 6.5 11z"></path></svg></span>
                        </form>
                </div>
            </div>
        </nav>
        <main >
            @yield('content')
        </main>
    </div>
    <script src={{asset("assets/js/jquery.min.js")}}></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src={{asset("assets/js/bootstrap.js")}}></script>
    <script src={{asset("assets/js/ie10-viewport-bug-workaround.js")}}></script>
</body>
</html>
