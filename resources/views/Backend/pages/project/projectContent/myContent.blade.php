@extends('Backend.master')

@section('heading')
    <div class="row" style="text-align: right">
        <div class="col-md-6 col-xs-3">

            Title: {{ucfirst($title->contentTitle)}}

        </div>
        <div class="col-md-6 col-xs-9">
            <span style="background-color: #8e44ad" data-toggle="tooltip" data-placement="bottom"
                  class="label label-primary" title="Company Name=##company_name## &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            No of employee=##no_of_employee## &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Work Time=##work_time## &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            No of Sick Leave=##no_of_sick_leave## &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Work Days=##work_days##
">Keys
            </span>
        </div>

    </div>
@endsection

@section('content')
    <div>
        <code id="saveMsg"> Please save your changes</code>
        <div id="my-content">
            <form action="{{route('myContent',$title->id)}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="title_id" value="{{$title->id}}">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        @if($myContent)
                            <textarea name="myProjectContent" id="myContent" cols="30"
                                      rows="10">{{$myContent->myProjectContent}}</textarea>
                        @else
                            <textarea name="myProjectContent" id="myContent" cols="30" rows="10"></textarea>

                        @endif
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div style="height: 635px; background-color: #95a5a6;">
                            <h2 class="p-5 bg-info">Title :</h2>
                            <ul class="text-light m-5" style="font-size: 20px;height:500px;overflow:auto;">
                                @forelse($allTitle as $value)
                                    <li><a class="text-light"
                                           href="{{route('myContent',$value->id)}}">{{$value->contentTitle}}</a></li>
                                    <br>
                                @empty
                                    <li><i>No data</i></li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
                <br>
                <div class="mybtn" style="text-align: right">
                    <a href="{{route('projectContent',$title->getProject->id)}}" class="btn btn-primary"><i
                            class="fa fa-times-circle"></i></a>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('my-header')

    <style>
        .tooltip-inner {
            max-width: 300px;
            /* If max-width does not work, try using width instead */
            width: 300px;
        }

        #saveMsg {
            display: none;
            color: cornflowerblue;
        }

    </style>
@endsection

@section('my-footer')

    <script src="{{URL::to('/vendor/unisharp/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('myContent', {
            filebrowserUploadUrl: '',
            filebrowserUploadMethod: 'form',
            height: 500,


        });
        $(function () {
            var e = CKEDITOR.instances['myContent']

            e.on('key', function (evt) {
                if (evt.keyCode === 13) {

                } else {
                    setTimeout(function () {
                        $('#saveMsg').slideDown('fast');
                    });

                }

            })
        })

    </script>

@endsection
