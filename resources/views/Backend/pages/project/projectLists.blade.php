@extends('Backend.master')
@section('heading')
    <div class="row">
        <div class="col-md-6">
            BUILDER
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
@endsection
@section('content')
    <div id="projectStatusMsg" class="alert alert-success hidden">
        <p>Status Changed</p>
    </div>
    <div id="deleteMsg" class="alert alert-danger" HIDDEN>
        <p>Project Deleted</p>
    </div>
    @if(session('fail'))
        <div id="sessionFailMsg" class="alert alert-danger  ">
            {{session('fail')}}
        </div>
    @endif





    <div class="row">
        @forelse($projectLists as $key=>$value)

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card" style="color: white;text-shadow: 0 0 15px blue">
                    @if($value->type==='Document')
                        <div
                            style="background-image: url('/uploads/backgroundImage/file2.jpg');background-repeat: no-repeat;background-size: COVER;box-shadow: 0 0 15px black;border-radius: 20px"
                            class="card-body">
                            @else
                                <div
                                    style="background-image: url('/uploads/backgroundImage/handbook.jpeg');background-repeat: no-repeat;background-size: auto;box-shadow: 0 0 15px black;border-radius: 20px"
                                    class="card-body">
                            @endif


                            <h3 style="color: white" class="card-title">Category: {{ucfirst($value->category)}}</h3>
                            <div class="card-text" style="height: 150px;overflow: hidden;">
                                @if($value->about)
                                    <i>
                                        {{$value->about}}
                                    </i>
                                @else
                                    <p><i>BASIC INFORMATION</i></p>
                                @endif
                            </div>
                            <br>
                            <div>
                                <div class="row">
                                    <div class="col-md-6">
                                        - {{$value->language}}
                                    </div>
                                    <div style="text-align: right" class="col-md-6">
                                        @if($value->price==='Free')
                                            - {{$value->price}}
                                        @else
                                            - Rs {{$value->price}}

                                        @endif
                                    </div>
                                </div>
                                <p style="float: left">- {{ucfirst($value->project_created_by)}}</p>
                                <a style="float: right;margin-left: 3px" href="{{route('projectContent',$value->id)}}"
                                   class="btn btn-primary"><i
                                        class="fa fa-level-down-alt"></i></a>
                                @if($value->projectStatus==='1')
                                    <button style="float: right" value="{{$value->id}}"
                                            class="btn btn-primary projectStatus">


                                        <i class="fa fa-toggle-on"></i>
                                    </button>

                                @else
                                    <button style="float: right" value="{{$value->id}}"
                                            class="btn btn-default projectStatus">
                                        <i class="fa fa-toggle-off"></i>
                                    </button>

                                @endif
                            </div>
                        </div>
                </div>
            </div>
        @empty
            <div style="position: relative;width: 100%">
                <div style="position:absolute;left: 40%;text-align: center">
                    <i class="fa fa-tree fa-4x"></i>
                    <code>Create new Project</code>
                </div>
            </div>
        @endforelse

    </div>
@endsection
@section('my-footer')
    <script>
        $(function () {
            $('#projectSubmit').on('click', function (e) {
                var value = $('#category').val();
                if (!value) {
                    $('#msgHere').text('Enter Category');
                    e.preventDefault();
                }
            });

            $('.projectStatus').on('click', function () {
                var btn = $(this);
                var project_id = $(this).val();
                var base_url = window.location.origin;
                $.ajax({
                    url: base_url + "/@admin@/api/projectStatus",
                    data: {'project_id': project_id},
                    cache: false,
                    success: function (data) {

                        var btnIcon = btn.find("i");
                        if (data === '1') {
                            btn.prop('class', 'btn btn-primary projectStatus');
                            btnIcon.prop('class', 'fa fa-toggle-on');
                        } else {
                            btn.prop('class', 'btn btn-default projectStatus');

                            btnIcon.prop('class', 'fa fa-toggle-off');
                        }
                    }
                });
                $('#projectStatusMsg').slideDown(function () {
                    setTimeout(function () {
                        $('#projectStatusMsg').slideUp('fast');
                    }, 1000);
                });
            });

            function sessionFailMsg() {
                setTimeout(function () {
                    $('#sessionFailMsg').fadeOut('fast');
                }, 1000);
            }

            sessionFailMsg();
        })
    </script>
    {{--    <script>--}}
    {{--        CKEDITOR.replace('project_about');--}}
    {{--    </script>--}}
@endsection
@section('my-header')
    <style>
        .hidden {
            display: none;
        }
    </style>

    {{--    <script src="https://cdn.ckeditor.com/4.13.1/basic/ckeditor.js"></script>--}}
@endsection

