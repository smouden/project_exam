@extends('admin.base_admin')

@section('content')

<div class="container mt-4">
    <h1>Category Details</h1>
    <div class="card mt-4">
        <div class="card-header">
            Category ID: {{ $category->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: {{ $category->name }}</h5>
        </div>
    </div>
    <br>
    <a href="{{ route('categories.index') }}" class="btn btn-primary btn-sm py-2 px-1">Back to Categories</a>
</div>

@endsection

