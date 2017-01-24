<?php
$conn = mysqli_connect("138.197.209.226", "root", "root") or die("Could not connect");

$db_select = @mysqli_select_db($conn, 'hdt') or die("Could not select database");
?>