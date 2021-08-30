<?php 
ob_start();
include "includes/header.php" ;


if(isset($_POST['add_doc'])){
    $name = $_POST['doc_name'];
    $major = $_POST['doc_major'];
    $phone = $_POST['doc_phone'];
    $work_time = $_POST['doc_from'].'-'.$_POST['doc_to'];

    $query = "INSERT into doctors (`doc_name`, `doc_major`, `doc_phone`, `working_time`)
            values ('$name','$major','$phone','$work_time')";
    mysqli_query($conn , $query);

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
                                <h4 class="card-title">Add new Doctor</h4>
                                <br>
                                <form class="form-horizontal form-material" method="post">
                                    <div class="form-group">
                                        <label class="col-md-12">Doctor Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="doc_name" placeholder="Enter Doctor Name" class="form-control form-control-line" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Major</label>
                                        <div class="col-md-12">
                                            <input type="text" name="doc_major" placeholder="Enter Major" class="form-control form-control-line" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" name="doc_phone" placeholder="Enter Doctor No." class="form-control form-control-line" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group container-fluid">

                                        <div class="row">
                                            <label class="col-md-2">Working Time:</label>
                                            <label class="col-md-1 text-right mt-2">From</label>
                                            <div class="col-md-2">
                                                <input type="time" name="doc_from" placeholder="From" class="form-control form-control-line" required="true">
                                            </div>
                                            <label class="col-md-1 text-right mt-2">To</label>
                                            <div class="col-md-2">
                                                <input type="time" name="doc_to" placeholder="To" class="form-control form-control-line" required="true">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success btn-block" name="add_doc" type="submit">Add Doctor</button>
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
                                <h4 class="card-title">Doctors List</h4>
                            </div>
                            <div class="table-responsive mt-2">
                                <table class="table text-center" id="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Major</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Working Time</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  

                                    $query2 = "SELECT * from doctors order by id DESC";
                                    $exec = mysqli_query($conn , $query2);
                                    $docSet = Array();
                                    while($doctor = mysqli_fetch_assoc($exec)){
                                        $docSet [] = $doctor;
                                    }

                                    foreach ($docSet as $doctor) {
                                        echo " <tr>
                                            <td scope='row'>".$doctor['doc_name']."</td>
                                            <td scope='row'>".$doctor['doc_major']."</td>
                                            <td scope='row'>".$doctor['doc_phone']."</td>
                                            <td scope='row'>".$doctor['working_time']."</td>
                                            <td scope='row'>
                                                <a href='edit_doctor.php?doc_id=".$doctor['id']."' class='btn btn-warning'>Edit</a>
                                                <a href='delete_doctor.php?doc_id=".$doctor['id']."' class='btn btn-danger'>Delete</a>
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