@extends('website.layouts.app')
@section('content')

<div class="main-container col1-layout no-margin-top">
    <div class="main">
        <div class="margin-bottom: 5px;">
            <div class="container" style="background-color : transparent!important;">
            </div>
        </div>
        <div class="col-main">
            <div class="container">
                <div class="container-inner">
                    <ul id="admin_messages"></ul>
                    <style>
                        .fhs-input-box .fhs-input-group.checked-error .fhs-textbox-alert,
                        .fhs-input-box.checked-error .fhs-input-group .fhs-textbox-alert {
                            background: url(Content/Home/imgs/ico_fail.png) no-repeat center center;
                            -webkit-background-size: cover;
                            -moz-background-size: cover;
                            -o-background-size: cover;
                            background-size: cover;
                            height: 20px;
                            width: 20px;
                            display: inline-block;
                        }

                        .fhs-input-box.checked-pass .fhs-input-group .fhs-textbox-alert {
                            background: url(Content/Home/imgs/ico_fail.png/ico_success.html) no-repeat center center;
                            -webkit-background-size: cover;
                            -moz-background-size: cover;
                            -o-background-size: cover;
                            background-size: cover;
                            height: 20px;
                            width: 20px;
                            display: inline-block;
                        }

                    </style>

                    <div class="std">

                        <div id="fhs-homebanner">
                            <div class=" fhs-banner-image-block " style="">
                                <div class="col-sm-3 col-md-3 col-xs-6 block-item no-padding hidden-xs">
                                    <div class="banner-home-inner">
                                        <a class="cursor-pointer" href="sach-moi-phat-hanh.html" target="_parent">
                                            <img src="./UserFiles/files/S%c3%a1ch%20s%e1%ba%afp%20ph%c3%a1t%20h%c3%a0nh%20(1).jpg" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 col-xs-6 block-item no-padding hidden-xs">
                                    <div class="banner-home-inner">
                                        <a class="cursor-pointer" href="#" target="_parent">
                                            <img src="./UserFiles/files/S%c3%a1ch%20Hot%20(1).png" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 col-xs-6 block-item no-padding hidden-xs">
                                    <div class="banner-home-inner">
                                        <a class="cursor-pointer" href="#" target="_parent">
                                            <img src="./UserFiles/files/S%c3%a1ch%20s%e1%ba%afp%20ph%c3%a1t%20h%c3%a0nh.png" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 col-xs-6 block-item no-padding hidden-xs no-margin-right-important">
                                    <div class="banner-home-inner ">
                                        <a class="cursor-pointer" href="#" target="_parent">
                                            <img src="./UserFiles/files/2510.jpg" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="desktop_only" style="width: 100%;">
                            <div class="fhs_block" style="margin-top: 24px;">
                                <div class="fhs_block_head fhs_center_left"><span class="ico_menu_red" style="margin-right: 8px;"></span><span class="fhs_block_head_title">Danh mục Sách</span></div>
                                <div class="fhs_block_line">
                                    <div></div>
                                </div>
                                <div class="fhs_block_head">
                                    <div class="menu_category_block_content_list" style="display: grid;grid-template-columns: repeat(10, 1fr);">
                                        @foreach($listCate as $C)

                                        <a href="{{route('website.product.productCate',$C->id)}}" title="{{$C->name}}" class="fhs_column_center">
                                            <img style="width:110px;height:145px;" alt="{{$C->name}}" class="lazyloaded" src="{{ Storage::url($C->image) }}" data-src="{{ Storage::url($C->image) }}" />
                                            <div class="fhs_nowrap_two fhs_center_center" style="margin-top: 16px; font-size: 1.15em;">
                                                {{$C->name}}</div>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>



                        <link rel="stylesheet" type="text/css" href="./Content/Home/css/topvote.css" media="all" />
                        <div class="block-vote">
                            <div style="background-image: url('./Content/Home/imgs/banner_vote.png');" class="header-vote">
                                <div class="header-icon-gridslider">
                                    <img src="./Content/Home/imgs/ico_dealhot.png" class="center">
                                    Sách bán chạy trong tuần <div class="fhs_blockimagecategory_icon_arrow"></div>
                                </div>

                            </div>
                            <div class="tab-content">
                                <div id="block-fhs-vote" style="padding:15px;">
                                    <div class="fhs-product-slider-content">
                                        <div class="swiper-container swiper-container-horizontal">
                                            <ul class="fhs-product-slider-list">
                                                @foreach ($product as $p)
                                                <li class="fhs_product_basic swiper-slide flashsale-item swiper-slide-active">
                                                    <div class="item-inner">
                                                        <div class="ma-box-content">
                                                            <div class="products clear">
                                                                <div class="product images-container">
                                                                    <a href="{{ route('website.product.detail',$p->id) }}" title="{{$p->name}}" class="product-image">
                                                                        <div class="product-image">
                                                                            <img alt="{{$p->name}}" class="lazyloaded" src="{{ Storage::url($p->image) }}" />

                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <h2 class="product-name-no-ellipsis">
                                                                    <a href="{{ route('website.product.detail',$p->id) }}" title="{{$p->name}}">{{$p->name}}</a>
                                                                </h2>
                                                                <div style="" class="author">{{$p->author}}</div>
                                                                <div class="price-label">
                                                                    <p class="special-price">
                                                                        @if($p->sale)
                                                                        <span class="price m-price-font fhs_center_left">
                                                                            {{ number_format($p->sale, 0, ',', '.') }} đ
                                                                            <span class="discount-percent fhs_center_left"><img style="width:15px;" src="./img/bolt.png"></span>
                                                                        </span>
                                                                        <p class="old-price">
                                                                            <span class="price">{{ $p->price ? number_format($p->price, 0, ',', '.') . ' đ' : '' }}
                                                                            </span>
                                                                        </p>
                                                                    </p>
                                                                    @else
                                                                    <p class="text-xl">
                                                                        <span class="price" style="font-size: x-large;color: #888888;">{{ $p->price ? number_format($p->price, 0, ',', '.') . ' đ' : '' }}
                                                                        </span>
                                                                    </p>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="fs_bg">
                            <div id="flashsale-slider" style="display: block; margin: 32px 0px; position: relative; z-index: 1;">
                                <div class="block-vote">
                                    <div style="border-bottom: 1px solid #F2F4F5;" class="header-vote">
                                        <div class="header-icon-gridslider" style="color: #000;">
                                            <i class="ico_sachtrongnuoc" style="margin-right:10px;"></i> <a href="/">Sách Mới Phát
                                                Hành</a>
                                            <div class="fhs_blockimagecategory_icon_arrow"></div>
                                        </div>

                                    </div>
                                    <div class="tab-content">
                                        <div id="block-fhs-vote" style="padding:15px;">
                                            <div class="fhs-product-slider-content">
                                                <div class="swiper-container swiper-container-horizontal">
                                                    <ul class="fhs-product-slider-list">
                                                        @foreach($newbooks as $book)
                                                        <li class="fhs_product_basic swiper-slide flashsale-item swiper-slide-active">
                                                            <div class="item-inner">
                                                                <div class="ma-box-content">
                                                                    <div class="products clear">
                                                                        <div class="product images-container">
                                                                            <a href="{{ route('website.product.detail',$book->id) }}" title="{{$book->name}}" class="product-image">
                                                                                <div class="product-image">
                                                                                    <img alt="{{$book->name}}" class="lazyloaded" src="{{ Storage::url($book->image) }}" />

                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <h2 class="product-name-no-ellipsis">
                                                                            <a href="{{ route('website.product.detail',$book->id) }}" title="{{$book->name}}">{{$book->name}}
                                                                            </a>
                                                                        </h2>
                                                                        <div style="" class="author">{{ $book->author ?? 'No data' }}</div>
                                                                        <div class="price-label cursor-pointer">
                                                                            <p class="special-price">
                                                                                @if($book->sale)
                                                                                <span class="price m-price-font fhs_center_left">
                                                                                    {{ number_format($book->sale, 0, ',', '.') }} đ
                                                                                    <span class="discount-percent fhs_center_left"><img style="width:15px;" src="./img/bolt.png"></span>
                                                                                </span>
                                                                                <p class="old-price">
                                                                                    <span class="price">{{ $book->price ? number_format($book->price, 0, ',', '.') . ' đ' : '' }}
                                                                                    </span>
                                                                                </p>
                                                                            </p>
                                                                            @else
                                                                            <p class="text-xl">
                                                                                <span class="price" style="font-size: x-large;color: #888888;">{{ $book->price ? number_format($book->price, 0, ',', '.') . ' đ' : '' }}
                                                                                </span>
                                                                            </p>
                                                                            @endif
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                                </div>
                                                <div class="tabs-xem-them xem-them-item-aaa">
                                                    <a href="{{route("website.product.index")}}">Xem thêm</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="fs_bg_2"></div>
                        </div>


                        <div class="block-vote">
                            <div style="border-bottom: 1px solid #F2F4F5;" class="header-vote">
                                <div class="header-icon-gridslider" style="color: #000;">
                                    <i class="ico_sachtrongnuoc" style="margin-right:10px;"></i><a href="/products/listCate/1"> Sách Văn
                                        Học </a>
                                    <div class="fhs_blockimagecategory_icon_arrow"></div>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div id="block-fhs-vote" style="padding:15px;">
                                    <div class="fhs-product-slider-content">
                                        <div class="swiper-container swiper-container-horizontal">
                                            <ul class="fhs-product-slider-list">
                                                @foreach($vanhoc as $v)
                                                <li class="fhs_product_basic swiper-slide flashsale-item swiper-slide-active">
                                                    <div class="item-inner">
                                                        <div class="ma-box-content">
                                                            <div class="products clear">
                                                                <div class="product images-container">
                                                                    <a href="{{ route('website.product.detail',$v->id) }}" title="{{$v->name}}" class="product-image">
                                                                        <div class="product-image">
                                                                            <img alt="{{$v->name}}" class="lazyloaded" src="{{ Storage::url($book->image) }}" />

                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <h2 class="product-name-no-ellipsis">
                                                                    <a href="{{ route('website.product.detail',$v->id) }}" title="{{$v->name}}">{{$v->name}}</a>
                                                                </h2>
                                                                <div style="" class="author">{{$v->author}}</div>
                                                                <div class="price-label">
                                                                    <p class="special-price">
                                                                        @if($v->sale)
                                                                        <span class="price m-price-font fhs_center_left">
                                                                            {{ number_format($v->sale, 0, ',', '.') }} đ
                                                                            <span class="discount-percent fhs_center_left"><img style="width:15px;" src="./img/bolt.png"></span>
                                                                        </span>
                                                                        <p class="old-price">
                                                                            <span class="price">{{ $v->price ? number_format($v->price, 0, ',', '.') . ' đ' : '' }}
                                                                            </span>
                                                                        </p>
                                                                    </p>
                                                                    @else
                                                                    <p class="text-xl">
                                                                        <span class="price" style="font-size: x-large;color: #888888;">{{ $p->price ? number_format($p->price, 0, ',', '.') . ' đ' : '' }}
                                                                        </span>
                                                                    </p>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                        </div>
                                        <div class="tabs-xem-them xem-them-item-aaa">
                                            <a href="{{route("website.product.index")}}">Xem
                                                thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-vote">
                            <div style="border-bottom: 1px solid #F2F4F5;" class="header-vote">
                                <div class="header-icon-gridslider" style="color: #000;">
                                    <i class="ico_sachtrongnuoc" style="margin-right:10px;"></i><a href="/products/listCate/2"> Sách
                                        Thiếu Nhi </a>
                                    <div class="fhs_blockimagecategory_icon_arrow"></div>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div id="block-fhs-vote" style="padding:15px;">
                                    <div class="fhs-product-slider-content">
                                        <div class="swiper-container swiper-container-horizontal">
                                            <ul class="fhs-product-slider-list">
                                                @foreach( $thieunhi as $t )
                                                <li class="fhs_product_basic swiper-slide flashsale-item swiper-slide-active">
                                                    <div class="item-inner">
                                                        <div class="ma-box-content">
                                                            <div class="products clear">
                                                                <div class="product images-container">
                                                                    <a href="{{ route('website.product.detail',$t->id) }}" title="{{$t->name}}" class="product-image">
                                                                        <div class="product-image">
                                                                            <img alt="{{$t->name}}" class="lazyloaded" src="{{ Storage::url($t->image) }}" />

                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <h2 class="product-name-no-ellipsis">
                                                                    <a href="{{ route('website.product.detail',$t->id) }}" title="{{$t->name}})">{{$t->name}}</a>
                                                                </h2>
                                                                <div style="" class="author">{{$t->author}}
                                                                </div>
                                                                <div class="price-label">
                                                                    <p class="special-price">
                                                                        @if($p->sale)
                                                                        <span class="price m-price-font fhs_center_left">
                                                                            {{ number_format($p->sale, 0, ',', '.') }} đ
                                                                            <span class="discount-percent fhs_center_left"><img style="width:15px;" src="{{asset('/img/bolt.png')}}"></span>
                                                                        </span>
                                                                        <p class="old-price">
                                                                            <span class="price">{{ $p->price ? number_format($p->price, 0, ',', '.') . ' đ' : '' }}
                                                                            </span>
                                                                        </p>
                                                                    </p>
                                                                    @else
                                                                    <p class="text-xl">
                                                                        <span class="price" style="font-size: x-large;color: #888888;">{{ $p->price ? number_format($p->price, 0, ',', '.') . ' đ' : '' }}
                                                                        </span>
                                                                    </p>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                        </div>
                                        <div class="tabs-xem-them xem-them-item-aaa">
                                            <a href="{{route("website.product.index")}}">Xem
                                                thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            new Swiper('.cms-horizontal-slider .swiper-container', {
                slidesPerView: 9
                , slidesPerGroup: 9
                , spaceBetween: 20
                , preloadImages: false
                , lazy: true
                , navigation: {
                    nextEl: '.swiper-button-next'
                    , prevEl: '.swiper-button-prev'
                , }
                , longSwipesMs: 800
            , });

        </script>
    </div>
</div>


<div class="ma-block-link-follow">
    <div class="block-link-follow hidden-xs">
        <div class="container">
            <div class="container-inner">
                <div class="row">
                    <div class="f-col f-col-2 col-sm-8 col-md-12 col-sms-12">
                        <div class="block-subscribe" style="text-align: center;">
                            <div style="display: inline-block;">


                            </div>
                            <script type="text/javascript">
                                //<![CDATA[
                                var newsletterSubscriberFormDetail = new VarienForm('newsletter-validate-detail');
                                //]]>

                            </script>
                        </div>

                    </div>
                    <div class="f-col f-col-1 col-sm-4 col-md-4 col-sms-12">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
