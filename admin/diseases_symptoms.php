<?php 
ob_start();
include "includes/header.php" ;


if(isset($_POST['add'])){
    $name = $_POST['dis_name'];
    $sym = $_POST['dis_symptoms'];

    $query = "INSERT into diseases (`dis_name`, `dis_symptoms`)
            values ('$name','$sym')";
    mysqli_query($conn , $query);

    header("location:diseases_symptoms.php");
}

?>

 <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Diseases Symptoms</h4>
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
                                <h4 class="card-title">Add new Diseases Symptoms</h4>
                                <br>
                                <form class="form-horizontal form-material" method="post">
                                    <div class="form-group">
                                        <label class="col-md-12">Diseases Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="dis_name" placeholder="Enter Diseases Name" class="form-control form-control-line" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Diseases Symptoms</label>
                                        <div class="col-md-12">
                                            <input type="text" name="dis_symptoms" placeholder="Enter Diseases Symptoms" class="form-control form-control-line" required="true">
                                        </div>
                                    </div>
                                   
                                    <br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success btn-block" name="add" type="submit">Add</button>
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
                                            <th scope="col">Disease Name</th>
                                            <th scope="col" style="width: 450px;">Disease Symptoms</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  

                                    $query2 = "SELECT * from diseases order by id DESC";
                                    $exec = mysqli_query($conn , $query2);
                                    $disSet = Array();
                                    while($dis = mysqli_fetch_assoc($exec)){
                                        $disSet [] = $dis;
                                    }

                                    foreach ($disSet as $dis) {
                                        echo " <tr>
                                            <td scope='row'>".$dis['dis_name']."</td>
                                            <td scope='row'>".$dis['dis_symptoms']."</td>
                                            <td scope='row'>
                                                <a href='edit_disease.php?dis_id=".$dis['id']."' class='btn btn-warning'>Edit</a>
                                                <a href='delete_disease.php?dis_id=".$dis['id']."' class='btn btn-danger'>Delete</a>
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