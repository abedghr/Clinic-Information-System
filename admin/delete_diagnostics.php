<?php include "includes/connection.php"; 

$query = "DELETE from diagnostics where id = {$_GET['dia_id']}";
mysqli_query($conn , $query);

header('location:diagnostics.php');


?>