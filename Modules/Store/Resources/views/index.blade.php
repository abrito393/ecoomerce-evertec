<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ecommerce-evertec</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

        <style>
            .img-product{
                width: 200px;
                border-radius: 20px;
            }
            .bg-header {
                background-image: url("https://images.unsplash.com/photo-1553546895-531931aa1aa8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1032&q=80");
                background-color: #cccccc;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                position: relative;
                height: 150px;
            }

            
        </style>
    </head> 
    <body>

        <div class="p-5 bg-primary text-black text-center bg-header ">

        </div>

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Carrito <span class="badge bg-secondary">5</span></a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid mt-3">
            <div align="center">
                <h1>Bienvenido!</h1>
                <p>Compra a un clic de distancia.</p>
            </div>

            <div class="row col-12" align="center">
                
            @foreach ($products as $product)
                <div class="col-sm-4 col-xs-6  ">
                    <div class="mt-4 p-5 bg-dark text-white rounded">
                        <img class="img-fluid" src="{{asset($product->img)}}" alt="{{$product->name}}">
                        <p class="card-text">{{$product->description}}</p>
                        <h4 class="card-title">{{$product->name}}</h4>
                        <a href="#" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            @endforeach


          
            </div>
        </div>

        <div class="mt-5 p-4 bg-dark text-white text-center">
        <p>Evertec E-commerce</p>
        </div>

    </body>

</html>
