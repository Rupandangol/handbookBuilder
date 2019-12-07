@include('Frontend.layouts.header')
<body style="height: 100%;">

<div class="header-top-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="logo-area">
                    <a href="#">
                        <h1 style="color: whitesmoke;">Handbook Builder</h1>
                        {{--<img src="img/logo/logo.png" alt="asdf"/>--}}
                    </a>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="header-top-menu">
                    <ul class="nav navbar-nav notika-top-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                               class="nav-link dropdown-toggle"><span><i
                                            class="notika-icon notika-search"></i></span></a>
                            <div role="menu" class="dropdown-menu search-dd animated flipInX">
                                <div class="search-input">
                                    <i class="notika-icon notika-left-arrow"></i>
                                    <input type="text"/>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                               class="nav-link dropdown-toggle"><span><i class="notika-icon notika-mail"></i></span></a>
                            <div role="menu" class="dropdown-menu message-dd animated swing">
                                <div class="hd-mg-tt">
                                    <h2>Messages</h2>
                                </div>
                                <div class="hd-message-info">
                                    <a href="#">
                                        <div class="hd-message-sn">
                                            <div class="hd-message-img">
                                                <img src="" alt=""/>
                                            </div>
                                            <div class="hd-mg-ctn">
                                                <h3>David Belle</h3>
                                                <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="hd-mg-va">
                                    <a href="#">View All</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item nc-al"><a href="#" data-toggle="dropdown" role="button"
                                                      aria-expanded="false" class="nav-link dropdown-toggle"><span
                                        style="font-size: 15px">{{ucfirst(Auth::guard('userList')->user()->username)}}</span>
                                <div class="spinner4 spinner-4"></div>
                                <div class="ntd-ctn"><span>3</span></div>
                            </a>
                            <div role="menu" class="dropdown-menu message-dd notification-dd animated swing">

                                <div class="hd-message-info">
                                    <a href="#">
                                        <div class="hd-message-sn">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a class="btn btn-info"
                                                       href=""><i
                                                                class="notika-icon notika-support"></i> Profile</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a class="btn btn-danger"
                                                       href="{{route('user-logout')}}"><i
                                                                class="notika-icon notika-next"></i> logout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            <li><a data-toggle="collapse" data-target="#" href="#">Home</a>
                                <ul class="collapse dropdown-header-top">
                                    <li><a href="index.html">Dashboard One</a></li>
                                    <li><a href="index-2.html">Dashboard Two</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#" href="#">Handbook</a>
                                <ul class="collapse dropdown-header-top">
                                    <li><a href="index.html">Category</a></li>


                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#" href="#">Pricing</a>
                                <ul class="collapse dropdown-header-top">
                                    <li><a href="index.html">Lists</a></li>

                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#" href="#">Resources</a>
                                <ul class="collapse dropdown-header-top">
                                    <li><a href="index.html">Blogs</a></li>

                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#" href="#">Setting</a>
                                <ul class="collapse dropdown-header-top">
                                    <li><a href="{{route('userInfoForm')}}">User Info</a></li>

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
                    <li><a data-toggle="tab" href="#Home"><i class="notika-icon notika-house"></i> Home</a>
                    </li>
                    <li><a data-toggle="tab" href="#handbookBuilder"><i class="notika-icon notika-star"></i> Handbook
                            Builder</a>
                    </li>
                    <li><a data-toggle="tab" href="#pricing"><i class="notika-icon notika-menus"></i> Pricing</a>
                    </li>
                    <li><a data-toggle="tab" href="#mySettings"><i class="notika-icon notika-settings"></i> Settings</a>
                    </li>

                </ul>
                <div class="tab-content custom-menu-content">
                    <div id="Home" class="tab-pane in notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="{{route('frontend-dashboard')}}">Dashboard One</a>
                            </li>
                            <li><a href="#">Dashboard Two</a>
                            </li>
                        </ul>
                    </div>
                    <div id="handbookBuilder" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="{{route('handbookList')}}">Categories</a>
                            </li>
                        </ul>
                    </div>
                    <div id="pricing" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="#">List</a>
                            </li>
                        </ul>
                    </div>
                    <div id="mySettings" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="{{route('userInfoForm')}}">User Info</a>
                            </li>
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


<div class="colr-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>


<div class="footer-copyright-area">
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

@include('Frontend.layouts.footer')