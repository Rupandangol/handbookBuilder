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
    {{--    <script src="https://cdn.ckeditor.com/4.13.1/basic/ckeditor.js"></script>--}}

@endsection
@section('heading')
    <div class="alert alert-success updatedSuccessfully hidden">
        <p>Updated Successfully</p>
    </div>
    <div class="alert alert-danger updatedFailed hidden">
        <p>Price should be numeric or Free</p>
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
                            <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
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
                <a href="" data-toggle="modal" data-target="#exampleModalTitleEditPriceModel"><span id="editPrice"
                                                                                                    class="label label-primary editPLA">{{$projectTitle->price}}</span></a>
                &nbsp;&nbsp;&nbsp; Language:
                <a href="" data-toggle="modal" data-target="#exampleModalTitleEditLanguageModel"><span id="editLanguage"
                                                                                                       class="label label-primary editPLA">{{$projectTitle->language}}</span>
                </a>
                &nbsp;&nbsp;&nbsp; Edit About:
                <a href="" data-toggle="modal" data-target="#exampleModalTitleEditAboutModel"><span id="editAbout"
                                                                                                    class="label label-primary editPLA">About</span>
                </a>&nbsp;&nbsp;&nbsp; Type :
                <a href="" data-toggle="modal" data-target="#exampleModalTitleEditTypeModel"><span id="editType"
                                                                                                   class="label label-primary editPLA">{{$projectTitle->publicOrPrivate .' '. $projectTitle->type}}</span><br>
                </a>
            </p>
            {{--editPrice Model--}}
            <div class="modal fade" id="exampleModalTitleEditPriceModel" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Price</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div>
                        <div class="modal-body base1">
                            <div style="text-align:left" class="form-group base2">
                                <label for="recipient-name" class="col-form-label">Price: Rs <code
                                        style="color: #0f74a8">('Free' or Price)</code></label>
                                <input type="text" id="myEditPrice" class="form-control"
                                       value="{{$projectTitle->price}}" name="contentTitle">
                            </div>
                            <p><code id="msgHere"></code></p>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                            <a href="#" id="updatePrice" class="btn btn-primary" data-dismiss="modal">Update</a>
                        </div>
                    </div>
                </div>
            </div>
            {{--end of editPrice Model--}}

            {{--editLanguage Model--}}
            <div class="modal fade" id="exampleModalTitleEditLanguageModel" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Language</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div>
                        <div class="modal-body base1">
                            <div style="text-align:left" class="form-group base2">
                                <label for="recipient-name" class="col-form-label">Language:</label>
                                <select name="myEditLanguage" class="form-control" id="myEditLanguage">
                                    <option @if($projectTitle->language==='Nepali') selected @endif value="Nepali">
                                        Nepali
                                    </option>
                                    <option @if($projectTitle->language==='English') selected @endif value="English">
                                        English
                                    </option>
                                </select>
                            </div>
                            <p><code id="msgHere"></code></p>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                            <a href="#" id="updateLanguage" class="btn btn-primary" data-dismiss="modal">Update</a>
                        </div>
                    </div>
                </div>
            </div>
            {{--end of editLanguage--}}
            {{--edit About model--}}
            <div class="modal fade" id="exampleModalTitleEditAboutModel" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update About</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div>
                        <div class="modal-body base1">
                            <div style="text-align:left" class="form-group base2">
                                <label for="recipient-name" class="col-form-label">About:</label>
                                <textarea name="about" class="form-control" id="myEditAbout" cols="30" rows="10">
                                    <?php
                                    echo htmlspecialchars_decode($projectTitle->about);
                                    ?>
                                </textarea>
                            </div>
                            <p><code id="msgHere"></code></p>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                            <a href="#" id="updateAbout" class="btn btn-primary" data-dismiss="modal">Update</a>
                        </div>
                    </div>
                </div>
            </div>
            {{--end of edit about--}}
            {{--            Edit Type--}}

            <div class="modal fade" id="exampleModalTitleEditTypeModel" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Type</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div>
                        <div class="modal-body base1">
                            <div style="text-align:left" class="form-group">
                                <label for="recipient-name" class="col-form-label">Company Type:</label>
                                <select class="form-control" name="publicOrPrivate" id="publicOrPrivate">
                                    <option @if($projectTitle->publicOrPrivate==='Public') selected @endif>
                                        Public
                                    </option>
                                    <option @if($projectTitle->publicOrPrivate==='Private') selected @endif>Private</option>
                                </select>
                            </div>
                            <div style="text-align:left" class="form-group">
                                <label for="recipient-name" class="col-form-label">Type:</label>
                                <select class="form-control" name="type" id="type">
                                    <option @if($projectTitle->type==='Document') selected @endif >Document</option>
                                    <option @if($projectTitle->type==='Handbook') selected @endif>Handbook</option>
                                </select>
                            </div>
                            <p><code id="msgHere"></code></p>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                            <a href="#" id="updateType" class="btn btn-primary" data-dismiss="modal">Update</a>
                        </div>
                    </div>
                </div>
            </div>
            {{--            end of edit type--}}
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
                                        <button formtarget="_blank" class="btn btn-default"><i class="fa fa-eye"></i>
                                        </button>
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
                                <form method="post" action="{{route('projectContentTitle')}}">
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <div style="text-align:left" class="form-group">
                                            <label for="recipient-name" class="col-form-label">Title:</label>
                                            <input type="hidden" name="project_id" value="{{$projectTitle->id}}">
                                            <input type="text" class="form-control" name="contentTitle">
                                        </div>
                                        <p><code id="msgHere"></code></p>

                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                        <button type="submit" class="btn btn-primary">Create</button>
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
                                        <form method="post" action="{{route('updateProjectContentTitle')}}">
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
                                                    <input type="text" class="form-control"
                                                           value="{{$value->contentTitle}}" name="contentTitle">
                                                </div>
                                                <p><code id="msgHere"></code></p>

                                            </div>
                                            <div class="modal-footer">
                                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                <button type="submit" class="btn btn-primary">Update</button>
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
    {{--    <script>--}}
    {{--        CKEDITOR.replace('myEditAbout');--}}
    {{--    </script>--}}

    <script src="{{URL::to('js/projectContent.js')}}"></script>

@endsection
