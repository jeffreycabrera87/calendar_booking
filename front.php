<html>
<head>
	<title>Calendar Booking</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.theme.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.theme.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
</head>
<body>
	<header>
		<nav class="navbar navbar-default" style="background-color:#3223"><center><h2>Calendar Booking</h2></center></nav>
	</header>
	<div class = 'container'>
		<div id = 'form1' class = 'hero-unit'>
			<div><center><h2>Register Event</h2></center></div>
			<form method = 'post' action = 'front.php' onsubmit='return validate();'>
				<input type = 'text' name = 'name' id = 'name' placeholder = 'Name'><br>
				<input type = 'date' name = 'date' id = 'date'><br>
				<input type = 'time' name = 'time' id = 'time'><br>
				<input type = 'text' name = 'contact' id = 'contact' placeholder = 'Contact Number'><br>
				<input type = 'email' name = 'email' id = 'email' placeholder = 'Email'><br>
				<input type = 'text' name = 'note' id = 'note' placeholder = 'Note'><br>
				<input type = 'text' name = 'title' id = 'title' placeholder = 'Title'><br>
				<input type = 'submit' value = 'Submit' class = 'btn btn-primary'><br>
				<div id='validate'></div>
			</form>
		</div>

		<div id='approveForm'>
			<?php 
			include('approved.php');
	 		?>
		</div>
	</div>

<script type="text/javascript" src = "jquery.js"></script>
<script type="text/javascript" src = "ajax.js"></script>
<script type="text/javascript">
	
	function validate(){
		var	name = document.getElementById('name').value;
		var	date = document.getElementById('date').value;
		var	time = document.getElementById('time').value;
		var	contact = document.getElementById('contact').value;
		var	email = document.getElementById('email').value;
		var	note = document.getElementById('note').value;
		var	title = document.getElementById('title').value;
		var text = document.getElementById('validate');

		if(name == "" || date == "" || time == "" || contact == "" || email == "" || note == "" || title == "") {
			text.innerHTML = 'You need to fill all fields';
			text.style.color = "red";
			return false;
		}

		if(contact.length !== 11){
			text.innerHTML = 'Contact number should be 11 digits';
			text.style.color = "red";
			return false;
		}

	}
</script>
</body>
</html>


<?php  
include_once('config.php');
include_once('CalendarBooking.php');

	$name = (isset($_POST['name'])) ? $_POST['name']: false;
	$date = (isset($_POST['date'])) ? $_POST['date']: false;
	$time = (isset($_POST['time'])) ? $_POST['time']: false;
	$contact = (isset($_POST['contact'])) ? $_POST['contact']: false;
	$email = (isset($_POST['email'])) ? $_POST['email']: false;
	$note = (isset($_POST['note'])) ? $_POST['note']: false;
	$title = (isset($_POST['title'])) ? $_POST['title']: false;

	if(!empty($name) && !empty($date) && !empty($time) && !empty($contact) && !empty($email) && !empty($note) && !empty($title)){
		$validDate = CalendarBooking::dateValidation($date);
		if($validDate == false) {
			if(strlen($contact) == 11){
				if(is_numeric($contact)){
					CalendarBooking::insert($name, $date, $time, $contact, $email, $note, $title);
				}
			}			
		}
	}

?>



