<?php

namespace App\Http\Controllers;

use App\Models\Modality;
use Illuminate\Http\Request;

class ModalityController extends Controller
{
    /**
     * Papar senarai semua modality
     */
    public function index()
    {
        $modalities = Modality::all();
        return view('modalities.index', compact('modalities'));
    }

    /**
     * Papar borang tambah modality
     */
    public function create()
    {
        return view('modalities.create');
    }

    /**
     * Simpan data modality baharu
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:modalities',
            'description' => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);

        Modality::create($request->all());

        return redirect()->route('modalities.index')->with('success', 'Modality created successfully.');
    }

    /**
     * Papar borang edit modality
     */
    public function edit(Modality $modality)
    {
        return view('modalities.edit', compact('modality'));
    }

    /**
     * Kemaskini data modality sedia ada
     */
    public function update(Request $request, Modality $modality)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:modalities,code,' . $modality->id,
            'description' => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);

        $modality->update($request->all());

        return redirect()->route('modalities.index')->with('success', 'Modality updated successfully.');
    }

    /**
     * Padam modality
     */
    public function destroy(Modality $modality)
    {
        $modality->delete();

        return redirect()->route('modalities.index')->with('success', 'Modality deleted successfully.');
    }
}
