<?php include "includes/connection.php"; 

$query = "DELETE from patient where id = {$_GET['pat_id']}";

mysqli_query($conn , $query);

header('location:manage_patients.php');


?>