<?php include "includes/connection.php"; 

$query = "DELETE from apointments_requests where id = {$_GET['apoReq_id']}";
mysqli_query($conn , $query);

header('location:apointments_requests.php');


?>