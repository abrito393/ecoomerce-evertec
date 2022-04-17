@extends('store::layouts.master')
@section('js')
    <script src="{{asset('js/car.js')}}" ></script>
    <script src="{{asset('js/axios.min.js')}}" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')
    <div class="container-fluid mt-3">
        <div align="center">
            <h1>Bienvenido!</h1>
            <p>Compra vegetales y hortalizas a un clic de distancia.</p>
        </div>

        <div class="row col-12" align="center">
            
        @foreach ($products as $product)
            <div class="col-sm-3 col-xs-6  ">
                <div class="mt-4 p-5 bg-dark text-white rounded">
                    <img class="img-fluid" src="{{asset($product->img)}}" alt="{{$product->name}}">
                    <p class="card-text">{{$product->description}}</p>
                    <h4 class="card-title">{{$product->name}}</h4>
                    <h5 class="card-text">Precio: {{$product->price}}$</h5>
                    @if (Auth::check())
                        <button class="btn btn-primary addCar" onclick="addCar('{{$product->id}}','{{$apiAddcar}}','{{$apiItemsCountCar}}')" >Agregar</button>
                    @endif
                </div>
            </div>
        @endforeach


        </div>
    </div>
@endsection
