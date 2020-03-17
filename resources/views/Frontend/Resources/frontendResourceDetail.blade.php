@extends('Frontend.master')
@section('icon-header')
    <i class="notika-icon notika-edit"></i>
@endsection
@section('upper-header')
    Resources
@endsection
@section('lower-header')
 {{$data->title}}
@endsection
@section('button-header')
    <a class="btn" style="background-color: #3498db" href="{{route('resourceList')}}"> Resource List</a>
@endsection
@section('content')
    <div style="text-align: center ">
        <h1>{{$data->title}}</h1>
    </div>
    <?php
    echo htmlspecialchars_decode($data->resources);
    ?>
@endsection
