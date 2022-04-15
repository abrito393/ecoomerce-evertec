<?php

namespace Modules\Order\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//Models
use Modules\Order\Entities\Car;

class orderServices 
{
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
        return Car::with('product')->get();
    }

    public function carDeleteItem($id) 
    {
        return Car::find($id)->delete();
    }
}