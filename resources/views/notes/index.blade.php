@extends('layouts.header')
@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Notes</h1>
        <a href="{{ route('notes.create') }}" class="btn btn-primary">Add New Note</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Topic</th>
                <th>Completed</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notes as $note)
            <tr>
                <td>{{ $note->id }}</td>
                <td>
                    @if($note->completed)
                    <s>{{ $note->title }}</s> <!-- strikethrough if completed -->
                    @else
                    {{ $note->title }}
                    @endif
                </td>
                <td>{{ $note->topic }}</td>
                <td class="text-center">
                    @if($note->completed)
                    <span class="text-success">&#10003;</span> <!-- checkmark -->
                    @else
                    <span class="text-muted">&#10007;</span> <!-- cross mark -->
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('notes.destroy', $note->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure you want to delete this note?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection