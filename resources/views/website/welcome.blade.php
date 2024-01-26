@extends('website.layouts.app')
@section('content')
    <!-- Hero Section Begin -->
<section class="hero">
    <div class="hero__slider owl-carousel">
        <div class="hero__item set-bg" data-setbg="{{asset('img/hero/hero-1.jpg')}}">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="hero__text">
                            <h2>Making your life sweeter one bite at a time!</h2>
                            <a href="#" class="primary-btn">Our cakes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero__item set-bg" data-setbg="{{asset('img/hero/hero-1.jpg')}}">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="hero__text">
                            <h2>Making your life sweeter one bite at a time!</h2>
                            <a href="#" class="primary-btn">Our cakes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="categories">
    <div class="container">
        <div class="row">
            
            <div class="categories__slider owl-carousel">
                @foreach ($categories as $namecategory)
                <div class="categories__item">
                    <div class="categories__item__icon">
                        <span class="flaticon-029-cupcake-3"></span>
                        <h5>{{ $namecategory ->name }}</h5>
                    </div>
                </div>
                @endforeach
            </div>
            
        </div>
    </div>
</div>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            @foreach ($product as $item )
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ Storage::url($item->image) }}">
                        <div class="product__label">
                            <span>{{ $item->categoryName }}</span>
                        </div>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">{{ $item->name }}</a></h6>
                        <div class="product__item__price">{{ $item->price }}</div>
                        <div class="cart_add">
                            <a href="#">Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
            
        </div>
    </div>
</section>
<!-- Product Section End -->









@endsection
@section('web-script')
    <script>
        $(document).ready(function () {
        })
    </script>
@endsection