@extends('layouts.header')
@section('content')
<span>{{$notes->topic}}</span>
<span> Status: {{$notes->completed ? "Done":"Pending"}}</span>
@endsection