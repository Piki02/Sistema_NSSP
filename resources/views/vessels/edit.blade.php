@extends('layout')

@section('title', 'Editar Buque')

@section('content')
<form action="{{ route('vessels.update', $vessel) }}" method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $vessel->name) }}" required>
    </div>
    <div class="mb-3">
        <label>Nombre anterior</label>
        <input type="text" name="previous_name" class="form-control" value="{{ old('previous_name', $vessel->previous_name) }}">
    </div>
    <div class="mb-3">
        <label>Año de construcción</label>
        <input type="number" name="built_year" class="form-control" value="{{ old('built_year', $vessel->built_year) }}">
    </div>
    <div class="mb-3">
        <label>Astillero</label>
        <input type="text" name="built_by" class="form-control" value="{{ old('built_by', $vessel->built_by) }}">
    </div>
    <div class="mb-3">
        <label>Hydrostatic By</label>
        <input type="text" name="hydrostatic_by" class="form-control" value="{{ old('hydrostatic_by', $vessel->hydrostatic_by) }}">
    </div>
    <div class="mb-3">
        <label>Call Letters</label>
        <input type="text" name="call_letters" class="form-control" value="{{ old('call_letters', $vessel->call_letters) }}">
    </div>
    <div class="mb-3">
        <label>Shpyard No</label>
        <input type="text" name="shpyard_no" class="form-control" value="{{ old('shpyard_no', $vessel->shpyard_no) }}">
    </div>
    <div class="mb-3">
        <label>Hull No</label>
        <input type="text" name="hull_no" class="form-control" value="{{ old('hull_no', $vessel->hull_no) }}">
    </div>
    <div class="mb-3">
        <label>Fecha</label>
        <input type="date" name="dated_at" class="form-control" value="{{ old('dated_at', $vessel->dated_at) }}">
    </div>
    <div class="mb-3">
        <label>Puerto de registro</label>
        <input type="text" name="registry_port" class="form-control" value="{{ old('registry_port', $vessel->registry_port) }}">
    </div>
    <div class="mb-3">
        <label>Bandera</label>
        <input type="text" name="flag" class="form-control" value="{{ old('flag', $vessel->flag) }}">
    </div>

    <button class="btn btn-primary">Actualizar</button>
    <a href="{{ route('vessels.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
