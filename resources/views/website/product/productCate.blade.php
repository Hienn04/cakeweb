@extends('website.layouts.app')
@section('content')
@if($nameCate)
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
                        <a href="{{route('website.product.productCate', $nameCate->id)}}" title="">{{$nameCate->name}}</a>
                        <span> </span>
                    </li>
                   
                </ol>
            </div>
        </div>
    </div>
</div>
@endif
<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        {{-- <div class="shop__option">
            <div class="row">
                <div class="col-lg-7 col-md-7">
                    <div class="shop__option__search">
                        <form action="#">
                            <select>
                                <option value="">Danh mục</option>
                                <option value="">Red Velvet</option>
                                <option value="">Cup Cake</option>
                                <option value="">Biscuit</option>
                            </select>
                            <input type="text" placeholder="Tìm kiếm">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div> --}}
        <div id="listProducts" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-fhs-main-body">

            <div class="mb-content">
                <div class="mb-category-products">
                    <div class="page-title category-title">
                        <h1>Thiếu nhi</h1>
                    </div>
                    <div class="category-products row">
                        <ul class="fhs-product-slider-list">

                            @foreach ($listPro as $item )
                            <li class="fhs_product_basic_cate fhs_product_basic swiper-slide flashsale-item swiper-slide-active">
                                <div class="item-inner">
                                    <div class="ma-box-content">
                                        <div class="products clear">
                                            <div class="product images-container">
                                                <a href="{{ route('website.product.detail',$item->id) }}" title="{{ $item->name }}" class="product-image">
                                                    <div class="product-image">
                                                        <img alt="{{ $item->name }}" class="lazyloaded" src="{{ Storage::url($item->image) }}">

                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <h2 class="product-name-no-ellipsis">
                                                <a href="{{ route('website.product.detail',$item->id) }}" title="{{ $item->name }}">{{ $item->name }}</a>
                                            </h2>
                                            <div style="" class="author">{{ $item->categoryName }}
                                            </div>
                                            <div class="price-label">
                                                <p class="special-price">
                                                    <span class="price m-price-font fhs_center_left">{{ $item->price }}
                                                        đ <span class="discount-percent fhs_center_left">-25%</span></span>
                                                </p>
                                                <p class="old-price">
                                                    <span class="price">82.000 đ</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>


        </div>

    </div>
</section>
<!-- Shop Section End -->

@endsection
@section('web-script')
<script>
    /**
     * tải danh sách products
     */


    function addToCart(productId, quantity, btn) {
        $.ajax({
                type: "POST"
                , url: "{{ route('cart.add') }}"
                , headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                , }
                , data: {
                    productId: productId
                    , quantity: quantity
                , }
            , })
            .done(function(res) {
                console.log(res);
                // const quantityAvailable = res.data.original.quantityAvailable;
                const data = res.data.original;
                if (data.success) {
                    notiSuccess(data.success, "center");
                    // $("#product-available").text(quantityAvailable);
                    getTotalProductInCart();
                } else if (data.error) {
                    notiError(data.error);
                }
            })
            .fail(function(xhr) {
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
            })
            .always(function() {
                btn.prop("disabled", false);
            });
    }

    $(document).ready(function() {
        searchProductMenu();


        $(document).on('click', '.btn-add-cart', function() {
            $(this).prop('disabled', true);
            const productId = $(this).data('product-id');
            addToCart(productId, 1, $(this));
            searchProductMenu();
        });
    })

</script>
@endsection
