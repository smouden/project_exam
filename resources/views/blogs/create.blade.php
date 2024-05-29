@extends('base')

@section('content')
<div class="container">
    <h2>Create Blog</h2>
    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="picture_blog">Picture Blog</label>
            <input type="file" class="form-control" id="picture_blog" name="picture_blog" required>
        </div>
        <div class="form-group">
            <label for="first_paragraph">First Paragraph</label>
            <textarea class="form-control" id="first_paragraph" name="first_paragraph" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="first_picture">First Picture</label>
            <input type="file" class="form-control" id="first_picture" name="first_picture" required>
        </div>
        <div class="form-group">
            <label for="two_picture">Second Picture (optional)</label>
            <input type="file" class="form-control" id="two_picture" name="two_picture">
        </div>
        <div class="form-group">
            <label for="tree_picture">Third Picture (optional)</label>
            <input type="file" class="form-control" id="tree_picture" name="tree_picture">
        </div>
        <div class="form-group">
            <label for="second_paragraph">Second Paragraph</label>
            <textarea class="form-control" id="second_paragraph" name="second_paragraph" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
