@extends('layouts.app')

@section('content')
    <h1 style="text-align: center; color: #333; margin-bottom: 20px;">Detalle del Emprendimiento</h1>
    @if (!empty($entrepreneurship) && is_array($entrepreneurship))
        <div style="max-width: 600px; margin: 0 auto; background: #fff; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 8px;">
            <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                <thead>
                    <tr style="background-color: #333; color: #fff;">
                        <th style="padding: 10px; text-align: left;">ID</th>
                        <th style="padding: 10px; text-align: left;">Nombre del Emprendedor</th>
                        <th style="padding: 10px; text-align: left;">Nombre del Inversionista</th>
                        <th style="padding: 10px; text-align: left;">Título de la Publicación</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px;">{{ $entrepreneurship['id'] ?? 'N/A' }}</td>
                        <td style="padding: 10px;">{{ $entrepreneurship['entrepreneur']['name'] ?? 'N/A' }}</td>
                        <td style="padding: 10px;">{{ $entrepreneurship['investor']['name'] ?? 'N/A' }}</td>
                        <td style="padding: 10px;">{{ $entrepreneurship['publishEntrepreneurships']['id'] ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @else
        <p style="text-align: center; color: #999; margin-top: 20px;">No hay datos disponibles para este emprendimiento.</p>
    @endif
@endsection
