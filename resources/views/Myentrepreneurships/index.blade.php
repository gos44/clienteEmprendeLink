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

        .table-container {
            max-width: 1000px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: center;
            font-size: 16px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        td {
            background-color: #fff;
            color: #333;
        }

        tr:nth-child(even) td {
            background-color: #f9f9f9;
        }

        a button {
            padding: 8px 12px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        a button:hover {
            background-color: #555;
        }

        .no-data {
            text-align: center;
            padding: 20px;
            font-size: 16px;
            color: #999;
        }
    </style>

    <h1>Mis Emprendimientos</h1>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Especificaciones</th>
                    <th>Emprendedor</th>
                    <th>Inversionista</th>
                    <th>Reseñas</th>
                    <th>Detalle</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($myentrepreneurships) && is_array($myentrepreneurships))
                    @foreach ($myentrepreneurships as $myentrepreneurship)
                        <tr>
                            <td>{{ $myentrepreneurship['id'] ?? 'N/A' }}</td>
                            <td>{{ $myentrepreneurship['name'] ?? 'N/A' }}</td>
                            <td>{{ $myentrepreneurship['description'] ?? 'N/A' }}</td>
                            <td>{{ $myentrepreneurship['category'] ?? 'N/A' }}</td>
                            <td>{{ $myentrepreneurship['especifications'] ?? 'N/A' }}</td>
                            <td>{{ $myentrepreneurship['entrepreneur']['name'] ?? 'N/A' }}</td>
                            <td>{{ $myentrepreneurship['investor']['name'] ?? 'N/A' }}</td>
                            <td>{{ $myentrepreneurship['review']['comments'] ?? 'Sin reseñas' }}</td>
                            <td>
                                <a href="{{ route('myentrepreneurships.show', $myentrepreneurship['id'] ?? '') }}">
                                    <button>Ver más</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9" class="no-data">No hay datos disponibles.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
