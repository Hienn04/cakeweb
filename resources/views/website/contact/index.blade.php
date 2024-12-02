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
                                    <input name="name" type="text" class="form-control" placeholder="Tên của bạn"
                                >
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input name="email" type="email" class="form-control" placeholder="Email"
                                    >
                                </div>
                                <div class="col-lg-12 form-group">
                                    <textarea name="message" placeholder="Lời nhắn"></textarea>
                                    <button id="btnSubmitContact" type="submit" class="site-btn py-3 px-5">Gửi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        
        </div>
    </section>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;900&display=swap');

        input {
            caret-color: red;
        }

        .main-contact {
            margin: 0;
            width: 100vw;
            height: 100vh;
            background: #ecf0f3;
            display: flex;
            align-items: center;
            text-align: center;
            justify-content: center;
            place-items: center;
            overflow: hidden;
            font-family: poppins;
        }

        .container-contact {
            position: relative;
            width: 350px;
            height: 500px;
            border-radius: 20px;
            padding: 40px;
            box-sizing: border-box;
            background: #ecf0f3;
            box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
        }

        .brand-logo {
            height: 100px;
            width: 100px;
            background: url("https://img.icons8.com/color/100/000000/twitter--v2.png");
            margin: auto;
            border-radius: 50%;
            box-sizing: border-box;
            box-shadow: 7px 7px 10px #cbced1, -7px -7px 10px white;
        }

        .brand-title {
            margin-top: 10px;
            font-weight: 900;
            font-size: 1.8rem;
            color: #1DA1F2;
            letter-spacing: 1px;
        }

        .inputs {
            text-align: left;
            margin-top: 30px;
        }

        .common
         {
            display: block;
            width: 100%;
            padding: 0;
            border: none;
            outline: none;
            box-sizing: border-box;
        }

        label {
            margin-bottom: 4px;
        }

        label:nth-of-type(2) {
            margin-top: 12px;
        }

        input::placeholder {
            color: gray;
        }

        input {
            background: #ecf0f3;
            padding: 10px;
            padding-left: 20px;
            height: 50px;
            font-size: 14px;
            border-radius: 50px;
            box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white;
        }

        button {
            color: white;
            margin-top: 20px;
            background: #1DA1F2;
            height: 40px;
            border-radius: 20px;
            cursor: pointer;
            font-weight: 900;
            box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white;
            transition: 0.5s;
        }

        button:hover {
            box-shadow: none;
        }

        .a-contact {
            position: absolute;
            font-size: 8px;
            bottom: 4px;
            right: 4px;
            text-decoration: none;
            color: black;
            background: yellow;
            border-radius: 10px;
            padding: 2px;
        }

        h1 {
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>
    {{-- <div class="main-contact">
        <div class="container-contact">
            <div class="brand-logo"></div>
            <div class="brand-title">Liên Hệ Với Chúng Tôi</div>
            <div class="inputs">
                <label>EMAIL</label>
                <input class="input-contact" type="email" placeholder="example@test.com" />
                <label class="common">PASSWORD</label>
                <input class="common" type="password" placeholder="Min 6 charaters long" />
                <button class="common" type="submit">LOGIN</button>
            </div>
        </div>
    </div> --}}
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
                        notiSuccess('Cảm ơn bạn đã phản hồi.', 'center');
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
