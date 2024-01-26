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
        <div class="shop__option">
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
                            <input type="text" placeholder="Search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="shop__option__right">
                        <select>
                            <option value="">Default sorting</option>
                            <option value="">A to Z</option>
                            <option value="">1 - 8</option>
                            <option value="">Name</option>
                        </select>
                        <a href="#"><i class="fa fa-list"></i></a>
                        <a href="#"><i class="fa fa-reorder"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="listProducts">
           
        </div>
        <div class="shop__last__option">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="shop__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><span class="arrow_carrot-right"></span></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="shop__last__text">
                        <p>Showing 1-9 of 10 results</p>
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

        $(document).ready(function() {
            searchProductMenu();

            // tìm kiếm sản phẩm theo danh mục
            $('.category-tab').click(function() {
                let categoryId = $(this).data('id');
                $('.category-tab').removeClass('active');
                $(this).addClass('active');
                searchProductMenu(page = 1, categoryId = categoryId ?? null);

            })
        })
    </script>
@endsection
