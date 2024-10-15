<?php
namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Subsection;
use Illuminate\Http\Request;

class SubsectionsController extends Controller
{
    public function index()
    {
        $subsections = Subsection::all();
        return view('subsections.index', compact('subsections'));
    }

    public function create()
    {
        $sections = Section::all();
        return view('subsections.create', compact('sections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'img' => 'required|url',
            'section_id' => 'required|exists:sections,id', // Validate section_id
        ]);

        // Log the request data to ensure section_id is present
        // dd($request->all());

        // Create the Subsection explicitly setting section_id
        Subsection::create([
            'name' => $request->name,
            'img' => $request->img,
            'section_id' => $request->section_id,
        ]);

        return redirect()->route('subsections.index')->with('success', 'Subsection created successfully.');
    }





    public function show(Subsection $subsection)
    {
        return view('subsections.show', compact('subsection'));
    }

    public function edit(Subsection $subsection)
    {
        return view('subsections.edit', compact('subsection'));
    }

    public function update(Request $request, Subsection $subsection)
    {
        $request->validate([
            'name' => 'required',
            'img' => 'required',

        ]);

        $subsection->update($request->all());

        return redirect()->route('subsections.index')->with('success', 'Subsection updated successfully.');
    }

    public function destroy(Subsection $subsection)
    {
        $subsection->delete();
        return redirect()->route('subsections.index')->with('success', 'Subsection deleted successfully.');
    }
}
