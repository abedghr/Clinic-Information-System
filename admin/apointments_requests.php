<?php 
ob_start();
include "includes/header.php" ;

?>

<div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-5">
                    <h4 class="page-title">Apointments Requests</h4>
                </div>
                <div class="col-7">
                    <div class="text-right upgrade-btn">
                        
                    </div>
                </div>
            </div>
        </div>
<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body bg-dark text-light">
                                <h4 class="card-title">Apointments Requests List</h4>
                            </div>
                            <div class="table-responsive mt-2">
                                <table class="table text-center" id="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Doctor</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  

                                    $query2 = "SELECT apointments_requests.* , doctors.doc_name from apointments_requests INNER JOIN doctors ON apointments_requests.doctor_id = doctors.id where apointments_requests.status = 0";
                                    $exec = mysqli_query($conn , $query2);
                                    $apoSet = Array();
                                    while($apointments = mysqli_fetch_assoc($exec)){
                                        $apoSet [] = $apointments;
                                    }

                                    foreach ($apoSet as $apo) {
                                        echo " <tr>
                                            <td scope='row'>".$apo['fname'].' '.$apo['lname']."</td>
                                            <td scope='row'>".$apo['phone']."</td>
                                            <td scope='row'>".$apo['address']."</td>
                                            <td scope='row'>Dr.".$apo['doc_name']."</td>
                                            <td scope='row'>
                                                <a href='single_apointment_req.php?apoReq_id=".$apo['id']."' class='btn btn-warning'><i class='fa fa-eye text-dark'></i></a>
                                                <a href='confirm_apo_req.php?apoReq_id=".$apo['id']."' class='btn btn-info'>confirm</a>
                                                <a href='delete_apo_req.php?apoReq_id=".$apo['id']."' class='btn btn-danger'>Delete</a>
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
            </div>
        </div>


<?php include "includes/footer.php" ?>
<script type="text/javascript">
    $(document).ready(function () {
      $('#table').DataTable();
      $('.dataTables_length').addClass('bs-select');
    });
</script>