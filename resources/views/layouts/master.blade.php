<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ESF @yield('title')</title>
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <!-- 14.10.16
        Ja tu to skaties. Dari darbu no sakuma.
        Nevis pedeja menesi.
        Uz Hostinger var lejupladet visu LARAVEL projektu.
    -->

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body >
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a style="padding-top:7px; ;" class="navbar-brand" href="{{ route('home') }}"><img src="https://pbs.twimg.com/profile_images/1128147830/RVT-logo_560px.png" alt="" style="height:35px"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                @if (Auth::user())
                    <li><a href="{{ route('products.index') }}">Preces</a></li>
                    @role(('admin'))
                        <li><a href="{{ route('norakstits.index') }}">Norakstīts</a></li>
                    @endrole
                @endif
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @role(('admin'))
                                <li>
                                    <a href="{{ route('users.index') }}"><i class="fa fa-users"></i> Lietotāji</a>
                                </li>
                                @endrole
                                <li>
                                    <a style="border-top:solid 1px #f3f3f3;" href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i>Exit</a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    <main>
        <div class="container">
            @include('alerts.errors')
            @yield('content')
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
        var dateToday = new Date();
        var dates = $("#datepicker").datepicker({
            dateFormat: "yy-mm-dd",
            maxDate: dateToday,
        });
    </script>

</body>
</html>