@extends('website.layouts.app')
@section('content')
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__text">
                    <h2>Bài viết</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__links">
                    <a href="./index.html">Trang chủ</a>
                    <span>Bài viết</span>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div id="post_list">
                    
            </div>
           
            {{-- <div class="col-lg-4">
                <div class="blog__sidebar">
                   
                    <div class="blog__sidebar__item">
                        <h5>Bài viết mới nhất</h5>

                        <div class="blog__sidebar__recent">
                            <a href="#" class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__pic">
                                    <img src="img/blog/br-1.jpg" alt="">
                                </div>
                                <div class="blog__sidebar__recent__item__text">
                                    <h4>Secret To Cooking Vegetables</h4>
                                    <span>13 Nov 2020</span>
                                </div>
                            </a>
                            
                            
                        </div>
                    </div>
                   
                   
                </div>
            </div> --}}
        </div>
    </div>
</section>
@endsection

@section('web-script')
    <script>
        /**
         * Load cagtegory list
         */
        function searchPostWeb(page = 1, searhName = '') {
            $.ajax({
                url: '<?= route('website.post.search') ?>?page=' + page,
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    searchName: searhName,
                    paginate: 3,
                    status: 1
                },
            }).done(function(data) {
                console.log(data);
                $('#post_list').html(data);
            }).fail(function() {
                notiError();
            });
        }
        $(document).ready(function() {
            searchPostWeb();

            // event enter keyword search
            $('#txtSearchPostWeb').keyup(debounce(function(e) {
                let search = e.currentTarget.value ?? '';
                if (search != '') {
                    searchPostWeb(1, search);
                } else {
                    searchPostWeb();
                }
            }, 500));

        })
    </script>
@endsection
