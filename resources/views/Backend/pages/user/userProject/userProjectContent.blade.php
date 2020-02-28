@extends('Backend.master')
@section('content')
    <h2>Title: <b>{{$userProjectContent->hbContentTitleFromContent->handbookContentTitle}}</b></h2>
    <div class="row">
        <div class="col-md-8">
            <form method="post" action="{{route('userProjectContent',$userProjectContent->handbook_title_id)}}">
                {{csrf_field()}}

                <textarea class="form-control" name="handbook_content" id="userContent" cols="30" rows="10">
                    <?php
                    echo htmlspecialchars_decode($userProjectContent->handbook_content);
                    ?>
                </textarea>
                <br>
                <button class="btn btn-success" type="submit">Save</button>
                <a href="{{route('userProject',$userProjectContent->hbContentTitleFromContent->userHandbook_id)}}"
                   class="btn btn-secondary" type="button">Back</a>
            </form>
        </div>
        <div class="col-md-4">
            <div style="height: 635px; background-color: #95a5a6">
                <h2 class="p-5 bg-info">Title Navigate</h2>
                <ul class="text-light m-5" style="font-size: 20px;height:500px;overflow:auto;">
                    @forelse($userProjectContentTitle as $value)
                        <li><a class="text-light" href="{{route('userProjectContent',$value->id)}}">{{$value->handbookContentTitle}}</a></li><br>
                    @empty
                        <li><i>No data</i></li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('my-footer')

    <script src="/vendor/unisharp/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('userContent', {
            filebrowserUploadUrl: '',
            filebrowserUploadMethod: 'form',
            height: 500,
            width: 1050
        });
    </script>
@endsection
