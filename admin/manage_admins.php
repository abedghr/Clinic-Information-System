<?php 
ob_start();
include "includes/header.php" ;


if(isset($_POST['add_admin'])){
    $name = $_POST['admin_name'];
    $email = $_POST['admin_email'];
    $password = $_POST['admin_pass'];
    $phone = $_POST['admin_phone'];

    $query = "INSERT into admin (admin_name , admin_email , admin_password , admin_phone)
            values ('$name','$email','$password','$phone')";

    mysqli_query($conn , $query);

    header("location:manage_admins.php");
}

?>

 <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Manage Admins</h4>
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
                                <h4 class="card-title">Add new Admin</h4>
                                <br>
                                <form class="form-horizontal form-material" method="post">
                                    <div class="form-group">
                                        <label class="col-md-12">Admin Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="admin_name" placeholder="Enter Admin Name" class="form-control form-control-line" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" name="admin_email" placeholder="Enter Admin Email" class="form-control form-control-line" name="example-email" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Password</label>
                                        <div class="col-md-12">
                                            <input type="password" name="admin_pass" placeholder="Enter Password" 
                                                class="form-control form-control-line" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" name="admin_phone" placeholder="Enter Admin No." class="form-control form-control-line" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success btn-block" name="add_admin" type="submit">Add Admin</button>
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
                                <h4 class="card-title">Admins List</h4>
                            </div>
                            <div class="table-responsive mt-2">
                                <table class="table text-center" id="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  

                                    $query2 = "SELECT * from admin order by id DESC";
                                    
                                    $exec = mysqli_query($conn , $query2);

                                    $adminSet = Array();

                                    while($admin = mysqli_fetch_assoc($exec)){
                                        $adminSet [] = $admin;
                                    }

                                    foreach ($adminSet as $admin) {
                                        echo "<tr>
                                                <td scope='row'>".$admin['admin_name']."</td>
                                                <td scope='row'>".$admin['admin_email']."</td>
                                                <td scope='row'>".$admin['admin_phone']."</td>
                                                <td scope='row'>
                                                    <a href='edit_admin.php?admin_id=".$admin['id']."' class='btn btn-warning'>Edit</a>
                                                    <a href='delete_admin.php?admin_id=".$admin['id']."' class='btn btn-danger'>Delete</a>
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