@extends('Backend.master')
@section('heading')
    {{ucfirst($handbook->category)}}
@endsection
@section('content')
    <table class="table table-hoverable">
        <tr>
            <th>Sn</th>
            <th>Title</th>
            <th>Content</th>
        </tr>
        @forelse($handbook->gethandbookContentTitle as $key=>$value)
            <tr>
                <td>{{++$key}}</td>
                <td>{{ucfirst($value->handbookContentTitle)}}</td>
                <td>asdf</td>
            </tr>
        @empty
            <tr>
                <td><code>No Data</code></td>
            </tr>
        @endforelse
    </table>
@endsection