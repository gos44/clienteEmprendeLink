@extends('layouts.app')

@section('content')
    <table>
        <br><br>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
           
            <tr>
                <td>{{ $connections['id'] }}</td> 
                <td>{{ $connections['connections_id'] }}</td>
                {{-- <td>{{ $connection['connections_id'] }}</td> --}}


            </tr>

        </tbody>
    </table>
@endsection
