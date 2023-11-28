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
        background-color: #d3d3d3;
    }

    .alert {
        margin-top: 10px;
    }

    .add-link {
        margin-top: 10px;
        padding: 4px;
        background-color: #a3a3a3;
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
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>
                    <a href="/items/{{ $item->id }}/edit">Edit</a>
                    <a href="#" onclick="confirmDelete({{ $item->id }})">Delete</a>
                    <form id="delete-form-{{ $item->id }}" action="/items/{{ $item->id }}" method="post" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="/items/create" class="add-link">Add New Item</a>

<script>
    function confirmDelete(itemId) {
        if (confirm("Are you sure you want to delete this item?")) {
            document.getElementById(`delete-form-${itemId}`).submit();
        }
    }
</script>
