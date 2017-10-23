<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">




    <title>EStore App</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stylesheet.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.theme.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.structure.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav id="mainNav" class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
            
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        EStore App
                    </a>
                </div>                  

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    

                    <!-- Right Side Of Navbar -->
                    <ul  class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a  href="{{ route('register') }}">Register</a></li>
                        @else
                        <li><a href="{{url('myCart')}}">Cart <span style="color:red;">(<?php echo Cart::count(); ?>)</span></a></li>
                            <li  class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    @if (Auth::user()->permission===3)
                                    <li><a href="/admincp">AdminCP</a></li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                    </ul>
             
                </div>
            </div>
        </nav>

        @yield('content')
        <footer>
            <div class="container-fluid" class="footer" id="footer"><span id="footerContent">//</span></div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script> 
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
</body>
</html>
