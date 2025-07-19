@extends('layout')

@section('title', 'Nuevo File')

@section('content')
<form action="{{ route('files.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Número de File</label>
        <input type="text" name="file_number" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Cliente</label>
        <select name="client_id" class="form-control">
            @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Buque</label>
        <select name="vessel_id" class="form-control">
            @foreach($vessels as $vessel)
                <option value="{{ $vessel->id }}">{{ $vessel->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Tipo de operación</label>
        <input type="text" name="operation_type" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>
@endsection