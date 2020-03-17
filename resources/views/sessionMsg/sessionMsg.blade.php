@if(session('success'))
    <div class="alert alert-success msgHide">
        <a href="" class="close" data-dismiss="alert">&times;</a>
        {{session('success')}}
    </div>
@endif
@if(session('fail'))
    <div class="alert alert-danger msgHide">
        <a href="" class="close" data-dismiss="alert"></a>
        {{session('fail')}}
    </div>
@endif
