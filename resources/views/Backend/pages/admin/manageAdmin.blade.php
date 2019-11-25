@extends('Backend.master')
@section('heading')
    Manage Admin
@endsection
@section('content')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Striped Table</h5>
            <div id="statusMsg" class="alert alert-success hidden">
                Status Updated
            </div>
            @if(session('success'))
                <div class="alert alert-success msgHide">
                    {{session('success')}}
                </div>
            @endif
            @if(session('fail'))
                <div class="alert alert-danger msgHide">
                    {{session('fail')}}
                </div>
            @endif
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Scope</th>
                        <th style='text-align: center' colspan="2" scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($admin as $key=>$value)
                        <tr>
                            <th scope="row">{{++$key}}</th>
                            <td>{{$value->username}}</td>
                            <td>{{$value->email}}</td>
                            <td>
                                @if($value->status==='0')
                                    <button value="{{$value->id}}" class="btn btn-default adminStatus"><i
                                                class="fa fa-toggle-off"></i></button>

                                @else
                                    <button value="{{$value->id}}" class="btn btn-success adminStatus"><i
                                                class="fa fa-toggle-on"></i></button>

                                @endif

                            </td>
                            <td style="text-align: center"><a class="btn btn-info"
                                                              href="{{route('updateAdmin',$value->id)}}"><i
                                            class="fa fa-wrench"></i></a>
                            </td>
                            <td style="text-align: center"><a class="btn btn-danger"
                                                              href="{{route('deleteAdmin',$value->id)}}"><i
                                            class="fa fa-trash"></i></a></td>
                        </tr>
                    @empty
                        <tr>
                            <td style="text-align: center" colspan="5"><code>Create New Admin</code></td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('my-header')
    <style>
        .hidden {
            display: none;
        }
    </style>
@endsection
@section('my-footer')
    <script>
        $(function () {
            $('.adminStatus').on('click', function () {
                var btn = $(this);
                var admin_id = $(this).val();
                var base_url = window.location.origin;
                $.ajax({
                    url: base_url + '/@admin@/api/adminStatus',
                    data: {'admin_id': admin_id},
                    cache: false,
                    success: function (data) {
                        if (data === '1') {
                            btn.prop('class', 'btn btn-success adminStatus');
                            btn.find('i').prop('class', 'fa fa-toggle-on')
                        } else {
                            btn.prop('class', 'btn btn-default adminStatus');
                            btn.find('i').prop('class', 'fa fa-toggle-off')

                        }
                    }
                });
                $('#statusMsg').slideDown(function () {
                    setTimeout(function () {
                        $('#statusMsg').slideUp('fast');
                    }, 1000);
                });

            });
            setTimeout(function () {
                $('.msgHide').fadeOut('fast');
            }, 1000);
        });
    </script>
@endsection