function cartSubmit() {
    let hoten = $jq('#cart_hoten');
    let sdt = $jq('#cart_sdt');
    let email = $jq('#cart_sdt_email');
    let add = $jq('#cart_address');
    let note = $jq('#cart_note');

    if (hoten.val().trim() == "") {
        hoten.addClass('checked-error');
        hoten.focus();
    }
    else {
        if (sdt.val().trim() == "") {
            hoten.removeClass('checked-error');
            sdt.addClass('checked-error');
            sdt.focus();
        }
        else {
            if (email.val().trim() == "" || !validMail(email.val())) {
                hoten.removeClass('checked-error');
                sdt.removeClass('checked-error');
                email.addClass('checked-error');
                email.focus();
            }
            else {
                if (add.val().trim() == "") {
                    hoten.removeClass('checked-error');
                    sdt.removeClass('checked-error');
                    email.removeClass('checked-error');
                    add.addClass('checked-error');
                    add.focus();
                }
                else {
                    hoten.removeClass('checked-error');
                    sdt.removeClass('checked-error');
                    email.removeClass('checked-error');
                    add.removeClass('checked-error');
                    postCart(hoten.val().trim(), sdt.val().trim(), email.val().trim(), add.val(), note.val());
                }
            }
        }
    }
}
function postCart(hoten, sdt, email, add, note) {
    $jq.ajax({
        url: "/Product/CarSubmit",
        method: 'post',
        dataType: "json",
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: { hoten: hoten, sdt: sdt, email: email, add: add, note: note },
        success: function (data) {
            if (data.mess == '0') {
                window.open("https://nhasachminhthang.vn");
            }
            else {
                showTitleSubmitCart(data.order);
            }
            
        }
    });
}
function validMail(mail) {
    return /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()\.,;\s@\"]+\.{0,1})+([^<>()\.,;:\s@\"]{2,}|[\d\.]+))$/.test(mail);
}