<?php include "includes/connection.php"; 

$query = "DELETE from diseases where id = {$_GET['dis_id']}";

mysqli_query($conn , $query);

header('location:diseases_symptoms.php');


?>