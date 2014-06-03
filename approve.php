<?php 
	include_once('config.php');
	include_once('CalendarBooking.php');

	$id = (isset($_POST['id2'])) ? $_POST['id2']: false;
	CalendarBooking::approve($id);
	header('Location:admin.php');
 ?>