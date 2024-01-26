@extends('website.layouts.app')
@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url({{ asset('images/bg_3.jpg') }});"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center mb-4">
                    <h1 class="mb-2 bread">Bài viết</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Trang chủ <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a
                                href="{{ route('website.post.index') }}">Bài viết <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>{{ $post->title }}<i
                                class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <h2 class="mb-3">{{ $post->title }}</h2>
                    <div class="content-post mb-4">
                        {!! $post->content !!}
                    </div>

                    <div class="about-author d-flex p-4 bg-light">
                        <div class="desc">
                            <h3>Tác giả: {{ $post->author }}</h3>
                        </div>
                    </div>

                </div> <!-- .col-md-8 -->

                <div class="col-lg-4 sidebar ftco-animate">
                    <div class="sidebar-box ftco-animate">
                        <h3>Bài viết phổ biến</h3>
                        @foreach ($postPopular as $item)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4"
                                    style="background-image: url({{ Storage::url($item->image) }});"></a>
                                <div class="text">
                                    <h3 class="heading"><a
                                            href="{{ route('website.post.details', $item->id) }}">{{ $item->title }}</a>
                                    </h3>
                                    <div class="meta">
                                        <div><a href="#"><span class="icon-calendar"></span>
                                                {{ $item->created_at->format('d - m - Y') }}</a></div>
                                        <div><a href="#"><span class="icon-person"></span>
                                                {{ $item->userCreated }}</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div><!-- END COL -->
            </div>
        </div>
    </section>
    <style>
        .content-post img {
            width: 100%;
            height: 200px;
            object-fit: contain;
            border-radius: 10px;
        }
    </style>
@endsection
