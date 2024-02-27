@extends('website.layouts.app')
@section('content')
    <!-- Blog Hero Begin -->
    <div class="blog-hero" style="background-image:url({{ Storage::url($post->image) }})">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-7">
                    <div class="blog__hero__text">
                        <div class="label">Recipes</div>
                        <h2>{{ $post->title }}</h2>
                        <ul>
                            
                            <li>13 Nov 2020</li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="blog__details__content">
                        
                        <div class="blog__details__text">
                            {!! $post->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
    <style>
        .content-post img {
            width: 100%;
            height: 200px;
            object-fit: contain;
            border-radius: 10px;
        }
    </style>
@endsection
