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
                    <form action="" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="" class="form-label">Full name</label>
                            <input name="name" id="" rows="5" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Write Comment</label>
                            <textarea name="comment" id="" rows="5" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary" > Save</button>
                        </div>
                    </form>
                </div>

                <div class="card-body">

                    <h4>Comments</h4>
                    <!-- Some borders are removed -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <p class="">John Doe -  <small>3 Seconds </small></p>

                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, recusandae.
                            </p>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </section>
@endsection
