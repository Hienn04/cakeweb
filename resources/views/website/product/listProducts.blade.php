@foreach ($products as $item )
<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="product__item">
        <div class="product__item__pic " >
            <img src="{{ Storage::url($item->image) }}" alt="">
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


<div class="row">
    <div class="d-flex justify-content-center mt-5 w-100">
        {{$products->links('website.product.paging') }}
    </div>
</div>
