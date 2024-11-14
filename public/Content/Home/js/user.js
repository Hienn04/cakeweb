function loginSubmit() {
    let poe = $jq('#login_username');
    let pass = $jq('#login_password');

    if (poe.val().trim() == "" || !validMail(poe.val().trim())) {
        poe.addClass('checked-error');
        jq('.fhs-dwl-msg').html("Email không đúng!");
        poe.focus();
    }
    else {
        if (pass.val().trim() == "") {
            poe.removeClass('checked-error');
            pass.addClass('checked-error');
            pass.focus();
        }
        else {
            poe.removeClass('checked-error');
            pass.removeClass('checked-error');
            postLogin(poe.val().trim(), pass.val().trim());
        }
    }
}
function postLogin(poe, pass) {
    $jq.ajax({
        url: "/User/LoginSubmit",
        method: 'post',
        dataType: "json",
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: { poe: poe, pass: pass },
        success: function (data) {
            if (data.mess == '0') {
                window.open("https://nhasachminhthang.vn", "_parent");
            }
            else {
                $jq('.fhs-dwl-msg').html(data.mess);
            }

        }
    });
}

function registerSubmit() {
    let hoten = $jq('#reg_hoten');
    let phone = $jq('#reg_phone');
    let email = $jq('#reg_email');
    let add = $jq('#reg_add');
    let pass = $jq('#reg_pass');


    if (hoten.val().trim() == "") {
        hoten.addClass('checked-error');
        hoten.focus();
    }
    else {
        if (phone.val().trim() == "") {
            hoten.removeClass('checked-error');
            phone.addClass('checked-error');
            phone.focus();
        }
        else {
            if (email.val().trim() == "" || !validMail(email.val().trim())) {
                hoten.removeClass('checked-error');
                phone.removeClass('checked-error');
                email.addClass('checked-error');
                email.focus();
            }
            else {
                if (add.val().trim() == "") {
                    hoten.removeClass('checked-error');
                    phone.removeClass('checked-error');
                    email.removeClass('checked-error');
                    add.addClass('checked-error');
                    add.focus();
                }
                else {
                    if (pass.val().trim() == "") {
                        hoten.removeClass('checked-error');
                        phone.removeClass('checked-error');
                        email.removeClass('checked-error');
                        add.removeClass('checked-error');
                        pass.addClass('checked-error');
                        pass.focus();
                    }
                    else {
                        hoten.removeClass('checked-error');
                        phone.removeClass('checked-error');
                        email.removeClass('checked-error');
                        add.removeClass('checked-error');
                        pass.removeClass('checked-error');
                        postRegister(hoten.val().trim(), phone.val().trim(), email.val().trim(), add.val().trim(), pass.val().trim());
                    }
                }
            }
        }
    }
}
function postRegister(hoten, phone, email, add, pass) {
    $jq.ajax({
        url: "/User/RegisterSubmit",
        method: 'post',
        dataType: "json",
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: { hoten: hoten, phone: phone, email: email, add: add, pass: pass },
        success: function (data) {
            if (data.mess != '1') {
                $jq('.fhs-dwl-msg').html(data.mess);
            }
            else {
                showTitleReg();
            }

        }
    });
}
function validMail(mail) {
    return /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()\.,;\s@\"]+\.{0,1})+([^<>()\.,;:\s@\"]{2,}|[\d\.]+))$/.test(mail);
}

function showTitleReg() {
    var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    var style_wrapper = "border-radius:5px; height:200px; filter: alpha(opacity=80); background-color:black; opacity:0.8; display:flex; flex-direction:column;align-items:center; z-index:999999;";
    if (screenWidth <= 900 && screenWidth >= 600) {
        style_wrapper += "width:414px !important; justify-content:flex-start; margin-left: -" + screenWidth / 3 + "px;";
    } else if (screenWidth < 600) {
        style_wrapper += "width:280px !important; justify-content:flex-start;";
    } else if (screenWidth > 900) {
        style_wrapper += "width:414px !important; justify-content:center;";
    }

    var style_textNoti = "font-family:" + 'Nunito Sans' + "; font-weight:bold; color:white; text-align:center; z-index:999999999;";
    if (screenWidth < 600) {
        style_textNoti += "font-size:14px;";
    } else {
        style_textNoti += "font-size:18px;";
    }
    var style_wrapper1 = "position: fixed;top:0;left:0;filter: alpha(opacity=70); z-index:99999;background-color:transparent; width:100%;height:100%;opacity:1";
    var str = '<div id ="wraper_ajax" style ="' + style_wrapper1 + '" >';
    str += "<div style='" + style_wrapper + "' class ='wrapper_box'>";
    str += "<div><img src='/Content/Home/imgs/add_to_cart_success_image_v2.png' style='width:100px; height:100px;'/></div>";
    str += "<br/>";
    str += "<div><p style='" + style_textNoti + "'>Đăng ký thành viên thành công.</p></div></div></div>";
    if ($jq('#wraper_ajax').length == 0) {
        $jq('body').append(str);
    }
    setTimeout(function () {
        $jq('#wraper_ajax,.wrapper_box').remove();
        window.open("https://nhasachminhthang.vn", "_parent");
    }, 2000);


}

function infoSubmit() {
    let hoten = $jq('#user_hoten');
    let phone = $jq('#user_phone');
    let email = $jq('#user_email');
    let add = $jq('#user_add');
    let gener = $jq('#user_Gener');


    if (hoten.val().trim() == "") {
        hoten.addClass('checked-error');
        hoten.focus();
    }
    else {
        if (phone.val().trim() == "") {
            hoten.removeClass('checked-error');
            phone.addClass('checked-error');
            phone.focus();
        }
        else {
            if (add.val().trim() == "") {
                hoten.removeClass('checked-error');
                phone.removeClass('checked-error');
                add.addClass('checked-error');
                add.focus();
            }
            else {
                hoten.removeClass('checked-error');
                phone.removeClass('checked-error');
                add.removeClass('checked-error');
                postInfo(hoten.val().trim(), phone.val().trim(), email.val().trim(), add.val().trim(), gener.val());
            }
        }
    }
}
function postInfo(hoten, phone, email, add, gener) {
    $jq.ajax({
        url: "/User/infoSubmit",
        method: 'post',
        dataType: "json",
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: { hoten: hoten, phone: phone, email: email, add: add, gener: gener },
        success: function (data) {
            if (data.mess != '1') {
                $jq('.fhs-dwl-msg').html(data.mess);
            }
            else {
                showTitleUpdateInfo();
            }

        }
    });
}
function showTitleUpdateInfo() {
    var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    var style_wrapper = "border-radius:5px; height:200px; filter: alpha(opacity=80); background-color:black; opacity:0.8; display:flex; flex-direction:column;align-items:center; z-index:999999;";
    if (screenWidth <= 900 && screenWidth >= 600) {
        style_wrapper += "width:414px !important; justify-content:flex-start; margin-left: -" + screenWidth / 3 + "px;";
    } else if (screenWidth < 600) {
        style_wrapper += "width:280px !important; justify-content:flex-start;";
    } else if (screenWidth > 900) {
        style_wrapper += "width:414px !important; justify-content:center;";
    }

    var style_textNoti = "font-family:" + 'Nunito Sans' + "; font-weight:bold; color:white; text-align:center; z-index:999999999;";
    if (screenWidth < 600) {
        style_textNoti += "font-size:14px;";
    } else {
        style_textNoti += "font-size:18px;";
    }
    var style_wrapper1 = "position: fixed;top:0;left:0;filter: alpha(opacity=70); z-index:99999;background-color:transparent; width:100%;height:100%;opacity:1";
    var str = '<div id ="wraper_ajax" style ="' + style_wrapper1 + '" >';
    str += "<div style='" + style_wrapper + "' class ='wrapper_box'>";
    str += "<div><img src='/Content/Home/imgs/add_to_cart_success_image_v2.png' style='width:100px; height:100px;'/></div>";
    str += "<br/>";
    str += "<div><p style='" + style_textNoti + "'>Thay đổi thông tin thành công.</p></div></div></div>";
    if ($jq('#wraper_ajax').length == 0) {
        $jq('body').append(str);
    }
    setTimeout(function () {
        $jq('#wraper_ajax,.wrapper_box').remove();
    }, 2000);


}


function passSubmit() {
    let user_passcu = $jq('#user_passcu');
    let user_passmoi = $jq('#user_passmoi');
    let user_passmoilai = $jq('#user_passmoilai');

    if (user_passcu.val().trim() == "") {
        user_passcu.addClass('checked-error');
        user_passcu.focus();
    }
    else {
        if (user_passmoi.val().trim() == "") {
            user_passcu.removeClass('checked-error');
            user_passmoi.addClass('checked-error');
            user_passmoi.focus();
        }
        else {
            if (user_passmoilai.val().trim() == "") {
                user_passcu.removeClass('checked-error');
                user_passmoi.removeClass('checked-error');
                user_passmoilai.addClass('checked-error');
                user_passmoilai.focus();
            }
            else {
                user_passcu.removeClass('checked-error');
                user_passmoi.removeClass('checked-error');
                user_passmoilai.removeClass('checked-error');
                postPass(user_passcu.val().trim(), user_passmoi.val().trim(), user_passmoilai.val().trim());
            }
        }
    }
}
function postPass(user_passcu, user_passmoi, user_passmoilai) {
    $jq.ajax({
        url: "/User/passSubmit",
        method: 'post',
        dataType: "json",
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: { user_passcu: user_passcu, user_passmoi: user_passmoi, user_passmoilai: user_passmoilai },
        success: function (data) {
            if (data.mess != '1') {
                $jq('.fhs-dwl-msg').html(data.mess);
            }
            else {
                $jq('.fhs-dwl-msg').html("");
                showTitleUpdatePass();
            }

        }
    });
}
function showTitleUpdatePass() {
    var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    var style_wrapper = "border-radius:5px; height:200px; filter: alpha(opacity=80); background-color:black; opacity:0.8; display:flex; flex-direction:column;align-items:center; z-index:999999;";
    if (screenWidth <= 900 && screenWidth >= 600) {
        style_wrapper += "width:414px !important; justify-content:flex-start; margin-left: -" + screenWidth / 3 + "px;";
    } else if (screenWidth < 600) {
        style_wrapper += "width:280px !important; justify-content:flex-start;";
    } else if (screenWidth > 900) {
        style_wrapper += "width:414px !important; justify-content:center;";
    }

    var style_textNoti = "font-family:" + 'Nunito Sans' + "; font-weight:bold; color:white; text-align:center; z-index:999999999;";
    if (screenWidth < 600) {
        style_textNoti += "font-size:14px;";
    } else {
        style_textNoti += "font-size:18px;";
    }
    var style_wrapper1 = "position: fixed;top:0;left:0;filter: alpha(opacity=70); z-index:99999;background-color:transparent; width:100%;height:100%;opacity:1";
    var str = '<div id ="wraper_ajax" style ="' + style_wrapper1 + '" >';
    str += "<div style='" + style_wrapper + "' class ='wrapper_box'>";
    str += "<div><img src='/Content/Home/imgs/add_to_cart_success_image_v2.png' style='width:100px; height:100px;'/></div>";
    str += "<br/>";
    str += "<div><p style='" + style_textNoti + "'>Thay đổi mật khẩu thành công.</p></div></div></div>";
    if ($jq('#wraper_ajax').length == 0) {
        $jq('body').append(str);
    }
    setTimeout(function () {
        $jq('#wraper_ajax,.wrapper_box').remove();
    }, 2000);


}