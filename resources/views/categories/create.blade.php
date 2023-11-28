<form action="/categories" method="post">
    @csrf
    <label for="category_name">Product Catagory Name:</label>
    <input type="text" id="category_name" name="category_name" value="{{ old('category_name') }}" required>
    @error('category_name')
        <p>{{ $message }}</p>
    @enderror
    <button type="submit">Submit</button>
</form>