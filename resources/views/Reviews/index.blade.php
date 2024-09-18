@extends('layouts.app')

@section('content')
    <h1>Lista de emprendedores</h1>
    <div>
        <br><br><br>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Qualification</th>
                    <th>Comment</th>
                    <th>PublishEntrepreneurships_id</th>
                    <th>Detalle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $review) <!-- Nota: 'review' en singular en el foreach -->
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
    </div>
@endsection
