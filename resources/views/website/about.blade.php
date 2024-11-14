@extends('website.layouts.app')
@section('content')
 <!-- Breadcrumb Begin -->
 <div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__text">
                    <h2>Về chúng tôi</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__links">
                    <a href="./index.html">Trang chủ</a>
                    <span>Về chúng tôi</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- About Section Begin -->
<section class="about spad">
    <div class="container">
       
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="about__text">
                    <div class="section-title">
                        <span>Giới thiệu về cửa hàng bánh</span>
                        <h2>Tinh hoa từ người thợ làm bánh</h2>
                    </div>
                    <p>Tiệm bánh ngọt là nơi tuyệt vời cho những người yêu thưởng thức hương vị ngọt ngào và tinh tế. Được thiết kế với không gian ấm cúng và tràn ngập mùi thơm của bánh nướng, tiệm bánh trở thành điểm đến lý tưởng cho những buổi gặp gỡ, hẹn hò hay đơn giản là để thư giãn.</p>
                    <p>Tại tiệm bánh ngọt, bạn sẽ bắt gặp một loạt các loại bánh đa dạng, từ những chiếc bánh cupcake nhỏ xinh, đến những chiếc bánh tart tinh tế hay những chiếc bánh bông lan mềm mại. Mỗi chiếc bánh đều được làm thủ công với tình yêu và sự tận tâm, tạo nên những tác phẩm nghệ thuật ẩm thực độc đáo.</p>  
                    <p>Không chỉ là nơi để thưởng thức đồ ngọt, tiệm bánh còn là không gian để tận hưởng những giây phút thư giãn và chia sẻ cùng bạn bè, gia đình. Nhân viên tận tâm và nhiệt đồng luôn sẵn lòng hỗ trợ bạn chọn lựa những chiếc bánh phù hợp với sở thích và dịp lễ của bạn.</p>
                    <p>Hãy để tiệm bánh ngọt trở thành điểm đến yêu thích, nơi bạn có thể thưởng thức không chỉ hương vị ngon lành mà còn là không gian tràn ngập niềm vui và hạnh phúc.</p>
                
                    </div>
            </div>
           
        </div>
    </div>
<style>
    .section-title h2 {
        font-style:normal !important;
    
    }
    p{
        text-align: justify !important;
    }
    
</style>
</section>
<!-- About Section End -->

<!-- Testimonial Section Begin -->
<section class="testimonial spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    
                    <h2>Những bí mật nhỏ của tiệm </h2>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- <div class="testimonial__slider owl-carousel"> --}}
                <div class="col-lg-6">
                    <div class="testimonial__item">
                        <div class="testimonial__author">
                            {{-- <div class="testimonial__author__pic">
                                <img src="img/testimonial/ta-1.jpg" alt="">
                            </div> --}}
                            <div class="testimonial__author__text">
                                <h5>Tầm nhìn</h5>
                                <span>Cake</span>
                            </div>
                        </div>
                       
                        <p>Trở thành thương hiệu hàng đầu về cung cấp bánh tươi chất lượng cao tại Việt Nam</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="testimonial__item">
                        <div class="testimonial__author">
                            {{-- <div class="testimonial__author__pic">
                                <img src="img/testimonial/ta-2.jpg" alt="">
                            </div> --}}
                            <div class="testimonial__author__text">
                                <h5>Sứ mệnh</h5>
                                <span>Cake</span>
                            </div>
                        </div>
                        
                        <p>Mang đến các sản phẩm bánh tươi chất lượng, dịch vụ khách hàng vượt trội và văn hóa Bakery riêng biệt.​</p>
                    </div>
                </div>
                
               
                
            {{-- </div> --}}
        </div>
    </div>
</section>
<!-- Testimonial Section End -->
@endsection