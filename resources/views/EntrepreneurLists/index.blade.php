@extends('layouts.app')

@section('content')
    <h1>Lista de emprededores</h1>
    <div>

        <br><br><br>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>entrepreneurs</th>
                    <th>investors</th>
                    <th>DETALLE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entrepreneurLists as $entrepreneurList)
                    <tr>
                        <td>{{ $entrepreneurList['id'] }}</td>
                        <td>{{ $entrepreneurList['entrepreneurs_id'] }}</td>
                        <td>{{ $entrepreneurList['investors_id'] }}</td>

                        <td><a href="{{ route('EntrepreneurLists.show', $entrepreneurList['id']) }}"><button>Ver más</button></a></td>
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
