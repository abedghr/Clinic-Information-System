<?php 
ob_start();

session_start();
include "includes/connection.php";

if(isset($_SESSION['admin_id'])){
	header('location:index.php');
}

$error="";
if(isset($_POST['login'])){
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = "SELECT * from admin where admin_email = '$email' AND admin_password = '$password'";
	
	$exec = mysqli_query($conn , $query);

	$count = mysqli_num_rows($exec);
	
	if($count > 0 ){
		$row = mysqli_fetch_assoc($exec);
		$_SESSION['admin_id']= $row['id'];
		header('location:index.php');
	}else{
		$error = "Please Enter a correct email and password";
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Login Page</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
.modal-login {		
	color: #636363;

}
.modal-login .modal-content {
	padding: 20px;
	border-radius: 5px;
	border: none;
}
.modal-login .modal-header {
	border-bottom: none;   
	position: relative;
	justify-content: center;
}
.modal-login h4 {
	text-align: center;
	font-size: 26px;
	margin: 30px 0 -15px;
}
.modal-login .form-control:focus {
	border-color: #70c5c0;
}
.modal-login .form-control, .modal-login .btn {
	min-height: 40px;
	border-radius: 3px; 
}
	
.modal-login .modal-footer {
	background: #ecf0f1;
	border-color: #dee4e7;
	text-align: center;
	justify-content: center;
	margin: 0 -20px -20px;
	border-radius: 5px;
	font-size: 13px;
}
.modal-login .modal-footer a {
	color: #999;
}		
.modal-login .avatar {
	position: absolute;
	margin: 0 auto;
	left: 0;
	right: 0;
	top: -70px;
	width: 95px;
	height: 95px;
	border-radius: 50%;
	z-index: 9;
	background: #60c7c1;
	padding: 15px;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}
.modal-login .avatar img {
	width: 100%;
}
.modal-login.modal-dialog {
	margin-top: 80px;
}
.modal-login .btn, .modal-login .btn:active {
	color: #fff;
	border-radius: 4px;
	background: #60c7c1 !important;
	text-decoration: none;
	transition: all 0.4s;
	line-height: normal;
	border: none;
}
.modal-login .btn:hover, .modal-login .btn:focus {
	background: #45aba6 !important;
	outline: none;
}

@media only screen and (max-width: 1000px) {
  body {
  	background-image: url("https://cdn.wallpapersafari.com/35/39/OIJjhM.jpg");
  	background-size: 100%;
  	height: 595px;
  }
}

</style>
</head>
<body style="background-image: url('https://cdn.wallpapersafari.com/35/39/OIJjhM.jpg');
	background-size: cover;
	background-repeat: no-repeat;">
	<div style="width: 100%; height: 100%; ">
<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<div class="avatar">
					<img src="img/user_icon.png" alt="Avatar">
				</div>				
				<h4 class="modal-title">Admin Login</h4>	
			</div>
			<div class="modal-body">
				<form action="" method="post">
					<div class="form-group">
						<input type="text" class="form-control" name="email" placeholder="Email" required="required">		
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password" required="required">	
					</div>
					<div class="from-group">
						<small class="text-danger"><?php echo $error; ?></small>
					</div>       
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg btn-block login-btn" 
						name="login">Login</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<a href="../index.php">Go To Public Site</a>
			</div>
		</div>
	</div>  
	</div>  
</body>
</html>
