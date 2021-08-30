<?php 
ob_start();
include "includes/header.php" ;

$query = "SELECT * from feedbacks where id = {$_GET['feedback_id']}";
$res = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($res);

?>
<div class="page-wrapper">
	<div class="container-fluid">

		<div class="card">
		  <div class="card-header">
		  		FeedBack
		  </div>
		  <div class="card-body">
		    <h5 class="card-title"><strong>Name : </strong><?php echo $row['name'] ?></h5>
		    <p class="card-text"><strong>Email : <?php echo $row['email'] ?></strong></p>
		    <p class="card-text"><strong>Phone No. : <?php echo $row['phone'] ?></strong></p>
		    <p class="card-text"><strong>Message : <?php echo $row['message'] ?></strong></p>
		  </div>
		</div>
	</div>
</div>

<?php 
ob_start();
include "includes/footer.php" ;

?>