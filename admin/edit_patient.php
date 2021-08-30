<?php 
ob_start();
include "includes/header.php";


$query = "SELECT * from patient where id = {$_GET['pat_id']}";
$exec = mysqli_query($conn , $query);
$row = mysqli_fetch_assoc($exec);


if(isset($_POST['update_patient'])){
    $fname = $_POST['pat_fname'];
    $lname = $_POST['pat_lname'];
    $dob = $_POST['pat_dob'];
    $phone = $_POST['pat_phone'];
    $address = $_POST['pat_address'];
    $gender = $_POST['pat_gender'];
    

    $query2 = "UPDATE patient set pat_fname = '$fname' , pat_lname = '$lname' , date_of_birth = '$dob' , pat_phone = '$phone' , pat_address = '$address' , pat_gender = '$gender' 
        where id = {$_GET['pat_id']}";

    mysqli_query($conn , $query2);

    header("location:manage_patients.php");

}


?>

 <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Manage Patients</h4>
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
                                <h4 class="card-title">Update Patient</h4>
                                <br>
                                <form class="form-horizontal form-material" method="post">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                        <label class="col-md-12">Patient First Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="pat_fname" placeholder="Enter Admin Name" class="form-control form-control-line" required="true" value="<?php echo $row['pat_fname']; ?>">
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                        <label class="col-md-12">Patient Last Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="pat_lname" placeholder="Enter Admin Name" class="form-control form-control-line" required="true" value="<?php echo $row['pat_lname']; ?>">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                        <label for="example-email" class="col-md-12">Date Of Birth</label>
                                        <div class="col-md-12">
                                            <input type="date" name="pat_dob"  class="form-control form-control-line" required="true" value="<?php echo $row['date_of_birth']; ?>">
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="example-email" class="col-md-12">Patient Phone No.</label>
                                        <div class="col-md-12">
                                            <input type="text" name="pat_phone" class="form-control form-control-line" placeholder="Enter Mobile Number" required="true" value="<?php echo $row['pat_phone']; ?>">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                        <label class="col-md-12">Address</label>
                                        <div class="col-md-12">
                                            <input type="text" name="pat_address" placeholder="Enter Patient Address" class="form-control form-control-line" required="true" value="<?php echo $row['pat_address']; ?>">
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                        <label class="col-md-12">Gender</label>
                                        <div class="col-md-12">
                                            <select class="form-control form-control-line" name="pat_gender">
                                                <option <?php if($row['pat_gender'] == "male") echo "selected"; ?> >Male</option>
                                                <option <?php if($row['pat_gender'] == "female") echo "selected"; ?>>Female</option>
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success btn-block" name="update_patient" type="submit">Update Patient</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>

<?php include "includes/footer.php" ?>