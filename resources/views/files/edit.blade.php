@extends('layout')

@section('title', 'Editar File')

@section('content')
<form action="{{ route('files.update', $file) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Número de File</label>
        <input type="text" name="file_number" class="form-control" value="{{ old('file_number', $file->file_number) }}" required>
    </div>

    <div class="mb-3">
        <label>Cliente</label>
        <select name="client_id" class="form-control">
            @foreach($clients as $client)
                <option value="{{ $client->id }}" {{ $file->client_id == $client->id ? 'selected' : '' }}>
                    {{ $client->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Buque</label>
        <select name="vessel_id" class="form-control">
            @foreach($vessels as $vessel)
                <option value="{{ $vessel->id }}" {{ $file->vessel_id == $vessel->id ? 'selected' : '' }}>
                    {{ $vessel->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Tipo de operación</label>
        <input type="text" name="operation_type" class="form-control" value="{{ old('operation_type', $file->operation_type) }}">
    </div>

    <div class="mb-3">
        <label>Producto</label>
        <input type="text" name="product" class="form-control" value="{{ old('product', $file->product) }}">
    </div>

    <div class="mb-3">
        <label>Terminal</label>
        <input type="text" name="terminal" class="form-control" value="{{ old('terminal', $file->terminal) }}">
    </div>

    <div class="mb-3">
        <label>Puerto</label>
        <input type="text" name="port" class="form-control" value="{{ old('port', $file->port) }}">
    </div>

    <div class="mb-3">
        <label>Movimiento</label>
        <select name="movement" class="form-control">
            <option value="LOAD" {{ $file->movement == 'LOAD' ? 'selected' : '' }}>LOAD</option>
            <option value="DISCHARGE" {{ $file->movement == 'DISCHARGE' ? 'selected' : '' }}>DISCHARGE</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="OPEN" {{ $file->status == 'OPEN' ? 'selected' : '' }}>OPEN</option>
            <option value="CLOSE" {{ $file->status == 'CLOSE' ? 'selected' : '' }}>CLOSE</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Fecha de inicio</label>
        <input type="datetime-local" name="start_date" class="form-control"
               value="{{ old('start_date', optional($file->start_date)->format('Y-m-d\TH:i')) }}">
    </div>

    <div class="mb-3">
        <label>Fecha de fin</label>
        <input type="datetime-local" name="end_date" class="form-control"
               value="{{ old('end_date', optional($file->end_date)->format('Y-m-d\TH:i')) }}">
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('files.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
