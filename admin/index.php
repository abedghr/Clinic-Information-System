<?php 
include "includes/header.php" ;

$qAdmin = "select count(*) from admin";
$res = mysqli_query($conn , $qAdmin);
$adCount = mysqli_fetch_array($res);
$qDoctor = "select count(*) from doctors";
$resD = mysqli_query($conn , $qAdmin);
$dCount = mysqli_fetch_array($resD);
$qPatient = "select count(*) from patient";
$resP = mysqli_query($conn , $qPatient);
$PCount = mysqli_fetch_array($resP);
$qApo = "select count(*) from apointments";
$resAp = mysqli_query($conn , $qApo);
$ApoCount = mysqli_fetch_array($resAp);
?>
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-7">
                        
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
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Doctors</h4>
                                <div class="feed-widget">
                                    <ul class="list-style-none feed-body m-0 p-b-20">
                                        <li class="feed-item">
                                            <div class="feed-icon bg-info"><i class="fa fa-user-md"></i></div><span style="font-size: 20px"><?php echo $dCount[0]; ?></span><a href="manage_doctors.php" class="ml-5"><strong>Show all</strong></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Patients</h4>
                                <div class="feed-widget">
                                    <ul class="list-style-none feed-body m-0 p-b-20">
                                        <li class="feed-item">
                                            <div class="feed-icon bg-success"><i class="fa fa-users"></i></div><span style="font-size: 20px"><?php echo $PCount[0]; ?></span><a href="manage_patients.php" class="ml-5"><strong>Show all</strong></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Apointments</h4>
                                <div class="feed-widget">
                                    <ul class="list-style-none feed-body m-0 p-b-20">
                                        <li class="feed-item">
                                            <div class="feed-icon bg-warning"><i class="fa fa-calendar"></i></div><span style="font-size: 20px"><?php echo $ApoCount[0]; ?></span><a href="apointments.php" class="ml-5"><strong>Show all</strong></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Admins</h4>
                                <div class="feed-widget">
                                    <ul class="list-style-none feed-body m-0 p-b-20">
                                        <li class="feed-item">
                                            <div class="feed-icon bg-danger"><i class="fa fa-user"></i></div> <span style="font-size: 20px"><?php echo $adCount[0]; ?></span><a href="manage_admins.php" class="ml-5"><strong>Show all</strong></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Apointments</h4>
                                        <h5 class="card-subtitle">Last 7 Apointments</h5>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="dl">
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- title -->
                            </div>
                            <div class="table-responsive">
                                <table class="table v-middle">
                                    <thead>
                                        <tr class="bg-light">
                                            <th scope="col">Patient</th>
                                            <th scope="col">Doctor</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Apointment Time</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                        $query2 = "SELECT apointments.* , doctors.doc_name , patient.pat_fname , patient.pat_lname from apointments INNER JOIN doctors ON apointments.doctor_id = doctors.id
                                    INNER JOIN patient ON apointments.patient_id = patient.id order by id DESC limit 7";
                                        
                                        $res = mysqli_query($conn , $query2);
                                        while($row = mysqli_fetch_assoc($res)){
                                           echo " <tr>
                                            <td scope='row'>".$row['pat_fname'].' '.$row['pat_lname']."</td>
                                            <td scope='row'>".$row['doc_name']."</td>
                                            <td scope='row'>".$row['Date']."</td>
                                            <td scope='row'>".$row['apointment_time']."</td>
                                            <td scope='row'>
                                                <a href='edit_apointment.php?ap_id=".$row['id']."' class='btn btn-warning'>Edit</a>
                                                <a href='delete_apointment.php?ap_id=".$row['id']."' class='btn btn-danger'>Delete</a>
                                            </td>
                                            </tr>";
                                        }

                                        ?>

                                        
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                
                </div>
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
<?php include "includes/footer.php"; ?>