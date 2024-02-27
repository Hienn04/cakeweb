<div class="col-lg-8">
    @foreach($data as $item)

    <div class="blog__item">
        <div class="blog__item__pic" style="background-image: url('{{ Storage::url($item->image) }}');width:700px">
            <div class="blog__pic__inner">
                <ul>
                    <li>By <span>{{ $item->userCreated }}</span></li>
                    <li>{{ $item->created_at->format('d-m-Y') }}</li>
                </ul>
            </div>
        </div>
        <div class="blog__item__text">
            <h2>{{ $item->title }}</h2>
            <a href="{{ route('website.post.details',$item->id) }}">Đọc thêm</a>
        </div>
    </div>
   
   
  
  @endforeach      
</div>
<style>
   
    .spad{
        padding-top: 50px !important;
        padding-bottom: 50px !important;
    }
    .blog__item__pic .blog__pic__inner {
   
        padding: 10px 0 0 !important;
        bottom: -10px !important;
        left: -25px !important;
    }
</style>

<div class="row no-gutters my-5">
    <div class="col text-center">
        <div class="block-27">
            {{ $data->links('website.post.pagingPost') }}
        </div>
    </div>
</div>
