<!-- Modal -->
<div class="modal fade" id="updateCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleCategoryModal">Tạo mới danh mục</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_category">
                    <input type="hidden" name="categoryId" id="categoryId">
                    <div class="mb-4">
                        <label for="categoryName" class="form-label">Tên danh mục<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="categoryName" name="name">


                    </div>
                    <div class="">
                        <label for="cateImage" class="form-label">Ảnh</label>
                        <input type="file" class="form-control" id="cateImage" name="image">
                    </div>
                    <div class="w-100 d-flex justify-content-center my-2" id="imageCatePreviewContainer">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                <button id="btnSaveCategory" type="button" onclick="doSubmitCategory()" class="btn btn-primary">Lưu
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    /**
     * Submit form cateogry
     */
    function doSubmitCategory() {
        let formData = new FormData($('form#form_category')[0]);
        if ($('#categoryId').val() == '') {
            showConfirmDialog('Bạn có chắc chắn muốn tạo danh mục này không?', function() {
                createCategory(formData);
            });
        } else {
            showConfirmDialog('Bạn có chắc chắn muốn cập nhật danh mục này không?', function() {
                updateCategory(formData);
            });
        }
    }

    /**
     * Tạo mới danh mục
     */
    function createCategory(data) {
        $.ajax({
            type: "POST"
            , url: "{{ route('admin.category.create') }}"
            , contentType: false
            , processData: false
            , headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            , data: data,

        }).done(function(res) {
            if (res == 'ok') {
                notiSuccess('Danh mục được tạo thành công');
                searchCategory();
                $('#updateCategoryModal').modal('toggle');
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

    }

    /**
     * Cập nhật danh mục
     */
    function updateCategory(data) {
        $.ajax({
            type: "POST"
            , url: "{{ route('admin.category.update') }}"
            , contentType: false
            , processData: false
            , headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            , data: data
        , }).done(function(res) {
            if (res == 'ok') {
                notiSuccess('Danh mục được cập nhật thành công');
                searchCategory();
                $('#updateCategoryModal').modal('toggle');
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
    }

    $(document).ready(function() {

        // sự kiện hiển thị modal 
        $('#updateCategoryModal').on('shown.bs.modal', function(e) {
            var data = $(e.relatedTarget).data('item');
            let imagePreviewHtml = '';
            if (data) {
                imagePreviewHtml = `<img src="/storage/${data.image}" id="imageCatePreview" />`
                $("#categoryId").val(data.id);
                $("#categoryName").val(data.name);
                $('#imageCatePreviewContainer').html(imagePreviewHtml);
                $('#titleCategoryModal').html('Cập nhật danh mục');
            } else {
                 imagePreviewHtml =
                    `<img src="{{ asset('images/default-img.png') }}" id="imageCatePreview" />`;
                $("#categoryId").val("");
                $("#categoryName").val("");
                $('#imageCatePreviewContainer').html(imagePreviewHtml);
                $('#titleCategoryModal').html('Tạo mới danh mục');
            }
        });
    })
    $(document).ready(function() {
        // Add/change image for post
        $('#cateImage').on('change', function() {
            handleImageUpload(this, $('#imageCatePreview'));
        });
        // Click to submit the post
        $('#btnSaveCategory').click(function(e) {
            e.preventDefault();
            doSubmitCategory($(this));
        });
    })

</script>
