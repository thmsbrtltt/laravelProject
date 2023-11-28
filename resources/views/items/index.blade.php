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

<h2>Items</h2>

<table>
    <thead>
        <tr>
            <th>Item Master List</th>

        </tr>
    </thead>
    <tbody>
        @foreach($items as $items)
            <tr>
                <td>{{ $items->title }}</td>
                <td><a href="/items/{{ $items->id }}/edit">Edit</a></td>
                <td><a href="/items/{{ $items->id }}/edit">Delete</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="/items/create" class="add-link">Add New Item</a>