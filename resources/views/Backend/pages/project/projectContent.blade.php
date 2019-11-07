@extends('Backend.master')
@section('heading')
    <div class="alert alert-success updatedSuccessfully hidden">
        <p>Updated Successfully</p>
    </div>
    <div class="row">
        <div class="col-md-6">

            <a href="#" class="" id="myProjectTitle" data-toggle="modal" data-target="#exampleModalTitle">
                {{$projectTitle->projectName}}
            </a>

            <div class="modal fade" id="exampleModalTitle" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Project Title</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div>
                        {{--<form method="post" id="" action="{{route('projectContentTitle')}}">--}}
                        {{--{{csrf_field()}}--}}
                        <div class="modal-body base1">

                            <div style="text-align:left" class="form-group base2">
                                <label for="recipient-name" class="col-form-label">Title:</label>
                                <input type="hidden" id="myProject_id" name="project_id" value="{{$projectTitle->id}}">
                                <input type="text" id="myContentTitleUpdate" class="form-control"
                                       value="{{$projectTitle->projectName}}" name="contentTitle">
                            </div>
                            <p><code id="msgHere"></code></p>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                            <a href="#" id="updateProject" class="btn btn-primary" data-dismiss="modal">Update</a>
                        </div>
                        {{--</form>--}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6" style="text-align: right">
            <div class="row">
                <div class="col-md-9">
                    <form method="post" action="{{route('previewPdf')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="project_id" value="{{$projectTitle->id}}">
                        <button class="btn btn-default"><i class="fa fa-eye"></i></button>
                    </form>
                </div>
                <div class="col-md-1">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-plus-square"></i> New Content
                    </a>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Content Title</h5>
                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </a>
                                </div>
                                <form method="post" id="" action="{{route('projectContentTitle')}}">
                                    {{csrf_field()}}
                                    <div class="modal-body">

                                        <div style="text-align:left" class="form-group">
                                            <label for="recipient-name" class="col-form-label">Title:</label>
                                            <input type="hidden" name="project_id" value="{{$projectTitle->id}}">
                                            <input type="text" id="" class="form-control" name="contentTitle">
                                        </div>
                                        <p><code id="msgHere"></code></p>

                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                        <button id="" type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="card">
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

        <h5 class="card-header">
            <div class="row">
                <div class="col-md-6">
                    Hoverable Table
                </div>
                <input type="hidden" value="{{$projectTitle->id}}">
                <div style="text-align: right" class="col-md-6">
                    <button id="editUpDown" class="btn btn-primary btn-xs">Edit</button>
                </div>
            </div>
        </h5>
        <div class="card-body">
            <table style="text-align: center" class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>action</th>
                    @if($projectTitle->editContentNo==='1')
                        <th style="text-align: center" class="order">Edit</th>
                    @else
                        <th style="text-align: center" class="hidden order">Edit</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                <?php
                $count = 0;
                ?>
                @foreach($contentTitle as $value)
                    <tr>
                        <th>{{++$count}}</th>
                        <td>
                            {{--update ContentTitle--}}

                            <a href="#" class="" data-toggle="modal" data-target="#exampleModalA{{$count}}">
                                {{$value->contentTitle}}
                            </a>

                            <div class="modal fade" id="exampleModalA{{$count}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Content Title</h5>
                                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </a>
                                        </div>
                                        <form method="post" id="" action="{{route('updateProjectContentTitle')}}">
                                            {{csrf_field()}}
                                            <div class="modal-body">

                                                <div style="text-align:left" class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Title:</label>
                                                    <input type="hidden" name="id"
                                                           value="{{$value->id}}">
                                                    <input type="hidden" name="project_id"
                                                           value="{{$projectTitle->id}}">
                                                    <input type="hidden" name="order_by"
                                                           value="{{$value->order_by}}">
                                                    <input type="text" id="" class="form-control"
                                                           value="{{$value->contentTitle}}" name="contentTitle">
                                                </div>
                                                <p><code id="msgHere"></code></p>

                                            </div>
                                            <div class="modal-footer">
                                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                <button id="" type="submit" class="btn btn-primary">Create</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{--end of Update ContentTitle--}}
                        </td>
                        <td>
                            {{--Content Textarea--}}

                            <a href="#" class="btn btn-primary" data-toggle="modal"
                               data-target="#exampleModal{{$count}}">
                                Content
                            </a>

                            <div class="modal fade" id="exampleModal{{$count}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="margin-left: -200px; width: 1000px;">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Content:</h5>
                                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </a>
                                        </div>
                                        <form method="post" id="" action="{{route('myProjectContent')}}">
                                            {{csrf_field()}}
                                            <div class="modal-body">
                                                <div style="text-align:left" class="form-group">
                                                    <input type="hidden" name="title_id" value="{{$value->id}}">
                                                    <input type="hidden" name="project_id"
                                                           value="{{$projectTitle->id}}">
                                                    @if($value->getContent)
                                                        <textarea name="myProjectContent"
                                                                  id="content-ckeditor{{$count}}" cols="30"
                                                                  rows="10">{{$value->getContent->myProjectContent}}</textarea>
                                                    @else
                                                        <textarea name="myProjectContent"
                                                                  id="content-ckeditor{{$count}}" cols="30"
                                                                  rows="10"></textarea>

                                                    @endif
                                                    <script>
                                                        CKEDITOR.replace('content-ckeditor{{$count}}', {
                                                            filebrowserUploadUrl: '',
                                                            filebrowserUploadMethod: 'form',
                                                            height: 500
                                                        });
                                                    </script>
                                                </div>
                                                <p><code id="msgHere"></code></p>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                                <button id="" type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{--end of content Textarea--}}
                        </td>
                        @if($projectTitle->editContentNo==='1')
                            <td style="text-align: center" class="order">
                        @else
                            <td style="text-align: center" class="hidden order">
                                @endif
                                <a class="btn btn-primary" href="{{route('contentUp',$value->id)}}"><i
                                            class="fas fa-chevron-up"></i></a>
                                <a class="btn btn-primary" href="{{route('contentDown',$value->id)}}"><i
                                            class="fas fa-chevron-down"></i></a>
                                <a class="btn btn-danger" href="{{route('contentDelete',$value->id)}}"><i
                                            class="far fa-trash-alt"></i></a>
                                {{--<button class="up">{{$value->order_by}}</button>--}}
                            </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('my-footer')
    <script>
        $(function () {
            $('#editUpDown').on('click', function () {
                var project_id = $(this).parent().parent().find('input').val();
                var base_url = window.location.origin;
                $.ajax({
                    url: base_url + "/@admin@/api/editContentNo",
                    data: {'project_id': project_id},
                    cache: false,
                    success: function (data) {
                        // console.log(data);
                        $('.order').toggleClass('hidden');
                    }
                });
            });
            $('#updateProject').on('click', function () {
                updateProject();
            });

            function updateProject() {

                var project_id = $('#myProject_id').val();
                var project_name = $('#myContentTitleUpdate').val();
                if (project_name) {
                    var base_url = window.location.origin;
                    $.ajax({
                        url: base_url + "/@admin@/api/updateProject",
                        data: {'project_id': project_id, 'project_name': project_name},
                        cache: false,
                        success: function (data) {
                            $('#myProjectTitle').text(data);
                            $('.updatedSuccessfully').slideDown(function () {
                                setTimeout(function () {
                                    $('.updatedSuccessfully').slideUp();
                                }, 1000);
                            });

                        }
                    });
                }

            }

            $('#myContentTitleUpdate').on('keyup', function (e) {
                if (e.keyCode === 13) {
                    $('#updateProject').click();
                }
            })
        })
    </script>
@endsection
@section('my-header')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

    <style>
        .hidden {
            display: none;
        }
    </style>
@endsection