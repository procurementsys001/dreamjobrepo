<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .graphs{
            font-size: 50px;
            text-align: center;
        }

        .card-1{
            background: #A3E4D7;
            color: white; 
        }

        .card-2{
            background: #F5B7B1;
            color: white;  
        }

        .card-3{
            background: #D7BDE2;
            color: white;  
        }

        .card-4{
            background: #F9E79F;
            color: white;  
        }

        .footer {
        background-color: #273746;
        color: white;
        text-align: center;
        }

        .fa-heart{
            color: #A93226;
        }

        .quotation-caption{
            margin-top: 10px;
            color: #273746;
        }

        .btn-link{
            float: right;
        }


        /****/

        .navbar-default .dropdown-menu.notify-drop {
    min-width: 330px;
    background-color: #fff;
    min-height: 360px;
    max-height: 360px;
  }
  .navbar-default .dropdown-menu.notify-drop .notify-drop-title {
    border-bottom: 1px solid #e2e2e2;
    padding: 5px 15px 10px 15px;
  }
  .navbar-default .dropdown-menu.notify-drop .drop-content {
    min-height: 280px;
    max-height: 280px;
    overflow-y: scroll;
  }
  .navbar-default .dropdown-menu.notify-drop .drop-content::-webkit-scrollbar-track
  {
    background-color: #F5F5F5;
  }
  
  .navbar-default .dropdown-menu.notify-drop .drop-content::-webkit-scrollbar
  {
    width: 8px;
    background-color: #F5F5F5;
  }
  
  .navbar-default .dropdown-menu.notify-drop .drop-content::-webkit-scrollbar-thumb
  {
    background-color: #ccc;
  }
  .navbar-default .dropdown-menu.notify-drop .drop-content > li {
    border-bottom: 1px solid #e2e2e2;
    padding: 10px 0px 5px 0px;
  }
  .navbar-default .dropdown-menu.notify-drop .drop-content > li:nth-child(2n+0) {
    background-color: #fafafa;
  }
  .navbar-default .dropdown-menu.notify-drop .drop-content > li:after {
    content: "";
    clear: both;
    display: block;
  }
  .navbar-default .dropdown-menu.notify-drop .drop-content > li:hover {
    background-color: #fcfcfc;
  }
  .navbar-default .dropdown-menu.notify-drop .drop-content > li:last-child {
    border-bottom: none;
  }
  .navbar-default .dropdown-menu.notify-drop .drop-content > li .notify-img {
    float: left;
    display: inline-block;
    width: 45px;
    height: 45px;
    margin: 0px 0px 8px 0px;
  }
  .navbar-default .dropdown-menu.notify-drop .allRead {
    margin-right: 7px;
  }
  .navbar-default .dropdown-menu.notify-drop .rIcon {
    float: right;
    color: #999;
  }
  .navbar-default .dropdown-menu.notify-drop .rIcon:hover {
    color: #333;
  }
  .navbar-default .dropdown-menu.notify-drop .drop-content > li a {
    font-size: 12px;
    font-weight: normal;
  }
  .navbar-default .dropdown-menu.notify-drop .drop-content > li {
    font-weight: bold;
    font-size: 11px;
  }
  .navbar-default .dropdown-menu.notify-drop .drop-content > li hr {
    margin: 5px 0;
    width: 70%;
    border-color: #e2e2e2;
  }
  .navbar-default .dropdown-menu.notify-drop .drop-content .pd-l0 {
    padding-left: 0;
  }
  .navbar-default .dropdown-menu.notify-drop .drop-content > li p {
    font-size: 11px;
    color: #666;
    font-weight: normal;
    margin: 3px 0;
  }
  .navbar-default .dropdown-menu.notify-drop .drop-content > li p.time {
    font-size: 10px;
    font-weight: 600;
    top: -6px;
    margin: 8px 0px 0px 0px;
    padding: 0px 3px;
    border: 1px solid #e2e2e2;
    position: relative;
    background-image: linear-gradient(#fff,#f2f2f2);
    display: inline-block;
    border-radius: 2px;
    color: #B97745;
  }
  .navbar-default .dropdown-menu.notify-drop .drop-content > li p.time:hover {
    background-image: linear-gradient(#fff,#fff);
  }
  .navbar-default .dropdown-menu.notify-drop .notify-drop-footer {
    border-top: 1px solid #e2e2e2;
    bottom: 0;
    position: relative;
    padding: 8px 15px;
  }
  .navbar-default .dropdown-menu.notify-drop .notify-drop-footer a {
    color: #777;
    text-decoration: none;
  }
  .navbar-default .dropdown-menu.notify-drop .notify-drop-footer a:hover {
    color: #333;
  }
        
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'ContiTouch') }}
                </a>
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
                        <?php $user = App\User::find(Auth::user()->id); ?>
                        <button type="button" class="btn btn-primary" data-toggle="popover" title='@foreach ($user->Notifications as $notification) 
                                {{ $notification->markAsRead()}} 
                                  {{$notification->data['procurement_supplier'].' has been '.$notification->data['procurement_status']}}            
                                  @endforeach' data-content="Notifications">Popover</button>



                        <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><button class="btn btn-link" id="btnPopover"  data-toggle="popover" title="Popover title" data-content="Default popover">Notification (<b>{{count($user->unreadNotifications)}}</b>)</button></a>
                                <ul class="dropdown-menu notify-drop">
                                  <div class="notify-drop-title">
                                      <div class="row">
                                        
                                          <div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="tümü okundu."><i class="fa fa-dot-circle-o"></i></a></div>
                                      </div>
                                  </div>
                                  <!-- end notify title -->
                                  <!-- notify content -->
                                  <div class="drop-content">
                                      {{-- <li> --}}
                                            @foreach ($user->Notifications as $notification) 
                                            {{ $notification->markAsRead()}} 
                                              <li><a href="">{{$notification->data['procurement_supplier'].' has been '.$notification->data['procurement_status']}}</a></li>            
                                              @endforeach
                                      {{-- </li> --}}
                                     
                                  </div>
                            
                                </ul>
                              </li>











                                <li class="nav-item"><a href="/posts" class="nav-link">Home</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

        <main class="py-4">
            <div class="container">
                @include('inc.messages')
            </div>
            @yield('content')
        </main>
    </div>
   
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover({
                placement : 'top'
            });
        });
        </script>

</body>
</html>
