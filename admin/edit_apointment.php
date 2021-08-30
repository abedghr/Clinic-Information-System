<?php 
ob_start();
include "includes/header.php";

$error = "";
$query = "SELECT * from apointments where id = {$_GET['ap_id']}";
$exec = mysqli_query($conn , $query);
$row = mysqli_fetch_assoc($exec);





if(isset($_POST['update_apointment'])){
	$doctor = $_POST['doctor'];
    $patient = $_POST['patient'];
    $date = $_POST['date'];
    /*$starting_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];*/
    $apo_time = $_POST['apo_time'];

    $ch_time_qu = "SELECT * From `apointments` where `Date` = '$date' AND `apointment_time` = '$apo_time'";
    $ch_res = mysqli_query($conn,$ch_time_qu);

    $ch = mysqli_num_rows($ch_res);
    if($ch > 0){
        $error = "<small class='text-danger ml-2' style='font-weight:bold; font-size: 15px;'>This time is taken</small>";
    }else{
	$query2 = "UPDATE apointments set doctor_id = '$doctor' , patient_id = '$patient' , `Date`= '$date' , `apointment_time` = '$apo_time' where id = {$_GET['ap_id']}";

	mysqli_query($conn , $query2);

	header("location:apointments.php");
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
                        <h4 class="page-title">Manage Apointments</h4>
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
                                <h4 class="card-title">Update Apointment</h4>
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
                                        <label class="col-md-12">Date</label>
                                        <div class="col-md-12">
                                            <input type="date" class="form-control" id="date" name="date" value="<?php echo $row['Date']; ?>" required>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="col-md-12">Starting Time</label>
                                        <div class="col-md-12">
                                            <input type="time" class="form-control" name="start_time" min="09:00" max="18:00" value="<?php echo $row['starting_time']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">End Time</label>
                                        <div class="col-md-12">
                                            <input type="time" name="end_time" class="form-control form-control-line" value="<?php echo $row['end_time']; ?>" required="true">
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-md-12">Apointments Time</label>
                                        <div class="col-md-12">
                                            <select name="apo_time" class="form-control" id="apo_time" onchange="check_time()">
                                                <option value="9:00 AM to 10:30 AM">
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
                                    <br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success btn-block" name="update_apointment" type="submit">Update Apointment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>


<?php include "includes/footer.php"; ?>
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