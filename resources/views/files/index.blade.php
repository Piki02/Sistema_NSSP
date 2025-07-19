@extends('layout')

@section('title', 'Listado de Files')

@section('content')
<a href="{{ route('files.create') }}" class="btn btn-primary mb-3">Nuevo File</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>File Number</th>
            <th>Vessel</th>
            <th>Operation</th>
            <th>Quantity</th>
            <th>Product</th>
            <th>Terminal</th>
            <th>Port</th>
            <th>Status</th>
            <th>Movement</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($files as $file)
        <tr>
            <td>{{ $file->file_number }}</td>
            <td>{{ $file->vessel->name ?? '—' }}</td>
            <td>{{ $file->operation_type }}</td>
            <td>{{ $file->client->name ?? '—' }}</td>
            <td>{{ $file->product}}</td>
            <td>{{ $file->client->name ?? '—' }}</td>
            <td>{{ $file->port}}</td>
            <td>{{ $file->status}}</td>
            <td>{{ $file->movement}}</td>    
            <td>
                <a href="{{ route('files.edit', $file) }}" class="btn btn-sm btn-warning">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection