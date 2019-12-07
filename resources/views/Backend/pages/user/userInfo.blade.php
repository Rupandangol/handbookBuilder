@extends('Backend.master')
@section('content')


    <div class="row">


        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">


            <div class="card">
                <div class="card-body">
                    <div class="user-avatar text-center d-block">
                        <img src="{{url('/uploads/logo/logoDefault2.png')}}" alt="User Avatar"
                             class="rounded-circle user-avatar-xxl">
                    </div>
                    <div class="text-center">
                        <h2 class="font-24 mb-0">{{ucfirst($userLoginData->username)}}</h2>
                        <p>{{ucfirst($userLoginData->getUserInfo->companyName)}}</p>
                    </div>
                </div>
                <div class="card-body border-top">
                    <h3 class="font-16">Contact Information</h3>
                    <div class="">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i>{{$userLoginData->email}}</li>
                        </ul>
                    </div>
                </div>
                <div class="card-body border-top">
                    <h3 class="font-16">Other Infos</h3>
                    <div class="">
                        <ul class="mb-0 list-unstyled">
                            <li class="mb-1">No of Employee: {{$userLoginData->getUserInfo->no_of_employee}}</li>
                        </ul>
                        <ul class="mb-0 list-unstyled">
                            <li class="mb-1">No of Sick Leave: {{$userLoginData->getUserInfo->no_of_sickLeave}}</li>
                        </ul>
                        <ul class="mb-0 list-unstyled">
                            <li class="mb-1">Work shift: {{$userLoginData->getUserInfo->workShift}}</li>
                        </ul>
                    </div>
                </div>
                <div class="card-body border-top">
                    <h3 class="font-16">Holiday</h3>
                    <div>
                        <a href="#" class="badge badge-light mr-1">{{$userLoginData->getUserInfo->holiday}}</a>
                    </div>
                </div>
            </div>


        </div>


        <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">


            <h1>Projects :</h1>
            <div class="row">
                @forelse($projects as $value)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <input type="hidden" class="myhandbook_id" name="handbook_id" value="{{$value->id}}">
                                <h3 class="card-title">{{ucfirst($value->category)}}</h3>
                                <h6 class="card-subtitle mb-2 text-muted">- <span
                                            class="label label-primary">{{$value->language}}</span> &nbsp;&nbsp;&nbsp;&nbsp;-
                                    <span class="label label-success">{{$value->price}}</span></h6>
                                <p class="card-text">Lorem ipsum dolor sit amet loreim nsectetur adipiscing elit. Fusce
                                    vel
                                    elementum eros. </p>
                                @if($value->deleteCode==='1')
                                    <button id="" href="#" class="card-link deleteCodeChange btn btn-primary">
                                        <i class="fa fa-sync-alt deleteThis"> Recover</i>

                                    </button>
                                @else
                                    <button id="" href="#" class="card-link deleteCodeChange btn btn-primary">
                                        <i class="fa fa-trash-alt deleteThis"> Delete</i>

                                    </button>
                                @endif

                                <a href="{{route('userProject',$value->id)}}" class="card-link btn btn-info"><i
                                            class="fa fa-sign-in-alt"> View</i> </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div>
                        <code><h1>No Data</h1></code>
                    </div>
                @endforelse

            </div>


        </div>


    </div>
@endsection
@section('my-footer')
    <script>
        $(function () {
            $('.deleteCodeChange').on('click', function () {
                var btn = $(this);
                var btnIcon = btn.find('.deleteThis');

                var handbook_id = $(this).parent().find('.myhandbook_id').val();
                var base_url = window.location.origin;
                $.ajax({
                    url: base_url + "/@admin@/api/deleteCodeChange",
                    data: {'handbook_id': handbook_id},
                    cache: false,
                    success: function (data) {
                        if (data === '1') {
                            btnIcon.text(' Recover');
                            btnIcon.prop('class', 'fa fa-sync-alt deleteThis');
                        } else {
                            btnIcon.text(' Delete');
                            btnIcon.prop('class', 'fa fa-trash-alt deleteThis');
                        }
                    }
                });
            })
        })
    </script>
@endsection