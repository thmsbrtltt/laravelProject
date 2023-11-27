<form action="/categories" method="post">
    @csrf
    <label for="name">Category Name:</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
    @error('name')
        <p>{{ $message }}</p>
    @enderror
    <button type="submit">Submit</button>
</form>