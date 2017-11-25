$(document).ready(function() {

	$('.cartQuantity').on('change', updateQuant)

  	function updateQuant() {
 		var temp = $(this).attr('id');
 		// alert(temp)
 		var temp1 = temp.split("-")
		var id = temp1[0]
		var name = temp1[1].toUpperCase();
    	var quantity = parseInt($(this).val());
    	var max = parseInt($(this).attr('max'));
    	// alert(quantity)

    	if(quantity == 0 || isNaN(quantity)){
    		quantity = 1;
    		alert(name + " quantity cannot be NULL. \nPlease click on remove if you do not want this item!")
    	}
    	else if(quantity > max){
    		quantity = max;
    		alert("Max Quantity for " + name + " is " + max + "!!")
    	}
    	else{
    		quantity = $(this).val();
    	}

        $.ajax({
            url: "cartUpdate.php",
            type: "GET",
            dataType: "json",
            data: {
                action : 'update',
                code : id,
                quantity : quantity,
            },
            success: function(data) {
                $('#' + temp).val(quantity)
                $('#' + id).html('<center>' + '$' + data[0] * data[1] + '</center>')
                
                var iP = 0

                $(".itemPrice").each(function() {
                    iP += parseInt($(this).text().replace("$", ""))
                });

                $('#totalPrice').html('<strong>Total: $</strong>' + iP)
            }
        });

    }
});