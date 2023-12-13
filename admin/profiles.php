<!DOCTYPE html>
<html>
<head>
	<title>Profiles | RTMS</title>
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
			<li class="active">
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
			    <img src="../assets/img/no-profile.webp" id="profile-photo">
			    <span id="full-name"></span>
			</a>
		</div>
		<div id="target">
			<!-- Start -->
			<div class="profile">
				<div class="profile-gallery">
				    <form method="post" action="#" enctype="multipart/form-data" id="profile-photo">
					    <img src="../assets/img/logo.jpg" class="image branch-image" id="branchImage">
					    <div class="edit-this">
					        <input type="file" name="photo" id="photoInput">
					        edit photo
					    </div>
					    <button type="button" id="saveButton">Save</button>
					</form>
				    <form method="post" action="#" enctype="multipart/form-data" id="profile-cover">
					    <img src="../assets/img/banner.jpg" class="image branch-cover" id="branchCover">
					    <div class="edit-this">
					        <input type="file" name="photo" id="photoCoverInput">
					        edit photo
					    </div>
					    <button type="button" id="saveCoverButton">Save</button>
					</form>
				</div>
				<div class="profile-info-grid">
					<div class="profile-item">
						<div id="address-validation"></div>
						<div id="address-validation"></div>
						<div class="profile-div" id="address-data">
							<div class="profile-header">
								<h1>Address</h1>
								<a href="">
									<img src="../assets/svg/edit.svg">
								</a>
							</div>
							<div class="profile-details">
								<p id="region">Empty</p>
								<i>Region Address</i>
							</div>
							<div class="profile-details">
								<p id="country">Empty</p>
								<i>Country</i>
							</div>
							<div class="profile-details">
								<p id="city">Empty</p>
								<i>City / Province</i>
							</div>
							<div class="profile-details">
								<p id="municipality">Empty</p>
								<i>Municipality</i>
							</div>
							<div class="profile-details">
								<p id="township">Empty</p>
								<i>Township</i>
							</div>
							<div class="profile-details">
								<p id="village">Empty</p>
								<i>Village</i>
							</div>
							<div class="profile-details">
								<p id="district">Empty</p>
								<i>District</i>
							</div>
						</div>
						<form method="post" class="profile-div" action="../access/admin/create-profile-address" id="address-form">
						    <div class="profile-header">
						        <h1>Address</h1>
						        <button type="submit">Save</button>
						    </div>
						    <div class="profile-details">
						        <input type="text" name="region" id="profile-region" placeholder="Ex: Region IV-A Calabarzon"><br>
						        <i>Region Address</i>
						    </div>
						    <div class="profile-details">
						        <input type="text" name="country" id="profile-country" placeholder="Ex: Philippines"><br>
						        <i>Country</i>
						    </div>
						    <div class="profile-details">
						        <input type="text" name="city" id="profile-city" placeholder="Ex: Laguna"><br>
						        <i>City / Province</i>
						    </div>
						    <div class="profile-details">
						        <input type="text" name="municipality" id="profile-municipality" placeholder="Ex: Los Baños"><br>
						        <i>Municipality</i>
						    </div>
						    <div class="profile-details">
						        <input type="text" name="township" id="profile-township" placeholder="Ex: Batong Malake"><br>
						        <i>Township</i>
						    </div>
						    <div class="profile-details">
						        <input type="text" name="village" id="profile-village" placeholder="Ex: Place Village"><br>
						        <i>Village</i>
						    </div>
						    <div class="profile-details">
						        <input type="text" name="district" id="profile-district" placeholder="Ex: District 1"><br>
						        <i>District</i>
						    </div>
						</form>
					</div>
					<div class="profile-item">
						<div id="contact-validation"></div>
						<div class="profile-div" id="contact-data">
							<div class="profile-header">
								<h1>Contact Information</h1>
								<a href="">
									<img src="../assets/svg/edit.svg">
								</a>
							</div>
							<div class="profile-details">
								<p id="phone_number">Empty</p>
								<i>Phone Number</i>
							</div>
							<div class="profile-details">
								<p id="email_address">Empty</p>
								<i>Email Address</i>
							</div>
							<div class="profile-details">
								<p id="fax_number">Empty</p>
								<i>Fax Number</i>
							</div>
							<div class="profile-details">
								<p id="emergency_contact">Empty</p>
								<i>Emergency Contact</i>
							</div>
							<div class="profile-details">
								<p id="department_contact_1">Empty</p>
								<i>Department Contact</i>
							</div>
							<div class="profile-details">
								<p id="department_contact_2">Empty</p>
								<i>Department Contact</i>
							</div>
							<div class="profile-details">
								<p id="department_contact_3">Empty</p>
								<i>Department Contact</i>
							</div>
							<div class="profile-details">
								<p id="specific_personnel">Empty</p>
								<i>Specific Personnel</i>
							</div>
						</div>
						<form method="post" class="profile-div" action="../access/admin/create-profile-contact" id="contact-form">
						    <div class="profile-header">
						        <h1>Contact Information</h1>
						        <button type="submit">Save</button>
						    </div>
						    <div class="profile-details">
						        <input type="text" name="phone_number" id="profile-phone_number" placeholder="Ex: 09123456789"><br>
						        <i>Phone Number</i>
						    </div>
						    <div class="profile-details">
						        <input type="text" name="email_address" id="profile-email_address" placeholder="Ex: sample@gmail.com"><br>
						        <i>Email Address</i>
						    </div>
						    <div class="profile-details">
						        <input type="text" name="fax_number" id="profile-fax_number" placeholder="Ex: (123)-456-7890"><br>
						        <i>Fax Number</i>
						    </div>
						    <div class="profile-details">
						        <input type="text" name="emergency_contact" id="profile-emergency_contact" placeholder="Ex: 09123456789"><br>
						        <i>Emergency Contact</i>
						    </div>
						    <div class="profile-details">
						        <input type="text" name="department_contact_1" id="profile-department_contact_1" placeholder="Ex: 09123456789"><br>
						        <i>Department Contact</i>
						    </div>
						    <div class="profile-details">
						        <input type="text" name="department_contact_2" id="profile-department_contact_2" placeholder="Ex: 09123456789"><br>
						        <i>Department Contact</i>
						    </div>
						    <div class="profile-details">
						        <input type="text" name="department_contact_3" id="profile-department_contact_3" placeholder="Ex: 09123456789"><br>
						        <i>Department Contact</i>
						    </div>
						    <div class="profile-details">
						        <input type="text" name="specific_personnel" id="profile-specific_personnel" placeholder="Ex: 09123456789"><br>
						        <i>Specific Personnel</i>
						    </div>
						</form>
					</div>
					<div class="profile-item">
						<div id="branch-validation"></div>
						<div class="profile-div" id="branch-data">
							<div class="profile-header">
								<h1>Branch details</h1>
								<a href="">
									<img src="../assets/svg/edit.svg">
								</a>
							</div>
							<div class="profile-details">
								<p id="branch_name">Empty</p>
								<i>Branch Name</i>
							</div>
							<div class="profile-details">
								<p id="principal_head">Empty</p>
								<i>Principal or Head</i>
							</div>
							<div class="profile-details">
								<p id="operating_hours">Empty</p>
								<i>Operating Hours</i>
							</div>
						</div>
						<form method="post" class="profile-div" action="../access/admin/create-profile-branch" id="branch-form">
							<div class="profile-header">
								<h1>Branch details</h1>
								<button type="submit">Save</button>
							</div>
							<div class="profile-details">
								<input type="text" name="branch_name" id="profile-branch_name" readonly="" placeholder="Ex: Sta. Cruz"><br>
								<i>Branch Name</i>
							</div>
							<div class="profile-details">
								<input type="text" name="principal_head" id="profile-principal_head" placeholder="Ex: Dr. Fullname"><br>
								<i>Principal or Head</i>
							</div>
							<div class="profile-details">
								<input type="time" name="operating_hours" id="profile-operating_hours"><br>
								<i>Operating Hours</i>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- End -->
		</div>
	</div>
</section>
<script>
$(document).ready(function() {
    const sections = [
        { data: '#address-data', form: '#address-form' },
        { data: '#contact-data', form: '#contact-form' },
        { data: '#branch-data', form: '#branch-form' }
    ];

    sections.forEach(section => {
        $(`${section.form}`).hide();
        $(`${section.data} .profile-header a`).click(function(e) {
            e.preventDefault();
            $(`${section.data}`).hide();
            $(`${section.form}`).show();
        });
    });
});
</script>
<script>
$(document).ready(function() {
    // Address Form Submission
    $('#address-form').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            dataType: 'json',
            success: function(response) {
                if(response.status == 'success') {
                    $('#address-form').hide();
                    $('#address-data').show();
                } else {
                    $('#address-validation').html('<div class="validation-handler error-handle"><img src="../assets/svg/error.svg"><span class="danger">' + response.message + '</span></div>');
                }
            },
            error: function(xhr, status, error) {
                $('#address-validation').html('<div class="validation-handler error-handle"><img src="../assets/svg/error.svg"><span class="danger">' + error + '</span></div>');
            }
        });
    });

    // Display Profile Address
    function displayProfileAddress() {
        $.ajax({
            type: 'GET',
            url: '../access/admin/display-profile-address',
            dataType: 'json',
            success: function(response) {
                if(response.status == 'success') {
                    $('#region').text(response.region);
                    $('#country').text(response.country);
                    $('#city').text(response.city);
                    $('#municipality').text(response.municipality);
                    $('#township').text(response.township);
                    $('#village').text(response.village);
                    $('#district').text(response.district);
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

    displayProfileAddress();
    setInterval(displayProfileAddress, 1000);

    // Display Profile Address in inputs
    function displayInputProfileAddress() {
        $.ajax({
            type: 'GET',
            url: '../access/admin/display-profile-address',
            dataType: 'json',
            success: function(response) {
                if(response.status == 'success') {
                    // Populate input fields
                    $('#profile-region').val(response.region);
                    $('#profile-country').val(response.country);
                    $('#profile-city').val(response.city);
                    $('#profile-municipality').val(response.municipality);
                    $('#profile-township').val(response.township);
                    $('#profile-village').val(response.village);
                    $('#profile-district').val(response.district);
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

    displayInputProfileAddress();

    // Contact Form Submission
    $('#contact-form').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            dataType: 'json',
            success: function(response) {
                if(response.status == 'success') {
                    $('#contact-form').hide();
                    $('#contact-data').show();
                } else {
                    $('#contact-validation').html('<div class="validation-handler error-handle"><img src="../assets/svg/error.svg"><span class="danger">' + response.message + '</span></div>');
                }
            },
            error: function(xhr, status, error) {
                $('#contact-validation').html('<div class="validation-handler error-handle"><img src="../assets/svg/error.svg"><span class="danger">' + error + '</span></div>');
            }
        });
    });

    // Display Profile Contact
    function displayProfileContact() {
        $.ajax({
            type: 'GET',
            url: '../access/admin/display-profile-contact',
            dataType: 'json',
            success: function(response) {
                if(response.status == 'success') {
                    $('#phone_number').text(response.phone_number);
                    $('#email_address').text(response.email_address);
                    $('#fax_number').text(response.fax_number);
                    $('#emergency_contact').text(response.emergency_contact);
                    $('#department_contact_1').text(response.department_contact_1);
                    $('#department_contact_2').text(response.department_contact_2);
                    $('#department_contact_3').text(response.department_contact_3);
                    $('#specific_personnel').text(response.specific_personnel);
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

    displayProfileContact();
    setInterval(displayProfileContact, 1000);

    // Display Profile Contact
    function displayInputProfileContact() {
        $.ajax({
            type: 'GET',
            url: '../access/admin/display-profile-contact',
            dataType: 'json',
            success: function(response) {
                if(response.status == 'success') {
                    $('#profile-phone_number').val(response.phone_number);
                    $('#profile-email_address').val(response.email_address);
                    $('#profile-fax_number').val(response.fax_number);
                    $('#profile-emergency_contact').val(response.emergency_contact);
                    $('#profile-department_contact_1').val(response.department_contact_1);
                    $('#profile-department_contact_2').val(response.department_contact_2);
                    $('#profile-department_contact_3').val(response.department_contact_3);
                    $('#profile-specific_personnel').val(response.specific_personnel);
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

    displayInputProfileContact();

    // Branch Form Submission
    $('#branch-form').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            dataType: 'json',
            success: function(response) {
                if(response.status == 'success') {
                    $('#branch-form').hide();
                    $('#branch-data').show();
                } else {
                    $('#branch-validation').html('<div class="validation-handler error-handle"><img src="../assets/svg/error.svg"><span class="danger">' + response.message + '</span></div>');
                }
            },
            error: function(xhr, status, error) {
                $('#branch-validation').html('<div class="validation-handler error-handle"><img src="../assets/svg/error.svg"><span class="danger">' + error + '</span></div>');
            }
        });
    });

    // Display Profile Branch
    function displayProfileBranch() {
        $.ajax({
            type: 'GET',
            url: '../access/admin/display-profile-branch',
            dataType: 'json',
            success: function(response) {
                if(response.status == 'success') {
                    $('#branch_name').text(response.branch_name);
                    $('#principal_head').text(response.principal_head);
                    $('#operating_hours').text(response.operating_hours);
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

    displayProfileBranch();
    setInterval(displayProfileBranch, 1000);

    // Display Profile Branch
    function displayInputProfileBranch() {
        $.ajax({
            type: 'GET',
            url: '../access/admin/display-profile-branch',
            dataType: 'json',
            success: function(response) {
                if(response.status == 'success') {
                    $('#profile-branch_name').val(response.branch_name);
                    $('#profile-principal_head').val(response.principal_head);
                    $('#profile-operating_hours').val(response.operating_hours);
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

    displayInputProfileBranch();
});

$(document).ready(function() {
    $('#saveButton').click(function() {
        var formData = new FormData();
        formData.append('photo', $('#photoInput')[0].files[0]);

        $.ajax({
            url: '../access/admin/update-branch-profile',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                var result = JSON.parse(response);

                if (result.status == 'success') {
                    alert(result.message);
                    $('.branch-image').attr('src', '../access/files/branch/' + result.filename);
                } else {
                    console.log('Error: ' + result.message);
                }
            },
            error: function() {
                console.log('Error: Unable to process the request.');
            }
        });
    });

    $('#saveCoverButton').click(function() {
	    var formData = new FormData();
	    formData.append('photo', $('#photoCoverInput')[0].files[0]);

	    $.ajax({
	        url: '../access/admin/update-branch-cover',
	        type: 'POST',
	        data: formData,
	        cache: false,
	        contentType: false,
	        processData: false,
	        success: function(response) {
	            var result = JSON.parse(response);

	            if (result.status == 'success') {
	                alert(result.message);
	                $('.branch-cover').attr('src', '../access/files/branch/' + result.filename);
	            } else {
	                console.log('Error: ' + result.message);
	            }
	        },
	        error: function() {
	            console.log('Error: Unable to process the request.');
	        }
	    });
	});
});

$(document).ready(function() {
    function displayBranchProfileImage() {
        $.ajax({
            url: '../access/admin/display-branch-profile', 
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    var imageUrl = response.message + '?cache=' + new Date().getTime(); // Add cache-busting parameter
                    $('#branchImage').attr('src', '../access/files/branch/' + imageUrl);
                    displayBranchCoverImage(); 
                } else {
                    console.error('Error fetching branch profile image: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error: ' + error);
            }
        });
    }

    function displayBranchCoverImage() {
        $.ajax({
            url: '../access/admin/display-branch-cover', 
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    var imageUrl = response.message + '?cache=' + new Date().getTime(); // Add cache-busting parameter
                    $('#branchCover').attr('src', '../access/files/branch/' + imageUrl);
                } else {
                    console.error('Error fetching branch cover image: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error: ' + error);
            }
        });
    }

    displayBranchProfileImage(); 
});
</script>
<script src="../assets/query/profile-photo.js"></script>
<script src="../assets/js/preview-profiles.js"></script>
</body>
</html>