@extends('website.layouts.app')

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Giỏ hàng</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./index.html">Trang chủ</a>
                        <span>Giỏ hàng</span>
                    </div>
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
        /**
         * Load cart
         */
        function searchCart() {
            $.ajax({
                url: "{{ route('cart.search') }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            }).done(function(data) {
                $('#cart_table').html(data);
            }).fail(function() {
                notiError();
            });
        }

        /**
         * Update cart
         * @param data - data to update
         */
         function updateCart(data) {
            $.ajax({
                type: "POST",
                url: "{{ route('cart.update') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
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
            })
        }

        $(document).ready(function() {
            searchCart();

            // Remove product from cart
            $(document).on('click', '.remove-from-cart', function() {
                const productId = $(this).data('product-id');
                $(this).prop('disabled', true);
                showConfirmDialog('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?', function() {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('cart.remove') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            productId: productId,
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
                        $(this).prop('disabled', false);
                    })
                });
            });

            // Hàm tăng số lượng sản phẩm khi ấn nút +
            $(document).on('click', '.btn-inc', function() {
                let inputQuantity = $(this).siblings(".qtyProductCart");
                let currentValue = parseInt(inputQuantity.val());
                $(this).prop('disabled', true);
                inputQuantity.prop('disabled', true);
                inputQuantity.val(currentValue + 1);
                const productId = inputQuantity.data('product-id');
                const newQuantity = parseInt(inputQuantity.val());
                const data = {
                    productId: productId,
                    quantity: newQuantity,
                }
                updateCart(data);
            })

            // Hàm giảm số lượng sản phẩm khi ấn nút -
            $(document).on('click', '.btn-dec', function() {
                let inputQuantity = $(this).siblings(".qtyProductCart");
                let currentValue = parseInt(inputQuantity.val());
                if (currentValue > 1) {
                    $(this).prop('disabled', true);
                    inputQuantity.prop('disabled', true);
                    inputQuantity.val(currentValue - 1);
                    const productId = inputQuantity.data('product-id');
                    const newQuantity = parseInt(inputQuantity.val());
                    const data = {
                        productId: productId,
                        quantity: newQuantity,
                    }
                    updateCart(data);
                } else {
                    notiError('Số lượng tối thiểu là 1');
                }

            });


        })
    </script>
@endsection
