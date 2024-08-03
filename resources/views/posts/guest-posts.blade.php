@extends('layouts.app')
@section('content')
    <section>
        <div class="container my-5">
            <h1>Our Posts</h1>

            <div class="row mt-5">
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
            </div>

            <div class="p-2">
               {!! $posts->links('pagination::bootstrap-5') !!}
               {{-- {!! $posts->links('pagination::simple-bootstrap-5') !!} --}}
            </div>
        </div>
    </section>
@endsection
