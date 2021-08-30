<?php 
include "admin/includes/connection.php";

$error = "";


?>
<!DOCTYPE html>
<html lang="en"> 
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Patients Apointments</title>
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
						<h2>Your Apiontments</h2>
					</div>
					<div class="col-md-10 col-md-offset-1 contact-form">
						<h4 class="text-center"><?php echo $error; ?></h4>
						<?php 
							$qu = "SELECT * from patient where ssn={$_GET['ssn']}";
							if($re = mysqli_query($conn , $qu)){
							while($row = mysqli_fetch_assoc($re)){
								$pat_id = $row['id'];
								$query = "SELECT apointments.* , doctors.doc_name from apointments INNER JOIN doctors on apointments.doctor_id = doctors.id where apointments.patient_id = $pat_id";
								if($res = mysqli_query($conn , $query)){
									while($roww = mysqli_fetch_assoc($res)){
										echo '<div class="col-md-10 col-md-offset-1 contact-form">
										<h3>Date : &nbsp;&nbsp;'.$roww["Date"].'</h3>';
										echo '<h4 style="text-align: left !important; color:white; font-weight: bold;">Patient Name :  &nbsp;&nbsp;'.$row['pat_fname'].' '.$row['pat_lname'].'</h4>';
										echo '<h4 style="text-align: left !important; color:white; font-weight: bold;">Doctor : &nbsp;&nbsp;'.$roww['doc_name'].'</h4>';
										echo '<h4 style="text-align: left !important; color:white; font-weight: bold;">Starting Time : &nbsp;&nbsp;'.
										$roww['apointment_time'].'</h4>';
										
										echo '</div>';
									}
								}
							}
							}else{
								header("location:show_apointments.php");
								}

						?>
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