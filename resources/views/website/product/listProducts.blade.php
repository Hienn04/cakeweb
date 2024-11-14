
<div class="mb-content">
    <div class="mb-category-products">
        <div class="page-title category-title">
            <h1>Thiếu nhi</h1>
        </div>
        <div class="category-products row">
            <ul class="fhs-product-slider-list">

                @foreach ($products as $item )
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

<div class="row">
    <div class="d-flex justify-content-center mt-5 w-100" style="text-align:center;">
        {{$products->links('website.product.paging') }}
    </div>
</div>
