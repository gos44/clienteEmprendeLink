@extends('layouts.app')

@section('content')
    <h1>Emprendimiento</h1>
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
                @if (!empty($entrepreneurships) && is_array($entrepreneurships))
                    @foreach ($entrepreneurships as $entrepreneurship)
                        <tr>
                            <td>{{ $entrepreneurship['id'] ?? 'N/A' }}</td>
                            <td>{{ $entrepreneurship['entrepreneur']['name'] ?? 'N/A' }}</td>
                            <td>{{ $entrepreneurship['investor']['name'] ?? 'N/A' }}</td>
                            <td>{{ $entrepreneurship['publishEntrepreneurships']['title'] ?? 'N/A' }}</td>
                            <td><a href="{{ route('entrepreneurships.show', $entrepreneurship['id'] ?? '') }}"><button>Ver más</button></a></td>
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
