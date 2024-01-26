@foreach($data as $item)
<div class="blog__item">
    <div class="blog__item__pic ">
        <img src="{{ Storage::url($item->image) }}" alt="">
        <div class="blog__pic__inner">
            
            <ul>
                <li>{{ $item->created_at }}</li>
            </ul>
        </div>
    </div>
    <div class="blog__item__text">
        <h2>{{ $item->title }}</h2>
        <p>{{ $item->content }}</p>
    </div>
</div>
@endforeach


<div class="row no-gutters my-5">
    <div class="col text-center">
        <div class="block-27">
            {{ $data->links('website.post.pagingPost') }}
        </div>
    </div>
</div>
