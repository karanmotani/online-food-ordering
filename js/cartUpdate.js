$(document).ready(function() {

	$('.cartQuantity').on('change', updateQuant)
// 		$.ajax({
// 			url: "../cart.php",
// 			type: "POST",
// 			data: {
// 				"quantity": $('#cartQuantity').val()
// 			},
// 			success: function() {
// 				// window.location.href = "cart.php";
// 				window.location.reload();
// 			}
// 		});

		// var id = $('.cartQuantity').attr('id');
		// alert(id)
  //   	var quantity = $('.cartQuantity').find('.cart-quantity').val();
  //   	alert(quantity)		


  	function updateQuant() {
 		var temp = $(this).attr('id');
 		// alert(temp)
 		var temp1 = temp.split("@")
		var id = temp1[0]
		var name = temp1[1].toUpperCase();
    	var quantity = parseInt($(this).val());
    	var max = parseInt($(this).attr('max'));
    	// alert(quantity)

    	if(quantity == 0 || isNaN(quantity)){
    		quantity = 1;
    		alert(name+ " quantity cannot be NULL. \nPlease click on remove if you do not want this item!")
    	}
    	else if(quantity>max){
    		quantity = max;
    		alert("Max Quantity for "+name+ " is "+max+"!!")
    	}
    	else{
    		quantity = $(this).val();
    	}

    	// if(max >= quantity) {
    	window.location.href = "cart.php?action=update" + "&code=" + id + "&quantity=" + quantity;
    	// }
    	// else{
    		// window.reload()
    	// }
	}


});