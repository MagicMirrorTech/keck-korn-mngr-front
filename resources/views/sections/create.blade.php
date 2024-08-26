@extends('layouts.app')

@section('content')
<h1>Create New Section</h1>
    <form method="POST" action="{{ route('sections.store') }}">
        @csrf
        <label>Name:</label>
        <input type="text" name="name">
        <label for="pageList">List of Pages</label>
        <select name="page_id" id="pageList">
            @foreach ($pages as $page)
                <option value="{{ $page->id }}">{{ $page->title }}</option>
            @endforeach
        <label>Content:</label>
        <textarea name="content"></textarea>
        <button type="submit">Save</button>
    </form>

@endsection