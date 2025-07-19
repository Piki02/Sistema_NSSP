@extends('layout')

@section('title', 'Listado de Time Logs')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Registros de Tiempo</h2>
        <a href="{{ route('time-logs.create') }}" class="btn btn-primary">+ Nuevo Registro</a>
    </div>

    @if($timeLogs->isEmpty())
        <p>No hay registros todavía.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Actividad</th>
                    <th>Descripción</th>
                    <th>File</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($timeLogs as $log)
                    <tr>
                        <td>{{ $log->log_date }}</td>
                        <td>{{ $log->time }}</td>
                        <td>{{ $log->activity }}</td>
                        <td>{{ $log->description }}</td>
                        <td>{{ $log->file->file_number ?? 'Sin file' }}</td>
                        <td>
                            <a href="{{ route('time-logs.edit', $log) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('time-logs.destroy', $log) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este registro?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
