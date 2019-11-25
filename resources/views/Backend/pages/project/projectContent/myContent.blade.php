@extends('Backend.master')

@section('heading')
    <div style="text-align: center">
        Title: {{ucfirst($title->contentTitle)}}
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
