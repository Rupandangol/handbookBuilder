
@if($errors->all())
    <div class="alert alert-danger">
        <a href="" class="close" data-dismiss="alert">&times;</a>
        <h5>Error :</h5>
    @foreach($errors->all() as $error)
            <code style="color: #0a3c93">-{{$error}}</code><br>
        @endforeach
    </div>
@endif
