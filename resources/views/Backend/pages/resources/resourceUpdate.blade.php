@extends('Backend.master')

@section('heading')
    <div style="float: left">
        Update Resources:
    </div>
    <div class="" style="float: right">
        <a href="{{route('resourceDelete',$data->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>
    </div><br>


@endsection
@section('content')
    @include('sessionMsg.validationError')
    @include('sessionMsg.sessionMsg')
    <form enctype="multipart/form-data" method="post" action="{{route('resourceUpdate',$data->id)}}">
        {{csrf_field()}}
        <div class="form-group">
            <div class="form-group">
                <label for="title">Title</label>
                <input name="title" type="text" value="{{$data->title   }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="image">Display Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <textarea name="resources" class="form-control" id="myResources" cols="30"
                      rows="10">{{$data->resources}}</textarea>
        </div>
        <div class="form-group">
            <a href="{{route('resourceManage')}}" class="btn btn-primary">Back</a>
            <button class="btn btn-success" type="submit">Add</button>
        </div>
    </form>
@endsection
@section('my-footer')
    <script src="{{URL::to('/vendor/unisharp/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('myResources', {
            filebrowserUploadUrl: '',
            filebrowserUploadMethod: 'form',
            height: 500,
        });
    </script>
@endsection
