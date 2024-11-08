@extends('layouts.app')

@section('content')
    <h1>Publicar Emprendimientos</h1>
    <div>
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
                    <th>Detalle</th>
                    <th>Eliminar</th>
                    <th>Actualizar</th>
                </tr>
            </thead>
            <tbody>
                @if(count($publishEntrepreneurships) > 0)
                    @foreach ($publishEntrepreneurships as $publishEntrepreneurship)
                        <tr>
                            <td>{{ $publishEntrepreneurship['id'] }}</td>
                            <td>{{ $publishEntrepreneurship['name'] }}</td>
                            <td>{{ $publishEntrepreneurship['phone_number'] }}</td>
                            <td>{{ $publishEntrepreneurship['email'] }}</td>
                            <td>{{ $publishEntrepreneurship['description'] }}</td>
                            <td>{{ $publishEntrepreneurship['location'] }}</td>
                            <td><a href="{{ $publishEntrepreneurship['url'] }}" target="_blank">{{ $publishEntrepreneurship['url'] }}</a></td>
                            <td>{{ $publishEntrepreneurship['expiration_date'] }}</td>
                            <td><a href="{{ route('Publish_Entrepreneurships.show', $publishEntrepreneurship['id']) }}"><button>Ver más</button></a></td>
                            <td>
                                {{-- Aquí puedes implementar un formulario o botón para eliminar --}}
                            </td>
                            <td>
                                {{-- Aquí puedes implementar un botón para editar --}}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="11">No hay emprendimientos disponibles.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
