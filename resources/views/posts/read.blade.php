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

                <img src="{{ asset('uploads/'. $post->cover) }}" alt="{{ $post->title }}" class="w-100 post_cover">

                <article class="my-4 card-body">
                    {!! $post->content !!}
                </article>
            </div>
        </div>
    </section>
@endsection