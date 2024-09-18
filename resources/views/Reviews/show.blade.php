@extends('layouts.app')

@section('content')
    <h1>Detalle de la reseña</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Qualification</th>
                <th>Comment</th>
                <th>PublishEntrepreneurships_id</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $review['id'] }}</td>
                <td>{{ $review['qualification'] }}</td>
                <td>{{ $review['comment'] }}</td>
                <td>{{ $review['publishEntrepreneurships_id'] }}</td>
            </tr>
        </tbody>
    </table>
@endsection
