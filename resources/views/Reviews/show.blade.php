@extends('layouts.app')

@section('content')
    <h1>Detalles de la Reseña</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Calificación</th>
                <th>Comentario</th>
                {{-- <th>Emprendimiento</th> --}}
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $review['id'] }}</td>
                <td>{{ $review['qualification'] }}</td>
                <td>{{ $review['comment'] }}</td>
                {{-- <td>{{ $review['publishEntrepreneurships_id'] }}</td> --}}
            </tr>
        </tbody>
    </table>
@endsection
