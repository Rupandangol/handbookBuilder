@extends('Backend.master')
@section('heading')
    <div class="row">
        <div class="col-md-6">
            Project Lists
        </div>
        <div class="col-md-6" style="text-align: right">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-plus-square"></i> New Project
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

                                <div style="text-align:left" class="form-group">
                                    <label for="recipient-name" class="col-form-label">Project Name:</label>
                                    <input type="text" id="projectName" class="form-control" name="projectName">
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
@endsection
@section('content')
    <div id="deleteMsg" class="alert alert-danger" HIDDEN>
        <p>Project Deleted</p>
    </div>
    <div class="card">
        <h5 class="card-header">Manage Projects</h5>

        <div class="card-body">
            <div class="table-responsive ">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Project Name</th>
                        <th style="text-align: center" colspan="2" scope="col">Manage</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projectLists as $key=>$value)
                        <tr>
                            <th scope="row">{{++$key}}</th>
                            <td class="myProjectName">{{$value->projectName}}</td>
                            <input type="hidden" value="{{$value->id}}">
                            <td style="text-align: center">
                                <button type="button" class="btn btn-danger projectDelete"><i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                            <td style="text-align: center">
                            <a href="{{route('projectContent',$value->id)}}" class="btn btn-info"><i class="fa fa-level-down-alt"></i></a>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('my-footer')
    <script>
        $(function () {
            $('.projectDelete').on('click', function () {
                var row = $(this).parent().parent();
                var project_id = row.find('input').val();
                var base_url = window.location.origin;
                $.ajax({
                    url: base_url + "/@admin@/api/deleteProject",
                    data: {'project_id': project_id},
                    cache: false,
                    success: function (data) {
                        row.remove();
                    }
                });
                $('#deleteMsg').removeAttr('hidden');
                $('#deleteMsg').slideDown(function () {
                    setTimeout(function () {
                        $('#deleteMsg').slideUp();
                    }, 1000);
                });
            });
            $('#projectSubmit').on('click',function (e) {
                var value=$('#projectName').val();
                if(!value){
                    $('#msgHere').text('Enter Project Name');
                    e.preventDefault();
                }
            })
        })
    </script>
@endsection