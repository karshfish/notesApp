<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;


class NotesController extends Controller
{

    public function __construct()
    {
        // Ensure only logged-in users can access notes
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch only notes for the logged-in user
        $notes = auth()->user()->notes()->latest()->get();

        return view('notes.index', [
            'notes' => $notes,
            'title' => 'My Notes'
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

        auth()->user()->notes()->create([
            'title' => $request->title,
            'topic' => $request->topic,
            'completed' => $request->has('completed'),
        ]);

        return redirect()->route('notes.index')->with('success', 'Note created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Make sure the note belongs to the logged-in user
        $note = auth()->user()->notes()->findOrFail($id);

        return view('notes.show', [
            'note' => $note,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $note = auth()->user()->notes()->findOrFail($id);

        return view('notes.edit', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'topic' => 'required|string|max:255',
            'completed' => 'nullable|boolean',
        ]);

        $note = auth()->user()->notes()->findOrFail($id);

        $note->update([
            'title' => $request->title,
            'topic' => $request->topic,
            'completed' => $request->has('completed'),
        ]);

        return redirect()->route('notes.index')->with('success', 'Note updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $note = auth()->user()->notes()->findOrFail($id);

        $note->delete();

        return redirect()->route('notes.index')
            ->with('success', 'Note deleted successfully!');
    }
}
