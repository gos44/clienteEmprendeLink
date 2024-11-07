@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Investors</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Lastname</th>
                    <th>Birth Date</th>
                    <th>Investment Number</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($investors as $investor)
                    <tr>
                        <td>{{ $investor['id'] }}</td>
                        <td>{{ $investor['name'] }}</td>
                        <td>{{ $investor['lastname'] }}</td>
                        <td>{{ $investor['birth_date'] }}</td>
                        <td>{{ $investor['investment_number'] }}</td>
                        <td>{{ $investor['email'] }}</td>
                        <td>{{ $investor['location'] }}</td>
                        <td>
                            <a href="{{ route('inversors.show', $investor['id']) }}" class="btn btn-info">Ver Más</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
