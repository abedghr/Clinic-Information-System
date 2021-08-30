
<?php 
ob_start();
include "includes/header.php" ;

$qq = "SELECT apointments_requests.* , doctors.doc_name FROM `apointments_requests` INNER JOIN doctors ON apointments_requests.doctor_id = doctors.id WHERE apointments_requests.id={$_GET['apoReq_id']}";

$rr = mysqli_query($conn , $qq);
$ro = mysqli_fetch_assoc($rr);

$error = "";
if(isset($_POST['confirm'])){
    $fname = $_POST['pat_fname'];
    $lname = $_POST['pat_lname'];
    $dob = $_POST['pat_dob'];
    $phone = $_POST['pat_phone'];
    $address = $_POST['pat_address'];
    $gender = $_POST['pat_gender'];
    $ssn = $_POST['pat_ssn'];


    $date = new DateTime(date("Y-m-d H:i:s"), new DateTimeZone('Asia/Amman')); 

    $register_date = $date->format('Y-m-d');

    $check_query = "SELECT * FROM patient where ssn = '$ssn'";
    $check_res = mysqli_query($conn , $check_query);
    
    $check_count = mysqli_num_rows($check_res);

    $doctor = $ro['doctor_id'];
    if($check_count > 0){
        $check_pat = mysqli_fetch_assoc($check_res);
        $pa_id = $check_pat['id'];
        $q = "UPDATE reports set pat_id='$pa_id' where pat_id_req={$_GET['apoReq_id']}";
        mysqli_query($conn , $q);

        $qq2 = "SELECT * FROM `patient` WHERE id= '$pa_id'";
        $rr2 = mysqli_query($conn , $qq2);
        $ro2 = mysqli_fetch_assoc($rr2);

        $doctor = $ro['doctor_id'];
        $patient = $ro2['id'];
        $date = $_POST['date'];

        $apo_time = $_POST['apo_time'];

        $ch_time_qu = "SELECT * From `apointments` where `Date` = '$date' AND `apointment_time` = '$apo_time'";
        $ch_res = mysqli_query($conn,$ch_time_qu);

        $ch = mysqli_num_rows($ch_res);
        if($ch > 0){
            $error = "<small class='text-danger ml-2' style='font-weight:bold; font-size: 15px;'>This time is taken</small>";
        }else{

            $query = "INSERT into apointments (`doctor_id`, `patient_id`, `date` , `apointment_time`) values ('$doctor','$patient', '$date' ,'$apo_time')";
            
            if(mysqli_query($conn , $query)){
                $queryUpdate = "UPDATE apointments_requests set status = 1 where id={$_GET['apoReq_id']}";
                mysqli_query($conn , $queryUpdate);
            }
            header("location:apointments.php");
        }

        
    

    }else{

        $date = $_POST['date'];

        $apo_time = $_POST['apo_time'];

        $ch_time_qu = "SELECT * From `apointments` where `Date` = '$date' AND `apointment_time` = '$apo_time'";
        $ch_res = mysqli_query($conn,$ch_time_qu);

        $ch = mysqli_num_rows($ch_res);
        if($ch > 0){
            $error = "<small class='text-danger ml-2' style='font-weight:bold; font-size: 15px;'>This time is taken</small>";
        }else{
        $query = "INSERT into patient (`pat_fname`, `pat_lname`, `ssn` , `date_of_birth`, `pat_phone`, `pat_address`, `pat_gender`, `register_date`) values ('$fname','$lname','$ssn','$dob','$phone','$address','$gender','$register_date')";

        if(mysqli_query($conn , $query)){
            

            $last_id = mysqli_insert_id($conn);
            $doctor = $ro['doctor_id'];

            $q = "UPDATE reports set pat_id='$last_id' where pat_id_req={$_GET['apoReq_id']}";
            mysqli_query($conn , $q);
            
        }


    

        $qq2 = "SELECT * FROM `patient` WHERE id=$last_id";
        $rr2 = mysqli_query($conn , $qq2);
        $ro2 = mysqli_fetch_assoc($rr2);

        $doctor = $ro['doctor_id'];
        $patient = $ro2['id'];
        $date = $_POST['date'];

        $query = "INSERT into apointments (`doctor_id`, `patient_id`, `date` , `apointment_time`)
                values ('$doctor','$patient', '$date' ,'$apo_time')";
        
        if(mysqli_query($conn , $query)){
            $queryUpdate = "UPDATE apointments_requests set status = 1 where id={$_GET['apoReq_id']}";
            mysqli_query($conn , $queryUpdate);
        }
    

        header("location:apointments.php");
        }
    }
    
}

?>

 <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Apointment Confirmation </h4>
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
                                <h4 class="card-title">Apointment Confirmation </h4>
                                <br>
                                <form class="form-horizontal form-material" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                        <label class="col-md-12">Patient First Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="pat_fname" placeholder="Enter Admin Name" class="form-control form-control-line" value="<?php echo $ro['fname']; ?>" readonly>
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                        <label class="col-md-12">Patient Last Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="pat_lname" placeholder="Enter Admin Name" class="form-control form-control-line" value="<?php echo $ro['lname']; ?>" readonly>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                        <label class="col-md-12">Serial Number</label>
                                        <div class="col-md-12">
                                            <input type="text" name="pat_ssn" class="form-control form-control-line" value="<?php echo $ro['ssn']; ?>" readonly>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                        <label for="example-email" class="col-md-12">Date Of Birth</label>
                                        <div class="col-md-12">
                                            <input type="date" name="pat_dob"  class="form-control form-control-line" value="<?php echo $ro['dob']; ?>" readonly>
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="example-email" class="col-md-12">Patient Phone No.</label>
                                        <div class="col-md-12">
                                            <input type="text" name="pat_phone" class="form-control form-control-line" placeholder="Enter Mobile Number" value="<?php echo $ro['phone']; ?>" readonly>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                        <label class="col-md-12">Address</label>
                                        <div class="col-md-12">
                                            <input type="text" name="pat_address" placeholder="Enter Patient Address" class="form-control form-control-line" value="<?php echo $ro['address']; ?>" readonly>
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                        <label class="col-md-12">Gender</label>
                                        <div class="col-md-12">
                                            <input type="text" name="pat_gender" placeholder="Enter Patient Address" class="form-control form-control-line" value="<?php echo $ro['gender']; ?>" readonly>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Doctor</label>
                                        <div class="col-md-12">
                                            <input type="text" name="doctor" class="form-control form-control-line" value="<?php echo $ro['doc_name']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Date</label>
                                        <div class="col-md-12">
                                            <input type="date" class="form-control" id="date" name="date" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Apointments Time</label>
                                        <div class="col-md-12">
                                            <select name="apo_time" class="form-control" id="apo_time" 
                                            onchange="check_time()">
                                                <option value="9:00 AM to 9:30 AM">
                                                    9:00 AM to 9:30 AM
                                                </option>
                                                <option value="9:30 AM to 10:00 AM">
                                                    9:30 AM to 10:00 AM
                                                </option>
                                                <option value="10:00 AM to 10:30 AM">
                                                    10:00 AM to 10:30 AM
                                                </option>
                                                <option value="10:30 AM to 11:00 AM">
                                                    10:30 AM to 11:00 AM
                                                </option>
                                                <option value="11:00 AM to 11:30 AM">
                                                    11:00 AM to 11:30 AM
                                                </option>
                                                <option value="11:30 AM to 12:00 PM">
                                                    11:30 AM to 12:00 PM
                                                </option>
                                                <option value="12:00 PM to 12:30 PM">
                                                    12:00 PM to 12:30 PM
                                                </option>
                                                <option value="12:30 PM to 1:00 PM">
                                                    12:30 PM to 1:00 PM
                                                </option>
                                                <option value="1:00 PM to 1:30 PM">
                                                    1:00 PM to 1:30 PM
                                                </option>
                                                <option value="1:30 PM to 2:00 PM">
                                                    1:30 PM to 2:00 PM
                                                </option>
                                                <option value="2:00 PM to 2:30 PM">
                                                    2:00 PM to 2:30 PM
                                                </option>
                                                <option value="2:30 PM to 3:00 PM">
                                                    2:30 PM to 3:00 PM
                                                </option>
                                                <option value="3:00 PM to 3:30 PM">
                                                    3:00 PM to 3:30 PM
                                                </option>
                                                <option value="3:30 PM to 4:00 PM">
                                                    3:30 PM to 4:00 PM
                                                </option>
                                                <option value="4:00 PM to 4:30 PM">
                                                    4:00 PM to 4:30 PM
                                                </option>
                                                <option value="4:30 PM to 5:00 PM">
                                                    4:30 PM to 5:00 PM
                                                </option>
                                                <option value="5:00 PM to 5:30 PM">
                                                    5:00 PM to 5:30 PM
                                                </option>
                                                <option value="5:30 PM to 6:00 PM">
                                                    5:30 PM to 6:00 PM
                                                </option>
                                                <option value="6:00 PM to 6:30 PM">
                                                    6:00 PM to 6:30 PM
                                                </option>
                                                <option value="6:30 PM to 7:00 PM">
                                                    6:30 PM to 7:00 PM
                                                </option>
                                                <option value="7:00 PM to 7:30 PM">
                                                    7:00 PM to 7:30 PM
                                                </option>
                                                <option value="7:30 PM to 8:00 PM">
                                                    7:30 PM to 8:00 PM
                                                </option>
                                                <option value="8:00 PM to 8:30 PM">
                                                    8:00 PM to 8:30 PM
                                                </option>
                                                <option value="8:30 PM to 9:00 PM">
                                                    8:30 PM to 9:00 PM
                                                </option>
                                            </select>
                                        </div>
                                        <div id="check-res"><?php echo $error; ?></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success btn-block" name="confirm" type="submit">Confirm</button>
                                        </div>
                                    </div>
                                </form>
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
    


    function check_time(){
        var time = $("#apo_time").val();
        var date = $("#date").val();
        
        $.ajax({
        type : "GET",
        url : "check_time.php?time="+time+"&date="+date,
        success: function(data){
            $('#check-res').html(data);
        }

    });
    }
    
</script>