@extends('layouts.app')

@section('content')
    <h1>Lista de Reseñas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Calificación</th>
                <th>Comentario</th>
                <th>Emprendedor</th>
                <th>Inversor</th>
                <th>Emprendimiento</th>
                <th>DETALLE</th>
                <th>ELIMINAR</th>
                <th>Actualizar datos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $review['id'] }}</td>
                    <td>{{ $review['qualification'] }}</td>
                    <td>{{ $review['comment'] }}</td>
                    
                    {{-- Datos del emprendedor --}}
                    <td>
                        {{ $review['entrepreneur']['name'] }} {{ $review['entrepreneur']['lastname'] }}
                        <br>
                        Email: {{ $review['entrepreneur']['email'] }}
                    </td>
                    
                    {{-- Datos del inversor --}}
                    <td>
                        {{ $review['investor']['name'] }} {{ $review['investor']['lastname'] }}
                        <br>
                        Email: {{ $review['investor']['email'] }}
                    </td>
                    
                    {{-- Datos del emprendimiento --}}
                    <td>
                        @if($review['entrepreneurship'])
                            Número: {{ $review['entrepreneurship']['number'] }}
                        @else
                            No asignado
                        @endif
                    </td>

                    <td><a href="{{ route('Reviews.show', $review['id']) }}"><button>Ver más</button></a></td>
                    <td><button>Eliminar</button></td>
                    <td><button>Actualizar</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
