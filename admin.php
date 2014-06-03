<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.theme.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.theme.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id = 'adminForm'>
	<div><center><h2>Events on approval</h2></center></div>
	<table class = 'table table-condensed table-hover table-bordered'>
		<thead>
			<td><b>Name</b></td><td><b>Event</b></td><td><b>Date</b></td><td><b>Time</b></td><td><b>Contact Number</b></td><td><b>Email</b></td><td><b>Note</b></td><td><b>Action</b></td>
		</thead>

		<?php
		include_once('config.php');
		include_once('CalendarBooking.php');
		$view = CalendarBooking::viewAdmin();
		while($row = $view->fetch_array()):
		?>
		<tr>
			<td><?=$row['name']?><td><?=$row['title_of_event']?><td><?=$row['event_date']?><td><?=$row['event_time']?>
				<td><?=$row['contact_no']?><td><?=$row['email']?><td><?=$row['note']?>
				<td>
				<form method = 'post' action = 'approve.php'>
					<input type = 'hidden' name = 'id2'  value = '<?=$row['id']?>'>
					<input type = 'submit' value = 'Approve' class = 'btn btn-danger btn-sm'>
				</form></td>
		</tr>
	
		<?php
		
	endwhile;
?>
		
	</table>
</div>
</body>
</html>