<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Group;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('grades')->orderBy('updated_at', 'desc')->paginate(5); // iegūst visus priekšmetus sākot ar jaunākajiem pa 10

        return view('index', ["subjects" => $subjects]);
    }

    public function show($id)
    {
        $subject = Subject::with('grades')->findOrFail($id); // automātiski parāda 404 error
        return view('components.details', ["subject" => $subject]);
    }

    public function create()
    {
        // aizved uz izveidošanas formu -> create/subject
        $groups = Group::all();

        return view('forms.subject-create', ["groups" => $groups]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nosaukums' => 'required|string|min:3|max:255',
            'group_id' => 'nullable|exists:groups,id',
        ]);

        Subject::create($validated);

        return redirect()->route('index')->with('success', 'Priekšmets izveidots!');
    }

    public function edit($id)
    {
        // aizved uz izveidošanas formu -> create/subject
        $groups = Group::all();
        $subject = Subject::findOrFail($id);

        return view('forms.subject-create', ["groups" => $groups, "subject" => $subject]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nosaukums' => 'required|string|min:3|max:255',
            'group_id' => 'nullable|exists:groups,id',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update($validated);

        return redirect()->route('index')->with('success', 'Priekšmets rediģēts!');
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('index')->with('success', 'Priekšmets izdzēsts!');
    }
}
