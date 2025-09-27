<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct() {}
    public function index()
    {
        $notes = Note::all();
        return view('notes.index', [
            'notes' => $notes,
            'title' => 'Main Page'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'topic' => 'required|string|max:255',
            'completed' => 'nullable|boolean'
        ]);
        Note::create([
            'title' => $request['title'],
            'topic' => $request['topic'],
            'completed' => $request->has('completed')
        ]);
        return redirect()->route('notes.index')->with('success', 'Note created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //dd($this->notes[$id]);
        $data = Note::findOrFail($id);
        return view('notes.show', [
            'notes' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function edit(string $id)
    {
        $note = Note::findOrFail($id);
        return view('notes.edit', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'topic' => 'required|string|max:255',
            'completed' => 'nullable|boolean',
        ]);

        $data = [
            'title' => $request->title,
            'topic' => $request->topic,
            'completed' => $request->has('completed'),
        ];

        $note->update($data);

        return redirect()->route('notes.index')->with('success', 'Note updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index')
            ->with('success', 'Note deleted successfully!');
    }
}
