<!DOCTYPE html>
<html>
<head>
	<title>All Technologies | RTMS</title>
	<meta charset="UTF-8">
	<meta name="description" content="Admin | IPBM's RTMS">
	<meta name="keywords" content="RTMS, LSPU, Laguna State Polytechnic University">
	<meta name="author" content="Mark Nicholas Razon">
	<link rel="icon" href="../assets/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="../assets/css/admin.css">
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
			<li class="active">
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
				<img src="../assets/img/logo.jpg">
				<span>mark nicholas razon </span>
			</a>
		</div>
		<div id="target">
			<!-- Start -->
			<div class="inventor-panel">
				<div class="flex-inventor">
					<h1>All Technologies</h1>
					<input type="search" name="" onkeyup="searchTable()" id="search" placeholder="Search for data" required="">
				</div>
				<div class="inventor-table-header">
					<a href=""><img src="../assets/svg/excel.svg"> Excel</a>
					<a href=""><img src="../assets/svg/pdf.svg"> Pdf</a>
					<a href="add-record"><img src="../assets/svg/record.svg"> New Record</a>

					<div class="overflow-table">
						<table id="table">
							<thead>
								<tr>
									<th>Branch</th>
									<th>Year</th>
									<th>Technology</th>
									<th>Inventor</th>
									<th>Date of Filing</th>
									<th>IP Type</th>
									<th>Application No.</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Los Baños</td>
									<td>2020</td>
									<td>Art Appreciation</td>
									<td>Mark Nicholas Razon</td>
									<td>March 20, 2020</td>
									<td>Utility Model</td>
									<td>123456789</td>
									<td>
										<span class="tech-invent-status status-applied">Applied</span>
									</td>
									<td>
			                        	<div>
			                        		<a href="" class="edit">
				                        		<img src="../assets/svg/edit.svg">
				                        	</a>
				                        	<a href="" class="delete">
				                        		<img src="../assets/svg/delete.svg">
				                        	</a>
			                        	</div>
			                        </td>
								</tr>
								<tr>
									<td>Siniloan</td>
									<td>2020</td>
									<td>Art Appreciation</td>
									<td>Mark Nicholas Razon</td>
									<td>March 20, 2020</td>
									<td>Utility Model</td>
									<td>123456789</td>
									<td>
										<span class="tech-invent-status status-development">Ongoing</span>
									</td>
									<td>
			                        	<div>
			                        		<a href="" class="view">
				                        		<img src="../assets/svg/view.svg">
				                        	</a>
			                        	</div>
			                        </td>
								</tr>
								<tr>
									<td>Sta. Cruz</td>
									<td>2020</td>
									<td>Art Appreciation</td>
									<td>Mark Nicholas Razon</td>
									<td>March 20, 2020</td>
									<td>Utility Model</td>
									<td>123456789</td>
									<td>
										<span class="tech-invent-status status-prototype">Prototype</span>
									</td>
									<td>
			                        	<div>
			                        		<a href="" class="view">
				                        		<img src="../assets/svg/view.svg">
				                        	</a>
			                        	</div>
			                        </td>
								</tr>
								<tr>
									<td>San Pablo</td>
									<td>2020</td>
									<td>Art Appreciation</td>
									<td>Mark Nicholas Razon</td>
									<td>March 20, 2020</td>
									<td>Utility Model</td>
									<td>123456789</td>
									<td>
										<span class="tech-invent-status status-testing">Testing</span>
									</td>
									<td>
			                        	<div>
			                        		<a href="" class="view">
				                        		<img src="../assets/svg/view.svg">
				                        	</a>
			                        	</div>
			                        </td>
								</tr>
								<tr>
									<td>Los Baños</td>
									<td>2020</td>
									<td>Art Appreciation</td>
									<td>Mark Nicholas Razon</td>
									<td>March 20, 2020</td>
									<td>Utility Model</td>
									<td>123456789</td>
									<td>
										<span class="tech-invent-status status-pilot">Pilot</span>
									</td>
									<td>
			                        	<div>
			                        		<a href="" class="edit">
				                        		<img src="../assets/svg/edit.svg">
				                        	</a>
				                        	<a href="" class="delete">
				                        		<img src="../assets/svg/delete.svg">
				                        	</a>
			                        	</div>
			                        </td>
								</tr>
								<tr>
									<td>San Pablo</td>
									<td>2020</td>
									<td>Art Appreciation</td>
									<td>Mark Nicholas Razon</td>
									<td>March 20, 2020</td>
									<td>Utility Model</td>
									<td>123456789</td>
									<td>
										<span class="tech-invent-status status-alpha">Alpha</span>
									</td>
									<td>
			                        	<div>
			                        		<a href="" class="view">
				                        		<img src="../assets/svg/view.svg">
				                        	</a>
			                        	</div>
			                        </td>
								</tr>
								<tr>
									<td>Siniloan</td>
									<td>2020</td>
									<td>Art Appreciation</td>
									<td>Mark Nicholas Razon</td>
									<td>March 20, 2020</td>
									<td>Utility Model</td>
									<td>123456789</td>
									<td>
										<span class="tech-invent-status status-beta">Beta</span>
									</td>
									<td>
			                        	<div>
			                        		<a href="" class="view">
				                        		<img src="../assets/svg/view.svg">
				                        	</a>
			                        	</div>
			                        </td>
								</tr>
								<tr>
									<td>Sta. Cruz</td>
									<td>2020</td>
									<td>Art Appreciation</td>
									<td>Mark Nicholas Razon</td>
									<td>March 20, 2020</td>
									<td>Utility Model</td>
									<td>123456789</td>
									<td>
										<span class="tech-invent-status status-rc">Release</span>
									</td>
									<td>
			                        	<div>
			                        		<a href="" class="view">
				                        		<img src="../assets/svg/view.svg">
				                        	</a>
			                        	</div>
			                        </td>
								</tr>
								<tr>
									<td>Los Baños</td>
									<td>2020</td>
									<td>Art Appreciation</td>
									<td>Mark Nicholas Razon</td>
									<td>March 20, 2020</td>
									<td>Utility Model</td>
									<td>123456789</td>
									<td>
										<span class="tech-invent-status status-live">Live</span>
									</td>
									<td>
			                        	<div>
			                        		<a href="" class="edit">
				                        		<img src="../assets/svg/edit.svg">
				                        	</a>
				                        	<a href="" class="delete">
				                        		<img src="../assets/svg/delete.svg">
				                        	</a>
			                        	</div>
			                        </td>
								</tr>
								<tr>
									<td>Los Baños</td>
									<td>2020</td>
									<td>Art Appreciation</td>
									<td>Mark Nicholas Razon</td>
									<td>March 20, 2020</td>
									<td>Utility Model</td>
									<td>123456789</td>
									<td>
										<span class="tech-invent-status status-retired">Retired</span>
									</td>
									<td>
			                        	<div>
			                        		<a href="" class="edit">
				                        		<img src="../assets/svg/edit.svg">
				                        	</a>
				                        	<a href="" class="delete">
				                        		<img src="../assets/svg/delete.svg">
				                        	</a>
			                        	</div>
			                        </td>
								</tr>
								<tr>
									<td>Los Baños</td>
									<td>2020</td>
									<td>Art Appreciation</td>
									<td>Mark Nicholas Razon</td>
									<td>March 20, 2020</td>
									<td>Utility Model</td>
									<td>123456789</td>
									<td>
										<span class="tech-invent-status status-cancelled">Cancelled</span>
									</td>
									<td>
			                        	<div>
			                        		<a href="" class="edit">
				                        		<img src="../assets/svg/edit.svg">
				                        	</a>
				                        	<a href="" class="delete">
				                        		<img src="../assets/svg/delete.svg">
				                        	</a>
			                        	</div>
			                        </td>
								</tr>
								<tr>
									<td>Los Baños</td>
									<td>2020</td>
									<td>Art Appreciation</td>
									<td>Mark Nicholas Razon</td>
									<td>March 20, 2020</td>
									<td>Utility Model</td>
									<td>123456789</td>
									<td>
										<span class="tech-invent-status status-finished">Finished</span>
									</td>
									<td>
			                        	<div>
			                        		<a href="" class="edit">
				                        		<img src="../assets/svg/edit.svg">
				                        	</a>
				                        	<a href="" class="delete">
				                        		<img src="../assets/svg/delete.svg">
				                        	</a>
			                        	</div>
			                        </td>
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

<script src="../assets/js/table-functions.js"></script>
</body>
</html>