@extends('layout')

@section('title', 'Detalles del File ' . $file->file_number)

@section('content')
    <h2>Detalles del File</h2>
    <p><strong>Operación:</strong> {{ $file->operation_type }}</p>
    <p><strong>Cliente:</strong> {{ $file->client->name ?? 'Sin cliente' }}</p>
    <p><strong>Buque:</strong> {{ $file->vessel->name ?? 'Sin buque' }}</p>

    <h4 class="mt-4">Registros de Tiempo</h4>
    @if($file->timeLogs->count())
        <ul class="list-group">
            @foreach($file->timeLogs as $log)
                <li class="list-group-item">
                    {{ $log->log_date }} {{ $log->time }} — {{ $log->description }}
                </li>
            @endforeach
        </ul>
    @else
        <p>No hay time logs.</p>
    @endif
@endsection
