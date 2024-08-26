@extends('layouts.app')

@section('content')
<h1>Create New Page</h1>
    <form method="POST" action="{{ route('pages.store') }}">
        @csrf
        <label>Title:</label>
        <input type="text" name="title">
        <label>Link Name:</label>
        <textarea name="slug"></textarea>
        <button type="submit">Save</button>
    </form>

@endsection