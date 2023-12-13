<!DOCTYPE html>
<html>
<head>
	<title>View Announcement | RTMS</title>
	<meta charset="UTF-8">
	<meta name="description" content="Admin | IPBM's RTMS">
	<meta name="keywords" content="RTMS, LSPU, Laguna State Polytechnic University">
	<meta name="author" content="Mark Nicholas Razon">
	<link rel="icon" href="../assets/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="../assets/css/admin.css">
	<!-- Summernote-->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="../assets/js/jquery.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
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
			<div id="validation"></div>
			<div class="ann-panel">
			    <div id="ann-form-panel" enctype="multipart/form-data">
				    <div class="ann-image ann-form-item">
				        <label>Banner Image</label>
				        <img src="" id="photo-preview" style="max-height: 270px; max-width: 100%;">
				    </div>
				    <div class="ann-title ann-form-item">
                        <label>Title<br>
                            <input type="text" name="title" id="title" required>
                        </label>
                    </div>
                    <div class="ann-description ann-form-item">
                        <label>Description<br>
                            <textarea name="description" id="description" required class="summernote"></textarea>
                        </label>
                    </div>
                    <div class="ann-date-from ann-form-item">
                        <label>From<br>
                            <input type="date" name="from" id="from" id="from" required>
                        </label>
                    </div>
				    <div class="ann-choice ann-form-item">
				        <label>Where to view this announcement<br>
				            <input type="text" list="choice" name="choice" id="choice-data" required>
				            <datalist id="choice">
				                <option>Admin (All)</option>
				                <option>Admin (Los Baños)</option>
				                <option>Admin (Siniloan)</option>
				                <option>Admin (San Pablo)</option>
				                <option>Admin (Sta. Cruz)</option>
				                <option>User (All)</option>
				                <option>User (Los Baños)</option>
				                <option>User (Siniloan)</option>
				                <option>User (San Pablo)</option>
				                <option>User (Sta. Cruz)</option>
				                <option>Website</option>
				                <option>All</option>
				            </datalist>
				        </label>
				    </div>
				    <div class="ann-date-to ann-form-item">
				        <label>To<br>
				            <input type="date" name="to" id="to" required>
				        </label>
				    </div>
				</div>
			</div>
			<!-- End -->
		</div>
	</div>
</section>

<script>
$(document).ready(function () {
    // Function to fetch announcement by ID
    function fetchAnnouncementById() {
        var announcementId = <?php echo isset($_GET['aid']) ? $_GET['aid'] : 'null'; ?>;
        
        if (announcementId !== null) {
            $.ajax({
                url: '../access/admin/view-announcement.php',
                type: 'GET',
                data: { aid: announcementId },
                dataType: 'json',
                success: function (data) {
                	var descriptionText = $('<div>').html(data.message.announcement_description).text();
                    // Populate form fields with fetched data
                    $('#title').val(data.message.title);
				    $('#description').summernote('code', descriptionText);
				    $('#from').val(data.message.announcement_from);
				    $('#choice-data').val(data.message.branch); // Change this to the correct ID
				    $('#to').val(data.message.announcement_to);
                    
                    // Display image preview (replace 'photo-preview' with the actual ID of your preview element)
                    $('#photo-preview').attr('src', '../access/files/announcements/' + data.message.banner_img);
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching announcement:', error);
                }
            });
        } else {
            console.error('Invalid announcement ID.');
        }
    }

    // Initial fetch of announcement by ID
    fetchAnnouncementById();

    // Initialize Summernote
    $('.summernote').summernote({
        placeholder: 'Write here...',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
});
</script>
<script src="../assets/query/profile-photo.js"></script>
<script src="../assets/js/preview-image.js"></script>
</body>
</html>