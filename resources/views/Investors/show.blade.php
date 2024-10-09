@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Inversor</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>ID:</strong> {{ $investor['id'] }}</p>
                <p><strong>Nombre:</strong> {{ $investor['name'] }}</p>
                <p><strong>Apellido:</strong> {{ $investor['lastname'] }}</p>
                <p><strong>Fecha de Nacimiento:</strong> {{ $investor['birth_date'] }}</p>
                <p><strong>Número de Inversión:</strong> {{ $investor['investment_number'] }}</p>
                <p><strong>Email:</strong> {{ $investor['email'] }}</p>
                <p><strong>Ubicación:</strong> {{ $investor['location'] }}</p>
            </div>
        </div>
        <a href="{{ route('inversors.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
    </div>
@endsection
