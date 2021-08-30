<?php 
$conn=mysqli_connect("localhost","root","")
      or die("Could Not Connect");

$db=mysqli_select_db($conn,"hospital");



$date = $_GET['date'];
$time = $_GET['time'];


$query = "SELECT * FROM `apointments` where `Date` = '$date' AND `apointment_time` = '$time'";
$res = mysqli_query($conn,$query);

$check = mysqli_num_rows($res);
if($check > 0){
	echo "<small class='text-danger ml-2' style='font-weight:bold; font-size: 15px;'>This time is taken</small>";
}else{
	echo "<small class='ml-2' style='color:green;font-weight:bold; font-size: 15px;'>Success</small>";
}
?>