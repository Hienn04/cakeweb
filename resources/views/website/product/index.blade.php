@extends('website.layouts.app')
@section('content')
 <!-- Breadcrumb Begin -->
 <div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__text">
                    <h2>Sản phẩm</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__links">
                    <a href="{{ ('home') }}">Trang chủ</a>
                    <span>Sản phẩm</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

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
        <div id="listProducts">
           
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
        function searchProductMenu(page = 1, categoryId = null) {
            $.ajax({
                url: '<?= route('website.product.search') ?>?page=' + page,
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    categoryId: categoryId,
                    paginate: 6,
                    status: 1,
                }
            }).done(function(data) {
                $('#listProducts').html(data);
            }).fail(function() {
                notiError();
            });
        }

        function addToCart(productId, quantity, btn) {
            $.ajax({
                    type: "POST",
                    url: "{{ route('cart.add') }}",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    data: {
                        productId: productId,
                        quantity: quantity,
                    },
                })
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
