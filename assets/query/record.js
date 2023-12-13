$(document).ready(function() {
    $('.record-form-grid').submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '../access/admin/create-technology', // Replace with the correct path to your PHP file
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status === 'success') {
                    $('#validation').html('<div class="validation-handler success-handle"><img src="../assets/svg/success.svg"><span class="success">' + data.message + '</span></div>');
                    $('.record-form-grid')[0].reset();
                    $('#preview-record-img').attr('src', '');
                    $('.summernote').each(function() {
				        $(this).summernote('code', ''); 
				    });
                } else {
                    $('#validation').html('<div class="validation-handler error-handle"><img src="../assets/svg/error.svg"><span class="danger">' + data.message +'</span></div>');
                }
            },
            error: function(xhr, status, error) {
                $('#validation').html('<div class="validation-handler error-handle"><img src="../assets/svg/error.svg"><span class="danger">' + error +'</span></div>');
            }
        });
    });
});