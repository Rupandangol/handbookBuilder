<?php

namespace App\Http\Controllers;

use App\Model\Frontend\KhaltiPaymentLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class khaltiController extends Controller
{
//    public function viewKhalti()
//    {
//        return view('Frontend.khaltiTest');
//    }

    public function verification(Request $request)
    {
//hit the khalit server
        $args = http_build_query(array(
            'token' => $request->input('trans_token'),
            'amount' => $request->input('amount')
        ));
        $url = "https://khalti.com/api/v2/payment/verify/";
# Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $headers = ['Authorization: Key test_secret_key_dad08978c0244ca884044d393e5747e1'];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
//process your code below,
    }

    public function khaltiLog(Request $request)
    {
        $data['idx'] = $request->idx;
        $data['token'] = $request->token;
        $data['amount'] = $request->amount/100;
        $data['mobile'] = $request->mobile;
        $data['product_identity'] = $request->product_identity;
        $data['product_name'] = $request->product_name;
        $data['product_url'] = $request->product_url;
        $data['widget_id'] = $request->widget_id;
        $data['userName'] = Auth::guard('userList')->user()->username;
//        return response()->json($data);
        if (KhaltiPaymentLog::create($data)) {
            return response()->json('created');
        }
        return response()->json('failed');
    }


    public function khaltiLogView()
    {
        $data=KhaltiPaymentLog::all();
        return view('Backend.pages.log.khalti-log',compact('data'));
    }


}
