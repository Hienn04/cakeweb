/**
 * show modal dialog confirm
 * @param {String} message message to confirm
 * @param {Function} preConfirmCallback function call back when confirm
 */
function showConfirmDialog(message, preConfirmCallback) {
    Swal.fire({
        text: message,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Hủy bỏ',
        confirmButtonText: 'Đồng ý',
        preConfirm: preConfirmCallback
    });
}

/**
 * show success message
 * @param {String} mess
 * @param {Function} callback function call back when notification done
 */
function notiSuccess(mess = 'Thành công', position = 'top-end', callback = function () { }) {
    $('#alert-error').addClass('d-none');
    const Toast = Swal.mixin({
        toast: true,
        position: position,
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'success',
        title: mess
    }).then(() => {
        callback();
    });
}

/**
 * show error message
 * @param {String} mess
 */
function notiError(mess = "Đã xảy ra lỗi. Vui lòng thử lại.") {
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: mess,
    });
};

/**
 * handle image
 * @param {Element} input
 * @param {Element} image
 */
function handleImageUpload(input, image) {
    if (input.files && input.files[0]) {
        $(image).attr('src', URL.createObjectURL(input.files[0]));
    }
}