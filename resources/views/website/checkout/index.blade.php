@extends('website.layouts.app')
@section('content')
<style>
    /*---------------------
  Checkout
-----------------------*/
    .coupon__code {
        color: #444444;
        font-size: 14px;
        border-top: 2px solid #111111;
        background: #f5f5f5;
        padding: 23px 30px 18px;
        margin-bottom: 50px;
    }

    .coupon__code span {
        color: #f08632;
    }

    .coupon__code a {
        color: #444444;
    }

    .checkout__title {
        color: #111111;
        font-weight: 600;
        text-transform: uppercase;
        border-bottom: 1px solid #e1e1e1;
        padding-bottom: 25px;
        margin-bottom: 30px;
    }

    .checkout__input {
        margin-bottom: 6px;
    }

    .checkout__input p {
        color: #444444;
        font-weight: 500;
        margin-bottom: 12px;
    }

    .checkout__input p span {
        color: #f08632;
    }

    .checkout__input input {
        height: 50px;
        width: 100%;
        border: 1px solid #e1e1e1;
        font-size: 14px;
        color: #666666;
        padding-left: 20px;
        margin-bottom: 20px;
    }

    .checkout__input input::-webkit-input-placeholder {
        color: #666666;
    }

    .checkout__input input::-moz-placeholder {
        color: #666666;
    }

    .checkout__input input:-ms-input-placeholder {
        color: #666666;
    }

    .checkout__input input::-ms-input-placeholder {
        color: #666666;
    }

    .checkout__input input::placeholder {
        color: #666666;
    }

    .checkout__input__checkbox label {
        font-size: 14px;
        color: #444444;
        position: relative;
        padding-left: 30px;
        font-weight: 500;
        cursor: pointer;
        margin-bottom: 16px;
        display: block;
    }

    .checkout__input__checkbox label input {
        position: absolute;
        visibility: hidden;
    }

    .checkout__input__checkbox label input:checked~.checkmark {
        border-color: #f08632;
    }

    .checkout__input__checkbox label input:checked~.checkmark:after {
        opacity: 1;
    }

    .checkout__input__checkbox label .checkmark {
        position: absolute;
        left: 0;
        top: 3px;
        height: 14px;
        width: 14px;
        border: 1.5px solid #888888;
        content: "";
        border-radius: 2px;
    }

    .checkout__input__checkbox label .checkmark:after {
        position: absolute;
        left: 1px;
        top: -3px;
        width: 14px;
        height: 7px;
        border: solid #f08632;
        border-width: 1.5px 1.5px 0px 0px;
        -webkit-transform: rotate(127deg);
        -ms-transform: rotate(127deg);
        transform: rotate(127deg);
        content: "";
        opacity: 0;
    }

    .checkout__input__checkbox p {
        color: #666666;
        font-size: 14px;
        line-height: 24px;
        margin-bottom: 22px;
    }

    .checkout__order {
        background: #fdf3ea;
        padding: 30px;
    }

    .checkout__order .order__title {
        color: #111111;
        font-weight: 600;
        text-transform: uppercase;
        border-bottom: 1px solid #d7d7d7;
        padding-bottom: 25px;
        margin-bottom: 30px;
    }

    .checkout__order p {
        color: #444444;
        font-size: 16px;
    }

    .checkout__order .site-btn {
        width: 100%;
        margin-top: 8px;
        letter-spacing: 0;
    }

    .checkout__order__products {
        font-size: 16px;
        color: #111111;
        overflow: hidden;
        margin-bottom: 18px;
        font-weight: 600;
    }

    .checkout__order__products span {
        float: right;
    }

    .checkout__total__products {
        margin-bottom: 20px;
    }

    .checkout__total__products li {
        font-size: 16px;
        color: #444444;
        list-style: none;
        line-height: 26px;
        overflow: hidden;
        margin-bottom: 15px;
        font-weight: 500;
    }

    .checkout__total__products li:last-child {
        margin-bottom: 0;
    }

    .checkout__total__products li samp {
        font-family: "Montserrat", sans-serif;
        font-size: 16px;
        font-weight: 600;
    }

    .checkout__total__products li span {
        color: #111111;
        float: right;
        font-weight: 600;
    }

    .checkout__total__all {
        border-top: 1px solid #d7d7d7;
        border-bottom: 1px solid #d7d7d7;
        padding: 15px 0;
        margin-bottom: 26px;
    }

    .checkout__total__all li {
        list-style: none;
        font-size: 16px;
        color: #111111;
        line-height: 40px;
        font-weight: 600;
        overflow: hidden;
    }

    .checkout__total__all li span {
        color: #f08632;
        float: right;
    }

</style>
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__text">
                    <h2>Thanh toán</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__links">
                    <a href="{{ route('home') }}">Trang chủ</a>
                    <span> Thanh toán</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form id="form_order">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h6 class="checkout__title">Chi tiết đặt hàng</h6>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Tên của bạn<span>*</span></p>
                                    <input type="text" class="form-control" name="full_name" value="{{ Auth::user()->name ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Số liên hệ<span>*</span></p>
                                    <input type="text" class="form-control" value="{{ Auth::user()->phone ?? '' }}" name="phone">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Địa chỉ Email<span>*</span></p>
                                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email ?? '' }}">
                                </div>
                            </div>

                        </div>
                        <div class="checkout__input mb-2">
                            <p>Địa chỉ chi tiết<span>*</span></p>
                            <textarea name="address" style="color:#000" class="form-control">{{ Auth::user()->address ?? '' }}</textarea>
                        </div>
                        <div class="checkout__input">
                            <p>Mô tả thêm</p>
                            <textarea class="form-control" name="message" placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: ghi chú đặc biệt để giao hàng."></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="checkout__order">
                            <div class="d-flex justify-content-between">
                                <h4 class="order__title">Đơn hàng của bạn</h4>
                                <a class="text-dark" href="{{ route('cart.index') }}"><i class="fa-solid fa-bag-shopping mr-2"></i>Giỏ hàng</a>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItemsInCheckout as $item)
                                    <tr>
                                        <td>
                                            {{ $item->productName }}
                                        </td>
                                        <td>
                                            {{ $item->quantity }}
                                        </td>
                                        <td>
                                            {{ number_format($item->productPrice, 0, ',', '.') }}đ
                                        </td>
                                        <td>
                                            <span>{{ number_format($item->total, 0, ',', '.') }}đ</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <ul class="checkout__total__all">
                                <li>Phí vận chuyển: <span>0đ</span></li>
                                <li>Tổng tiền thanh toán: <span id="total_order">{{ number_format($totalCarts, 0, ',', '.') }}<span><span>đ</span>
                                </li>
                            </ul>
                            <div class="checkout__input__checkbox">
                                <p for="cod">
                                    <i class="fa-solid fa-truck-fast mr-2"></i>Thanh toán khi giao hàng (COD)
                                </p>
                                <p>Book cảm ơn bạn đã tin tưởng</p>
                            </div>
                            <button type="button" id="btn-order" class="site-btn">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection
@section('web-script')
<script>
    $(document).ready(function() {
        /**
         * Hàm tạo mới đơn hàng
         */
        function createOrder(data, btn, form) {
            $.ajax({
                type: "POST"
                , url: "{{ route('checkout.placeOrder') }}"
                , contentType: false
                , processData: false
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , data: data
            , }).done(function(res) {
                const data = res.data.original;
                if (data.success) {
                    notiSuccess(data.success, 'center', function() {
                        window.location.href = "{{ route('home') }}";
                    });
                } else {
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
                btn.text('Đặt hàng');
                btn.prop('disabled', false);
            })
        }


        // Click to order 
        $('#btn-order').click(function(e) {
            e.preventDefault();
            const btnOrder = $(this);
            const formCreateOrder = $('form#form_order');
            let formData = new FormData(formCreateOrder[0]);
            const totalOrderText = $("#total_order").text();
            const totalOrder = parseFloat(totalOrderText.replace(/\./g, ''));
            formData.append('total_order', totalOrder);
            showConfirmDialog('Bạn có chắc chắn muốn đặt đơn hàng này không?', function() {
                btnOrder.text('Đang xử lý...');
                btnOrder.prop('disabled', true);
                createOrder(formData, btnOrder, formCreateOrder);
            });
        })
    })

</script>
@endsection
