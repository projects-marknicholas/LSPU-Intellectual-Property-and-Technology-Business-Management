<!DOCTYPE html>
<html>
<head>
	<title>IPTBM's RTMS | Laguna State Polytechnic University</title>
	<meta charset="UTF-8">
	<meta name="description" content="IPBM's RTMS">
	<meta name="keywords" content="RTMS, LSPU, Laguna State Polytechnic University">
	<meta name="author" content="Mark Nicholas Razon">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

	<nav>
		<div class="logo-display">
			<img src="assets/img/logo.jpg">
		</div>
		<img src="assets/svg/menu.svg" alt="menu" class="menu-svg">
		<div class="menu-links">
			<ul>
				<li>
					<a href="./" class="nav-key">Home</a>
				</li>
				<li>
					<a href="technologies" class="nav-key">Technologies</a>
				</li>
				<li>
					<a href="announcements" class="nav-key">Announcements</a>
				</li>
				<li>
					<a href="about" class="nav-key">About</a>
				</li>
				<li>
					<a href="contact" class="nav-key">Contact Us</a>
				</li>
				<li>
					<a href="login" class="landing-log">Sign In</a>
				</li>
			</ul>
		</div>
	</nav>

	<section id="hero">
		<div class="banner-title">
			<h1>Real Time Management System</h1>
			<p>Intellectual Property and Technology Business Management Office</p>
		</div>
		<div class="carousel">
	        <div class="carousel-item active">
	            <img src="assets/img/banner1.jpg" alt="Banner 1">
	        </div>
	        <div class="carousel-item">
	            <img src="assets/img/banner2.webp" alt="Banner 2">
	        </div>
	        <div class="carousel-item">
	            <img src="assets/img/banner3.webp" alt="Banner 3">
	        </div>
	    </div>
	</section>

	<section id="goals">
		<div class="three-dimensional-guide">
		    <div class="tab-circle" id="mission-circle">
		    	<p>Mission</p>
		    </div>
		    <div class="tab-circle fade" id="vision-circle">
		    	<p>Vision</p>
		    </div>
		    <div class="tab-circle fade" id="mandate-circle">
		    	<p>Quality-Policy</p>
		    </div>
		</div>
		<div class="goal-tabs">
			<div class="tabs">
			    <button class="tab active-tab" id="tab1">Mission</button>
			    <button class="tab" id="tab2">Vision</button>
			    <button class="tab" id="tab3">Quality Policy</button>
			</div><br>
			<div class="tab-content">
				<div class="content" id="content1">
					<h1>Mission</h1>
					<p>LSPU, driven by progressive leadership, is a premier institution providing technology-mediated agriculture, fisheries and other related and emerging disciplines significantly contributing to the growth and development of the region and nation</p>
				</div>
				<div class="content" id="content2">
					<h1>Vision</h1>
					<p>The Laguna State Polytechnic University is a center of sustainable development initiatives transforming lives and communities.</p>
				</div>
				<div class="content" id="content3">
					<h1>Quality Policy</h1>
					<p>LSPU delvers quality educaation through responsive instruction, distinctive research, sustainable extension, and production services. Thus, we are committed with continual improvement to meet applicable requirements to provide quality, efficient, and effective services to the university stakeholders' highest level of satisfaction through an excellent management system imbued with utmost integrity, professionalism, and innovation.</p>
				</div>
			</div>
		</div>
	</section>
	<footer>
		<div class="social-info">
			<div class="footer-item logo-footer">
				<img src="assets/img/logo.jpg">
				<span>
					<h1>IPTBM’s RTMS</h1>
					<i>Laguna State Polytechnic University</i>
				</span>
			</div>
			<div class="footer-item">
				<h1>Links</h1>
				<ul>
					<li>
						<a href="./">Home</a>
					</li>
					<li>
						<a href="technologies">Technologies</a>
					</li>
					<li>
						<a href="announcements">Announcements</a>
					</li>
					<li>
						<a href="about">About</a>
					</li>
					<li>
						<a href="contact">Contact Us</a>
					</li>
					<li>
						<a href="login">Sign In</a>
					</li>
				</ul>
			</div>
			<div class="footer-item">
				<h1>Security</h1>
				<ul>
					<li>
						<a href="privacy-policy">Privacy Policy</a>
					</li>
					<li>
						<a href="terms">Terms of use</a>
					</li>
				</ul>
			</div>
		</div>
		<p>© 2023 Laguna State Polytechnic University - Developed by <a href="#" onclick="window.open('https://web.facebook.com/nicholas.razon.37')">Mark Nicholas Razon</a></p>
	</footer>


<script type="text/javascript">
	let currentIndex = 0;
    const items = document.querySelectorAll('.carousel-item');

    function changeSlide(n) {
        items[currentIndex].classList.remove('active');
        currentIndex = (currentIndex + n + items.length) % items.length;
        items[currentIndex].classList.add('active');
    }

    function autoSlide() {
        changeSlide(1);
    }

    setInterval(autoSlide, 5000); // Change slide every 5 seconds
</script>
	<script src="assets/js/tab-functions.js"></script>
	<script src="assets/js/landing-animate.js"></script>

</body>
</html>
