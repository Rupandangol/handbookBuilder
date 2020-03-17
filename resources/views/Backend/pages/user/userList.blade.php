@extends('Backend.master')
@section('heading')
    All User
@endsection
@section('my-header')
    <style>
        .hidden {
            display: none;
        }
    </style>
@endsection
@section('content')

    {{--msg--}}
    <div id="userStatusMsg" class="alert alert-success hidden">
        <p>Status Changed</p>
    </div>
    @if(session('fail'))
        <div class="alert alert-danger">
            {{session('fail')}}
        </div>
    @endif
    {{--end of msg--}}

    <div class="card">
        <h5 class="card-header">User List</h5>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Status</th>
                    <th>About</th>
                    <th>Signed Up</th>
                </tr>
                </thead>
                <tbody>
                @forelse($userList as $key=>$value)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{$value->username}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->mobileNo}}</td>
                        <td>
                            @if($value->status==='1')
                                <button class="btn btn-success userStatus" value="{{$value->id}}"><i
                                            class="fa fa-toggle-on"></i></button>
                            @else
                                <button class="btn btn-default userStatus" value="{{$value->id}}"><i
                                            class="fa fa-toggle-off"></i></button>
                            @endif


                        </td>
                        <td><a class="btn btn-default" href="{{route('userInfo-backend',$value->id)}}"><i
                                        class="far fa-id-card fa-2x"></i></a></td>
                        <td>{{\Carbon\Carbon::parse($value->created_at)->diffForHumans()}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center"><code>No Users</code></td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        </div>
    </div>
@endsection
@section('my-footer')
    <script>
        $(function () {
            $('.userStatus').on('click', function () {
                var btn = $(this);
                var user_id = btn.val();
                var base_url = window.location.origin;
                $.ajax({
                    url: base_url + "/@admin@/api/userStatus",
                    data: {'user_id': user_id},
                    cache: false,
                    success: function (data) {
                        if (data === '1') {
                            btn.prop('class', 'btn btn-success userStatus');
                            btn.find('i').prop('class', 'fa fa-toggle-on');
                        } else {
                            btn.prop('class', 'btn btn-default userStatus');
                            btn.find('i').prop('class', 'fa fa-toggle-off');

                        }
                    }
                });
                $('#userStatusMsg').slideDown(function () {
                    setTimeout(function () {
                        $('#userStatusMsg').slideUp('fast')
                    }, 1000);
                })
            });
        })
    </script>
@endsection
