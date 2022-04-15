@extends('store::layouts.master')

@section('content')
    <div class="container-fluid mt-3 ps-5 pe-5">
        <div align="center">
            <h1>Crear cuenta</h1>
        </div>

        <div class="row col-12" align="center">
            <form role="form" action="{{ route('customer.store') }}" method="POST">
                {{ csrf_field() }}

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            <strong>Error!</strong> {{$error}}
                        </div>
                    @endforeach

                @endif
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input type="name" class="form-control" id="name" placeholder="Escriba su nombre" name="name" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Escriba su email" name="email" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="phone" class="form-label">Telefono:</label>
                    <input type="phone" class="form-control" id="phone" placeholder="Escriba su telefono" name="phone" required>
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Escriba su contrasena" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Crear cuenta</button>
            </form>
        </div>
    </div>
@endsection