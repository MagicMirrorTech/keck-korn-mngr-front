<h1>Edit Page</h1>
<form method="POST" action="{{ route('pages.update', $page->id) }}">
    @csrf
    @method('PUT')
    <label>Title:</label>
    <input type="text" name="title" value="{{ $page->title }}">
    <label>Content:</label>
    <textarea name="content">{{ $page->content }}</textarea>
    <button type="submit">Update</button>
</form>
