<?php

namespace Modules\Payment\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Dnetix\Redirection\PlacetoPay as PlaceToPay;

//Models
use Modules\Payment\Entities\Payments;
use Modules\Order\Entities\Order;

//Models
use Modules\Payment\Entities\CredentialsPayment;

class paymentServices 
{

    private $placetopay;

    function __construct()
    {
        $credentials = CredentialsPayment::first();

        $this->placetopay = new PlaceToPay([
            'login' => $credentials->login, // Provided by PlacetoPay
            'tranKey' => $credentials->tranKey, // Provided by PlacetoPay
            'baseUrl' => 'https://dev.placetopay.com/redirection/',
            'timeout' => 10, // (optional) 15 by default
        ]);
    }


    /**
     * Metodo para hacer un pago basico en la plataforma PlacetoPay.
     * 
     * @return object
     */
    public function pay($order)
    {
        $total = 0;
        $reference = $order->unixTime;

        foreach ($order->orderDetails as $detail) {
            $total += $detail->unitPrice;
        }
        

        $request = [
            'payment' => [
                'reference' => $reference,
                'description' => 'Testing payment',
                'amount' => [
                    'currency' => 'USD',
                    'total' => $total,
                ],
            ],
            'expiration' => date('c', strtotime('+2 days')),
            'returnUrl' => env('APP_URL').'response?reference=' . $reference,
            'ipAddress' => '127.0.0.1',
            'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
        ];

        
        $response = $this->placetopay->request($request);
        if ($response->isSuccessful()) {
            // STORE THE $response->requestId() and $response->processUrl() on your DB associated with the payment order
            // Redirect the client to the processUrl or display it on the JS extension
            $response->processUrl();
        } else {
            // There was some error so check the message and log it
            $response->status()->message();
        }

        return $response;
    }

    public function queryPLacetoPay($id = null)
    {
        return $this->placetopay->query($id);
    }

    public function getPayment($id )
    {
        $order = Order::where('unixTime',$id)->first();
        return Payments::where('order_id',$order->id)->orderBy('created_at','DESC')->first();
    }


    /**
     * Metodo crear en la tabla Payments los datos del pago asociado a una orden.
     * 
     * @return object
     */

    public function createOrderPayment($urlPayment,$requestId, $orderId)
    {

        $payment = Payments::create([
            "urlPayment" => $urlPayment,
            "order_id" => $orderId,
            "requestId" => $requestId
        ]);

        return $payment;
    }
}