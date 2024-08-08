@extends('layouts.app')
@section('content')
    <section>
        <div class="container my-5">
            <div class="card mx-auto shadow" style="max-width: 780px;">
                <div class="card-header text-center">
                    <h1>{{ $post->title }}</h1>
                    <p>
                        {{ $post->created_at->format('M. jS Y') }}
                    </p>
                </div>

                <img src="{{ asset('uploads/' . $post->cover) }}" alt="{{ $post->title }}" class="w-100 post_cover">

                <article class="my-4 card-body">
                    {!! $post->content !!}
                </article>
            </div>

            <div class="card shadow border-0 my-5 mx-auto" style="max-width: 780px;">
                <div class="card-header">
                    <form action="{{ route('add.new.comment', ['id' => $post->id]) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="" class="form-label">Full name</label>
                            <input name="name" id="" rows="5" class="form-control">
                            @error('name')
                                <p class="text-danger small fw-bold"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Write Comment</label>
                            <textarea name="comment" id="" rows="5" class="form-control"></textarea>
                            @error('comment')
                                <p class="text-danger small fw-bold"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary"> Save</button>
                        </div>
                    </form>
                </div>

                <div class="card-body">

                    <h4>Comments</h4>
                    <!-- Some borders are removed -->
                    <ul class="list-group list-group-flush">
                        @forelse ($post->comments()->latest()->get() as $comment)
                            <li class="list-group-item">
                                <p class=""> {{ $comment->name }} - <small> {{ $comment->created_at->diffForHumans() }} </small></p>

                                <p>
                                   {{ $comment->comment }}
                                </p>
                            </li>
                        @empty
                            <li>Be the first to comment</li>
                        @endforelse

                    </ul>

                </div>
            </div>
        </div>
    </section>
@endsection
