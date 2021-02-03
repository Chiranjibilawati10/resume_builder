<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Resume Builder</title>

    <!-- Scripts -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script> --}}
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
                                <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Notification
                        </button>
                                <!-- Notification Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel">User Notifications </h3>
                                    
                                    <span class="btn btn-text btn-success">
                                        {{auth()->guard('web')->user()->unreadNotifications()->count()}} New
                                    </span>
                                    
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url({{url('/media/misc/bg-1.jpg')}})">
                                                
                                                <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success mt-3 px-8" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications">New</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#topbar_notifications_events">Read</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            
                                            <div class="tab-content">
                                                <div class="tab-pane active show p-8" id="topbar_notifications_notifications" role="tabpanel">
                                                    <div class="scroll pr-7 mr-n7" data-scroll="true" data-height="300" data-mobile-height="200">
                                                        @forelse( auth()->guard('web')->user()->unreadNotifications as $notification)
                                                        <div class="d-flex align-items-center mb-6">
                                                            <div class="symbol symbol-40 symbol-light-primary mr-5">
                                                                <span class="symbol-label">
                                                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
                                                                                <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <div class="d-flex flex-column font-weight-bold">
                                                                <a href="{{ route('notification.view',$notification) }}" class="text-dark text-hover-primary mb-1 font-size-lg">{{ $notification->data['content'] }}</a>
                                                                {{-- <span class="text-muted">Marketing campaign planning</span> --}}
                                                            </div>
                                                        </div>
                                                        @empty
                                                            <div class="d-flex flex-center text-center text-muted min-h-200px">All caught up!
                                                            <br />No new notifications.</div>
                                                        @endforelse
                                                    </div>
                                                </div>
                                                <div class="tab-pane p-8" id="topbar_notifications_events" role="tabpanel">
                                                    <div class="scroll pr-7 mr-n7" data-scroll="true" data-height="300" data-mobile-height="200">
                                                        @forelse( auth()->guard('web')->user()->readNotifications as $notification)
                                                        <div class="d-flex align-items-center mb-6">
                                                            <div class="symbol symbol-40 symbol-light-primary mr-5">
                                                                <span class="symbol-label">
                                                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
                                                                                <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <div class="d-flex flex-column font-weight-bold">
                                                                <a href="{{ route('notification.view',$notification) }}" class="text-dark text-hover-primary mb-1 font-size-lg">{{ $notification->data['content'] }}</a>
                                                                {{-- <span class="text-muted">Marketing campaign planning</span> --}}
                                                            </div>
                                                        </div>
                                                        @empty
                                                            <div class="d-flex flex-center text-center text-muted min-h-200px">All caught up!
                                                            <br />No new notifications.</div>
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                </div>
                            </div>

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

                </ol>
            </nav>
            @yield('content')
        </main>
    </div>
</body>
</html>
