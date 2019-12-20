@extends('Frontend.master')
@section('icon-header')
    <i class="notika-icon notika-form"></i>
@endsection
@section('upper-header')
    Handbook List
@endsection
@section('button-header')
    <button type="button" class="btn btn-info waves-effect" data-toggle="modal" data-target="#myModalfour">+ Create new
        handbook
    </button>
    <form method="post" action="{{route('selectUserHandbook')}}">
        {{csrf_field()}}
        <div class="modal animated bounce" id="myModalfour" role="dialog" style="display: none;text-align: left">
            <div class="modal-dialog modals-default">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                        <h2>Employee Handbook</h2>
                        <div class="form-group">
                            <div>
                                <label for="">Industry</label>
                                <select class="form-control" name="category" id="myCategory">
                                    <option value="empty">-----Choose Industry-----</option>
                                    @forelse($project as $value)
                                        <option value="{{$value}}">{{ucfirst($value)}}</option>
                                    @empty
                                    @endforelse

                                </select>
                            </div>
                            <div>
                                <label for="">Language</label>
                                <select class="form-control" name="language" id="myLanguage">
                                    <option value="empty">----------</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default waves-effect" id="createUserHandbook"
                        >Create New
                        </button>
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('lower-header')
    Your Handbooks are listed below
@endsection
@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    @if(session('fail'))
        <div class="alert alert-success">
            {{session('fail')}}
        </div>
    @endif
    <div id="msg" class="alert alert-danger " hidden>
        <p>Choose correct Industry and Language</p>
    </div>
    <div id="myCard" class="row">
        @forelse($handbook as $key=>$value)
            <div style="margin-bottom: 10px;text-align: left" class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <a href="{{route('handbookContentTitle', $value->id)}}">
                    <div class="contact-inner " id="card">
                        <div class="contact-hd widget-ctn-hd">
                            <h2>{{ucfirst($value->category)}}</h2>
                            @if($value->about)
                                <?php
                                echo str_limit(htmlspecialchars_decode($value->about),200);
                                ?>
                            @else
                                <p>
                                    <i>Basic Information</i>
                                </p>
                            @endif
                        </div>
                        <br>
                        <div class="row">
                            @if($value->language==='Nepali')
                                <div class="col-md-6">- <span
                                            class="label label-primary">{{$value->language}}</span>
                                </div>
                            @else
                                <div class="col-md-6">- <span
                                            class="label label-warning">{{$value->language}}</span>
                                </div>
                            @endif
                            @if($value->price==='Free')
                                <div class="col-md-6">
                                    - <span class="label label-default">{{$value->price}}</span>
                                </div>
                            @else
                                <div class="col-md-6">
                                    - <span class="label label-success">Rs {{$value->price}}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div style="margin-bottom: 10px;text-align: left" class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <a href="">
                    <div class="contact-inner " id="card">
                        <div class="contact-hd widget-ctn-hd">
                            <h2>Your Handbook List</h2>
                            <p>You can create your handbook by clicking in the top-right button <span
                                        style="color: green; border:1px solid green" class="label label-light">+ Create new handbook</span>
                            </p>
                        </div>
                        <br>
                    </div>
                </a>
            </div>
        @endforelse
    </div>
@endsection
@section('my-footer')
    <script>
        $(function () {
            $('#myCategory').on('change', function () {
                var myCategory = $(this).val();
                $('#myLanguage').html("<option value=\"empty\">----------</option>\n");
                var base_url = window.location.origin;
                $.ajax({
                    url: base_url + "/handbookList/api/fetchLanguage",
                    data: {'myCategory': myCategory},
                    cache: false,
                    success: function (data) {
                        $('#myLanguage').html(data);
                    }
                });
            });
            // $('#createUserHandbook').on('click', function () {
            //     var myCategory = $('#myCategory').val();
            //     var myLanguage = $('#myLanguage').val();
            //     if (myCategory === 'empty' || myLanguage === 'empty') {
            //         $('#msg').slideDown(function () {
            //             setTimeout(function () {
            //                 $('#msg').slideUp();
            //             }, 1000);
            //         });
            //     }
            //     else {
            //         var base_url = window.location.origin;
            //         $.ajax({
            //             url: base_url + "/handbookList/api/createUserHandbook",
            //             data: {'myCategory': myCategory, 'myLanguage': myLanguage},
            //             cache: false,
            //             success: function (data) {
            //                 $('#myCard').append(data);
            //             }
            //         });
            //     }
            //     console.log(myCategory);
            // })
        })
    </script>
@endsection
@section('my-header')
    <style>
        #card:hover {
            background-color: navajowhite;
        }
    </style>
@endsection
