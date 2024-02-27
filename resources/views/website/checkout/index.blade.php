@extends('website.layouts.app')
@section('content')
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
                        <span>  Thanh toán</span>
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
                                        <input type="text" class="form-control" name="full_name"
                                            value="{{ Auth::user()->name ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Số liên hệ<span>*</span></p>
                                        <input type="text" class="form-control" value="{{ Auth::user()->phone ?? '' }}"
                                            name="phone">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Địa chỉ Email<span>*</span></p>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ Auth::user()->email ?? '' }}">
                                    </div>
                                </div>

                            </div>
                            <div class="checkout__input mb-2">
                                <p>Địa chỉ chi tiết<span>*</span></p>
                                <textarea name="address" style="color:#000" class="form-control">{{ Auth::user()->address ?? '' }}</textarea>
                            </div>
                            <div class="checkout__input">
                                <p>Mô tả thêm</p>
                                <textarea class="form-control" name="message"
                                    placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: ghi chú đặc biệt để giao hàng."></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout__order">
                                <div class="d-flex justify-content-between">
                                    <h4 class="order__title">Đơn hàng của bạn</h4>
                                    <a class="text-dark" href="{{ route('cart.index') }}"><i
                                            class="fa-solid fa-bag-shopping mr-2"></i>Giỏ hàng</a>
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
                                    <li>Tổng tiền thanh toán: <span
                                            id="total_order">{{ number_format($totalCarts, 0, ',', '.') }}<span><span>đ</span>
                                    </li>
                                </ul>
                                <div class="checkout__input__checkbox">
                                    <p for="cod">
                                        <i class="fa-solid fa-truck-fast mr-2"></i>Thanh toán khi giao hàng (COD)
                                    </p>
                                    <p>Cake cảm ơn bạn đã tin tưởng</p>
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
                    type: "POST",
                    url: "{{ route('checkout.placeOrder') }}",
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: data,
                }).done(function(res) {
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
