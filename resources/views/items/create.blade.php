<style>
    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }
</style>

<h2>Create Item</h2>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="/items" method="post" enctype="multipart/form-data"> <!-- edit 9:03 am-->
    @csrf

    <!-- Category -->
    <div class="form-group">
        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id" class="form-control" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Title -->
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" required>
        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <!-- Description -->
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" id="description" class="form-control" required></textarea>
    </div>

    <!-- Price -->
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" class="form-control" required>
    </div>

    <!-- Quantity -->
    <div class="form-group">
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" class="form-control" required>
    </div>

    <!-- SKU -->
    <div class="form-group">
        <label for="sku">SKU:</label>
        <input type="text" name="sku" id="sku" class="form-control" required>
    </div>

    <!-- Picture -->
    <div class="form-group">
        <label for="picture">Picture:</label>
        <input type="file" name="picture" id="picture" class="form-control" required>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Add Item</button>
</form>
