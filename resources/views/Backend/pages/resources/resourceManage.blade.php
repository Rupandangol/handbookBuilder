@extends('Backend.master')
@section('heading')
    <div style="float: left">
        Manage Resources:
    </div>
    <div class="" style="float: right">
        <a href="{{route('resourceAdd')}}" class="btn btn-primary">Add Resources</a>
    </div><br><br>
@endsection

@section('my-header')
    <style>
        .card {
            min-height: 250px;
        }
        .hidden{
            display: none;
        }
        .card:hover {
            /*transition: transform 1.2s;*/
            transform: scale(1.025);
            box-shadow: 2px 2px 2px lightgray;
        }
    </style>
@endsection
@section('content')

    @include('sessionMsg.sessionMsg')

    <div class="row">
        @forelse($myResources as $value)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card" style="min-height: 545px;width: 100%">
                    <div class="card-header">
                        {{$value->title}}
                    </div>
                    <div class="card-body">

                        <p class="card-text">
                            @if($value->image)
                                <img src="{{URL::to('/uploads/ResourceImage/'.$value->image)}}"
                                     style="height: 350px; width: 100%; display: block;">
                            @else
                                <img src="{{URL::to('/uploads/defaultImage/noimage.png')}}"
                                     style="height: 350px; width: 100%; display: block;">
                            @endif
                            <?php
                                echo htmlspecialchars_decode(str_replace('<img ','<img class="hidden"', str_limit($value->resources, 150)));
                            ?>
                        </p>
                    </div>
                    <div class="card-footer p-0 text-center">
                        <div class="card-footer-item card-footer-item-bordered">
                            <a href="{{route('resourceUpdate',$value->id)}}" class="card-link">View Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <br><br>
            <div class="col-md-10" style="text-align: center">
                <i class="fa fa-tree fa-4x"></i><br>
                <code>No Resources</code>
            </div>
        @endforelse

    </div>

@endsection
