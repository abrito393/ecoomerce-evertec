<?php

namespace Modules\Payment\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Dnetix\Redirection\PlacetoPay as PlaceToPay;

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
    public function pay($reference, $total)
    {
        $reference = "5976030f5575d";
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
            'returnUrl' => 'http://localhost:8888/response?reference=' . $reference,
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
}