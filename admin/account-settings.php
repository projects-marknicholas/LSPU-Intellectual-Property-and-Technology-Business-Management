<!DOCTYPE html>
<html>
<head>
	<title>Account Settings | RTMS</title>
	<meta charset="UTF-8">
	<meta name="description" content="Admin | IPBM's RTMS">
	<meta name="keywords" content="RTMS, LSPU, Laguna State Polytechnic University">
	<meta name="author" content="Mark Nicholas Razon">
	<link rel="icon" href="../assets/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="../assets/css/admin.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<section id="rtms">
	<div class="sidebar">
		<div class="rtms-headbar">
			<img src="../assets/img/logo.jpg">
		</div>
		<div class="sidebar-title">General</div>
		<ul class="navigation-link">
			<li>
				<a href="./">
					<img src="../assets/svg/dashboard.svg">
					<span>Dashboard</span>
				</a>
			</li>
			<li>
				<a href="profiles">
					<img src="../assets/svg/profile.svg">
					<span>Profiles</span>
				</a>
			</li>
			<li>
				<a href="add-record">
					<img src="../assets/svg/record.svg">
					<span>Add Record</span>
				</a>
			</li>
			<li>
				<a href="inventor">
					<img src="../assets/svg/inventor.svg">
					<span>Inventor</span>
				</a>
			</li>
			<li>
				<a href="technology">
					<img src="../assets/svg/technology.svg">
					<span>Technology</span>
				</a>
			</li>
			<li>
				<a href="announcements">
					<img src="../assets/svg/announcement.svg">
					<span>Announcements</span>
				</a>
			</li>
		</ul>
		<div class="sidebar-title">Account</div>
		<ul class="navigation-link">
			<li>
				<a href="pending-accounts">
					<img src="../assets/svg/pending.svg">
					<span>Pending accounts</span>
				</a>
			</li>
			<li>
				<a href="active-accounts">
					<img src="../assets/svg/active.svg">
					<span>Active accounts</span>
				</a>
			</li>
			<li class="active">
				<a href="account-settings">
					<img src="../assets/svg/account.svg">
					<span>Account Settings</span>
				</a>
			</li>
			<li>
				<a href="signout">
					<img src="../assets/svg/signout.svg">
					<span>Sign Out</span>
				</a>
			</li>
		</ul>
	</div>
	<div class="main-panel">
		<div class="panel-header">
			<form class="panel-search">
				<input type="search" name="search" autocomplete="off" required="" placeholder="Search">
			</form>
			<a class="account-details">
			    <img src="../assets/img/no-profile.webp" id="profile-photo">
			    <span id="full-name"></span>
			</a>
		</div>
		<div id="target">
			<!-- Start -->
			<!-- Validation box
			Success
			<div class="validation-handler success-handle" style="width: 95%; margin: auto; margin-top: 20px;">
				<img src="../assets/svg/success.svg">
				<span class="success">Error! validation error</span>
			</div>
			Fail
			<div class="validation-handler error-handle" style="width: 95%; margin: auto; margin-top: 20px;">
				<img src="../assets/svg/error.svg">
				<span class="danger">Error! validation error</span>
			</div>
			-->
			<div class="account-settings-div">
					<div id="validation"></div>
				<form method="post" action="" class="account-settings-grid" enctype="multipart/form-data">
                    <div class="account-profile account-item">
                        <span>Profile Photo <span id="photo-directory"></span></span>
                        <input type="file" id="photo" name="profile_photo">
                        <div id="preview-photo">
                            <img src="" id="photo-preview">
                        </div>
                    </div>
                    <div class="account-email account-item">
                        <span>E-Mail</span>
                        <input type="email" name="" value="" readonly="" disabled="">
                    </div>
                    <div class="account-password account-item">
                        <span>Password</span>
                        <input type="text" name="password" disabled="" value="" readonly="">
                    </div>
                    <div class="account-phone account-item">
                        <span>Phone Number</span>
                        <input type="number" name="phone" value="" autofocus="">
                    </div>
                    <div class="account-firstname account-item">
                        <span>First Name</span>
                        <input type="text" name="firstname" value="">
                    </div>
                    <div class="account-middlename account-item">
                        <span>Middle Name</span>
                        <input type="text" name="middlename" value="">
                    </div>
                    <div class="account-lastname account-item">
                        <span>Last Name</span>
                        <input type="text" name="lastname" value="">
                    </div>
                    <div class="account-role account-item">
                        <span>Role</span>
                        <input type="text" name="role" value="" readonly="" disabled="">
                    </div>
                    <div class="account-branch account-item">
                        <span>Branch</span>
                        <input type="text" name="branch" value="" readonly="" disabled="">
                    </div>
                    <div class="account-button account-item">
                        <span>Submit Button</span>
                        <button type="submit" name="submit_changes">Update changes</button>
                    </div>
                </form>
			</div>
			<!-- End -->
		</div>
	</div>
</section>

<script src="../assets/query/account.js"></script>
<script src="../assets/query/profile-photo.js"></script>
</body>
</html>