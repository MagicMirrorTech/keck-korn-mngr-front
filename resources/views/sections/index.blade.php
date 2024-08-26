
@extends('layouts.app')

@section('content')

<!-- section MANAGEMENT SECTION -->
<div class="container">
    <h1>Manage sections</h1>
    <a href="{{ route('sections.create') }}" class="btn btn-primary mb-3">Create New section</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($sections->count() > 0)
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
                @foreach ($sections as $section)
                    <tr>
                        <td>{{ $section->id }}</td>
                        <td>{{ $section->name }}</td>
                        <td>{{ Str::limit($section->content, 50) }}</td>
                        <td>
                            <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('sections.destroy', $section->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this section?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No sections found. <a href="{{ route('sections.create') }}">Create a new section</a>.</p>
    @endif
</div>



@endsection
