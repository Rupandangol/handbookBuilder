@extends('Frontend.master')

@section('icon-header')
    <i class="notika-icon notika-star"></i>
@endsection

@section('upper-header')
    {{ucfirst($handbook->category)}}
@endsection
@section('lower-header')
    {{ucfirst($handbook->language)}}
@endsection
@section('button-header')


    <div class="row">

        <div style="float: right" class="col-md-4">
            <div>
                <button type="button" class="btn btn-info waves-effect" data-toggle="modal" data-target="#myModalfour">
                    Get
                    Verified By Lawyer
                </button>
                <div class="modal fade" id="myModalfour" role="dialog" style="display: none;text-align: left">
                    <div class="modal-dialog modals-default">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>
                            <div class="modal-body">
                                <h2>Lawyer List: </h2>
                                <p>Available Lawyers are listed below:</p>
                                <div class="form-group">
                                    @forelse($lawyerList as $key=>$value)
                                        <a style="color: black"
                                           href="{{route('lawyerVerification',[$value->id,$handbook->id])}}">
                                            <div style="border: 2px solid black ;border-radius: 10px">
                                                @if($value->image)
                                                    <img
                                                        style="width: 70px;height: 70px; padding: 5px; border-radius: 50px"
                                                        src="{{URL::to('/uploads/userImage/'.$value->image)}}" alt="">
                                                @else
                                                    <img src="{{URL::to('uploads/defaultImage/2.jpeg')}}"
                                                         style="width: 70px;height: 70px; padding: 5px;" alt="">
                                                @endif
                                                <span>{{++$key}}. <i>{{$value->firstName}} {{$value->middleName}} {{$value->lastName}}</i></span>
                                            </div>
                                            <br>
                                        </a>

                                    @empty
                                        <div>
                                            <label for=""><i>No Lawyers</i></label>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <form action="{{route('userPdfView')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="handbook_id" value="{{$handbook->id}}">
                <button class="btn btn-primary" type="submit" formtarget="_blank">View</button>
            </form>
        </div>
        <div class="col-md-2">
            <form action="{{route('userPdfDownload')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="handbook_id" value="{{$handbook->id}}">
                <button class="btn btn-success" type="submit">Download</button>
            </form>
        </div>
    </div>
@endsection
<a href="" target="_blank"></a>


@section('content')
    @if(session('success'))
        <div class="alert alert-info">
            {{session('success')}}
        </div>
    @endif

    <div style="display: none" class="alert alert-success updatedSuccessfully">
        Updated Successfully
    </div>
    <table class="table myBorderLess">
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th></th>
        </tr>

        @forelse($handbookContentTitle as $key=>$value)
            <tr>
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
                <td><a class="btn btn-primary" href="{{route('handbookContent',$value->id)}}">Edit</a></td>
                <td>
                    @if($value->include==='1')
                        <button value="{{$value->id}}" class="btn btn-danger include">Exclude</button>
                    @else
                        <button value="{{$value->id}}" class="btn btn-success include">Include</button>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3"><code>No Data</code></td>
            </tr>
        @endforelse

    </table>
@endsection
@section('my-header')
    <style>
        .myBorderLess td, .myBorderLess th {
            border: 0;
        }
    </style>
@endsection

@section('my-footer')
    <script>
        $(function () {
            $('.include').on('click', function () {
                var btn = $(this);
                var include = $(this).val();
                var base_url = window.location.origin;
                $.ajax({
                    url: base_url + "/handbookList/api/includeCode",
                    data: {'include': include},
                    cache: false,
                    success: function (data) {
                        if (data === '1') {
                            btn.prop('class', 'btn btn-danger include');
                            btn.text('Exclude');
                        } else {
                            btn.prop('class', 'btn btn-success include');
                            btn.text('Include');
                        }
                    }
                });
            });

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
            $('.contentTitle').on('keyup', function (e) {
                if (e.keyCode === 13) {
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
