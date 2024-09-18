@extends('layouts.app')

@section('content')
    <h1>Lista de Reseñas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Calificación</th>
                <th>Comentario</th>
                <th>Emprendimiento</th>
                <th>Detalles</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $review['id'] }}</td>
                    <td>{{ $review['qualification'] }}</td>
                    <td>{{ $review['comment'] }}</td>
                    <td>{{ $review['publishEntrepreneurships_id'] }}</td>
                    <td><a href="{{ route('Reviews.show', $review['id']) }}"><button>Ver más</button></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
