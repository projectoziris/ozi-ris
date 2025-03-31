<?php

namespace App\Http\Controllers;

use App\Models\Modality;
use App\Models\Examination;
use Illuminate\Http\Request;

class ExaminationController extends Controller
{
    public function index(Modality $modality)
    {
        $examinations = $modality->examinations;
        return view('examinations.index', compact('modality', 'examinations'));
    }

    public function create(Modality $modality)
    {
        return view('examinations.create', compact('modality'));
    }

    public function store(Request $request, Modality $modality)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:examinations,code',
        ]);

        $modality->examinations()->create($request->all());

        return redirect()->route('modalities.examinations.index', $modality->id)->with('success', 'Examination created.');
    }

    public function edit(Examination $examination)
    {
        return view('examinations.edit', compact('examination'));
    }

    public function update(Request $request, Examination $examination)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:examinations,code,' . $examination->id,
        ]);

        $examination->update($request->all());

        return redirect()->route('modalities.examinations.index', $examination->modality_id)->with('success', 'Examination updated.');
    }

    public function destroy(Examination $examination)
    {
        $modalityId = $examination->modality_id;
        $examination->delete();

        return redirect()->route('modalities.examinations.index', $modalityId)->with('success', 'Examination deleted.');
    }
}
