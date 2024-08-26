<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Page;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        return view('sections.index', compact('sections'));
    }

    public function create( )
    {
        $pages = Page::all();
        return view('sections.create', compact('pages')) ;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'    => 'required',
            'page_id' => 'required|exists:pages,id', // 'page_id' is the foreign key to 'id' in 'pages' table
            'content' => 'required',
        ]);

        $section = Section::create($validatedData);

        return redirect()
            ->route('sections.index', $section)
            ->with('success', "Section '{$section->name}' created successfully.");
    }

    public function show(Section $section)
    {
        return view('sections.show', compact('section'));
    }

    public function edit(Section $section)
    {
        $pages = Page::all();
        return view('sections.edit', compact('section','pages'));
    }

    public function update(Request $request, Section $section)
    {
        $request->validate([
            'name'    => 'required',
            'page_id' => 'required|exists:pages,id', // 'page_id' is the foreign key to 'id' in 'pages' table
            'content' => 'required',
        ]);

        $section->update($request->all());

        return redirect()
            ->route('sections.index')
            ->with('success', "Section '{$section->name}' updated successfully.");
    }

    public function destroy(Section $section)
    {
        $section->delete();

        return redirect()
            ->route('sections.index')
            ->with('success', "Section '{$section->name}' deleted successfully.");
    }

   
}
