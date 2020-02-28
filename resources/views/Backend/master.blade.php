@include('Backend.layouts.header')
<body>
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <a style="color: blue" class="navbar-brand" href="{{route('dashboard')}}"><i class="fas fa-book"></i>
                Builder</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-right-top">
                    {{--<li class="nav-item">--}}
                    {{--<div id="custom-search" class="top-search-bar">--}}
                    {{--<input class="form-control" type="text" placeholder="Search..">--}}
                    {{--</div>--}}
                    {{--</li>--}}

                    <li class="nav-item dropdown notification">
                        <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span
                                class="indicator"></span></a>
                        <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                            <li>
                                <div class="notification-title"> Notification</div>
                                <div class="notification-list">
                                    <div class="list-group">
                                        @if($notification??'')
                                            @forelse($notification as $value)
                                                <a href="{{route('userInfo-backend',$value->getAUser->id)}}" class="list-group-item list-group-item-action active">
                                                    <div class="notification-info">
                                                        <div class="notification-list-user-img"><img src="" alt=""
                                                                                                     class="user-avatar-md rounded-circle">
                                                        </div>
                                                        <div class="notification-list-user-block"><span
                                                                class="notification-list-user-name">{{$value->getAUser->getUserInfo->companyName}}</span> has booked a appointment to
                                                            <span
                                                                class="notification-list-user-name">{{$value->getALawyer->username}}</span>
                                                            <div class="notification-date">{{\Carbon\Carbon::parse($value->created_at)->diffForHumans()}}</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            @empty
                                            @endforelse
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="list-footer">
{{--                                    <a href="#">View all notifications</a>--}}
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown connection">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                            <li class="connection-list">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                        <a href="#" class="connection-item"><img src="" alt=""> <span>Github</span></a>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                        <a href="#" class="connection-item"><img src="" alt="">
                                            <span>Dribbble</span></a>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                        <a href="#" class="connection-item"><img src="" alt=""> <span>Dropbox</span></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                        <a href="#" class="connection-item"><img src="" alt="">
                                            <span>Bitbucket</span></a>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                        <a href="#" class="connection-item"><img src=""
                                                                                 alt=""><span>Mail chimp</span></a>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                        <a href="#" class="connection-item"><img src="" alt=""> <span>Slack</span></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="conntection-footer"><a href="#">More</a></div>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown nav-user">
                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false">{{ucfirst(Auth::guard('admin')->user()->username)}}</a>
                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                             aria-labelledby="navbarDropdownMenuLink2">
                            <div class="nav-user-info">
                                <h5 class="mb-0 text-white nav-user-name">
                                    {{ucfirst(Auth::guard('admin')->user()->username)}}</h5>
                                <span class="status"></span><span class="ml-2">Available</span>
                            </div>
                            <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                            <a class="dropdown-item" href="{{route('admin-logout')}}"><i
                                    class="fas fa-power-off mr-2"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    <div class="nav-left-sidebar" style="
    /*background-image: url('/uploads/backgroundImage/building.jpg');color: white;*/

">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-divider">
                            Menu
                        </li>
                        <li class="nav-item ">

                            <a class="nav-link {{$dashboard_active ?? ''}}" href="{{route('dashboard')}}"><i
                                    class="fa fa-tachometer-alt"></i>Dashboard</a>

                        </li>
                        @if(Auth::guard('admin')->user()->privileges==='Super Admin')
                            <li class="nav-item ">
                                <a class="nav-link {{$admin_active??''}}" href="#" data-toggle="collapse"
                                   aria-expanded="false"
                                   data-target="#submenu-1" aria-controls="submenu-1"><i
                                        class="fa fa-fw fa-user-circle"></i>Admin</a>
                                <div id="submenu-1" class="collapse submenu" style="background-color: white">
                                    <ul class="nav flex-column">
                                        <li class="nav-item {{$addAdmin_active??''}}">
                                            <a class="nav-link " href="{{route('addAdmin')}}">Add
                                                Admin</a>
                                        </li>
                                        <li class="nav-item {{$manageAdmin_active??''}}">
                                            <a class="nav-link" href="{{route('manageAdmin')}}">Manage Admin</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                        <li class="nav-item">

                            <a class="nav-link {{$userList_active??''}}" href="{{route('myUserList')}}"><i
                                    class="fa fa-users"></i>Users</a>

                        </li>
                        @if(Auth::guard('admin')->user()->privileges==='Lawyer')
                            <li class="nav-item">

                                <a class="nav-link {{$lawyerProfile_active??''}}" href="{{route('lawyerProfileView')}}"><i
                                        class="far fa-id-card"></i>Profile</a>
                                {{--                                <a class="nav-link {{$lawyerProfile_active??''}}" href="{{route('lawyerProfile')}}"><i class="far fa-id-card"></i>Profile</a>--}}

                            </li>
                        @endif



                        {{--                        features--}}
                        <li class="nav-divider">
                            Features
                        </li>
                        @if(Auth::guard('admin')->user()->privileges!='Lawyer')

                            <li class="nav-item">

                                <a class="nav-link {{$contactReview_active??''}}" href="{{route('contactReview')}}"><i
                                        class="fa fa-address-book"></i>Contact Reviews
                                    <?php
                                    $review_count = 0;
                                    $myCount = 0;
                                    ?>
                                    @if($contactReview??'')
                                        @foreach($contactReview as $value)
                                            @php($review_count= $review_count+1)
                                            @foreach($value->getViewed as $myValue)
                                                @if($myValue->admin_id==Auth::guard('admin')->user()->id)
                                                    @php($myCount=$myCount+1)
                                                @endif
                                            @endforeach
                                        @endforeach
                                        <span>
                                            @if($review_count-$myCount!=0)
                                                <code style="font-size: 20px"><i>!</i></code>
                                            @endif
                                        </span>
                                    @endif
                                </a>

                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link {{$projectList_active??''}}" href="#" data-toggle="collapse"
                               aria-expanded="false"
                               data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i>Project</a>
                            <div id="submenu-6" class="collapse submenu" style="background-color: white">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('projectLists')}}">All Project</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">

                            <a class="nav-link " href="{{route('FAQView')}}"><i
                                    class="fa fa-question-circle"></i>FAQ</a>

                        </li>
                        @if(Auth::guard('admin')->user()->privileges!='Lawyer')
                            <li class="nav-item ">

                                <a class="nav-link {{$viewLog_active??''}}" href="{{route('viewLog')}}"><i
                                        class="fa fa-history"></i>Admin-Log</a>

                            </li>
                            <li class="nav-item ">

                                <a class="nav-link {{$khaltiLogView_active??''}}" href="{{route('khaltiLogView')}}"><i
                                        class="fa fa-history"></i>Khalti-Log</a>

                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
        @yield('fullPage')
        <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">@yield('heading')</h2>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
    {{--<div class="footer">--}}
    {{--<div class="container-fluid">--}}
    {{--<div class="row">--}}
    {{--<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">--}}
    {{--Copyright © 2019 TalentConnects. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">TalentConnects</a>.--}}
    {{--</div>--}}
    {{--<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">--}}
    {{--<div class="text-md-right footer-links d-none d-sm-block">--}}
    {{--<a href="javascript: void(0);">About</a>--}}
    {{--<a href="javascript: void(0);">Support</a>--}}
    {{--<a href="javascript: void(0);">Contact Us</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end main wrapper -->

@include('Backend.layouts.footer')
