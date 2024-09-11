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
                <td>{{ $publishEntrepreneurships['id'] }}</td> 
                <td>{{ $publishEntrepreneurships['entrepreneurs_id'] }}</td>
                {{-- <td>{{ $entrepreneurList['investors_id'] }}</td> --}}


            </tr>

        </tbody>
    </table>
@endsection
