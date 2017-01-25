<?php
require "connect.php";
$today = null;
$hour = null;
$t2 = null;
$t3 = null;
$t4 = null;
$t5 = null;
$t6 = null;
$t7 = null;




?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>HIGHER.TEAM MobiScheduler</title>
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<style>
			body {
				background-color: #c0392b;
				font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;
			}
			
			.jumbotron {
				background-color: #2c3e50;
				color: #fff;
			}
			
			.footer {
				background-color: #000000;
				color: #fff;
				padding: 60px;
			}
			
			.container {
				background-color: #c0392b;
				border-radius: 5px;
				color: #000000;
				padding: 40px;
			}
		</style>
	</head>
	<body>
		<div class="jumbotron text-center">
			<h1><strong>HIGHER.TEAM</strong> <em>MobiScheduler</em></h1>
		</div>
		<div class="container">
			<fieldset>
			<form name="f1" id="f1" action="handle_datetime.php" method="post">
				<legend>
				<strong>I am</strong>
				<select name="whoami">
					<?php
					$query = "SELECT * FROM students";
					$execute_query = @mysqli_query($conn, $query);
					
						while($row = mysqli_fetch_array($execute_query)){
							echo "<option value='" . $row['id'] . "'>" . $row['slackusername'] . "</option>";
						}
					?>
				</select>
				<strong>and I would like to meet with Andrew on:</strong>
				</legend>
					<?php date_default_timezone_set('America/Los_Angeles');
						
						$today = strtotime('today'); 
						$t2 = $today + (3600*24*1); 
						$t3 = $today + (3600*24*2); 
						$t4 = $today + (3600*24*3); 
						$t5 = $today + (3600*24*4); 
						$t6 = $today + (3600*24*5); 
						$t7 = $today + (3600*24*6); 
					?>
					
				<table class="table">
					<tr>
						<td><strong><?=date('D', $today)." ";?><?=date('m-d-y', $today);?></strong></td>
						<td><strong><?=date('D', $t2)." ";?><?=date('m-d-y', $t2);?></strong></td>
						<td><strong><?=date('D', $t3)." ";?><?=date('m-d-y', $t3);?></strong></td>
						<td><strong><?=date('D', $t4)." ";?><?=date('m-d-y', $t4);?></strong></td>
						<td><strong><?=date('D', $t5)." ";?><?=date('m-d-y', $t5);?></strong></td>
						<td><strong><?=date('D', $t6)." ";?><?=date('m-d-y', $t6);?><strong></td>
						<td><strong><?=date('D', $t7)." ";?><?=date('m-d-y', $t7);?></strong></td>
					</tr>
					
					<?php
					$hour = $today + (8*3600);
					$sec_hour = $t2 + (8*3600);
					$third_hour = $t3 + (8*3600);
					$fourth_hour = $t4 + (8*3600);
					$fifth_hour = $t5 + (8*3600);
					$sixth_hour = $t6 + (8*3600);
					$seventh_hour = $t7 + (8*3600);
					
					
					
					for ($i=0; $i<14; $i++) { 
					$hours = array($hour, $sec_hour, $third_hour, $fourth_hour, $fifth_hour, $sixth_hour, $seventh_hour);
					$hours_len = count($hours);
					?>
					<tr>
					<?php for($j=0; $j<$hours_len; $j++){
						$check_date = mysqli_query($conn, "SELECT * FROM appointments WHERE happens_at >= FROM_UNIXTIME(" . $hours[$j] . ") AND happens_at <= FROM_UNIXTIME(" . $hours[$j] . ")");
						if(mysqli_num_rows($check_date) == 0){
					?>
					<td><a style="color: black;" onclick="$('#h1').val('<?= $hours[$j] ?>'); $('#f1').submit();" href="#<?= $hours[$j]?>"><?= date('g:i a', $hour) ?></a></td>
					<?php 
						}
						else{
							?>
							<td style="color: white;"><?= date('g:i a', $hour) ?></td>
							<?php
						}
					?>
					<?php
					}
					?>
					</tr>
					<?php 
					$hour = $hour + 3600;
					$sec_hour = $sec_hour + 3600;
					$third_hour = $third_hour + 3600;
					$fourth_hour = $fourth_hour + 3600;
					$fifth_hour = $fifth_hour + 3600;
					$sixth_hour = $sixth_hour + 3600;
					$seventh_hour = $seventh_hour + 3600;
					} 
					?>
				</table>
				<input type="hidden" name="h1" id="h1" value="<? $hour ?>">
			</form>
			</fieldset>
		</div>
		<br><br><br><br><br><br><br><br><br><br>
		<div class="footer">
			<h3>Copyright 2017 &copy; <a href="http://higher.team" target="_blank">higher.team</a></h3>
		</div>
		
		<!-- Javascript and jQuery CDN links -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>