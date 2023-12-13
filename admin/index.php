<!DOCTYPE html>
<html>
<head>
	<title>Admin | RTMS</title>
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
			<li class="active">
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
			<div class="panel-dashboard">
				<div class="panel-item">
					<span>Total numbers of {}</span>
					<h1>100</h1>
					<a href="">View Lists →</a>
				</div>
				<div class="panel-item">
					<span>Total numbers of {}</span>
					<h1>100</h1>
					<a href="">View Lists →</a>
				</div>
				<div class="panel-item">
					<span>Total numbers of {}</span>
					<h1>100</h1>
					<a href="">View Lists →</a>
				</div>
				<div class="panel-item">
					<span>Total numbers of {}</span>
					<h1>100</h1>
					<a href="">View Lists →</a>
				</div>
			</div>
			<div class="panel-summary">
			    <div class="table-summary">
			        <div>
			        	<div class="table-options">
				            <div>
				                <label for="entries">Show entries:</label>
				                <select id="entries" onchange="showEntries()">
				                    <option value="5">5</option>
				                    <option value="10">10</option>
				                    <option value="15">15</option>
				                    <option value="all">All</option>
				                </select>
				            </div>
				            <input type="search" id="search" onkeyup="searchTable()" placeholder="Search" autocomplete="off">
				        </div>
				        <div class="overflow-table">
				            <table id="table">
				                <thead id="table-head">
				                    <tr>
				                        <th>Year</th>
				                        <th>Technology</th>
				                        <th>Inventors</th>
				                        <th>Date of Filing</th>
				                        <th>IP Type</th>
				                        <th>Application No.</th>
				                        <th>Actions</th>
				                    </tr>
				                </thead>
				                <tbody>
				                    <tr>
				                        <td>2020</td>
				                        <td>Sample technology</td>
				                        <td>Sample inventor</td>
				                        <td>Sample Date</td>
				                        <td>Utility Model</td>
				                        <td>123456789</td>
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
				                        <td>2020</td>
				                        <td>Sample technology</td>
				                        <td>Sample inventor</td>
				                        <td>Sample Date</td>
				                        <td>Utility Model</td>
				                        <td>123456789</td>
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
				                        <td>2020</td>
				                        <td>Sample technology</td>
				                        <td>Sample inventor</td>
				                        <td>Sample Date</td>
				                        <td>Utility Model</td>
				                        <td>123456789</td>
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
				                        <td>2020</td>
				                        <td>Sample technology</td>
				                        <td>Sample inventor</td>
				                        <td>Sample Date</td>
				                        <td>Utility Model</td>
				                        <td>123456789</td>
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
				            <div id="no-data">No data</div>
				        </div>
			        </div>
			    </div>
			    <div class="announcements">
			    	<div>
			    		<div class="announcement-header">
				    		Announcements
				    	</div>
				    	<ul>
				    		<li>
				    			<a href="">
				    				<img src="../assets/img/logo.jpg">
				    				<span>
				    					This is an announcement from...<br>
				    					<i>This is the announcement description from...</i>
				    					<p>12:00 am</p>
				    				</span>
				    			</a>
				    		</li>
				    		<li>
				    			<a href="">
				    				<img src="../assets/img/logo.jpg">
				    				<span>
				    					This is an announcement from...<br>
				    					<i>This is the announcement description from...</i>
				    					<p>12:00 am</p>
				    				</span>
				    			</a>
				    		</li>
				    	</ul>
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