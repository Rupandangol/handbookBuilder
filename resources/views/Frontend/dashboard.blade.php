@extends('Frontend.master')
@section('icon-header')
    <i class="notika-icon notika-app"></i>
    @endsection
@section('upper-header')
    Dashboard
@endsection
@section('lower-header')
    Create your handbook
    @endsection
@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Hello, {{ucfirst(Auth::guard('userList')->user()->username)}}!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{route('handbookList')}}" role="button">Create Handbook</a>
        </p>
    </div>
@endsection