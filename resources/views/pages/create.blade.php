<h1>Create New Page</h1>
<form method="POST" action="{{ route('pages.store') }}">
    @csrf
    <label>Title:</label>
    <input type="text" name="title">
    <label>Content:</label>
    <textarea name="content"></textarea>
    <button type="submit">Save</button>
</form>
