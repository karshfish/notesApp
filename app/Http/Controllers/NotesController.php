<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private array $notes;
    public function __construct()
    {
        $this->notes = [
            (object)['id' => 1, 'title' => 'first note', 'topic' => 'Attend lecture'],
            (object)['id' => 2, 'title' => 'second note', 'topic' => 'Study Laravel'],
            (object)['id' => 3, 'title' => 'third note', 'topic' => 'Fix Laravel bugs']
        ];
    }
    public function index()
    {

        return view('notes.index', ['notes' => $this->notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //dd($this->notes[$id]);
        $data = $this->notes[$id - 1];
        return view('notes.show', [
            'notes' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
