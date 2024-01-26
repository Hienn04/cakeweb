@extends('website.layouts.app')
@section('content')
<section class="contact spad">
    <div class="container">
        
        <div class="contact__address">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="contact__address__item">
                        <h6>Tiệm bánh xin chào ở thành Vinh</h6>
                        <ul>
                            <li>
                                <span class="icon_pin_alt"></span>
                                <p>tiembanhxinchao@gmail.com</p>
                            </li>
                            <li><span class="icon_headphones"></span>
                                <p>0349327216</p>
                            </li>
                            <li><span class="icon_mail_alt"></span>
                                <p>tiembanhxinchao@gmail.com</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="contact__text">
                    <h3>Liên hệ với chúng tôi</h3>
                    <ul>
                        <li>Thời gian mở cửa hàng của tụi mình:</li>
                        <li>Tất cả các ngày trong tuần</li>
                        <li>Thứ 2 - Chủ nhật: 8:00 đến 21:00 nhia</li>
                    </ul>
                    <img src="img/cake-piece.png" alt="">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="contact__form">
                    <form id="form_contact">
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <input name="name" type="text" class="form-control" placeholder="Your Name"
                            >
                            </div>
                            <div class="col-lg-6 form-group">
                                <input name="email" type="email" class="form-control" placeholder="Your Email"
                                >
                            </div>
                            <div class="col-lg-12 form-group">
                                <textarea name="message" placeholder="Message"></textarea>
                                <button id="btnSubmitContact" type="submit" class="site-btn py-3 px-5">Gửi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="map">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-4 col-md-7">
                        <div class="map__inner">
                            <h6>COlorado</h6>
                            <ul>
                                <li>1000 Lakepoint Dr, Frisco, CO 80443, USA</li>
                                <li>Sweetcake@support.com</li>
                                <li>+1 800-786-1000</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="map__iframe">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d10784.188505644011!2d19.053119335158936!3d47.48899529453826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1543907528304" height="300" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</section>
@endsection
@section('web-script')
    <script>
        $(document).ready(function() {
            $('#btnSubmitContact').on('click', function(e) {
                e.preventDefault();
                let formData = new FormData($('form#form_contact')[0]);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('contact.create') }}",
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                }).done(function(data) {
                    if (data == 'ok') {
                        notiSuccess('Cảm ơn bạn đã phản hồi.','center');
                        $('form#form_contact')[0].reset();
                    }
                }).fail(function(xhr) {
                    if (xhr.status === 400 && xhr.responseJSON.errors) {
                        const errorMessages = xhr.responseJSON.errors;
                        for (let fieldName in errorMessages) {
                            notiError(errorMessages[fieldName][0]);
                        }
                    } else {
                        notiError();
                    }
                })
            })
        })
    </script>
@endsection
