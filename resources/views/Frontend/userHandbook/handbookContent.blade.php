@extends('Frontend.master')

@section('upper-header')
    {{ucfirst($hbContentTitle->handbookContentTitle)}}
@endsection


@section('lower-header')
    You can edit and save...
@endsection


@section('icon-header')
    <i class="notika-icon notika-draft"></i>
@endsection


@section('content')
    @if(session('success'))
        <div id="successMsg" class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <form method="post" action="{{route('handbookContent',$hbContentTitle->hbContentFromContentTitle->id)}}">
        {{csrf_field()}}
        <textarea name="handbook_content" id="myContent" cols="30" rows="10">
            {{
            str_replace('|%paid_holiday%|',$userInfo->holiday,
            str_replace('|%no_of_sick_leave%|',$userInfo->no_of_sickLeave,
            str_replace('|%work_shift%|',$userInfo->workShift,
            str_replace('|%no_of_employee%|',$userInfo->no_of_employee,
            str_replace('|%company_name%|',$userInfo->companyName,
            $hbContentTitle->hbContentFromContentTitle->handbook_content)))))
            }}
        </textarea>
        <br>
        <button class="btn btn-success" id="hbContent" type="submit">Save</button>
        <a href="{{route('handbookContentTitle',$hbContentTitle->hbFromContentTitle->id)}}"
           class="btn btn-primary">Back</a>
    </form>
@endsection


@section('my-footer')
    <script src="/vendor/unisharp/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('myContent', {
            filebrowserUploadUrl: '',
            filebrowserUploadMethod: 'form',
            height: 500,
            width: 1140
        });
    </script>
    <script>
        $(function () {
            setTimeout(function () {
                $('#successMsg').slideUp('fast');
            }, 1000);
        })
    </script>
@endsection