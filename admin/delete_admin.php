<?php include "includes/connection.php"; 

$query = "DELETE from admin where id = {$_GET['admin_id']}";
mysqli_query($conn , $query);

header('location:manage_admins.php');


?>