@extends('store::layouts.master')
@section('js')

@endsection

@section('content')
    <div class="container-fluid mt-3">
        <div align="center">
            <h1>Mis ordenes!</h1>
        </div>

        <div class="row col-12" align="center">
            
        @foreach ( $orders as $order )
            <div class="container mt-3">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
                                <div class="col-12">Pedido #{{$order->id}}</div><br>
                            </a>
                            <div class="row">
                                <div class="col-12"><a href="{{route('pay.order',$order->id)}}"><button type="button" class="btn btn-success">Procesar Orden</button></a></div>
                            </div>
                        </div>
                        @php $total = 0; @endphp
                        <div id="collapseOne" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                                <table class="table table-dark table-hover">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderDetails as $details)
                                            <tr>
                                                <td><img class="img-fluid" style="width:80px;" src="{{asset($details->product->img)}}" alt="{{$details->product->name}}"></td>
                                                <td>{{$details->product->name}}</td>
                                                <td>{{$details->product->price}}$</td>
                                            </tr>
                                            @php $total += $details->product->price; @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach



        </div>
    </div>
@endsection
