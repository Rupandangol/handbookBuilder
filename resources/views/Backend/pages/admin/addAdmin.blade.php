@extends('Backend.master')

@section('heading')
    Add Admin
@endsection
@section('content')

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">New Admin</h5>
            @if($errors->all())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <span>
                        *{{$error}}<br>
                        </span>
                    @endforeach
                </div>
            @endif
            <div class="card-body">
                <form id="validationform" data-parsley-validate="" action="{{route('addAdmin')}}" method="post"
                      novalidate="">
                    {{csrf_field()}}
                    @if(old('username')||old('email')||old('privileges'))
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Username</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input name="username" type="text" placeholder="" value="{{old('username')}}"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Email</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input name="email" type="text" placeholder="" value="{{old('email')}}"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Privileges</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <select class="form-control" name="privileges" id="">
                                    <option @if(old('privileges')==='Super Admin') selected @endif>Super Admin</option>
                                    <option @if(old('privileges')==='Admin') selected @endif>Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Password</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input name="password" type="password" id="myPassword" placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Password strength</label>
                            <div style="margin-top: 10px" class="col-12 col-sm-8 col-lg-6">
                                <div class="progress">
                                    <div class="progress-bar bg-danger" id="password_strength" role="progressbar"
                                         style="width: 0"
                                         aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Confirm Password</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input id="myConfirmPassword" name="password_confirmation" type="password" placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row text-right">
                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                <a class="btn btn-space btn-secondary" href="{{route('dashboard')}}">Cancel</a>
                            </div>
                        </div>
                    @else
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Username</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input name="username" type="text" placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Email</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input name="email" type="text" placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Privileges</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <select class="form-control" name="privileges" id="">
                                    <option>Super Admin</option>
                                    <option>Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Password</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input name="password" type="password" id="myPassword" placeholder=""
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Password strength</label>
                            <div style="margin-top: 10px" class="col-12 col-sm-8 col-lg-6">
                                <div class="progress">
                                    <div class="progress-bar bg-danger" id="password_strength" role="progressbar"
                                         style="width: 0"
                                         aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Confirm Password</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input id="myConfirmPassword" name="password_confirmation" type="password" placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row text-right">
                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                <a class="btn btn-space btn-secondary" href="{{route('dashboard')}}">Cancel</a>

                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
@section('my-footer')
    <script>
        $(function () {
            $('#myPassword').on('keyup', function () {
                var value = $(this).val();
                var count = value.length;
                var pStrength = $('#password_strength');
                var myWidth = 0;
                if (count >= 5) {
                    myWidth = +10;
                    pStrength.prop('style', 'width:' + myWidth + '%');
                    pStrength.prop('class', 'progress-bar bg-danger');
                    if (value.match(/\d/)) {
                        myWidth = myWidth + 20;
                        pStrength.prop('style', 'width:' + myWidth + '%');
                    }
                    if (value.match(/[a-z]/ && value.match(/[A-Z]/))) {
                        myWidth = myWidth + 20;
                        pStrength.prop('style', 'width:' + myWidth + '%');
                    }
                    if (value.match(/[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/)) {
                        myWidth = myWidth + 20;
                        pStrength.prop('style', 'width:' + myWidth + '%');
                    }
                    if (count>=10) {
                        myWidth = myWidth + 20;
                        pStrength.prop('style', 'width:' + myWidth + '%');
                    }

                } else {
                    pStrength.prop('style', 'width:0%');

                }
                if(myWidth===50){
                    pStrength.prop('class','progress-bar bg-warning');
                }
                if(myWidth>=70){
                    pStrength.prop('class','progress-bar bg-success');
                }

            });
            $('#myConfirmPassword').on('keyup',function () {
                var value=$(this).val();
                var myPassValue=$('#myPassword').val();
                if(value){
                    if(value===myPassValue){
                        $(this).prop('class','form-control is-valid');
                    }else{
                        $(this).prop('class','form-control is-invalid');
                    }
                }else{
                    $(this).prop('class','form-control');
                };

            });
        })
    </script>
@endsection