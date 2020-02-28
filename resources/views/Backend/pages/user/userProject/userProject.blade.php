@extends('Backend.master')
@section('heading')
    {{ucfirst($handbook->category)}}
@endsection
@section('my-header')
    <style>
        .hidden {
            display: none;
        }
    </style>
@endsection
@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <div class="alert alert-dark p-3">
        <p><span class="label label-success bg-dark">-{{$handbook->price}}</span></p>
        <p><span class="label label-success bg-secondary">-{{$handbook->language}}</span></p>
    </div>
    <div class="alert alert-success hidden updatedSuccessfully">
        Updated Successfully
    </div>
    <table class="table table-borderless bg-info">
        <tr>
            <th>Sn</th>
            <th>Title</th>
            <th>Content</th>
        </tr>
        @forelse($handbook->gethandbookContentTitle as $key=>$value)
            <tr>
                <td>{{$value->order_by}}</td>
                <td>

                    <a href="#" class="handbookContentTitle" data-toggle="modal" data-target="#exampleModal{{$key}}">
                        {{ucfirst($value->handbookContentTitle)}}
                    </a>
                    <div class="modal fade" id="exampleModal{{$key}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Content Title</h5>
                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </a>
                                </div>
                                <div class="modal-body">
                                    <div style="text-align:left" class="form-group">
                                        <label for="userContentTitle" class="col-form-label">Content Title :</label>
                                        <input type="hidden" class="contentTitle_id" name="contentTitle_id"
                                               value="{{$value->id}}">
                                        <input type="text" class="form-control contentTitle"
                                               value="{{$value->handbookContentTitle}}" name="contentTitle">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                    <a href="#" data-dismiss="modal" class="btn btn-primary updateUserContentTitle">Update</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td><a href="{{route('userProjectContent',$value->id)}}"><i class="fa fa-clone fa-2x"></i></a></td>
            </tr>
        @empty
            <tr>
                <td><code>No Data</code></td>
            </tr>
        @endforelse
    </table>
@endsection

@section('my-footer')
    <script>
        $(function () {
            $('.updateUserContentTitle').on('click', function () {
                var btnUpdateContent = $(this).parent().parent().parent().parent().parent().find('.handbookContentTitle');
                var contentTitle = $(this).parent().parent().find('.modal-body').find('.contentTitle').val();
                var contentTitle_id = $(this).parent().parent().find('.modal-body').find('.contentTitle_id').val();
                $.ajax({
                    url: "{{route('updateUserContentTitle')}}",
                    data: {'contentTitle': contentTitle, 'contentTitle_id': contentTitle_id},
                    cache: false,
                    success: function (data) {
                        btnUpdateContent.text(data);
                        $('.updatedSuccessfully').slideDown(function () {
                            setTimeout(function () {
                                $('.updatedSuccessfully').slideUp();
                            }, 1000);
                        });
                    }
                });
            });

            $('.contentTitle').on('keyup',function (e) {
                if(e.keyCode===13){
                    var btnUpdateContent = $(this).parent().parent().parent().find('.modal-footer').find('.updateUserContentTitle');
                    var contentTitle = $(this).val();
                    var contentTitle_id = $(this).parent().find('.contentTitle_id').val();
                    $.ajax({
                        url: "{{route('updateUserContentTitle')}}",
                        data: {'contentTitle': contentTitle, 'contentTitle_id': contentTitle_id},
                        cache: false,
                        success: function (data) {
                            btnUpdateContent.text(data);
                            $('.updatedSuccessfully').slideDown(function () {
                                setTimeout(function () {
                                    $('.updatedSuccessfully').slideUp();
                                }, 1000);
                            });
                        }
                    });
                    btnUpdateContent.click();
                }

            })
        })
    </script>
@endsection

