@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
            font-size: 16px;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        td {
            background-color: #fff;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>

    <h1>Detalle de Mi Emprendimiento</h1>
    @if (!empty($myentrepreneurship) && is_array($myentrepreneurship))
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Especificaciones</th>
                    <th>Nombre del Emprendedor</th>
                    <th>Nombre del Inversionista</th>
                    <th>Reseñas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $myentrepreneurship['id'] }}</td>
                    <td>{{ $myentrepreneurship['name'] }}</td>
                    <td>{{ $myentrepreneurship['description'] }}</td>
                    <td>{{ $myentrepreneurship['category'] }}</td>
                    <td>{{ $myentrepreneurship['especifications'] }}</td>
                    <td>{{ $myentrepreneurship['entrepreneur']['name'] ?? 'N/A' }}</td>
                    <td>{{ $myentrepreneurship['investor']['name'] ?? 'N/A' }}</td>
                    <td>{{ $myentrepreneurship['Review']['comments'] ?? 'Sin reseñas' }}</td>
                </tr>
            </tbody>
        </table>
    @else
        <p>No hay datos disponibles para este emprendimiento.</p>
    @endif
@endsection
