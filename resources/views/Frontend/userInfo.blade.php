@extends('Frontend.master')

@section('icon-header')
    <i class="notika-icon notika-support"></i>
@endsection
@section('upper-header')
    User Info Form
@endsection
@section('lower-header')
    Complete following form
@endsection

@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
            @foreach($errors->all() as $error)
                <code>{{$error}}</code>
            @endforeach
            <div class="cmp-tb-hd bcs-hd">
                <h2>Basic Example</h2>
                <p>Place one add-on or button on either side of an input. You may also place one on both sides of an
                    input. </p>
            </div>
            <form autocomplete="off" method="post" enctype="multipart/form-data" action="{{route('userInfoForm')}}">
                {{csrf_field()}}

                @if($userInfo)
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-support"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" name="companyName" class="form-control"
                                           value="{{$userInfo->companyName}}" placeholder="Company Name">
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-next"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" name="no_of_employee" class="form-control"
                                           value="{{$userInfo->no_of_employee}}" placeholder="No of Employee">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-next"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" name="workShift" class="form-control"
                                           value="{{$userInfo->workShift}}" placeholder="Work Shift">
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-next"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" name="no_of_sickLeave" class="form-control"
                                           value="{{$userInfo->no_of_sickLeave}}" placeholder="No of Sick Leave">
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="form-group ic-cmp-int float-lb floating-lb">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-next"></i>
                                </div>
                                <div class="nk-int-st">
                                    <textarea name="holiday" placeholder="Paid Holiday" class="form-control" id=""
                                              cols="20" rows="5">{{$userInfo->holiday}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-next"></i>
                                </div>
                                <div class="nk-int-st">
                                    <label for="logo">Logo:</label>
                                    <input type="file" name="logo" class="form-control">
                                </div>
                            </div>
                        </div>


                    </div>
                @else
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-support"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" name="companyName" class="form-control"
                                           placeholder="Company Name">
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-next"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" name="no_of_employee" class="form-control"
                                           placeholder="No of Employee">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-next"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" name="workShift" class="form-control"
                                           placeholder="Work Shift">
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-next"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" name="no_of_sickLeave" class="form-control"
                                           placeholder="No of Sick Leave">
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="form-group ic-cmp-int float-lb floating-lb">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-next"></i>
                                </div>
                                <div class="nk-int-st">
                                    <textarea name="holiday" placeholder="Paid Holiday" class="form-control" id=""
                                              cols="20" rows="5"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-next"></i>
                                </div>
                                <div class="nk-int-st">
                                    <label for="logo">Logo:</label>
                                    <input type="file" name="logo" class="form-control">
                                </div>
                            </div>
                        </div>


                    </div>
                @endif


                <button type="submit" class="btn btn-default btn-icon-notika waves-effect"><i
                            class="notika-icon notika-checked"></i>
                </button>
                <a class="btn btn-default btn-icon-notika waves-effect" href="{{route('frontend-dashboard')}}"><i
                            class="notika-icon notika-close"></i></a>

            </form>
        </div>
    </div>



@endsection