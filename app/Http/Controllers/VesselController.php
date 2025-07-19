<?php

namespace App\Http\Controllers;

use App\Models\Vessel;
use Illuminate\Http\Request;

class VesselController extends Controller
{
    public function index()
    {
        $vessels = Vessel::all();
        return view('vessels.index', compact('vessels'));
    }

    public function create()
    {
        return view('vessels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Vessel::create($request->all());
        return redirect()->route('vessels.index')->with('success', 'Buque creado.');
    }

    public function edit(Vessel $vessel)
    {
        return view('vessels.edit', compact('vessel'));
    }

    public function update(Request $request, Vessel $vessel)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $vessel->update($request->all());
        return redirect()->route('vessels.index')->with('success', 'Buque actualizado.');
    }

    public function destroy(Vessel $vessel)
    {
        $vessel->delete();
        return redirect()->route('vessels.index')->with('success', 'Buque eliminado.');
    }
}
