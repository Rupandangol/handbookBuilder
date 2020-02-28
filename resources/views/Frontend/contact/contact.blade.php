@extends('Frontend.master')

@section('icon-header')
    <i class="notika-icon notika-support"></i>
@endsection

@section('upper-header')
    Contact
@endsection

@section('lower-header')
    Contact Us
@endsection

@section('content')
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
    <div class="card">
        <div class="card-body">
            <p>
                Please use this form to submit a question for our staff to review. We will respond to your
                question/comment as
                soon as possible.
            </p>
            <form method="post" action="{{route('contact')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="">Subject:</label>
                    <input type="text" name="subject" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Message</label>
                    <textarea name="message" class="form-control" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Send</button>
                </div>
            </form>

        </div>

    </div>


@endsection
