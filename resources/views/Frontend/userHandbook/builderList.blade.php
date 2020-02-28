@extends('Frontend.master')
@section('icon-header')
    <i class="notika-icon notika-form"></i>
@endsection
@section('upper-header')
    Builder List
@endsection
@section('lower-header')
    You can build any documents listed below:
@endsection
@section('content')
    <div class="row">
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="modals-list">
                <div class="modals-hd">
                    <h2>Handbook List:</h2>
                    <p>Get your handbook or documents from following list: </p>
                    <br>
                    <div id="myCard" class="row">
                        @forelse($handbook as $key=>$value)
                            <div style="margin-bottom: 20px;text-align: left"
                                 class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <a title="{{$value->about}}" href="{{route('builderListSelect',$value->id)}}">
                                    <div
                                        style="background-image: url('/uploads/backgroundImage/handbook.jpeg');text-shadow: 0 0 15px blue;border-radius: 20px;box-shadow: 2px 2px 2px grey"
                                        class="contact-inner card">

                                        <div class="contact-hd widget-ctn-hd" style="height: 200px;">
                                            <h2 style="color: white">{{ucfirst($value->category)}}</h2>
                                            <p style="color: white"><i><b>{{$value->publicOrPrivate}}</b></i></p>
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
                                        <div class="row" style="font-size: 16px">
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
                        @endforelse
                        <div style="margin-bottom: 20px;text-align: left" class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <a href="">
                                <div style="background-color: #dfe6e9;border-radius: 20px" class="contact-inner " id="card">
                                    <div class="contact-hd widget-ctn-hd" style="height: 220px;padding: 10px">
                                        <br><br><br>
                                        <h2 style="color: green"><i class="notika-icon notika-star"></i> New Handbook
                                            <i>Coming soon</i></h2>
                                        <p>if you want to suggest us for new Handbook then contact us</p>
                                    </div>
                                    <br>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="modals-list">
                <div class="modals-hd">
                    <h2>Document List:</h2>
                    <p>Create your Documents by selecting from below:</p>
                    <br>
                    <div id="myCard" style="color: white" class="row">
                        @forelse($document as $key=>$value)
                            <div style="margin-bottom: 20px;text-align: left;"
                                 class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <a title="{{$value->about}}" href="{{route('builderListSelect',$value->id)}}">
                                    <div
                                        style="background-image: url('/uploads/backgroundImage/file2.jpg');background-repeat: no-repeat;background-size:cover;text-shadow: 0 0 15px white;border-radius: 20px;"
                                        class="contact-inner card">
                                        <div style="color: white;height: 200px" class="contact-hd widget-ctn-hd">
                                               <h2 style="color: white">{{ucfirst($value->category)}}</h2>
                                            <p style="color: white"><i><b>{{$value->publicOrPrivate}}</b></i></p>
                                            @if($value->about)

                                                {{$value->about}}

                                            @else
                                                <p>
                                                    <i>Basic Information</i>
                                                </p>
                                            @endif

                                        </div>
                                        <br>
                                        <div class="row" style="font-size: 16px">
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

                        @endforelse
                        <div style="margin-bottom: 20px;text-align: left" class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <a href="" style="border-radius: 20px">
                                <div style="background-color: #dfe6e9;border-radius: 20px" class="contact-inner " id="card">
                                    <div class="contact-hd widget-ctn-hd" style="height: 220px;padding: 10px">
                                        <br><br><br>
                                        <h2 style="color: green"><i class="notika-icon notika-star"></i> New Document
                                            <i>Coming soon</i></h2>

                                        <p>if you want to suggest us for new documents then contact us</p>
                                    </div>
                                    <br>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('my-header')
    <style>
        #card:hover {
            background-color: navajowhite;
        }

         .card:hover{
             transition: transform 1.2s;
             transform: scale(1.025);
         }

    </style>
@endsection
