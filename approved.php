<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.theme.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.theme.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
</head>

<body>
	<div>
	<div id = 'approved'><center><h2>Approved Events</h2><center></div>
		<table class = 'table table-bordered table-condensed table-hover'>
			<thead>
				
					<td><b>Event</b></td><td><b>Date</b></td><td><b>Time</b></td>
				
			</thead>	

			<?php
			include_once('config.php');
			include_once('CalendarBooking.php');
			$view = CalendarBooking::view();
			while($row = $view->fetch_assoc()):
			?>
			<tr>
				<td><?=$row['title_of_event']?><td><?=$row['event_date']?><td><?=$row['event_time']?></td>
			</tr>
			
			<?php	
			endwhile;
			?>	

		</table>
	</div>
</body>
</html>