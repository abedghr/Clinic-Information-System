<?php include "includes/connection.php"; 

$query = "DELETE from doctors where id = {$_GET['doc_id']}";

mysqli_query($conn , $query);

header('location:manage_doctors.php');


?>