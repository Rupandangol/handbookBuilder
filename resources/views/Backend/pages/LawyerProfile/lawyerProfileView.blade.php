@extends('Backend.master')
@section('content')
    @if($errors->all())
        <div class="alert alert-danger">
            <h5>Error :</h5>
            @foreach($errors->all() as $error)
                <code style="color: #0a3c93">-{{$error}}</code><br>
            @endforeach
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <div class="row">
        <div class="col-md-8">
            <h2>Lawyer Profile:</h2>
        </div>
        <div class="col-md-3">
            <a href="{{route('lawyerProfile')}}" style="float: right" class="btn btn-primary">EDIT</a>
        </div>

    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div style="background-color: white;height: 100%;min-height: 700px"  class="invoice-wrap">
            <br><br>
            <br><br>

            <div class="row">
                <div class="col-md-4">
                    @if($lawyerProfile->image)
                        <img style="width: 200px;height: 200px;margin-left: 50px; border-radius: 50px"
                             src="{{URL::to('/uploads/userImage/'.$lawyerProfile->image)}}" alt="">
                    @else
                        <img style="width: 200px;height: 200px;margin-left: 50px"
                             src="{{URL::to('/uploads/logo/logoDefault.png')}}" alt="">
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="invoice-sp">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th><i class="fa fa-star"></i></th>
                                    <th><i class="fa fa-star"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Full Name</td>
                                    <td>{{$lawyerProfile->firstName}} {{$lawyerProfile->middleName}} {{$lawyerProfile->lastName}}</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Contact Number</td>
                                    <td>{{$lawyerProfile->contactNumber}}</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Email</td>
                                    <td>{{$lawyerProfile->email}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="invoice-ds-int" style="margin-left: 20px">
                        <h2>About</h2>
                        <?php
                        echo htmlspecialchars_decode($lawyerProfile->about);
                        ?>
                    </div>
                </div>
            </div>
{{--            <div class="row">--}}
{{--                <div class="col-md-3 ml-auto">--}}
{{--                    <button class="btn btn-primary">Book an appointment</button>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
    </div>
@endsection
