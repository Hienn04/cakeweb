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
                                      <div class="fhs_mouse_point" onclick="location.href = &#39;/&#39;;"
                                          title="BookShop">
                                          <img src="{{ asset('img/icon/hienbook.png') }}  " alt=""
                                              style="width:220px; vertical-align: middle;" />
                                      </div>
                                      <div
                                          class="fhs_center_right fhs_mouse_point fhs_dropdown_hover fhs_dropdown_click">
                                          {{-- <span class="icon_menu"></span> --}}
                                          {{-- <span class="icon_seemore_gray"></span> --}}
                                          <div class="catalog_menu_dropdown fhs_dropdown">
                                              <div class="fhs_stretch_stretch">
                                                  <div></div>
                                                  <div class="fhs_column_stretch" style="padding-right: 12px;">
                                                      <div class="fhs_menu_title fhs_center_left"
                                                          style="padding-left: 24px;"><i
                                                              class="ico_sachtrongnuoc"></i><span
                                                              class="menu-title"></span><b class="caret"></b></div>
                                                      <div class="fhs_menu_content fhs_column_left">
                                                      </div>
                                                  </div>
                                              </div>
                                              <script type="text/javascript">
                                                  $jq('.catalog_menu_dropdown .verticalmenu > li > a').removeClass('dropdown-toggle');
                                                  $jq('.catalog_menu_dropdown .verticalmenu > li > a').removeAttr('data-toggle');

                                                  $jq('.catalog_menu_dropdown .verticalmenu > li > a').hover(function() {
                                                      $jq('.catalog_menu_dropdown .verticalmenu > li').removeClass('active');
                                                      $jq(this).parent().addClass('active');
                                                      showMenuContent();
                                                  });
                                                  showMenuContent();

                                                  function showMenuContent() {
                                                      let $item_active = $jq('.catalog_menu_dropdown .verticalmenu > li.active');
                                                      if ($item_active.length <= 0) {
                                                          $item_active = $jq('.catalog_menu_dropdown .verticalmenu > li').first();
                                                          $item_active.addClass('active');
                                                      } else {
                                                          $item_active = $item_active.first();
                                                      }

                                                      if ($item_active.length > 0) {
                                                          let $dropdown = $item_active.find('.dropdown-menu-inner');
                                                          let $title = $item_active.children('a');
                                                          $jq('.fhs_header_desktop .fhs_menu_title').html($title.html());
                                                          $jq('.fhs_header_desktop .fhs_menu_content').html($dropdown.html());
                                                      }
                                                  }
                                              </script>
                                          </div>
                                      </div>
                                      <div class="fhs_center_left">
                                          <div class="box search_box">
                                              <form id="search_mini_form_desktop" action="#" method="get">
                                                  <div class="search pull-left">
                                                      <div class="form-search fhs_dropdown_hover_out">
                                                          <input id="search_desktop" type="text" name="q"
                                                              autocomplete="off" maxlength="128"
                                                              placeholder="Bạn đang tìm kiếm sách ..." value=""
                                                              class="input-search " readonly="readonly" />
                                                          <span class="fhs_btn_default active button-search"><span
                                                                  class="ico_search_white"></span></span>
                                                          <div class="form-search-form fhs_dropdown"></div>
                                                          <div class="form-search-form-suggestion fhs_dropdown"
                                                              id="result-seach">
                                                              <div class="form-search-form-title fhs_center_space">
                                                                  <div class="fhs_center_left">
                                                                      <span class="fhs_center_left"><img
                                                                              src="{{ asset('Content/Home/imgs/ico_searchtrending_black.svg') }}" /></span><span>
                                                                          Kết quả tìm kiếm
                                                                      </span>
                                                                  </div>
                                                              </div>
                                                              <div
                                                                  class="form_search_form_keyhot_content product-suggestions">

                                                              </div>
                                                          </div>

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
                                                  <a href="{{ route('website.post.index') }}"
                                                      style="cursor:pointer;display:flex;flex-direction: column;">
                                                      <div class="fhs_center_center" style="margin-bottom:3px;">
                                                          <div class="icon_nofi_gray">
                                                              <div class="top-notification-button-unseen top_menu_unseen fhs_center_center"
                                                                  style="display: none;"></div>
                                                          </div>
                                                      </div>
                                                      <div class="fhs_top_center">
                                                          <div class="top_menu_label">Tin tức</div>
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
                                                  <a href="{{ route('website.product.index') }}"
                                                      style="cursor:pointer;display:flex;flex-direction: column;">
                                                      <div class="fhs_center_center" style="margin-bottom:3px;">
                                                          <div class="ico_sachtrongnuoc">
                                                              <div class="top-notification-button-unseen top_menu_unseen fhs_center_center"
                                                                  style="display: none;"></div>
                                                          </div>
                                                      </div>
                                                      <div class="fhs_top_center">
                                                          <div class="top_menu_label"> Sản phẩm</div>
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
                                                                  <div class="top_menu_unseen fhs_center_center"
                                                                      id="carqty_number" style="visibility: hidden;">
                                                                      <span id="countProduct"
                                                                          class="cartmini_qty"></span>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="top-cart-button-label fhs_top_center">
                                                              <div class="top_menu_label">Giỏ Hàng </div>
                                                          </div>
                                                      </div>
                                                  </a>

                                                  <div id="cartmini_page_content"
                                                      class="fhs_top_cart_dropdown fhs_dropdown center"
                                                      style="visibility: hidden;">
                                                  </div>
                                              </div>
                                          </div>

                                      </div>
                                  </div>
                              </div>
                          </div>

                          {{-- <div class="fhs_header_mobile">
                              <div class="fhs-logo" style="text-align: center;">
                                  <a href="index.html" title="BookShop" class="logo"><strong class="logo-title"></strong><img src="{{asset('Content/Home/imgs/logo.png')}}" alt="BookShop" /></a>
                              </div>
                              <div class="fhs-header-top-bar holded">
                                  <div class="fhs_center_center fhs_mouse_point fhs_popup_full_click">
                                      <span class="ico_menu_white" style="margin: 0 4px;"></span>
                                      <div class="fhs_popup_full left">
                                          <div class="catalog_menu_nav">
                                              <div class="fhs_popup_full_head red">
                                                  <div class="fhs_mouse_point close" style="opacity: 1; padding:16px">
                                                      <span class="ico_arrow_line_white"></span></div>
                                                  <div style="text-transform: capitalize;">Danh mục Sách</div>
                                                  <div></div>
                                              </div>
                                              <div class="fhs_popup_full_body">
                                                  <div class="catalog_menu_nav_content">
                                                      <div class="catalog_menu_nav_content_items">
                                                          <div class="catalog_menu_nav_content_item fhs_column_left">
                                                              <div class="fhs_center_space" onclick="fhs_account.changeCatagoryMenuItem($jq(this).parents(&#39;.catalog_menu_nav_content_item&#39;));">
                                                                  <div class="catalog_menu_nav_content_item_title fhs_center_left">
                                                                      <a class="fhs_center_left">S&#225;ch Văn Học</a>
                                                                  </div>
                                                                  <div class="catalog_menu_nav_content_item_icon fhs_center_center">
                                                                      <span></span></div>
                                                              </div>
                                                              <div class="catalog_menu_nav_content_item_child">
                                                                  <a href="danh-muc-sach/sach-van-hoc-nuoc-ngoai-1634.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">S&#225;ch Văn Học Nước
                                                                          Ngo&#224;i</div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/sach-van-hoc-viet-nam-1635.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">S&#225;ch Văn Học Việt
                                                                          Nam</div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/truyen-cuoi-dan-gian-vn-1663.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">Truyện Cười D&#226;n
                                                                          Gian VN</div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/lich-su-viet-nam-8087.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">Lịch sử Việt Nam</div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/sach-van-hoc-1628.html" class="catalog_menu_nav_content_item_child_item more fhs_center_left">
                                                                      <div class="fhs_center_left">Xem tất cả</div>
                                                                  </a>
                                                              </div>
                                                          </div>
                                                          <div class="catalog_menu_nav_content_item fhs_column_left">
                                                              <div class="fhs_center_space" onclick="fhs_account.changeCatagoryMenuItem($jq(this).parents(&#39;.catalog_menu_nav_content_item&#39;));">
                                                                  <div class="catalog_menu_nav_content_item_title fhs_center_left">
                                                                      <a class="fhs_center_left">S&#225;ch Thiếu Nhi</a>
                                                                  </div>
                                                                  <div class="catalog_menu_nav_content_item_icon fhs_center_center">
                                                                      <span></span></div>
                                                              </div>
                                                              <div class="catalog_menu_nav_content_item_child">
                                                                  <a href="danh-muc-sach/truyen-tranh-co-tich-viet-nam-1649.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">Truyện Tranh Cổ
                                                                          T&#237;ch Việt Nam</div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/truyen-tranh-co-tich-the-gioi-1653.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">Truyện Tranh Cổ
                                                                          T&#237;ch Thế giới</div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/khoa-hoc-danh-cho-thieu-nhi-1654.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">Khoa Học D&#224;nh Cho
                                                                          Thiếu Nhi</div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/truyen-tranh-ca-dao-thieu-nhi-7839.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">Truyện Tranh - Ca Dao
                                                                          Thiếu Nhi</div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/vo-to-mau-1652.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">Vở T&#244; M&#224;u
                                                                      </div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/vo-tap-to-chu-cho-be-7833.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">Vở tập t&#244; chữ cho
                                                                          b&#233;</div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/tranh-treo-tuong-cho-be-1650.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">Tranh Treo Tường Cho
                                                                          B&#233;</div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/sticker-dan-hinh-thieu-nhi-7852.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">Sticker d&#225;n
                                                                          h&#236;nh Thiếu Nhi</div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/ky-nang-song-8085.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">Kỹ năng sống</div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/song-ngu-anh-viet-8086.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">Song ngữ Anh - Việt
                                                                      </div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/flash-card-8090.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">FLASH CARD </div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/sach-thieu-nhi-1636.html" class="catalog_menu_nav_content_item_child_item more fhs_center_left">
                                                                      <div class="fhs_center_left">Xem tất cả</div>
                                                                  </a>
                                                              </div>
                                                          </div>
                                                          <div class="catalog_menu_nav_content_item fhs_column_left">
                                                              <div class="fhs_center_space" onclick="fhs_account.changeCatagoryMenuItem($jq(this).parents(&#39;.catalog_menu_nav_content_item&#39;));">
                                                                  <div class="catalog_menu_nav_content_item_title fhs_center_left">
                                                                      <a class="fhs_center_left">S&#225;ch Đời Sống</a>
                                                                  </div>
                                                                  <div class="catalog_menu_nav_content_item_icon fhs_center_center">
                                                                      <span></span></div>
                                                              </div>
                                                              <div class="catalog_menu_nav_content_item_child">
                                                                  <a href="danh-muc-sach/nuoi-day-con-1657.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">Nu&#244;i Dạy Con</div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/nau-an-gia-dinh-ky-nang-1659.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">Nấu ăn - Gia đ&#236;nh
                                                                          - Kỹ năng</div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/the-gioi-ky-la-1660.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">Thế Giới Kỳ Lạ</div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/sach-doi-song-1637.html" class="catalog_menu_nav_content_item_child_item more fhs_center_left">
                                                                      <div class="fhs_center_left">Xem tất cả</div>
                                                                  </a>
                                                              </div>
                                                          </div>
                                                          <div class="catalog_menu_nav_content_item fhs_column_left">
                                                              <div class="fhs_center_space" onclick="fhs_account.changeCatagoryMenuItem($jq(this).parents(&#39;.catalog_menu_nav_content_item&#39;));">
                                                                  <div class="catalog_menu_nav_content_item_title fhs_center_left">
                                                                      <a class="fhs_center_left">S&#225;ch Ngoại Ngữ</a>
                                                                  </div>
                                                                  <div class="catalog_menu_nav_content_item_icon fhs_center_center">
                                                                      <span></span></div>
                                                              </div>
                                                              <div class="catalog_menu_nav_content_item_child">
                                                                  <a href="danh-muc-sach/tieng-anh-1667.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">Tiếng Anh</div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/tieng-trung-1668.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">Tiếng Trung</div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/tieng-nhat-1669.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">Tiếng Nhật</div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/tieng-han-4063.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">Tiếng H&#224;n</div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/sach-ngoai-ngu-1638.html" class="catalog_menu_nav_content_item_child_item more fhs_center_left">
                                                                      <div class="fhs_center_left">Xem tất cả</div>
                                                                  </a>
                                                              </div>
                                                          </div>
                                                          <div class="catalog_menu_nav_content_item fhs_column_left">
                                                              <div class="fhs_center_space" onclick="fhs_account.changeCatagoryMenuItem($jq(this).parents(&#39;.catalog_menu_nav_content_item&#39;));">
                                                                  <div class="catalog_menu_nav_content_item_title fhs_center_left">
                                                                      <a class="fhs_center_left">Từ Điển</a></div>
                                                                  <div class="catalog_menu_nav_content_item_icon fhs_center_center">
                                                                      <span></span></div>
                                                              </div>
                                                              <div class="catalog_menu_nav_content_item_child">
                                                                  <a href="danh-muc-sach/anh-viet-viet-anh-1670.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">Anh Việt - Việt Anh
                                                                      </div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/nhat-viet-viet-nhat-1671.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">Nhật Việt - Việt Nhật
                                                                      </div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/han-viet-viet-han-1672.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">H&#225;n Việt - Việt
                                                                          H&#225;n</div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/han-viet-viet-han-1674.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">H&#224;n Việt - Việt
                                                                          H&#224;n</div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/tieng-viet-y-hoc-1673.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">Tiếng Việt - Y Học
                                                                      </div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/tu-dien-1639.html" class="catalog_menu_nav_content_item_child_item more fhs_center_left">
                                                                      <div class="fhs_center_left">Xem tất cả</div>
                                                                  </a>
                                                              </div>
                                                          </div>
                                                          <div class="catalog_menu_nav_content_item fhs_column_left">
                                                              <div class="fhs_center_space" onclick="fhs_account.changeCatagoryMenuItem($jq(this).parents(&#39;.catalog_menu_nav_content_item&#39;));">
                                                                  <div class="catalog_menu_nav_content_item_title fhs_center_left">
                                                                      <a class="fhs_center_left">Văn H&#243;a T&#226;m
                                                                          Linh - Phong Thủy</a></div>
                                                                  <div class="catalog_menu_nav_content_item_icon fhs_center_center">
                                                                      <span></span></div>
                                                              </div>
                                                              <div class="catalog_menu_nav_content_item_child">
                                                                  <a href="danh-muc-sach/van-hoa-tam-linh-1664.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">Văn H&#243;a T&#226;m
                                                                          Linh</div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/phong-thuy-khao-cuu-1665.html" class="catalog_menu_nav_content_item_child_item fhs_center_space">
                                                                      <div class="fhs_center_left">Phong Thủy - Khảo cứu
                                                                      </div>
                                                                      <div class="icon_seemore_gray right"></div>
                                                                  </a>
                                                                  <a href="danh-muc-sach/van-hoa-tam-linh-phong-thuy-1641.html" class="catalog_menu_nav_content_item_child_item more fhs_center_left">
                                                                      <div class="fhs_center_left">Xem tất cả</div>
                                                                  </a>
                                                              </div>
                                                          </div>
                                                          <div class="catalog_menu_nav_content_item fhs_column_left">
                                                              <div class="fhs_center_space" onclick="fhs_account.changeCatagoryMenuItem($jq(this).parents(&#39;.catalog_menu_nav_content_item&#39;));">
                                                                  <div class="catalog_menu_nav_content_item_title fhs_center_left">
                                                                      <a class="fhs_center_left">S&#225;ch BUSSINESS +
                                                                          Kinh doanh</a></div>
                                                                  <div class="catalog_menu_nav_content_item_icon fhs_center_center">
                                                                      <span></span></div>
                                                              </div>
                                                              <div class="catalog_menu_nav_content_item_child">
                                                                  <a href="danh-muc-sach/sach-bussiness-kinh-doanh-1847.html" class="catalog_menu_nav_content_item_child_item more fhs_center_left">
                                                                      <div class="fhs_center_left">Xem tất cả</div>
                                                                  </a>
                                                              </div>
                                                          </div>
                                                          <div class="catalog_menu_nav_content_item fhs_column_left">
                                                              <div class="fhs_center_space" onclick="fhs_account.changeCatagoryMenuItem($jq(this).parents(&#39;.catalog_menu_nav_content_item&#39;));">
                                                                  <div class="catalog_menu_nav_content_item_title fhs_center_left">
                                                                      <a class="fhs_center_left">S&#225;ch Luyện Thi
                                                                          THPT</a></div>
                                                                  <div class="catalog_menu_nav_content_item_icon fhs_center_center">
                                                                      <span></span></div>
                                                              </div>
                                                              <div class="catalog_menu_nav_content_item_child">
                                                                  <a href="danh-muc-sach/sach-luyen-thi-thpt-7726.html" class="catalog_menu_nav_content_item_child_item more fhs_center_left">
                                                                      <div class="fhs_center_left">Xem tất cả</div>
                                                                  </a>
                                                              </div>
                                                          </div>
                                                          <div class="catalog_menu_nav_content_item fhs_column_left">
                                                              <div class="fhs_center_space" onclick="fhs_account.changeCatagoryMenuItem($jq(this).parents(&#39;.catalog_menu_nav_content_item&#39;));">
                                                                  <div class="catalog_menu_nav_content_item_title fhs_center_left">
                                                                      <a class="fhs_center_left">S&#225;ch Y Học</a></div>
                                                                  <div class="catalog_menu_nav_content_item_icon fhs_center_center">
                                                                      <span></span></div>
                                                              </div>
                                                              <div class="catalog_menu_nav_content_item_child">
                                                                  <a href="danh-muc-sach/sach-y-hoc-7778.html" class="catalog_menu_nav_content_item_child_item more fhs_center_left">
                                                                      <div class="fhs_center_left">Xem tất cả</div>
                                                                  </a>
                                                              </div>
                                                          </div>

                                                      </div>
                                                  </div>
                                                  <script>
                                                      const IS_MOBILE = "";
                                                      fhs_account.initAccount('0', 'index.html', {
                                                          "show": "Hiện "
                                                          , "hide": "Ẩn"
                                                          , "phoneinvalid": "Số điện thoại không hợp lệ"
                                                          , "phoneinvalid10": "Số điện thoại phải 10 chữ số"
                                                          , "phoneexist": "Số điện thoại đã tồn tại"
                                                          , "emailinvalid": "Email không hợp lệ"
                                                          , "taxcodeinvalid": "Mã số thuế không hợp lệ"
                                                          , "otpinvalid": "OTP không hợp lệ"
                                                          , "notemail": "Đây không phải là địa chỉ email hợp lệ!"
                                                          , "notempty": "Thông tin này không thể để trống"
                                                          , "nopass": "Enter a valid password!"
                                                          , "30char": "Mật khẩu phải từ 30 ký tự trở xuống!"
                                                          , "over200char": "Không thể vượt quá 200 ký tự"
                                                          , "notsame": "Passwords are not same!"
                                                          , "wrong": "Số điện thoại\/Email hoặc Mật khẩu sai!"
                                                          , "registered": "This email is already registered!"
                                                          , "tryagain": "Đã xảy ra lỗi, xin vui lòng thử lại"
                                                          , "login": "Đăng nhập"
                                                          , "recoverypassword": "Khôi phục"
                                                          , "dateinvalid": "Ngày không hợp lệ"
                                                          , "change": "Thay đổi"
                                                          , "loginfail": "Đăng nhập thất bại"
                                                          , "2word": "Họ và tên phải có 2 từ trở lên"
                                                          , "copied": "Đã copy"
                                                          , "close": "Đóng"
                                                          , "img_loading": ""
                                                          , "close_img": ""
                                                          , "locale": "vi_VN"
                                                          , "add_to_cart": "Thêm giỏ hàng"
                                                          , "fail_icon": ""
                                                          , "out_of_stock": "Sản phẩm tạm hết hàng"
                                                          , "comingsoon": "Sắp Có Hàng"
                                                          , "cancel": "Hủy"
                                                          , "add_to_cart_success": "Thêm vào giỏ hàng thành công"
                                                          , "try_again": "Hệ thống đang bận, vui lòng thử lại!"
                                                          , "special_characters": "Không cho phép sử dụng ký tự đặc biệt"
                                                          , "minLength": "Mật khẩu phải từ 6 ký tự trở lên!"
                                                          , "minLength_address": "Địa chỉ phải từ 6 ký tự trở lên!"
                                                      }, 6);

                                                      $jq(document).ready(function() {
                                                          fhs_account.removeOriginalJsLocations();
                                                      });

                                                  </script>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="search-mobile-header">
                                      <div class="ves-autosearch">
                                          <div class="box search_box ">
                                              <form id="search_mini_form_mobile" action="#" method="get">
                                                  <div class="search pull-left">
                                                      <div class="form-search">
                                                          <input id="search_mobile" maxlength="128" type="text" name="q" autocomplete="off" placeholder="Bạn đang tìm kiếm sách ..." value="" class="input-search " />
                                                          <span class="button-search fa fa-search"></span>
                                                          <!--<button type="submit" title="Tìm kiếm" class="ves-button-search"></button>-->
                                                          <div class="btn-remove btn-remove2 remove-text-search-form-mini-mobile" style="display: none;"></div>
                                                          <div id="search_autocomplete" class="search-autocomplete"></div>
                                                          <div class="form-search-form fhs_dropdown"></div>
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>

                                      </div>
                                      <div class="form-search-form-suggestion fhs_dropdown" id="result-seach-mobile">
                                          <div class="form-search-form-title fhs_center_space">
                                              <div class="fhs_center_left">
                                                  <span class="fhs_center_left"><img src="{{asset('Content/Home/imgs/ico_searchtrending_black.svg')}}" /></span><span>
                                                      Kết quả tìm kiếm
                                                  </span>
                                              </div>
                                          </div>
                                          <div class="form_search_form_keyhot_content product-suggestions product-suggestions-mobile">
                                          </div>
                                      </div>

                                  </div>
                                  <script src="{{asset('Content/Home/js/suggestion.js')}}"></script>
                                  <div class="icons-mobile-header" style="position: relative;">

                                      <div id="top-notification-button-show"></div>

                                      <div id="mini_cart_block" class="cart-top">
                                          <div id="cart" class="clearfix">
                                              <a href="gio-hang.html">
                                                  <div class="fhs_center_center">
                                                      <div class="icon_cart_white" style="margin-right: 4px;">
                                                          <div>
                                                              <div class="top_menu_unseen fhs_center_center" id="carqty_number" style="visibility: hidden;">
                                                                  <span class="cartmini_qty"></span>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </a>
                                          </div>
                                      </div>

                                      <div class="customer-top">
                                          <div>
                                              <a href="thanh-vien-dang-nhap.html">
                                                  <div>
                                                      <div class="login-cutomer-icon" style="width:30px;height:35px;">
                                                      </div>
                                                  </div>
                                              </a>
                                          </div>
                                      </div>

                                  </div>
                              </div>
                          </div> --}}
                          <div class="header-breadcrumbs background-menu-homepage">
                              <div class="container">
                                  <div class="container-inner" style="margin-top:8px">
                                  </div>
                              </div>
                              <div class="clear"></div>
                          </div>

                      </section>
                      <script>
                          /*
                           * Get Total Product InCart
                           */
                          function getTotalProductInCart() {
                              $.ajax({
                                  url: "{{ route('cart.getTotalProductInCart') }}",
                                  type: "POST",
                                  headers: {
                                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                  },
                              }).done(function(res) {
                                  $('#countProduct').text(res.data);
                              }).fail(function(xhr) {
                                  if (xhr.status === 401) {
                                      $('#countProduct').text(0);
                                  } else {
                                      notiError();
                                  }
                              });
                          }

                          /*
                           * Load cart list
                           */
                          function searchCartList() {
                              $.ajax({
                                  url: "{{ route('cart.searchLimit') }}",
                                  type: "POST",
                                  headers: {
                                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                  },
                              }).done(function(data) {
                                  $('#cart_list').html(data);
                              }).fail(function(xhr) {
                                  if (xhr.status === 401) {
                                      $('#cart_list').html(
                                          '<div class="text-center p-5"><h5><i class="fa-regular fa-face-sad-tear mr-2"></i>Chưa có sản phẩm</h5></div>'
                                      );
                                  } else {
                                      notiError();
                                  }
                              });
                          }

                          $(document).ready(function() {

                              getTotalProductInCart();

                              // Hover cart icon
                              $('#cartIcon').hover(
                                  function() {
                                      $('#cart_list').show();
                                      searchCartList();
                                  },
                                  function() {
                                      if (!$('#cart_list').is(":hover")) {
                                          $('#cart_list').hide();
                                      }
                                  }
                              );

                              // move leave to hide cart list
                              $("#cart_list").mouseleave(function() {
                                  $('#cart_list').hide();
                              });

                          })
                      </script>
