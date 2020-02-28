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
            background-image: url("uploads/backgroundImage/sky.jpg");
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
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>


<form method="post" action="{{route('registerUser')}}" class="splash-container">
    {{csrf_field()}}
    <div class="card">
        <div class="card-header">
            <h3 class="mb-1">Registrations Form</h3>
            <p>Please enter your user information.</p>
        </div>
        @foreach($errors->all() as $error)
            <div>
                <code>{{$error}}</code>
            </div>
        @endforeach

        <div class="card-body">
            <div class="form-group">
                <input class="form-control form-control-lg" type="text" name="username" placeholder="Username"
                       autocomplete="off">
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" type="email" name="email" placeholder="E-mail"
                       autocomplete="off">
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" id="pass1" name="password" type="password"
                       placeholder="Password">
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" type="password" name="password_confirmation"
                       placeholder="Confirm">
            </div>
            <div class="form-group">
                <label class="custom-control custom-checkbox">
                    <input id="termAndCondition" class="custom-control-input" value="1" type="checkbox"><span
                        class="custom-control-label">By creating an account, you agree the <a
                            href="{{route('termsAndCondition')}}" target="_blank">terms and conditions</a></span>
                </label>
            </div>
            <div class="form-group pt-2">
                <button id="registerMyAccount" class="btn btn-block btn-primary" disabled
                        title="Agree to terms and Condition" type="submit">Register My Account
                </button>
            </div>

        </div>
        <div class="card-footer bg-white">
            <p>Already member? <a href="{{route('loginUser')}}" class="text-second  ary">Login Here.</a></p>
        </div>
    </div>
</form>

<script>
    $(function () {
        $("#termAndCondition").on('change', function () {
            this.value = this.checked ? 1 : 0;
            var myValue = $(this).val();
            if (myValue === '1') {
                $('#registerMyAccount').attr("disabled", false);
            } else {
                $('#registerMyAccount').attr("disabled", true);
            }
        })
    })
</script>
</body>
</html>

