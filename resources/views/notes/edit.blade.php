@extends('layouts.header')
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Note</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('notes.update', $note->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $note->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="topic" class="form-label">Topic</label>
            <input type="text" name="topic" id="topic" class="form-control" value="{{ old('topic', $note->topic) }}" required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" name="completed" id="completed" value="1"
                {{ old('completed', $note->completed) ? 'checked' : '' }}>
            <label class="form-check-label" for="completed">Completed</label>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('notes.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection