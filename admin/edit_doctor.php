<?php 
ob_start();
include "includes/header.php";


$query = "SELECT * from doctors where id = {$_GET['doc_id']}";
$exec = mysqli_query($conn , $query);
$row = mysqli_fetch_assoc($exec);


$from = substr($row['working_time'], 0,strpos($row['working_time'],"-"));
$to = substr($row['working_time'], strpos($row['working_time'],"-")+1);



if(isset($_POST['update_doc'])){
	$name = $_POST['doc_name'];
	$major = $_POST['doc_major'];
	$phone = $_POST['doc_phone'];
    $work_time = $_POST['doc_from'].'-'.$_POST['doc_to'];

	$query2 = "UPDATE doctors set doc_name = '$name' , doc_major = '$major' , doc_phone = '$phone' , working_time = '$work_time' where id = {$_GET['doc_id']}";

	mysqli_query($conn , $query2);

	header("location:manage_doctors.php");

}

?>

 <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Manage Doctors</h4>
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
                                <h4 class="card-title">Update Doctor</h4>
                                <br>
                                <form class="form-horizontal form-material" method="post">
                                    <div class="form-group">
                                        <label class="col-md-12">Doctor Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="doc_name" placeholder="Enter Doctor Name" class="form-control form-control-line" required="true" value="<?php echo $row['doc_name'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Major</label>
                                        <div class="col-md-12">
                                            <input type="text" name="doc_major" placeholder="Enter Major" class="form-control form-control-line" required="true"
                                            value="<?php echo $row['doc_major'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" name="doc_phone" placeholder="Enter Doctor No." class="form-control form-control-line" required="true"value="<?php echo $row['doc_phone'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group container-fluid">

                                        <div class="row">
                                            <label class="col-md-2">Working Time:</label>
                                            <label class="col-md-1 text-right mt-2">From</label>
                                            <div class="col-md-2">
                                                <input type="time" name="doc_from" placeholder="From" class="form-control form-control-line" required="true"value="<?php echo $from; ?>">
                                            </div>
                                            <label class="col-md-1 text-right mt-2">To</label>
                                            <div class="col-md-2">
                                                <input type="time" name="doc_to" placeholder="To" class="form-control form-control-line" required="true" value="<?php echo $to; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success btn-block" name="update_doc" type="submit">Update Admin</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>


<?php include "includes/footer.php"; ?>