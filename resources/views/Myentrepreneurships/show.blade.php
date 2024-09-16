@extends('layouts.app')

@section('content')
    <h1>Detalle de Mi Emprendimiento</h1>
    @if (!empty($myentrepreneurship) && is_array($myentrepreneurship))
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
                    <td>{{ $myentrepreneurship['id']  }}</td>
                    <td>{{ $myentrepreneurship['entrepreneur']['name']}}</td>
                    <td>{{ $myentrepreneurship['investor']['name']  }}</td>
                    <td>{{ $myentrepreneurship['publishEntrepreneurships'] }}</td>
                </tr>
            </tbody>
        </table>
    @else
        <p>No hay datos disponibles para este emprendimiento.</p>
    @endif
@endsection
