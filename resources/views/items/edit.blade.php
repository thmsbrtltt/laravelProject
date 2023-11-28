<h2>Edit Item</h2>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="/items/{{ $item->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    

    <!-- Category -->
    <div class="form-group">
        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id" class="form-control" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Title -->
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ $item->title }}" required>
        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <!-- Description -->
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" id="description" class="form-control" required>{{ $item->description }}</textarea>
        @error('description')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <!-- Price -->
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" value="{{ $item->price }}" required>
        @error('price')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <!-- Quantity -->
    <div class="form-group">
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" value="{{ $item->quantity }}" required>
        @error('quantity')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <!-- SKU -->
    <div class="form-group">
        <label for="sku">SKU:</label>
        <input type="text" name="sku" id="sku" value="{{ $item->sku }}" required>
        @error('sku')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <!-- Picture -->
    <div class="form-group">
        <label for="picture">Picture:</label>
        <input type="file" name="picture" id="picture" class="form-control">
        @error('picture')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Update Items</button>
</form>
