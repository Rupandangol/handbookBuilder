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
                                    <label for="logo">Company Name:</label>

                                    <input type="text" value="{{$userInfo->companyName}}" name="companyName"
                                           class="form-control"
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
                                    <label for="logo">No of Employee:</label>

                                    <input type="text" name="no_of_employee" value="{{$userInfo->no_of_employee}}"
                                           class="form-control"
                                           placeholder="Eg:50">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-next"></i>
                                </div>
                                <div class="nk-int-st">
                                    <label for="logo">Work Time:</label>

                                    <input type="text" name="workTime" value="{{$userInfo->workTime}}"
                                           class="form-control"
                                           placeholder="Eg: 9am to 6pm">
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group ic-cmp-int">

                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-next"></i>
                                </div>
                                <div class="nk-int-st">
                                    <label for="logo">Work Days in a week:</label>

                                    <select class="selectpicker" name="workDays" tabindex="-98">
                                        <option  @if($userInfo->workDays==='1 Day') selected @endif>1 Day</option>
                                        <option @if($userInfo->workDays==='2 Days') selected @endif>2 Days</option>
                                        <option @if($userInfo->workDays==='3 Days') selected @endif>3 Days</option>
                                        <option @if($userInfo->workDays==='4 Days') selected @endif>4 Days</option>
                                        <option @if($userInfo->workDays==='5 Days') selected @endif>5 Days</option>
                                        <option @if($userInfo->workDays==='6 Days') selected @endif>6 Days</option>
                                        <option @if($userInfo->workDays==='7 Days') selected @endif>7 Days</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-next"></i>
                                </div>
                                <div class="nk-int-st">
                                    <label for="logo">No of Sick Leave:</label>

                                    <input type="text" name="no_of_sickLeave" value="{{$userInfo->no_of_sickLeave}}"
                                           class="form-control"
                                           placeholder="Eg:12">
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


                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group ic-cmp-int">

                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-next"></i>
                                </div>
                                <label for="logo">Do you want to include Social Security fund (SSF) Policy ? :</label>
                                <div class="row">

                                    <div class=" col-md-1 form-check">
                                        <input class=" form-check-input" type="radio" name="ssfOrNot"
                                               value="Yes" @if($userInfo->ssfOrNot==='Yes') checked @endif>
                                        <label class="form-check-label" for="ssfOrNot">
                                            Yes
                                        </label>
                                    </div>

                                    <div class=" col-md-1 form-check">
                                        <input class=" form-check-input" type="radio" name="ssfOrNot"
                                               value="No" @if($userInfo->ssfOrNot==='No') checked @endif >
                                        <label class="form-check-label" for="ssfOrNot">
                                            No
                                        </label>
                                    </div>
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
                                    <label for="logo">Company Name:</label>

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
                                    <label for="logo">No of Employee:</label>

                                    <input type="text" name="no_of_employee" class="form-control"
                                           placeholder="Eg: 50">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-next"></i>
                                </div>
                                <div class="nk-int-st">
                                    <label for="logo">Work Time:</label>

                                    <input type="text" name="workTime" class="form-control"
                                           placeholder="Eg: 9am to 6pm">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group ic-cmp-int">

                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-next"></i>
                                </div>
                                <div class="nk-int-st">
                                    <label for="logo">Work Days in a week:</label>

                                    <select class="selectpicker" name="workDays" tabindex="-98">
                                        <option>1 Day</option>
                                        <option>2 Days</option>
                                        <option>3 Days</option>
                                        <option>4 Days</option>
                                        <option>5 Days</option>
                                        <option selected>6 Days</option>
                                        <option>7 Days</option>
                                    </select>
                                </div>
                            </div>

                        </div>


                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-next"></i>
                                </div>
                                <div class="nk-int-st">
                                    <label for="logo">No of Sick Leave:</label>

                                    <input type="text" name="no_of_sickLeave" class="form-control"
                                           placeholder="Eg: 12">
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


                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group ic-cmp-int">

                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-next"></i>
                                </div>
                                <label for="logo">Do you want to include Social Security fund (SSF) Policy ? :</label>
                                <div class="row">

                                    <div class=" col-md-1 form-check">
                                        <input class=" form-check-input" type="radio" name="ssfOrNot"
                                               value="Yes" checked>
                                        <label class="form-check-label" for="ssfOrNot">
                                            Yes
                                        </label>
                                    </div>

                                    <div class=" col-md-1 form-check">
                                        <input class=" form-check-input" type="radio" name="ssfOrNot"
                                               value="No">
                                        <label class="form-check-label" for="ssfOrNot">
                                            No
                                        </label>
                                    </div>
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
