<h2>Create Item</h2>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="/itemsIndex" method="post" enctype="multipart/form-data">
    @csrf

    <label for="category_id">Category:</label>
    <select name="category_id" id="category_id" required>

    </select>

    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required>

    <label for="description">Description:</label>
    <textarea name="description" id="description" required></textarea>

    <label for="price">Price:</label>
    <input type="number" name="price" id="price" required>

    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" id="quantity" required>

    <label for="sku">SKU:</label>
    <input type="text" name="sku" id="sku" required>

    <label for="picture">Picture:</label>
    <input type="file" name="picture" id="picture" required>

    <button type="submit">Add Item</button>
</form>