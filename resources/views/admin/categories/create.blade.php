@extends('admin.base_admin')

@section('content')
<div class="container mt-4">
    <h1>Create New Category</h1>
    <form action="{{ route('categories.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
        </div>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-sm py-2 px-1">Cancel</a>
        <button type="submit" class="btn btn-primary btn-sm py-2 px-1">Submit</button>
    </form>
</div>
@endsection
