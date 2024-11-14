@extends('website.layouts.app')
@section('content')


<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        
        <div id="listProducts" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-fhs-main-body">
           
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
                    paginate: 10,
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
