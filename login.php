<!DOCTYPE html>
<html>
<head>
	<title>Login | RTMS</title>
	<meta charset="UTF-8">
	<meta name="description" content="IPBM's RTMS">
	<meta name="keywords" content="RTMS, LSPU, Laguna State Polytechnic University">
	<meta name="author" content="Mark Nicholas Razon">
	<link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="assets/css/style.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

	<section class="log-page-bg">
		<div id="validation"></div>
		<form method="post" action="#" id="login-form">
			<img src="assets/img/logo.jpg"><br>
			<label for="email">
				<input type="email" name="email" placeholder="Email" autocomplete="off" autofocus="">
			</label><br>
			<label for="password">
				<input type="password" name="password" placeholder="Password" autocomplete="off">
			</label><br>
			<button type="submit">Login</button>
			<div class="option-handler">
				<a href="register" class="register-anchor">Create account</a>
				<a href="forgot-password" class="forgot-anchor">Forgot Password?</a>
			</div>
			<span>Developed by <a href="#" onclick="window.open('https://web.facebook.com/nicholas.razon.37')">Mark Nicholas Razon</a></span>
		</form>
	</section>

<script>
$(document).ready(function(){
    $('#login-form').submit(function(e){
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: 'access/login',
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(response){
                if (response.status == 'success') {
                    $('#validation').html('<div class="validation-handler success-handle"><img src="assets/svg/success.svg"><span class="success">' + response.message + '</span></div>');
                    $('#login-form')[0].reset();
                    window.location.href = response.redirect;
                } else {
                    $('#validation').html('<div class="validation-handler error-handle"><img src="assets/svg/error.svg"><span class="danger">' + response.message + '</span></div>');
                }
            },
            error: function(){
                $('#validation').html('<div class="validation-handler error-handle"><img src="assets/svg/error.svg"><span class="danger">An error occurred. Please try again later.</span></div>');
            }
        });
    });
});
</script>
</body>
</html>
