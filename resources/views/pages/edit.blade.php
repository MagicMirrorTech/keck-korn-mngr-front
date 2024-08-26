@extends('layouts.app')

@section('content')
    <h1>Edit Page</h1>
        <form method="POST" action="{{ route('pages.update', $page->id) }}">
            @csrf
            @method('PUT')
            <label>Title:</label>
            <input type="text" name="title" value="{{ $page->title }}">
            <label>Link Name:</label>
            <textarea name="slug">{{ $page->slug }}</textarea>
            <button type="submit">Update</button>
        </form>
@endsection