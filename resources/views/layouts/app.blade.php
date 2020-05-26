<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">

     <!--select2 -->
    <link rel="stylesheet" href="{{ URL::asset('css/select2.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

    @yield('css')
</head>

<body class="skin-blue sidebar-mini">
@if (!Auth::guest())
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->

            @if(Auth::user()->role==1)
            <a href="#" class="logo">
                <b>Admin</b>
            </a>
            @endif
            
            @if(Auth::user()->role==2)
            <a href="#" class="logo">
                <b>Teacher</b>
            </a>
            @endif
            
            @if(Auth::user()->role==3)
            <a href="#" class="logo">
                <b>Student</b>
            </a>
            @endif
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
               

                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu" style="float:right;">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                @if(Auth::user()->role == 2)
                                <img src="{{url('storage/teachers/'.Auth::user()->id.'/'.$teacher->first()->img_filename)}}" style="width: 50px;height:50px;" class="img-circle" alt="User Image"/>
                                  @endif


                                  @if(Auth::user()->role == 3)
                                  @if($admission->first->image!=null)
                                  <img src="{{url('storage/students/'.Auth::user()->id.'/'.$admission->first()->image)}}" style="width: 50px;height:50px;" class="img-circle" alt="User Image"/>
                                  @else
                                  <img src="{{url('storage/user')}}" style="width: 50px;height:50px;" class="img-circle" alt="User Image"/>
                                  @endif
                                   @endif

                                  
                                  @if(Auth::user()->role == 1)
                                  <img src="{{url('storage/user')}}"  style="width: 50px;height:50px;" class="img-circle" alt="User Image"/>
                                  @endif

                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs" >{{ Auth::user()->name }}</span>
                               
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">

                                @if(Auth::user()->role == 2)
                                <img src="{{url('storage/teachers/'.Auth::user()->id.'/'.$teacher->first()->img_filename)}}" style="width: 50px;height:50px;" class="img-circle" alt="User Image"/>
                                @endif

                                
                                  @if(Auth::user()->role == 3)
                                  @if($admission->first->image!=null)
                                  <img src="{{url('storage/students/'.Auth::user()->id.'/'.$admission->first()->image)}}" style="width: 50px;height:50px;" class="img-circle" alt="User Image"/>
                                  @else
                                  <img src="{{url('storage/user')}}" style="width: 50px;height:50px;" class="img-circle" alt="User Image"/>
                                  @endif
                                  @endif

                                 @if(Auth::user()->role == 1)
                                  <img src="{{url('storage/user')}}"  style="width: 50px;height:50px;" class="img-circle" alt="User Image"/>
                                  @endif
                                  
                                    <p>
                                        {{ Auth::user()->name }}
                                        <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                    @if(Auth::user()->role==2)
                                        <a href="/profile_teacher/{{Auth::user()->teacher->id}}" class="btn btn-default btn-flat">Profile</a>
                                    @endif
                                    @if(Auth::user()->role==3)
                                        <a href="/profile_parent/{{Auth::user()->admission->id}}" class="btn btn-default btn-flat">Profile</a>
                                    @endif

                                    @if(Auth::user()->role==1)
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    @endif
                                    </div>
                                    <div class="pull-right">
                                      
                                        <a href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Sign out
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Main Footer -->
        
    </div>
@else
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->

                @if(Auth::user()->role==1)
                <a class="navbar-brand" href="{{ url('/') }}">
                    Admin
                </a>
                @endif

                @if(Auth::user()->role==2)
                <a class="navbar-brand" href="{{ url('/') }}">
                   Teacher
                </a>
                @endif


                @if(Auth::user()->role==1)
                <a class="navbar-brand" href="{{ url('/') }}">
                   Student
                </a>
                @endif
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- jQuery 3.1.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>


    <script src="{{ URL::asset('js/select2.js') }} "></script>
    @yield('footerscipts')
    @stack('scripts')
</body>
</html>