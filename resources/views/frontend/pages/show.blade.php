@extends('frontend.layouts.app')

@section('title')
    {{ $page->title }}
@endsection

@section('content')
    <section>
        <div class="container mt-150">
            <div class="row col-lg-12 mb-30">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
                    </ol>
                </nav>
                <!-- Article -->
                <div class="col-lg-12 mb-30">
                    <h3 class="medium-header mb-20">
                        {{ $page->title }}
                    </h3>
                    <p class="primary-copy">
                        {!! $page->content !!}
                    </p>


                </div>
            </div>
        </div>
    </section>
@endsection
