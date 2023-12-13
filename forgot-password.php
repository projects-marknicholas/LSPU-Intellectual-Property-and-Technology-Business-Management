<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password | RTMS</title>
	<meta charset="UTF-8">
	<meta name="description" content="IPBM's RTMS">
	<meta name="keywords" content="RTMS, LSPU, Laguna State Polytechnic University">
	<meta name="author" content="Mark Nicholas Razon">
	<link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

	<section class="log-page-bg">
		<!-- Validation box
		Success
		<div class="validation-handler success-handle">
			<img src="assets/svg/success.svg">
			<span class="success">Error! validation error</span>
		</div>
		Fail
		<div class="validation-handler error-handle">
			<img src="assets/svg/error.svg">
			<span class="danger">Error! validation error</span>
		</div>
		-->
		<form method="post" action="#">
			<img src="assets/img/logo.jpg"><br>
			<label for="email">
				<input type="email" name="email" placeholder="Email" autocomplete="off" autofocus="" required="">
			</label><br>
			<button type="submit">Send verification code</button>
			<div class="option-handler">
				<a href="register" class="register-anchor">Create account</a>
				<a href="login" class="forgot-anchor">Sign in</a>
			</div>
			<span>Developed by <a href="#" onclick="window.open('https://web.facebook.com/nicholas.razon.37')">Mark Nicholas Razon</a></span>
		</form>
	</section>

</body>
</html>
