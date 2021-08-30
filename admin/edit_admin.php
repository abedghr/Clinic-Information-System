<?php 
ob_start();
include "includes/header.php";


$query = "SELECT * from admin where id = {$_GET['admin_id']}";
$exec = mysqli_query($conn , $query);
$row = mysqli_fetch_assoc($exec);


if(isset($_POST['update_admin'])){
	$name = $_POST['admin_name'];
	$email = $_POST['admin_email'];
	$password = $_POST['admin_pass'];
	$phone = $_POST['admin_phone'];

	$query2 = "UPDATE admin set admin_name = '$name' , admin_email = '$email' , admin_password = '$password' , admin_phone = '$phone' where id = {$_GET['admin_id']}";

	mysqli_query($conn , $query2);

	header("location:manage_admins.php");

}

?>

 <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Manage Admins</h4>
                    </div>
                    <div class="col-7">
                        <div class="text-right upgrade-btn">
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Update Admin</h4>
                                <br>
                                <form class="form-horizontal form-material" method="post">
                                    <div class="form-group">
                                        <label class="col-md-12">Admin Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="admin_name" placeholder="Enter Admin Name" class="form-control form-control-line" required="true" value="<?php echo $row['admin_name'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" name="admin_email" placeholder="Enter Admin Email" class="form-control form-control-line" name="example-email" id="example-email" required="true" value="<?php echo $row['admin_email'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Password</label>
                                        <div class="col-md-12">
                                            <input type="password" name="admin_pass" placeholder="Enter Password" 
                                                class="form-control form-control-line" required="true" value="<?php echo $row['admin_password'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" name="admin_phone" placeholder="Enter Admin No." class="form-control form-control-line" required="true" value="<?php echo $row['admin_phone'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success btn-block" name="update_admin" type="submit">Update Admin</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>


<?php include "includes/footer.php"; ?>