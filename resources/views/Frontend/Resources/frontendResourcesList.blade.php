@extends('Frontend.master')
@section('icon-header')
    <i class="notika-icon notika-edit"></i>
@endsection
@section('upper-header')
    Resources
@endsection
@section('lower-header')
    Whats new?
@endsection
@section('content')

    <div class="row">
        @forelse($resourceList as $value)

            <div class="col-sm-6 col-md-6">
                <div style="min-height:500px" class="thumbnail">
                    @if($value->image)
                        <img src="{{URL::to('/uploads/ResourceImage/'.$value->image)}}" data-src=""
                             data-holder-rendered="true"
                             style="height: 350px; width: 100%; display: block;">
                    @else
                        <img src="{{URL::to('/uploads/defaultImage/noimage.png')}}" data-src=""
                             data-holder-rendered="true"
                             style="height: 350px; width: 100%; display: block;">
                    @endif
                    <div class="caption">
                        <h3>{{$value->title}}</h3>
                        <?php
                        echo htmlspecialchars_decode(str_replace('<img ', '<img class="hidden"', str_limit($value->resources, 150)));
                        ?>

                        <p style="text-align: center"><a href="{{route('resourceDetail',$value->id)}}" class=""
                                                         role="button">View Detail</a>
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <div class="" style="text-align: center">
                <h1>
                    <i><code>Updating....</code></i>
                </h1>
            </div>
        @endforelse
    </div>
@endsection
