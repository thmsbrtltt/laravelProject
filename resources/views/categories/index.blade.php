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

    .add-link {
        margin-top: 10px;
        padding: 4px;
        background-color: #4CAF50;
        color: white;
        text-align: center;
        text-decoration: none;
    }
</style>

<h2>Categories</h2>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table>
    <thead>
        <tr>
            <th>Category Name</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->category_name }}</td>
                <td><a href="/categories/{{ $category->id }}/edit">Edit</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="/categories/create" class="add-link">Add New Category</a>
