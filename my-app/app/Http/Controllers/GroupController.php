<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    public function show($id)
    {
        $group = Group::with('subjects')->findOrFail($id); // automātiski parāda 404 error
        $subjects = $group->subjects()->orderBy('updated_at', 'desc')->paginate(5);
        return view('components.group-subjects', ["group" => $group, "subjects" => $subjects]);
    }

    public function create(){
        // aizved uz izveidošanas formu

        return view('forms.group-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nosaukums' => 'required|string|unique:groups|min:3|max:255',
        ]);

        $created = Group::create($validated);

        return redirect()->route('groups.show', $created->id)->with('success', 'Grupa izveidota!');
    }

    public function edit($id)
    {
        $group = Group::findOrFail($id);

        return view('forms.group-create', ["group" => $group]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nosaukums' => 'required|string|unique:groups|min:3|max:255',
        ]);

        $group = Group::findOrFail($id);
        $group->update($validated);

        return redirect()->route('groups.show', $id)->with('success', 'Grupa rediģēta!');
    }

    public function destroy($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();

        return redirect()->route('index')->with('success', 'Grupa izdzēsta!');
    }
}
