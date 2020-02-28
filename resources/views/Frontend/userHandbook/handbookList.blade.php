@extends('Frontend.master')

@section('my-header')
    <style>
        #card:hover {
            background-color: navajowhite;
        }

        .card:hover{
            transition: transform 1.2s;
            transform: scale(1.05);
        }

    </style>


@endsection
@section('icon-header')
    <i class="notika-icon notika-form"></i>
@endsection
@section('upper-header')
    My List
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
                <a title="{{$value->about}}" href="{{route('handbookContentTitle', $value->id)}}">
                    @if($value->type==='Handbook')
                        <div
                            style="background-image: url('/uploads/backgroundImage/handbook.jpeg');background-repeat: no-repeat;background-size:cover;text-shadow: 0 0 15px white;border-radius: 20px;"
                            class="contact-inner card">
                            @else
                                <div
                                    style="background-image: url('/uploads/backgroundImage/file2.jpg');background-repeat: no-repeat;background-size:cover;text-shadow: 0 0 15px white;border-radius: 20px;"
                                    class="contact-inner card">
                                    @endif
                                    <div class="contact-hd widget-ctn-hd" style="height: 220px">
                                        <h2 style="color: white">{{ucfirst($value->category)}}</h2>
                                        <p style="color: white">
                                            <i><b>-{{$value->publicOrPrivate}}</b><br><b>-{{$value->type}}</b></i></p>
                                        @if($value->about)
                                            <p style="color: white">
                                                {{str_limit($value->about,200)}}
                                            </p>
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
                <a href="{{route('builderList')}}">
                    <div class="contact-inner " id="card">
                        <div class="contact-hd widget-ctn-hd">
                            <h2>Your Handbook List</h2>
                            <p>You can create your Handbook or Document by going to Builder List or <span
                                    style="color: green; border:1px solid green"
                                    class="label label-light">Click here</span>
                            </p>
                        </div>
                        <br>
                    </div>
                </a>
            </div>
        @endforelse
    </div>
    <input type="hidden" id="onLoad" value="{{session('success')}}" name="onLoad">
@endsection
@section('my-footer')
    <script>
        $(function () {
            var onLoad = $('#onLoad').val();
            if (onLoad) {
                $(window).on('load', function () {
                    swal("Thank you for downloading!");
                  })
            }
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

