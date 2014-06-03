$(document).ready(function() {
	$('#date').on('change', function() {
		var date = $('#date').val();
		$.ajax({
			url: 'date.php',
			method: 'get',
			data: {date : date},
			success: function(response){
				$('#validate').html(response);
			}
		});
	});
});
