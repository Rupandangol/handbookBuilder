@extends('Backend.master')
@section('heading')
    Manage Admin
@endsection
@section('content')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Striped Table</h5>
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @if(session('fail'))
                <div class="alert alert-danger">
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
                                    <button class="btn btn-default"><i class="fa fa-toggle-off"></i></button>

                                @else
                                    <button class="btn btn-success"><i class="fa fa-toggle-off"></i></button>

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
                            <td  style="text-align: center" colspan="5"><code>Create New Admin</code></td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection