<?php include "includes/header.php" ?>

<div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-5">
                    <h4 class="page-title">Feedbacks</h4>
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
                                <h4 class="card-title">Feedbacks List</h4>
                            </div>
                            <div class="table-responsive mt-2">
                                <table class="table text-center" id="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Message</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  

                                    $query2 = "SELECT * from feedbacks";
                                    $exec = mysqli_query($conn , $query2);
                                    $feedSet = Array();
                                    while($feedbacks = mysqli_fetch_assoc($exec)){
                                        $feedSet [] = $feedbacks;
                                    }

                                    foreach ($feedSet as $feed) {
                                        echo " <tr>
                                            <td scope='row'>".$feed['name']."</td>
                                            <td scope='row'>".$feed['email']."</td>
                                            <td scope='row'>".$feed['phone']."</td>
                                            <td scope='row'>".$feed['message']."</td>
                                            <td scope='row'>
                                                <a href='single_feedback.php?feedback_id=".$feed['id']."' class='btn btn-warning'><i class='fa fa-eye text-dark'></i></a>
                                                <a href='delete_feedback.php?feedback_id=".$feed['id']."' class='btn btn-danger'>Delete</a>
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

