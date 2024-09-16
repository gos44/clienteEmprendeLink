@extends('layouts.app')

@section('content')
    <h1>Lista de Emprendimientos</h1>
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
                @if (!empty($entrepreneurships) && is_array($entrepreneurships))
                    @foreach ($entrepreneurships as $entrepreneurship)
                        <tr>
                            <td>{{ $entrepreneurship['id'] ?? 'N/A' }}</td>
                            <td>{{ $entrepreneurship['entrepreneur']['name'] ?? 'N/A' }}</td>
                            <td>{{ $entrepreneurship['investor']['name'] ?? 'N/A' }}</td>
                            <td>{{ $entrepreneurship['publishEntrepreneurships']['title'] ?? 'N/A' }}</td>
                            <td><a href="{{ route('entrepreneurships.show', $entrepreneurship['id'] ?? '') }}"><button>Ver más</button></a></td>
                            <td>
                                <form action="{{ route('entrepreneurships.destroy', $entrepreneurship['id'] ?? '') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Eliminar</button>
                                </form>
                            </td>
                            <td><a href="{{ route('entrepreneurships.edit', $entrepreneurship['id'] ?? '') }}"><button>Editar</button></a></td>
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
