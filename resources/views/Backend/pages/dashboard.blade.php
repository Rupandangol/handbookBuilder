@extends('Backend.master')
@section('heading')
    Dashboard
@endsection
@section('content')
    {{--dashWidget--}}

    <div class="row">


        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <a href="{{route('projectLists')}}">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h5 class="text-muted">Projects</h5>
                            <h2 class="mb-0"> {{count($project)}}</h2>
                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                            <i class="fa fa-folder-open fa-fw fa-sm text-info"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>


        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <a href="{{route('myUserList')}}">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h5 class="text-muted">Total Users</h5>
                            <h2 class="mb-0">{{count($user_list)}}</h2>
                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                            <i class="fa fa-user fa-fw fa-sm text-primary"></i>
                        </div>
                    </div>
                </a>

            </div>
        </div>

        @if(Auth::guard('admin')->user()->privileges!='Lawyer')
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <a href="{{route('manageAdmin')}}">
                        <div class="card-body">
                            <div class="d-inline-block">
                                <h5 class="text-muted">Total Admins</h5>
                                <h2 class="mb-0">{{count($admin)}}</h2>
                            </div>
                            <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                                <i class="fa fa-user-secret fa-fw fa-sm text-secondary"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>


            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <a href="{{route('khaltiLogView')}}">
                        <div class="card-body">
                            <div class="d-inline-block">
                                <h5 class="text-muted">Total Earned</h5>
                                <h2 class="mb-0">Rs {{$totalEarned}}</h2>
                            </div>
                            <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                                <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endif

    </div>

    {{--end of dashwidget--}}
    {{--    dashdownload--}}
    <div class="row">
        <div class="col-lg-12">
            <div class="section-block">
                <h3 class="section-title">Downloads</h3>
            </div>
        </div>
        @if(Auth::guard('admin')->user()->privileges!='Lawyer')
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card campaign-card text-center">
                <div class="card-body">
                    <div class="campaign-img"><i class="fa fa-arrow-circle-down text-info fa-5x"></i></div>
                    <div class="campaign-info">
                        <h3 class="mb-1">Total Free Download:</h3>
                        <h2 class="mb-0">{{count($freeDownloads)}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card campaign-card text-center">
                <div class="card-body">
                    <div class="campaign-img"><i class="fa fa-money-bill-alt text-success fa-5x"></i></div>
                    <div class="campaign-info">
                        <h3 class="mb-1">Total Paid Download:</h3>
                        <h2 class="mb-0">{{count($paidDownloads)}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card campaign-card text-center">
                <div class="card-body">
                    <div class="campaign-img">
                        <div class="row">
                            <div class="col-md-6">
                                <i style="float: right" class="fa fa-arrow-circle-down text-info fa-5x"></i>
                            </div>
                            <div class="col-md-6">
                                <i style="float: left" class="fa fa-money-bill-alt text-success fa-5x"></i>

                            </div>
                        </div>


                    </div>
                    <div class="campaign-info">
                        <h3 class="mb-1">Total Download:</h3>
                        <h2 class="mb-0">{{count($TotalDownloads)}}</h2>
                    </div>
                </div>
            </div>
        </div>
@else
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card campaign-card text-center">
                <div class="card-body">
                    <div class="campaign-img"><i class="fa fa-money-bill-alt text-success fa-5x"></i></div>
                    <div class="campaign-info">
                        <h3 class="mb-1">Approved:</h3>
                        <h2 class="mb-0">{{count($paidDownloads)}}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card campaign-card text-center">
                <div class="card-body">
                    <div class="campaign-img"><i class="fa fa-money-bill-alt text-success fa-5x"></i></div>
                    <div class="campaign-info">
                        <h3 class="mb-1">Total Paid Download:</h3>
                        <h2 class="mb-0">{{count($paidDownloads)}}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card campaign-card text-center">
                <div class="card-body">
                    <div class="campaign-img"><i class="fa fa-money-bill-alt text-success fa-5x"></i></div>
                    <div class="campaign-info">
                        <h3 class="mb-1">Total Paid Download:</h3>
                        <h2 class="mb-0">{{count($paidDownloads)}}</h2>
                    </div>
                </div>
            </div>
        </div>
@endif
    </div>

    {{--end of dashdownload--}}


    {{--createProject    --}}
    <div class="card">
        <h5 class="card-header">Create New Project</h5>
        <div class="card-body">
            <div class="">
                <h4>Quick Create</h4>

                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-magic"></i> New Project
                </a>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Employee Handbook</h5>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </a>
                            </div>
                            <form method="post" id="newProject" action="{{route('newProject')}}">
                                {{csrf_field()}}
                                <div class="modal-body">

                                    <div style="text-align:left" class="form-group">

                                        <label for="publicOrPrivate" class="col-form-label">Company Type:</label>
                                        <select name="publicOrPrivate" class="form-control">
                                            <option>Public</option>
                                            <option>Private</option>
                                        </select>

                                        <label for="category" class="col-form-label">Category:</label>
                                        <input type="text" id="category" class="form-control" name="category">

                                        <label for="type" class="col-form-label">Type:</label>
                                        <select name="type" class="form-control">
                                            <option>Handbook</option>
                                            <option>Document</option>
                                        </select>

                                        <label for="language" class="col-form-label">Language:</label>
                                        <select name="language" class="form-control" id="input-select">
                                            <option>Nepali</option>
                                            <option>English</option>
                                        </select>

                                        <label for="price" class="col-form-label">Price: <code style="color: #2980b9">('Free'
                                                or 'Price amount in Rupees')</code></label>
                                        <input type="text" name="price" class="form-control">
                                        <label for="about" class="col-form-label">About:</label>
                                        <textarea class="form-control" name="about" id="project_about" cols="30"
                                                  rows="10"></textarea>

                                    </div>

                                    <p><code id="msgHere"></code></p>

                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                    <button id="projectSubmit" type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--end of createProject--}}

@endsection
@section('my-footer')
    <script>
        $(function () {
            $('#projectSubmit').on('click', function (e) {
                var value = $('#category').val();
                if (!value) {
                    $('#msgHere').text('Enter category');
                    e.preventDefault();
                }
            });
        })
    </script>
@endsection
