<?php

namespace App\Http\Controllers\Paypal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
class PaypalController extends Controller
{
    /**
     * Display Paypal form
     *
     */
    public function index()
    {
        return view('pages.paypal');
    }
    /**
     * Request Payment
     * @param \illuminate\Http\Resquest $request
     *
     */
    public function RequestPayment(Request $request)
    {
    $provider = new PayPalClient;
    $provider->setApiCredentials(config('paypal'));
    $paypalToken = $provider->getAccessToken();
    $amount = $request->amount;
    $data = [
        "intent" => "CAPTURE",
        "application_context" => [
            "return_url" => route('payment.success'),
            "cancel_url" => route('payment.cancel'),
        ],
        "purchase_units" => [
             [
                "amount" => [
                    "currency_code" => "USD",
                    "value" => "$amount"
                ]
            ]

        ]
    ];

    $response = $provider->createOrder($data);
    if(isset($response['id']) && $response['id'] != null){
        foreach ($response['links'] as $links) {
            if ($links['rel'] == 'approve'){
                return $links['href'];
                 }
            }
        }
    }
    public function PaymentSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        $details = $provider->showOrderDetails($request->token);
        $data = [
            'data' => $details,
        ];
         // dd($data);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return view('pages.paypal-success', $data);
        }

      }
    public function cancelPayment()
    {
        return view('pages.paypal-cancel');
    }
}
