<?php 
include "admin/includes/connection.php";

if(isset($_POST['show_apo'])){
	
	$ssn = $_POST['ssn'];	
	header("location:patient_diagonstics.php?ssn=$ssn");
}

?>
<!DOCTYPE html>
<html lang="en"> 
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Show Diseases</title>
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
	<br>
						<section class="about text-center" id="about" style="margin-top: 100px;">
						<div class="container">
							<div class="row">
								<h2>Show All Diseases Symptoms</h2>
								<?php 
								$query = "SELECT * FROM `diseases`";
								$res = mysqli_query($conn , $query);
								$i = 1;
								while($row = mysqli_fetch_assoc($res)){
									echo '<div class="col-md-4 col-sm-6" style="margin-top: 40px;">
									<div class="single-about-detail clearfix">
										<div class="about-details" style="height: 205px;">
											<a href="req_apointments.php">
												<div class="pentagon-text">
													<h1>'.$i.'</h1>
												</div>
												<h3>'.$row['dis_name'].'</h3>
												<p>'.$row['dis_symptoms'].'</p>
											</a>
											</div>
										</div>
									</div>';
								$i++;
								}

								?>
								
							</div>
						</div>
					</section>
				

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