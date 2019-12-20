@extends('Backend.master')
@section('my-header')
    <style>
        .hidden {
            display: none;
        }

        #myPrice_Language {
            font-size: 15px;
        }

        .editPLA {
            cursor: pointer;
        }

        .editPLA:hover {
            background-color: #27ae60;
        }

    </style>
@endsection
@section('heading')
    <div class="alert alert-success updatedSuccessfully hidden">
        <p>Updated Successfully</p>
    </div>
    <div class="row">
        <div class="col-md-6">

            <a href="#" class="" id="myProjectTitle" data-toggle="modal" data-target="#exampleModalTitle">
                {{ucfirst($projectTitle->category)}}
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
                        <div class="modal-body base1">
                            <div style="text-align:left" class="form-group base2">
                                <label for="recipient-name" class="col-form-label">Title:</label>
                                <input type="hidden" id="myProject_id" name="project_id" value="{{$projectTitle->id}}">
                                <input type="text" id="myCategory" class="form-control"
                                       value="{{$projectTitle->category}}" name="contentTitle">
                            </div>
                            <p><code id="msgHere"></code></p>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                            <a href="#" id="updateProject" class="btn btn-primary" data-dismiss="modal">Update</a>
                        </div>
                    </div>
                </div>
            </div>
            <p id="myPrice_Language">
                Price:
                <span id="editPrice" class="label label-primary editPLA">{{$projectTitle->price}}</span><br>
                Language:
                <span id="editLanguage" class="label label-primary editPLA">{{$projectTitle->language}}</span> <br>
                Edit About:
                <span id="editAbout" class="label label-primary editPLA">About</span>
            </p>

        </div>
        <div class="col-md-6" style="text-align: right">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-8">
                            @if(Auth::guard('admin')->user()->privileges==='Super Admin')
                                <form method="post" action="{{route('deleteProject')}}">
                                    {{csrf_field()}}
                                    <button class="btn btn-danger" name="project_id" value="{{$projectTitle->id}}"
                                            type="submit"><i
                                                class="fa fa-trash-alt"></i></button>
                                </form>
                            @endif

                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <form method="post" action="{{route('previewPdf')}}">
                                        {{csrf_field()}}
                                        <input type="hidden" name="project_id" value="{{$projectTitle->id}}">
                                        <button class="btn btn-default"><i class="fa fa-eye"></i></button>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <form method="post" action="{{route('previewPdf')}}">
                                        {{csrf_field()}}
                                        <input type="hidden" name="project_id" value="{{$projectTitle->id}}">
                                        <button class="btn btn-info"><i class="fa fa-file-pdf"></i></button>
                                    </form>
                                </div>
                                <div class="col-md-4">

                                    <a class="word-export btn btn-primary"
                                       href="{{route('downloadWord',$projectTitle->id)}}"><i
                                                class="fa fa-file-word"></i></a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-3">
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
            <div class="alert alert-success sessionValue">
                {{session('success')}}
            </div>
        @endif

        <h5 class="card-header">
            <div class="row">
                <div class="col-md-6">
                    CONTENTS
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
                    <th>Content</th>
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
                @forelse($contentTitle as $value)
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
                            <a href="{{route('myContent',$value->id)}}" class="btn btn-default"><i
                                        class="fa fa-file-alt fa-2x"></i></a>
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
                @empty
                    <tr>
                        <td colspan="4" style="text-align: center">
                            <code>Create New Content</code>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('my-footer')
    <script src="{{URL::to('js/projectContent.js')}}"></script>

@endsection