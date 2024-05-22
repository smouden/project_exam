@extends('admin.base_admin')

@section('content')
<div class="container mt-4">
    <h1>Edit Category</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary btn-sm py-2 px-1">Update</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-sm py-2 px-1">Cancel</a>
    </form>
</div>
@endsection
