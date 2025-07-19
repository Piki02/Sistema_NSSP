<?php

namespace App\Http\Controllers;

use App\Models\TimeLog;
use App\Models\File;
use Illuminate\Http\Request;

class TimeLogController extends Controller
{
    /**
     * Muestra todos los registros de time logs.
     */
    public function index()
    {
        $timeLogs = TimeLog::with('file')->orderBy('log_date', 'desc')->get();
        return view('time-logs.index', compact('timeLogs'));
    }

    /**
     * Muestra el formulario para crear un nuevo time log.
     */
    public function create()
    {
        $files = File::all(); // Para seleccionar el file al que pertenece
        return view('time-logs.create', compact('files'));
    }

    /**
     * Guarda un nuevo time log.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file_id' => 'required|exists:files,id',
            'log_date' => 'required|date',
            'time' => 'required',
            'activity' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        TimeLog::create($request->all());

        return redirect()->route('time-logs.index')->with('success', 'Registro creado correctamente.');
    }

    /**
     * Muestra el formulario para editar un time log.
     */
    public function edit(TimeLog $timeLog)
    {
        $files = File::all();
        return view('time-logs.edit', compact('timeLog', 'files'));
    }

    /**
     * Actualiza un time log existente.
     */
    public function update(Request $request, TimeLog $timeLog)
    {
        $request->validate([
            'file_id' => 'required|exists:files,id',
            'log_date' => 'required|date',
            'time' => 'required',
            'activity' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $timeLog->update($request->all());

        return redirect()->route('time-logs.index')->with('success', 'Registro actualizado.');
    }

    /**
     * Elimina un time log.
     */
    public function destroy(TimeLog $timeLog)
    {
        $timeLog->delete();
        return redirect()->route('time-logs.index')->with('success', 'Registro eliminado.');
    }
}
