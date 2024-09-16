@extends('layouts.app')

@section('content')
    <h1>publicar emprendimientos</h1>
    <div>

        <br><br><br>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>entrepreneurs</th>
                    <th>investors</th>
                    <th>DETALLE</th>
                    <th>ELIMINAR</th>
                    <th>Actualizar datos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($publishEntrepreneurships as $publishEntrepreneurship)
                    <tr>
                        <td>{{ $publishEntrepreneurships['id'] }}</td>
                        <td>{{ $publishEntrepreneurships['entrepreneurs_id'] }}</td>
                        {{-- <td>{{ $entrepreneurList['investors_id'] }}</td> --}}

                        <td><a href="{{ route('Publish_Entrepreneurships.show', $publishEntrepreneurships['id']) }}"><button>Ver más</button></a></td>
                        <td>
                            {{-- <form action="{{ route('apprentices.destroy', $apprentice['id']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form> --}}
                        </td>
                        {{-- <td><a href="{{ route('apprentices.view', $apprentice['id']) }}"><button>Editar</button></a></td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
