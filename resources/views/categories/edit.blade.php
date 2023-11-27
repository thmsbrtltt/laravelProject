<h2>Edit Category</h2>

<form action="/categories/{{ $category->id }}" method="post">
    @csrf
    @method('PATCH')

    <label for="name">Category Name:</label>
    <input type="text" name="name" id="name" value="{{ $category->name }}" required>

    <!-- Add other fields as needed -->

    <button type="submit">Update Category</button>
</form>
