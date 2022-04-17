@extends('store::layouts.master')
@section('js')
    <script src="{{asset('js/car.js')}}" ></script>
    <script src="{{asset('js/axios.min.js')}}" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')
    <div class="container-fluid mt-3">
        <div align="center">
            <h1>Mi carrito!</h1>

        </div>

        <div class="row" align="center">
            
            @php
                $total = 0;
            @endphp
            <table class="table table-dark table-hover">
                <thead>
                <tr>
                    <th></th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($myItems as $item)
                        <tr>
                            <td><img class="img-fluid" style="width:80px;" src="{{asset($item->product->img)}}" alt="{{$item->product->name}}"></td>
                            <td>{{$item->product->name}}</td>
                            <td>{{$item->product->price}}$</td>
                            <td><a href="{{route('car.delete',$item->id)}}"><button type="button" class="btn btn-danger">Eliminar</button></a></td>
                        </tr>
                        @php
                            $total += $item->product->price;
                        @endphp
                    @endforeach
                </tbody>
            </table>

            @if( count($myItems) > 0 )
                <div class="col-4"></div>
                <div class="col-4">Total: {{$total}}$ </div>
                <div class="col-4"><a href="{{route('car.process')}}"><button type="button" class="btn btn-success">Procesar Carrito</button></a></div>
            @endif
        </div>
    </div>
@endsection
