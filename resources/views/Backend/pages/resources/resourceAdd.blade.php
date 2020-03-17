@extends('Backend.master')

@section('heading')
    Add Resource:
@endsection
@section('content')
    @include('sessionMsg.validationError')
    @include('sessionMsg.sessionMsg')
    <form enctype="multipart/form-data" method="post" action="{{route('resourceAdd')}}">
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="image">Display Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="Resources">Detail</label>
            <textarea name="resources" class="form-control" id="myResources" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <a href="{{route('dashboard')}}" class="btn btn-primary">Discard</a>
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
