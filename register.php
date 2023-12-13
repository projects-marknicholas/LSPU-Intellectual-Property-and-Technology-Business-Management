<!DOCTYPE html>
<html>
<head>
	<title>Register | RTMS</title>
	<meta charset="UTF-8">
	<meta name="description" content="IPBM's RTMS">
	<meta name="keywords" content="RTMS, LSPU, Laguna State Polytechnic University">
	<meta name="author" content="Mark Nicholas Razon">
	<link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="assets/css/style.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

	<section class="reg-page-bg">
		<div id="validation"></div>
		<form method="post" action="access/register" enctype="multipart/form-data" id="registration-form">
			<div class="header-form">
				<img src="assets/img/logo.jpg">
				<span>
					<h1>IPTBM's RTMS</h1>
					<i>Laguna State Polytechnic University</i>
				</span>
			</div>
			<div class="reg-grid">
				<div class="grid-item grid-photo">
					<div id="preview-photo">Choose photo</div>
					<label for="photo">
						<input type="file" id="photo" name="photo" required="">
					</label>
				</div>
				<div class="grid-item grid-email">
					<label for="email">
						<input type="email" name="email" autofocus="" autocomplete="off" placeholder="Email">
					</label>
				</div>
				<div class="grid-item grid-password">
					<label for="password">
						<input type="password" name="password" autocomplete="off" placeholder="Password">
					</label>
				</div>
				<div class="grid-item grid-confirm-password">
					<label for="confirm-password">
						<input type="password" name="confirm-password" autocomplete="off" placeholder="Confirm Password">
					</label>
				</div>
				<div class="grid-item grid-firstname">
					<label for="firstname">
						<input type="text" name="firstname" autocomplete="off" placeholder="First Name">
					</label>
				</div>
				<div class="grid-item grid-middlename">
					<label for="middlename">
						<input type="text" name="middlename" autocomplete="off" placeholder="Middle Name">
					</label>
				</div>
				<div class="grid-item grid-lastname">
					<label for="lastname">
						<input type="text" name="lastname" autocomplete="off" placeholder="Last Name">
					</label>
				</div>
				<div class="grid-item grid-role">
					<label for="role">
						<input type="text" list="role" name="role" autocomplete="off" placeholder="Role">
						<datalist id="role">
					        <option value="General User">General User</option>
							<option value="Admin">Admin</option>
					    </datalist>
					</label>
				</div>
				<div class="grid-item grid-branch">
					<label for="branch">
						<input type="text" list="branch" name="branch" autocomplete="off" placeholder="Branch">
						<datalist id="branch">
					        <option value="Los Baños">Los Baños</option>
					        <option value="San Pablo">San Pablo</option>
					        <option value="Sta. Cruz">Sta. Cruz</option>
					        <option value="Siniloan">Siniloan</option>
					    </datalist>
					</label>
				</div>
				<div class="grid-item grid-register">
					<button type="submit">Register</button>
				</div>
			</div>
			<div class="option-handler">
				<a href="login" class="login-anchor">Sign in</a>
				<span>Developed by <a href="#" onclick="window.open('https://web.facebook.com/nicholas.razon.37')">Mark Nicholas Razon</a></span>
			</div>
		</form>
	</section>

<script src="assets/js/preview-photo.js"></script>
<script>
$(document).ready(function(){
    $('#registration-form').submit(function(e){
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: 'access/register',
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(response){
                if (response.status == 'success') {
                    $('#validation').html('<div class="validation-handler success-handle"><img src="assets/svg/success.svg"><span class="success">' + response.message + '</span></div>');
                    $('#registration-form')[0].reset();
                    window.location.href = response.redirect;
                } else {
                    $('#validation').html('<div class="validation-handler error-handle"><img src="assets/svg/error.svg"><span class="danger">' + response.message + '</span></div>');
                }
            },
            error: function(){
                $('#registration-form')[0].reset();
                window.location.href = 'login';
            }
        });
    });
});
</script>

</body>
</html>
