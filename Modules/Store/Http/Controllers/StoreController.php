<?php

namespace Modules\Store\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Dnetix\Redirection\PlacetoPay as PlaceToPay;

//Services
use Modules\Product\Services\ProductReport;
use Modules\Order\Services\orderServices;
use Modules\Payment\Services\paymentServices;


class StoreController extends Controller
{

    private $productServices, $orderServices , $paymentServices;

    function __construct()
    {
        $this->productServices = new ProductReport();
        $this->orderServices = new orderServices();
        $this->paymentServices = new paymentServices();
    }

    /**
     * Show view for login .
     * @return Renderable
     */
    public function login()
    {
        return view('store::auth.login');
    }

    /**
     * login process.
     * @return Renderable
     */
    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('store.index');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

        return view('store::auth.login');
    }
    

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('store::index')->with('products', $this->productServices->getAllProducts() )
                ->with('apiAddcar',route('store.add.car'))
                ->with('apiItemsCountCar',route('count.items.car'))
                ->with('itemsCarByUser', Auth::user() ? $this->orderServices->getCountItemsCar() : 0 );
    }


    /**
     * crea un registro en la tabla car a traves del servicio addCar.
     * @return object
    */
    public function addCar(Request $request)
    {
        return $this->orderServices->addCar($request);
    }

    /**
     * devuelve la cantidad en numeros de items en la tabla CAR de un usuario espoecifico.
     * @return int
    */
    public function countItemsCar()
    {
        return $this->orderServices->getCountItemsCar();
    }

    /**
     * Muestra los items que tiene agregado en el carrito previo a la compra
     * @return Renderable
     */

    public function car()
    {
        return view('store::car')
        ->with('myItems' , $this->orderServices->getCarItems() )
        ->with('apiAddcar',route('store.add.car'))
        ->with('apiItemsCountCar',route('count.items.car'))
        ->with('itemsCarByUser', $this->orderServices->getCountItemsCar());; 
    }

    /**
     * Proceso el pago con la pasarela de pago placetopay
     * @return object
     */

    public function processCar()
    {
        $this->orderServices->processMyCar();
        return redirect()->route('car.index');
    }

    public function deleteCar($id = null)
    {
        $this->orderServices->carDeleteItem($id);
        return redirect()->route('car.index'); 
    }
}
