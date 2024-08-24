<!-- <h1>Pages</h1>
<a href="{{ route('pages.create') }}">Create New Page</a>
<ul>
    @foreach ($pages as $page)
        <li>{{ $page->title }} - <a href="{{ route('pages.edit', $page->id) }}">Edit</a></li>
    @endforeach
</ul> -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manage Pages</h1>
    <a href="{{ route('pages.create') }}" class="btn btn-primary mb-3">Create New Page</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($pages->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                    <tr>
                        <td>{{ $page->id }}</td>
                        <td>{{ $page->title }}</td>
                        <td>{{ Str::limit($page->content, 50) }}</td>
                        <td>
                            <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this page?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No pages found. <a href="{{ route('pages.create') }}">Create a new page</a>.</p>
    @endif
</div>
@endsection
