<?php 
include "admin/includes/connection.php";

$qu = "SELECT * from doctors";
$res = mysqli_query($conn , $qu);


if(isset($_POST['requset'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$ssn = $_POST['ssn'];
	$dob = $_POST['dob'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$doctor = $_POST['doctor'];
	
	$query = "INSERT INTO apointments_requests (`fname`, `lname`, `ssn`, `dob`, `phone`, `address`, `gender`, `doctor_id`) VALUES ('$fname','$lname','$ssn','$dob','$phone','$address','$gender','$doctor')";

	
	if(mysqli_query($conn , $query)){
		

		$last_id = mysqli_insert_id($conn);
		
		$path = "admin/reports/";
		
		if($_FILES['reports']['error'][0] != 4){
			$total = count($_FILES['reports']['name']);
			// Loop through each file
			for( $i=0 ; $i < $total ; $i++ ) {
				$report = $_FILES['reports']['name'][$i].time();
				//Get the temp file path
			  	$rep_tmp = $_FILES['reports']['tmp_name'][$i];

			  	$queryy = "INSERT INTO `reports`(`report`,`pat_id_req`) VALUES ('$report','$last_id')";
			  	if(mysqli_query($conn , $queryy)){
			  		move_uploaded_file($rep_tmp, $path.$report);
			  	}
			}
		}
	}
	

	header("location:req_apointments.php");
}

?>
<!DOCTYPE html>
<html lang="en"> 
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Request Apointments</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,800,700,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=BenchNine:300,400,700' rel='stylesheet' type='text/css'>
	<script src="js/modernizr.js"></script>
	<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	
	<!-- ====================================================
	header section -->
	<header class="top-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-5 header-logo">
					<br>
					<h1>
						<a href="index.php"><!-- <img src="img/logo.png" alt="" class="img-responsive logo"> -->
						<i class="fa fa-user-md"></i>Clinic <small style="font-size: 22px;color: #337ab7;">Information System</small>	
						</a>
					</h1>
				</div>

				<div class="col-md-7">
					<nav class="navbar navbar-default">
					  <div class="container-fluid nav-bar">
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					    </div>

					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					      
					      <ul class="nav navbar-nav navbar-right">
					        <li><a class="menu" href="index.php" >Home</a></li>
					      </ul>
					    </div><!-- /navbar-collapse -->
					  </div><!-- / .container-fluid -->
					</nav>
				</div>
			</div>
		</div>
	</header> <!-- end of header area -->

	<!-- contact section starts here -->
	<section class="contact" style="margin-top: 100px; background-color: white;">
		<div class="container">
			<div class="row">
				<div class="contact-caption clearfix">
					<div class="contact-heading text-center">
						<h2>Request Apiontments</h2>
					</div>
					<div class="col-md-10 col-md-offset-1 contact-form">
						<h3>Fill your information</h3>

						<form class="form" method="post" enctype="multipart/form-data">
							<input class="name" name="fname" type="text" placeholder="First Name" required="true">
							<input class="name" name="lname" type="text" placeholder="Last Name" required="true">
							<input class="name" name="ssn" type="text" placeholder="Your Serial Number" required="true">
							<h4 style="text-align: left !important; color:white; font-weight: bold;">Date of Birth</h4>
							<input class="name" name="dob" type="date" required="true">
							<input class="phone" name="phone" type="text" placeholder="Phone No:" required="true">
							<input class="email" name="address" type="text" placeholder="Address" required="true">
							<select class="form-control" name="gender" required="true">
								<option>Male</option>
								<option>Female</option>
							</select>
							<h4 style="text-align: left !important; color:white; font-weight: bold;">Doctors</h4>
							<select class="form-control" name="doctor" required="true">
								<option></option>
								<?php 
								while($roww = mysqli_fetch_assoc($res)){
									echo "<option value='".$roww['id']."'>DR.".$roww['doc_name']."</option>";
								}
								?>
							</select>
							<h4 style="text-align: left !important; color:white; font-weight: bold; font-size: 2em;">Add your reports</h4>
							<input type="file" name="reports[]" class="name" multiple="multiple"  style="margin-top: 10px;">
							<input class="submit-btn" name="requset" type="submit" value="REQUEST">
						</form>
					</div>
				</div>
			</div>
		</div>
	</section><!-- end of contact section -->

	<!-- footer starts here -->
	<footer class="footer clearfix">
		<div class="container">
			<div class="row">
				<div class="col-xs-6 footer-para">
					<p>&copy;Mostafizur All right reserved</p>
				</div>
				<div class="col-xs-6 text-right">
					<a href=""><i class="fa fa-facebook"></i></a>
					<a href=""><i class="fa fa-twitter"></i></a>
					<a href=""><i class="fa fa-skype"></i></a>
				</div>
			</div>
		</div>
	</footer>

	<!-- script tags
	============================================================= -->
	<script src="js/jquery-2.1.1.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="js/gmaps.js"></script>
	<script src="js/smoothscroll.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>
</body>
</html>