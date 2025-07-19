@extends('layout')

@section('title', 'Editar Cliente')

@section('content')
<form action="{{ route('clients.update', $client) }}" method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $client->name) }}" required>
    </div>
    <div class="mb-3">
        <label>Terminal</label>
        <input type="text" name="terminal" class="form-control" value="{{ old('terminal', $client->terminal) }}">
    </div>
    <div class="mb-3">
        <label>Contacto</label>
        <input type="text" name="contact_name" class="form-control" value="{{ old('contact_name', $client->contact_name) }}">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $client->email) }}">
    </div>
    <div class="mb-3">
        <label>Teléfono</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone', $client->phone) }}">
    </div>
    <div class="mb-3">
        <label>Dirección</label>
        <textarea name="address" class="form-control">{{ old('address', $client->address) }}</textarea>
    </div>
    <button class="btn btn-primary">Actualizar</button>
    <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
