<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Handbook Builder</title>

    <link rel="stylesheet" href="{{URL::to('lib/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{URL::to('lib/fonts/circular-std/style.css" rel="stylesheet')}}">
    <link rel="stylesheet" href="{{URL::to('lib/css/style.css')}}">
    <link rel="stylesheet" href="{{URL::to('lib/fonts/fontawesome/css/fontawesome-all.css')}}">
    <style>
        html,
        body {
            background-image: url("uploads/backgroundImage/report.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .card {
            box-shadow: 0 0 5px grey;
        }
    </style>
</head>
<body>


{{--<div class="splash-container">--}}
<div class="container">
    <div class="row">
        <div class="col-md-4 ">
            <div class="card ">
                <div class="card-header text-center"><a href="#"><img style="width: 150px;height: 100px"
                                                                      class="logo-img"
                                                                      src="{{URL::to('uploads/logo/logo-02.png')}}"
                                                                      alt="logo"></a><span
                        class="splash-description">Handbook Builder <br>
                UserLogin
            </span>
                    @if($errors->all())
                        <code class="logout-msg">Invalid Credentials</code>
                    @endif
                    @if(session('fail'))
                        <code class="logout-msg">
                            {{session('fail')}}
                        </code>
                    @endif
                    @if(session('success'))
                        <code style="color: green" class="logout-msg">
                            {{session('success')}}
                        </code>
                    @endif
                    @if(session('logout-msg'))
                        <code class="logout-msg">
                            {{session('logout-msg')}}
                        </code>
                    @endif
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('loginUser')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input class="form-control form-control-lg" name="username" id="username" type="text"
                                   placeholder="Username"
                                   autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-lg" id="password" name="password" type="password"
                                   placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label class="custom-control custom-checkbox">
                                <input class="custom-control-input" name="remember_me" type="checkbox"><span
                                    class="custom-control-label">Remember Me</span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                    </form>
                </div>
                <div class="card-footer bg-white p-0  ">
                    <div class="card-footer-item card-footer-item-bordered">
                        <a href="{{route('registerUser')}}" class="footer-link">Create An Account</a></div>
                    <div class="card-footer-item card-footer-item-bordered">
                        <a href="{{route('userForgotPassword')}}" class="footer-link">Forgot Password</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card" style="height: 470px;overflow: hidden">
                <div class="card-body">
                    <h3 class="card-title border-bottom pb-2">lorem ipsum</h3>
                    <p class="card-text">Vestibulumin augue posuere congue.</p>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores
                        consequatur delectus ea error esse eum, impedit iure iusto minima, minus mollitia neque quaerat,
                        quis quo sequi veniam voluptatum? Harum, illo!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores
                        consequatur delectus ea error esse eum, impedit iure iusto minima, minus mollitia neque quaerat,
                        quis quo sequi veniam voluptatum? Harum, illo!Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Asperiores
                        consequatur delectus ea error esse eum, impedit iure iusto minima, minus mollitia neque quaerat,
                        nima, minus mollitia neque quaerat,
                        quis quo sequi veniam voluptatum? Harum, illo!
                    </p>
                </div>
            </div>
        </div>

    </div>


</div>
<script src="{{URL::to('lib/jquery/jquery-3.3.1.min.js')}}"></script>
<script src="{{URL::to('lib/bootstrap/js/bootstrap.bundle.js')}}"></script>
</body>
</html>
