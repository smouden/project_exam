@extends('base')

@section('content')
<section class="section">
    <div class="container">

        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">Blogs</h2>
            </div>
        </div>

        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-lg-4 mb-4">
                    <div class="post-entry-alt">
                        <a href="single.html" class="img-link">
                            <img src="{{ asset($blog->picture_blog) }}" alt="Image" class="img-fluid"
                                style="width: 355px; height: 223px;">
                        </a>
                        <div class="excerpt">
                            <h2><a href="single.html">{{ $blog->title }}</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <span class="d-inline-block mt-1">By <a href="#">{{ $blog->user->name }}</a></span>
                                <span>&nbsp;-&nbsp; {{ \Carbon\Carbon::parse($blog->date_blog)->format('M. jS, Y') }}</span>
                            </div>
                            <p><a href="{{ route('blogs.show', $blog->id) }}" class="read-more">More details</a></p>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
@endsection