@extends('layouts.app')

@section('content')
    <div class="container mt-5 shadow-sm">
        <div class="row">
    @foreach($contactos as $contacto)
        <div class="col-md-3">
    <div class="card h-100">
        <img src="/storage/{{$contacto->foto}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$contacto->nombre}} {{$contacto->apellido}} <span class="text-muted">({{$contacto->apodo}})</span></h5>
             <br>
            <p class="card-text text-center">
                <b>Telefono: </b> {{$contacto->telefono}} <br>
                <b>Direccion: </b> {{$contacto->direccion}} <br>
                <b>Cumpleaños: </b> {{$contacto->cumpleaños}} <br>
                <b>URL: </b> <a href="{{$contacto->url}}">{{$contacto->url}}</a> <br>
            </p>
            </div>
        <div class="card-footer text-muted text-center">
            <a href="{{route('editar', $contacto->id_contacto)}}" class="btn btn-primary btn-sm">Editar</a> <a href="{{route('eliminar', $contacto->id_contacto)}}" class="btn btn-danger btn-sm">Eliminar</a>
        </div>
    </div>
        </div>
    @endforeach

        </div>
</div>

@endsection
