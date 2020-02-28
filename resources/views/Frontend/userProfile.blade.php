@extends('Frontend.master')
@section('icon-header')
    <i class="notika-icon notika-support"></i>
@endsection
@section('upper-header')
    Login Profile
@endsection
@section('lower-header')
    Edit your profile
@endsection
@section('content')
    @if($errors->all())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <i>- {{$error}}</i><br>
            @endforeach
        </div>
    @endif
    {{--    userList Updated msg--}}
    @if(session('userListUpdated_msg'))
        <div class="alert alert-success">
            {{session('userListUpdated_msg')}}
        </div>
    @endif
    <form method="post" action="{{route('userProfile')}}">
        {{csrf_field()}}
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" name="username" class="form-control" value="{{$userListData->username}}"
                   placeholder="Enter Username">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" value="{{$userListData->email}}"
                   id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Current Password</label>
            <input type="password" name="currentPassword" class="form-control" id="currentPassword"
                   placeholder="Current Password">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="userPassword"
                   placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" name="password_confirmation" id="confirmUserPassword" class="form-control" placeholder="Confirm Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
