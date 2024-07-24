<?php

namespace App\Http\Controllers;

use App\Models\Text;
use Illuminate\Http\Request;

class TextController extends Controller
{
    public function index()
    {
        $texts = Text::all();
        return view('Dashboard.texts.index', compact('texts'));
    }

    public function edit(Text $text)
    {
        return view('Dashboard.texts.edit', compact('text'));
    }

    public function update(Request $request, Text $text)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $text->update($request->all());

        return redirect()->route('Dashboard.texts.index')->with('status', 'Text updated successfully!');
    }

    public function destroy(Text $text)
    {
        $text->delete();
        return redirect()->route('Dashboard.texts.index')->with('status', 'Text deleted successfully!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Text::create($request->all());

        return redirect()->route('texts.index')->with('status', 'Text created successfully!');
    }
}
