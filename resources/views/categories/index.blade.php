@extends('layouts.app') 

@section('content')
 <h2>Categories</h2>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table>
    <thead>
        <tr>
            <th>Category Name | </th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td><a href="/categories/{{ $category->id }}/edit">Edit</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="/categories/create">Add New Category</a>