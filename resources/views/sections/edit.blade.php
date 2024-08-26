@extends('layouts.app')

@section('content')
    <h1>Edit section</h1>
        <form method="POST" action="{{ route('sections.update', $section->id) }}">
            @csrf
            @method('PUT')
            <label>Section Name:</label>
            <input type="text" name="name" value="{{ $section->name }}">
            <label for="pageList">List of Pages</label>
            <select name="page_id" id="pageList">
                @foreach ($pages as $page)
                    <option value="{{ $page->id }}" {{ $page->id == $section->page_id ? 'selected' : '' }}>{{ $page->title }}</option>
                @endforeach
            <label>Content:</label>
            <textarea name="content">{{ $section->content }}</textarea>
            <button type="submit">Update</button>
        </form>
@endsection