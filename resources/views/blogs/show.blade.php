@extends('base')

@section('content')
<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{ asset('images/hero_5.jpg') }}');">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-6">
                <div class="post-entry text-center">
                    <h1 class="mb-4">{{ $blog->title }}</h1>
                    <div class="post-meta align-items-center text-center">

                        <span class="d-inline-block mt-1">--> By {{ $blog->user->name }}</span>
                        <span>&nbsp;-&nbsp; {{ \Carbon\Carbon::parse($blog->date_blog)->format('M. jS, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="container">

        <div class="row blog-entries element-animate justify-content-center text-center">

            <div class="col-md-12 col-lg-8 main-content">

                <div class="post-content-body">
                    <p>{{ $blog->first_paragraph }}</p>
                    <div class="row my-4 justify-content-center">
                        <div class="col-md-12 mb-4">
                            <img src="{{ asset($blog->first_picture) }}" alt="Image placeholder" class="img-fluid rounded" style="width: 730px; height: 340px;">
                        </div>
                        @if($blog->two_picture)
                            <div class="col-md-6 mb-4">
                                <img src="{{ asset($blog->two_picture) }}" alt="Image placeholder" class="img-fluid rounded" style="width: 350px; height: 220px;">
                            </div>
                        @endif
                        @if($blog->tree_picture)
                            <div class="col-md-6 mb-4">
                                <img src="{{ asset($blog->tree_picture) }}" alt="Image placeholder" class="img-fluid rounded" style="width: 350px; height: 220px;">
                            </div>
                        @endif
                    </div>
                    <p>{{ $blog->second_paragraph }}</p>
                </div>

                <div class="pt-5">
                    <p>Category of The blog: <a href="#">{{ $blog->category->name }}</a></p>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
