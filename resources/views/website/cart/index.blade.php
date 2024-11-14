@extends('website.layouts.app')

@section('content')
<style>
    .product__cart__item__pic {
        float: left;
        margin-right: 30px;
    }

    .shopping__cart__table table tbody tr td.product__cart__item .product__cart__item__text {
        overflow: hidden;
        padding-top: 21px;
    }

    .shopping__cart__table table tbody tr td.product__cart__item .product__cart__item__text h6 {
        color: #111111;
        font-size: 16px;
        font-weight: 500;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    .shopping__cart__table table tbody tr td.product__cart__item .product__cart__item__text h5 {
        color: #111111;
        font-weight: 600;
        font-size: 16px;
    }

    .shopping__cart__table table tbody tr td.quantity__item {
        width: 175px;
    }

    .shopping__cart__table table tbody tr td.quantity__item .quantity .pro-qty {
        width: 90px;
    }

    .shopping__cart__table table tbody tr td.quantity__item .quantity .pro-qty input {
        width: 65px;
        border: none;
        text-align: center;
        color: #111111;
        font-size: 16px;
        font-weight: 500;
    }

    .shopping__cart__table table tbody tr td.quantity__item .quantity .pro-qty .qtybtn {
        font-size: 16px;
        color: #888888;
        width: 10px;
        cursor: pointer;
        font-weight: 500;
    }

    .shopping__cart__table table tbody tr td.cart__price {
        color: #111111;
        font-size: 16px;
        font-weight: 600;
        width: 140px;
    }

    .shopping__cart__table table tbody tr td.cart__close span {
        font-size: 18px;
        display: inline-block;
        color: #111111;
        height: 40px;
        width: 40px;
        background: #f2f2f2;
        border-radius: 50%;
        line-height: 38px;
        text-align: center;
    }

    .continue__btn.update__btn {
        text-align: right;
    }

    .continue__btn.update__btn a {
        color: #ffffff;
        background: #111111;
        border-color: #111111;
    }

    .continue__btn.update__btn a i {
        margin-right: 5px;
    }

    .continue__btn a {
        color: #111111;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        border: 1px solid #e1e1e1;
        padding: 14px 35px;
        display: inline-block;
    }

    .cart__discount {
        margin-bottom: 60px;
    }

    .cart__discount h6 {
        color: #111111;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 35px;
    }

    .cart__discount form {
        position: relative;
    }

    .cart__discount form input {
        font-size: 14px;
        color: #444444;
        height: 50px;
        width: 100%;
        border: 1px solid #e1e1e1;
        padding-left: 20px;
    }

    .cart__discount form input::-webkit-input-placeholder {
        color: #444444;
    }

    .cart__discount form input::-moz-placeholder {
        color: #444444;
    }

    .cart__discount form input:-ms-input-placeholder {
        color: #444444;
    }

    .cart__discount form input::-ms-input-placeholder {
        color: #444444;
    }

    .cart__discount form input::placeholder {
        color: #444444;
    }

    .cart__discount form button {
        font-size: 14px;
        color: #ffffff;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        background: #111111;
        padding: 0 30px;
        border: none;
        position: absolute;
        right: 0;
        top: 0;
        height: 100%;
    }

    .cart__total {
        background: #fdf3ea;
        padding: 35px 40px 40px;
    }

    .cart__total h6 {
        color: #111111;
        text-transform: uppercase;
        margin-bottom: 12px;
        font-weight: 600;
    }

    .cart__total ul {
        margin-bottom: 25px;
    }

    .cart__total ul li {
        list-style: none;
        font-size: 16px;
        color: #444444;
        font-weight: 500;
        line-height: 40px;
        overflow: hidden;
    }

    .cart__total ul li span {
        font-weight: 600;
        color: #e26b0c;
        float: right;
    }

    .cart__total .primary-btn {
        display: block;
        background: #111111;
        color: #ffffff;
        padding: 12px 10px;
        text-align: center;
        letter-spacing: 2px;
    }

</style>
<!-- Breadcrumb Begin -->
<<div class="container" style="background-color : transparent!important;">
    <div class="mb-breadcrumbs">
        <div id="ves-breadcrumbs" class="breadcrumbs" style="display:block;">
            <div class="container-inner breadcrumbs">
                <ol class="breadcrumb">
                    <li class="home">
                        <a href="{{route ('home')}}" title="Tới trang chủ">Trang chủ</a>
                        <span>/ </span>
                    </li>
                    <li class="category4">
                        <a href="{{ route('cart.index') }}" title="">Giỏ hàng</a>
                        <span>/ </span>
                    </li>

                </ol>
            </div>
        </div>
    </div>
    </div>
    <!-- Breadcrumb End -->
    <div id="cart_table">

    </div>
    @endsection
    @section('web-script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        /**
         * Load cart
         */
        function searchCart() {
            $.ajax({
                url: "{{ route('cart.search') }}"
                , type: "POST"
            }).done(function(data) {
                console.log('Data received:', data);
                $('#cart_table').html(data);
            }).fail(function() {
                notiError("Ê có lỗi ở đây !!!");
            });
        }

        /**
         * Update cart
         * @param data - data to update
         */
        function updateCart(data) {
            $.ajax({
                type: "POST"
                , url: "{{ route('cart.update') }}"
                , data: data
            }).done(function(res) {
                const data = res.data.original;
                if (data.success) {
                    notiSuccess(data.success, 'center');
                } else if (data.error) {
                    notiError(data.error);
                }
            }).fail(function(xhr) {
                if (xhr.status === 400 && xhr.responseJSON.errors) {
                    const errorMessages = xhr.responseJSON.errors;
                    for (let fieldName in errorMessages) {
                        notiError(errorMessages[fieldName][0]);
                    }
                } else {
                    notiError();
                }
            }).always(function() {
                searchCart();
            });
        }

        $(document).ready(function() {
            searchCart();

            // Remove product from cart
            $(document).on('click', '.remove-from-cart', function() {
                const productId = $(this).data('product-id');
                const button = $(this); // Lưu tham chiếu nút
                button.prop('disabled', true);
                showConfirmDialog('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?', function() {
                    $.ajax({
                        type: "DELETE"
                        , url: "{{ route('cart.remove') }}"
                        , data: {
                            productId: productId
                        }
                    }).done(function(res) {
                        const data = res.data.original;
                        if (data.success) {
                            notiSuccess(data.success);
                            searchCart();
                            getTotalProductInCart();
                        } else if (data.error) {
                            notiError(data.error);
                        }
                    }).fail(function() {
                        notiError();
                    }).always(function() {
                        button.prop('disabled', false);
                    });
                });
            });

            // Hàm tăng số lượng sản phẩm khi ấn nút +
            $(document).on('click', '.btn-inc', function() {
                let inputQuantity = $(this).siblings(".qtyProductCart");
                let currentValue = parseInt(inputQuantity.val());
                const button = $(this);
                button.prop('disabled', true);
                inputQuantity.prop('disabled', true);
                inputQuantity.val(currentValue + 1);
                const productId = inputQuantity.data('product-id');
                const newQuantity = parseInt(inputQuantity.val());
                const data = {
                    productId: productId
                    , quantity: newQuantity
                };
                updateCart(data);
            });

            // Hàm giảm số lượng sản phẩm khi ấn nút -
            $(document).on('click', '.btn-dec', function() {
                let inputQuantity = $(this).siblings(".qtyProductCart");
                let currentValue = parseInt(inputQuantity.val());
                const button = $(this);
                if (currentValue > 1) {
                    button.prop('disabled', true);
                    inputQuantity.prop('disabled', true);
                    inputQuantity.val(currentValue - 1);
                    const productId = inputQuantity.data('product-id');
                    const newQuantity = parseInt(inputQuantity.val());
                    const data = {
                        productId: productId
                        , quantity: newQuantity
                    };
                    updateCart(data);
                } else {
                    notiError('Số lượng tối thiểu là 1');
                }
            });
        });

    </script>
    @endsection
