<?php 
ob_start();
include "includes/header.php" ;

$query = "SELECT * from patient where id = {$_GET['pat_id']}";
$res = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($res);

?>
<div class="page-wrapper">
	<div class="container-fluid">

		<div class="card">
		  <div class="card-header">
		  		apointment Request
		  </div>
		  <div class="card-body">
		    <h5 class="card-title"><strong>Patient Name : </strong><?php echo $row['pat_fname']." ".$row['pat_lname'] ?></h5>
		    <p class="card-text"><strong>Serial Number : <?php echo $row['ssn'] ?></strong></p>
		    <p class="card-text"><strong>Date Of Birth : <?php echo $row['date_of_birth'] ?></strong></p>
		    <p class="card-text"><strong>Phone : <?php echo $row['pat_phone'] ?></strong></p>
		    <p class="card-text"><strong>Address : <?php echo $row['pat_address'] ?></strong></p>
		    <p class="card-text"><strong>Gender : <?php echo $row['pat_gender'] ?></strong></p>
		    <p class="card-text"><strong>Register Date : <?php echo $row['register_date'] ?></strong></p>
		    <h5 class="card-title"><strong>Reports :</strong></h5>
		    <ul class="list-group list-group-flush">

		    	<?php 
		    	$q = "SELECT * from reports where pat_id ={$_GET['pat_id']}";
		    	$ress = mysqli_query($conn , $q);
		    	$count = mysqli_num_rows($ress);
		    	if($count > 0){
		    	while($roww = mysqli_fetch_assoc($ress)){
		    		echo "<li class='list-group-item'><img src='reports/".$roww['report']."' width='600' height='600'></li>";
		    	}
		    	}
		    	?>
		    </ul>
		  </div>
		</div>
	</div>
</div>

<?php 
ob_start();
include "includes/footer.php" ;

?>