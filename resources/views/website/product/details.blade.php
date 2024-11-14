@extends('website.layouts.app')
@section('content')

<script src="{{ asset('Content/Home/js/12e66af05ff4fe2eff6aa26b71ad0c5c.js')}}"></script>
<link href="{{ asset('Content/Home/css/b37de6b41e195c64a4e63c4b7cf62225.css') }}" rel="stylesheet" />
<link href="{{ asset('Content/Home/css/product_view.css')}}" rel="stylesheet" />
<div class="main-container col1-layout no-margin-top">
    <div class="main">
        <div>
            <div class="container" style="background-color : transparent!important;">
                <div class="mb-breadcrumbs">
                    <div id="ves-breadcrumbs" class="breadcrumbs" style="display:block;">
                        <div class="container-inner breadcrumbs">
                            <ol class="breadcrumb">
                                <li class="home">
                                    <a href="{{route ('home')}}" title="Tới trang chủ">Trang chủ</a>
                                    <span>/ </span>
                                </li>
                                <li class="category4">
                                    <a href="https://nhasachminhthang.vn/danh-muc-sach/van-hoa-tam-linh-phong-thuy-1641.html" title="">Văn H&#243;a T&#226;m Linh - Phong Thủy</a>
                                    <span>/ </span>
                                </li>
                                <li class="category14">
                                    <a href="https://nhasachminhthang.vn/danh-muc-sach/van-hoa-tam-linh-1664.html" title="">Văn H&#243;a T&#226;m Linh</a>
                                </li>
                            </ol>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="container-inner">


                <!--begin web product view UI-->
                @if($productDetail)
                <div class="product-view kasitoo">
                    <!--begin web UI-->
                    <div class="product-essential">
                        <div class="product-essential-media">
                            <div class="product-view-image">
                                <div class="product-view-thumbnail">
                                    <div class="lightgallery" id="lightgallery-product-media">
                                        <a class="include-in-gallery" id="lightgallery-item-0" href="{{ Storage::url($productDetail->image) }}" title="{{$productDetail->name}}">
                                            <img src="{{ Storage::url($productDetail->image) }}" alt="image">
                                        </a>
                                    </div>

                                </div>
                                <div class="product-view-image-product fhs_img_frame_container" img_index="0">
                                    <img id="image" class="fhs-p-img lazyloaded" src="{{Storage::url($productDetail->image)}}" alt="{{$productDetail->name}}" title="{{$productDetail->name}}">
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="product_view_add_box">
                                <button type="button" title="Thêm vào giỏ hàng" class="btn-cart-to-cart" onclick="addToCartTo(19234); 
                                    return false;">
                                    <span class="fhs_icon_cart"></span>
                                    <span>Thêm vào giỏ hàng</span>
                                </button>
                                <button data-product-id="{{ $productDetail->id }}" type="button" class="btn addToCart btn-buy-now"><span>Mua ngay</span></button>
                            </div>

                        </div>
                        <div class="product-essential-detail">
                            <h1>
                                {{$productDetail->name}}
                            </h1>

                            <div class="product-view-sa">
                                <div class="product-view-sa_one">
                                    <div class="product-view-sa-supplier">
                                        <span>Tác giả:</span>
                                        <a href="https://nhasachminhthang.vn/tac-gia/tue-duc-bien-soan-10152.html" title="Tuệ Đức bi&#234;n soạn">add field</a>
                                    </div>
                                    <div class="product-view-sa-author">
                                        <span>Nhà xuất bản:</span>
                                        <a href="https://nhasachminhthang.vn/nha-xuat-ban/nxb-hong-duc-1717.html" title="add field">add field</a>
                                    </div>
                                </div>
                                <div class="product-view-sa_two">
                                    <div class="product-view-sa-supplier">
                                        <span>Hình thức bìa:</span><span title="add field">add field</span>
                                    </div>
                                    <div class="product-view-sa-author">
                                        <span>Năm xuất bản:</span><span title="2024(ISBN: 9786043181494)(M&#227; s&#225;ch: 8935236435833)">add field</span>
                                    </div>
                                </div>
                            </div>

                            <!-- release_countdown_product desktop-->

                            <div id="product-view-price-block" class="col-md-12 price-block">
                                <div id="catalog-product-details-price" class="product_price price-block-left " style="">
                                    <div class="price-box">
                                        <p class="special-price">
                                            <span class="price-label"></span>
                                            <span class="price" id="product-price-19234" style="font-size:32px !important;">{{$productDetail->price}} đ</span>
                                        </p>
                                        <p class="old-price">
                                            <span class="price-label"></span>
                                            <span class="price" id="old-price-19234">50.000 đ</span>
                                            <span class="discount-percent">-25%</span>
                                        </p>

                                    </div>
                                </div>

                            </div>

                            <div class="clear"></div>
                            <style>
                                .item-promotion-title {
                                    border-bottom: 1px solid #F2F4F5;
                                    height: 18px;
                                    margin-bottom: 22px;
                                    display: block !important;
                                    white-space: nowrap;
                                }

                                .item-promotion-title h2 {
                                    background: #fff none repeat scroll 0 0;
                                    display: inline-block;
                                    font-size: 1.35em;
                                    font-weight: 600;
                                    margin-top: 6px;
                                    padding-right: 3px;
                                    font-family: 'Nunito Sans', 'sans-serif';
                                }

                            </style>
                            <div class="clear"></div>
                            <div id="catalog-product-details-discount">
                                <div class="product-view-quantity-box">
                                    <label for="qty">Số lượng:</label>
                                    <div class="product-view-quantity-box-block">
                                        <a class="btn-subtract-qty" onclick="subtractQty();"><img style="width: 12px; height: auto;" src="https://nhasachminhthang.vn/Content/Home/imgs/ico_minus2x.png"></a>
                                        <input type="text" name="qty" id="qty" maxvalue="999" minvalue="1" align="center" value="1" onkeypress="validateNumber(event)" onblur="validateQty();" title="SL" class="input-text qty">
                                        <a class="btn-add-qty" onclick="addQty();"><img style="width: 12px; height: auto;" src="https://nhasachminhthang.vn/Content/Home/imgs/ico_plus2x.png"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>

                            <div class="policy-popup-background" id="policy-popup-background">
                                <div class="policy-popup-content">
                                </div>
                            </div>

                            <div class="clear"></div>
                            <div class="fhs-bsidebar">
                                <div class="fhs-bsidebar-tab">
                                    <ul class="fhs-bsidebar-tab-items">
                                        <li class="fhs-bsidebar-tab-items-qty">
                                            <div class="product-view-quantity-box">
                                                <div class="product-view-quantity-box-block">
                                                    <a class="btn-subtract-qty" onclick="subtractQty();"><img style="width: 12px; height: auto;" src="https://nhasachminhthang.vn/Content/Home/imgs/ico_minus2x.png"></a>
                                                    <input type="text" name="qty" id="qty_mobile" maxvalue="999" minvalue="1" align="center" value="1" onkeypress="validateNumber(event)" onblur="validateQty();" title="SL" class="input-text qty">
                                                    <a class="btn-add-qty" onclick="addQty();"><img style="width: 12px; height: auto;" src="https://nhasachminhthang.vn/Content/Home/imgs/ico_plus2x.png"></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="fhs-bsidebar-tab-items-addcart"><button data-product-id="{{ $productDetail->id }}" class="btn btn-add-cart">Thêm vào giỏ hàng</button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="clear"></div>

                </div>

                <div class="fhs_tabslider3_container">
                    <div class="fhs_tabslider3_header">
                        <div class="fhs_tabslider3_title">SÁCH CÙNG DANH MỤC</div>
                    </div>
                    <div class="swiper-container swiper-container-horizontal">
                        <ul class="fhs-product-slider-list">
                            @foreach($relatedProducts as $rl)
                            <li class="fhs_product_basic swiper-slide flashsale-item swiper-slide-active">
                                <div class="item-inner">
                                    <div class="ma-box-content">
                                        <div class="products clear">
                                            <div class="product images-container">
                                                <a href="{{route('website.product.detail', $rl->id)}}" title="{{$rl->name}}" class="product-image">
                                                    <div class="product-image">
                                                        <img alt="{{$rl->name}}" class="lazyloaded" src="{{Storage::url($rl->image)}}" />

                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <h2 class="product-name-no-ellipsis">
                                                <a href="{{route('website.product.detail', $rl->id)}}" title="{{$rl->name}}">{{$rl->name}}</a>
                                            </h2>
                                            <div style="" class="author">add field</div>
                                            <div class="price-label">
                                                <p class="special-price">
                                                    <span class="price m-price-font fhs_center_left">63.750 đ <span class="discount-percent fhs_center_left">-25%</span></span>
                                                </p>
                                                <p class="old-price">
                                                    <span class="price">85.000 đ</span>
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                </div>
                <div id="product_view_info" class="content product_view_content">
                    <div class="product_view_content-title">Thông tin sản phẩm</div>
                    <div class="product_view_tab_content_ad">
                        <div class="product_view_tab_content_additional">
                            <table class="data-table table-additional">
                                <colgroup>
                                    <col width="25%">
                                    <col>
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <th class="table-label">
                                            NXB
                                        </th>
                                        <td class="data_publisher">
                                            add field
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-label">
                                            Năm xuất bản | Mã hàng
                                        </th>
                                        <td class="data_sku">
                                            add field
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-label">
                                            Tác giả
                                        </th>
                                        <td class="data_author">
                                            add field
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-label">
                                            Người Dịch
                                        </th>
                                        <td class="data_translator">

                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-label">
                                            Số Trang
                                        </th>
                                        <td class="data_weight">
                                            74 trang
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-label">
                                            Kích Thước Bao Bì
                                        </th>
                                        <td class="data_size">
                                            16 x 24 cm
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-label">
                                            Hình thức
                                        </th>
                                        <td class="data_book_layout">
                                            add field
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        @endif
                        <div class="clear"></div>
                        <div id="product_tabs_description_contents">
                            <div id="desc_content" class="std">
                                <p style="text-align: center;">

                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div style="overflow-y: hidden;">
                        <div class="product_view_tab_content_ad_more" style="">
                            <div class="product_view_tab_content_additional">
                                <table class="data-table table-additional">
                                    <colgroup>
                                        <col width="25%">
                                        <col>
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <th class="table-label">
                                                NXB
                                            </th>
                                            <td class="data_publisher">
                                                NXB Hồng Đức
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table-label">
                                                Năm xuất bản | Mã hàng
                                            </th>
                                            <td class="data_sku">
                                                2024(ISBN: 9786043181494)(M&#227; s&#225;ch: 8935236435833)
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table-label">
                                                Tác giả
                                            </th>
                                            <td class="data_author">
                                                Tuệ Đức bi&#234;n soạn
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table-label">
                                                Người Dịch
                                            </th>
                                            <td class="data_translator">

                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table-label">
                                                Số Trang
                                            </th>
                                            <td class="data_weight">
                                                74 trang
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-label">
                                                Kích Thước Bao Bì
                                            </th>
                                            <td class="data_size">
                                                16 x 24 cm
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table-label">
                                                Hình thức
                                            </th>
                                            <td class="data_book_layout">
                                                b&#236;a mềm
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="clear"></div>
                            <div id="product_tabs_description_contents">
                                <div id="desc_content" class="std">
                                    <p style="text-align: center;">
                                        <span style="font-size:24px;"><span style="color:#ff0000;">Sổ tay ch&eacute;p kinh Ch&uacute; Đại Bi (in mờ - g&aacute;y l&ograve; xo)</span></span></p>
                                    <article class="4ever-article" data-clipboard-cangjie="[&quot;root&quot;,{&quot;copyFrom&quot;:1419615057},[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot;Tác giả: Tuệ Đức (biên soạn)&quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot;Giá bìa: 50.000 ₫&quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot;NXB: NXB Hồng Đức&quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot;Phát hành: Minh Thắng&quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot;Năm xuất bản: 2024(Mã sách: 8935236435833 )&quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot;Dạng bìa: bìa mềm&quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot;Số trang: 76 trang&quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot;Kích thước: 16 x 24 cm&quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot; &quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot;===================GIỚI THIỆU VỀ KINH CHÚ ĐẠI BI ==================&quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot;+ GIỚI THIỆU VỀ CHÚ ĐẠI BI&quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot;Chú Đại Bi là bài chú căn bản minh họa công đức nội chứng của Đức Quán Tự Tại Bồ Tát. Chú Đại Bi, còn được biết đến với tên gọi khác là Thanh Cảnh Đà La Ni, được trích từ kinh Đại Bi Tâm Đà La Ni, một kinh điển quan trọng của Phật giáo Đại thừa.&quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot; &quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot;+ Ý NGHĨA CỦA VIỆC CHÉP CHÚ ĐẠI BI LÀ GÌ?&quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot;Chép Chú Đại Bi không chỉ là một hành động mang tính tôn giáo mà còn là một nghệ thuật sống, giúp con người tìm thấy sự an lạc, tu dưỡng đạo đức và hướng đến một cuộc sống tràn đầy từ bi, hỉ xả. Việc chép Chú Đại Bi như một dòng suối mát lành, làm dịu đi những nỗi khổ đau và mang lại niềm hy vọng, hạnh phúc cho người thực hành.&quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot;Mỗi nét chữ được viết ra mang theo sự thành tâm, kính cẩn, và lòng tôn kính đối với chư Phật, Bồ Tát không chỉ là để tu tâm, dưỡng tính mà còn là để cầu nguyện cho bản thân và gia đình, mong muốn sự bình an, may mắn, hạnh phúc. Trong từng câu chữ, người chép gửi gắm những lời nguyện cầu chân thành nhất, hy vọng vào sự che chở của Đức Quán Thế Âm Bồ Tát.&quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot; &quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot;+ NHỮNG LƯU Ý KHI CHÉP CHÚ ĐẠI BI&quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot;Chép Chú Đại Bi là một hành động tu tập ý nghĩa, đòi hỏi sự thành tâm và tuân thủ một số lưu ý để bảo đảm sự trang nghiêm thành kính.&quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot;Tinh Thần Thành Kính: Trước khi bắt đầu chép Chú Đại Bi, người thực hành cần giữ một tâm thế thanh tịnh, tĩnh tâm và tập trung.&quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot;Chọn Nơi Chép Kinh: Nên chọn một nơi yên tĩnh, sạch sẽ, thoáng đãng để chép kinh. Có thể đốt một chút hương trầm để không gian thêm phần thanh tịnh.&quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot;Chuẩn Bị Đầy Đủ Dụng Cụ: Trước khi chép, hãy chuẩn bị đầy đủ các dụng cụ cần thiết như bút, tẩy, và nếu có thể, hãy chọn những loại bút tốt, không bị lem mực.&quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot;Giữ Vệ Sinh Cá Nhân: Trước khi chép Chú Đại Bi, nên tắm rửa sạch sẽ, mặc quần áo chỉnh tề, tránh ăn uống những thực phẩm nặng mùi hoặc không thanh khiết.&quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot;Không Ngắt Quâng: Cố gắng hoàn thành một biến Chú Đại Bi mà không bị gián đoạn. Tránh để kinh văn dỡ dang quá lâu, vì điều này có thể làm mất đi sự liên tục và tập trung trong việc thực hành.&quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot;Chú Ý Đến Từng Chữ: Khi chép kinh, nên viết từng chữ một cách cẩn thận, rõ ràng, không viết vội vàng hay thiếu chú tâm. Mỗi chữ nên được chép ra với tâm nguyện và lòng thành kính sâu sắc.&quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot;Bảo Quản Kinh Văn: Sau khi chép xong, nên bảo quản bản kinh chép một cách cẩn thận, tránh để nơi ẩm ướt, bẩn thỉu&quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot; &quot;]]],[&quot;p&quot;,{},[&quot;span&quot;,{&quot;data-type&quot;:&quot;text&quot;},[&quot;span&quot;,{&quot;data-type&quot;:&quot;leaf&quot;},&quot;#chudaibi #vochepkinh #sotaychepkinh #diatangbotatbonnguyen\n &quot;]]]]">
                                        <p style="margin-left: 0px; margin-top: 0px; margin-bottom: 0px;">
                                            <span style="font-size:16px;">+&nbsp;GIỚI&nbsp;THIỆU&nbsp;VỀ&nbsp;CH&Uacute;&nbsp;ĐẠI&nbsp;BI</span></p>
                                        <p style="margin-left: 0px; margin-top: 0px; margin-bottom: 0px;">
                                            <span style="font-size:16px;">Ch&uacute;&nbsp;Đại&nbsp;Bi&nbsp;l&agrave;&nbsp;b&agrave;i&nbsp;ch&uacute;&nbsp;căn&nbsp;bản&nbsp;minh&nbsp;họa&nbsp;c&ocirc;ng&nbsp;đức&nbsp;nội&nbsp;chứng&nbsp;của&nbsp;Đức&nbsp;Qu&aacute;n&nbsp;Tự&nbsp;Tại&nbsp;Bồ&nbsp;T&aacute;t.&nbsp;Ch&uacute;&nbsp;Đại&nbsp;Bi,&nbsp;c&ograve;n&nbsp;được&nbsp;biết&nbsp;đến&nbsp;với&nbsp;t&ecirc;n&nbsp;gọi&nbsp;kh&aacute;c&nbsp;l&agrave;&nbsp;Thanh&nbsp;Cảnh&nbsp;Đ&agrave;&nbsp;La&nbsp;Ni,&nbsp;được&nbsp;tr&iacute;ch&nbsp;từ&nbsp;kinh&nbsp;Đại&nbsp;Bi&nbsp;T&acirc;m&nbsp;Đ&agrave;&nbsp;La&nbsp;Ni,&nbsp;một&nbsp;kinh&nbsp;điển&nbsp;quan&nbsp;trọng&nbsp;của&nbsp;Phật&nbsp;gi&aacute;o&nbsp;Đại&nbsp;thừa.</span></p>
                                        <p style="margin-left: 0px; margin-top: 0px; margin-bottom: 0px;">
                                            &nbsp;</p>
                                        <p style="margin-left: 0px; margin-top: 0px; margin-bottom: 0px;">
                                            <span style="font-size:16px;">+&nbsp;&Yacute;&nbsp;NGHĨA&nbsp;CỦA&nbsp;VIỆC&nbsp;CH&Eacute;P&nbsp;CH&Uacute;&nbsp;ĐẠI&nbsp;BI&nbsp;L&Agrave;&nbsp;G&Igrave;?</span></p>
                                        <p style="margin-left: 0px; margin-top: 0px; margin-bottom: 0px;">
                                            <span style="font-size:16px;">Ch&eacute;p&nbsp;Ch&uacute;&nbsp;Đại&nbsp;Bi&nbsp;kh&ocirc;ng&nbsp;chỉ&nbsp;l&agrave;&nbsp;một&nbsp;h&agrave;nh&nbsp;động&nbsp;mang&nbsp;t&iacute;nh&nbsp;t&ocirc;n&nbsp;gi&aacute;o&nbsp;m&agrave;&nbsp;c&ograve;n&nbsp;l&agrave;&nbsp;một&nbsp;nghệ&nbsp;thuật&nbsp;sống,&nbsp;gi&uacute;p&nbsp;con&nbsp;người&nbsp;t&igrave;m&nbsp;thấy&nbsp;sự&nbsp;an&nbsp;lạc,&nbsp;tu&nbsp;dưỡng&nbsp;đạo&nbsp;đức&nbsp;v&agrave;&nbsp;hướng&nbsp;đến&nbsp;một&nbsp;cuộc&nbsp;sống&nbsp;tr&agrave;n&nbsp;đầy&nbsp;từ&nbsp;bi,&nbsp;hỉ&nbsp;xả.&nbsp;Việc&nbsp;ch&eacute;p&nbsp;Ch&uacute;&nbsp;Đại&nbsp;Bi&nbsp;như&nbsp;một&nbsp;d&ograve;ng&nbsp;suối&nbsp;m&aacute;t&nbsp;l&agrave;nh,&nbsp;l&agrave;m&nbsp;dịu&nbsp;đi&nbsp;những&nbsp;nỗi&nbsp;khổ&nbsp;đau&nbsp;v&agrave;&nbsp;mang&nbsp;lại&nbsp;niềm&nbsp;hy&nbsp;vọng,&nbsp;hạnh&nbsp;ph&uacute;c&nbsp;cho&nbsp;người&nbsp;thực&nbsp;h&agrave;nh.</span></p>
                                        <p style="margin-left: 0px; margin-top: 0px; margin-bottom: 0px;">
                                            <span style="font-size:16px;">Mỗi&nbsp;n&eacute;t&nbsp;chữ&nbsp;được&nbsp;viết&nbsp;ra&nbsp;mang&nbsp;theo&nbsp;sự&nbsp;th&agrave;nh&nbsp;t&acirc;m,&nbsp;k&iacute;nh&nbsp;cẩn,&nbsp;v&agrave;&nbsp;l&ograve;ng&nbsp;t&ocirc;n&nbsp;k&iacute;nh&nbsp;đối&nbsp;với&nbsp;chư&nbsp;Phật,&nbsp;Bồ&nbsp;T&aacute;t&nbsp;kh&ocirc;ng&nbsp;chỉ&nbsp;l&agrave;&nbsp;để&nbsp;tu&nbsp;t&acirc;m,&nbsp;dưỡng&nbsp;t&iacute;nh&nbsp;m&agrave;&nbsp;c&ograve;n&nbsp;l&agrave;&nbsp;để&nbsp;cầu&nbsp;nguyện&nbsp;cho&nbsp;bản&nbsp;th&acirc;n&nbsp;v&agrave;&nbsp;gia&nbsp;đ&igrave;nh,&nbsp;mong&nbsp;muốn&nbsp;sự&nbsp;b&igrave;nh&nbsp;an,&nbsp;may&nbsp;mắn,&nbsp;hạnh&nbsp;ph&uacute;c.&nbsp;Trong&nbsp;từng&nbsp;c&acirc;u&nbsp;chữ,&nbsp;người&nbsp;ch&eacute;p&nbsp;gửi&nbsp;gắm&nbsp;những&nbsp;lời&nbsp;nguyện&nbsp;cầu&nbsp;ch&acirc;n&nbsp;th&agrave;nh&nbsp;nhất,&nbsp;hy&nbsp;vọng&nbsp;v&agrave;o&nbsp;sự&nbsp;che&nbsp;chở&nbsp;của&nbsp;Đức&nbsp;Qu&aacute;n&nbsp;Thế&nbsp;&Acirc;m&nbsp;Bồ&nbsp;T&aacute;t.</span></p>
                                        <p style="margin-left: 0px; margin-top: 0px; margin-bottom: 0px;">
                                            &nbsp;</p>
                                        <p style="margin-left: 0px; margin-top: 0px; margin-bottom: 0px;">
                                            <span style="font-size:16px;">+&nbsp;NHỮNG&nbsp;LƯU&nbsp;&Yacute;&nbsp;KHI&nbsp;CH&Eacute;P&nbsp;CH&Uacute;&nbsp;ĐẠI&nbsp;BI</span></p>
                                        <p style="margin-left: 0px; margin-top: 0px; margin-bottom: 0px;">
                                            <span style="font-size:16px;">Ch&eacute;p&nbsp;Ch&uacute;&nbsp;Đại&nbsp;Bi&nbsp;l&agrave;&nbsp;một&nbsp;h&agrave;nh&nbsp;động&nbsp;tu&nbsp;tập&nbsp;&yacute;&nbsp;nghĩa,&nbsp;đ&ograve;i&nbsp;hỏi&nbsp;sự&nbsp;th&agrave;nh&nbsp;t&acirc;m&nbsp;v&agrave;&nbsp;tu&acirc;n&nbsp;thủ&nbsp;một&nbsp;số&nbsp;lưu&nbsp;&yacute;&nbsp;để&nbsp;bảo&nbsp;đảm&nbsp;sự&nbsp;trang&nbsp;nghi&ecirc;m&nbsp;th&agrave;nh&nbsp;k&iacute;nh.</span></p>
                                        <p style="margin-left: 0px; margin-top: 0px; margin-bottom: 0px;">
                                            <span style="font-size:16px;">Tinh&nbsp;Thần&nbsp;Th&agrave;nh&nbsp;K&iacute;nh:&nbsp;Trước&nbsp;khi&nbsp;bắt&nbsp;đầu&nbsp;ch&eacute;p&nbsp;Ch&uacute;&nbsp;Đại&nbsp;Bi,&nbsp;người&nbsp;thực&nbsp;h&agrave;nh&nbsp;cần&nbsp;giữ&nbsp;một&nbsp;t&acirc;m&nbsp;thế&nbsp;thanh&nbsp;tịnh,&nbsp;tĩnh&nbsp;t&acirc;m&nbsp;v&agrave;&nbsp;tập&nbsp;trung.</span></p>
                                        <p style="margin-left: 0px; margin-top: 0px; margin-bottom: 0px;">
                                            <span style="font-size:16px;">Chọn&nbsp;Nơi&nbsp;Ch&eacute;p&nbsp;Kinh:&nbsp;N&ecirc;n&nbsp;chọn&nbsp;một&nbsp;nơi&nbsp;y&ecirc;n&nbsp;tĩnh,&nbsp;sạch&nbsp;sẽ,&nbsp;tho&aacute;ng&nbsp;đ&atilde;ng&nbsp;để&nbsp;ch&eacute;p&nbsp;kinh.&nbsp;C&oacute;&nbsp;thể&nbsp;đốt&nbsp;một&nbsp;ch&uacute;t&nbsp;hương&nbsp;trầm&nbsp;để&nbsp;kh&ocirc;ng&nbsp;gian&nbsp;th&ecirc;m&nbsp;phần&nbsp;thanh&nbsp;tịnh.</span></p>
                                        <p style="margin-left: 0px; margin-top: 0px; margin-bottom: 0px;">
                                            <span style="font-size:16px;">Chuẩn&nbsp;Bị&nbsp;Đầy&nbsp;Đủ&nbsp;Dụng&nbsp;Cụ:&nbsp;Trước&nbsp;khi&nbsp;ch&eacute;p,&nbsp;h&atilde;y&nbsp;chuẩn&nbsp;bị&nbsp;đầy&nbsp;đủ&nbsp;c&aacute;c&nbsp;dụng&nbsp;cụ&nbsp;cần&nbsp;thiết&nbsp;như&nbsp;b&uacute;t,&nbsp;tẩy,&nbsp;v&agrave;&nbsp;nếu&nbsp;c&oacute;&nbsp;thể,&nbsp;h&atilde;y&nbsp;chọn&nbsp;những&nbsp;loại&nbsp;b&uacute;t&nbsp;tốt,&nbsp;kh&ocirc;ng&nbsp;bị&nbsp;lem&nbsp;mực.</span></p>
                                        <p style="margin-left: 0px; margin-top: 0px; margin-bottom: 0px;">
                                            <span style="font-size:16px;">Giữ&nbsp;Vệ&nbsp;Sinh&nbsp;C&aacute;&nbsp;Nh&acirc;n:&nbsp;Trước&nbsp;khi&nbsp;ch&eacute;p&nbsp;Ch&uacute;&nbsp;Đại&nbsp;Bi,&nbsp;n&ecirc;n&nbsp;tắm&nbsp;rửa&nbsp;sạch&nbsp;sẽ,&nbsp;mặc&nbsp;quần&nbsp;&aacute;o&nbsp;chỉnh&nbsp;tề,&nbsp;tr&aacute;nh&nbsp;ăn&nbsp;uống&nbsp;những&nbsp;thực&nbsp;phẩm&nbsp;nặng&nbsp;m&ugrave;i&nbsp;hoặc&nbsp;kh&ocirc;ng&nbsp;thanh&nbsp;khiết.</span></p>
                                        <p style="margin-left: 0px; margin-top: 0px; margin-bottom: 0px;">
                                            <span style="font-size:16px;">Kh&ocirc;ng&nbsp;Ngắt&nbsp;Qu&acirc;ng:&nbsp;Cố&nbsp;gắng&nbsp;ho&agrave;n&nbsp;th&agrave;nh&nbsp;một&nbsp;biến&nbsp;Ch&uacute;&nbsp;Đại&nbsp;Bi&nbsp;m&agrave;&nbsp;kh&ocirc;ng&nbsp;bị&nbsp;gi&aacute;n&nbsp;đoạn.&nbsp;Tr&aacute;nh&nbsp;để&nbsp;kinh&nbsp;văn&nbsp;dỡ&nbsp;dang&nbsp;qu&aacute;&nbsp;l&acirc;u,&nbsp;v&igrave;&nbsp;điều&nbsp;n&agrave;y&nbsp;c&oacute;&nbsp;thể&nbsp;l&agrave;m&nbsp;mất&nbsp;đi&nbsp;sự&nbsp;li&ecirc;n&nbsp;tục&nbsp;v&agrave;&nbsp;tập&nbsp;trung&nbsp;trong&nbsp;việc&nbsp;thực&nbsp;h&agrave;nh.</span></p>
                                        <p style="margin-left: 0px; margin-top: 0px; margin-bottom: 0px;">
                                            <span style="font-size:16px;">Ch&uacute;&nbsp;&Yacute;&nbsp;Đến&nbsp;Từng&nbsp;Chữ:&nbsp;Khi&nbsp;ch&eacute;p&nbsp;kinh,&nbsp;n&ecirc;n&nbsp;viết&nbsp;từng&nbsp;chữ&nbsp;một&nbsp;c&aacute;ch&nbsp;cẩn&nbsp;thận,&nbsp;r&otilde;&nbsp;r&agrave;ng,&nbsp;kh&ocirc;ng&nbsp;viết&nbsp;vội&nbsp;v&agrave;ng&nbsp;hay&nbsp;thiếu&nbsp;ch&uacute;&nbsp;t&acirc;m.&nbsp;Mỗi&nbsp;chữ&nbsp;n&ecirc;n&nbsp;được&nbsp;ch&eacute;p&nbsp;ra&nbsp;với&nbsp;t&acirc;m&nbsp;nguyện&nbsp;v&agrave;&nbsp;l&ograve;ng&nbsp;th&agrave;nh&nbsp;k&iacute;nh&nbsp;s&acirc;u&nbsp;sắc.</span></p>
                                        <p style="margin-left: 0px; margin-top: 0px; margin-bottom: 0px;">
                                            <span style="font-size:16px;">Bảo&nbsp;Quản&nbsp;Kinh&nbsp;Văn:&nbsp;Sau&nbsp;khi&nbsp;ch&eacute;p&nbsp;xong,&nbsp;n&ecirc;n&nbsp;bảo&nbsp;quản&nbsp;bản&nbsp;kinh&nbsp;ch&eacute;p&nbsp;một&nbsp;c&aacute;ch&nbsp;cẩn&nbsp;thận,&nbsp;tr&aacute;nh&nbsp;để&nbsp;nơi&nbsp;ẩm&nbsp;ướt,&nbsp;bẩn&nbsp;thỉu</span></p>
                                        <p style="margin-left: 0px; margin-top: 0px; margin-bottom: 0px;">
                                            &nbsp;</p>
                                        <p style="margin-left: 0px; margin-top: 0px; margin-bottom: 0px;">
                                            &nbsp;</p>
                                    </article>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="clear"></div>

                </div>
            </div>

        </div>
    </div>
</div>
<script src="{{ asset('Content/Home/js/jquery_genner.js')}}"></script>


<div class="ma-block-link-follow">
    <div class="block-link-follow hidden-xs">
        <div class="container">
            <div class="container-inner">
                <div class="row">
                    <div class="f-col f-col-2 col-sm-8 col-md-12 col-sms-12">
                        <div class="block-subscribe" style="text-align: center;">
                            <div style="display: inline-block;">
                                <div class="subscribe-title">
                                    <em class="fa fa-envelope-o fa-inverse" style="font-size:20px;">&nbsp;</em>
                                    <h3>Newsletter</h3>
                                    <label for="newsletter">Đăng ký nhận bản tin</label>
                                </div>
                                <form action="https://www.nhasachminhthang.vn/newsletter/subscriber/new/" method="post" id="newsletter-validate-detail">
                                    <div class="subscribe-content">
                                        <div class="actions" style="display: block !important">
                                            <button type="submit" title="Đăng ký" class="button"><span>Đăng ký</span></button>
                                        </div>
                                        <div class="input-box">
                                            <input type="text" name="email" id="newsletter" title="Đăng ký nhận bản tin" class="input-text required-entry validate-email" placeholder="Nhập địa chỉ email của bạn" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <script type="text/javascript">
                                //<![CDATA[
                                var newsletterSubscriberFormDetail = new VarienForm('newsletter-validate-detail');
                                //]]>

                            </script>
                        </div>

                    </div>
                    <div class="f-col f-col-1 col-sm-4 col-md-4 col-sms-12">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('web-script')
    <script>
        function addToCart(productId, quantity, btn) {
            $.ajax({
                type: "POST",
                url: "{{ route('cart.add') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    productId: productId,
                    quantity: quantity,
                }
            }).done(function(res) {
                const data = res.data.original;
                if (data.success) {
                    notiSuccess(data.success, 'center');
                    getTotalProductInCart();
                } else if (data.error) {
                    notiError(data.error);
                }
            }).fail(function(xhr) {
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
            }).always(function() {
                btn.prop('disabled', false);
            })
        }

       
        
        $(document).ready(function() {
            // Add to cart
            $(document).on('click', '.addToCart', function() {
                $(this).prop('disabled', true);
                const productId = $(this).data('product-id');
                addToCart(productId, 1, $(this));
                searchProductMenu();
            });
        })
    </script>
@endsection
