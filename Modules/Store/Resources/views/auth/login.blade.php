@extends('store::layouts.master')

@section('content')
    <div class="container-fluid mt-3 ps-5 pe-5">
        <div align="center">
            <h1>Iniciar sesión</h1>
        </div>

        <div class="row col-12" align="center">
            <form role="form" action="{{ route('store.auth') }}" method="POST">
                {{ csrf_field() }}
                @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        <strong>Error!</strong> Las credenciales proporcionadas no coinciden con nuestros registros.
                    </div>
                @endif

                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </form>
            <a href="{{route('customer.create')}}">Crear cuenta</a>
        </div>
    </div>
@endsection