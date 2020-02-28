@include('Frontend.layouts.header')
<body style="position: relative;min-height: 100vh">

<div style="background-color: #3498db " class="header-top-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="logo-area">
                    <a href="#">
                        <h1 style="color: whitesmoke;"><img src="{{URL::to('/uploads/logo/logo4.png')}}"
                                                            style="width: 40px;height: 40px;" alt="">&nbsp; <span
                                style="margin-top: 2px">Document Builder</span></h1>
                        {{--<img src="img/logo/logo.png" alt="asdf"/>--}}
                    </a>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="header-top-menu">
                    <ul class="nav navbar-nav notika-top-nav">
                        {{--<li class="nav-item dropdown">--}}
                        {{--<a href="#" data-toggle="dropdown" role="button" aria-expanded="false"--}}
                        {{--class="nav-link dropdown-toggle"><span><i--}}
                        {{--class="notika-icon notika-search"></i></span></a>--}}
                        {{--<div role="menu" class="dropdown-menu search-dd animated flipInX">--}}
                        {{--<div class="search-input">--}}
                        {{--<i class="notika-icon notika-left-arrow"></i>--}}
                        {{--<input type="text"/>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</li>--}}
                        {{--<li  class="nav-item dropdown">--}}
                        {{--<a href="#" id="msgColor" data-toggle="dropdown" role="button" aria-expanded="false"--}}
                        {{--class="nav-link dropdown-toggle"><span><i class="notika-icon notika-mail"></i></span></a>--}}
                        {{--<div role="menu" class="dropdown-menu message-dd animated swing">--}}
                        {{--<div class="hd-mg-tt">--}}
                        {{--<h2>Messages</h2>--}}
                        {{--</div>--}}
                        {{--<div class="hd-message-info">--}}
                        {{--<a href="#">--}}
                        {{--<div class="hd-message-sn">--}}
                        {{--<div class="hd-message-img">--}}
                        {{--<img src="" alt=""/>--}}
                        {{--</div>--}}
                        {{--<div class="hd-mg-ctn">--}}
                        {{--<h3>David Belle</h3>--}}
                        {{--<p>Cum sociis natoque penatibus et magnis dis parturient montes</p>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</a>--}}
                        {{--</div>--}}
                        {{--<div class="hd-mg-va">--}}
                        {{--<a href="#">View All</a>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</li>--}}
                        @if(Auth::guard('userList')->user())
                            <li class="nav-item nc-al"><a id="logoutColor" href="#" data-toggle="dropdown" role="button"
                                                          aria-expanded="false" class="nav-link dropdown-toggle"><span
                                        style="font-size: 15px">{{ucfirst(Auth::guard('userList')->user()->username)}}</span>

                                </a>
                                <div role="menu" class="dropdown-menu message-dd notification-dd animated fadeIn">
                                    <div>
                                        <div class="container">
                                            <a href="{{route('user-logout')}}">Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @else
                            <li class="nav-item nc-al">
                                <a id="logoutColor" href="{{url('/loginUser')}}" role="button" class="nav-link"><span
                                        style="font-size: 15px">Sign In</span>

                                </a>
                            </li>
                            <li class="nav-item nc-al">
                                <a id="logoutColor" href="{{url('/register')}}" role="button" class="nav-link"><span
                                        style="font-size: 15px">Sign Up</span>

                                </a>
                            </li>
                        @endif
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>

@if(Auth::guard('userList')->user())

    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#" href="#">Home</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="{{route('frontend-dashboard')}}">Dashboard One</a></li>
                                        {{--                                        <li><a href="index-2.html">Dashboard Two</a></li>--}}
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#" href="#">Document</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="{{route('builderList')}}">Builder List</a></li>
                                        <li><a href="">My List</a></li>


                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#" href="#">Pricing</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="{{route('priceList')}}">Lists</a></li>

                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#" href="#">Contact</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="{{route('contact')}}">Contact Us</a></li>

                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#" href="#">FAQ</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="">FAQ</a></li>

                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#" href="#">Setting</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="{{route('userInfoForm')}}">User Info</a></li>
                                        <li><a href="{{route('userProfile')}}">Profile</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li class="{{$dashboard_active??''}}"><a  href="{{route('frontend-dashboard')}}"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <li class=" {{$handbookList_active??''}} "><a data-toggle="tab" href="#handbookBuilder"><i class="notika-icon notika-star"></i>
                                Document
                                Builder</a>
                        </li>
                        <li class="{{$priceList_active??''}}"><a href="{{route('priceList')}}"><i class="notika-icon notika-menus"></i> Pricing</a>
                        </li>
                        <li class="{{$contact_active??''}}"><a href="{{route('contact')}}"><i class="notika-icon notika-support"></i> Contact</a>
                        </li>


                        <li class="{{$FAQ_active??''}}"><a href="{{route('FAQ')}}"><i class="notika-icon notika-arrow-right"></i> FAQ</a>
                        </li>

                        <li  class="{{$userInfoForm_active??''}}"><a data-toggle="tab" href="#mySettings"><i class="notika-icon notika-settings"></i> Settings</a>
                        </li>

                    </ul>
                    <div class="tab-content custom-menu-content">
{{--                        <div id="Home"--}}
{{--                             class="tab-pane in notika-tab-menu-bg animated flipInX {{$dashboard_active??''}}">--}}
{{--                            <ul class="notika-main-menu-dropdown">--}}
{{--                                <li><a href="{{route('frontend-dashboard')}}">Dashboard One</a>--}}
{{--                                </li>--}}
{{--                                --}}{{--                                <li><a href="#">Dashboard Two</a>--}}
{{--                                --}}{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                        <div id="handbookBuilder"
                             class="tab-pane notika-tab-menu-bg animated flipInX {{$handbookList_active??''}} ">
                            <ul class="notika-main-menu-dropdown ">
                                <li class="mySubNavbar"><a href="{{route('builderList')}}">Builder List</a></li>
                                <li  class="mySubNavbar"><a href="{{route('myList')}}">My List</a></li>

                            </ul>
                        </div>
{{--                        <div id="pricing"--}}
{{--                             class="tab-pane notika-tab-menu-bg animated flipInX {{$priceList_active??''}}">--}}
{{--                            <ul class="notika-main-menu-dropdown">--}}
{{--                                <li><a href="{{route('priceList')}}">List</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div id="contact" class="tab-pane notika-tab-menu-bg animated flipInX {{$contact_active??''}}">--}}
{{--                            <ul class="notika-main-menu-dropdown">--}}
{{--                                <li><a href="{{route('contact')}}">Contact Us</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div id="FAQ" class="tab-pane notika-tab-menu-bg animated flipInX {{$FAQ_active??''}}">--}}
{{--                            <ul class="notika-main-menu-dropdown">--}}
{{--                                <li><a href="{{route('FAQ')}}">FAQ</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                        <div id="mySettings"
                             class="tab-pane notika-tab-menu-bg animated flipInX {{$userInfoForm_active??''}}">
                            <ul class="notika-main-menu-dropdown">
                                <li class="mySubNavbar"><a href="{{route('userInfoForm')}}">User Info</a>
                                </li>
                                <li class="mySubNavbar"><a href="{{route('userProfile')}}">Profile</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="breadcomb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        @yield('icon-header')
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>@yield('upper-header')</h2>
                                        <p>@yield('lower-header')</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                <div class="breadcomb-report">
                                    @yield('button-header')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif
<div class="colr-area">
    @yield('before-content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @yield('after-content')
</div>

@if(Auth::guard('userList')->user())
    <br><br>
    <br><br>
    <div style="width: 100%;position: absolute;bottom: 0">
        <div style="background-color: #3498db;" class="footer-copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p>Copyright ©
                                <a href="#">TalentConnects</a>. All rights reserved.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div style="height: 100px;background-color:#2d3436;text-align: center;color: white">

        <h3 style="padding-top: 20px"><i class="notika-icon notika-star"></i>
            Document Builder</h3>
        @2020 All Rights Reserved

    </div>
@endif
@include('Frontend.layouts.footer')
