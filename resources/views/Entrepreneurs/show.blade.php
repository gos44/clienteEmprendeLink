@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Entrepreneur</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>ID:</strong> {{ $Entrepreneur['id'] }}</p>
                <p><strong>Nombre:</strong> {{ $Entrepreneur['name'] }}</p>
                <p><strong>Apellido:</strong> {{ $Entrepreneur['lastname'] }}</p>
                <p><strong>Fecha de Nacimiento:</strong> {{ $Entrepreneur['birth_date'] }}</p>
                <p><strong>Contraseña</strong> {{ $Entrepreneur['password'] }}</p>
                <p><strong>telefono:</strong> {{ $Entrepreneur['phone'] }}</p>
                <p><strong>imagen:</strong> {{ $Entrepreneur['image'] }}</p> 
                <p><strong>correo:</strong> {{ $Entrepreneur['email'] }}</p> 
                <p><strong>Ubicación:</strong> {{ $Entrepreneur['location'] }}</p> 
                <p><strong>numero:</strong> {{ $Entrepreneur['number'] }}</p> 

            </div>
        </div>
        <a href="{{ route('Entrepreneurs.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
    </div>
@endsection
