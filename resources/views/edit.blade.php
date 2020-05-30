@extends('layouts.app')

@section('content')

    <div class="container bg-info rounded shadow-sm">
        <h3>Editando {{$contacto->nombre}}</h3>
        <form action="{{route('editar.send', $contacto->id_contacto)}}" method="POST">
            @csrf

            <div class="form-row p-3">
                <div class="col-md-6 mb-4">
                    <input type="text" class="form-control" value="{{$contacto->nombre}}" name="nombre" placeholder="Nombres">
                </div>
                <div class="col-md-6 mb-4">
                    <input type="text" class="form-control" value="{{$contacto->apellido}}" name="apellido" placeholder="Apellidos">
                </div>
                <div class="col-md-6 mb-4">
                    <input type="text" class="form-control" value="{{$contacto->telefono}}" name="telefono" placeholder="Celular">
                </div>
                <div class="col-md-6 mb-4">
                    <input type="text" class="form-control" value="{{$contacto->direccion}}" name="direccion" placeholder="Direccion">
                </div>
                <div class="col-md-6 mb-4">
                    <input type="text" class="form-control" value="{{$contacto->cumpleaños}}" name="cumpleaños" placeholder=Cumpleaños>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-5">
                    <button class="btn btn-primary" type="submit">Actualizar Contacto</button>

                </div>
            </div>
        </form>
    </div>

@endsection
