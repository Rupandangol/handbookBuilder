@extends('Frontend.master')

@section('icon-header')
    <i class="notika-icon notika-form"></i>
@endsection

@section('upper-header')
    Lawyer Profile
@endsection

@section('lower-header')
    Full detail profile
@endsection



@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="invoice-wrap">
            <div style="background-color: blanchedalmond;" class="invoice-img">
                <img style="width: 200px;height: 150px" src="{{URL::to('/uploads/logo/logo-02.png')}}" alt="">
            </div>
            <br>

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
                                    <th><i class="notika-icon notika-star"></i></th>
                                    <th><i class="notika-icon notika-star"></i></th>
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
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="invoice-ds-int">
                        <h2>About</h2>
                        <?php
                        echo htmlspecialchars_decode($lawyerProfile->about);
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 ml-auto">

                    <form action="{{route('lawyerBookAppointment')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="lawyer_id"  value="{{$lawyerProfile->lawyer_id}}">
                        <input type="hidden" name="userHandbook_id" value="{{$handbook->id}}">
                        <button type="submit" class="btn btn-primary">Book an appointment</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
