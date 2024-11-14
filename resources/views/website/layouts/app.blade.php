<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi">

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>BookShop</title>
    <meta name="description" content="BookShop" />
    <meta name="keywords" content="BookShop" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" href="#" type="image/x-icon" />
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/lightbox.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('Content/Home/css/6b518d0a2927d06bbd89168cba544c44.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('Content/Home/css/5722a920567ae30e71034727845e9254.css')}}" media="print" />




    <script type="text/javascript" src="{{ asset('Content/Home/js/account.js') }}"></script>
    <script type="text/javascript">
        var fhs_account = new FhsAccount();
        var is_in_search_form = false;

    </script>
    <link rel="stylesheet" type="text/css" href="{{ asset('Content/Home/css/default.css')}}" media="all" />

    <link rel="stylesheet" type="text/css" href="{{ asset('Content/Home/css/header.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('Content/Home/css/select2.min.css')}}" media="all" />

    <script type="text/javascript" src="{{ asset('Content/Home/js/4d6839960373e1ce1ebc32503daa0a70.js') }}" async=""></script>

    <script type="text/javascript" src="{{ asset('Content/Home/js/d6db0954d143dc57b2642148e3b75a11.js') }}"></script>
    <script type="text/javascript" src="{{ asset('Content/Home/js/select2.min.js') }}"></script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>

    <style type="text/css">
        .cms-horizontal-slider {
            background-color: #fff;
            margin: 20px 0px 0px 0px;
        }

        .cms-horizontal-slider .swiper-container {
            padding: 15px 20px
        }

    </style>
    <style>
        .block-vote .top-voted-header .cat-item.active {
            color: #C92127 !important;
            border: none !important;
            border-bottom: 2px solid #C92127 !important;
            border-radius: 0px !important;
        }

        .title-vote {
            visibility: hidden;
            position: relative;
        }

        .title-vote:after {
            visibility: visible;
            position: absolute;
            top: 0;
            left: 0;
            content: "Bảng xếp hạng bán chạy tuần"
        }

        #icon_menu_container,
        .cms_icon_menu_item_row {
            display: block;
        }

    </style>

</head>

<body>


    @include('website.layouts.header')

    @yield('content')
    <!-- Map End -->

    @include('website.layouts.footer')



    <!-- Js Plugins -->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('js/jquery.barfiller.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    @yield('web-script')

</body>

</html>
