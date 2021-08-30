<?php 
ob_start();
include "includes/header.php" ;


if(isset($_POST['add_diagnostic'])){
    $doctor = $_POST['doctor'];
    $patient = $_POST['patient'];
    $diagnostics = $_POST['diagnostics'];

    $query = "INSERT into diagnostics (`doctor_id`, `patient_id`, `diagnostics`)
            values ('$doctor','$patient','$diagnostics')";
    mysqli_query($conn , $query);

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
                        <h4 class="page-title">Patients Diagnostics</h4>
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
                                <h4 class="card-title">Add Patient Diagnostics</h4>
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
                                                        echo '<option value="'.$row2['id'].'">'.$row2['doc_name'].'</option>';
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
                                                        echo '<option value="'.$row2['id'].'">'.$row2['pat_fname'].' '.$row2['pat_lname'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Patient Diagnostics</label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" name="diagnostics" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success btn-block" name="add_diagnostic" type="submit">Add</button>
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
                                <h4 class="card-title">Patient Diagnostics List</h4>
                            </div>
                            <div class="table-responsive mt-2">
                                <table class="table text-center" id="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Doctor</th>
                                            <th scope="col">Patient</th>
                                            <th scope="col" style="width: 600px;">Diagnostics</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  

                                    $query2 = "SELECT diagnostics.* , doctors.doc_name , patient.pat_fname , patient.pat_lname from diagnostics INNER JOIN doctors ON diagnostics.doctor_id = doctors.id
                                    INNER JOIN patient ON diagnostics.patient_id = patient.id order by id DESC";
                                    $exec = mysqli_query($conn , $query2);
                                    $diaSet = Array();
                                    while($diagnostics = mysqli_fetch_assoc($exec)){
                                        $diaSet [] = $diagnostics;
                                    }

                                    foreach ($diaSet as $dia) {
                                        echo " <tr>
                                            <td scope='row'>".$dia['doc_name']."</td>
                                            <td scope='row'>".$dia['pat_fname'].' '.$dia['pat_lname']."</td>
                                            <td scope='row'>".$dia['diagnostics']."</td>
                                            <td scope='row'>
                                                <a href='edit_diagnostics.php?dia_id=".$dia['id']."' class='btn btn-warning'>Edit</a>
                                                <a href='delete_diagnostics.php?dia_id=".$dia['id']."' class='btn btn-danger'>Delete</a>
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