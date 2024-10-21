<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Excavator;

class ExcavatorController extends Controller
{
    public function index()
    {
        // $excavators = "Hello World";
        // $excavators = Excavator::find(1);
        // $excavators = Excavator::where('name', 'nama A')->get();
        $excavators = Excavator::all();

        return view('excavators.index', compact('excavators'));
    }

    public function create()
    {
        return view('excavators.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'model' => 'required|string|min:3|max:255',
        ]);
 
        // Excavator::create($request->all());
        Excavator::create([
           'name' => $request->name,
           'model' => $request->model,
        ]);

        return redirect()
        ->route('excavators.index')
        ->with('success', 'Data berhasil dibuat');
    }

    public function show(string $id)
    {
        $excavators = Excavator::findOrFail($id);

        return view('excavators.show', compact('excavators'));
    }

    public function edit(Excavator $excavator)
    {
        return view('excavators.edit', compact('excavator'));
    }

    public function update(Request $request, Excavator $excavator)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'model' => 'required|string|min:3|max:255',
        ]);
 
        $excavator->update($request->all());

        return redirect()
        ->route('excavators.index')
        ->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Excavator $excavator)
    {
        $excavator->delete();

        return redirect()
        ->route('excavators.index')
        ->with('success', 'Data berhasil dihapus');
    }
}
