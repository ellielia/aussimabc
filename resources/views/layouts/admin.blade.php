<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ABC News Admin</title>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://www.abc.net.au/res/sites/news-projects/news-core/1.19.23/desktop.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/litera/bootstrap.min.css" rel="stylesheet" integrity="sha384-D/7uAka7uwterkSxa2LwZR7RJqH2X6jfmhkJ0vFPGUtPyBMF2WMq9S+f9Ik5jJu1" crossorigin="anonymous">    <link rel="stylesheet" href="{{asset('codemirror.css')}}">
    <script src="{{asset('codemirror.js')}}"></script>
    <style>
        * {
            font-family: 'ABCSans', sans-serif;
        }

        body > #app {
            min-height: 100%;
        }

        p, small, h1, h2, h3, h4, h5, h6, a, blockquote, label{
            font-family: 'ABCSans', 'sans-serif';
        }
    </style>
</head>
<body style="height: 100vh;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/admin') }}">
                    <a class="home" href="/admin" data-mobile="/"><img src="https://res.abc.net.au/bundles/2.4.0/images/logo-abc@2x.png" width="65" height="16" alt="" /></a>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    @if(Auth::check())
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto pt-2">
                        @if (Auth::user()->journalist)
                        <li class="nav-item">
                            <a class="nav-link" href="/admin">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/elections">Elections</a>
                        </li>
                        @endif
                        @if (Auth::user()->administrator)
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/journalists">Journalists</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/webhooks">Webhooks</a>
                        </li>
                        @endif
                        @if (Auth::user()->can_tweet)
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/tweet">Tweet</a>
                        </li>
                        @endif
                    </ul>
                    @endif
                    @if(Auth::check())
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto pt-2">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown" style="height: 100%; line-height: 100%;">
                            <a style="height: 100%; line-height: 100%;" id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{Auth::user()->username}}
                                @if (Auth::user()->administrator)
                                    <i class="fa fa-shield-alt"></i>
                                @endif
                                <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('news.index') }}">
                                    {{ __('Public Side') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    @endif
                </div>
            </div>
        </nav>
        @if ($message = Session::get('alert'))
            <div class="alert alert-info" style="margin: 0; border-radius: 0; border: none;">
                <div class="container">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger" style="margin: 0; border-radius: 0; border: none;">
                <div class="container">
                    @foreach ($errors->all() as $error)
                        {{ $error }} <br>
                    @endforeach
                </div>
            </div>
        @endif
        <main class="py-4 container">
            @yield('content')
        </main>
    </div>
    <footer class="bg-secondary" style="margin-bottom: 0; margin-top: auto; padding: 20px; color: black;     font-family: 'ABCSans'; text-align: center;">
        <span>Created by /u/Lieselta for /r/AustraliaSim</span>
    </footer>
</body>
</html>
