@extends('layout')

@section('title', 'Clientes')

@section('content')
<a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">Nuevo Cliente</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Terminal</th>
            <th>Contacto</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
        <tr>
            <td>{{ $client->name }}</td>
            <td>{{ $client->terminal }}</td>
            <td>{{ $client->contact_name }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->phone }}</td>
            <td>{{ $client->address }}</td>
            <td>
                <a href="{{ route('clients.edit', $client) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('clients.destroy', $client) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar cliente?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
