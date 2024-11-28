<?php

namespace App\Http\Controllers;

use App\Models\Name;
use Illuminate\Http\Request;

class NameController extends Controller
{
    public function index()
    {
        $names = Name::all();
        return view('names.index', compact('names'));
    }

    public function create()
    {
        return view('names.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Name::create($request->all());
        return redirect()->route('names.index')->with('success', 'Name added successfully.');
    }

    public function show(Name $name)
    {
        return view('names.show', compact('name'));
    }

    public function edit(Name $name)
    {
        return view('names.edit', compact('name'));
    }

    public function update(Request $request, Name $name)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $name->update($request->all());
        return redirect()->route('names.index')->with('success', 'Name updated successfully.');
    }

    public function destroy(Name $name)
    {
        $name->delete();
        return redirect()->route('names.index')->with('success', 'Name deleted successfully.');
    }
}
