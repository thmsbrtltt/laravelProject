<style>
    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    .form-table {
        width: 100%;
        border-collapse: collapse;
    }

    .form-table th,
    .form-table td {
        padding: 8px;
        border: 1px solid #ddd;
    }

    .form-table th {
        text-align: left;
        background-color: #f2f2f2;
    }

    #image-preview {
        max-width: 100%;
        max-height: 200px;
        margin-top: 10px;
    }
</style>

<h2>Create Item</h2>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('custom_error'))
    <div class="alert alert-danger">
        {{ session('custom_error') }}
    </div>
@endif

<form action="/items" method="post" enctype="multipart/form-data">
    @csrf

    <table class="form-table">
        <!-- Category -->
        <tr>
            <th><label for="category_id">Category:</label></th>
            <td>
                <select name="category_id" id="category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </td>
        </tr>

        <!-- Title -->
        <!-- Title -->
<tr>
    <th><label for="title">Title:</label></th>
    <td>
        <input type="text" name="title" id="title" value="{{ old('title') }}" required>
        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </td>
</tr>

<!-- Description -->
<tr>
    <th><label for="description">Description:</label></th>
    <td>
        <textarea name="description" id="description" class="form-control" required></textarea>
        @error('description')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </td>
</tr>

<!-- Price -->
<tr>
    <th><label for="price">Price:</label></th>
    <td>
        <input type="number" name="price" id="price" class="form-control" required>
        @error('price')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </td>
</tr>

<!-- Quantity -->
<tr>
    <th><label for="quantity">Quantity:</label></th>
    <td>
        <input type="number" name="quantity" id="quantity" class="form-control" required>
        @error('quantity')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </td>
</tr>

<!-- SKU -->
<tr>
    <th><label for="sku">SKU:</label></th>
    <td>
        <input type="text" name="sku" id="sku" class="form-control" required>
        @error('sku')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </td>
</tr>

<!-- Picture -->
<tr>
    <th><label for="picture">Picture:</label></th>
    <td>
        <input type="file" name="picture" id="picture" class="form-control" required>
        <img id="image-preview" src="#" alt="Image Preview" style="display: none;">
        @error('picture')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </td>
</tr>

    </table>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Add Item</button>
</form>

<script>
    function previewImage(event) {
        var input = event.target;
        var preview = document.getElementById('image-preview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>