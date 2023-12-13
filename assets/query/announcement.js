$(document).ready(function() {
    $('#ann-form-panel').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '../access/admin/create-announcement',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#validation').html('<div class="validation-handler success-handle"><img src="../assets/svg/success.svg"><span class="success">' + response.message + '</span></div>');
                    $('#preview-photo img').attr('src', '');
                    $('.summernote').summernote('code', '');
                    $('#ann-form-panel')[0].reset();
                } else {
                    $('#validation').html('<div class="validation-handler error-handle"><img src="../assets/svg/error.svg"><span class="danger">' + response.message +'</span></div>');
                }
            },
            error: function(xhr, status, error) {
                $('#validation').html('<div class="validation-handler error-handle"><img src="../assets/svg/error.svg"><span class="danger">' + error +'</span></div>');
            }
        });
    });
});