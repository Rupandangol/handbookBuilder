@extends('Backend.master')
@section('my-header')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
@endsection
@section('content')
    <table class="table table" id="khaltiLog">
        <thead>
        <tr>
            <th>Sn</th>
            <th>Product Name</th>
            <th>Username</th>
            <th>Amount</th>
            <th>Transaction Time</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse($data as $key=>$value)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$value->product_name}}</td>
                <td>{{$value->userName}}</td>
                <td>{{$value->amount}}</td>

                <td>{{\Carbon\Carbon::parse($value->created_at)->diffForHumans()}}</td>
                <td>
                    <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal{{$key}}">
                        <i class="fa fa-paper-plane"></i>
                    </a>
                    <div class="modal fade" id="exampleModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Transaction Detail: </h5>
                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </a>
                                </div>
                                <div class="modal-body">

                                    <div class="alert alert-primary" role="alert">
                                        <h4 class="alert-heading">Username: <span class="label label-primary">{{$value->userName}}</span></h4>
                                        <h4 class="alert-heading">Product Name: <span style="background-color: #8e44ad" class="label label-primary">{{$value->product_name}}</span></h4>
                                        <h4 class="alert-heading">Product Identity: <span style="background-color: #f1c40f" class="label label-primary">{{$value->product_identity}}</span></h4>
                                        <h4 class="alert-heading">Amount: <span class="label label-success">Rs {{$value->amount}}</span></h4>
                                        <hr>
                                        <p class="mb-0"><b>Idx:</b> {{$value->idx}}</p>
                                        <p class="mb-0"><b>Mobile No:</b> {{$value->mobile}}</p>
                                        <p class="mb-0"><b>Token:</b> {{$value->token}}</p>
                                        <p class="mb-0"><b>Product URL:</b> {{$value->product_url}}</p>
                                        <p class="mb-0"><b>Widget Id:</b> {{$value->widget_id}}</p>
                                        <p class="mb-0"><b>Transaction Time:</b> {{\Illuminate\Support\Carbon::parse($value->created_at)->diffForHumans()}}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="10" style="text-align: center">
                    <h3>  <i>  <code>No Data</code></i></h3>
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
@section('my-footer')
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function () {
            $('#khaltiLog').DataTable();
        });
    </script>

@endsection
