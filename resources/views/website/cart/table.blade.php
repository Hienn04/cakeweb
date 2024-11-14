@if (count($cartItems) > 0)
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th>Hành động</th> <!-- Thêm cột "Hành động" -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item )
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img style="max-width: 140px;" src="{{ Storage::url($item->productImage) }}" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{ $item->productName }}</h6>
                                            <h5>{{ number_format($item->productPrice, 0, ',', '.') }}đ</h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            @if ($item->quantity > $item->productQuantity)
                                                <span class="btn btn-danger">Hết hàng</span>
                                            @else
                                                <div class="pro-qty">
                                                    <span class="btn-dec qtybtn">-</span>
                                                    <input data-product-id="{{ $item->productId }}" type="text" class="qtyProductCart" value="{{ $item->quantity }}">
                                                    <span class="btn-inc qtybtn">+</span>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="cart__price">{{ number_format($item->total, 0, ',', '.') }}đ</td>
                                    <!-- Thêm cột chứa nút xóa sản phẩm -->
                                    <td class="remove-from-cart">
                                        <form action="{{ route('cart.remove', $item->productId) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{ route('website.product.index') }}">Tiếp tục mua hàng</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__total">
                        <h6>Tổng đơn hàng</h6>
                        <ul>
                            <li>Tổng <span>{{ number_format($totalCarts, 0, ',', '.') }}đ</span></li>
                        </ul>
                        <a href="{{ route('checkout.index') }}" class="primary-btn">Kiểm tra đơn hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@else
@endif
