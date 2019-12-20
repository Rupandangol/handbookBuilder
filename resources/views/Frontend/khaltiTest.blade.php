@extends('Frontend.master')
@section('content')
    <script src="https://khalti.com/static/khalti-checkout.js"></script>

    <!-- Place this where you need payment button -->
    <button id="payment-button">Pay with Khalti</button>
    <!-- Place this where you need payment button -->

    <!-- Paste this code anywhere in you body tag -->
    `
    <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_f8de718039384017b8d050f61c25b13f",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
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
                            console.log("transaction succeed");
                        },
                        error: function (error) {
                            console.log("transaction failed");
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
            checkout.show({amount: 2000});
        }
    </script>
    <!-- Paste this code anywhere in you body tag -->
@endsection