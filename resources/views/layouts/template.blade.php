<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Managerment') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/link.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/template.css">
</head>
<body>
    <div id="app" >
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: gray">
            <div class="container" id="menu">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                        

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item" >
                            @if(Request::is('allevent'))
                                <div class="row" style="float: left; margin-right:10px;">
                                        <input class="form-control" type="text" id="search" placeholder="Search event" aria-label="Search">
                                </div>
                            @endif
                        </li>
                        @guest
                            <li class="nav-item">
                                <a style="color: white;" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a style="color: white;" class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a style="color: white;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        
    </div>
    <div>
        <div class="row text-left" style="max-height:100%;min-height: 600px;">
            <div class="col-md-2 sidenav justify-content-center" id="sidebar" style="background-color:darkolivegreen;padding-right: 0; ">
                <div class="row" style="margin-left: 6%; margin-top: 10%;">
                    <div style="height:15px; width:30px;">
                        <img src="{{asset('image/home.png')}}" width="20px;" height="auto;">
                    </div>
                        <a class="simple-text" href="{{ url('/') }}">
                          <h4>Manage Event</h4> 
                         </a>
                    
                </div>
                <hr style="background-color:blanchedalmond">
                <ul class="navbar-nav" style="margin-top: 10px;">
                @if(Auth::check() && Auth::user()->role ==1)
                    <li class="styleli">
                        
                        <a href="{{ url('/allevent') }}"class="text-primary">
                            <h5>All event</h5>
                      </a>
                     </li>
                    <li class="nav-link styleli" >
                        <a href="{{ url('/newevent') }}"class="text-primary"><h5>New event</h5></a> 
                    </li>
                @elseif(Auth::check() && Auth::user()->role ==0)
                    <li class="nav-link styleli" >
                        <a href="{{ url('/user/event/yourevent') }}" class="text-primary"><h5>your event</h5></a>
                    </li>
                    <li class="nav-link styleli" >
                       <a href="{{ url('/allevent') }}"class="text-primary"><h5>All event</h5></a>
                    </li>
                    <li class="nav-link styleli" >
                        <a href="{{ url('/shownotice') }}"class="text-primary"><h5>Notice</h5></a>
                    </li>
                @else 
                    <li class="nav-link styleli" >
                        <a href="{{ url('/allevent') }}"class="text-primary"><h5>All event</h5></a>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="col-md-10" >
                @yield('content')
            </div>
        </div>
    </div>
</body>
{{-- <footer style="background-color:black">
    <div class="text-info row" >
        <div class="col-md-3"></div>
        <div class="col-md-3 text-center">
            <p>About us</p><br>

                Email:<a href="mailto:toan@gmail.com">toan@gmail.com</a><br>
                Phone:<a href="phoneto:0923748484">0923748484</a>
 
        </div>
        <div class="col-md-3 text-center">
            <p>Product</p><br>
                Managerment Event

        </div>
        <div class="col-md-3 text-center">
            introduct

        </div>
    </div>
</footer> --}}

{{-- <style>
tr:hover{
    background-color: aqua;
}
a:hover{
    text-decoration: none;
    color: darkseagreen;
}
#styleli{
    margin-left: 5%;
}
h5{
    color: gold;
}
h5:hover{
    color: black;
}


</style> --}}
</html>


