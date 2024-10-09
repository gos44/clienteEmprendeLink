@extends('layouts.app')

@section('content')
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
            <tr>
                <td>{{ $publishEntrepreneurship['id'] ?? 'N/A' }}</td> 
                <td>{{ $publishEntrepreneurship['name'] ?? 'N/A' }}</td> 
                <td>{{ $publishEntrepreneurship['phone_number'] ?? 'N/A' }}</td> 
                <td>{{ $publishEntrepreneurship['email'] ?? 'N/A' }}</td> 
                <td>{{ $publishEntrepreneurship['description'] ?? 'N/A' }}</td> 
                <td>{{ $publishEntrepreneurship['location'] ?? 'N/A' }}</td> 
                <td>{{ $publishEntrepreneurship['url'] ?? 'N/A' }}</td> 
                <td>{{ $publishEntrepreneurship['expiration_date'] ?? 'N/A' }}</td> 
            </tr>
        </tbody>
    </table>
@endsection
