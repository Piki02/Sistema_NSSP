@extends('layout')

@section('title', 'Editar Time Log')

@section('content')
    <h2>Editar registro de tiempo</h2>

    <form action="{{ route('time-logs.update', $timeLog) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">File:</label>
            <select name="file_id" class="form-select" required>
                @foreach($files as $file)
                    <option value="{{ $file->id }}" {{ $file->id == $timeLog->file_id ? 'selected' : '' }}>
                        {{ $file->file_number }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha:</label>
            <input type="date" name="log_date" value="{{ $timeLog->log_date }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Hora:</label>
            <input type="time" name="time" value="{{ $timeLog->time }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Actividad:</label>
            <input type="text" name="activity" value="{{ $timeLog->activity }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción:</label>
            <textarea name="description" class="form-control" rows="3">{{ $timeLog->description }}</textarea>
        </div>

        <button class="btn btn-primary">Actualizar</button>
        <a href="{{ route('time-logs.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
