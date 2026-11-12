<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    public function create($id)
    {
        $grades = Grade::where('subject_id', $id)->get();

        return view('forms.grade-create', ["subject_id" => $id, "existing_grades" => $grades]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'grades' => 'required|array|min:1',
            'grades.*.nosaukums' => 'required|string|min:3|max:255',
            'grades.*.ieguts' => 'nullable|integer|min:1|max:10',
            'grades.*.svars' => 'required|numeric|min:0.001|max:1',
        ]);

        $grades = $validated['grades'];

        // kopējais svars no jau eksistējošām atzīmēm / float vajadzīgs, jo datubāze atgriež decimal kā string
        $existingSvars = (float) Grade::where('subject_id', $validated['subject_id'])->sum('svars');

        $newSvars = collect($grades)->sum(fn ($g) => (float) $g['svars']);

        if ($existingSvars + $newSvars > 1) {
            return back()->withInput()->withErrors([
                'svars' => 'Visu atzīmju svaru summa nedrīkst pārsniegt 1. Šobrīdējais svars: '.round($existingSvars + $newSvars, 3),
            ]);
        }

        // iziet cauri katrai atzīmei un ievieto to datubāzē
        foreach ($validated['grades'] as $grade) {
            Grade::create([
                'nosaukums' => $grade['nosaukums'],
                'ieguts' => $grade['ieguts'],
                'svars' => $grade['svars'],
                'subject_id' => $validated['subject_id'],
            ]);
        }

        return redirect()->route('index')->with('success', 'Atzīme(s) izveidota(s)!');
    }

    public function edit($id)
    {
        $grades = Grade::where('subject_id', $id)->get();

        if ($grades->isEmpty()) {
            return redirect()->route('subjects.index', $id);
        }

        return view('forms.grade-create', ["subject_id" => $id, "grades" => $grades]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'grades' => 'required|array|min:1',
            'grades.*.nosaukums' => 'required|string|min:3|max:255',
            'grades.*.ieguts' => 'nullable|integer|min:1|max:10',
            'grades.*.svars' => 'required|numeric|min:0.001|max:1',
        ]);

        // tikai šī priekšmeta atzīmes, ar atzīmes id kā atslēgu
        $existing = Grade::where('subject_id', $id)->get()->keyBy('id');

        // ignorē id, kas nepieder šim priekšmetam (kāds var viltot formu)
        $grades = collect($validated['grades'])->only($existing->keys()->all())->all();

        abort_if(count($grades) !== $existing->count(), 422);

        $sum = collect($grades)->sum(fn ($g) => (float) $g['svars']);

        if ($sum > 1) {
            return back()->withInput()->withErrors(['svars' => 'Visu atzīmju svaru summa nedrīkst pārsniegt 1. Šobrīdējais svars: '.round($sum, 3)]);
        }

        foreach ($grades as $gradeId => $data) {
            $existing[$gradeId]->update([
                'nosaukums' => $data['nosaukums'],
                'ieguts' => $data['ieguts'] ?? null,
                'svars' => $data['svars'],
            ]);
        }

        return redirect()->route('subjects.index', $id)->with('success', 'Atzīmes rediģētas!');
    }

    public function destroy($id)
    {
        $grade = Grade::findOrFail($id);
        $subject_id = $grade->subject_id;
        $grade->delete();

        return redirect()->route('subjects.index', $subject_id)->with('success', 'Atzīme izdzēsta!');
    }
}
