<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ecommerce-evertec</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/store.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="{{asset('js/bootstrap.min.js')}}" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @yield('js')
        <!-- Fonts -->
    </head> 
    <body>

        <div class="p-5 bg-primary text-black text-center bg-header ">

        </div>

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                    @if (Auth::check())
                        <a href="{{route('store.index')}}"><button type="button" class="btn btn-light">Inicio - {{Auth::user()->name}}</button></a>
                        <a href="{{route('store.login')}}"><button type="button" class="btn btn-danger">Cerrar sesion</button></a>
                        <a href="{{route('car.index')}}"><button type="button" class="btn btn-info">Carrito <span id="itemsCantCar" class="badge bg-dark">{{$itemsCarByUser}}</span></button></a>

                    @else
                        <a href="{{route('store.login')}}"><button type="button" class="btn btn-light">login</button></a>
                    @endif
                    </li>
                </ul>
            </div>
        </nav>

        @yield('content')

        <div class="mt-5 p-4 bg-dark text-white text-center">
            <p>Evertec E-commerce</p>
        </div>

    </body>

</html>
