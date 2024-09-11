@extends('layouts.app')

@section('content')
    <h1>Lista de Mis Emprendimientos</h1>
    <div>
        <br><br><br>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Emprendedor</th>
                    <th>Inversionista</th>
                    <th>Publicación</th>
                    <th>DETALLE</th>
                    <th>ELIMINAR</th>
                    <th>Actualizar datos</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($myentrepreneurships) && is_array($myentrepreneurships))
                    @foreach ($myentrepreneurships as $myentrepreneurship)
                        <tr>
                            <td>{{ $myentrepreneurship['id'] ?? 'N/A' }}</td>
                            <td>{{ $myentrepreneurship['entrepreneur']['name'] ?? 'N/A' }}</td>
                            <td>{{ $myentrepreneurship['investor']['name'] ?? 'N/A' }}</td>
                            <td>{{ $myentrepreneurship['publishEntrepreneurships']['title'] ?? 'N/A' }}</td>
                            <td><a href="{{ route('myentrepreneurships.show', $myentrepreneurship['id'] ?? '') }}"><button>Ver más</button></a></td>
                            <td>
                                <form action="{{ route('myentrepreneurships.destroy', $myentrepreneurship['id'] ?? '') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Eliminar</button>
                                </form>
                            </td>
                            <td><a href="{{ route('myentrepreneurships.edit', $myentrepreneurship['id'] ?? '') }}"><button>Editar</button></a></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">No hay datos disponibles.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
