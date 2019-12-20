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
                            <h2>{{ucfirst($project->category)}}</h2>
                            @if($project->about)
                                <?php
                                echo htmlspecialchars_decode($project->about)
                                ?>
                            @else
                                <p><i>Basic Information</i></p>

                            @endif
                            <div class="row">
                                <div class="col-md-6">- <span class="label label-primary">{{$project->language}}</span>
                                </div>
                                <div class="col-md-6"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                @foreach($projectPrice as $value)
                    @if($value->price==='Free'||$value->price==='free')
                        <form method="post" action="{{route('createUserHandbook')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="category" value="{{$project->category}}">
                            <input type="hidden" name="language" value="{{$project->language}}">
                            <input type="hidden" name="price" value="{{$value->price}}">
                            <button class="btn btn-success btn-block">Get Free Version</button>
                        </form>

                    @endif
                    @if(is_numeric($value->price))
                        <button id="payment-button" value="{{$value->id}}" class="btn btn-success btn-block">Pay by
                            Khalti
                        </button>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('my-footer')
    <script>
                @forelse($projectPrice as $value)
                @if(is_numeric($value->price))

        var price = parseInt("{!! $value->price*100 !!}", 10);
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_df0fa68971b142f69b6cf6e3b086749f",
            "productIdentity": "{!! $value->id !!}",
            "productName": "{!! $value->category.'-'. $value->language!!}",
            "productUrl": "http://handbook.com/handbookList/selectUserHandbook",
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
                            var base_url = window.location.origin;
                            $.ajax({
                                url: base_url + '/handbookList/api/createUserHandbook',
                                data: {
                                    'category': "{!! $value->category !!}",
                                    'language': "{!! $value->language !!}",
                                    'price': "{!! $value->price !!}"
                                },
                                cache: false,
                                success: function (data) {
                                    window.location.replace("{!! route('handbookList') !!}");

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
                            {{--window.location.replace("{!! route('handbookList') !!}");--}}

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
        @empty
        @endforelse
    </script>



@endsection