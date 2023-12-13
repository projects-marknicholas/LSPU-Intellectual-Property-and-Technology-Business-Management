<!DOCTYPE html>
<html>
<head>
	<title>Active Accounts | RTMS</title>
	<meta charset="UTF-8">
	<meta name="description" content="Admin | IPBM's RTMS">
	<meta name="keywords" content="RTMS, LSPU, Laguna State Polytechnic University">
	<meta name="author" content="Mark Nicholas Razon">
	<link rel="icon" href="../assets/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="../assets/css/admin.css">
	<script src="../assets/js/jquery.js"></script>
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
			<li class="active">
				<a href="active-accounts">
					<img src="../assets/svg/active.svg">
					<span>Active accounts</span>
				</a>
			</li>
			<li>
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
			<div class="inventor-panel">
				<div class="flex-inventor">
					<div class="flex-branches">
						<h1>Active accounts</h1>
					</div>
					<input type="search" name="" onkeyup="searchTable()" id="search" placeholder="Search for data" required="">
				</div>
				<div class="inventor-table-header">
					<div class="overflow-table">
						<table id="table">
							<thead>
								<tr>
									<th>Photo</th>
									<th>Full Name</th>
									<th>Email</th>
									<th>Role</th>
									<th>Branch</th>
								</tr>
							</thead>
							<tbody id="table-body">
								<tr>
									<td colspan="5" style="text-align: center;">Please wait loading...</td>
								</tr>
							</tbody>
						</table>
						<div id="no-data">No data available</div>
					</div>
				</div>
			</div>
			<!-- End -->
		</div>
	</div>
</section>

<script src="../assets/query/profile-photo.js"></script>
<script src="../assets/query/active-accounts.js"></script>
<script src="../assets/js/table-functions.js"></script>
</body>
</html>