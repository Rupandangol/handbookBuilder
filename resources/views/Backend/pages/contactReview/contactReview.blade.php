@extends('Backend.master')

@section('heading')
    Contact Review
@endsection
@section('content')
    <div class="card">
        <h5 class="card-header">Contact Review List</h5>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                </tr>
                </thead>
                <tbody>
                @forelse($contactReview as $key=>$value)
                    <tr>
                        <input type="hidden" value="{{$value->id}}">
                        <td>{{++$key}}</td>
                        <td class="viewedCheck">{{$value->fullName}}
                            @php($count=0)
                            @forelse($value->getViewed as $myValue)
                                @if($myValue->admin_id==Auth::guard('admin')->user()->id)
                                    <i class="fa fa-check text-success"></i>
                                    @php($count++)
                                @endif
                            @empty
                                @php($count++)
                                <i class="fa fa-exclamation text-danger"></i>
                            @endforelse
                            @if($count===0)
                                <i class=" fa fa-exclamation text-warning"></i>
                            @endif
                        </td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->subject}}</td>
                        <td>
                            <a href="#" class="btn btn-outline-primary contactViewed" data-toggle="modal"
                               data-target="#exampleModal{{$key}}">
                                <i class="fa fa-paper-plane"></i>
                            </a>
                            <div class="modal fade" id="exampleModal{{$key}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Contact Message: </h5>
                                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </a>
                                        </div>
                                        <div class="modal-body">
                                            <h3><b>Username</b>: {{ucfirst($value->fullName)}}</h3>
                                            <h3><b>Email</b>: {{$value->email}}</h3>
                                            <h3><b>Subject</b>: {{$value->subject}}</h3>
                                            <h3><b>Message:</b></h3>
                                            <p>{{$value->message}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align: center"><i>No <Message></Message></i></td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{$contactReview->links()}}

        </div>
    </div>
@endsection
@section('my-footer')
    <script>
        $(function () {
            $('.contactViewed').on('click', function () {
                var that = $(this);
                var contactId = $(this).parent().parent().find('input').val();
                $.ajax({
                    url: "{!! route('contactViewed') !!}",
                    data: {'contact_id': contactId},
                    cache: false,
                    success: function (data) {
                        if (data === '1') {
                            var asdf = that.parent().parent().find(".viewedCheck").find('i').prop('class','fa fa-check');
                        }
                        console.log(asdf);
                    }
                });
            })
        })
    </script>
@endsection
