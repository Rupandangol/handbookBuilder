@extends('Backend.master')
@section('heading')
    <div class="row">
        <div class="col-md-11">
            FAQ (Frequently asked Questions)
        </div>
        <div class="col-md-1">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-plus-square"></i> &nbsp;ADD FAQ
            </a>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ADD FAQ</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div>
                        <form method="post" action="{{route('FAQView')}}">
                            {{csrf_field()}}
                            <div class="modal-body">

                                <div style="text-align:left" class="form-group">
                                    <label for="question" class="col-form-label">Question:</label>
                                    <input type="text" name="question" class="form-control">
                                    <label for="about" class="col-form-label">Answer:</label>
                                    <textarea class="form-control" name="answer" cols="30"
                                              rows="10"></textarea>

                                </div>
                                <p><code id="msgHere"></code></p>

                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                <button id="projectSubmit" type="submit" class="btn btn-primary">ADD</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

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
<div class="bg-white p-3">

    <table class="table table-hover">
        <thead>
        <tr style="font-size: 20px">
            <td>SN</td>
            <td>Question</td>
            <td>Answer</td>
            <td colspan="2">Action</td>
        </tr>
        </thead>
        <tbody>
        @forelse($FAQ as $key=>$value)
            <tr>
                <td>{{++$key}}</td>
                <td title="{{$value->question}}">{{str_limit($value->question,200)}}</td>
                <td title="{{$value->answer}}">{{str_limit($value->answer,200)}}</td>
{{--                <td><a class="btn btn-info" href="">View</a></td>--}}
                <td>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$key}}">&nbsp;Edit
                    </a>

                    <div class="modal fade" id="exampleModal{{$key}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">ADD FAQ</h5>
                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </a>
                                </div>
                                <form method="post" action="{{route('FAQView')}}">
                                    {{csrf_field()}}
                                    <div class="modal-body">

                                        <div style="text-align:left" class="form-group">
                                            <input type="hidden" name="FAQ_id" value="{{$value->id}}">
                                            <label for="question" class="col-form-label">Question:</label>
                                            <input type="text" name="question" value="{{$value->question}}" class="form-control">
                                            <label for="about" class="col-form-label">Answer:</label>
                                            <textarea class="form-control" name="answer" cols="30"
                                                      rows="10">{{$value->answer}}</textarea>

                                        </div>
                                        <p><code id="msgHere"></code></p>

                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                        <button id="projectSubmit" type="submit" class="btn btn-primary">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </td>
                <td><a class="btn btn-danger" href="{{route('FAQDelete',$value->id)}}">Delete</a></td>
            </tr>
        @empty
            <tr>
                <td colspan="4" style="text-align: center"><i>NO DATA</i></td>
            </tr>
        @endforelse
        </tbody>
    </table><br>
    {{$FAQ->links()}}
</div>

@endsection
