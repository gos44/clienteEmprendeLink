@extends('layouts.app')

@section('content')
    <h1>Detalle del Emprendimiento</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Número de Teléfono</th>
                <th>Email</th>
                <th>Descripción</th>
                <th>Ubicación</th>
                <th>URL</th>
                <th>Fecha de Expiración</th>
            </tr>
        </thead>
        <tbody>
            @if($publishEntrepreneurship)
                <tr>
                    <td>{{ $publishEntrepreneurship['id'] ?? 'N/A' }}</td> 
                    <td>{{ $publishEntrepreneurship['name'] ?? 'N/A' }}</td> 
                    <td>{{ $publishEntrepreneurship['phone_number'] ?? 'N/A' }}</td> 
                    <td>{{ $publishEntrepreneurship['email'] ?? 'N/A' }}</td> 
                    <td>{{ $publishEntrepreneurship['description'] ?? 'N/A' }}</td> 
                    <td>{{ $publishEntrepreneurship['location'] ?? 'N/A' }}</td> 
                    <td><a href="{{ $publishEntrepreneurship['url'] }}" target="_blank">{{ $publishEntrepreneurship['url'] ?? 'N/A' }}</a></td> 
                    <td>{{ $publishEntrepreneurship['expiration_date'] ?? 'N/A' }}</td> 
                </tr>
            @else
                <tr>
                    <td colspan="8">El emprendimiento no está disponible.</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
