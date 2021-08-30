<?php 
ob_start();
include "includes/header.php";


$query = "SELECT * from diagnostics where id = {$_GET['dia_id']}";
$exec = mysqli_query($conn , $query);
$row = mysqli_fetch_assoc($exec);




if(isset($_POST['update_diagnostics'])){
	$doctor = $_POST['doctor'];
    $patient = $_POST['patient'];
    $diagnostics = $_POST['diagnostics'];

	$query2 = "UPDATE diagnostics set doctor_id = '$doctor' , patient_id = '$patient' , diagnostics = '$diagnostics' where id = {$_GET['dia_id']}";

	mysqli_query($conn , $query2);

	header("location:diagnostics.php");

}

?>

 <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Patient Diagnostics</h4>
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
                                <h4 class="card-title">Update Patient Diagnostics</h4>
                                <br>
                                <form class="form-horizontal form-material" method="post">
                                    <div class="form-group">
                                        <label class="col-md-12">Doctor</label>
                                        <div class="col-md-12">
                                            <select class="form-control" name="doctor">
                                                <?php 
                                                    $query2 = "SELECT * from doctors";
                                                    $res = mysqli_query($conn,$query2);
                                                    while ($row2 = mysqli_fetch_assoc($res)) {

                                                        if($row2['id'] == $row['doctor_id']){

                                                        echo '<option value="'.$row2['id'].'" selected>'.$row2['doc_name'].'</option>';
                                                        
                                                        }else{
                                                            echo '<option value="'.$row2['id'].'">'.$row2['doc_name'].'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Patient</label>
                                        <div class="col-md-12">
                                            <select class="form-control" name="patient">
                                                <?php 
                                                    $query2 = "SELECT * from patient";
                                                    $res = mysqli_query($conn,$query2);
                                                    while ($row2 = mysqli_fetch_assoc($res)) {
                                                        if($row2['id'] == $row['patient_id']){
                                                            echo '<option value="'.$row2['id'].'" selected>'.$row2['pat_fname'].' '.$row2['pat_lname'].'</option>';
                                                        }else{
                                                            echo '<option value="'.$row2['id'].'">'.$row2['pat_fname'].' '.$row2['pat_lname'].'</option>';
                                                        }
                                                     
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Diagnostics</label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" name="diagnostics" rows="10"><?php echo $row['diagnostics']; ?></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success btn-block" name="update_diagnostics" type="submit">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>


<?php include "includes/footer.php"; ?>