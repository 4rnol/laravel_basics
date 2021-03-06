<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <link href="{{asset('styles/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('styles/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('styles/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('styles/css/style.css')}}" rel="stylesheet">
</head>

<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                                <img alt="image" class="img-circle" src="{{asset('styles/img/profile_small.jpg')}}" />
                                 </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">@yield('username')</strong>
                                 </span> <span class="text-muted text-xs block">@yield('role') <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="#">Account</a></li>

                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>

                <li class="">
                    <a href="{{ route('home') }}"><i class="fa fa-star"></i> <span class="nav-label">{{__('Home')}}</span> </a>
                </li>
                <li class="">
                    <a href="{{ route('users.index') }}"><i class="fa fa-table"></i> <span class="nav-label">{{__('Users Table')}}</span></a>
                </li>
                <li class="">
                    <a href="{{ route('providers.index') }}"><i class="fa fa-table"></i> <span class="nav-label">{{__('Providers Table')}}</span></a>
                </li>
                <li class="">
                    <a href="{{ route('spots.index') }}"><i class="fa fa-table"></i> <span class="nav-label">{{__('Spots Table')}}</span></a>
                </li>
                <li class="">
                    <a href="{{ route('payments.index') }}"><i class="fa fa-table"></i> <span class="nav-label">{{__('Payments Table')}}</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                            class="fa fa-bars"></i> </a>

                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}Log out
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
                </ul>
            </nav>
        </div>
        @yield('content')
    </div>
    @if(Illuminate\Support\Facades\Route::currentRouteName()=='users.index' )
        <a href="{{ route('users.create') }}" type='button' style="bottom:10%;right:5%;position:fixed;z-index:9999;background-color: #060505;padding: 30px;color:#cdc8c8">Create User</a>
    @endif

    @if(Illuminate\Support\Facades\Route::currentRouteName()=='providers.index' )
        <a href="{{route('providers.create')}}" type='button' style="bottom:10%;right:5%;position:fixed;z-index:9999;background-color: #060505;padding: 30px;color:#cdc8c8">Create Provider</a>
    @endif

    @if(Illuminate\Support\Facades\Route::currentRouteName()=='spots.index')
        <a href="{{route('spots.create')}}" type='button' style="bottom:10%;right:5%;position:fixed;z-index:9999;background-color: #060505;padding: 30px;color:#cdc8c8">Create Spot</a>
    @endif
    @if(Illuminate\Support\Facades\Route::currentRouteName()=='payments.index')
        <a href="{{route('payments.create')}}" type='button' style="bottom:10%;right:5%;position:fixed;z-index:9999;background-color: #060505;padding: 30px;color:#cdc8c8">Create payments</a>
    @endif
</div>


<!-- Mainly scripts -->
<script src="{{asset('styles/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('styles/js/bootstrap.min.js')}}"></script>
<script src="{{asset('styles/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('styles/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Flot -->
<script src="{{asset('styles/js/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{asset('styles/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('styles/js/plugins/flot/jquery.flot.spline.js')}}"></script>
<script src="{{asset('styles/js/plugins/flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('styles/js/plugins/flot/jquery.flot.pie.js')}}"></script>

<!-- Peity -->
<script src="{{asset('styles/js/plugins/peity/jquery.peity.min.js')}}"></script>
<script src="{{asset('styles/js/demo/peity-demo.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('styles/js/inspinia.js')}}"></script>
<script src="{{asset('styles/js/plugins/pace/pace.min.js')}}"></script>

<!-- jQuery UI -->
<script src="{{'styles/js/plugins/jquery-ui/jquery-ui.min.js'}}"></script>

<!-- GITTER -->
<script src="{{asset('styles/js/plugins/gritter/jquery.gritter.min.js')}}"></script>

<!-- Sparkline -->
<script src="{{asset('styles/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Sparkline demo data  -->
<script src="{{asset('styles/js/demo/sparkline-demo.js')}}"></script>

<!-- ChartJS-->
<script src="{{asset('styles/js/plugins/chartJs/Chart.min.js')}}"></script>

<!-- Toastr -->
<script src="{{asset('styles/js/plugins/toastr/toastr.min.js')}}"></script>

</body>
</html>
