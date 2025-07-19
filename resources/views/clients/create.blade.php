@extends('layout')

@section('title', 'Nuevo Cliente')

@section('content')
<form action="{{ route('clients.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Terminal</label>
        <input type="text" name="terminal" class="form-control">
    </div>
    <div class="mb-3">
        <label>Contacto</label>
        <input type="text" name="contact_name" class="form-control">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label>Teléfono</label>
        <input type="text" name="phone" class="form-control">
    </div>
    <div class="mb-3">
        <label>Dirección</label>
        <textarea name="address" class="form-control"></textarea>
    </div>
    <button class="btn btn-success">Guardar</button>
</form>
@endsection
