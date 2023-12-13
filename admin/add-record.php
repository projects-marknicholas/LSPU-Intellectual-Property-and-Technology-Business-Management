<!DOCTYPE html>
<html>
<head>
	<title>Add Record | RTMS</title>
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
			<li class="active">
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
			<div id="validation"></div>
			<form method="post" action="#" class="record-form-grid">
			    <div class="record-tech-image record-item">
			        <label for="tech-image">Banner Image<br>
			            <input type="file" name="tech-image" id="tech-image">
			        </label>
			        <div id="preview-record">
			            <img src="" id="preview-record-img">
			            <span>Choose Photo</span>
			        </div>
			    </div>
			    <div class="record-technology record-item">
			        <label for="technology">Technology<br>
			            <input type="text" name="technology" id="technology">
			        </label>
			    </div>
			    <div class="record-ip record-item">
			        <label for="ip">Intellectual Property (IP Type)<br>
			            <input type="text" list="ip-type" name="ip" id="ip" autocomplete="off">
			            <datalist id="ip-type">
			                <datalist id="ip-type">
				            	<option value="Patent">
				            		Patents protect inventions or processes that are new, useful, and non-obvious.
				            	</option>
				            	<option value="Utility Model">
				            		Similar to patents, utility models protect new and useful inventions, but they tend to have a shorter duration and can be easier to obtain.
				            	</option>
				            	<option value="Copyright">
				            		Copyright protects original works of authorship, such as books, music, films, and software.
				            	</option>
				            	<option value="Trademark">
				            		Trademarks protect symbols, names, slogans, and logos used to identify goods or services.
				            	</option>
				            	<option value="Trade Secret">
				            		Trade secrets are confidential information that provides a business with a competitive advantage.
				            	</option>
				            	<option value="Industrial Design">
				            		Industrial design rights protect the visual design of objects like the shape, surface, or ornamentation of a product.
				            	</option>
				            	<option value="Geographical Indication">
				            		A geographical indication (GI) is a sign used on products that have a specific geographical origin and possess qualities, reputation, or characteristics that are essentially attributable to that place of origin.
				            	</option>
				            	<option value="Plant Variety">
				            		Plant variety protection (PVP) or plant breeders' rights (PBR) provide exclusive rights to the breeder of a new variety of plant for a certain period, typically 20 to 25 years.
				            	</option>
				            	<option value="Circuit Layout Design">
				            		This form of IP protects the three-dimensional configuration of the elements of an integrated circuit.
				            	</option>
				            	<option value="Database Rights">
				            		Database rights protect the investment made in obtaining, verifying, or presenting the contents of a database.
				            	</option>
				            	<option value="SUI Generis Database Right">
				            		This is a unique form of protection for databases under European Union law.
				            	</option>
				            	<option value="Mask Work Protection">
				            		This is a form of intellectual property protection for semiconductor chip designs.
				            	</option>
				            </datalist>
			            </datalist>
			        </label>
			    </div>
			    <div class="record-year record-item">
			        <label for="year">Year<br>
			            <input type="number" min="1900" max="2099" step="1" value="<?php echo date('Y')?>" name="year" />
			        </label>
			    </div>
			    <div class="record-date-of-filing record-item">
			        <label for="date-of-filing">Date of Filing<br>
			            <input type="date" name="date-of-filing" id="date-of-filing">
			        </label>
			    </div>
			    <div class="record-application-no record-item">
			        <label for="application-no">Application No.<br>
			            <input type="text" name="application-no" id="application-no">
			        </label>
			    </div>
			    <div class="record-abstract record-item">
			        <label for="abstract">Abstract<br>
			            <textarea name="abstract" id="abstract" class="summernote"></textarea>
			        </label>
			    </div>
			    <div class="record-inventors record-item">
			        <label for="inventors">Inventors<br>
			            <textarea name="inventors" id="inventors" class="summernote"></textarea>
			        </label>
			    </div>
			    <div class="record-status record-item">
			        <label for="record-status">Status<br>
			            <input type="text" name="record-status" list="status" id="record-status">
			            <datalist id="status">
			                <datalist id="status">
				                <option value="Applied">
				                	Has been submitted for consideration.
				                </option>
				                <option value="In Development">
				                	Currently in the process of being created.
				                </option>
				                <option value="Prototype">
				                	Preliminary version or mode has been developed.
				                </option>
				                <option value="Testing">
				                	Technology is being rigorously tested.
				                </option>
				                <option value="Pilot">
				                	Technology is being implemented on a small scale.
				                </option>
				                <option value="Alpha">
				                	Basic functionality of the technology is implemented.
				                </option>
				                <option value="Beta">
				                	Technology is feature-complete but may still have some bugs or issues.
				                </option>
				                <option value="Release Candidate">
				                	Considered stable and ready for release.
				                </option>
				                <option value="Live">
				                	Technology is fully operational and available for regular use.
				                </option>
				                <option value="Retired">
				                	Replaced by newer versions or have become outdated.
				                </option>
				                <option value="Cancelled">
				                	Terminated before completion and will not be further developed or implemented..
				                </option>
				                <option value="Finished">
				                	Completed and ready for deployment or implementation.
				                </option>
				            </datalist>
			            </datalist>
			        </label>
			    </div>
			    <div class="record-button record-item">
			        <button type="submit" id="button">Add Record</button>
			    </div>
			</form>
			<!-- End -->
		</div>
	</div>
</section>

<script>
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
</script>
<script src="../assets/query/profile-photo.js"></script>
<script src="../assets/query/record.js"></script>
<script src="../assets/js/preview-record-img.js"></script>
<script src="../assets/js/table-functions.js"></script>
</body>
</html>