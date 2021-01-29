<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Resume Builder</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .active{
            font-weight: bolder;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   Resume Builder
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class='nav-item'>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">
                                Preview
                            </button>

                            <!-- Modal -->
                            <div class="modal fade " id="modelId" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Preview Resume</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <iframe width='100%' height='900'  src="{{route('resume.index')}}"></iframe>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <a name="" id="" class="btn btn-primary" href="{{route('resume.download')}}"
                                                role="button">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        {{-- <div class="nav-item">
                            <a target="_blank" href=" {{route('resume.index')}} "> View</a>
                        </div> --}}



                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item {{request()->is('user-detail') ? 'active' : ''}}"><a href="{{route('user-detail.index')}}">Heading</a></li>
                  <li class="breadcrumb-item {{request()->is('education') ? 'active' : ''}}"><a href="{{route('education.index')}}">Education</a></li>
                  <li class="breadcrumb-item {{request()->is('experience') ? 'active' : ''}}"><a href="{{route('experience.index')}}">Experience</a></li>
                  <li class="breadcrumb-item {{request()->is('skill') ? 'active' : ''}}"><a href="{{route('skill.index')}}">Skills</a></li>
                </ol>
            </nav>
            {{-- validation errros --}}
            <div>
                @if(session()->has('errors'))
                    @foreach ($errors->all() as $e)
                        <div class="alert alert-danger" role="alert">
                            <p>{{$e}}</p>
                        </div>
                    @endforeach
                @endif
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item "><a href="{{ route('users.index') }}">User Management</a></li>
                  <li class="breadcrumb-item "><a href="{{ route('roles.index')}}">Role Management</a></li>
                  <li class="breadcrumb-item "><a href="{{ route('themes.index')}}">Theme Management</a></li>
                  <li class="breadcrumb-item "><a href="#">Login Information</a></li>
                </ol>
            </nav>

            @yield('content')
        </main>
    </div>
</body>
</html>
