@extends('Frontend.master')
@section('icon-header')
    <i class="notika-icon notika-form"></i>
@endsection
@section('upper-header')
    Handbook Select:
@endsection
@section('lower-header')
    Get your Handbook Easily
@endsection

@section('my-header')

@endsection

@section('content')
    <script src="https://khalti.com/static/khalti-checkout.js"></script>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="modals-list">
                <div class="modals-hd">
                    <h2>{{ucfirst($project->category)}}</h2>
                    <p>asdfasdf asd fsad fsad fsadf</p>
                </div>
                <div class="modals-single">
                    <div class="modal-df-hd">
                        <p>A rendered modal with header, body, and set of actions in the footer.</p>
                    </div>
                    <div class="modals-default-notika">
                        <div class="modal-inner-pro">
                            <div class="row">
                                <div class="col-md-9">
                                    <h3>{{ucfirst($project->category)}}</h3>
                                </div>
                                <div class="col-md-3">
                                    <h4><i>-{{$project->type}} <br>-{{$project->publicOrPrivate}}</i></h4><br>
                                </div>

                            </div>
                            @if($project->about)
                                <p style="font-size: 16px">
                                    {{$project->about}}
                                </p>
                            @else
                                <p style="font-size: 16px"><i>Basic Information</i></p>
                            @endif
                            <div class="row">
                                <div class="col-md-9">- <span class="label label-primary">{{$project->language}}</span>
                                </div>
                                @if($project->price==='Free')
                                    <div class="col-md-3">- <span
                                            class="label label-primary">{{$project->price}}</span></div>
                                @else
                                    <div class="col-md-3">- <span
                                            class="label label-success">Rs {{$project->price}}</span></div>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                @if($project->price==='Free'||$project->price==='free')
                    <a href="{{route('builderListCreate',$project->id)}}" class="btn btn-success btn-block">Get Free
                        Version</a>
                @endif
                @if(is_numeric($project->price))
                    <button id="payment-button" value="{{$project->id}}" class="btn btn-success btn-block">Pay by
                        Khalti
                    </button>
                @endif
            </div>
        </div>
    </div>


@endsection
@section('my-footer')
    <script>
            @if(is_numeric($project->price))

        var price = parseInt("{!! $project->price*100 !!}", 10);
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_df0fa68971b142f69b6cf6e3b086749f",
            "productIdentity": "{!! $project->id !!}",
            "productName": "{!! $project->category.'-'. $project->language.'_'.$project->publicOrPrivate!!}",
            "productUrl": "http://handbook.com/handbookList/builderListSelect",
            "eventHandler": {
                onSuccess(payload) {
                    // hit merchant api for initiating verfication
                    $.ajax({
                        url: "{!! route('paymentVerification')!!}",
                        type: 'GET',
                        data: {
                            amount: payload.amount,
                            trans_token: payload.token
                        },
                        success: function (res) {
                            $.ajax({
                                url: "{!! route('builderListCreateApi') !!}",
                                data: {
                                    'id': "{!! $project->id !!}",
                                },
                                cache: false,
                                success: function (data) {
                                    console.log(data);
                                    swal('Thank you for downloading')
                                    setTimeout(function () {
                                        window.location.replace("{!! route('handbookList') !!}");
                                    },1500);

                                }
                            });
                            console.log("transaction succeed");
                        },
                        error: function (error) {
                            console.log("transaction failed");
                        }
                    });
                    var base_url = window.location.origin;

                    $.ajax({
                        url: base_url + '/handbookList/api/khaltiLog',
                        data: {
                            'idx': payload.idx,
                            'token': payload.token,
                            'amount': payload.amount,
                            'mobile': payload.mobile,
                            'product_identity': payload.product_identity,
                            'product_name': payload.product_name,
                            'product_url': payload.product_url,
                            'widget_id': payload.widget_id
                        },
                        cache: false,
                        success: function (data) {
                            console.log(data);
                            {{--                            window.location.replace("{!! route('handbookList') !!}");--}}

                        }
                    });
                    console.log(payload);
                },
                onError(error) {
                    console.log(error);
                },
                onClose() {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            checkout.show({amount: price});
        };
        @endif


    </script>


@endsection
