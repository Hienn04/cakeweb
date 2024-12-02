@extends('website.layouts.app')
@section('content')

<script src="{{ asset('Content/Home/js/12e66af05ff4fe2eff6aa26b71ad0c5c.js')}}"></script>
<link href="{{ asset('Content/Home/css/b37de6b41e195c64a4e63c4b7cf62225.css') }}" rel="stylesheet" />
<link href="{{ asset('Content/Home/css/product_view.css')}}" rel="stylesheet" />
<div class="main-container col1-layout no-margin-top">
    <div class="main">
        <div>
            <div class="container" style="background-color : transparent!important;">
                <div class="mb-breadcrumbs">
                    <div id="ves-breadcrumbs" class="breadcrumbs" style="display:block;">
                        <div class="container-inner breadcrumbs">
                            <ol class="breadcrumb">
                                <li class="home">
                                    <a href="{{route ('home')}}" title="Tới trang chủ">Trang chủ</a>
                                    <span>/ </span>
                                </li>
                                <li class="category4">
                                    <a href="https://nhasachminhthang.vn/danh-muc-sach/van-hoa-tam-linh-phong-thuy-1641.html" title="">Văn H&#243;a T&#226;m Linh - Phong Thủy</a>
                                    <span>/ </span>
                                </li>
                                <li class="category14">
                                    <a href="https://nhasachminhthang.vn/danh-muc-sach/van-hoa-tam-linh-1664.html" title="">Văn H&#243;a T&#226;m Linh</a>
                                </li>
                            </ol>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="container-inner">


                <!--begin web product view UI-->
                @if($productDetail)
                <div class="product-view kasitoo">
                    <!--begin web UI-->
                    <div class="product-essential">
                        <div class="product-essential-media">
                            <div class="product-view-image">
                                <div class="product-view-thumbnail">
                                    <div class="lightgallery" id="lightgallery-product-media">
                                        <a class="include-in-gallery" id="lightgallery-item-0" href="{{ Storage::url($productDetail->image) }}" title="{{$productDetail->name}}">
                                            <img src="{{ Storage::url($productDetail->image) }}" alt="image">
                                        </a>
                                    </div>

                                </div>
                                <div class="product-view-image-product fhs_img_frame_container" img_index="0">
                                    <img id="image" class="fhs-p-img lazyloaded" src="{{Storage::url($productDetail->image)}}" alt="{{$productDetail->name}}" title="{{$productDetail->name}}">
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="product_view_add_box">
                                <button type="button" title="Thêm vào giỏ hàng" class="btn-cart-to-cart" onclick="addToCartTo(19234); 
                                    return false;">
                                    <span class="fhs_icon_cart"></span>
                                    <span>Thêm vào giỏ hàng</span>
                                </button>
                                <button data-product-id="{{ $productDetail->id }}" type="button" class="btn addToCart btn-buy-now"><span>Mua ngay</span></button>
                            </div>

                        </div>
                        <div class="product-essential-detail">
                            <h1>
                                {{$productDetail->name}}
                            </h1>

                            <div class="product-view-sa">
                                <div class="product-view-sa_one">
                                    <div class="product-view-sa-supplier">
                                        <span>Tác giả:</span>
                                        <a href="" title="">{{ $productDetail->author }}</a>
                                    </div>
                                    
                            </div>

                            <!-- release_countdown_product desktop-->

                            <div id="product-view-price-block" class="col-md-12 price-block">
                                <div id="catalog-product-details-price" class="product_price price-block-left " style="">
                                    <div class="price-box">
                                        <p class="special-price">
                                            @if($productDetail->sale)
                                            <span class="price m-price-font fhs_center_left">
                                                {{ number_format($productDetail->sale, 0, ',', '.') }} đ
                                                <span class="discount-percent fhs_center_left"><img style="width:15px;" src="./img/bolt.png"></span>
                                            </span>
                                            <p class="old-price">
                                                <span class="price">{{ $productDetail->price ? number_format($productDetail->price, 0, ',', '.') . ' đ' : '' }}
                                                </span>
                                            </p>
                                        </p>
                                        @else
                                        <p class="text-xl">
                                            <span class="price" style="font-size: x-large;color: #888888;">{{ $productDetail->price ? number_format($productDetail->price, 0, ',', '.') . ' đ' : '' }}
                                            </span>
                                        </p>
                                        @endif

                                    </div>
                                </div>

                            </div>

                            <div class="clear"></div>
                            <style>
                                .item-promotion-title {
                                    border-bottom: 1px solid #F2F4F5;
                                    height: 18px;
                                    margin-bottom: 22px;
                                    display: block !important;
                                    white-space: nowrap;
                                }

                                .item-promotion-title h2 {
                                    background: #fff none repeat scroll 0 0;
                                    display: inline-block;
                                    font-size: 1.35em;
                                    font-weight: 600;
                                    margin-top: 6px;
                                    padding-right: 3px;
                                    font-family: 'Nunito Sans', 'sans-serif';
                                }

                            </style>
                            <div class="clear"></div>
                            <div id="catalog-product-details-discount">
                                <div class="product-view-quantity-box">
                                    <label for="qty">Số lượng:</label>
                                    <div class="product-view-quantity-box-block">
                                        <a class="btn-subtract-qty" onclick="subtractQty();"><img style="width: 12px; height: auto;" src=""></a>
                                        <input type="text" name="qty" id="qty" maxvalue="999" minvalue="1" align="center" value="1" onkeypress="validateNumber(event)" onblur="validateQty();" title="SL" class="input-text qty">
                                        <a class="btn-add-qty" onclick="addQty();"><img style="width: 12px; height: auto;" src=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>

                            <div class="policy-popup-background" id="policy-popup-background">
                                <div class="policy-popup-content">
                                </div>
                            </div>

                            <div class="clear"></div>
                            <div class="fhs-bsidebar">
                                <div class="fhs-bsidebar-tab">
                                    <ul class="fhs-bsidebar-tab-items">
                                        <li class="fhs-bsidebar-tab-items-qty">
                                            <div class="product-view-quantity-box">
                                                <div class="product-view-quantity-box-block">
                                                    <a class="btn-subtract-qty" onclick="subtractQty();"><img style="width: 12px; height: auto;" src="https://nhasachminhthang.vn/Content/Home/imgs/ico_minus2x.png"></a>
                                                    <input type="text" name="qty" id="qty_mobile" maxvalue="999" minvalue="1" align="center" value="1" onkeypress="validateNumber(event)" onblur="validateQty();" title="SL" class="input-text qty">
                                                    <a class="btn-add-qty" onclick="addQty();"><img style="width: 12px; height: auto;" src="https://nhasachminhthang.vn/Content/Home/imgs/ico_plus2x.png"></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="fhs-bsidebar-tab-items-addcart"><button data-product-id="{{ $productDetail->id }}" class="btn btn-add-cart">Thêm vào giỏ hàng</button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="clear"></div>

                </div>

                <div class="fhs_tabslider3_container">
                    <div class="fhs_tabslider3_header">
                        <div class="fhs_tabslider3_title">SÁCH CÙNG DANH MỤC</div>
                    </div>
                    <div class="swiper-container swiper-container-horizontal">
                        <ul class="fhs-product-slider-list">
                            @foreach($relatedProducts as $rl)
                            <li class="fhs_product_basic swiper-slide flashsale-item swiper-slide-active">
                                <div class="item-inner">
                                    <div class="ma-box-content">
                                        <div class="products clear">
                                            <div class="product images-container">
                                                <a href="{{route('website.product.detail', $rl->id)}}" title="{{$rl->name}}" class="product-image">
                                                    <div class="product-image">
                                                        <img alt="{{$rl->name}}" class="lazyloaded" src="{{Storage::url($rl->image)}}" />

                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <h2 class="product-name-no-ellipsis">
                                                <a href="{{route('website.product.detail', $rl->id)}}" title="{{$rl->name}}">{{$rl->name}}</a>
                                            </h2>
                                            <div style="" class="author">{{ $rl->author }}</div>
                                            <div class="price-label">
                                                <p class="special-price">
                                                    @if($rl->sale)
                                                    <span class="price m-price-font fhs_center_left">
                                                        {{ number_format($rl->sale, 0, ',', '.') }} đ
                                                        <span class="discount-percent fhs_center_left"><img style="width:15px;" src="./img/bolt.png"></span>
                                                    </span>
                                                    <p class="old-price">
                                                        <span class="price">{{ $rl->price ? number_format($rl->price, 0, ',', '.') . ' đ' : '' }}
                                                        </span>
                                                    </p>
                                                </p>
                                                @else
                                                <p class="text-xl">
                                                    <span class="price" style="font-size: x-large;color: #888888;">{{ $rl->price ? number_format($rl->price, 0, ',', '.') . ' đ' : '' }}
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
                <div id="product_view_info" class="content product_view_content">
                    <div class="product_view_content-title">Thông tin sản phẩm</div>
                    <div class="product_view_tab_content_ad">
                        <div class="product_view_tab_content_additional">
                            <table class="data-table table-additional">
                                <colgroup>
                                    <col width="25%">
                                    <col>
                                </colgroup>
                                <tbody>
                                
                                    <tr>
                                        <th class="table-label">
                                            Tác giả
                                        </th>
                                        <td class="data_author">
                                            {{ $rl->author }}
                                        </td>
                                    </tr>
                                
                                </tbody>
                            </table>
                        </div>
                        @endif
                        
                            <div id="desc_content" class="std">
                                <p style="text-align: center;">

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="{{ asset('Content/Home/js/jquery_genner.js')}}"></script>


<div class="ma-block-link-follow">
    <div class="block-link-follow hidden-xs">
        <div class="container">
            <div class="container-inner">
                <div class="row">
                    
                    <div class="f-col f-col-1 col-sm-4 col-md-4 col-sms-12">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('web-script')
    <script>
        function addToCart(productId, quantity, btn) {
            $.ajax({
                type: "POST",
                url: "{{ route('cart.add') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    productId: productId,
                    quantity: quantity,
                }
            }).done(function(res) {
                const data = res.data.original;
                if (data.success) {
                    notiSuccess(data.success, 'center');
                    getTotalProductInCart();
                } else if (data.error) {
                    notiError(data.error);
                }
            }).fail(function(xhr) {
                if (xhr.status === 401) {
                    window.location.href = "/login";
                } else if (xhr.status === 400 && xhr.responseJSON.errors) {
                    const errorMessages = xhr.responseJSON.errors;
                    for (let fieldName in errorMessages) {
                        notiError(errorMessages[fieldName][0]);
                    }
                } else {
                    notiError();
                }
            }).always(function() {
                btn.prop('disabled', false);
            })
        }

       
        
        $(document).ready(function() {
            // Add to cart
            $(document).on('click', '.addToCart', function() {
                $(this).prop('disabled', true);
                const productId = $(this).data('product-id');
                addToCart(productId, 1, $(this));
                searchProductMenu();
            });
        })
    </script>
@endsection
