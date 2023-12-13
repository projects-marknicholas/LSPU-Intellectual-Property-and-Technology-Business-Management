$(document).ready(function() {
	let shouldFetchData = true;

    function fetchData() {
    	if(shouldFetchData){
    		$.ajax({
	            type: 'POST',
	            url: '../access/admin/display-account',
	            dataType: 'json',
	            success: function(response) {
	                if (response.status === 'success') {
	                    $('.account-email input').val(response.message.email);
	                    $('.account-password input').val(response.message.password);
	                    $('.account-phone input').val(response.message.phone);
	                    $('.account-firstname input').val(response.message.firstname);
	                    $('.account-middlename input').val(response.message.middlename);
	                    $('.account-lastname input').val(response.message.lastname);
	                    $('.account-role input').val(response.message.role);
	                    $('.account-branch input').val(response.message.branch);

	                    // Set default profile photo
	                    $('#preview-photo img').attr('src', response.message.profile_photo);
	                } else {
	                    console.log(response.message);
	                }
	            },
	            error: function(xhr, status, error) {
	                console.error('Error:', status, error);
	            }
	        });
    	}
    }

    // Fetch data initially
    fetchData();

    // Watch for changes in form fields
    $('.account-settings-grid input').on('input', function() {
        shouldFetchData = true;
    });

    // When a new file is selected
    $('#photo').on('change', function() {
    	shouldFetchData = false;
        var fileName = $(this).val().split('\\').pop(); // Get the file name
        $('#photo-directory').text('(' + fileName + ')'); // Display it in #photo-directory
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#preview-photo img').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

    $('.account-settings-grid').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '../access/admin/update-account', // Update with the correct path
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                response = JSON.parse(response);
                if (response.status === 'success') {
                    $('#validation').html('<div class="validation-handler success-handle"><img src="../assets/svg/success.svg"><span class="success">' + response.message + '</span></div>	');
                    $('#photo-directory').hide();
                    $('.account-phone input').focus();
                    shouldFetchData = true;
                } else {
                    $('#validation').html('<div class="validation-handler error-handle"><img src="../assets/svg/error.svg"><span class="danger">' + response.message + '</span></div>');
                    shouldFetchData = true;
                }
            },
            error: function(xhr, status, error) {
            	$('#validation').html('<div class="validation-handler error-handle"><img src="../assets/svg/error.svg"><span class="danger">' + error + '</span></div>');
                alert('Error:', status, error);
                shouldFetchData = true;
            }
        });
    });
});