$(document).ready(function() {
	$('#promoCode').on('blur', promoCheck)

	function promoCheck() {
		var flag = 0
		var promoCode = $('#promoCode').val()

		if (promoCode == 'HSGET15') {
			flag = 1;
			var totalPrice = parseFloat(($('#gTotal').text())*0.85).toFixed(2)
			$('#promo').hide()
			$('#promo').html('&#10004;').show().css({'float': 'right', 'color': 'green'});
			$('#gTotal').text(totalPrice)
			$('#promoCode').attr('disabled', 'disabled');
			$.ajax({
	            url: "placeOrder1.php",
	            type: "POST",
	            data: {
	            	"totalPrice": totalPrice,
	            	"promoFlag": flag
	            },
	            success: function(data){
	            }
			});
		}

		else if (promoCode == 'HSFREEDEL') {
			flag = 1;
			var totalPrice = parseFloat(($('#gTotal').text())-3.99).toFixed(2)
			$('#promo').hide()
			$('#promo').html('&#10004;').show().css({'float': 'right', 'color': 'green'});
			$('#delivery').text('3.99').css({"text-decoration":  "line-through"});
			$('#gTotal').text(totalPrice)
			$('#promoCode').attr('disabled', 'disabled');
			$.ajax({
	            url: "placeOrder1.php",
	            type: "POST",
	            data: {
	            	"totalPrice": totalPrice,
	            	"promoFlag": flag
	            },
	            success: function(data){
	            }
			});
		}

		else if (promoCode == 'HSOFF50') {
			flag = 1;
			var totalPrice = parseFloat(($('#gTotal').text())*0.50).toFixed(2)
			$('#promo').hide()
			$('#promo').html('&#10004;').show().css({'float': 'right', 'color': 'green'});
			$('#gTotal').text(totalPrice)
			$('#promoCode').attr('disabled', 'disabled');
			$.ajax({
	            url: "placeOrder1.php",
	            type: "POST",
	            data: {
	            	"totalPrice": totalPrice,
	            	"promoFlag": flag
	            },
	            success: function(data){
	            }
			});
		}

		else if (promoCode == '') {
			$('#promo').hide()
			flag = 0
		}

		else {
			flag = 0;
			$('#promo').html('&#10008;').show().css({'float': 'right', 'color': 'red'});
		}

	}

});