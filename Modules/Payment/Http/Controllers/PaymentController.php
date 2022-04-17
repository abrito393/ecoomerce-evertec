<?php

namespace Modules\Payment\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

//Services
use Modules\Payment\Services\paymentServices;
use Modules\Order\Services\orderServices;

class PaymentController extends Controller
{

    private $paymentServices, $orderServices;

    function __construct()
    {
        $this->paymentServices = new paymentServices();
        $this->orderServices = new orderServices();
    }

    /**
     * Metodo para hacer en la plataforma de pago placetopay y relacionarlo en la BD
     * 
     * 
    */
    public function payOrder(Request $request, $id = null)
    {
        $order = $this->orderServices->getOrder($id);
        $payment = $this->paymentServices->pay($order);
        $processUrl = $this->getProtectedValue($payment,'processUrl');
        $requestId = $this->getProtectedValue($payment,'requestId');
        $this->paymentServices->createOrderPayment($processUrl,$requestId,$order->id);
        return redirect()->away($processUrl);
    }

    public function response(Request $request)
    {
        
        $payment = $this->paymentServices->getPayment($request->reference);
        $response = $this->paymentServices->queryPLacetoPay($payment->requestId);
        if ($response->isSuccessful()) {
            // In order to use the functions please refer to the Dnetix\Redirection\Message\RedirectInformation class
            if ($response->status()->isApproved()) {
                $this->orderServices->assignStatusOrder($payment->order_id, 'PAYED');
            }else{
                $this->orderServices->assignStatusOrder($payment->order_id, $this->getProtectedValue($response->status(),'status'));
            }
        }
        return redirect()->route('orders.self');
    }

    function getProtectedValue($obj,$name) {
        $array = (array)$obj;
        $prefix = chr(0).'*'.chr(0);
        return $array[$prefix.$name];
    }
}
