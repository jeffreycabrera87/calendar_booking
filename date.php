<?php 
	include_once('config.php');
	include_once('CalendarBooking.php');

	$date = $_GET['date'];
	$result = CalendarBooking::dateValidation($date);

	if($result == false) {
		echo "<p style='color:green'>This date is available.<p>";
	} else {
		echo "<p style='color:red'>This date is not available.<p>";
	}
?>