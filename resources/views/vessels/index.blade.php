@extends('layout')

@section('title', 'Buques')

@section('content')
<a href="{{ route('vessels.create') }}" class="btn btn-primary mb-3">Nuevo Buque</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Vessel Name</th>
            <th>Previus Name</th>
            <th>Built Year</th>
            <th>Built By</th>
            <th>Hydrostatic By</th>
            <th>Call Letters</th>
            <th>Shipyard No</th>
            <th>Hull Number</th>
            <th>Dated At</th>
            <th>Registry Port</th>
            <th>Flag</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vessels as $vessel)
        <tr>
            <td>{{ $vessel->name }}</td>
            <td>{{ $vessel->previus_name }}</td>
            <td>{{ $vessel->built_year }}</td>
            <td>{{ $vessel->built_by }}</td>
            <td>{{ $vessel->hydrostatic_by }}</td>
            <td>{{ $vessel->call_letters }}</td>
            <td>{{ $vessel->shpyard_no }}</td>
            <td>{{ $vessel->hull_no }}</td>
            <td>{{ $vessel->dated_at }}</td>
            <td>{{ $vessel->registry_port }}</td>
            <td>{{ $vessel->flag }}</td>
            <td>
                <a href="{{ route('vessels.edit', $vessel) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('vessels.destroy', $vessel) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar buque?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
