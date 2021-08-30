<?php 
ob_start();
include "includes/header.php" ;


if(isset($_POST['add_patient'])){
    $fname = $_POST['pat_fname'];
    $lname = $_POST['pat_lname'];
    $dob = $_POST['pat_dob'];
    $phone = $_POST['pat_phone'];
    $address = $_POST['pat_address'];
    $gender = $_POST['pat_gender'];
    $ssn = $_POST['pat_ssn'];
    $date = new DateTime(date("Y-m-d H:i:s"), new DateTimeZone('Asia/Amman'));  
    $register_date = $date->format('H:i:s');

    $query = "INSERT into patient (`pat_fname`, `pat_lname`, `ssn` ,`date_of_birth`, `pat_phone`, `pat_address`, `pat_gender`, `register_date`) values ('$fname','$lname','$ssn','$dob','$phone','$address','$gender','$register_date')";

    if(mysqli_query($conn , $query)){
        $last_id = mysqli_insert_id($conn);
        $path = "reports/";
        if(isset($_FILES['reports']['name'])){
            $total = count($_FILES['reports']['name']);
            // Loop through each file
            for( $i=0 ; $i < $total ; $i++ ) {
                $report = $_FILES['reports']['name'][$i];
                //Get the temp file path
                $rep_tmp = $_FILES['reports']['tmp_name'][$i];
                
                $queryy = "INSERT INTO `reports`(`report`, `pat_id`) VALUES ('$report','$last_id')";
                if(mysqli_query($conn , $queryy)){
                    move_uploaded_file($rep_tmp, $path.$report);
                }
            }

        }
    }

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
                        <h4 class="page-title">Manage Patient</h4>
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
                                <h4 class="card-title">Add new Patient</h4>
                                <br>
                                <form class="form-horizontal form-material" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                        <label class="col-md-12">Patient First Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="pat_fname" placeholder="Enter Admin Name" class="form-control form-control-line" required="true">
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                        <label class="col-md-12">Patient Last Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="pat_lname" placeholder="Enter Admin Name" class="form-control form-control-line" required="true">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                        <label class="col-md-12">Serial Number</label>
                                        <div class="col-md-12">
                                            <input type="text" name="pat_ssn" placeholder="Enter Patient SSN" class="form-control form-control-line">
                                        </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                        <label for="example-email" class="col-md-12">Date Of Birth</label>
                                        <div class="col-md-12">
                                            <input type="date" name="pat_dob"  class="form-control form-control-line" required="true">
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="example-email" class="col-md-12">Patient Phone No.</label>
                                        <div class="col-md-12">
                                            <input type="text" name="pat_phone" class="form-control form-control-line" placeholder="Enter Mobile Number" required="true">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                        <label class="col-md-12">Address</label>
                                        <div class="col-md-12">
                                            <input type="text" name="pat_address" placeholder="Enter Patient Address" class="form-control form-control-line" required="true">
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                        <label class="col-md-12">Gender</label>
                                        <div class="col-md-12">
                                            <select class="form-control form-control-line" name="pat_gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="ml-3">Patient Reports</label><br>
                                            <input type="file" name="reports[]" class="ml-3" multiple="multiple">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" name="admin_phone" placeholder="Enter Admin No." class="form-control form-control-line" required="true">
                                        </div>
                                    </div> -->
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success btn-block" name="add_patient" type="submit">Add Patient</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body bg-dark text-light">
                                <h4 class="card-title">Patients List</h4>
                            </div>
                            <div class="table-responsive mt-2">
                                <table class="table text-center" id="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">FName</th>
                                            <th scope="col">LName</th>
                                            <th scope="col">SSN</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">DOB</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Reg. Date</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  

                                    $query2 = "SELECT * from patient order by id DESC";
                                    $exec = mysqli_query($conn , $query2);
                                    $patientSet = Array();
                                    while($patient = mysqli_fetch_assoc($exec)){
                                        $patientSet [] = $patient;
                                    }

                                    foreach ($patientSet as $patient) {
                                        echo " <tr>
                                            <td scope='row'>".$patient['pat_fname']."</td>
                                            <td scope='row'>".$patient['pat_lname']."</td>
                                            <td scope='row'>".$patient['ssn']."</td>
                                            <td scope='row'>".$patient['pat_gender']."</td>
                                            <td scope='row'>".$patient['date_of_birth']."</td>
                                            <td scope='row'>".$patient['pat_phone']."</td>
                                            <td scope='row'>".$patient['pat_address']."</td>
                                            <td scope='row'>".$patient['register_date']."</td>
                                            <td scope='row'>
                                                <a href='show_patient.php?pat_id=".$patient['id']."' class='btn btn-info'>Show</a>
                                                <a href='edit_patient.php?pat_id=".$patient['id']."' class='btn btn-warning'>Edit</a>
                                                <a href='delete_patient.php?pat_id=".$patient['id']."' class='btn btn-danger'>Delete</a>
                                            </td>
                                        </tr>";
                                    }
                                    ?>  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

<?php include "includes/footer.php" ?>
<script type="text/javascript">
    $(document).ready(function () {
      $('#table').DataTable();
      $('.dataTables_length').addClass('bs-select');
    });
</script>