@extends('admin.base_admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mt-2 mb-3">
    <h3>Categories</h3>
    <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm py-2 px-1">Add New Category</a>

</div>
<br>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info btn-sm py-2 px-1">Show</a>
                    <a href="{{ route('categories.edit', $category->id) }}"
                        class="btn btn-warning btn-sm py-2 px-1">Edit</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm py-2 px-1 ">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection