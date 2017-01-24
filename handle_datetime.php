<?php
require "connect.php";

$date_time = $_POST['h1'];
$student_id = $_POST['whoami'];

$query = "INSERT INTO appointments (teacher_id, happens_at, flavor, student_id) VALUES ('1', FROM_UNIXTIME(" . $date_time . "), 'slack', '" . $student_id . "')";
			
$enter_data = @mysqli_query($conn, $query);

if($enter_data){
	header("Location: index.php");
	die();
}
?>

