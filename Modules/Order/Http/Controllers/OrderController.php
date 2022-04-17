<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

//Services
use Modules\Order\Services\orderServices;

class OrderController extends Controller
{
    private $orderServices;

    function __construct()
    {
        $this->orderServices = new orderServices();
    }


    public function myOrders()
    {
        return view('order::myOrders')
        ->with('itemsCarByUser', Auth::user() ? $this->orderServices->getCountItemsCar() : 0 )
        ->with('orders',$this->orderServices->getMyOrders()) ;
    }
}
