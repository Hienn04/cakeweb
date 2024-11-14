const FhsAccount = function () {
    let ACCOUNT_INFO = "/customer/account/edit/";
    let LOGIN_ACCOUNT_URL = "/ajaxlogin/ajax/index/";

    let CHECK_PHONE_OTP_ACCOUNT_URL = "/ajaxlogin/ajax/checkPhoneOTP";
    let CHECK_EMAIL_OTP_ACCOUNT_URL = "/ajaxlogin/ajax/checkEmailOTP";

    let SEND_PHONE_OTP_ACCOUNT_URL = "/ajaxlogin/ajax/checkPhone";
    let REGISTER_ACCOUNT_URL = "/ajaxlogin/ajax/registerAccount";
    let REGISTERQUICK_ACCOUNT_URL = "/ajaxlogin/ajax/registerAccountQuick";
    let ORDER_HISTORY_URL = "/sales/order/view/order_id/";

    let SEND_RECOVERY_PASSWORD_URL = "/ajaxlogin/ajax/checkRecoveryPassword";
    let RECOVERY_ACCOUNT_URL = "/ajaxlogin/ajax/recoveryAccount";

    let SEND_CHANGE_PHONE_URL = "/customer/account/checkChangePhone";
    let CHANGE_PHONE_ACCOUNT_URL = "/customer/account/changePhoneAccount";

    let SEND_CHANGE_EMAIL_URL = "/customer/account/checkChangeEmail";
    let CHANGE_EMAIL_ACCOUNT_URL = "/customer/account/changeEmailAccount";

    let LOGIN_FB_ACCOUNT_URL = "/ajaxlogin/ajax/loginfb/";
    let SEND_CONFIRM_PHONE_URL = "/ajaxlogin/ajax/checkPhoneConfirm";
    let REGISTER_FB_ACCOUNT_URL = "/ajaxlogin/ajax/registerFaccbookAccount";

    let ACCOUNT_ME = "";
    let UPDATE_MYINFO = "";

    var languages = {};
    let is_loading = false;
    let is_redirect = '';
    let redirect_url = '';
    let sent_phone_otp = false;
    let phone = '';
    let phone_otp = '';

    let username = '';
    let password = '';

    let is_recovery_opening = false;
    let sent_username_recovery_otp = false;
    let username_recovery = '';
    let username_recovery_otp = '';

    let sent_phone_change_otp = false;
    let phone_change = '';
    let phone_change_otp = '';

    let sent_email_change_otp = false;
    let email_change = '';
    let email_change_otp = '';

    let is_login_facebook = false;
    let sent_phone_confirm_otp = false;
    let phone_confirm = '';
    let phone_confirm_otp = '';
    let accessToken = '';
    let facebookId = '';

    let orderId = '';
    let registerquick_sent_otp = false;
    let registerquick_phone = '';
    let registerquick_otp = '';

    let minLength = 6;

    let isShowLoginform = false;
    let coupon_bg_path = "M 110 144 h -98 a 12 12 0 0 1 -12 -12 v {{H}} a 12 12 0 0 1 12 -12 H 110 a 12.02 12 0 0 0 24 0 H {{W}} a 12 12 0 0 1 12 12 V 132 a 12 12 0 0 1 -12 12 H 134 v 0 a 12 12 0 0 0 -24 0 v 0 Z";
    let coupon_bg_mini_path = "M 98 144 h -86 a 12 12 0 0 1 -12 -12 v {{H}} a 12 12 0 0 1 12 -12 H 98 a 8 8 0 0 0 16 0 H {{W}} a 12 12 0 0 1 12 12 V 132 a 12 12 0 0 1 -12 12 H 114 v 0 a 8 8 0 0 0 -16 0 v 0 Z";
    let tooltip_bg_path = "M 0 0 a 8 8 0 0 1 -8 -8 v -{{H0}} a 8 8 0 0 1 8 -8 h {{W}} a 8 8 0 0 1 8 8 v {{H1}} l 5 4 l -5 4 v {{H2}} a 8 8 0 0 1 -8 8 Z";

    let category_menu_data = {};
    let is_loading_block = false;
    let block_ids = {};

    let add_to_cart_data = {};

    let myInfo = null;
    let getMyInfoFailed = true;

    var $this = this;
    //Login-Register-Recovery---------------------------------
    this.initAccount = function (_is_redirect, _redirect_url, _languages, _minLength) {
        $this.is_redirect = _is_redirect;
        $this.redirect_url = _redirect_url;
        $this.languages = _languages;
        $this.is_recovery_opening = false;
        $this.isShowLoginform = false;
        $this.minLength = _minLength;

        $this.phone = '';
        $this.phone_otp = '';
        $this.sent_phone_otp = false;

        $this.username_recovery = '';
        $this.username_recovery_otp = '';
        $this.sent_username_recovery_otp = false;

        $this.is_login_facebook = false;
        $this.sent_phone_confirm_otp = false;
        $this.phone_confirm = '';
        $this.phone_confirm_otp = '';
        $this.accessToken = '';

        $this.username = 'thefirst';

        $this.openCloseWindowEvents();
        $this.eventButtonClick();
        $this.eventInputPress();
        $this.scrollEvent();

        $this.is_loading_block = false;
        $this.block_ids = {};

        $jq(window).ready(function () {
            $this.sizeTooltipBg();
        });

        $this.add_to_cart_data = {};
        $this.myInfo = null;

        $this.getMyInfo();
    };

    this.postLogin = function (username, password) {
        if (is_loading) { return; }
        is_loading = true;
        $this.animateLoader('start');
        $jq('.fhs-login-msg').text('');
        $jq('#login_password').prop("type", "password");
        $jq.ajax({
            url: LOGIN_ACCOUNT_URL,
            method: 'post',
            dataType: "html",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: { ajax: 'login', email: username, password: password },
            error: function () {
                is_loading = false;
                $this.animateLoader('stop');
            },
            success: function (msg) {
                //		if(msg != 'success'){
                //		    $jq('.fhs-login-msg').text($this.languages['wrong']);
                //		}else{
                //		    $this.savePassword(username, password);
                //		    // Redirect
                //		    if ($this.is_redirect == '1') {
                //			window.location = $this.redirect_url;
                //		    } else {
                //			window.location.reload();
                //		    }
                //		    $this.closeLoginPopup();
                //		}
                //		is_loading = false;
                //		$this.animateLoader('stop');
                if (msg != 'success') {
                    $jq('.fhs-login-msg').text($this.languages['wrong']);
                } else {
                    $this.savePassword(username, password);
                    $this.onTriggerTracking('set_login', { type: 'fahasa' });
                    // Redirect
                    $this.addToCart();

                    $this.closeLoginPopup();
                }
                is_loading = false;
                $this.animateLoader('stop');
            }
        });
    };

    this.postSendPhoneOTP = function (phone) {
        if (is_loading) { return; }
        is_loading = true;
        $this.animateLoader('start');
        $jq('.fhs-register-msg').text('');
        $jq.ajax({
            url: SEND_PHONE_OTP_ACCOUNT_URL,
            method: 'post',
            dataType: "json",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: { phone: phone },
            error: function () {
                is_loading = false;
                $this.animateLoader('stop');
            },
            success: function (data) {
                let $phone = $jq('#register_phone');
                let $input_box = $phone.parents('.fhs-input-box');
                let alert_message = $input_box.children('.fhs-input-alert');

                $input_box.removeClass('checked-error');
                $input_box.removeClass('checked-pass');

                let $phone_otp = $jq('#register_phone_otp');
                $phone_otp.removeClass('checked-error');
                $phone_otp.removeClass('checked-pass');
                if (!$this.sent_phone_otp) {
                    $phone_otp.val('');
                    $phone_otp.attr('disabled', 'disabled');
                }

                let $password = $jq('#register_password');
                $password.val('');
                $password.attr('disabled', 'disabled');
                $password.removeClass('checked-error');
                $password.removeClass('checked-pass');

                alert_message.text('');
                $this.phone = '';
                if (!data['success']) {
                    $input_box.addClass('checked-error');
                    alert_message.text(data['message']);
                } else {
                    $this.phone = phone;
                    $input_box.addClass('checked-pass');
                    alert_message.text(data['message']);
                    $this.sent_phone_otp = true;
                    $phone_otp.removeAttr('disabled');
                    $phone_otp.focus();
                }
                is_loading = false;
                $this.animateLoader('stop');
            }
        });
    };
    this.postCheckPhoneOTP = function (otp) {
        if (is_loading) { return; }
        is_loading = true;
        $this.animateLoader('start');
        $jq.ajax({
            url: CHECK_PHONE_OTP_ACCOUNT_URL,
            method: 'post',
            dataType: "json",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: { phone: $this.phone, otp: otp },
            error: function () {
                is_loading = false;
                $this.animateLoader('stop');
            },
            success: function (data) {
                let $phone_otp = $jq('#register_phone_otp');
                let $input_box = $phone_otp.parents('.fhs-input-box');
                let alert_message = $input_box.children('.fhs-input-alert');
                $input_box.removeClass('checked-error');
                $input_box.removeClass('checked-pass');

                let $password = $jq('#register_password');
                $password.val('');
                $password.attr('disabled', 'disabled');
                $password.removeClass('checked-error');
                $password.removeClass('checked-pass');

                alert_message.text('');
                $this.phone_otp = '';

                if (!data['success']) {
                    $input_box.addClass('checked-error');
                    alert_message.text(data['message']);
                } else {
                    alert_message.text(data['message']);
                    $this.phone_otp = otp;
                    let $phone = $jq('#register_phone');
                    $phone.val($this.phone);
                    $phone.attr('disabled', 'disabled');
                    $phone_otp.attr('disabled', 'disabled');
                    $input_box.addClass('checked-pass');

                    $password.removeAttr('disabled');
                    $password.focus();
                }
                is_loading = false;
                $this.animateLoader('stop');
            }
        });
    };
    this.postRegister = function (password) {
        if (is_loading) { return; }
        is_loading = true;
        $this.animateLoader('start');
        $jq.ajax({
            url: REGISTER_ACCOUNT_URL,
            method: 'post',
            dataType: "json",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: { username: $this.phone, otp: $this.phone_otp, password: password },
            error: function () {
                is_loading = false;
                $this.animateLoader('stop');
                $jq('.fhs-register-msg').text($this.languages['tryagain']);
            },
            success: function (data) {
                let $phone_otp = $jq('#register_phone_otp');
                let $input_box = $phone_otp.parents('.fhs-input-box');
                let alert_message = $input_box.children('.fhs-input-alert');
                $input_box.removeClass('checked-error');
                $input_box.removeClass('checked-pass');
                alert_message.text('');
                $this.phone_otp = '';
                if (!data['success']) {
                    $jq('.fhs-register-msg').text(data['message']);
                } else {
                    $this.savePassword($this.phone, password);
                    $this.onTriggerTracking('set_register', { type: 'fahasa' });
                    // Redirect
                    $this.addToCart(true);

                    //window.location = ACCOUNT_INFO;
                    $this.closeLoginPopup();
                }
                is_loading = false;
                $this.animateLoader('stop');
            }
        });
    };

    this.postSendRecoveryPhoneOTP = function (username) {
        if (is_loading) { return; }
        is_loading = true;
        $this.animateLoader('start');
        $jq('.fhs-register-msg').text('');
        $jq.ajax({
            url: SEND_RECOVERY_PASSWORD_URL,
            method: 'post',
            dataType: "json",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: { username: username },
            error: function () {
                is_loading = false;
                $this.animateLoader('stop');
            },
            success: function (data) {
                let $phone = $jq('#recovery_phone');
                let $input_box = $phone.parents('.fhs-input-box');
                let alert_message = $input_box.children('.fhs-input-alert');

                $input_box.removeClass('checked-error');
                $input_box.removeClass('checked-pass');

                let $phone_otp = $jq('#recovery_phone_otp');
                $phone_otp.removeClass('checked-error');
                $phone_otp.removeClass('checked-pass');
                if (!$this.sent_username_recovery_otp) {
                    $phone_otp.val('');
                    $phone_otp.attr('disabled', 'disabled');
                }

                let $password = $jq('#recovery_password');
                $password.val('');
                $password.attr('disabled', 'disabled');
                $password.removeClass('checked-error');
                $password.removeClass('checked-pass');

                alert_message.text('');
                $this.username_recovery = '';
                if (!data['success']) {
                    $input_box.addClass('checked-error');
                    alert_message.text(data['message']);
                } else {
                    $this.username_recovery = username;
                    $input_box.addClass('checked-pass');
                    alert_message.text(data['message']);
                    $this.sent_username_recovery_otp = true;
                    $phone_otp.removeAttr('disabled');
                    $phone_otp.focus();
                }
                is_loading = false;
                $this.animateLoader('stop');
            }
        });
    };
    this.postCheckRecoveryPhoneOTP = function (otp) {
        if (is_loading) { return; }
        is_loading = true;
        $this.animateLoader('start');
        if (!$jq.isNumeric($this.username_recovery)) {
            $jq.ajax({
                url: CHECK_EMAIL_OTP_ACCOUNT_URL,
                method: 'post',
                dataType: "json",
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: { email: $this.username_recovery, otp: otp },
                error: function () {
                    is_loading = false;
                    $this.animateLoader('stop');
                },
                success: function (data) {
                    let $phone_otp = $jq('#recovery_phone_otp');
                    let $input_box = $phone_otp.parents('.fhs-input-box');
                    let alert_message = $input_box.children('.fhs-input-alert');
                    $input_box.removeClass('checked-error');
                    $input_box.removeClass('checked-pass');

                    let $password = $jq('#recovery_password');
                    $password.val('');
                    $password.attr('disabled', 'disabled');
                    $password.removeClass('checked-error');
                    $password.removeClass('checked-pass');

                    alert_message.text('');
                    $this.username_recovery_otp = '';

                    if (!data['success']) {
                        $input_box.addClass('checked-error');
                        alert_message.text(data['message']);
                    } else {
                        alert_message.text(data['message']);
                        $this.username_recovery_otp = otp;

                        $phone_otp.attr('disabled', 'disabled');
                        $input_box.addClass('checked-pass');

                        $password.removeAttr('disabled');
                        $password.focus();
                    }
                    is_loading = false;
                    $this.animateLoader('stop');
                }
            });
        } else {
            $jq.ajax({
                url: CHECK_PHONE_OTP_ACCOUNT_URL,
                method: 'post',
                dataType: "json",
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: { phone: $this.username_recovery, otp: otp },
                error: function () {
                    is_loading = false;
                    $this.animateLoader('stop');
                },
                success: function (data) {
                    let $phone_otp = $jq('#recovery_phone_otp');
                    let $input_box = $phone_otp.parents('.fhs-input-box');
                    let alert_message = $input_box.children('.fhs-input-alert');
                    $input_box.removeClass('checked-error');
                    $input_box.removeClass('checked-pass');

                    let $password = $jq('#recovery_password');
                    $password.val('');
                    $password.attr('disabled', 'disabled');
                    $password.removeClass('checked-error');
                    $password.removeClass('checked-pass');

                    alert_message.text('');
                    $this.username_recovery_otp = '';

                    if (!data['success']) {
                        $input_box.addClass('checked-error');
                        alert_message.text(data['message']);
                    } else {
                        alert_message.text(data['message']);
                        $this.username_recovery_otp = otp;

                        let $phone = $jq('#recovery_phone');
                        $phone.val($this.username_recovery);
                        $phone.attr('disabled', 'disabled');
                        $phone_otp.attr('disabled', 'disabled');
                        $input_box.addClass('checked-pass');

                        $password.removeAttr('disabled');
                        $password.focus();
                    }
                    is_loading = false;
                    $this.animateLoader('stop');
                }
            });
        }
    };
    this.postRecovery = function (password) {
        if (is_loading) { return; }
        is_loading = true;
        $this.animateLoader('start');
        $jq.ajax({
            url: RECOVERY_ACCOUNT_URL,
            method: 'post',
            dataType: "json",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: { username: $this.username_recovery, otp: $this.username_recovery_otp, password: password },
            error: function () {
                is_loading = false;
                $this.animateLoader('stop');
                $jq('.fhs-recovery-msg').text($this.languages['tryagain']);
            },
            success: function (data) {
                let $phone_otp = $jq('#recovery_phone_otp');
                let $input_box = $phone_otp.parents('.fhs-input-box');
                let alert_message = $input_box.children('.fhs-input-alert');
                $input_box.removeClass('checked-error');
                $input_box.removeClass('checked-pass');
                alert_message.text('');
                $this.username_recovery_otp = '';
                if (!data['success']) {
                    $jq('.fhs-recovery-msg').text(data['message']);
                } else {
                    $this.savePassword($this.username_recovery, password);
                    // Redirect
                    if ($this.is_redirect == '1') {
                        window.location = $this.redirect_url;
                    } else {
                        window.location.reload();
                    }
                    $this.closeLoginPopup();
                }
                is_loading = false;
                $this.animateLoader('stop');
            }
        });
    };

    //events
    this.removeOriginalJsLocations = function () {
        $jq('a[href*="customer/account/login"], ' +
            '.customer-account-login .new-users button')
            .attr('onclick', 'return false;');
        $jq('a[href*="customer/account/create"], ' +
            '.customer-account-register .new-users button')
            .attr('onclick', 'return false;');

    };
    this.openCloseWindowEvents = function () {
        $jq('body').on('click', 'a[href*="customer/account/login"]', function () {
            if ($jq('.youama-login-window').css('display') == 'none') {
                $this.showLoginPopup('login');
            }
            return false;
        });
        $jq('body').on('click', 'a[href*="customer/account/create"]', function () {
            if ($jq('.youama-login-window').css('display') == 'none') {
                $this.showLoginPopup('register');
            }
            return false;
        });
        $jq('.youama-login-window .fhs-btn-cancel').click(function () {
            $this.closeLoginPopup();
        });
    };
    this.eventButtonClick = function () {
        $jq('.youama-ajaxlogin-cover').click(function () {
            if ($jq('.lg-close').is(":visible")) {
                $jq('.lg-close').each(function () {
                    if ($jq(this).is(":visible")) {
                        $jq(this).trigger("click");
                    }
                });
            }
        });
        $jq('.fhs_dropdown_hover').hover(
            function () {
                $this.showDropDown($jq(this));
                $this.showTopCover($jq(this));
            },
            function () {
                $this.hideTopCover($jq(this));
            }
        );
        $jq('.fhs_dropdown_hover_out').hover(
            function () { },
            function () {
                $this.hideTopCover($jq(this));
            });
        $jq('.fhs_dropdown').hover(
            function () {
                event.stopPropagation();
            },
            function () {
                event.stopPropagation();
            }
        );
        $jq('.fhs_dropdown').click(
            function () {
                event.stopPropagation();
            }
        );

        $jq('.fhs_dropdown_click').click(function () {
            if (!$jq(this).find('.fhs_dropdown').is(':visible')) {
                $this.showDropDown($jq(this));
                $this.showTopCover($jq(this));
            } else {
                $this.hideAllDropDown();
            }
            event.stopPropagation();
        });
        $jq('.fhs_popup_full_click').click(function () {
            $this.showPopupFull($jq(this));
            $this.showPopupFullCover($jq(this));
            event.stopPropagation();
        });
        $jq('.fhs_popup_full_click .close').click(function () {
            let $popup_parent = $jq(this).parents('.fhs_popup_full_click');
            $this.hidePopupFull($popup_parent);
            $this.hidePopupFullCover($popup_parent);
            event.stopPropagation();
        });
        $jq('.btn-account-login').click(function () {
            $this.showLoginPopup('login');
        });

        $jq('.btn-account-register').click(function () {
            $this.showLoginPopup('register');
        });
        $jq('.popup-login-tab-item').click(function () {
            let is_login_tab = $jq(this).hasClass('popup-login-tab-login');
            if (is_login_tab) {
                $this.tab_change('login');
            } else {
                $this.tab_change('register');
            }
        });
        $jq('.fhs-textbox-alert').click(function () {
            let $alert_icon = $jq(this);
            let $input_group = $alert_icon.parents('.fhs-input-group');
            let $input_box = $alert_icon.parents('.fhs-input-box');
            let $text_box = $input_group.children('.fhs-textbox');
            let $alert_msg = $input_box.children('.fhs-input-alert');
            if ($input_box.hasClass('checked-error')) {
                $alert_msg.empty();
                $text_box.val('');
                $input_box.removeClass('checked-error');
            }
            if ($input_group.hasClass('checked-error')) {
                $alert_msg.empty();
                $text_box.val('');
                $input_group.removeClass('checked-error');
            }
            $text_box.focus();
        });
        $jq('.fhs-textbox-showtext').click(function () {
            let $show = $jq(this);
            let $input_group = $show.parents('.fhs-input-group');
            let $text_box = $input_group.children('.fhs-textbox');
            if ($text_box.attr('type') != 'text') {
                $text_box.prop("type", "text");
                $show.text($this.languages['hide']);
            } else {
                $text_box.prop("type", "password");
                $show.text($this.languages['show']);
            }
            $text_box.focus();
        });
        $jq('.fhs-textbox-send').click(function () {
            $this.sentPhoneOTP();
        });
        if (!IS_MOBILE) {
            $input_noautofill = $jq("input[autocomplete='off']");
            $input_noautofill.attr('readonly', true);
            $input_noautofill.focusin(function () {
                $jq(this).removeAttr('readonly')
            });
            $input_noautofill.focusout(function () {
                $jq(this).attr('readonly', true);
            });
        }

        $jq('.fhs-btn-login').click(function () {
            $this.login();
        });
        $jq('.fhs-btn-fb').click(function () {
            $this.loginFB();
        });
        $jq('.fhs-forget-pass').click(function () {
            $this.is_recovery_opening = true;
            //$jq('.popup-login-tab').children('a').text($this.languages['recoverypassword']);
            $jq('#popup-login-tab_list').fadeOut(0);
            $jq('.popup-login-title').fadeIn(0);
            $jq('.popup-login-content').fadeOut(0);
            $jq('.popup-recovery-content').fadeIn(0);
            $jq('#recovery_phone').focus();
        });
        $jq('.fhs-btn-register').click(function () {
            $this.register();
        });

        $jq('.fhs-textbox-recoverysend').click(function () {
            $this.sentPhoneRecoveryOTP();
        });
        $jq('.fhs-btn-backlogin').click(function () {
            $this.is_recovery_opening = false;
            //$jq('.popup-login-tab').children('a').text($this.languages['login']);
            $jq('#popup-login-tab_list').fadeIn(0);
            $jq('.popup-login-title').fadeOut(0);
            $jq('.popup-recovery-content').fadeOut(0);
            $jq('.popup-login-content').fadeIn(0);
            $jq('#login_username').focus();
        });
        $jq('.fhs-btn-recovery').click(function () {
            $this.recovery();
        });

        $jq('.fhs-textbox-confirmsend').click(function () {
            $this.sentPhoneConfirmOTP();
        });
        $jq('.fhs-btn-confirmphone').click(function () {
            $this.registerFB();
        });
    };
    this.eventInputPress = function () {
        window.onkeyup = function (event) {
            if (event.keyCode == 27) {
                if ($jq('.lg-close').is(":visible")) {
                    $jq('.lg-close').each(function () {
                        if ($jq(this).is(":visible")) {
                            $jq(this).trigger("click");
                        }
                    });
                }
            }
            if (event.keyCode == 13) {
                if ($jq('.lg-yes').is(":visible")) {
                    $jq('.lg-yes').each(function () {
                        if ($jq(this).is(":visible")) {
                            $jq(this).trigger("click");
                        }
                    });
                }
            }
        };
        //login
        $jq('#login_username').keyup(function (e) {
            let is_pass = false;
            let username = $jq(this).val().trim();
            let password = $jq('#login_password').val().trim();

            if ($this.validateData('login_username', username) == '' && password.length >= $this.minLength) {
                is_pass = true;
            }

            $this.enableLoginButton(is_pass);

            let keycode = (e.keyCode ? e.keyCode : e.which);
            if (keycode == '13') {
                $this.login();
            }
        });
        $jq('#login_password').keyup(function (e) {
            let is_pass = false;

            let username = $jq('#login_username').val().trim();
            let password = $jq(this).val().trim();


            if ($this.validateData('login_username', username) == '' && password.length >= $this.minLength) {
                is_pass = true;
            }

            $this.enableLoginButton(is_pass);

            let keycode = (e.keyCode ? e.keyCode : e.which);
            if (keycode == '13') {
                $this.login();
            }
        });

        //register account
        $jq('#register_phone').keydown(function (e) {
            let key = '';
            let keyCode = 0;
            if (e.type === 'paste') {
                key = e.clipboardData.getData('text/plain');
            } else {
                keyCode = (e.keyCode ? e.keyCode : e.which);
                key = String.fromCharCode(keyCode);
            }

            if (!e.ctrlKey && !e.altKey) {
                if (!((keyCode >= 37) && (keyCode <= 40)) && (keyCode != 17) && !((keyCode >= 8) && (keyCode <= 9)) && !((keyCode >= 46) && (keyCode <= 47)) && (keyCode != 49) && (keyCode != 116)) {
                    if (!((keyCode >= 48 && keyCode <= 57) || (keyCode >= 96 && keyCode <= 105))) {
                        let regex = /[0-9]|\./;
                        if (!regex.test(key)) {
                            e.returnValue = false;
                            if (e.preventDefault) e.preventDefault();
                        }
                    }
                }
            }
        });
        $jq('#register_phone').keyup(function (e) {
            let is_pass = false;

            let phone = $jq(this).val().trim();
            let phone_otp = $jq('#register_phone_otp').val().trim();
            let password = $jq('#register_password').val().trim();

            if (phone.length >= 10 && phone_otp.length == 6 && password.length >= $this.minLength) {
                is_pass = true;
            }
            $this.enableRegisterButton(is_pass);

            let keycode = (e.keyCode ? e.keyCode : e.which);
            if (keycode == '13') {
                $this.sentPhoneOTP();
            }
        });
        $jq('#register_phone_otp').keyup(function (e) {
            let is_pass = false;

            let phone = $jq('#register_phone').val().trim();
            let phone_otp = $jq(this).val().trim();
            let password = $jq('#register_password').val().trim();

            if (phone.length >= 10 && phone_otp.length == 6 && password.length >= $this.minLength && $this.sent_phone_otp) {
                is_pass = true;
            }
            $this.enableRegisterButton(is_pass);

            if (!$this.validateData('register_phone_otp', phone_otp) && !$this.validateData('register_phone', phone) && $this.sent_phone_otp) {
                $this.postCheckPhoneOTP(phone_otp);
            }
        })
            .on('paste', function (e) {
                setTimeout(function () {
                    let is_pass = false;

                    let phone = $jq('#register_phone').val().trim();
                    let phone_otp = $jq('#register_phone_otp').val().trim();
                    let password = $jq('#register_password').val().trim();

                    if (phone.length >= 10 && phone_otp.length == 6 && password.length >= $this.minLength && $this.sent_phone_otp) {
                        is_pass = true;
                    }
                    $this.enableRegisterButton(is_pass);

                    if (!$this.validateData('register_phone_otp', phone_otp) && !$this.validateData('register_phone', phone) && $this.sent_phone_otp) {
                        $this.postCheckPhoneOTP(phone_otp);
                    }
                }, 100);
            });
        $jq('#register_password').keyup(function (e) {
            let is_pass = false;

            let phone = $jq('#register_phone').val().trim();
            let phone_otp = $jq('#register_phone_otp').val().trim();
            let password = $jq(this).val().trim();

            if (phone.length >= 10 && phone_otp.length == 6 && password.length >= $this.minLength) {
                is_pass = true;
            }
            $this.enableRegisterButton(is_pass);

            let keycode = (e.keyCode ? e.keyCode : e.which);
            if (keycode == '13') {
                $this.register();
            }
        });

        //recovery account
        $jq('#recovery_phone').keyup(function (e) {
            let is_pass = false;

            let phone = $jq(this).val().trim();
            let phone_otp = $jq('#recovery_phone_otp').val().trim();
            let password = $jq('#recovery_password').val().trim();

            if (!$this.validateData('login_username', phone) && password.length >= $this.minLength) {
                is_pass = true;
            }
            $this.enableRecoveryButton(is_pass);

            let keycode = (e.keyCode ? e.keyCode : e.which);
            if (keycode == '13') {
                $this.sentPhoneRecoveryOTP();
            }
        });
        $jq('#recovery_phone_otp').keyup(function (e) {
            let is_pass = false;

            let phone = $jq('#recovery_phone').val().trim();
            let phone_otp = $jq(this).val().trim();
            let password = $jq('#recovery_password').val().trim();

            if (!$this.validateData('login_username', phone) && password.length >= $this.minLength && $this.sent_username_recovery_otp) {
                is_pass = true;
            }
            $this.enableRecoveryButton(is_pass);

            if (!$this.validateData('recovery_phone_otp', phone_otp) && !$this.validateData('login_username', phone) && $this.sent_username_recovery_otp) {
                $this.postCheckRecoveryPhoneOTP(phone_otp);
            }
        })
            .on('paste', function (e) {
                setTimeout(function () {
                    let is_pass = false;

                    let phone = $jq('#recovery_phone').val().trim();
                    let phone_otp = $jq('#recovery_phone_otp').val().trim();
                    let password = $jq('#recovery_password').val().trim();

                    if (!$this.validateData('login_username', phone) && password.length >= $this.minLength && $this.sent_username_recovery_otp) {
                        is_pass = true;
                    }
                    $this.enableRecoveryButton(is_pass);

                    if (!$this.validateData('recovery_phone_otp', phone_otp) && !$this.validateData('login_username', phone) && $this.sent_username_recovery_otp) {
                        $this.postCheckRecoveryPhoneOTP(phone_otp);
                    }
                }, 100);
            });
        $jq('#recovery_password').keyup(function (e) {
            let is_pass = false;

            let phone = $jq('#recovery_phone').val().trim();
            let phone_otp = $jq('#recovery_phone_otp').val().trim();
            let password = $jq(this).val().trim();

            if (!$this.validateData('login_username', phone) && phone_otp.length == 6 && password.length >= $this.minLength) {
                is_pass = true;
            }
            $this.enableRecoveryButton(is_pass);

            let keycode = (e.keyCode ? e.keyCode : e.which);
            if (keycode == '13') {
                $this.recovery();
            }
        });


        //confirm Phone fb
        $jq('#confirm_phone').keydown(function (e) {
            let key = '';
            let keyCode = 0;
            if (e.type === 'paste') {
                key = e.clipboardData.getData('text/plain');
            } else {
                keyCode = (e.keyCode ? e.keyCode : e.which);
                key = String.fromCharCode(keyCode);
            }

            if (!e.ctrlKey && !e.altKey) {
                if (!((keyCode >= 37) && (keyCode <= 40)) && (keyCode != 17) && !((keyCode >= 8) && (keyCode <= 9)) && !((keyCode >= 46) && (keyCode <= 47)) && (keyCode != 49) && (keyCode != 116)) {
                    if (!((keyCode >= 48 && keyCode <= 57) || (keyCode >= 96 && keyCode <= 105))) {
                        let regex = /[0-9]|\./;
                        if (!regex.test(key)) {
                            e.returnValue = false;
                            if (e.preventDefault) e.preventDefault();
                        }
                    }
                }
            }
        });
        $jq('#confirm_phone').keyup(function (e) {
            let is_pass = false;

            let phone = $jq(this).val().trim();
            let phone_otp = $jq('#confirm_phone_otp').val().trim();

            if (phone.length >= 10 && phone_otp.length == 6) {
                is_pass = true;
            }
            $this.enableConfirmPhoneButton(is_pass);

            let keycode = (e.keyCode ? e.keyCode : e.which);
            if (keycode == '13') {
                $this.sentPhoneConfirmOTP();
            }
        });
        $jq('#confirm_phone_otp').keyup(function (e) {
            let is_pass = false;

            let phone = $jq('#confirm_phone').val().trim();
            let phone_otp = $jq(this).val().trim();

            if (phone.length >= 10 && phone_otp.length == 6 && $this.sent_phone_confirm_otp && ($this.phone_confirm_otp != '')) {
                is_pass = true;
            }
            $this.enableConfirmPhoneButton(is_pass);

            if (!$this.validateData('otp', phone_otp) && !$this.validateData('phone', phone) && $this.sent_phone_confirm_otp) {
                $this.postCheckConfirmPhoneOTP(phone_otp);
            }
        })
            .on('paste', function (e) {
                setTimeout(function () {
                    let is_pass = false;

                    let phone = $jq('#confirm_phone').val().trim();
                    let phone_otp = $jq('#confirm_phone_otp').val().trim();

                    if (phone.length >= 10 && phone_otp.length == 6 && $this.sent_phone_confirm_otp && ($this.phone_confirm_otp != '')) {
                        is_pass = true;
                    }
                    $this.enableConfirmPhoneButton(is_pass);

                    if (!$this.validateData('otp', phone_otp) && !$this.validateData('phone', phone) && $this.sent_phone_confirm_otp) {
                        $this.postCheckConfirmPhoneOTP(phone_otp);
                    }
                }, 100);
            });
    };
    this.scrollEvent = function () {
        $jq(window).on('resize scroll', function () {
            if ($jq('.fhs_dropdown_cover_over').is(':visible')) {
                if (Helper.isElementInViewport($jq('.fhs_dropdown_cover_over'))) {
                    $this.hideTopCover($jq('.fhs_dropdown_cover_over').parents('.fhs_dropdown_hover'));
                }
            }
        });
    };

    //dwl popup
    this.showDwlPopup = function (windowName) {
        if ($this.is_recovery_opening) {
            $this.is_recovery_opening = false;
            $jq('#popup-dwl-tab_list').fadeIn(0);
            $jq('.popup-dwl-title').fadeOut(0);
            $jq('.popup-recovery-content').fadeOut(0);
            $jq('.popup-dwl-content').fadeIn(0);
        }

        $jq('.youama-ajaxdwl-cover').fadeIn();
        if (!$this.isShowdwlform) {
            $jq('.youama-dwl-window').slideDown(500);
        } else {
            $jq('.youama-dwl-window').addClass('fhs_popup_show');
            $jq('.youama-dwl-window .fhs-btn-cancel').fadeIn(0);
            $jq('.youama-dwl-window').slideDown(500);
        }
        if (windowName != 'register') {
            $this.tab_change('dwl');
            $jq('#dwl_username').focus();
        } else {
            $this.tab_change('register');
            $jq('#register_phone').focus();
        }
    };
    this.closeDwlPopup = function () {
        if (!$this.isShowdwlform) {
            $jq('.youama-dwl-window').slideUp();
        } else {
            $jq('.youama-dwl-window .fhs-btn-cancel').fadeOut(0);
            $jq('.youama-dwl-window').removeClass('fhs_popup_show');
        }
        if ($this.is_dwl_facebook) {
            $jq('.youama-confirm-window').fadeIn();
            if ($this.isShowdwlform) {
                $jq('.youama-ajaxdwl-cover').fadeIn();
            }
        } else {
            $jq('.youama-ajaxdwl-cover').fadeOut();
        }
        $this.resetdwlPopup();
    };
    this.resetdwlPopup = function () {
        $jq('#dwl_hoten').val("");
        $jq('#dwl_sdt').val("");
        $jq('#dwl_sdt_email').val("");
        $jq('#dwl_address').val("");
        $jq('#dwl_code').val("");

        $jq('.fhs-input-box .fhs-textbox').removeClass('checked-error');

        //dwl tab
        $jq('.youama-dwl-window .fhs-dwl-msg').text('');

        $this.add_to_cart_data = {};
    };

    this.downloadCD = function () {
        let id = $jq('#downloadId').val();
        let hoten = $jq('#dwl_hoten');
        let sdt = $jq('#dwl_sdt');
        let email = $jq('#dwl_sdt_email');
        let add = $jq('#dwl_address');
        let code = $jq('#dwl_code');

        if (hoten.val().trim() == "") {
            hoten.addClass('checked-error');
        }
        else {
            if (sdt.val().trim() == "") {
                hoten.removeClass('checked-error');
                sdt.addClass('checked-error');
            }
            else {
                if (email.val().trim() == "") {
                    hoten.removeClass('checked-error');
                    sdt.removeClass('checked-error');
                    email.addClass('checked-error');
                }
                else {
                    if (add.val().trim() == "") {
                        hoten.removeClass('checked-error');
                        sdt.removeClass('checked-error');
                        email.removeClass('checked-error');
                        add.addClass('checked-error');
                    }
                    else {
                        if (code.val().trim() == "") {
                            hoten.removeClass('checked-error');
                            sdt.removeClass('checked-error');
                            email.removeClass('checked-error');
                            add.removeClass('checked-error');
                            code.addClass('checked-error');

                        }
                        else {
                            hoten.removeClass('checked-error');
                            sdt.removeClass('checked-error');
                            email.removeClass('checked-error');
                            add.removeClass('checked-error');
                            code.removeClass('checked-error');
                            $this.postDownload(id, hoten.val().trim(), sdt.val().trim(), email.val().trim(), add.val(), code.val());
                        }
                    }
                }
            }
        }
    };
    this.postDownload = function (id, hoten, sdt, email, add, code) {
        $jq.ajax({
            url: "/Product/DownloadCD",
            method: 'post',
            dataType: "json",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: { id: id, hoten: hoten, phone: sdt, email: email, add: add, code: code },
            success: function (data) {
                //add link down _blank
                if (data.mess == '1a' && data.url != '') {
                    $jq('.fhs-dwl-msg').html("");
                    $this.closeDwlPopup();
                    window.open(data.url, '_blank');
                }
                else {
                    $jq('.fhs-dwl-msg').html(data.mess);
                }
            }
        });
    };
    //operation
    this.showLoginPopup = function (windowName) {
        if ($this.is_recovery_opening) {
            $this.is_recovery_opening = false;
            $jq('#popup-login-tab_list').fadeIn(0);
            $jq('.popup-login-title').fadeOut(0);
            $jq('.popup-recovery-content').fadeOut(0);
            $jq('.popup-login-content').fadeIn(0);
        }

        $jq('.youama-ajaxlogin-cover').fadeIn();
        if (!$this.isShowLoginform) {
            $jq('.youama-login-window').slideDown(500);
        } else {
            $jq('.youama-login-window').addClass('fhs_popup_show');
            $jq('.youama-login-window .fhs-btn-cancel').fadeIn(0);
            $jq('.youama-login-window').slideDown(500);
        }
        if (windowName != 'register') {
            $this.tab_change('login');
            $jq('#login_username').focus();
        } else {
            $this.tab_change('register');
            $jq('#register_phone').focus();
        }
    };
    this.closeLoginPopup = function () {
        if (!$this.isShowLoginform) {
            $jq('.youama-login-window').slideUp();
        } else {
            $jq('.youama-login-window .fhs-btn-cancel').fadeOut(0);
            $jq('.youama-login-window').removeClass('fhs_popup_show');
        }
        if ($this.is_login_facebook) {
            $jq('.youama-confirm-window').fadeIn();
            if ($this.isShowLoginform) {
                $jq('.youama-ajaxlogin-cover').fadeIn();
            }
        } else {
            $jq('.youama-ajaxlogin-cover').fadeOut();
        }
        $this.resetLoginPopup();
    };
    this.resetLoginPopup = function () {
        $jq('.youama-login-window .fhs-input-box').removeClass('checked-error');
        $jq('.youama-login-window .fhs-input-box').removeClass('checked-pass');
        $jq('.youama-login-window .fhs-input-alert').text('');

        //login tab
        $jq('.youama-login-window .fhs-login-msg').text('');

        $this.add_to_cart_data = {};
    };

    this.tab_change = function (tab_name) {
        $jq('.popup-login-tab-item').removeClass('active');
        if (tab_name != 'register') {
            $jq('.popup-login-tab-login').addClass('active');
            $jq('.popup-register-content').fadeOut(0);
            if (!$this.is_recovery_opening) {
                $jq('.popup-recovery-content').fadeOut(0);
                $jq('.popup-login-content').fadeIn(0);
                $jq('#login_username').focus();
            } else {
                $jq('.popup-login-content').fadeOut(0);
                $jq('.popup-recovery-content').fadeIn(0);
                $jq('#recovery_phone').focus();
            }
        } else {
            $jq('.popup-login-tab-register').addClass('active');
            $jq('.popup-login-content').fadeOut(0);
            $jq('.popup-recovery-content').fadeOut(0);
            $jq('.popup-register-content').fadeIn(0);
            $jq('#register_phone').focus();
        }
    };
    this.enableLoginButton = function (is_enable) {
        if (is_enable) {
            $jq('.fhs-btn-login').removeAttr("disabled");
        } else {
            $jq('.fhs-btn-login').attr("disabled", "disabled");
        }
    };
    this.enableRegisterButton = function (is_enable) {
        if (is_enable) {
            $jq('.fhs-btn-register').removeAttr("disabled");
        } else {
            $jq('.fhs-btn-register').attr("disabled", "disabled");
        }
    };
    this.enableRecoveryButton = function (is_enable) {
        if (is_enable) {
            $jq('.fhs-btn-recovery').removeAttr("disabled");
        } else {
            $jq('.fhs-btn-recovery').attr("disabled", "disabled");
        }
    };

    this.validateTextbox = function (name, text, $element) {
        let result = false;
        let $input_box = $element.parents('.fhs-input-box');
        let $alert_message = $input_box.children('.fhs-input-alert');
        $input_box.removeClass('checked-error');
        $input_box.removeClass('checked-error-text');
        $input_box.removeClass('checked-pass');
        $input_box.removeClass('checked-warning');
        $input_box.removeClass('checked-msg');
        $alert_message.text('');
        let message = this.validateData(name, text);
        if (!$this.isEmpty(message)) {
            $input_box.addClass('checked-error');
            $alert_message.text(message);
        } else {
            result = true;
        }
        return result;
    };
    this.validateTextboxInGroup = function (name, text, $element) {
        let result = '';
        let $input_box = $element.parents('.fhs-input-box');
        let $input_group = $element.parents('.fhs-input-group');
        let $alert_message = $input_box.children('.fhs-input-alert');
        $alert_message.text('');
        $input_box.removeClass('checked-group-error');
        $input_group.removeClass('checked-error');
        let message = this.validateData(name, text);
        if (!$this.isEmpty(message)) {
            $input_group.addClass('checked-error');
            result = message;
        }
        return result;
    };
    this.validateTextboxGroup = function ($element) {
        let result = true;
        let $input_box = $element.parents('.fhs-input-box');
        let $textboxs = $input_box.find('.fhs-textbox');
        let $alert_message = $input_box.children('.fhs-input-alert');
        let message = '';
        $textboxs.each(function () {
            if ($jq(this).is(":visible")) {
                if ($jq(this).hasClass('require_group_check')) {
                    let vailidated = $this.validateTextboxInGroup($jq(this).attr('validate_type'), $jq(this).val().trim(), $jq(this));
                    if (!$this.isEmpty(vailidated)) {
                        if ($this.isEmpty(message)) {
                            message = vailidated;
                            result = false;
                        }
                    }
                }
            }
        });
        if (!$this.isEmpty(message)) {
            $input_box.addClass('checked-group-error');
            $alert_message.text(message);
        }
        return result;
    };
    this.removeAlert = function ($element) {
        let $input_box = $element.parents('.fhs-input-box');
        let $input_group = $input_box.find('.fhs-input-group');
        let alert_message = $input_box.children('.fhs-input-alert');
        $input_group.removeClass('checked-error');
        $input_box.removeClass('checked-error');
        $input_box.removeClass('checked-group-error');
        alert_message.text('');
    };
    this.validateData = function (name, text) {
        let result = "";
        switch (name) {
            case 'date':
                if (text.length < 1) {
                    result = $this.languages['notempty'];
                } else {
                    if (text.length != 10 || text == '0') {
                        result = $this.languages['dateinvalid'];
                    }
                }
                break;
            case 'text':
                if (text.length < 1) {
                    result = $this.languages['notempty'];
                } else {
                    if (text.length > 200) {
                        result = $this.languages['over200char'];
                    } else if (!this.validateContainsSpecialCharacters(text)) {
                        result = $this.languages['special_characters'];
                    }
                }
                break;
            case 'login_username':
                if (text.length < 1) {
                    result = $this.languages['notempty'];
                } else {
                    if (!this.validateEmail(text)) {
                        if ($jq.isNumeric(text)) {
                            if ((text.length < 10 || text.length >= 11)) {
                                result = $this.languages['phoneinvalid'];
                            }
                        } else {
                            result = $this.languages['emailinvalid'];
                        }
                    }
                }
                break;
            case 'email':
            case 'change_email':
                if (text.length < 1) {
                    result = $this.languages['notempty'];
                } else {
                    if (!this.validateEmail(text)) {
                        result = $this.languages['emailinvalid'];
                    }
                }
                break;
            case 'password':
            case 'recovery_password':
            case 'register_password':
            case 'login_password':
                if (text.length < 1) {
                    result = $this.languages['notempty'];
                } else {
                    if (text.length < $this.minLength) {
                        result = $this.languages['minLength'];
                    }
                    if (text.length > 30) {
                        result = $this.languages['30char'];
                    }
                }
                break;
            case 'phone':
            case 'change_phone':
            case 'recovery_phone':
            case 'register_phone':
                if (text.length < 1) {
                    result = $this.languages['notempty'];
                } else {
                    var regExp = /^0[0-9].*$/;
                    if ((text.length < 10 || text.length >= 11) || !regExp.test(text)) {
                        result = $this.languages['phoneinvalid'];
                    }
                }
                break;
            case 'shipping_telephone':
                if (text.length < 1) {
                    result = $this.languages['notempty'];
                } else {
                    var regExp = /^0[0-9].*$/;
                    if ((text.length <= 9 || text.length >= 11) || !regExp.test(text)) {
                        result = $this.languages['phoneinvalid10'];
                    }
                }
                break;
            case 'otp':
            case 'change_email_otp':
            case 'change_phone_otp':
            case 'recovery_phone_otp':
            case 'register_phone_otp':
                if (text.length < 1) {
                    result = $this.languages['notempty'];
                } else {
                    if (text.length != 6) {
                        result = $this.languages['otpinvalid'];
                    }
                }
                break;
            case 'fullname':
                if (text.length < 1) {
                    result = $this.languages['notempty'];
                } else {
                    if ((/^\S+$/g.test(text))) {
                        result = $this.languages['2word'];
                    }
                }
                break;
            case 'taxcode':
                if (text.length < 1) {
                    result = $this.languages['notempty'];
                } else {
                    if (text.length > 200) {
                        result = $this.languages['over200char'];
                    } else {
                        if (!$this.validateTaxcode(text)) {
                            result = $this.languages['taxcodeinvalid'];
                        } else if (!this.validateContainsSpecialCharacters(text)) {
                            result = $this.languages['special_characters'];
                        }
                    }
                }
                break;
            case 'address':
                if (text.length < 1) {
                    result = $this.languages['notempty'];
                } else {
                    if (text.length < 10) {
                        result = $this.languages['minLength_address'].replace($this.minLength, "10");
                    } else if (text.length > 200) {
                        result = $this.languages['over200char'];
                    } else if (!this.validateContainsSpecialCharacters(text)) {
                        result = $this.languages['special_characters'];
                    }
                }
                break;
        }
        return result;
    };
    this.isInputTexted = function ($element) {
        let result = false;
        let $input_box = $element.parents('.fhs-input-box');
        let $input_group = $element.parents('.fhs-input-group');
        let text_value = $element.val();

        if ($input_group.length) {
            if (!fhs_account.isEmpty(text_value)) {
                $input_group.addClass('texting');
                result = true;
            }
        } else if ($input_box.length) {
            if (!fhs_account.isEmpty(text_value)) {
                $input_box.addClass('texting');
                result = true;
            }
        }
        return result;
    };

    this.login = function () {
        let username = $jq('#login_username');
        let password = $jq('#login_password');

        let username_validated = $this.validateTextbox('login_username', username.val().trim(), username);
        let password_validated = $this.validateTextbox('login_password', password.val().trim(), password);

        if (username_validated && password_validated) {
            $this.postLogin(username.val().trim(), password.val().trim());
        }
    };

    //register
    this.sentPhoneOTP = function () {
        if ($this.phone_otp != '') { return; }

        let phone = $jq('#register_phone');
        let phone_validated = $this.validateTextbox('register_phone', phone.val().trim(), phone);

        if (!$this.sent_phone_otp) {
            let $phone_otp = $jq('#register_phone_otp');
            $phone_otp.val('');
            $phone_otp.attr('disabled', 'disabled');
        }

        if (phone_validated) {
            $this.postSendPhoneOTP(phone.val().trim());
        }
    };
    this.register = function () {
        let password = $jq('#register_password');

        let password_validated = $this.validateTextbox('register_password', password.val().trim(), password);

        if (password_validated) {
            $this.postRegister(password.val().trim());
        }
    };

    //recovery
    this.sentPhoneRecoveryOTP = function () {
        if ($this.username_recovery_otp != '') { return; }

        let phone = $jq('#recovery_phone');
        let phone_validated = $this.validateTextbox('login_username', phone.val().trim(), phone);

        if (!$this.sent_username_recovery_otp) {
            let $phone_otp = $jq('#recovery_phone_otp');
            $phone_otp.val('');
            $phone_otp.attr('disabled', 'disabled');
        }

        if (phone_validated) {
            $this.postSendRecoveryPhoneOTP(phone.val().trim());
        }
    };
    this.recovery = function () {
        let password = $jq('#recovery_password');

        let password_validated = $this.validateTextbox('recovery_password', password.val().trim(), password);

        if (password_validated) {
            $this.postRecovery(password.val().trim());
        }
    };

    //Account info----------------------------------
    this.initAccountInfo = function () {
        $this.phone_change = '';
        $this.phone_change_otp = '';
        $this.sent_phone_change_otp = false;

        $this.email_change = '';
        $this.email_change_otp = '';
        $this.sent_email_change_otp = false;

        $this.eventBtnAccount();
        $this.eventPressAccount();
    };

    //post
    this.postSendChangePhoneOTP = function (phone) {
        if (is_loading) { return; }
        is_loading = true;
        $this.animateLoader('start');
        $jq('.fhs-changephone-msg').text('');
        $jq.ajax({
            url: SEND_CHANGE_PHONE_URL,
            method: 'post',
            dataType: "json",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: { phone: phone },
            error: function () {
                is_loading = false;
                $this.animateLoader('stop');
            },
            success: function (data) {
                let $phone = $jq('#change_phone');
                let $input_box = $phone.parents('.fhs-input-box');
                let alert_message = $input_box.children('.fhs-input-alert');

                $input_box.removeClass('checked-error');
                $input_box.removeClass('checked-pass');

                let $phone_otp = $jq('#change_phone_otp');
                $phone_otp.removeClass('checked-error');
                $phone_otp.removeClass('checked-pass');
                if (!$this.sent_phone_change_otp) {
                    $phone_otp.val('');
                    $phone_otp.attr('disabled', 'disabled');
                }

                alert_message.text('');
                $this.phone_change = '';
                if (!data['success']) {
                    $input_box.addClass('checked-error');
                    alert_message.text(data['message']);
                } else {
                    $this.phone_change = phone;
                    $input_box.addClass('checked-pass');
                    alert_message.text(data['message']);
                    $this.sent_phone_change_otp = true;
                    $phone_otp.removeAttr('disabled');
                    $phone_otp.focus();
                }
                is_loading = false;
                $this.animateLoader('stop');
            }
        });
    };
    this.postCheckChangePhoneOTP = function (otp) {
        if (is_loading) { return; }
        is_loading = true;
        $this.animateLoader('start');
        $jq.ajax({
            url: CHECK_PHONE_OTP_ACCOUNT_URL,
            method: 'post',
            dataType: "json",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: { phone: $this.phone_change, otp: otp },
            error: function () {
                is_loading = false;
                $this.animateLoader('stop');
            },
            success: function (data) {
                let $phone_otp = $jq('#change_phone_otp');
                let $input_box = $phone_otp.parents('.fhs-input-box');
                let alert_message = $input_box.children('.fhs-input-alert');
                $input_box.removeClass('checked-error');
                $input_box.removeClass('checked-pass');

                alert_message.text('');
                $this.phone_change_otp = '';

                if (!data['success']) {
                    $input_box.addClass('checked-error');
                    alert_message.text(data['message']);
                } else {
                    alert_message.text(data['message']);
                    $this.phone_change_otp = otp;

                    let $phone = $jq('#change_phone');
                    $phone.val($this.phone_change);
                    $phone.attr('disabled', 'disabled');
                    $phone_otp.attr('disabled', 'disabled');
                    $input_box.addClass('checked-pass');

                    $this.enableChangePhoneButton(true);
                }
                is_loading = false;
                $this.animateLoader('stop');
            }
        });
    };
    this.postChangePhone = function () {
        if (is_loading) { return; }
        is_loading = true;
        $this.animateLoader('start');
        $jq.ajax({
            url: CHANGE_PHONE_ACCOUNT_URL,
            method: 'post',
            dataType: "json",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: { username: $this.phone_change, otp: $this.phone_change_otp },
            error: function () {
                is_loading = false;
                $this.animateLoader('stop');
                $jq('.fhs-changephone-msg').text($this.languages['tryagain']);
            },
            success: function (data) {
                let $phone_otp = $jq('#change_phone_otp');
                let $input_box = $phone_otp.parents('.fhs-input-box');
                let alert_message = $input_box.children('.fhs-input-alert');
                $input_box.removeClass('checked-error');
                $input_box.removeClass('checked-pass');
                alert_message.text('');
                $this.username_recovery_otp = '';
                if (!data['success']) {
                    $jq('.fhs-changephone-msg').text(data['message']);
                } else {
                    let $phone = $jq('#telephone');
                    if (!$this.isEmpty($phone.attr('noti'))) {
                        let $phone_input_box = $phone.parents('.fhs-input-box');
                        let $phone_input_group = $phone.parents('.fhs-input-group');
                        let $phone_description = $phone_input_box.children('.fhs-input-description');
                        $phone_description.text('');
                        let $phone_changephone_text = $phone_input_group.children('.fhs-textbox-changephone');
                        $phone_changephone_text.text($this.languages['change']);
                        setTimeout(loadNoticationTop, 100);
                    }
                    $phone.val($this.phone_change);
                    $this.onTriggerTracking('info', { 'telephone': $this.phone_change });
                    $this.onUpdateMyInfo({ 'telephone': $this.phone_change });
                    $this.clearChangePhone();
                    $this.changePhoneClose();
                }
                is_loading = false;
                $this.animateLoader('stop');
            }
        });
    };

    this.postSendChangeEmailOTP = function (email) {
        if (is_loading) { return; }
        is_loading = true;
        $this.animateLoader('start');
        $jq('.fhs-changeemail-msg').text('');
        $jq.ajax({
            url: SEND_CHANGE_EMAIL_URL,
            method: 'post',
            dataType: "json",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: { email: email },
            error: function () {
                is_loading = false;
                $this.animateLoader('stop');
            },
            success: function (data) {
                let $email = $jq('#change_email');
                let $input_box = $email.parents('.fhs-input-box');
                let alert_message = $input_box.children('.fhs-input-alert');

                $input_box.removeClass('checked-error');
                $input_box.removeClass('checked-pass');

                let $email_otp = $jq('#change_email_otp');
                $email_otp.removeClass('checked-error');
                $email_otp.removeClass('checked-pass');
                if (!$this.sent_email_change_otp) {
                    $email_otp.val('');
                    $email_otp.attr('disabled', 'disabled');
                }
                alert_message.text('');
                $this.email_change = '';
                if (!data['success']) {
                    $input_box.addClass('checked-error');
                    alert_message.text(data['message']);
                } else {
                    $this.email_change = email;
                    $input_box.addClass('checked-pass');
                    alert_message.text(data['message']);
                    $this.sent_email_change_otp = true;
                    $email_otp.removeAttr('disabled');
                    $email_otp.focus();
                }
                is_loading = false;
                $this.animateLoader('stop');
            }
        });
    };
    this.postCheckChangeEmailOTP = function (otp) {
        if (is_loading) { return; }
        is_loading = true;
        $this.animateLoader('start');
        $jq.ajax({
            url: CHECK_EMAIL_OTP_ACCOUNT_URL,
            method: 'post',
            dataType: "json",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: { email: $this.email_change, otp: otp },
            error: function () {
                is_loading = false;
                $this.animateLoader('stop');
            },
            success: function (data) {
                let $email_otp = $jq('#change_email_otp');
                let $input_box = $email_otp.parents('.fhs-input-box');
                let alert_message = $input_box.children('.fhs-input-alert');
                $input_box.removeClass('checked-error');
                $input_box.removeClass('checked-pass');

                alert_message.text('');
                $this.email_change_otp = '';

                if (!data['success']) {
                    $input_box.addClass('checked-error');
                    alert_message.text(data['message']);
                } else {
                    alert_message.text(data['message']);
                    $this.email_change_otp = otp;

                    let $email = $jq('#change_email');
                    $email.val($this.email_change);
                    $email.attr('disabled', 'disabled');
                    $email_otp.attr('disabled', 'disabled');
                    $input_box.addClass('checked-pass');

                    $this.enableChangeEmailButton(true);
                }
                is_loading = false;
                $this.animateLoader('stop');
            }
        });
    };
    this.postChangeEmail = function () {
        if (is_loading) { return; }
        is_loading = true;
        $this.animateLoader('start');
        $jq.ajax({
            url: CHANGE_EMAIL_ACCOUNT_URL,
            method: 'post',
            dataType: "json",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: { email: $this.email_change, otp: $this.email_change_otp },
            error: function () {
                is_loading = false;
                $this.animateLoader('stop');
                $jq('.fhs-changeemail-msg').text($this.languages['tryagain']);
            },
            success: function (data) {
                let $email_otp = $jq('#change_email_otp');
                let $input_box = $email_otp.parents('.fhs-input-box');
                let alert_message = $input_box.children('.fhs-input-alert');
                $input_box.removeClass('checked-error');
                $input_box.removeClass('checked-pass');
                alert_message.text('');
                $this.email_change_otp = '';
                if (!data['success']) {
                    $jq('.fhs-changeemail-msg').text(data['message']);
                } else {
                    let $email = $jq('#email');
                    if (!$this.isEmpty($email.attr('noti'))) {
                        let $email_input_box = $email.parents('.fhs-input-box');
                        let $email_input_group = $email.parents('.fhs-input-group');
                        let $email_description = $email_input_box.children('.fhs-input-description');
                        $email_description.text('');
                        let $email_changeemail_text = $email_input_group.children('.fhs-textbox-changeemail');
                        $email_changeemail_text.text($this.languages['change']);
                        setTimeout(loadNoticationTop, 100);
                    }
                    setTimeout(function () { $this.execute(data['netcore_contact']); }, 100);
                    $email.val($this.email_change);
                    $this.onTriggerTracking('info', { 'email': $this.email_change })
                    $this.onUpdateMyInfo({ 'email': $this.email_change });
                    $this.clearChangeEmail();
                    $this.changeEmailClose();
                }
                is_loading = false;
                $this.animateLoader('stop');
            }
        });
    };

    //process
    this.clearChangePhone = function () {
        $this.phone_change = '';
        $this.phone_change_otp = '';
        $this.sent_phone_change_otp = false;

        let $phone_change = $jq('#change_phone');
        $phone_change.val('');
        $phone_change.removeAttr('disabled');
        let $phone_change_input_box = $phone_change.parents('.fhs-input-box');
        $phone_change_input_box.removeClass('checked-error');
        $phone_change_input_box.removeClass('checked-pass');
        let $phone_change_alert_message = $phone_change_input_box.children('.fhs-input-alert');
        $phone_change_alert_message.text('');

        let $phone_otp = $jq('#change_phone_otp');
        $phone_otp.val('');
        $phone_otp.attr('disabled', 'disabled');
        let $phone_otp_input_box = $phone_otp.parents('.fhs-input-box');
        $phone_otp_input_box.removeClass('checked-error');
        $phone_otp_input_box.removeClass('checked-pass');
        let $phone_otp_alert_message = $phone_otp_input_box.children('.fhs-input-alert');
        $phone_otp_alert_message.text('');

        $jq('.fhs-changephone-msg').text('');
    }
    this.enableChangePhoneButton = function (is_enable) {
        if (is_enable) {
            $jq('.fhs-btn-changephone').removeAttr("disabled");
        } else {
            $jq('.fhs-btn-changephone').attr("disabled", "disabled");
        }
    };
    this.changePhoneShow = function () {
        $jq('.youama-ajaxlogin-cover').fadeIn();
        $jq('.youama-changePhone-window').fadeIn();
        $jq('#change_phone').focus();
    };
    this.changePhoneClose = function () {
        $jq('.youama-changePhone-window').fadeOut();
        $jq('.youama-ajaxlogin-cover').fadeOut();
    };

    this.clearChangeEmail = function () {
        $this.email_change = '';
        $this.email_change_otp = '';
        $this.sent_email_change_otp = false;

        let $email_change = $jq('#change_email');
        $email_change.val('');
        $email_change.removeAttr('disabled');
        let $email_change_input_box = $email_change.parents('.fhs-input-box');
        $email_change_input_box.removeClass('checked-error');
        $email_change_input_box.removeClass('checked-pass');
        let $email_change_alert_message = $email_change_input_box.children('.fhs-input-alert');
        $email_change_alert_message.text('');

        let $email_otp = $jq('#change_email_otp');
        $email_otp.val('');
        $email_otp.attr('disabled', 'disabled');
        let $email_otp_input_box = $email_change.parents('.fhs-input-box');
        $email_otp_input_box.removeClass('checked-error');
        $email_otp_input_box.removeClass('checked-pass');
        let $email_otp_alert_message = $email_otp_input_box.children('.fhs-input-alert');
        $email_otp_alert_message.text('');

        $jq('.fhs-changeemail-msg').text('');
    };
    this.enableChangeEmailButton = function (is_enable) {
        if (is_enable) {
            $jq('.fhs-btn-changeemail').removeAttr("disabled");
        } else {
            $jq('.fhs-btn-changeemail').attr("disabled", "disabled");
        }
    };
    this.changeEmailShow = function () {
        $jq('.youama-ajaxlogin-cover').fadeIn();
        $jq('.youama-changeEmail-window').fadeIn();
        $jq('#change_email').focus();
    };
    this.changeEmailClose = function () {
        $jq('.youama-changeEmail-window').fadeOut();
        $jq('.youama-ajaxlogin-cover').fadeOut();
    };

    //event
    this.eventBtnAccount = function () {
        if (!IS_MOBILE) {
            $input_noautofill = $jq("input[autocomplete='off']");
            $input_noautofill.attr('readonly', true);
            $input_noautofill.focusin(function () {
                $jq(this).removeAttr('readonly')
            });
            $input_noautofill.focusout(function () {
                $jq(this).attr('readonly', true);
            });
        }

        $jq('.fhs-textbox-alert').click(function () {
            let $alert_icon = $jq(this);
            let $input_group = $alert_icon.parents('.fhs-input-group');
            let $input_box = $alert_icon.parents('.fhs-input-box');
            let $text_box = $input_group.children('.fhs-textbox');
            if ($input_box.hasClass('checked-error')) {
                let $input_box = $input_group.parents('.fhs-input-box');
                let $alert_msg = $input_box.children('.fhs-input-alert');
                $alert_msg.empty();
                $text_box.val('');
                $input_box.removeClass('checked-error');
            }
            $text_box.focus();
        });

        //phone
        $jq('.fhs-textbox-changephone').click(function () {
            $this.changePhoneShow();
        });
        $jq('.fhs-btn-backPhone').click(function () {
            $this.changePhoneClose();
        });
        $jq('.fhs-textbox-phonesend').click(function () {
            $this.sentPhoneChangeOTP();
        });
        $jq('.fhs-btn-changephone').click(function () {
            $this.changePhone();
        });

        //email
        $jq('.fhs-textbox-changeemail').click(function () {
            $this.changeEmailShow();
        });
        $jq('.fhs-btn-backemail').click(function () {
            $this.changeEmailClose();
        });
        $jq('.fhs-textbox-emailsend').click(function () {
            $this.sentEmailChangeOTP();
        });
        $jq('.fhs-btn-changeemail').click(function () {
            $this.changeEmail();
        });
    };
    this.eventPressAccount = function () {
        //Change Phone
        $jq('#change_phone').keydown(function (e) {
            let key = '';
            let keyCode = 0;
            if (e.type === 'paste') {
                key = e.clipboardData.getData('text/plain');
            } else {
                keyCode = (e.keyCode ? e.keyCode : e.which);
                key = String.fromCharCode(keyCode);
            }

            if (!e.ctrlKey && !e.altKey) {
                if (!((keyCode >= 37) && (keyCode <= 40)) && (keyCode != 17) && !((keyCode >= 8) && (keyCode <= 9)) && !((keyCode >= 46) && (keyCode <= 47)) && (keyCode != 49) && (keyCode != 116)) {
                    if (!((keyCode >= 48 && keyCode <= 57) || (keyCode >= 96 && keyCode <= 105))) {
                        let regex = /[0-9]|\./;
                        if (!regex.test(key)) {
                            e.returnValue = false;
                            if (e.preventDefault) e.preventDefault();
                        }
                    }
                }
            }
        });
        $jq('#change_phone').keyup(function (e) {
            let is_pass = false;

            let phone = $jq(this).val().trim();
            let phone_otp = $jq('#change_phone_otp').val().trim();

            if (phone.length >= 10 && phone_otp.length == 6) {
                is_pass = true;
            }
            $this.enableChangePhoneButton(is_pass);

            let keycode = (e.keyCode ? e.keyCode : e.which);
            if (keycode == '13') {
                $this.sentPhoneChangeOTP();
            }
        });
        $jq('#change_phone_otp').keyup(function (e) {
            let is_pass = false;

            let phone = $jq('#change_phone').val().trim();
            let phone_otp = $jq(this).val().trim();

            if (phone.length >= 10 && phone_otp.length == 6 && $this.sent_phone_change_otp && ($this.phone_change_otp != '')) {
                is_pass = true;
            }
            $this.enableChangePhoneButton(is_pass);

            if (!$this.validateData('change_phone_otp', phone_otp) && !$this.validateData('change_phone', phone) && $this.sent_phone_change_otp) {
                $this.postCheckChangePhoneOTP(phone_otp);
            }
        })
            .on('paste', function (e) {
                setTimeout(function () {
                    let is_pass = false;

                    let phone = $jq('#change_phone').val().trim();
                    let phone_otp = $jq('#change_phone_otp').val().trim();

                    if (phone.length >= 10 && phone_otp.length == 6 && $this.sent_phone_change_otp && ($this.phone_change_otp != '')) {
                        is_pass = true;
                    }
                    $this.enableChangePhoneButton(is_pass);

                    if (!$this.validateData('change_phone_otp', phone_otp) && !$this.validateData('change_phone', phone) && $this.sent_phone_change_otp) {
                        $this.postCheckChangePhoneOTP(phone_otp);
                    }
                }, 100);
            });

        //Press Email
        $jq('#change_email').keyup(function (e) {
            let is_pass = false;

            let email = $jq(this).val().trim();
            let email_otp = $jq('#change_email_otp').val().trim();

            if (email.length >= 10 && email_otp.length == 6) {
                is_pass = true;
            }
            $this.enableChangeEmailButton(is_pass);

            let keycode = (e.keyCode ? e.keyCode : e.which);
            if (keycode == '13') {
                $this.sentEmailChangeOTP();
            }
        });
        $jq('#change_email_otp').keyup(function (e) {
            let is_pass = false;

            let email = $jq('#change_email').val().trim();
            let email_otp = $jq(this).val().trim();

            if (email.length >= 10 && email_otp.length == 6 && $this.sent_email_change_otp && ($this.email_change_otp != '')) {
                is_pass = true;
            }
            $this.enableChangeEmailButton(is_pass);

            if (!$this.validateData('change_email_otp', email_otp) && !$this.validateData('change_email', email) && $this.sent_email_change_otp) {
                $this.postCheckChangeEmailOTP(email_otp);
            }
        })
            .on('paste', function (e) {
                setTimeout(function () {
                    let is_pass = false;

                    let email = $jq('#change_email').val().trim();
                    let email_otp = $jq('#change_email_otp').val().trim();

                    if (email.length >= 10 && email_otp.length == 6 && $this.sent_email_change_otp && ($this.email_change_otp != '')) {
                        is_pass = true;
                    }
                    $this.enableChangeEmailButton(is_pass);

                    if (!$this.validateData('change_email_otp', email_otp) && !$this.validateData('change_email', email) && $this.sent_email_change_otp) {
                        $this.postCheckChangeEmailOTP(email_otp);
                    }
                }, 100);
            });
    };

    this.setDateBox = function (date_box) {
        let $day = $jq(date_box + ' .fhs_input_date_group_day');
        let $month = $jq(date_box + ' .fhs_input_date_group_month');
        let $year = $jq(date_box + ' .fhs_input_date_group_year');
        let $full = $jq(date_box + ' .fhs_input_date_group_full');
        $day.keydown(function (e) {
            let key = '';
            let keyCode = 0;
            if (e.type === 'paste') {
                key = e.clipboardData.getData('text/plain');
            } else {
                keyCode = (e.keyCode ? e.keyCode : e.which);
                key = String.fromCharCode(keyCode);
            }
            if (!((keyCode >= 37) && (keyCode <= 40)) && (keyCode != 17) && !((keyCode >= 8) && (keyCode <= 9)) && !((keyCode >= 46) && (keyCode <= 47)) && (keyCode != 49) && (keyCode != 116)) {
                if (!((keyCode >= 48 && keyCode <= 57) || (keyCode >= 96 && keyCode <= 105))) {
                    let regex = /[0-9]|\./;
                    if (!regex.test(key)) {
                        e.returnValue = false;
                        if (e.preventDefault) e.preventDefault();
                    }
                }
            }
        });
        $month.keydown(function (e) {
            let key = '';
            let keyCode = 0;
            if (e.type === 'paste') {
                key = e.clipboardData.getData('text/plain');
            } else {
                keyCode = (e.keyCode ? e.keyCode : e.which);
                key = String.fromCharCode(keyCode);
            }
            if (!((keyCode >= 37) && (keyCode <= 40)) && (keyCode != 17) && !((keyCode >= 8) && (keyCode <= 9)) && !((keyCode >= 46) && (keyCode <= 47)) && (keyCode != 49) && (keyCode != 116)) {
                if (!((keyCode >= 48 && keyCode <= 57) || (keyCode >= 96 && keyCode <= 105))) {
                    let regex = /[0-9]|\./;
                    if (!regex.test(key)) {
                        e.returnValue = false;
                        if (e.preventDefault) e.preventDefault();
                    }
                }
            }
        });
        $year.keydown(function (e) {
            let key = '';
            let keyCode = 0;
            if (e.type === 'paste') {
                key = e.clipboardData.getData('text/plain');
            } else {
                keyCode = (e.keyCode ? e.keyCode : e.which);
                key = String.fromCharCode(keyCode);
            }
            if (!((keyCode >= 37) && (keyCode <= 40)) && (keyCode != 17) && !((keyCode >= 8) && (keyCode <= 9)) && !((keyCode >= 46) && (keyCode <= 47)) && (keyCode != 49) && (keyCode != 116)) {
                if (!((keyCode >= 48 && keyCode <= 57) || (keyCode >= 96 && keyCode <= 105))) {
                    let regex = /[0-9]|\./;
                    if (!regex.test(key)) {
                        e.returnValue = false;
                        if (e.preventDefault) e.preventDefault();
                    }
                }
            }
        });
        $day.keyup(function (e) {
            if ($day.val().length == 2) {
                if ($day.val() <= 0) {
                    $day.val(1);
                } else if ($day.val() > 31) {
                    $day.val(31);
                }
            }
            if ($year.val().length == 4 && $month.val().length == 2 && $day.val().length == 2) {
                let datefull = $year.val() + "-" + $month.val() + "-" + $day.val();
                $full.val($this.formatDate(datefull));
            } else {
                $full.val(0000);
            }
        });
        $month.keyup(function (e) {
            if ($month.val().length == 2) {
                if ($month.val() <= 0) {
                    $month.val(1);
                } else if ($month.val() > 12) {
                    $month.val(12);
                }
            }
            if ($year.val().length == 4 && $month.val().length == 2 && $day.val().length == 2) {
                let datefull = $year.val() + "-" + $month.val() + "-" + $day.val();
                $full.val($this.formatDate(datefull));
            } else {
                $full.val(0000);
            }
        });
        $year.keyup(function (e) {
            var d = new Date();
            var nowyear = d.getFullYear();
            if ($year.val().length == 4) {
                if ($year.val() <= 1900) {
                    $year.val(1900);
                } else if ($year.val() > nowyear) {
                    $year.val(nowyear);
                }
            }
            if ($year.val().length == 4 && $month.val().length == 2 && $day.val().length == 2) {
                let datefull = $year.val() + "-" + $month.val() + "-" + $day.val();
                $full.val($this.formatDate(datefull));
            } else {
                $full.val(0000);
            }
        });
    };

    //Phone
    this.sentPhoneChangeOTP = function () {
        if ($this.phone_change_otp != '') { return; }

        let phone = $jq('#change_phone');
        let phone_validated = $this.validateTextbox('change_phone', phone.val().trim(), phone);

        if (!$this.sent_phone_change_otp) {
            let $phone_otp = $jq('#change_phone_otp');
            $phone_otp.val('');
            $phone_otp.attr('disabled', 'disabled');
        }

        if (phone_validated) {
            $this.postSendChangePhoneOTP(phone.val().trim());
        }
    };
    this.changePhone = function () {
        $this.postChangePhone();
    };
    //Email
    this.sentEmailChangeOTP = function () {
        if ($this.email_change_otp != '') { return; }

        let email = $jq('#change_email');
        let email_validated = $this.validateTextbox('change_email', email.val().trim(), email);


        if (!$this.sent_email_change_otp) {
            let $email_otp = $jq('#change_email_otp');
            $email_otp.val('');
            $email_otp.attr('disabled', 'disabled');
        }

        if (email_validated) {
            $this.postSendChangeEmailOTP(email.val().trim());
        }
    };
    this.changeEmail = function () {
        $this.postChangeEmail();
    };

    //login form
    this.initLoginForm = function () {
        $this.tab_change('login');
        $jq('.youama-login-window').prependTo('.fhs_login_form_content');
        $jq('.youama-login-window').removeClass('fhs_popup_show');
        $jq('.youama-login-window .fhs-btn-cancel').fadeOut(0);
        $this.isShowLoginform = true;
    };

    //register form
    this.initRegisterForm = function () {
        $this.tab_change('register');
        $jq('.youama-login-window').prependTo('.fhs_login_form_content');
        $jq('.youama-login-window').removeClass('fhs_popup_show');
        $jq('.youama-login-window .fhs-btn-cancel').fadeOut(0);
        $this.isShowLoginform = true;
    };

    //login with facebook
    this.postloginfb = function (accessToken) {
        if (is_loading) { return; }
        is_loading = true;
        $this.animateLoader('start');
        $jq.ajax({
            url: LOGIN_FB_ACCOUNT_URL,
            method: 'post',
            dataType: "json",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: { accessToken: accessToken },
            error: function () {
                is_loading = false;
                $this.animateLoader('stop');
                $jq('.fhs-register-msg').text($this.languages['tryagain']);
            },
            success: function (data) {
                if (!data['success']) {
                    $jq('.fhs-login-msg').text(data['message']);
                } else {
                    if (data['logined']) {
                        if ($this.is_redirect == '1') {
                            window.location = $this.redirect_url;
                        } else {
                            window.location.reload();
                        }
                    } else {
                        $this.is_login_facebook = true;
                    }
                    $this.closeLoginPopup();
                }
                is_loading = false;
                $this.animateLoader('stop');
            }
        });
    };

    this.postSendConfirmPhoneOTP = function (phone) {
        if (is_loading) { return; }
        is_loading = true;
        $this.animateLoader('start');
        $jq('.fhs-confirmphone-msg').text('');
        $jq.ajax({
            url: SEND_CONFIRM_PHONE_URL,
            method: 'post',
            dataType: "json",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: { phone: phone },
            error: function () {
                is_loading = false;
                $this.animateLoader('stop');
            },
            success: function (data) {
                let $phone = $jq('#confirm_phone');
                let $input_box = $phone.parents('.fhs-input-box');
                let alert_message = $input_box.children('.fhs-input-alert');

                $input_box.removeClass('checked-error');
                $input_box.removeClass('checked-pass');

                let $phone_otp = $jq('#confirm_phone_otp');
                $phone_otp.removeClass('checked-error');
                $phone_otp.removeClass('checked-pass');
                if (!$this.sent_phone_confirm_otp) {
                    $phone_otp.val('');
                    $phone_otp.attr('disabled', 'disabled');
                }

                alert_message.text('');
                $this.phone_confirm = '';
                if (!data['success']) {
                    $input_box.addClass('checked-error');
                    alert_message.text(data['message']);
                } else {
                    $phone.attr('disabled', 'disabled');
                    $this.phone_confirm = phone;
                    $input_box.addClass('checked-pass');
                    alert_message.text(data['message']);
                    $this.sent_phone_confirm_otp = true;
                    $phone_otp.removeAttr('disabled');
                    $phone_otp.focus();
                }
                is_loading = false;
                $this.animateLoader('stop');
            }
        });
    };
    this.postCheckConfirmPhoneOTP = function (otp) {
        if (is_loading) { return; }
        is_loading = true;
        $this.animateLoader('start');
        $jq.ajax({
            url: CHECK_PHONE_OTP_ACCOUNT_URL,
            method: 'post',
            dataType: "json",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: { phone: $this.phone_confirm, otp: otp },
            error: function () {
                is_loading = false;
                $this.animateLoader('stop');
            },
            success: function (data) {
                let $phone_otp = $jq('#confirm_phone_otp');
                let $input_box = $phone_otp.parents('.fhs-input-box');
                let alert_message = $input_box.children('.fhs-input-alert');
                $input_box.removeClass('checked-error');
                $input_box.removeClass('checked-pass');

                alert_message.text('');
                $this.phone_confirm_otp = '';

                if (!data['success']) {
                    $input_box.addClass('checked-error');
                    alert_message.text(data['message']);
                } else {
                    alert_message.text(data['message']);
                    $this.phone_confirm_otp = otp;

                    $phone_otp.attr('disabled', 'disabled');
                    $input_box.addClass('checked-pass');

                    $this.enableConfirmPhoneButton(true);
                }
                is_loading = false;
                $this.animateLoader('stop');
            }
        });
    };
    this.postRegisterFB = function () {
        if (is_loading) { return; }
        is_loading = true;
        $this.animateLoader('start');
        $jq.ajax({
            url: REGISTER_FB_ACCOUNT_URL,
            method: 'post',
            dataType: "json",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: { accessToken: $this.accessToken, phone: $this.phone_confirm, otp: $this.phone_confirm_otp },
            error: function () {
                is_loading = false;
                $this.animateLoader('stop');
                $jq('.fhs-register-msg').text($this.languages['tryagain']);
            },
            success: function (data) {
                let $phone_otp = $jq('#confirm_phone_otp');
                let $input_box = $phone_otp.parents('.fhs-input-box');
                let alert_message = $input_box.children('.fhs-input-alert');
                $input_box.removeClass('checked-error');
                $input_box.removeClass('checked-pass');
                alert_message.text('');
                $this.phone_otp = '';
                if (!data['success']) {
                    if (data['message'] == $this.languages['loginfail']) {
                        $jq('.fhs-login-msg').text(data['message']);
                        $this.is_login_facebook = false;
                        $jq('.youama-confirm-window').fadeOut();
                        $this.showLoginPopup();
                    } else {
                        $jq('.fhs-confirmphone-msg').text(data['message']);
                    }
                } else {
                    window.location = ACCOUNT_INFO;
                    $this.is_login_facebook = false;
                    $jq('.youama-confirm-window').fadeOut();
                }
                is_loading = false;
                $this.animateLoader('stop');
            }
        });
    };

    //process
    this.loginFB = function () {
        FB.login(function (response) {
            if (response.status === 'connected') {
                $this.accessToken = response.authResponse.accessToken;
                $this.postloginfb($this.accessToken);
            } else { }
        }, { scope: 'public_profile,email' });
    };
    this.sentPhoneConfirmOTP = function () {
        if ($this.phone_confirm_otp != '') { return; }

        let phone = $jq('#confirm_phone');
        let phone_validated = $this.validateTextbox('phone', phone.val().trim(), phone);

        if (!$this.sent_phone_confirm_otp) {
            let $phone_otp = $jq('#confirm_phone_otp');
            $phone_otp.val('');
            $phone_otp.attr('disabled', 'disabled');
        }

        if (phone_validated) {
            $this.postSendConfirmPhoneOTP(phone.val().trim());
        }
    };
    this.registerFB = function () {
        $this.postRegisterFB();
    };

    this.enableConfirmPhoneButton = function (is_enable) {
        if (is_enable) {
            $jq('.fhs-btn-confirmphone').removeAttr("disabled");
        } else {
            $jq('.fhs-btn-confirmphone').attr("disabled", "disabled");
        }
    };
    this.eventBtnFB = function () {
    };

    //register quick----------------------------------
    this.initRegisterQuick = function (_order_id) {
        $this.orderId = _order_id;

        $this.registerquick_phone = '';
        $this.registerquick_otp = '';
        $this.registerquick_sent_otp = false;

        $this.eventBtnRegisterQuick();
        $this.eventPressRegisterQuick();
    };
    //post
    this.postSendRegisterQuickPhoneOTP = function (phone) {
        if (is_loading) { return; }
        is_loading = true;
        $this.animateLoader('start');
        $jq('.fhs-registerquick-msg').text('');
        $jq.ajax({
            url: SEND_PHONE_OTP_ACCOUNT_URL,
            method: 'post',
            dataType: "json",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: { phone: phone },
            error: function () {
                is_loading = false;
                $this.animateLoader('stop');
            },
            success: function (data) {
                let $phone = $jq('#registerquick_phone');
                let $input_box = $phone.parents('.fhs-input-box');
                let alert_message = $input_box.children('.fhs-input-alert');

                $input_box.removeClass('checked-error');
                $input_box.removeClass('checked-pass');

                let $phone_otp = $jq('#registerquick_phone_otp');
                $phone_otp.removeClass('checked-error');
                $phone_otp.removeClass('checked-pass');
                if (!$this.registerquick_sent_otp) {
                    $phone_otp.val('');
                    $phone_otp.attr('disabled', 'disabled');
                }

                let $password = $jq('#registerquick_password');
                $password.val('');
                $password.attr('disabled', 'disabled');
                $password.removeClass('checked-error');
                $password.removeClass('checked-pass');

                alert_message.text('');
                $this.registerquick_phone = '';
                if (!data['success']) {
                    $input_box.addClass('checked-error');
                    alert_message.text(data['message']);
                } else {
                    $this.registerquick_phone = phone;
                    $input_box.addClass('checked-pass');
                    alert_message.text(data['message']);
                    $this.registerquick_sent_otp = true;
                    $phone_otp.removeAttr('disabled');
                    $phone_otp.focus();
                }
                is_loading = false;
                $this.animateLoader('stop');
            }
        });
    };
    this.postCheckRegisterQuickPhoneOTP = function (otp) {
        if (is_loading) { return; }
        is_loading = true;
        $this.animateLoader('start');
        $jq.ajax({
            url: CHECK_PHONE_OTP_ACCOUNT_URL,
            method: 'post',
            dataType: "json",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: { phone: $this.registerquick_phone, otp: otp },
            error: function () {
                is_loading = false;
                $this.animateLoader('stop');
            },
            success: function (data) {
                let $phone_otp = $jq('#registerquick_phone_otp');
                let $input_box = $phone_otp.parents('.fhs-input-box');
                let alert_message = $input_box.children('.fhs-input-alert');
                $input_box.removeClass('checked-error');
                $input_box.removeClass('checked-pass');

                let $password = $jq('#registerquick_password');
                $password.val('');
                $password.attr('disabled', 'disabled');
                $password.removeClass('checked-error');
                $password.removeClass('checked-pass');

                alert_message.text('');
                $this.registerquick_otp = '';

                if (!data['success']) {
                    $input_box.addClass('checked-error');
                    alert_message.text(data['message']);
                } else {
                    alert_message.text(data['message']);
                    $this.registerquick_otp = otp;
                    let $phone = $jq('#registerquick_phone');
                    $phone.val($this.registerquick_phone);
                    $phone.attr('disabled', 'disabled');
                    $phone_otp.attr('disabled', 'disabled');
                    $input_box.addClass('checked-pass');

                    $password.removeAttr('disabled');
                    $password.focus();
                }
                is_loading = false;
                $this.animateLoader('stop');
            }
        });
    };
    this.postRegisterQuick = function (password) {
        if (is_loading) { return; }
        is_loading = true;
        $this.animateLoader('start');
        $jq.ajax({
            url: REGISTERQUICK_ACCOUNT_URL,
            method: 'post',
            dataType: "json",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: { order_id: $this.orderId, username: $this.registerquick_phone, otp: $this.registerquick_otp, password: password },
            error: function () {
                is_loading = false;
                $this.animateLoader('stop');
                $jq('.fhs-registerquick-msg').text($this.languages['tryagain']);
            },
            success: function (data) {
                let $phone_otp = $jq('#registerquick_phone_otp');
                let $input_box = $phone_otp.parents('.fhs-input-box');
                let alert_message = $input_box.children('.fhs-input-alert');
                $input_box.removeClass('checked-error');
                $input_box.removeClass('checked-pass');
                alert_message.text('');
                $this.registerquick_otp = '';
                if (!data['success']) {
                    $jq('.fhs-registerquick-msg').text(data['message']);
                } else {
                    $this.savePassword($this.registerquick_phone, password);
                    $this.onTriggerTracking('set_register', { type: 'fahasa' });
                    window.location = ORDER_HISTORY_URL + $this.orderId;
                    $this.RegisterQuickClose();
                }
                is_loading = false;
                $this.animateLoader('stop');
            }
        });
    };
    //event
    this.eventBtnRegisterQuick = function () {
        if (!IS_MOBILE) {
            $input_noautofill = $jq("input[autocomplete='off']");
            $input_noautofill.attr('readonly', true);
            $input_noautofill.focusin(function () {
                $jq(this).removeAttr('readonly')
            });
            $input_noautofill.focusout(function () {
                $jq(this).attr('readonly', true);
            });
        }

        $jq('.fhs-textbox-alert').click(function () {
            let $alert_icon = $jq(this);
            let $input_group = $alert_icon.parents('.fhs-input-group');
            let $input_box = $alert_icon.parents('.fhs-input-box');
            let $text_box = $input_group.children('.fhs-textbox');
            if ($input_box.hasClass('checked-error')) {
                let $input_box = $input_group.parents('.fhs-input-box');
                let $alert_msg = $input_box.children('.fhs-input-alert');
                $alert_msg.empty();
                $text_box.val('');
                $input_box.removeClass('checked-error');
            }
            $text_box.focus();
        });
        $jq('.fhs-textbox-showtext').click(function () {
            let $show = $jq(this);
            let $input_group = $show.parents('.fhs-input-group');
            let $text_box = $input_group.children('.fhs-textbox');
            if ($text_box.attr('type') != 'text') {
                $text_box.prop("type", "text");
                $show.text($this.languages['hide']);
            } else {
                $text_box.prop("type", "password");
                $show.text($this.languages['show']);
            }
            $text_box.focus();
        });
        $jq('.fhs-textbox-registerquick-send').click(function () {
            $this.sentRegisterQuickPhoneOTP();
        });
        $jq('.fhs-btn-registerquick-cancel').click(function () {
            $this.RegisterQuickClose();
        });
        $jq('.fhs-btn-registerquick').click(function () {
            $this.RegisterQuick();
        });
    };
    this.eventPressRegisterQuick = function () {

        $jq('#registerquick_phone').keydown(function (e) {
            let key = '';
            let keyCode = 0;
            if (e.type === 'paste') {
                key = e.clipboardData.getData('text/plain');
            } else {
                keyCode = (e.keyCode ? e.keyCode : e.which);
                key = String.fromCharCode(keyCode);
            }

            if (!e.ctrlKey && !e.altKey) {
                if (!((keyCode >= 37) && (keyCode <= 40)) && (keyCode != 17) && !((keyCode >= 8) && (keyCode <= 9)) && !((keyCode >= 46) && (keyCode <= 47)) && (keyCode != 49) && (keyCode != 116)) {
                    if (!((keyCode >= 48 && keyCode <= 57) || (keyCode >= 96 && keyCode <= 105))) {
                        let regex = /[0-9]|\./;
                        if (!regex.test(key)) {
                            e.returnValue = false;
                            if (e.preventDefault) e.preventDefault();
                        }
                    }
                }
            }
        });
        $jq('#registerquick_phone').keyup(function (e) {
            let is_pass = false;

            let phone = $jq(this).val().trim();
            let phone_otp = $jq('#registerquick_phone_otp').val().trim();
            let password = $jq('#registerquick_password').val().trim();

            if (phone.length >= 10 && phone_otp.length == 6 && password.length >= $this.minLength) {
                is_pass = true;
            }
            $this.enableRegisterQuickButton(is_pass);

            let keycode = (e.keyCode ? e.keyCode : e.which);
            if (keycode == '13') {
                $this.sentRegisterQuickPhoneOTP();
            }
        });
        $jq('#registerquick_phone_otp').keyup(function (e) {
            let is_pass = false;

            let phone = $jq('#registerquick_phone').val().trim();
            let phone_otp = $jq(this).val().trim();
            let password = $jq('#registerquick_password').val().trim();

            if (phone.length >= 10 && phone_otp.length == 6 && password.length >= $this.minLength && $this.registerquick_sent_otp) {
                is_pass = true;
            }
            $this.enableRegisterQuickButton(is_pass);

            if (!$this.validateData('otp', phone_otp) && !$this.validateData('phone', phone) && $this.registerquick_sent_otp) {
                $this.postCheckRegisterQuickPhoneOTP(phone_otp);
            }
        })
            .on('paste', function (e) {
                setTimeout(function () {
                    let is_pass = false;

                    let phone = $jq('#registerquick_phone').val().trim();
                    let phone_otp = $jq('#registerquick_phone_otp').val().trim();
                    let password = $jq('#registerquick_password').val().trim();

                    if (phone.length >= 10 && phone_otp.length == 6 && password.length >= $this.minLength && $this.registerquick_sent_otp) {
                        is_pass = true;
                    }
                    $this.enableRegisterQuickButton(is_pass);

                    if (!$this.validateData('otp', phone_otp) && !$this.validateData('phone', phone) && $this.registerquick_sent_otp) {
                        $this.postCheckRegisterQuickPhoneOTP(phone_otp);
                    }
                }, 100);
            });
        $jq('#registerquick_password').keyup(function (e) {
            let is_pass = false;

            let phone = $jq('#registerquick_phone').val().trim();
            let phone_otp = $jq('#registerquick_phone_otp').val().trim();
            let password = $jq(this).val().trim();

            if (phone.length >= 10 && phone_otp.length == 6 && password.length >= $this.minLength) {
                is_pass = true;
            }
            $this.enableRegisterQuickButton(is_pass);

            let keycode = (e.keyCode ? e.keyCode : e.which);
            if (keycode == '13') {
                $this.RegisterQuick();
            }
        });
    };

    this.sentRegisterQuickPhoneOTP = function () {
        if ($this.registerquick_otp != '') { return; }

        let phone = $jq('#registerquick_phone');
        let phone_validated = $this.validateTextbox('registerquick_phone', phone.val().trim(), phone);

        if (!$this.sent_phone_otp) {
            let $phone_otp = $jq('#registerquick_phone_otp');
            $phone_otp.val('');
            $phone_otp.attr('disabled', 'disabled');
        }

        if (phone_validated) {
            $this.postSendRegisterQuickPhoneOTP(phone.val().trim());
        }
    };
    this.RegisterQuick = function () {
        let password = $jq('#registerquick_password');

        let password_validated = $this.validateTextbox('registerquick_password', password.val().trim(), password);

        if (password_validated) {
            $this.postRegisterQuick(password.val().trim());
        }
    };
    this.enableRegisterQuickButton = function (is_enable) {
        if (is_enable) {
            $jq('.fhs-btn-registerquick').removeAttr("disabled");
        } else {
            $jq('.fhs-btn-registerquick').attr("disabled", "disabled");
        }
    };
    this.RegisterQuickClose = function () {
        $jq('.youama-registerquick-window').fadeOut();
        $jq('.youama-ajaxlogin-cover').fadeOut();
    };

    //Common
    this.savePassword = function (username, password) {
        if (window.PasswordCredential) {
            var cr = new PasswordCredential({ id: username, password: password });
            navigator.credentials.store(cr);
        } else {
            Promise.resolve();
        }
    };
    this.validateEmail = function (emailAddress) {
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

        if (filter.test(emailAddress)) {
            return true;
        } else {
            return false;
        }
    };
    this.validateTaxcode = function (taxCode) {
        if ($this.isEmpty(taxCode)) {
            return false;
        }

        try {
            let taxCodeSplit = taxCode.split("-");
            if (taxCodeSplit.length > 2) {
                return false;
            }
            if (taxCodeSplit.length == 2) {
                let branchId = parseInt(taxCodeSplit[1]);
                if (branchId < 1 || branchId > 999) {
                    return false;
                }
            }
            let taxId = taxCodeSplit[0];
            if (taxId.length != 10) {
                return false;
            }
            let nArr = [];
            for (i = 0; i < 10; i++) {
                nArr[i] = parseInt(taxId.substring(i, i + 1));
            }
            // MOD(10-(S1*31+ S2*29 + S3*23 + S4*19 + S5*17 + S6*13 + S7*7 + S8*5 + S9*3),11) = S10
            let t = nArr[0] * 31
                + nArr[1] * 29
                + nArr[2] * 23
                + nArr[3] * 19
                + nArr[4] * 17
                + nArr[5] * 13
                + nArr[6] * 7
                + nArr[7] * 5
                + nArr[8] * 3;
            t = 10 - t;
            t = $this.mod(t, 11);
            if (t != nArr[9]) {
                return false;
            }
            return true;
        } catch (ex) { }
        return false;
    };
    this.mod = function (n, m) {
        var remain = n % m;
        return Math.floor(remain >= 0 ? remain : remain + m);
    };
    this.isEmpty = function (obj, isCheckLength = false) {
        try {
            if (typeof obj == 'undefined' || obj == null || obj == '') {
                return true;
            }
            for (var key in obj) {
                if (obj.hasOwnProperty(key))
                    return false;
            }
            if (Object.keys(obj).length !== 0) {
                return false;
            }
            if (isCheckLength) {
                if (Object.keys(obj).length === 0) {
                    return true;
                }
            }
            if (Number.isInteger(obj)) {
                return false;
            }
            if (Date.parse(obj)) {
                return false;
            }
            if (obj) {
                return false;
            }
            if (obj === false || obj === true) {
                return false;
            }
        } catch (ex) { }
        return true;
    };
    this.sanitizeHtmlInput = function (text) {
        return text.replace(/\&/g, '&amp;')
            .replace(/\</g, '&lt;')
            .replace(/\>/g, '&gt;')
            .replace(/\"/g, '&quot;')
            .replace(/\'/g, '&#x27;')
            .replace(/\\/g, '&#92;');
    };
    this.validateContainsSpecialCharacters = function (text) {
        var specialCharacters = ['<', '>', '"', '\''];
        for (var i = 0; i < specialCharacters.length; i++) {
            if (text.indexOf(specialCharacters[i]) !== -1) {
                return false;
            }
        }
        return true;
    };
    this.showDropDown = function ($drop_down_parent) {
        $this.hideAllDropDown();

        let $dropdown = $drop_down_parent.find('.fhs_dropdown');
        if ($dropdown.length > 0) {
            $dropdown.fadeIn(0);
        }
    };
    this.hideDropDown = function ($drop_down_parent) {
        let $dropdown = $drop_down_parent.find('.fhs_dropdown');
        if ($dropdown.length > 0) {
            $dropdown.fadeOut(0);
        }
    };
    this.hideAllDropDown = function () {
        $jq('.fhs_dropdown_cover').remove();
        $jq('.fhs_dropdown').fadeOut(0);
        $jq('#header').removeClass('active');
    };
    this.showTopCover = function ($drop_down_parent) {
        let $cover = $drop_down_parent.find('.fhs_dropdown_cover');
        if ($cover.length > 0) {
            $cover.remove();
        }
        if (!$drop_down_parent.hasClass('no_cover')) {
            $drop_down_parent.append('<div class="fhs_dropdown_cover" style="display:block;" onclick="fhs_account.hideTopCover($jq(this).parent());event.stopPropagation();"><div class="fhs_dropdown_cover_over"><div></div>');
            $jq('.fhs_dropdown_hover .fhs_dropdown_cover').hover(function () { $this.hideTopCover($jq(this)); });
        }
        $jq('#header').addClass('active');
    };
    this.hideTopCover = function ($drop_down_parent = null) {
        if (!is_in_search_form) {
            $this.hideAllDropDown();
            if ($drop_down_parent !== null) {
                $this.hideDropDown($drop_down_parent);
                $jq('.fhs_dropdown_cover').remove();
            }
        } else {
            is_in_search_form = false;
            is_focus_search_form = false;
            $this.hideAllDropDown();
            $this.hideDropDown($drop_down_parent);
            $jq('.fhs_dropdown_cover').remove();
        }
    };
    this.showPopupFull = function ($popup_parent) {
        let $popup = $popup_parent.find('.fhs_popup_full');
        if ($popup.length > 0) {
            if (!$popup.hasClass('active')) {
                $this.hideAllDropDown();
                $popup.addClass('active');
            }
        }
    };
    this.hidePopupFull = function ($popup_parent) {
        let $popup = $popup_parent.find('.fhs_popup_full');
        if ($popup.length > 0) {
            if ($popup.hasClass('active')) {
                $popup.removeClass('active');
            }
        }
    };
    this.showPopupFullCover = function ($popup_parent) {
        let $cover = $popup_parent.find('.fhs_popup_full_cover');
        if ($cover.length > 0) {
            $cover.remove();
        } else {
            $popup_parent.append('<div class="fhs_popup_full_cover" style="display:block;" onclick="fhs_account.hidePopupFullCover($jq(this).parent());event.stopPropagation();"></div>');
        }
    };
    this.hidePopupFullCover = function ($popup_parent = null) {
        if ($popup_parent !== null) {
            $this.hidePopupFull($popup_parent);
            setTimeout(function () { $jq('.fhs_popup_full_cover').remove(); }, 500);

        }
    };
    this.hideLoadingAnimation = function () {
        $jq('.loadding_ajaxcart,#wraper_ajax,.wrapper_box').remove();
    };
    this.showLoadingAnimation = function () {
        var loading_bg = $jq('#ajaxconfig_info button').attr('name');
        var opacity = $jq('#ajaxconfig_info button').attr('value');
        var style_wrapper = "position: fixed;top:0;left:0;filter: alpha(opacity=70); z-index:99999;background-color:" + loading_bg + "; width:100%;height:100%;opacity:" + opacity + "";
        var loading = '<div id ="wraper_ajax" style ="' + style_wrapper + '" ><div class ="loadding_ajaxcart" ><img class="default-icon-loading" src="' + $this.languages['img_loading'] + '"/></div></div>';
        if ($jq('#wraper_ajax').length == 0) {
            $jq('body').append(loading);
        }
    };
    this.showAlert = function (text) {
        if ($jq('.fhs_alert_box').length == 0) {
            $jq('body').append("<div class='fhs_alert_box'><div class='fhs_alert_box_text'>" + text + "</div></div>");
        } else {
            $jq('.fhs_alert_box').html("<div class='fhs_alert_box_text'>" + text + "</div>");
        }
        $jq('.fhs_alert_box_text').slideDown(500);
        setTimeout(function () { $jq('.fhs_alert_box_text').slideUp(); }, 1000);
    };
    this.animateLoader = function (step) {
        // Start
        if (step == 'start') {
            $jq('.youama-ajaxlogin-loader').fadeIn();
            $jq('.youama-login-window')
                .animate({ opacity: '0.5' });
            // Stop
        } else {
            $jq('.youama-ajaxlogin-loader').fadeOut('normal', function () {
                $jq('.youama-login-window')
                    .animate({ opacity: '1' });
            });
        }
    };
    this.isMobile = function () {
        try { document.createEvent("TouchEvent"); return true; }
        catch (e) { return false; }
    };
    this.formatDate = function (date) {
        var d = new Date(date),
            day = '' + d.getDate(),
            month = '' + (d.getMonth() + 1),
            year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [day, month, year].join('/');
    };
    this.execute = function (_script = '') {
        try {
            if (!$this.isEmpty(_script)) {
                $jq.globalEval(_script);
            }
        } catch (ex) { }
    };
    this.sleep = function (milliseconds) {
        var start = new Date().getTime();
        for (var i = 0; i < 1e7; i++) {
            if ((new Date().getTime() - start) > milliseconds) {
                break;
            }
        }
    };
    this.copyCouponCode = function (text) {
        if (this.copyToClipboard(text)) {
            this.showAlert($this.languages['copied']);
        }
    };
    this.copyToClipboard = function (text) {
        let result = false;
        try {
            var $temp = $jq("<input>");
            $jq("body").append($temp);
            $temp.val(text).select();
            document.execCommand("copy");
            $temp.remove();
            result = true;
        } catch (ex) { }
        return result;
    };
    this.shareFB = function (event, url, login_require = false) {
        if (login_require) {
            if (!$this.isLogin()) { return; }
        }
        FB.ui({
            method: 'share',
            href: url,
        }, function (response) {
            if (response && !response.error_message) {
                $this.getGilftIRS(url);
            }
        });
    };
    //IRS = Image render share
    this.getGilftIRS = function (sharedLink) {
        $this.showLoadingAnimation();
        $jq.ajax({
            url: '/event/index/getGilftIRS',
            method: 'post',
            dataType: "json",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: { sharedLink: sharedLink },
            error: function () {
                $this.hideLoadingAnimation();
                alert("Bạn đã chia sẻ thành công !");
            },
            success: function (data) {
                if (data['success']) {
                    if (!$this.isEmpty(data['img_background']) && !$this.isEmpty(data['msg'])) {
                        $this.showAlertMsg(data['img_background'], data['img_backgroud_width'], data['img_backgroud_height'], data['msg']);
                        if (data['result']) {
                            setTimeout(loadNoticationTop, 100);
                        }
                    } else {
                        alert("Bạn đã chia sẻ thành công !");
                    }
                } else {
                    alert("Bạn đã chia sẻ thành công !");
                }
                $this.hideLoadingAnimation();
            }
        });
    };
    this.showAlertMsg = function (background_img = '', width = '', height = '', msg, background_color = '#fff', ico_img = '', question_msg = '', btn_confirm_title = '', btn_confirm_script = '') {
        let cover = "<div class='youama-ajaxlogin-cover'></div>";
        let backgroud_img_srt = "";
        let background_color_srt = '';
        let ico_img_srt = "";
        if (!$this.isEmpty(background_img)) {
            backgroud_img_srt = "background: url(" + background_img + ") no-repeat center center; "
        }
        if (!$this.isEmpty(background_color)) {
            background_color_srt = 'background-color: ' + background_color + "; ";
        }
        if (!$this.isEmpty(ico_img)) {
            ico_img_srt = "<div style='position: absolute; top: 90px;left: 50%;-webkit-transform: translate(-50%, -45%);-ms-transform: translate(-50%, -45%);-moz-transform: translate(-50%, -45%);transform: translate(-50%, -45%);'><img src='" + ico_img + "'/></div>";
        }
        if (!$this.isEmpty(width) || Number.isInteger(width)) {
            width = "width: " + width + "px;";
        } else { width = ''; }

        if (!$this.isEmpty(height) || Number.isInteger(height)) {
            height = "height: " + height + "px;";
        } else { height = ''; }

        let popup_template = '';
        if (!$this.isEmpty(question_msg) && !$this.isEmpty(btn_confirm_title) && !$this.isEmpty(btn_confirm_script)) {
            popup_template = "<div id='fhs-popup-event-alert' style='" + width + height + background_color_srt + "'>"
                + "<div style='color:#212121;text-transform: uppercase;margin:24px 0 0 0; font-size: 1.23em; font-weight: 700;letter-spacing: 0px;'>" + question_msg + "</div>"
                + "<div class='fhs_center_top' style='color:#212121;margin:8px 24px 24px 24px;text-align: center; font-size: 1.23em;letter-spacing: 0px;'>" + msg + "</div>"
                + "<div class='fhs-btn-box-confirm'>"
                + "<button class='lg-close' type='button' title='" + $this.languages['cancel'] + "' onclick='fhs_account.closeAlertMsg();'><span>" + $this.languages['cancel'] + "</span></button>"
                + "<button class='lg-yes' type='button' title='" + btn_confirm_title + "' onclick='" + btn_confirm_script + "'><span>" + btn_confirm_title + "</span></button>"
                + "</div><div></div>"
                + "</div>";
        } else {
            popup_template = "<div id='fhs-popup-event-alert' style='" + width + height + backgroud_img_srt + background_color_srt + "'><div>" + msg + ico_img_srt + "</div>"
                + "<div style='padding-bottom:8px;'><button type='button' title='" + $this.languages['close'] + "' class='fhs_btn_default lg-close' onclick='fhs_account.closeAlertMsg();'><span>" + $this.languages['close'] + "</span></button></div>"
                + "</div>";
        }

        $jq("body").append(popup_template);
        $jq('.youama-ajaxlogin-cover').fadeIn(0);
    };
    this.closeAlertMsg = function () {
        $jq('#fhs-popup-event-alert').remove();
        $jq('.youama-ajaxlogin-cover').fadeOut(0);
    };
    this.getBlockId = function (block_id, title = '', width = null, height = null) {
        if ($this.isEmpty(block_id)) { return; }

        if ($this.block_ids[block_id]) { $this.showPopup(title, $this.block_ids[block_id], width, height); return; }
        if ($this.is_loading_block) { return; }
        $this.is_loading_block = true;
        $this.showLoadingAnimation();
        $jq.ajax({
            url: "/cmsjson/index/getBlock",
            method: 'post',
            data: { block_id: block_id },
            dataType: "json",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            success: function (data) {
                if (data['success']) {
                    $this.block_ids[block_id] = data['content'];
                    $this.showPopup(title, $this.block_ids[block_id], width, height);
                }
                $this.hideLoadingAnimation();
                $this.is_loading_block = false;
            },
            error: function () {
                $this.hideLoadingAnimation();
                $this.is_loading_block = false;
            }
        });
    };
    this.showPopup = function (title, content, width = null, height = null) {
        let block_size_style = '';
        if (!this.isEmpty(width)) {
            block_size_style = "width:" + width + ";";
        }
        if (!this.isEmpty(height)) {
            block_size_style += "height:" + height + ";";
        }
        if (!this.isEmpty(block_size_style)) {
            block_size_style = "style='" + block_size_style + "'";
        }
        let popup_template = "<div id='fhs_popup-default-info' " + block_size_style + ">"
            + "<div class='fhs_popup-default-info-detail'>"
            + "<div class='fhs_popup-default-info-detail-title'>"
            + "<div class='fhs_popup-default-info-detail-title-text'>"
            + "<div class='fhs_popup-default-info-detail-title-left'></div>"
            + "<div class='fhs_popup-default-info-detail-title-center'>" + title + "</div>"
            + "<div class='fhs_popup-default-info-detail-title-right lg-close' onclick='fhs_account.closePopup();'>"
            + "<span class='icon_close_gray'></span>"
            + "</div>"
            + "</div>"
            + "</div>"
            + "<div class='fhs_popup-default-info-detail-content'>"
            + content
            + "</div>"
        "</div>"
            + "</div>";
        $jq("body").append(popup_template);
        $jq('.youama-ajaxlogin-cover').fadeIn(0);
    };
    this.closePopup = function () {
        $jq('#fhs_popup-default-info').remove();
        $jq('.youama-ajaxlogin-cover').fadeOut(0);
    };
    this.getAddToCartButton = function (cart_info) {
        let result = "";
        let form_id = Math.floor(Math.random() * 1000000) + 1;
        if (cart_info) {
            if (cart_info['can_buy']) {
                let action_script = '';
                if (cart_info['action_script']) {
                    action_script = cart_info['action_script'];
                }
                let fhs_campaign = '';
                if (cart_info['fhs_campaign']) {
                    fhs_campaign = "'fhs_campaign':'" + cart_info['fhs_campaign'] + "'";
                }
                let my_script = "<script type='text/javascript'>"
                    + "var productAddToCartForm" + form_id + " = new VarienForm('product_addtocart_form_" + form_id + "');"
                    + "productAddToCartForm" + form_id + ".submit = function(button) {"
                    + "if(this.validator && this.validator.validate()){"
                    + "let is_buyNow = 'open_box';let this_button = \$jq(button);"
                    + "if(this_button.attr('is_buyNow')){"
                    + "is_buyNow = this_button.attr('is_buyNow');"
                    + "}"
                    + "try {"
                    + "let data = {"
                    + "'product_id':" + cart_info['product_id'] + "," + fhs_campaign
                    + "};"
                    + "ajaxToCart(this.form.action,data,'view',is_buyNow);"
                    + action_script
                    + "}catch(e){"
                    + "this.form.submit();}}return false;"
                    + "}.bind(productAddToCartForm" + form_id + ");"
                    + "</script>";

                result = "<form action='" + cart_info['action_form'] + "' method='post' id='product_addtocart_form_" + form_id + "'>"
                    + "<button type='button' onclick='event.stopPropagation(); productAddToCartForm" + form_id + ".submit(this); return false; ' title='" + $this.languages['add_to_cart'] + "' class='btn_add_cart'><span>" + $this.languages['add_to_cart'] + "</span></button>"
                    + "</form>"
                    + my_script;
            } else {
                result = "<button type='button' onclick=\"event.stopPropagation(); (function(){ fhs_account.showAlertMsg('',350,275,'" + $this.languages['out_of_stock'] + "', 'white','" + $this.languages['fail_icon'] + "');})(); \" title='" + $this.languages['add_to_cart'] + "' class='btn_add_cart'><span>" + $this.languages['add_to_cart'] + "</span></button>"
            }
        }
        return result;

    };
    this.hasEmojiIconInTextbox = function (str) {
        let new_str = $this.removeEmojiIcon(str);
        if (new_str != str) {
            return true;
        } else {
            return false;
        }
    };
    this.removeEmojiIcon = function (str) {
        let ranges = [
            '\ud83c[\udf00-\udfff]', // U+1F300 to U+1F3FF
            '\ud83d[\udc00-\ude4f]', // U+1F400 to U+1F64F
            '\ud83d[\ude80-\udeff]'  // U+1F680 to U+1F6FF
        ];
        try {
            str = str.replace(new RegExp(ranges.join('|'), 'g'), '');
        } catch (ex) { str = ''; }
        return str;
    };
    this.keepOnlyNumber = function (str) {
        return str.replace(/[^\d]/g, '')
    };
    this.clearAllQueryStringPram = function () {
        var uri = window.location.toString();
        if (uri.indexOf("?") > 0) {
            var clean_uri = uri.substring(0, uri.indexOf("?"));
            window.history.replaceState({}, document.title, clean_uri);
        }
    };
    this.updateQueryStringParam = function (key, value) {
        var baseUrl = [location.protocol, '//', location.host, location.pathname].join(''),
            urlQueryString = document.location.search,
            newParam = key + '=' + value,
            params = '?' + newParam;

        // If the "search" string exists, then build params from it
        if (urlQueryString) {
            var updateRegex = new RegExp('([\?&])' + key + '[^&]*');
            var removeRegex = new RegExp('([\?&])' + key + '=[^&;]+[&;]?');

            if (typeof value == 'undefined' || value == null || value == '') { // Remove param if value is empty
                params = urlQueryString.replace(removeRegex, "$1");
                params = params.replace(/[&;]$/, "");

            } else if (urlQueryString.match(updateRegex) !== null) { // If param exists already, update it
                params = urlQueryString.replace(updateRegex, "$1" + newParam);

            } else { // Otherwise, add it to end of query string
                params = urlQueryString + '&' + newParam;
            }
        }

        // no parameter was set so we don't need the question mark
        params = params == '?' ? '' : params;

        window.history.replaceState({}, "", baseUrl + params);
    };
    this.encodeHTML = function (str) {
        str = $this.decodeHTML(str);

        return str.replace(/([\u00A0-\u9999<>&])(.|$)/g, function (full, char, next) {
            if (char !== '&' || next !== '#') {
                if (/[\u00A0-\u9999<>&]/.test(next))
                    next = '&#' + next.charCodeAt(0) + ';';

                return '&#' + char.charCodeAt(0) + ';' + next;
            }

            return full;
        });
    };
    this.decodeHTML = function (str) {
        return $jq("<textarea/>").html(str).text();
    };
    this.animateLoaderBlock = function (step, element) {
        if ($this.isEmpty(element)) { return; }
        // Start
        let $content = element.parents('.fhs_checkout_block_content');
        if (step == 'start') {
            is_loading = true;
            $content.addClass('loading');
            // Stop
        } else {
            $content.removeClass('loading');
            is_loading = false;
        }
    };
    this.formatDateTime = function (date) {
        let datetime = new Date(date);
        let day = datetime.getDay();
        let dayofweek = $this.tranlateDayofweek(day);
        return dayofweek + " - " + $this.formatDateToDayAndMonth(datetime);
    };
    this.tranlateDayofweek = function (index) {
        let dayofweek = '';
        if ($this.languages['locale'] == 'vi_VN') {
            dayofweek = ["Chủ Nhật", "Thứ Hai", "Thứ Ba", "Thứ Tư", "Thứ Năm", "Thứ Sáu", "Thứ Bảy"];
        } else {
            dayofweek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        }
        return dayofweek[index];
    };
    this.formatDateToDayAndMonth = function (date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();
        if (month.length < 2) {
            month = '0' + month;
        }
        if (day.length < 2) {
            day = '0' + day;
        }
        return [day, month].join('/');
    };
    this.getFormattedDate = function (date) {
        let year = date.getFullYear();
        let month = (1 + date.getMonth()).toString().padStart(2, '0');
        let day = date.getDate().toString().padStart(2, '0');

        return day + '/' + month + '/' + year;
    };
    this.sizeCouponBg = function (e = null) {
        if (e != null) {
            if ($jq(e).length > 0) {
                let $path = $jq(e).find('path');
                if ($path.length > 0) {
                    let H = $jq(e).height();
                    let W = ($jq(e).width() - 15);
                    let viewbox = '7.5 ' + (((H + 2) - 146) * -1) + ' ' + (W - 2) + ' ' + (H + 2);
                    H = ((H - 24) * -1);
                    let path = '';
                    if ($jq(document).width() > 500) {
                        path = coupon_bg_path.replace('{{H}}', H).replace('{{W}}', W);
                    } else {
                        path = coupon_bg_mini_path.replace('{{H}}', H).replace('{{W}}', W);
                    }
                    $jq(e).get(0).setAttribute("viewBox", viewbox);
                    $path.attr('d', path);
                }
            }
        } else {
            $jq('.coupon_bg').each(function () {
                let $path = $jq(this).find('path');
                if ($path.length > 0) {
                    let H = $jq(this).height();
                    let W = ($jq(this).width() - 15);
                    let viewbox = '7.5 ' + (((H + 2) - 146) * -1) + ' ' + (W - 2) + ' ' + (H + 2);
                    H = ((H - 24) * -1);
                    let path = '';
                    if ($jq(document).width() > 500) {
                        path = coupon_bg_path.replace('{{H}}', H).replace('{{W}}', W);
                    } else {
                        path = coupon_bg_mini_path.replace('{{H}}', H).replace('{{W}}', W);
                    }
                    $jq(this).get(0).setAttribute("viewBox", viewbox);
                    $path.attr('d', path);
                }
            });
        }

    };
    this.hoverCouponBg = function () {
        $jq('.fhs-event-promo-list-item').hover(
            function () {
                let $coupon_bg = $jq(this).find('.coupon_bg');
                if ($coupon_bg.length > 0) {
                    let $path = $coupon_bg.find('path');
                    if ($path.length > 0) {
                        $path.attr('stroke', 'rgba(47, 128, 237, 1)');
                    }
                    //$coupon_bg.css('filter','drop-shadow(rgba(47, 128, 237, 1) 0px 1px 3px)');
                }
            },
            function () {
                let $coupon_bg = $jq(this).find('.coupon_bg');
                if ($coupon_bg.length > 0) {
                    let $path = $coupon_bg.find('path');
                    if ($path.length > 0) {
                        $path.attr('stroke', 'rgba(0,0,0,0)');
                    }
                    $coupon_bg.css('filter', 'drop-shadow(rgba(0, 0, 0, 0.15) 0px 1px 3px)');
                }
            }
        );
    };
    this.goto = function (e) {
        if (IS_MOBILE) {
            $jq('html, body').stop().animate({
                scrollTop: $jq(e).offset().top - 60
            }, 1000);
        } else {
            $jq('html, body').stop().animate({
                scrollTop: $jq(e).offset().top
            }, 1000);
        }
    };
    this.showBorderNeon = function (e, time_left = 3000) {
        if (!$jq(e).hasClass('animate_parent')) {
            $jq(e).addClass('animate_parent');
        }
        $jq(e).append('<span class="border_neon"></span>');
        setTimeout(function () { $jq(e).find('.border_neon').remove(); }, time_left);
    };
    this.clickActive = function (e) {
        $element = $jq(e);
        if ($element.hasClass('active')) {
            $element.removeClass('active');
        } else {
            $element.addClass('active');
        }
    };
    this.isLogin = function (add_to_cart_data = {}) {
        if ($this.isEmpty($this.myInfo['islogin'])) {
            $this.add_to_cart_data = add_to_cart_data;
            $this.showLoginPopup('login');
            return false;
        } else if (!$this.myInfo['islogin']) {
            $this.add_to_cart_data = add_to_cart_data;
            $this.showLoginPopup('login');
            return false;
        }
        return true;
    };
    this.isLoggined = function () {
        if (!$this.isEmpty($this.myInfo)) {
            if (!$this.isEmpty($this.myInfo['islogin'])) {
                if ($this.myInfo['islogin']) {
                    return true;
                }
            }
        }
        return false;
    };
    this.formatCurrency = function (value, symbol = ' đ') {
        value = Math.round(value); /// Example: 123000.000 -> 123000
        value = String(value).replace(/(.)(?=(\d{3})+$)/g, '$1.'); /// -> 123.000

        return value + symbol;
        if (value.startsWith('-.')) { $this.setCharAt(value, 1, ''); }

        return value + " đ";
    };
    this.setCharAt = function (str, index, chr) {
        if (index > str.length - 1) return str;
    },
        this.getProduct = function (item, slider_class = 'swiper-slide', is_show_addtocart_btn = true, is_discount_special = false) {
            let episode = '';
            let subscribes = '';
            let name = '';
            let img_sold_out = "";
            let body = '';
            let fhs_campaign = '';
            let comingsoon = '';
            let flashsale = '';
            let soldQty = '';

            if (!item['image_src'].startsWith('http', 0)) {
                if (!item['image_src'].startsWith('/', 0)) {
                    item['image_src'] = '/' + item['image_src'];
                }
            }

            if (item['product_name']) {
                name = $this.encodeHTML(item['product_name']);
            } else if (item['name_a_label']) {
                name = $this.encodeHTML(item['name_a_label']);
            } else if (item['seriesbook_name']) {
                name = $this.encodeHTML(item['seriesbook_name']);
            }

            if (item['fhs_campaign']) {
                fhs_campaign = item['fhs_campaign'];
            }

            if (item['type_id'] != 'series') {
                let rating_html = "<div class='desktop_only fhs-rating-container'><div class='ratings'><div class='rating-box'><div class='rating' style='width:0'></div></div></div></div>"
                    + "<div class='mobile_only fhs_center_left margin_top_small '><div class='icon-star deactive'></div><div class='rating-links'>0</div></div>";
                let btn_add_to_cart = '';
                let price = '';
                let discount = '';
                let discount_special = '';
                let bar_html = '';
                let progress_bar_sold_percent = '';
                let spaceSoldQty = '';

                if ((!$this.isEmpty(item['total_sold']) || item['total_sold'] == 0) && !$this.isEmpty(item['total_items']) && !$this.isEmpty(item['total_sold_text'])) {
                    item['total_sold'] = parseInt(item['total_sold']);
                    item['total_items'] = parseInt(item['total_items']);

                    if (item['total_sold'] >= item['total_items']) {
                        img_sold_out = "<div class='outstock-container'><img class='flashsale-item-chay-hang' src='" + SKIN_HOST + "frontend/ma_vanese/fahasa/images/flashsale/Chay-hang-icon.svg" + "'/></div>";
                    }
                    progress_bar_sold_percent = (item['total_sold'] / item['total_items']) * 100;

                    progress_bar_sold_percent = "<div class='progress' >"
                        + "<span class='progress-value'>"
                        + item['total_sold_text'] + " " + item['total_sold']
                        + "</span>"
                        + "<div class='progress-bar' role='progressbar' style='width: " + progress_bar_sold_percent + "%;' aria-valuenow='" + progress_bar_sold_percent + "' aria-valuemin='0' aria-valuemax='100'></div>"
                        + "</div>"
                }

                if (item['discount'] != null) {
                    item['discount_percent'] = item['discount'];
                }

                if (item['price'] != null) {
                    item['display_price'] = $this.formatCurrency(item['price']);
                }

                if (item['final_price'] != null) {
                    item['display_final_price'] = $this.formatCurrency(item['final_price']);
                }

                if (item['display_price'] != item['display_final_price']) {
                    price += "<p class='old-price'><span class='price'>" + item['display_price'] + "</span></p>";
                }

                if (item['discount_percent']) {
                    if (item['discount_percent'] > 0) {
                        if (item['discount_percent'] > 100) {
                            item['discount_percent'] = 100;
                        }
                        if (!is_discount_special) {
                            discount = "<span class='discount-percent fhs_center_left'>-" + Math.floor(item['discount_percent']) + "%</span>";
                        } else {
                            //label discount on flashsale page
                            discount_special = '';
                        }
                    }
                }

                if (!$this.isEmpty(item['episode'])) {
                    episode = "<div class='episode-label'>" + item['episode'] + "</div>";
                }
                if (is_show_addtocart_btn && item['add_to_cart_info']) {
                    let add_to_cart_info = [];
                    let isRenderAddToCartInfo = false;
                    if (item['add_to_cart_info']) {
                        item['add_to_cart_info']['fhs_campaign'] = Helper.getFhsCampaignFromStr(fhs_campaign);
                        btn_add_to_cart = $this.getAddToCartButton(item['add_to_cart_info']);
                        isRenderAddToCartInfo = true;
                    } else if (item['submitUrl']) {
                        // let add_to_cart_info = [];
                        if (item['stock_available'] == 'out_of_stock') {
                            add_to_cart_info['can_buy'] = false;
                        } else {
                            add_to_cart_info['can_buy'] = true;
                            add_to_cart_info['action_form'] = item['submitUrl'];
                        }
                        btn_add_to_cart = $this.getAddToCartButton(add_to_cart_info);
                        isRenderAddToCartInfo = true;
                    } else {
                        add_to_cart_info['can_buy'] = true;
                        add_to_cart_info['action_form'] = item['submitUrl'];
                    }
                    if (!isRenderAddToCartInfo) btn_add_to_cart = $this.getAddToCartButton(add_to_cart_info);
                }
                if (item['bar_html']) {
                    bar_html = item['bar_html'];
                }
                if (item['flashsale_id']) {
                    rating_html = "";
                }
                if (item['sold_qty'] && item['sold_qty'] > 0 && !item['flashsale_id']) {
                    let text = item['sold_qty'];
                    let textSold = 'Đã bán ';
                    let numSoldQty = this.parseNumSoldQty(text);
                    soldQty = "<div class='fhs-sold-qty-num'><span>" + textSold + '</span>' + numSoldQty + "</div>";
                    spaceSoldQty = "<span class='space-sold-qty'>|</span>";
                }
                if (!$this.isEmpty(item['rating_html'])) {
                    let cRating_html = item['rating_html'];
                    if (this.checkZeroRatingHtml(cRating_html)) {
                        cRating_html = "";
                        spaceSoldQty = "";
                    }

                    rating_html = "<div class='fhs-rating-container'>"
                        + cRating_html
                        + "<div class='fhs-container-sold-qty'>" + spaceSoldQty + soldQty + "</div>"
                        + "</div>";

                } else if (item['rating_count'] && item['rating_summary']) {
                    if (item['rating_summary'] > 100) {
                        item['rating_summary'] = 100;
                    }
                    rating_html = "<div class='fhs-rating-container'>";
                    rating_html += "<div class='desktop_only ratings'><div class='rating-box'><div class='rating' style='width:" + item['rating_summary'] + "%'></div></div></div></div>"
                    if (item['rating_summary'] > 0) {
                        rating_html += "<div class='mobile_only fhs_center_left margin_top_small'><div class='mobile-only icon-star active'></div><div class='rating-links'>" + this.roundedToFixed((5 * (item['rating_summary'] / 100)), 1) + "</div></div>";
                    } else {
                        rating_html += "<div class='mobile_only fhs_center_left margin_top_small'><div class='mobile-only icon-star deactive'></div><div class='rating-links'>0</div></div>";
                    }
                    rating_html += "<div class='fhs-container-sold-qty'>" + spaceSoldQty + soldQty + "</div>"
                    rating_html += "</div>";
                } else if (soldQty) {
                    rating_html = "<div class='fhs-rating-container'>" + soldQty + "</div>";
                }

                if (item['soon_release'] == 1) {
                    comingsoon = "<div><div class='hethang product-hh'>" + $this.languages['comingsoon'] + "</div></div>"
                } else if (item['soon_release'] != 0 && item['soon_release']) {
                    comingsoon = "<div><div class='hethang product-hh'>" + item['soon_release'] + "</div></div>"
                } else {
                    // comingsoon = "<div><div class='hethang product-hh-empty'></div><div>";
                    comingsoon = "";
                }

                if (item['flash_sale']) {
                    flashsale = "<div class='content-icon-flash-sale'><div class='icon-top-flash-sales'></div>Sale</div>"
                }

                body = "<h2 class='product-name-no-ellipsis'>"
                    + "<a href='" + item['product_url'] + fhs_campaign + "' title='" + name + "'>" + name + "</a>"
                    + "</h2>"
                    + "<div class='price-label'>"
                    + "<p class='special-price'>"
                    + "<span class='price m-price-font fhs_center_left'>" + item['display_final_price'] + "</span>"
                    + discount
                    + "</p>"
                    + price
                    + "</div>"
                    + rating_html
                    + "<div class='clear'></div>"
                    // +comingsoon
                    + bar_html
                    + progress_bar_sold_percent
                    + btn_add_to_cart;
            } else {
                let episode_series = '';
                let episode_display = '';

                if (item['episode_label']) {
                    episode_display = item['episode_label'];
                } else if (item['episode']) {
                    episode_display = item['episode'];
                }

                if (!$this.isEmpty(episode_display)) {
                    episode_series = "<div class='fhs-series-episode-label'>" + episode_display + "</div>";
                }
                if (item['subscribes']) {
                    subscribes = "<div class='fhs-series-subscribes'>" + item['subscribes'] + " lượt theo dõi" + "</div>"
                }
                body = "<h2 class='product-name-no-ellipsis fhs-series'>"
                    + "<a href='" + item['product_url'] + fhs_campaign + "' title='" + name + "' ><span class='fhs-series-label'><i></i></span>" + name + "</a>"
                    + "</h2>"
                    + episode_series
                    + subscribes;
            }


            return "<li class='fhs_product_basic " + slider_class + "'>"
                + "<div class='item-inner'>"
                + "<div class='ma-box-content'>"
                + "<div class='products clear'>"
                + "<div class='product images-container'>"
                + "<a href='" + item['product_url'] + fhs_campaign + "' title='" + name + "' class='product-image'>"
                + "<div class='product-image'>"
                + "<img class='lazyload' src='" + loading_icon_url + "' data-src='" + item['image_src'] + "' alt='" + name + "'>"
                + "</div>"
                + episode
                + comingsoon
                + flashsale
                + "</a>"
                + "</div>"
                + img_sold_out
                + "</div>"
                + "<div>"
                + body
                + "</div>"
                + "</div>"
                + "</div>"
                + "</li>";
        };

    this.showSlider = function (block_id, is_grid, data_lenght, slidesPerView = 5, slidesPerGroup = 5, btn_prev_class = 'swiper-button-prev', btn_next_class = 'swiper-button-next') {
        $jq('#' + block_id + ' .' + btn_next_class).hide();
        $jq('#' + block_id + ' .' + btn_prev_class).hide();

        if ($jq(window).width() < 992) {
            eval("var mySwiperAsidebar" + block_id + " = new Swiper($jq('#" + block_id + "_slider'), {"
                + "slidesPerView: 'auto',"
                + "freeMode: true,"
                + "direction: 'horizontal',"
                + "simulateTouch: true,"
                + "spaceBetween: 8,"
                + "});");
        } else {
            if (!is_grid && data_lenght && data_lenght > slidesPerGroup) {
                $jq('#' + block_id + ' .' + btn_next_class).show();
            }
            let row_param = "";
            if (is_grid) {
                row_param = "slidesPerColumnFill: 'row',slidesPerColumn: 2,";
            }
            const mySwiperAsidebar = new Swiper($jq('#' + block_id + '_slider'), {
                slidesPerView: slidesPerView,
                slidesPerGroup: slidesPerGroup,
                spaceBetween: 8,
                direction: 'horizontal',
                simulateTouch: true,
                navigation: {
                    nextEl: '#' + block_id + ' .' + btn_next_class,
                    prevEl: '#' + block_id + ' .' + btn_prev_class
                },
                on: {
                    slideChange: function () {
                        if (data_lenght) {
                            // on the first slide
                            let demSo = mySwiperAsidebar.activeIndex + slidesPerGroup;
                            if (mySwiperAsidebar.activeIndex == 0) {
                                $jq('#' + block_id + ' .' + btn_next_class).show();
                                $jq('#' + block_id + ' .' + btn_prev_class).hide();
                            }
                            // most right postion
                            else if (demSo == data_lenght) {
                                $jq('#' + block_id + ' .' + btn_next_class).hide();
                                $jq('#' + block_id + ' .' + btn_prev_class).show();
                            }
                            // middle positions
                            else {
                                $jq('#' + block_id + ' .' + btn_next_class).show();
                                $jq('#' + block_id + ' .' + btn_prev_class).show();
                            }
                            // --- end-swpier
                        }
                    }
                },
            });
        }
    };

    this.showSliderBannerMobile = function (block_id, is_grid, data_lenght, slidesPerView = 5, slidesPerGroup = 5) {
        const mySwiperAsidebar = new Swiper($jq('#' + block_id + '_slider'), {
            slidesPerView: 'auto',
            // slidesPerGroup: 10,
            freeMode: true,
            spaceBetween: 8,
            simulateTouch: true,
        })
    };

    this.sizeTooltipBg = function () {
        $jq('.fhs_tooltip_asidebar_bg').each(function () {
            let $path = $jq(this).find('path');
            if ($path.length > 0) {
                let H = $jq(this).height();
                let H0 = H - 16;
                let H1 = (H0 - 7) / 2;
                let W = $jq(this).width() - 10;
                let viewbox = '-8 ' + (H * (-1)) + ' ' + W + ' ' + H;
                H = ((H - 16) * -1);
                let path = tooltip_bg_path.replace('{{H0}}', H0).replace('{{H1}}', H1).replace('{{H2}}', H1).replace('{{W}}', (W - 16));
                $jq(this).get(0).setAttribute("viewBox", viewbox);
                $path.attr('d', path);
            }
        });
    };

    //flow fo category menu
    this.init_CategoryMenu = function (_category_menu_data) {
        $this.category_menu_data = _category_menu_data;
    };
    this.changeCatagoryMenu = function ($item) {
        $jq('.catalog_menu_nav_menu_item').removeClass('active');
        $item.addClass('active');

        let menu_id = $item.attr('menu_id');
        if ($this.category_menu_data[menu_id]) {
            let child = $this.category_menu_data[menu_id]['child'];
            let banners = $this.category_menu_data[menu_id]['banners'];

            $this.renderCatagoryMenuItem(child, banners);
        }
    }
    this.changeCatagoryMenuItem = function ($item) {
        let $child = $item.find('.catalog_menu_nav_content_item_child');
        if ($item.hasClass('active')) {
            if ($child.length > 0) {
                $child.slideDown(500)
            }
            $item.removeClass('active');
        } else {
            if ($child.length > 0) {
                $child.slideUp(500)
            }
            $item.addClass('active');
        }
    };
    this.renderCatagoryMenuItem = function (data, banners) {
        if (data == null) { return; }
        let content = '';

        Object.keys(data).forEach(function (key) {
            let item = data[key];
            let item_childs = item['child'];
            let item_html = '';
            let parent_html = '';
            let child_html = '';
            let banner_html = '';

            if (banners) {
                let banner_content = '';
                banners.forEach(function (banner) {
                    banner_content += "<a href='" + banner['url'] + "' class='swiper-slide fhs_center_left border_radius_normal' ><img class='lazyload' src='" + loading_icon_url + "' data-src='" + banner['img_src'] + "' /></a>"
                });
                if (!$this.isEmpty(banner_content)) {
                    banner_html = "<div class='catalog_menu_nav_content_banner'>"
                        + "<div class='swiper-wrapper fhs_center_left'>"
                        + banner_content
                        + "</div>"
                        + "</div>"
                        + "<script>new Swiper($jq(\".catalog_menu_nav_content_banner\"), {slidesPerView: 'auto',freeMode: true,direction: 'horizontal',simulateTouch: true,spaceBetween: 4});</script>"
                }
            }

            if (item_childs) {
                Object.keys(item_childs).forEach(function (key_clild) {
                    let item_child = item_childs[key_clild];

                    if (item_child['title'] != 'Xem tất cả') {
                        child_html += '<a href="' + item_child['url'] + '" class="catalog_menu_nav_content_item_child_item fhs_center_space">'
                            + '<div class="fhs_center_left">' + item_child['title'] + '</div>'
                            + '<div class="icon_seemore_gray right"></div>'
                            + '</a>';
                    } else {
                        child_html += '<a href="' + item_child['url'] + '" class="catalog_menu_nav_content_item_child_item more fhs_center_left">'
                            + '<div class="fhs_center_left">' + item_child['title'] + '</div>'
                            + '</a>';
                    }
                });

                item_html = '<div class="catalog_menu_nav_content_item fhs_column_left">'
                    + '<div class="fhs_center_space" onclick="fhs_account.changeCatagoryMenuItem($jq(this).parents(\'.catalog_menu_nav_content_item\'));">'
                    + '<div class="catalog_menu_nav_content_item_title fhs_center_left"><a class="fhs_center_left">' + item['title'] + '</a></div>'
                    + '<div class="catalog_menu_nav_content_item_icon fhs_center_center"><span></span></div>'
                    + '</div>'
                    + '<div class="catalog_menu_nav_content_item_child">'
                    + child_html
                    + '</div>'
                    + '</div>';
            } else {
                if (item['title'] != 'Xem tất cả') {
                    parent_html += '<a href="' + item['url'] + '" class="fhs_center_space">'
                        + '<div class="catalog_menu_nav_content_item_title fhs_center_left">' + item['title'] + '</div>'
                        + '<div class="catalog_menu_nav_content_item_icon fhs_center_center"><i class="icon_seemore_gray right"></i></div>'
                        + '</a>';
                } else {
                    parent_html += '<a href="' + item['url'] + '" class="catalog_menu_nav_content_item_title more fhs_center_left">'
                        + '<div class="fhs_center_left">' + item['title'] + '</div>'
                        + '</a>';
                }
                item_html = '<div class="catalog_menu_nav_content_item fhs_column_left">'
                    + banner_html
                    + parent_html
                    + '</div>';
            }


            content += item_html;
        });
        $jq('.catalog_menu_nav_content_items').html(content);
    };

    this.renderAsizebarContent = function (items, type = '') {
        var product_str = "";
        Object.keys(items).forEach(function (key) {
            if (type == 'seriesbook') {
                items[key]['type_id'] = 'series';
            }
            product_str += $this.getProduct(items[key]);
        });
        $asidebar = $jq('.fhs-asidebar');
        if ($asidebar.hasClass('productviewed') && type == 'productviewed') {
            $jq('.fhs-asidebar-content .fhs-product-grid-list').html(product_str);
        } else if ($asidebar.hasClass('suggestion') && type == 'suggestion') {
            $jq('.fhs-asidebar-content .fhs-product-grid-list').html(product_str);
        } else if ($asidebar.hasClass('seriesbook') && type == 'seriesbook') {
            $jq('.fhs-asidebar-content .fhs-product-grid-list').html(product_str);
        }
    };

    this.addToCart = function (is_register = false) {
        if ($this.is_redirect == '1') {
            if ($this.add_to_cart_data['url']) {
                let url = $this.add_to_cart_data['url'];
                let data = $this.add_to_cart_data['data'];
                let mine = $this.add_to_cart_data['mine'];
                let is_buyNow = $this.add_to_cart_data['is_buyNow'];

                ajaxToCart(url, data, mine, is_buyNow, true);
            } else {
                window.location = $this.redirect_url;
            }
        } else {
            if ($this.add_to_cart_data['url']) {
                let url = $this.add_to_cart_data['url'];
                let data = $this.add_to_cart_data['data'];
                let mine = $this.add_to_cart_data['mine'];
                let is_buyNow = $this.add_to_cart_data['is_buyNow'];

                ajaxToCart(url, data, mine, is_buyNow, true);
            } else {
                if (is_register) {
                    window.location = ACCOUNT_INFO;
                } else {
                    window.location.reload();
                }
            }
        }
    };
    this.parseCartData = function (data = {}) {
        if (this.isEmpty(data)) {
            data = {};
        }
        return data;
    };
    this.readCookie = function (name) {
        let cookie = {};
        document.cookie.split(';').forEach(function (el) {
            let [key, value] = el.split('=');
            cookie[key.trim()] = value;
        })
        return cookie[name];
    };
    this.getMyInfo = function () {
        $jq.ajax({
            url: ACCOUNT_ME,
            method: 'post',
            dataType: "json",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: { ajax: 'login', email: username, password: password },
            error: function () {
                $this.getMyInfoFailed = true;
                setTimeout(function () { $jq(window).trigger("myInfo_loaded"); }, 500);
                setTimeout(function () { $jq(window).trigger("myInfo_loaded_html"); }, 1);
            },
            success: function (data) {
                if (data['success']) {
                    $this.myInfo = data;
                    $jq(window).trigger("notification_button_loaded");
                    setTimeout(function () { $jq(window).trigger("myInfo_loaded"); }, 500);
                    setTimeout(function () { $jq(window).trigger("myInfo_loaded_html"); }, 1);
                }
            }
        });
    }

    this.initHtmlMyInfo = function (_data_language) {
        let info = $this.myInfo;
        let data_language = _data_language;
        if ($this.getMyInfoFailed) {
            $this.renderHtmlAcountNotLogin(data_language)
            $this.renderHtmlNotication(data_language, false)
        } else {
            if (info && info.success && info.islogin) {
                $this.renderHtmlNotication(data_language, info.islogin)
                $this.renderHtmlAcountLogin(info, data_language)
            } else {
                $this.renderHtmlNotication(data_language, info.islogin)
                $this.renderHtmlAcountNotLogin(data_language)
            }
        }

    }

    this.renderHtmlAcountNotLogin = function (data_language) {
        let Login = data_language['Login'];
        let Sign_Up = data_language['Sign_Up'];
        let Login_With_facebook = data_language['Login_With_facebook'];
        let Account_Title = data_language['Account_Title'];

        let html = ''
            + '<div class="fhs_top_account_dropdown fhs_dropdown right guest">'
            + '<div><button type="button" onclick="fhs_account.showLoginPopup(\'login\');" title="' + Login + '" class="fhs_btn_default active" ><span>' + Login + '</span></button></div>'
            + '<div><button type="button" onclick="fhs_account.showLoginPopup(\'register\')" title="' + Sign_Up + '" class="fhs_btn_default" ><span>' + Sign_Up + '</span></button></div>'
            + '<div><button type="button" onclick="fhs_account.loginFB();" title="' + Login_With_facebook + '" class="fhs_btn_default blue active" ><span class="icon_facebook" style="margin-right: 4px;"></span><span>' + Login_With_facebook + '</span></button></div>'
            + '</div>';

        $jq('#fhs_top_account_title').text(Account_Title);
        $jq('#fhs_top_account_hover').append(html);
    }

    this.renderHtmlAcountLogin = function (info, data_language) {
        let icon_level_vip = "ico_vip_copper";
        let labelMemner = "Thành viên Fahasa";

        let Account_Title = data_language['Account_Title'];
        let F_Point_Account = data_language['F_Point_Account'];
        let Log_Out_Account = data_language['Log_Out_Account'];
        let My_Orders = data_language['My_Orders'];
        let Wishlist_Product = data_language['Wishlist_Product'];
        let Wallet_Voucher = data_language['Wallet_Voucher'];

        let fullname = info.full_name ? info.full_name : "";
        let title_account = info.title_account ? info.title_account : Account_Title;

        let html = ''
            + '<div class="fhs_top_account_dropdown fhs_dropdown right min">'
            + '<div>'
            + '<a class="fhs_center_space" href="/customer/account/">'
            + '<div class="fhs_center_left">'
            + '<div class="fhs_center_left ' + icon_level_vip + '" style="margin-right:8px"></div>'
            + '<div>'
            + '<div class="fhs_center_left fhs_nowrap_one" style="font-size: 1.23em; color: #0D0E0F; font-weight: bold;max-width: 200px;height: 22px; text-transform: capitalize;">'
            + fullname
            + '</div>'
            + '<div class="fhs_center_left" style="height: 22px;">'
            + labelMemner
            + '</div>'
            + '</div>'
            + '</div>'
            + '<div class="icon_seemore_gray right" style="width:24px;height:24px;"></div>'
            + '</a>'
            + '</div>'
            + '<div style="border-top: 1px solid #F2F4F5;"><a class="fhs_center_left" href="/sales/order/history/"><span class="icon_bill_gray" style="margin-right:8px;"></span><span>' + My_Orders + '</span></a></div>'
            + '<div style="border-top: 1px solid #F2F4F5;"><a class="fhs_center_left" href="/wishlist/"><span class="ico_heart_gray" style="margin-right:8px;"></span><span>' + Wishlist_Product + '</span></a></div>'
            + '<div style="border-top: 1px solid #F2F4F5;"><a class="fhs_center_left" href="/tryout/voucher/"><span class="ico_voucher_gray" style="margin-right:8px;"></span><span>' + Wallet_Voucher + '</span></a></div>'
            + '<div class="fhs_center_space" style="border-top: 1px solid #F2F4F5;">'
            + '<div class="fhs_center_left fhs_nowrap_one fhs_flex_grow"><a class="fhs_center_left fhs_flex_grow" href="/tryout/history/"><span class="ico_fpoint_gray" style="margin-right:8px;"></span><span>' + F_Point_Account + '</span></a></div>'
            + '</div>'
            + '<div class="fhs_center_left fhs_mouse_point" style="border-top: 1px solid #F2F4F5;"><a class="fhs_center_left fhs_flex_grow" href="/customer/account/logout/"><span class="ico_logout_gray" style="margin-right:8px;"></span><span>' + Log_Out_Account + '</span></a></div>'
            + '</div>';

        $jq('#fhs_top_account_title').text(title_account);
        $jq('#fhs_top_account_hover').append(html);
    }


    this.renderHtmlNotication = function (data_language, islogin) {
        let strlogin = '';
        let strSpace = '';
        let htmlCustomerNoti = '';
        let htmlCustomerNotiContent = '';

        // text :
        let Notification = data_language['Notification'];
        let View_All = data_language['View_All'];
        let Please_Login_For = data_language['Please_Login_For'];
        let View_Notification = data_language['View_Notification'];
        let Login = data_language['Login'];
        let Sign_Up = data_language['Sign_Up'];

        if (islogin) {
            strlogin = 'min';
            strSpace = 'fhs_center_space';
            htmlCustomerNoti = ""
                + '<a href="/customer/notification" class="fhs_center_left" style="color: #2489F4; font-size: 1.1em;">'
                + View_All
                + '</a>';

            htmlCustomerNotiContent = ""
                + '<div class="top-notification-loading fhs_center_center" style="padding:16px;">'
                + '<div class="ico_loading_cirle"></div>'
                + '</div>'
                + '<div class="top-notification-list fhs_scrollbar"></div>'
                + '<div class="top-notification-footer"></div>';

        } else {
            htmlCustomerNotiContent = ""
                + '<div class="fhs_center_center" style="padding: 24px;"><span class="ico_notlogin"></span></div>'
                + '<div class="fhs_center_center" style="color: #0D0E0F; font-size: 1.23em;">' + Please_Login_For + '</div>'
                + '<div class="fhs_center_center" style="color: #0D0E0F; padding-bottom:24px; font-size: 1.23em;">' + View_Notification + '</div>'
                + '<div style="padding:0 16px 8px 16px;"><button type="button" onclick="fhs_account.showLoginPopup(\'login\');" title="' + Login + '" class="fhs_btn_default active" ><span>' + Login + '</span></button></div>'
                + '<div style="padding:0 16px 16px 16px;"><button type="button" onclick="fhs_account.showLoginPopup(\'register\');" title="' + Sign_Up + '" class="fhs_btn_default" ><span>' + Sign_Up + '</span></button></div>';
        }

        let html = ""
            + '<div class="top-notification-menu fhs_top_noti_dropdown fhs_dropdown ' + strlogin + '">'
            + '<div style="padding:16px;border-bottom: 1px solid #F2F4F5; font-weight: bold;" class="' + strSpace + '">'
            + '<div class="fhs_center_left" style="font-size: 1.23em; color: #0D0E0F;">'
            + '<span class="icon_nofi_black" style="width:16px;height:16px;margin-right: 8px;"></span>'
            + '<span>' + Notification + '</span>'
            + '<span class="fhs_notification_unseen" style="margin-left:4px;"></span>'
            + '</div>'
            + htmlCustomerNoti
            + '</div>'
            + htmlCustomerNotiContent
            + '</div>'

        $jq('#top-notification-menu-render').append(html);
        // trigget event top_notification :
        if (!$this.getMyInfoFailed) {
            //            $this.actionEventNotification();
            setTimeout(function () { $jq(window).trigger("notification_loaded"); }, 1);
        }
    }

    this.roundedToFixed = function (input, digits) {
        var rounded = Math.pow(10, digits);
        return (Math.round(input * rounded) / rounded).toFixed(digits);
    }

    this.getUrl = function (url) {
        let linkUrl = url;
        try {
            if (!linkUrl.startsWith('http', 0)) {
                if (!linkUrl.startsWith('/', 0)) {
                    linkUrl = '/' + linkUrl;
                }
            }
        } catch (x) {
            linkUrl = ''
        }
        return linkUrl;
    }

    this.onTrackingChangeInfo = function (infor = {}, trackingAction = true, action = '') {
        // moengage :
        try {
            let info = {
                'firstName': infor.firstName ? infor.firstName : '',
                'lastName': infor.lastName ? infor.lastName : '',
                'fullName': infor.fullName ? infor.fullName : '',
                'telephone': infor.telephone ? infor.telephone : 0,
                'email': infor.email ? infor.email : '',
                'gender': infor.gender ? infor.gender : ''
            }
            // meogage update_profile:
            if (info.firstName && info.lastName) { Moengage.add_user_name(info.fullName); }
            if (info.firstName) Moengage.add_first_name(info.firstName);
            if (info.lastName) Moengage.add_last_name(info.lastName);
            if (info.telephone) Moengage.add_mobile(info.telephone);
            if (info.email) Moengage.add_email(info.email);
            if (info.gender) Moengage.add_gender(info.gender);
            // moengage track
            if (trackingAction && action) Moengage.track_event(action, info);
        }
        catch (err) {
            console.log("err moe", err)
        }

    }

    this.onTimeTracking = function (minutes = 1) {
        var date = new Date();
        return date.setTime(date.getTime() + (minutes * 60 * 1000));
    }

    this.onTriggerTracking = function (action = '', dataTracking = {}) {
        let type = 'unknow';
        let date = $this.onTimeTracking();
        switch (action) {
            case 'set_login':
                type = dataTracking.type ? dataTracking.type : 'unknow';
                $jq.cookie("tracking_login", dataTracking.type, { expires: date });
                break;
            case 'set_register':
                type = dataTracking.type ? dataTracking.type : 'unknow';
                $jq.cookie("tracking_register", type, { expires: date });
                break;
            case 'login':
                $this.onTrackingChangeInfo(dataTracking, true, 'fahasa_login');
                break;
            case 'register':
                $this.onTrackingChangeInfo(dataTracking, true, 'fahasa_register');
                break;
            case 'info':
                $this.onTrackingChangeInfo(dataTracking, true, 'update_profile');
                break;
            default:
        }

    }

    this.onUpdateMyInfo = function (data = {}) {
        $jq.ajax({
            url: UPDATE_MYINFO,
            method: 'post',
            dataType: "json",
            contentType: "application/json",
            data: JSON.stringify(data),
            error: function () { console.log("ERROR_UPDATE_MY_INFO") },
            success: function (data) { }
        });
    };

    this.parseNumSoldQty = function (number) {
        if (number > 10000) {
            return "10k+";
        } else if (number >= 1000) {
            return (number / 1000).toFixed(1) + "k";
        } else {
            return number.toString();
        }
    }

    this.checkZeroRatingHtml = function (string) {
        let regex = /<div class="amount">\(0\)<\/div>/;
        if (string.match(regex)) {
            return true;
        }
        return false;
    }

    this.getValueRatingHtml = function (string) {
        // let regex = /<div class="amount">\((\d+)\)<\/div>/;
        let regex = /<div class="rating" style="width:(\d+(\.\d+)?)%"><\/div>/;
        if (string.match(regex)) {
            const match = string.match(regex);
            if (match) {
                const extractedNumber = match[1];
                return this.parseNumSoldQty(extractedNumber);
            } else {
            }
        }
        return 0;
    }

}
