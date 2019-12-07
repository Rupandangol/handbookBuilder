@extends('Backend.master')

@section('heading')
    <div class="row" style="text-align: right">
        <div class="col-md-6 col-xs-3">

            Title: {{ucfirst($title->contentTitle)}}

        </div>
        <div class="col-md-6 col-xs-9">
            <span data-toggle="tooltip" data-placement="bottom" title="Company Name=|%companyName%| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            no of employee=|%no_of_employee%| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            work Shift=|%work_shift%| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            no of Sick Leave=|%no_of_sick_leave%| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            holiday=|%paid_holiday%|">Keys
            </span>
        </div>

    </div>
@endsection

@section('content')
    <div>
        <div id="my-content">
            <form action="{{route('myContent',$title->id)}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="title_id" value="{{$title->id}}">
                @if($myContent)
                    <textarea name="myProjectContent" id="myContent" cols="30"
                              rows="10">{{$myContent->myProjectContent}}</textarea>
                @else
                    <textarea name="myProjectContent" id="myContent" cols="30" rows="10"></textarea>

                @endif
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
    </style>
@endsection

@section('my-footer')
    <script src="/vendor/unisharp/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('myContent', {
            filebrowserUploadUrl: '',
            filebrowserUploadMethod: 'form',
            height: 500,
            width: 1350
        });
    </script>

@endsection
