<!DOCTYPE html>
<html>
<head>
	<title>Announcements | RTMS</title>
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
			<li class="active">
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
			    <img src="../assets/img/no-profile.webp" id="profile-photo">
			    <span id="full-name"></span>
			</a>
		</div>
		<div id="target">
			<!-- Start -->
			<div class="inventor-panel">
				<div class="flex-inventor">
					<div class="flex-branches">
						<h1>Announcements</h1>
					</div>
					<input type="search" name="" onkeyup="searchTable()" id="search" placeholder="Search for data" required="">
				</div>
				<div class="inventor-table-header">
					<a href="add-announcement"><img src="../assets/svg/record.svg"> New Announcement</a>

					<div class="overflow-table">
						<table id="table">
							<thead>
								<tr>
									<th>Image</th>
									<th>Title</th>
									<th>Until</th>
									<th></th>
								</tr>
							</thead>
							<tbody id="body"></tbody>
						</table>
						<div id="no-data">No data available</div>
					</div>
				</div>
			</div>
			<!-- End -->
		</div>
	</div>
</section>

<script>
$(document).ready(function () {
    // Function to fetch announcements
    function fetchAnnouncements() {
        $.ajax({
            url: '../access/admin/display-announcements',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.status === 'success') {
                    // Clear the existing table rows
                    $('#body').empty();

                    // Iterate through the announcements and append them to the table
                    $.each(data.message, function (index, announcement) {
                        var announcementRow =
                            '<tr>' +
                            '<td><img src="../access/files/announcements/' + announcement.banner_img + '" alt="Announcement Image"></td>' +
                            '<td>' + announcement.title + '</td>' +
                            '<td>' + announcement.to + '</td>' +
                            '<td><div><a href="view-announcement?aid=' + announcement.id + '" class="view"><img src="../assets/svg/view.svg"></a><a href="#" class="delete" data-id="' + announcement.id + '"><img src="../assets/svg/delete.svg"></a></div></td>' +
                            '</tr>';

                        $('#body').append(announcementRow);
                    });

                    // Display the table
                    $('#no-data').hide();
                    $('#table').show();
                } else {
                    // Display a message if no announcements are found
                    $('#no-data').show();
                    $('#table').hide();
                }
            },
            error: function (xhr, status, error) {
                console.error('Error fetching announcements:', error);
            }
        });
    }

    // Function to handle announcement deletion
    function deleteAnnouncement(id) {
        $.ajax({
            url: '../access/admin/delete-announcement',
            type: 'POST',
            data: { id: id },
            dataType: 'json',
            success: function (data) {
                // Check if the deletion was successful
                if (data.status === 'success') {
                    // Remove the deleted announcement from the table
                    $('#body').find('tr[data-id="' + id + '"]').remove();
                } else {
                    console.error('Error deleting announcement:', data.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error deleting announcement:', error);
            }
        });
    }

    // Event listener for delete links using event delegation
    $('#body').on('click', '.delete', function (e) {
        e.preventDefault();
        var announcementId = $(this).data('id');

        // Use a modal or custom confirmation dialog for better control
        var isConfirmed = window.confirm('Are you sure you want to delete this announcement?');

        if (isConfirmed) {
            // Call the deleteAnnouncement function
            deleteAnnouncement(announcementId);
    		fetchAnnouncements();
        }
    });

    // Initial fetch of announcements
    fetchAnnouncements();

    // Set interval to fetch announcements every 30 seconds
    setInterval(fetchAnnouncements, 30000);
});
</script>
<script src="../assets/query/profile-photo.js"></script>
<script src="../assets/js/table-functions.js"></script>
</body>
</html>