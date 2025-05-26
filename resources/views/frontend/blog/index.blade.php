@extends('frontend.layouts.app')

@section('title')
    Blog
@endsection

@section('content')
    <section>
        <div class="container mt-150">
            <div class="row col-lg-12 mb-30">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <h3 class="medium-header mb-30">
                            BLOG
                        </h3>
                    </div>
                </div>
                @foreach ($posts as $post)
                    <div class="col-lg-4 mb-30">
                        <div class="card">
                            <img src="{{ asset(getenv('CUSTOM_THUMBNAIL_LOCATION') . '/' . $post->thumbnail) }}"
                                class="card-img-top" alt="{{ $post->title }}">
                            <div class="card-body">
                                <a href="{{ route('blog.show', ['slug' => $post->slug]) }}" class="card-title-blog">
                                    {{ $post->title }}
                                </a>
                                <p class="card-text-blog">
                                    {{ excerpt($post->meta_description) }}
                                </p>
                                <span class="date-blog">
                                    {{ $post->created_at->isoFormat('D MMMM Y') }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="paginations text-center mt-30">
                    <ul>
                        <li><a href="#"><i class="fa-solid fa-angle-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="fa-solid fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>

    </section>
@endsection
