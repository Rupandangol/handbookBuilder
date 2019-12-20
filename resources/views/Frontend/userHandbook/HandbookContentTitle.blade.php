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
        <div class="col-md-9">
            <form action="{{route('userPdfView')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="handbook_id" value="{{$handbook->id}}">
                <button class="btn btn-primary" type="submit">View</button>
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


@section('content')
    <table class="table myBorderLess">
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th></th>
        </tr>

        @forelse($handbookContentTitle as $key=>$value)
            <tr>
                <td>
                    {{ucfirst($value->handbookContentTitle)}}
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
        })
    </script>
@endsection