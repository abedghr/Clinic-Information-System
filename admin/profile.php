<?php 
ob_start();
include "includes/header.php" ;

if(isset($_POST['update_admin'])){
	if(isset($_POST['admin_pass'])){
		$name = $_POST['admin_name'];
		$email = $_POST['admin_email'];
		$password = $_POST['admin_pass'];
		$phone = $_POST['admin_phone'];

		$query2 = "UPDATE admin set admin_name = '$name' , admin_email = '$email' , admin_password = '$password' , admin_phone = '$phone' where id = {$row['id']}";

		mysqli_query($conn , $query2);
	}else{
		$name = $_POST['admin_name'];
		$email = $_POST['admin_email'];
		$phone = $_POST['admin_phone'];

		$query2 = "UPDATE admin set admin_name = '$name' , admin_email = '$email' , admin_phone = '$phone' where id = {$row['id']}";

		mysqli_query($conn , $query2);
	}
	

	header("location:profile.php");

}

?>
?>
<div class="page-wrapper">
	<div class="container-fluid">

		<div class="card">
		  <div class="card-header">
		  		Profile
		  </div>
		  <div class="card-body">
		    <p class="card-text"><strong>Admin Name : </strong><?php echo $row['admin_name']?></p>
		    <p class="card-text"><strong>Admin Email : </strong><?php echo $row['admin_email'] ?></p>
		    <p class="card-text"><strong>Admin Phone : </strong><?php echo $row['admin_phone'] ?></p>
		  	<button class="btn btn-warning" id="update_btn">Update <i class="fa fa-arrow-down"></i></button>
		  </div>
		</div>
        <!-- ============================================================== -->
        <!-- Update Admin Content -->
        <!-- ============================================================== -->
        <div class="row" id="update_box">
            <!-- Column -->
            <div class="col-lg-12 col-xlg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Admin</h4>
                        <br>
                        <form class="form-horizontal form-material" method="post">
                            <div class="form-group">
                                <label class="col-md-12">Admin Name</label>
                                <div class="col-md-12">
                                    <input type="text" name="admin_name" placeholder="Enter Admin Name" class="form-control form-control-line" required="true" value="<?php echo $row['admin_name'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" name="admin_email" placeholder="Enter Admin Email" class="form-control form-control-line" name="example-email" id="example-email" required="true" value="<?php echo $row['admin_email'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input type="password" name="admin_pass" placeholder="Enter Password" 
                                        class="form-control form-control-line" required="true" value="<?php echo $row['admin_password'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Phone No</label>
                                <div class="col-md-12">
                                    <input type="text" name="admin_phone" placeholder="Enter Admin No." class="form-control form-control-line" required="true" value="<?php echo $row['admin_phone'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success btn-block" name="update_admin" type="submit">Update Admin</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
	</div>        
</div>


	

<?php 
ob_start();
include "includes/footer.php" ;

?>
<script type="text/javascript">
    $(document).ready(function () {
      $('#update_box').hide();
      $('#update_btn').click(function(){
      	$('#update_box').slideToggle(300);
      });
    });
</script>