<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HandbookBuilder</title>

    <link rel="stylesheet" href="{{URL::to('lib/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{URL::to('lib/fonts/circular-std/style.css" rel="stylesheet')}}">
    <link rel="stylesheet" href="{{URL::to('lib/css/style.css')}}">
    <link rel="stylesheet" href="{{URL::to('lib/fonts/fontawesome/css/fontawesome-all.css')}}">
    <style>
        html,
        body {
            background-image: url('uploads/backgroundImage/building.jpg');
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
    </style>
</head>
<body>


<div class="splash-container">
    <div class="card ">
        <div class="card-header text-center"><a href="#"><img style="width: 150px;height: 100px" class="logo-img"
                                                              src="{{URL::to('uploads/logo/logo-02.png')}}"
                                                              alt="logo"></a><span
                class="splash-description">Forgot Password</span>
            @if($errors->all())
                <code class="logout-msg">Invalid Credentials</code>
            @endif
            @if(session('fail'))
                <code class="logout-msg">
                    {{session('fail')}}
                </code>
            @endif
            @if(session('logout-msg'))
                <code class="logout-msg">
                    {{session('logout-msg')}}
                </code>
            @endif
        </div>

        <div class="card-body">
            <button type="submit" class="btn btn-primary btn-lg btn-block"> Reset Link Sent</button>
        </div>
        <div class="card-footer bg-white p-0  ">
            {{--<div class="card-footer-item card-footer-item-bordered">--}}
            {{--<a href="#" class="footer-link">Create An Account</a></div>--}}
            <div class="card-footer-item card-footer-item-bordered">
                <a href="{{route('loginPage')}}" class="footer-link">Go Back</a>
            </div>
        </div>
    </div>
</div>


<script src="{{URL::to('lib/jquery/jquery-3.3.1.min.js')}}"></script>
<script src="{{URL::to('lib/bootstrap/js/bootstrap.bundle.js')}}"></script>
<script>
    $(function () {
        setTimeout(function () {
            $('.logout-msg').slideUp('fast');
        }, 1000);
    })
</script>

</body>
</html>
