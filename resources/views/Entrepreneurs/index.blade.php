@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Entrepreneur</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Lastname</th>
                    <th>Birth Date</th>
                    <th>Password</th>
                    <th>Phone</th>
                    <th>Image</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>Number</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach($Entrepreneurs as $Entrepreneur)
                    <tr>
                        <td>{{ $Entrepreneur['id'] }}</td>
                        <td>{{ $Entrepreneur['name'] }}</td>
                        <td>{{ $Entrepreneur['lastname'] }}</td>
                        <td>{{ $Entrepreneur['birth_date'] }}</td>
                        <td>{{ $Entrepreneur['password'] }}</td>
                        <td>{{ $Entrepreneur['phone'] }}</td>
                        <td>{{ $Entrepreneur['image'] }}</td>
                        <td>{{ $Entrepreneur['email'] }}</td>
                        <td>{{ $Entrepreneur['location'] }}</td>
                        <td>{{ $Entrepreneur['number'] }}</td>
                        <td>
                            <a href="{{ route('Entrepreneur.show', $Entrepreneur['id']) }}" class="btn btn-info">Ver Más</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
