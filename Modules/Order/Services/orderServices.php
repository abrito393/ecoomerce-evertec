<?php

namespace Modules\Order\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//Models
use Modules\Order\Entities\Car;
use Modules\Order\Entities\Order;
use Modules\Order\Entities\OrderDetails;
use Modules\Payment\Entities\Payment;

class orderServices 
{

    /**
     * Servicio para devolver los datos de una orden.
     *
     * @return object
     */
    public function getOrder($id)
    {
        return Order::with(['orderDetails'])->find($id);
    }

    /**
     * Servicio para crear un registro en la tabla CAR.
     *
     * @return object
     */
    public function addCar(Request $request)
    {
        $car = Car::create([
            'product_id' => $request->productId,
            'user_id' => Auth::user()->id
        ]);

        return $car;
    }

    /**
     * Servicio para crear un registro en la tabla CAR.
     *
     * @return int
     */

    public function getCountItemsCar()
    {
        return Car::where('user_id' , Auth::user()->id)->count();
    }

    /**
     * Servicio que devuelve los pedidos de un usuario
     *
     * @return int
     */

    public function getCarItems()
    {
        return Car::with('product')->where('user_id' , Auth::user()->id)->get();
    }

    public function carDeleteItem($id) 
    {
        return Car::find($id)->delete();
    }

    public function processMyCar()
    {
        $myItems = Car::with('product')->where('user_id' , Auth::user()->id)->get();

        $order = Order::create([
            'customerName' => Auth::user()->name, 
            'customerEmail' => Auth::user()->email,
            'customerMobile' => Auth::user()->phone,
            'user_id' => Auth::user()->id,
            'unixTime' => str_replace('.','',(string)microtime(true))
        ]);

        foreach ($myItems as $item) {
            OrderDetails::create([
                "unitPrice" => $item->product->price,
                "quantity" => 1,
                "order_id" => $order->id,
                "product_id" => $item->product->id,
            ]);

            $item->delete();
        }

        return $order;
    }

    public function getMyOrders()
    {
        return Order::with('orderDetails.product')->where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
    }

    public function assignStatusOrder($id,$status)
    {
        $order = Order::find($id);
        $order->status = $status;
        $order->save();

        return $order;
    }

}