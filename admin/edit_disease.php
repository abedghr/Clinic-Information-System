<?php 
ob_start();
include "includes/header.php";


$query = "SELECT * from diseases where id = {$_GET['dis_id']}";
$exec = mysqli_query($conn , $query);
$row = mysqli_fetch_assoc($exec);


if(isset($_POST['update'])){
	$name = $_POST['dis_name'];
	$dis_sym = $_POST['dis_symptoms'];
	

	$query2 = "UPDATE diseases set dis_name = '$name' , dis_symptoms = '$dis_sym'
            where id = {$_GET['dis_id']}";

	mysqli_query($conn , $query2);

	header("location:diseases_symptoms.php");

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
                                        <label class="col-md-12">Diseases Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="dis_name" placeholder="Enter Doctor Name" class="form-control form-control-line" required="true" value="<?php echo $row['dis_name'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Diseases Symptoms</label>
                                        <div class="col-md-12">
                                            <input type="text" name="dis_symptoms" placeholder="Enter Doctor Name" class="form-control form-control-line" required="true" value="<?php echo $row['dis_symptoms'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success btn-block" name="update" type="submit">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>


<?php include "includes/footer.php"; ?>