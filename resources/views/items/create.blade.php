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

<form action="/items" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id" class="form-control" required>
           
        </select>
    </div>

    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" id="description" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="sku">SKU:</label>
        <input type="text" name="sku" id="sku" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="picture">Picture:</label>
        <input type="file" name="picture" id="picture" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Add Item</button>
</form>
