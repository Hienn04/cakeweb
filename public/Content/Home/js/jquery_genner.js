//kiem tra browser cho dung cookie khong
function checkBrowserEnableCookie() {
    var cookieEnabled = (navigator.cookieEnabled) ? true : false
    //if not IE4+ nor NS6+
    if (typeof navigator.cookieEnabled == "undefined" && !cookieEnabled) {
        document.cookie = "testcookie"
        cookieEnabled = (document.cookie.indexOf("testcookie") != -1) ? true : false
    }

    if (cookieEnabled) return true;
    else return false;

}

//tao cookie
function createCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    }
    else var expires = "";
    document.cookie = name + "=" + value + expires + "; path=/";
}

//doc cookie
function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return "";
}

//xoa bo cookie
function eraseCookie(name) {
    createCookie(name, "", -1);
}

function countShoppingCart(name) {
    if (readCookie(name) == "") {
        $jq('.cartmini_qty').text("");
    } else {
        var current_cart = readCookie(name);
        var ca = current_cart.split(',');
        number_product = ca.length - 1;
        if (number_product > 0) {
            $jq('.cartmini_qty').text(number_product + "");
            //hien thi
            var element = document.getElementById('carqty_number');
            element.style.removeProperty("visibility");
        }
    }
}

function emptyShoppingCart(name) {
    createCookie(name, '-', 1);
}

function addToCartTo(productId) {
    var objsoluong = $jq('.qty').val();
    objsoluong = parseInt(objsoluong);
    addToCartRedirect(productId, objsoluong, 1);
}
function addToCartTo1(productId) {
    var objsoluong = $jq('.qty').val();
    addToCartRedirect(productId, objsoluong, 2);
}

function addToCartRedirect(productId, quantity, type) {

    if (readCookie('nhasachminhthang_shopping_cart_new') == null) {
        createCookie('nhasachminhthang_shopping_cart_new', '', 1);
    }
    var current_cart = readCookie('nhasachminhthang_shopping_cart_new');

    if (current_cart.search(',' + productId + '-') == -1) {
        var new_cart = current_cart + ',' + productId + '-' + quantity;
        createCookie('nhasachminhthang_shopping_cart_new', new_cart, 1);
        /* countShoppingCart('nhasachminhthang_shopping_cart_new');*/
        //thong bao them thanh cong vao gio hang
        if (type == 1)
            showTitleAddCart();
        else
            window.location = "/gio-hang.html";

    } else {
        if (type == 1)
            showTitleAddCart();
        else
            window.location = "/gio-hang.html";
    }
}


function alertItemInCart(productId, flag) {
    if (flag == true) {
        document.write('Đã thêm vào giỏ hàng');
    }
    else {
        var current_cart = readCookie('nhasachminhthang_shopping_cart_new');
        if (current_cart.search(',' + productId + '-') != -1)
            document.write('Đang trong giỏ hàng');
    }
}
function checkItemInCart(productId) {
    var current_cart = readCookie('nhasachminhthang_shopping_cart_new');
    if (current_cart.search(',' + productId + '-') != -1) {
        alert('Đang trong giỏ hàng');
    }
}

//Xoa
function deleteFromListCart(productId, quantity) {
    /* if (confirm('Bạn muốn xóa sản phẩm này khỏi giỏ hàng ? ')) {*/
    var current_cart = readCookie('nhasachminhthang_shopping_cart_new');
    new_cart = current_cart.replace("," + productId + '-' + quantity, "");
    new_cart = new_cart.replace("," + productId + '-', "0");
    createCookie('nhasachminhthang_shopping_cart_new', new_cart, 1);
    /*countShoppingCart('nhasachminhthang_shopping_cart_new');*/
    window.location.href = '/gio-hang.html';
    /*}*/
}
function updateFromListCart(productId, quantity, newquantity) {

    var current_cart = readCookie('nhasachminhthang_shopping_cart_new');
    new_cart = current_cart.replace("," + productId + '-' + quantity, "," + productId + '-' + newquantity);
    //new_cart = new_cart.replace("," + productId + '-', "0");
    createCookie('nhasachminhthang_shopping_cart_new', new_cart, 1);
    //set value
    window.location.href = '/gio-hang.html';
}

function showTitleAddCart() {
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
    str += "<div><p style='" + style_textNoti + "'>Sản phẩm đã được thêm vào giỏ hàng.</p></div></div></div>";
    if ($jq('#wraper_ajax').length == 0) {
        $jq('body').append(str);
    }
    setTimeout(function () {
        $jq('#wraper_ajax,.wrapper_box').remove();

    }, 2000);
    countShoppingCart("nhasachminhthang_shopping_cart_new");

}
function showTitleSubmitCart(id) {
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
    str += "<div><p style='" + style_textNoti + "'>Bạn đã đặt hàng thành công.</p></div></div></div>";
    if ($jq('#wraper_ajax').length == 0) {
        $jq('body').append(str);
    }
    setTimeout(function () {
        $jq('#wraper_ajax,.wrapper_box').remove();
        window.open("https://nhasachminhthang.vn/dat-hang-thanh-cong-" + id + ".html", "_parent");
    }, 2000);


}

$jq('.qty').change(function (e) {
    let qty = $jq(this).val();
    let maxValue = parseInt($jq(this).attr('maxValue'));
    if (!fhs_account.isEmpty(qty)) {
        if (parseInt(qty) > maxValue) {
            $jq('.qty').val(maxValue);
        } else {
            $jq('.qty').val(qty);
        }
    } else {
        $jq('.qty').val(1);
    }
});

function subtractQty() {
    let qty = parseInt($jq('.qty').val());
    if (qty > 1) {
        $jq('.qty').val(qty - 1);
    } else {
        $jq('.qty').val(1);
    }
}

function addQty() {
    let qty = parseInt($jq('.qty').val());
    let maxValue = parseInt($jq('.qty').attr('maxValue'));
    if (qty < maxValue) {
        $jq('.qty').val(qty + 1);
    } else {
        $jq('.qty').val(maxValue);
    }
}

function validateNumber(evt) {
    var theEvent = evt || window.event;

    // Handle paste
    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    } else {
        // Handle key press
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    var regex = /[0-9]|\./;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}

function validateQty() {
    if (fhs_account.isEmpty($jq('.qty').val())) {
        $jq('.qty').val(1);
    } else {
        let qty = parseInt($jq('.qty').val());
        let maxValue = parseInt($jq('.qty').attr('maxValue'));
        if (qty < 1) {
            $jq('.qty').val(1);
        } else if (qty > maxValue) {
            $jq('.qty').val(maxValue);
        }
    }
}

function subtractQty2(id) {
    let qty = parseInt($jq('#qty-' + id).val());
    if (qty > 1) {
        $jq('#qty-' + id).val(qty - 1);
    } else {
        $jq('#qty-' + id).val(1);
    }
    updateFromListCart(id, qty, parseInt($jq('#qty-' + id).val()));
}

function addQty2(id) {
    let qty = parseInt($jq('#qty-' + id).val());
    let maxValue = parseInt($jq('#qty-' + id).attr('maxValue'));
    if (qty < maxValue) {
        $jq('#qty-' + id).val(qty + 1);
    } else {
        $jq('#qty-' + id).val(maxValue);
    }
    updateFromListCart(id, qty, parseInt($jq('#qty-' + id).val()));
}
function validateQty2(id, oldcount) {
    if (fhs_account.isEmpty($jq('#qty-' + id).val())) {
        $jq('#qty-' + id).val(1);
    } else {
        let qty = parseInt($jq('#qty-' + id).val());
        let maxValue = parseInt($jq('#qty-' + id).attr('maxValue'));
        if (qty < 1) {
            $jq('#qty-' + id).val(1);
        } else if (qty > maxValue) {
            $jq('#qty-' + id).val(maxValue);
        }
        updateFromListCart(id, oldcount, parseInt($jq('#qty-' + id).val()));
    }
   

}