@extends('layouts.app')

@section('content')
    <table>
        <br><br>
        <thead>
            <tr>
                <th>ID</th>
                <th>entrepreneurs</th>
                <th>investors</th>
            </tr>
        </thead>
        <tbody>
           
            <tr>
                <td>{{ $entrepreneurList['id'] }}</td> 
                <td>{{ $entrepreneurList['entrepreneurs_id'] }}</td>
                <td>{{ $entrepreneurList['investors_id'] }}</td>


            </tr>

        </tbody>
    </table>
@endsection
