<?php

namespace Modules\Payment\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PaymentController extends Controller
{
    public function payOrder(Request $request, $id = null)
    {
        dd($id);
        return 1;
    }

    public function response(Request $request)
    {
        dd($request->all());
        return 1;
    }
}
