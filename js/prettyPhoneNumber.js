$(document).ready(function() {

	$('#phone').on('change', function() {
		var phoneNumber = $('#phone').val()
		var s2 = (""+phoneNumber).replace(/\D/g, '');
		var m = s2.match(/^(\d{3})(\d{3})(\d{4})$/);
		var result = ((!m) ? null : "(" + m[1] + ") " + m[2] + "-" + m[3]);
		if (result == null) {
			$("#prettyNumber").show();
			$('#prettyNumber').html('Enter Valid Phone Number').addClass('short')
			$('button').attr('disabled', 'disabled');
		}

		else {
			$('button').prop('disabled', false);
			$("#prettyNumber").hide();
			$('#phone').val(result)
			// $('#phone').val(phoneNumber)
		}

	})
})