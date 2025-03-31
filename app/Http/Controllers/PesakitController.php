<?php

namespace App\Http\Controllers;

use App\Models\Pesakit;
use Illuminate\Http\Request;

class PesakitController extends Controller
{
    public function index()
    {
        $pesakits = Pesakit::latest()->get();
        return view('pesakit.index', compact('pesakits'));
    }

    public function create()
    {
        return view('pesakit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'ic' => 'required|string|max:50|unique:pesakits',
            'jantina' => 'required|in:Lelaki,Perempuan',
            'tarikh_lahir' => 'nullable|date',
            'telefon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'gov_officer' => 'nullable|boolean',
            'etnik' => 'nullable|string|max:100',
            'citizenship' => 'nullable|string|max:100',
        ]);

        $data = $request->all();
        $data['gov_officer'] = $request->has('gov_officer');

        Pesakit::create($data);

        return redirect()->route('pesakit.index')->with('success', 'Pesakit berjaya ditambah.');
    }

    public function edit(Pesakit $pesakit)
    {
        return view('pesakit.edit', compact('pesakit'));
    }

    public function update(Request $request, Pesakit $pesakit)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'ic' => 'required|string|max:50|unique:pesakits,ic,' . $pesakit->id,
            'jantina' => 'required|in:Lelaki,Perempuan',
            'tarikh_lahir' => 'nullable|date',
            'telefon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'gov_officer' => 'nullable|boolean',
            'etnik' => 'nullable|string|max:100',
            'citizenship' => 'nullable|string|max:100',
        ]);

        $data = $request->all();
        $data['gov_officer'] = $request->has('gov_officer');

        $pesakit->update($data);

        return redirect()->route('pesakit.index')->with('success', 'Pesakit berjaya dikemaskini.');
    }

    public function destroy(Pesakit $pesakit)
    {
        $pesakit->delete();

        return redirect()->route('pesakit.index')->with('success', 'Pesakit berjaya dipadam.');
    }
}
