@extends('layouts.app')

@section('content')
    <h1>Detalle del Emprendimiento</h1>
    @if (!empty($entrepreneurship) && is_array($entrepreneurship))
        <table>
            <br><br>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Emprendedor</th>
                    <th>Nombre del Inversionista</th>
                    <th>Título de la Publicación</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $entrepreneurship['id'] ?? 'N/A' }}</td>
                    <td>{{ $entrepreneurship['entrepreneur']['name'] ?? 'N/A' }}</td>
                    <td>{{ $entrepreneurship['investor']['name'] ?? 'N/A' }}</td>
                    <td>{{ $entrepreneurship['publishEntrepreneurships']['title'] ?? 'N/A' }}</td>
                </tr>
            </tbody>
        </table>
    @else
        <p>No hay datos disponibles para este emprendimiento.</p>
    @endif
@endsection
