@extends('layouts.app')

@section('content')
    <h1>Mis Emprendimientos</h1>
    <div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Emprendedor</th>
                    <th>Inversionista</th>
                    <th>Publicación</th>
                    <th>Detalle</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($myentrepreneurships) && is_array($myentrepreneurships))
                    @foreach ($myentrepreneurships as $myentrepreneurship)
                        <tr>
                            <td>{{ $myentrepreneurship['id'] ?? 'N/A' }}</td>
                            <td>{{ $myentrepreneurship['entrepreneur']['name'] ?? 'N/A' }}</td>
                            <td>{{ $myentrepreneurship['investor']['name'] ?? 'N/A' }}</td>
                            <td>{{ $myentrepreneurship['publish_Entrepreneurships']['title'] ?? 'N/A' }}</td>
                            <td><a href="{{ route('myentrepreneurships.show', $myentrepreneurship['id'] ?? '') }}"><button>Ver más</button></a></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">No hay datos disponibles.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
