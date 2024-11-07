@extends('layouts.app')

@section('content')
    <h1>Detalles de la Reseña</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Calificación</th>
                <th>Comentario</th>
                <th>Emprendedor</th>
                <th>Inversor</th>
                <th>Emprendimiento</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $review['id'] }}</td>
                <td>{{ $review['qualification'] }}</td>
                <td>{{ $review['comment'] }}</td>
                <td>
                    {{ $review['entrepreneur']['name'] }} {{ $review['entrepreneur']['lastname'] }}
                </td>
                <td>
                    {{ $review['investor']['name'] }} {{ $review['investor']['lastname'] }}
                </td>
                <td>
                    @if ($review['entrepreneurship'])
                        {{ $review['entrepreneurship']['id'] }} <!-- Puedes mostrar más información del emprendimiento aquí -->
                    @else
                        No disponible
                    @endif
                </td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('Reviews.index') }}">Regresar a la lista de reseñas</a>
@endsection
