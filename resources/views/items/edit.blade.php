<style>
    table {
        border-collapse: collapse;
    }

    th, td {
        padding: 4px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    .alert {
        margin-top: 10px;
    }
</style>

<h2>Edit Item</h2>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="/items/{{ $item->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <table class="table">
        <!-- Category -->
        <tr>
            <td><label for="category_id">Category:</label></td>
            <td>
                <select name="category_id" id="category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </td>
        </tr>

        <!-- Title -->
        <tr>
            <td><label for="title">Title:</label></td>
            <td>
                <input type="text" name="title" id="title" value="{{ $item->title }}" required>
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </td>
        </tr>

        <!-- Description -->
        <tr>
            <td><label for="description">Description:</label></td>
            <td>
                <textarea name="description" id="description" class="form-control" required>{{ $item->description }}</textarea>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </td>
        </tr>

        <!-- Price -->
        <tr>
            <td><label for="price">Price:</label></td>
            <td>
                <input type="number" name="price" id="price" value="{{ $item->price }}" required>
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </td>
        </tr>

        <!-- Quantity -->
        <tr>
            <td><label for="quantity">Quantity:</label></td>
            <td>
                <input type="number" name="quantity" id="quantity" value="{{ $item->quantity }}" required>
                @error('quantity')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </td>
        </tr>

        <!-- SKU -->
        <tr>
            <td><label for="sku">SKU:</label></td>
            <td>
                <input type="text" name="sku" id="sku" value="{{ $item->sku }}" required>
                @error('sku')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </td>
        </tr>

        <!-- Picture -->
        <tr>
            <td><label for="picture">Picture:</label></td>
            <td>
                <input type="file" name="picture" id="picture" class="form-control">
                @error('picture')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </td>
        </tr>
    </table>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Update Items</button>
</form>
