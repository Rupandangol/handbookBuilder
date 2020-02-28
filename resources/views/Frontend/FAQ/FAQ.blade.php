@extends('Frontend.master')
@section('icon-header')
    <i class="notika-icon notika-arrow-right"></i>
@endsection
@section('upper-header')
    FAQ
@endsection
@section('lower-header')
    Frequently asked Questions
@endsection
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="accordion-wn-wp">
            {{--            <div class="accordion-hd">--}}
            {{--                <h2 style="text-align: center">Lorem ipsum dolor sit amet, consectetur adipisi</h2><br><br>--}}
            {{--                <p style="font-size: 16px">Make sure to give the available color in accordion collapse's data-attribute <code>'data-collase-color'</code>--}}
            {{--                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. At consectetur delectus eius, enim eum--}}
            {{--                    exercitationem expedita, impedit molestiae nemo, nesciunt nulla quo repellat rerum similique sunt--}}
            {{--                    veniam voluptas voluptates voluptatibus!</p>--}}
            {{--            </div>--}}
            {{--            <br><br>--}}
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="accordion-stn">
                        <div class="panel-group" data-collapse-color="nk-green" id="accordionGreen" role="tablist"
                             aria-multiselectable="true">
                            @forelse($FAQ as $key=>$value)
                                <div class="panel panel-collapse notika-accrodion-cus">
                                    @if($key==0)
                                        <div class="panel-heading active" role="tab">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordionGreen"
                                                   href="#accordionGreen-{{$key}}" aria-expanded="true">
                                                    {{$value->question}}
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="accordionGreen-{{$key}}" class="collapse in" role="tabpanel">
                                            <div class="panel-body">
                                                <p>{{$value->answer}}</p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="panel-heading" role="tab">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordionGreen"
                                                   href="#accordionGreen-{{$key}}" aria-expanded="">
                                                    {{$value->question}}
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="accordionGreen-{{$key}}" class="collapse" role="tabpanel">
                                            <div class="panel-body">
                                                <p>{{$value->answer}}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <br><br>
                            @empty
                            @endforelse
                        </div>
                        <br><br><br>
                        <code>"If you have some queries you can <a href="{{route('contact')}}">contact us</a>"</code>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
