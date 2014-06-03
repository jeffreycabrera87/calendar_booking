<?php


class calendarBooking{
	
	public static function insert($name, $date, $time, $contact, $email, $note, $title) {
		global $db;
		$query = "INSERT INTO exam(`name`, `event_date`, `event_time`, `contact_no`, `email`, `note`, `title_of_event`) 
							VALUES ('$name', '$date', '$time', '$contact', '$email', '$note', '$title')";

		$result = $db->query($query);
		return $result;
	}

	public static function view() {
		global $db;
		$query = "SELECT * FROM exam WHERE approve = 'Y'";
		$result = $db->query($query);
		return $result;
	}

	public static function approve($id) {
		global $db;
		$query = "UPDATE `exam` SET `approve`= 'Y' WHERE id = '$id'";
		$result = $db->query($query);
		return $result;
	}

	public static function dateValidation($date) {
		global $db;
		$query = "SELECT id FROM exam WHERE event_date = '$date'";
		$result = $db->query($query);
		if($result->num_rows) {
			return true;
		} else {
			return false;
		}
	}

	public static function viewAdmin() {
		global $db;
		$query = "SELECT * FROM exam WHERE approve = 'N'";
		$result = $db->query($query);
		return $result;
	}
}