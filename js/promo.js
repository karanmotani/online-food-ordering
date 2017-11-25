$(document).ready(function() {
	$('#promoCode').on('blur', promoCheck)

	function promoCheck() {
		var flag = 1
		var promoCode = $('#promoCode').val()
		if(flag==1){

		if (promoCode == 'STDNT121') {
			$('#promo').hide()
			alert('Promo Valid')
			flag = 0
			$('#gTotal').text(parseFloat(($('#gTotal').text())*0.75).toFixed(2))
		}

		else if (promoCode == 'FREEDEL') {
			$('#promo').hide()
			alert('Promo Valid')
			alert($('#delivery').text())
			$('#delivery').text('3.99').css({"text-decoration":  "line-through"});
			$('#gTotal').text(parseFloat(($('#gTotal').text())-3.99).toFixed(2))
			flag = 0
		}

		else {
			$('#promo').html('Promo Invalid!').show()
		}
	}
	else{
		$('#promo').html('Only one promo code at a time!').show()
	}

	}

});