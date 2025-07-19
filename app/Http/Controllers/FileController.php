<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Client;
use App\Models\Vessel;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Mostrar todos los files.
     */
    public function index()
    {
        $files = File::with(['client', 'vessel'])->get();
        return view('files.index', compact('files'));
    }

    /**
     * Mostrar formulario para crear un nuevo file.
     */
    public function create()
    {
        $clients = Client::all();
        $vessels = Vessel::all();
        return view('files.create', compact('clients', 'vessels'));
    }

    /**
     * Guardar un nuevo file en base de datos.
     */
    public function store(Request $request)
{
    $request->validate([
        'file_number' => 'required|unique:files,file_number',
        'client_id' => 'required|exists:clients,id',
        'vessel_id' => 'required|exists:vessels,id',
    ]);

    File::create($request->only([
        'file_number',
        'client_id',
        'vessel_id',
        'operation_type',
        'product',
        'terminal',
        'port',
        'movement',
        'status',
        'start_date',
        'end_date',
        'quantity'
    ]));

    return redirect()->route('files.index')->with('success', 'File creado exitosamente.');
}


    /**
     * Mostrar formulario para editar un file existente.
     */
    public function edit(File $file)
    {
        $clients = Client::all();
        $vessels = Vessel::all();
        return view('files.edit', compact('file', 'clients', 'vessels'));
    }

    /**
     * Actualizar un file en base de datos.
     */
    public function update(Request $request, File $file)
    {
        $request->validate([
            'file_number' => 'required|unique:files,file_number,' . $file->id,
            'client_id' => 'required|exists:clients,id',
            'vessel_id' => 'required|exists:vessels,id',
        ]);

        $file->update($request->all());
        return redirect()->route('files.index')->with('success', 'File actualizado exitosamente.');
    }

    /**
     * Eliminar un file (opcional).
     */
    public function destroy(File $file)
    {
        $file->delete();
        return redirect()->route('files.index')->with('success', 'File eliminado.');
    }

   public function search(Request $request)
    {
    $request->validate([
        'branch' => 'required|in:GT,HN,CR',
        'number' => 'required|numeric',
    ]);

    $file_number = strtoupper($request->branch) . '-' . trim($request->number);

    $file = File::with(['client', 'vessel', 'timeLogs'])->where('file_number', $file_number)->first();

    if (!$file) {
        return redirect()->back()->with('error', 'No se encontró el File: ' . $file_number);
    }

    return view('files.show', compact('file'));
    }

    public function show(File $file)
    {
        $file->load(['client', 'vessel', 'timeLogs']);

        return view('files.show', compact('file'));
    }
}
