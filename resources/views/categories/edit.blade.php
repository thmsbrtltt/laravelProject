<h2>Edit Category</h2>

<form action="/categories/{{ $category->id }}" method="post">
    @csrf
    @method('PATCH')

    <label for="category_name">Category Name:</label>
    <input type="text" name="category_name" id="category_name" value="{{ $category->category_name }}" required>

    <button type="submit">Update Category</button>
</form>
