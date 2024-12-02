<style>
    /* Style for the dropdown item container */
    .dropdown-item {
        padding: 10px 15px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-top: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Flex styling for the user name and logout button */
    .dropdown-item .flex {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    /* User name style */
    .dropdown-item span {
        font-weight: bold;
        color: #333;
        font-size: 16px;
    }

    /* Logout button styling */
    .dropdown-item .btn {
        background-color: #ff4d4f;
        color: white;
        border: none;
        padding: 8px 12px;
        font-size: 14px;
        cursor: pointer;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .dropdown-item .btn:hover {
        background-color: #e04547;
    }

    /*Menu Login */
    /* Ẩn dropdown theo mặc định */
    .fhs_top_account:hover .fhs_top_account_dropdown {
        display: block;
    }

    .fhs_top_account_dropdown:before {
        content: "";
        position: relative:
    }

</style>
<body id="offcanvas-container" class=" cms-index-index cms-ma-vanesa2-home">
    <div id="moe-osm-pusher" style="display: block !important; height: 0px;"></div>
    <section id="ves-wrapper">
        <section id="page" class="offcanvas-pusher" role="main">
            <div class="wrapper" id="wrapper">
                <div class="page">

                    <section id="header" class="header">
                        <div class="fhs_header_desktop">

                            <div class="container">
                                <div class="fhs-header-top-second-bar" style="position: relative;">
                                    <div class="fhs_mouse_point" onclick="location.href = &#39;/&#39;;" title="BookShop">
                                        <img src="{{ asset('img/icon/hienbook.png') }}  " alt="" style="width:220px; vertical-align: middle;" />
                                    </div>
                                    <div class="fhs_center_right fhs_mouse_point fhs_dropdown_hover fhs_dropdown_click">
                                        <span class="icon_menu"></span>
                                        <span class="icon_seemore_gray"></span>

                                    </div>
                                    <div class="fhs_center_left">
                                        <div class="box search_box">
                                            <form id="search_mini_form_desktop" action="{{ route('website.searchProducts.search') }}" method="POST">
                                                @csrf
                                                <div class="search pull-left">
                                                    <div class="form-search fhs_dropdown_hover_out">
                                                        <input id="" type="text" name="" maxlength="128" placeholder="Bạn đang tìm kiếm sách ..." value="" class="input-search" />
                                                        <span class="fhs_btn_default active button-search"><span class="ico_search_white"></span></span>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="fhs_center_space" style="padding-left: 24px;">


                                        <div class="noti-top fhs_dropdown_hover no_cover">
                                            <script type="text/javascript">
                                                const IS_REQUIRE_LOGIN = "";
                                                const SKIN_HOST = "";

                                            </script>
                                            <div class="top-notification-button fhs_mouse_point">
                                                <a href="{{route("website.product.index")}}" style="cursor:pointer;display:flex;flex-direction: column;">
                                                    <div class="fhs_center_center" style="margin-bottom:3px;">
                                                        <div class="ico_sachtrongnuoc">
                                                            <div class="top-notification-button-unseen top_menu_unseen fhs_center_center" style="display: none;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="fhs_top_center">
                                                        <div class="top_menu_label"> Sản phẩm</div>
                                                    </div>
                                                </a>
                                                <div style="clear: both;"></div>
                                            </div>
                                        </div>
                                        <div class="noti-top fhs_dropdown_hover no_cover">
                                            <script type="text/javascript">
                                                const IS_REQUIRE_LOGIN = "";
                                                const SKIN_HOST = "";

                                            </script>
                                            <div class="top-notification-button fhs_mouse_point">
                                                <a href="{{route("website.post.index")}}" style="cursor:pointer;display:flex;flex-direction: column;">
                                                    <div class="fhs_center_center" style="margin-bottom:3px;">
                                                        <div class="icon_nofi_gray">
                                                            <div class="top-notification-button-unseen top_menu_unseen fhs_center_center" style="display: none;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="fhs_top_center">
                                                        <div class="top_menu_label"> Tin tức</div>
                                                    </div>
                                                </a>
                                                <div style="clear: both;"></div>
                                            </div>
                                        </div>
                                        <div class="cart-top no_cover fhs_dropdown_hover">
                                            <script type="text/javascript">
                                                $jq(document).ready(function() {
                                                    var enable_module = $jq('#enable_module').val();
                                                    if (enable_module == 0)
                                                        return false;
                                                });

                                            </script>
                                            <style type="text/css">
                                                .heading-custom {
                                                    display: flex;
                                                    flex-direction: column;
                                                }

                                                .cart-number {
                                                    margin-top: -54px;
                                                    margin-left: 30px;
                                                    width: 20px;
                                                    height: 20px;
                                                    background: #C92127;
                                                    -webkit-border-radius: 10px;
                                                    -moz-border-radius: 10px;
                                                    border-radius: 13px;
                                                    display: flex;
                                                    justify-content: center;
                                                    align-items: center;
                                                }

                                                .cart-number span {
                                                    font-size: 12px;
                                                    color: #fff;
                                                }

                                                .heading-custom div {
                                                    text-align: center;
                                                }

                                            </style>
                                            <div class="fhs_top_cart">
                                                <a href="{{ route('cart.index') }}">
                                                    <div class="heading heading-custom">
                                                        <div class="fhs_center_center" style="margin-bottom: 3px;">
                                                            <div class="icon_cart_gray">
                                                                <div class="top_menu_unseen fhs_center_center" id="carqty_number" style="visibility: hidden;">
                                                                    <span class="cartmini_qty"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="top-cart-button-label fhs_top_center">
                                                            <div class="top_menu_label">Giỏ Hàng </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div id="cartmini_page_content" class="fhs_top_cart_dropdown fhs_dropdown center" style="visibility: hidden;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="header__top__left">
                                            <div class="fhs_top_account fhs_dropdown_hover" id="fhs_top_account_hover">
                                                <div class="fhs_top_account">
                                                    <a href="#">
                                                        <div class="fhs_top_account_button">
                                                            <div class="icon_account_gray" style="margin-bottom:3px;"></div>
                                                            <div class="top_menu_label fhs_top_center fhs_nowrap_one" id="fhs_top_account_title">
                                                                @guest
                                                                Tài khoản
                                                                @else
                                                                {{ Auth::user()->name }}
                                                                @endguest
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="fhs_top_account_dropdown fhs_dropdown right min" style="margin-right: -126px;">
                                                        @guest
                                                        <!-- Hiển thị khi chưa đăng nhập -->
                                                        <div class="fhs_center_left fhs_mouse_point" style="border-top: 1px solid #F2F4F5;">
                                                            <a class="fhs_center_left fhs_flex_grow" href="{{ route('login') }}">
                                                                <span class="ico_logout_gray" style="margin-right:8px;"></span><span>Thành viên đăng nhập</span>
                                                            </a>
                                                        </div>
                                                        <div class="fhs_center_left fhs_mouse_point" style="border-top: 1px solid #F2F4F5;">
                                                            <a class="fhs_center_left fhs_flex_grow" href="{{ route('register') }}">
                                                                <span class="ico_logout_gray" style="margin-right:8px;"></span><span>Đăng ký thành viên</span>
                                                            </a>
                                                        </div>
                                                        @else
                                                        <!-- Hiển thị khi đã đăng nhập -->
                                                        <div class="fhs_center_left fhs_mouse_point" style="border-top: 1px solid #F2F4F5;">
                                                            <form action="{{ route('logout') }}" method="POST" class="dropdown-item">
                                                                @csrf
                                                                <button type="submit" class="btn fhs_center_left fhs_flex_grow" style="background: none; border: none; padding: 0;">
                                                                    <span class="ico_logout_gray" style="margin-right:8px;"></span><span>Đăng xuất</span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                        @endguest
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                       
                        <div class="header-breadcrumbs background-menu-homepage">
                            <div class="container">
                                <div class="container-inner" style="margin-top:8px">
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>

                    </section>
