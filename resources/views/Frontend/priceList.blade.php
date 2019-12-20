@extends('Frontend.master')
@section('icon-header')
    <i class="notika-icon notika-menus"></i>
@endsection
@section('upper-header')
    Pricing
@endsection
@section('lower-header')
    Standard pricing
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-header bg-primary text-center p-3 ">
                    <h4 class="mb-0 text-white"> Free Version</h4>
                </div>
                <div class="card-body text-center">
                    <h1 class="mb-1">Free</h1>
                    <p>Click and Get</p>
                </div>
                <div class="card-body border-top">
                    <ul class="list-unstyled bullet-check font-14">
                        <li><i style="color: green" class="fa fa-check"></i> Download as PDF template</li>
                        <li><i style="color: green" class="fa fa-check"></i> Updated and current with HR Vetted Language
                        </li>
                        <li><i style="color: green" class="fa fa-check"></i> Daily updates on choose platforms</li>

                        <li>Our Free Version :</li>
                        @forelse($all as $value)
                            @if($value->price==='Free')
                                <li><span class="label label-primary">{{ucfirst($value->category)}}-{{$value->language}}</span>
                                </li>
                            @endif
                        @empty
                            <li><i>Updating</i></li>
                        @endforelse


                    </ul>
                    <a href="#" class="btn btn-outline-secondary btn-block btn-lg">Get Started</a>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-header bg-info text-center p-3">
                    <h4 class="mb-0 text-white"> Standard Version</h4>
                </div>
                <div class="card-body text-center">
                    <h1 class="mb-1">Rs10000-Above</h1>
                    <p>Pay and Get</p>
                </div>
                <div class="card-body border-top">
                    <ul class="list-unstyled bullet-check font-14">
                        <li><i style="color: green" class="fa fa-check"></i> Download as PDF template</li>
                        <li><i style="color: green" class="fa fa-check"></i> Updated and current with HR Vetted Language
                        </li>
                        <li><i style="color: green" class="fa fa-check"></i> Daily updates on choose platforms</li>

                        <li>Our Standard Version :</li>
                        @forelse($all as $value)
                            @if(is_numeric($value->price))
                                <li><a href=""><span class="label label-success">{{ucfirst($value->category)}}
                                            -{{$value->language}}</span></a></li>
                            @endif
                        @empty
                            <li><i>Updating</i></li>
                        @endforelse
                    </ul>
                    <a href="#" class="btn btn-secondary btn-block btn-lg">Get Started</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('my-footer')
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

@endsection