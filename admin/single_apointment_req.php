<?php 
ob_start();
include "includes/header.php" ;

$query = "SELECT apointments_requests.* , doctors.doc_name from apointments_requests INNER JOIN doctors ON 	apointments_requests.doctor_id = doctors.id where apointments_requests.id={$_GET['apoReq_id']}";
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
		    <h5 class="card-title"><strong>Patient Name : </strong><?php echo $row['fname']." ".$row['lname'] ?></h5>
		    <p class="card-text"><strong>Serial Number : <?php echo $row['ssn'] ?></strong></p>
		    <p class="card-text"><strong>Date Of Birth : <?php echo $row['dob'] ?></strong></p>
		    <p class="card-text"><strong>Phone : <?php echo $row['phone'] ?></strong></p>
		    <p class="card-text"><strong>Address : <?php echo $row['address'] ?></strong></p>
		    <p class="card-text"><strong>Gender : <?php echo $row['gender'] ?></strong></p>
		    <p class="card-text"><strong>Doctor : Dr.<?php echo $row['doc_name'] ?></strong></p>
		    <h5 class="card-title"><strong>Reports :</strong></h5>
		    <ul class="list-group list-group-flush">

		    	<?php 
		    	$q = "SELECT * from reports where pat_id_req={$_GET['apoReq_id']}";
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