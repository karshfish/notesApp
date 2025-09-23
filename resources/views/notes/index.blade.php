@extends('layouts.header')
@section('content')
<h1>Notes</h1>
<ul class="list-group">
    @foreach($notes as $n)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="{{ route('notes.show', $n->id) }}">{{ $n->title }}</a>
        <span class="text-muted">#{{ $n->id }}</span>
    </li>
    @endforeach
</ul>
@endsection