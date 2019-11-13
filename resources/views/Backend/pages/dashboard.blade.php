@extends('Backend.master')
@section('heading')
    Dashboard
@endsection
@section('content')
{{--dashWidget--}}

<div class="row">






    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-inline-block">
                    <h5 class="text-muted">Projects</h5>
                    <h2 class="mb-0"> {{count($project)}}</h2>
                </div>
                <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                    <i class="fa fa-folder-open fa-fw fa-sm text-info"></i>
                </div>
            </div>
        </div>
    </div>






    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-inline-block">
                    <h5 class="text-muted">Total Users</h5>
                    <h2 class="mb-0"> 100</h2>
                </div>
                <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                    <i class="fa fa-user fa-fw fa-sm text-primary"></i>
                </div>
            </div>
        </div>
    </div>






    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-inline-block">
                    <h5 class="text-muted">Total Admins</h5>
                    <h2 class="mb-0">{{count($admin)}}</h2>
                </div>
                <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                    <i class="fa fa-user-secret fa-fw fa-sm text-secondary"></i>
                </div>
            </div>
        </div>
    </div>






    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-inline-block">
                    <h5 class="text-muted">Total Earned</h5>
                    <h2 class="mb-0"> $149.00</h2>
                </div>
                <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                    <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
                </div>
            </div>
        </div>
    </div>



</div>

{{--end of dashwidget--}}



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
                                <h5 class="modal-title" id="exampleModalLabel">Project Title</h5>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </a>
                            </div>
                            <form method="post" id="newProject" action="{{route('newProject')}}">
                                {{csrf_field()}}
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Project Name:</label>
                                        <input id="projectName" type="text" class="form-control" name="projectName">
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
                var value = $('#projectName').val();
                if (!value) {
                    $('#msgHere').text('Enter Project Name');
                    e.preventDefault();
                }
            });
        })
    </script>
@endsection