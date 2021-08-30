<?php include "includes/connection.php"; 

$query = "DELETE from feedbacks where id = {$_GET['feedback_id']}";
mysqli_query($conn , $query);

header('location:show_feedbacks.php');


?>