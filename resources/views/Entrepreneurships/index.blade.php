@extends('layouts.app')

@section('content')
    <h1 style="text-align: center; color: #333; margin-bottom: 20px;">Emprendimiento</h1>
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 8px;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #333; color: #fff;">
                    <th style="padding: 10px; text-align: left;">ID</th>
                    <th style="padding: 10px; text-align: left;">Emprendedor</th>
                    <th style="padding: 10px; text-align: left;">Inversionista</th>
                    <th style="padding: 10px; text-align: left;">Publicación</th>
                    <th style="padding: 10px; text-align: center;">Detalle</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($entrepreneurships) && is_array($entrepreneurships))
                    @foreach ($entrepreneurships as $entrepreneurship)
                        <tr style="border-bottom: 1px solid #ddd;">
                            <td style="padding: 10px;">{{ $entrepreneurship['id'] ?? 'N/A' }}</td>
                            <td style="padding: 10px;">{{ $entrepreneurship['entrepreneur']['name'] ?? 'N/A' }}</td>
                            <td style="padding: 10px;">{{ $entrepreneurship['investor']['name'] ?? 'N/A' }}</td>
                            <td style="padding: 10px;">{{ $entrepreneurship['publishEntrepreneurships']['title'] ?? 'N/A' }}</td>
                            <td style="padding: 10px; text-align: center;">
                                <a href="{{ route('entrepreneurships.show', $entrepreneurship['id'] ?? '') }}" style="text-decoration: none;">
                                    <button style="background-color: #333; color: #fff; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer;">
                                        Ver más
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" style="padding: 20px; text-align: center; color: #999;">No hay datos disponibles.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
