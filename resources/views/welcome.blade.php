@extends('layouts.app')
@section('content')
    <section>
        <div class="container-fluid">
            <div class="hero">
                <img src="{{asset('bg.jpg')}}" alt="">
                <h1>Welcome to King Blog</h1>
            </div>
        </div>
    </section>

    <section>
        <div class="container mt-5">
            <h3 class="text-center">Latest Post</h3>
            <div class="row">
                @for ($i = 0; $i < 9; $i++)          
                <div class="col-md-6 col-lg-4 mb-4 post-card">
                    <div class="card shadow">
                        <img src="{{ asset('img-1.jpg') }}" alt="" class="card-img-top">

                        <div class="card-body">
                            <h3 class="card-title text-center">
                                Post Title
                            </h3>

                            <div class="text-center">
                                <a href="" class="btn btn-outline-warning">
                                    Read Post
                                    <i class="fa-solid fa-book-open"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>
@endsection