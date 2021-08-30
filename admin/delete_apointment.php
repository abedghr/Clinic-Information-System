<?php include "includes/connection.php"; 

$query = "DELETE from apointments where id = {$_GET['ap_id']}";
mysqli_query($conn , $query);

header('location:apointments.php');


?>