@extends('layouts.app')
@section('content')
    <section>
        <div class="container-fluid">
            <div class="hero">
                <img src="{{ asset('bg.jpg') }}" alt="">
                <h1>Welcome to King Blog</h1>
            </div>
        </div>
    </section>

    <section>
        <div class="container mt-5">
            <h3 class="text-center">Latest Post</h3>
            <div class="row">
                @forelse ($posts as $post)
                    <div class="col-md-6 col-lg-4 mb-4 post-card">
                        <div class="card shadow">
                            <img src="{{ asset('uploads/' . $post->cover) }}" alt="" class="card-img-top">

                            <div class="card-body">
                                <h3 class="card-title text-center">
                                    {{ $post->title }}
                                </h3>

                                <div class="text-center">
                                    <a href="{{ route('read.post.page', [ 'slug' => $post->slug ] ) }}" class="btn btn-outline-warning">
                                        Read Post
                                        <i class="fa-solid fa-book-open"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="h1">
                        Coming Soon...
                    </p>
                @endforelse

                <div class="text-center my-5">
                    <a href="{{ route('all.posts.page') }}" class="btn btn-warning">
                        View All Posts
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
