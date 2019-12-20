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
    <div style="background-image: url('/uploads/backgroundImage/books.jpg');color: black;" class="jumbotron">
        <h1 class="display-4">Hello, {{ucfirst(Auth::guard('userList')->user()->username)}}!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to
            featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{route('handbookList')}}" role="button">Create Handbook</a>
        </p>
    </div>
    <div style="background-image: url('/uploads/backgroundImage/building.jpg');color: whitesmoke;" class="jumbotron">
        <h1 class="display-4">Easy to create your Handbook</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to
            featured content or information.</p>
        <hr class="my-4">
        <div style="color: whitesmoke" class="row">
            <div class="col-md-1"><i class="far fa-grin fa-3x"></i></div>
            <div class="col-md-11">
                <p>Create a customized employee handbook for your company. A good handbook should reflect your company
                    culture. Your policies should be clear and easy to understand. Having a solid employee handbooks is
                    important.</p>
            </div>
            <div class="col-md-1"><i class="far fa-grin-alt fa-3x"></i></div>
            <div class="col-md-11">
                <p>One size does not fit all. By providing answers to company-specific questions you ensure that your
                    handbook is applicable to the work you're doing. You can always go back and edit your choices as
                    your policies change over time.</p>
            </div>
            <div class="col-md-1"><i class="far fa-grin-beam fa-3x"></i></div>
            <div class="col-md-11">
                <p>Your handbook is assembled when all of your company data has been gathered. It takes only a few
                    minutes to create an updated handbook with clear expectations and guidelines for your team.
                    asdfadsfasdf asdf</p>
            </div>
            <div class="col-md-1"><i class="far fa-grin-stars fa-3x"></i></div>
            <div class="col-md-11">
                <p>Download your handbook as a Microsoft Word Document. You should review your handbook with your
                    trusted advisiors and make any changes you deem necessary. If you need assistance, we're here to
                    help!</p>
            </div>
        </div>
    </div>

@endsection
@section('my-footer')
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection