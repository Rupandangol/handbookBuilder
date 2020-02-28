@extends('Backend.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">Lawyer Profile</h5>
                    <div class="card-body">
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
                        @if($lawyerProfile)
                            <form method="post" enctype="multipart/form-data" action="{{route('lawyerProfile')}}">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">First Name :</label>
                                            <input  name="firstName" value="{{$lawyerProfile->firstName}}" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Middle Name <code
                                                    style="color: blue">(Optional)</code> :</label>
                                            <input name="middleName" value="{{$lawyerProfile->middleName}}" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Last Name :</label>
                                            <input name="lastName" value="{{$lawyerProfile->lastName}}" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Email address :</label>
                                    <input id="inputEmail" name="email" value="{{$lawyerProfile->email}}" type="email" placeholder="name@example.com"
                                           class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword">Contact Number <code
                                            style="color: blue">(Optional)</code> :</label>
                                    <input id="inputPassword" type="number" value="{{$lawyerProfile->contactNumber}}" name="contactNumber" max="1000000000"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Image :</label>

                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" name="image" id="customFile">
                                        <label class="custom-file-label" for="customFile">Professional
                                            Image</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">About :</label>
                                    <textarea name="about" class="form-control"  id="lawyerProfileAbout"
                                              rows="18">{{$lawyerProfile->about}}</textarea>
                                </div>
                                <br>
                                <div>
                                    <button class="btn btn-primary" type="button">Back</button>
                                    <button class="btn btn-success" type="submit">Save</button>
                                </div>
                            </form>

                                @else
                                    <form method="post" enctype="multipart/form-data" action="{{route('lawyerProfile')}}">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="inputText3" class="col-form-label">First Name :</label>
                                                    <input id="inputText3" name="firstName" type="text"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="inputText3" class="col-form-label">Middle Name <code
                                                            style="color: blue">(Optional)</code> :</label>
                                                    <input id="inputText3" name="middleName" type="text"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <label for="inputText3" class="col-form-label">Last Name :</label>
                                                    <input id="inputText3" name="lastName" type="text"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Email address :</label>
                                            <input id="inputEmail" name="email" type="email"
                                                   placeholder="name@example.com"
                                                   class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="inputPassword">Contact Number <code
                                                    style="color: blue">(Optional)</code> :</label>
                                            <input id="inputPassword" type="number" name="contactNumber"
                                                   max="1000000000"
                                                   class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="inputPassword">Image :</label>

                                            <div class="custom-file mb-3">
                                                <input type="file" class="custom-file-input" name="image" id="customFile">
                                                <label class="custom-file-label" for="customFile">Professional
                                                    Image</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">About :</label>
                                            <textarea name="about" class="form-control" id="lawyerProfileAbout"
                                                      rows="18"></textarea>
                                        </div>

                                        <br>

                                        <div>
                                            <button class="btn btn-primary" type="button">Back</button>
                                            <button class="btn btn-success" type="submit">Save</button>
                                        </div>
                                    </form>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('my-footer')
    <script src="https://cdn.ckeditor.com/4.13.1/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('lawyerProfileAbout');
    </script>
@endsection
