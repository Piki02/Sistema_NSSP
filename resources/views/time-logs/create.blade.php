@extends('layout')

@section('title', 'Nuevo Registro de Tiempo')

@section('content')
    <h2>Crear nuevo registro de tiempo</h2>

    <form action="{{ route('time-logs.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">File:</label>
            <select name="file_id" class="form-select" required>
                <option value="">-- Selecciona un file --</option>
                @foreach($files as $file)
                    <option value="{{ $file->id }}">{{ $file->file_number }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha:</label>
            <input type="date" name="log_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Hora:</label>
            <input type="time" name="time" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Actividad:</label>
            <input type="text" name="activity" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción:</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('time-logs.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
