@extends('layouts.app')
@section('content')
    <section>
        <div class="container my-5">
            <h1>My Posts</h1>

            <div class="row mt-5">
                @forelse ($posts as $post)
                    <div class="col-md-6 col-lg-4 mb-4 post-card">
                        <div class="card shadow">
                            <img src="{{ asset('uploads/' . $post->cover) }}" alt="" class="card-img-top">

                            <div class="card-body">
                                <h3 class="card-title text-center">
                                   {{ $post->title }}
                                </h3>

                                <p class="text-end">
                                    {{ $post->created_at->format('M. jS Y') }}
                                </p>
                                <p class="text-end">
                                    {{ $post->updated_at->diffForHumans() }}
                                </p>
                                <div class="text-center">
                                    <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-outline-warning">
                                        Edit Post
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                    <form 
                                    onsubmit="return confirm('Are you sure?')"
                                    action="{{ route('post.delete', ['id' => $post->id]) }}" 
                                        method="post">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card shadow p-3">
                            <h3> No post created yet </h3>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection