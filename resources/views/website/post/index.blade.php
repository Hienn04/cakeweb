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
                    <a href="{{ url('/') }}">Trang chủ</a>
                    <span>Bài viết</span>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div id="post_list"></div>
        </div>
    </div>
</section>
@endsection

@section('web-script')
<script>
    /**
     * Load category list
     */
    function searchPostWeb(page = 1, searchName = '') {
        $.ajax({
            url: "{{ route('website.post.search') }}?page=" + page,
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                searchName: searchName,
                paginate: 3,
                status: 1
            },
        }).done(function(data) {
            console.log(data);
            $('#post_list').html(data);
        }).fail(function() {
            console.error("Lỗi khi tải dữ liệu");
            alert("Đã xảy ra lỗi. Vui lòng thử lại.");
        });
    }

    $(document).ready(function() {
        // Load initial posts
        searchPostWeb();

        // Event for entering search keyword
        $('#txtSearchPostWeb').keyup(debounce(function(e) {
            let search = e.currentTarget.value ?? '';
            searchPostWeb(1, search);
        }, 500));
    });

    // Debounce function to limit the rate of search requests
    function debounce(func, wait) {
        let timeout;
        return function(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
</script>
@endsection
