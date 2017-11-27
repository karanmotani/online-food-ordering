$(document).ready(function() {

	$('.cartQuantity').on('change', updateQuant)

  	function updateQuant() {
 		var temp = $(this).attr('id');
 		// alert(temp)
 		var temp1 = temp.split("-")
		var id = temp1[0]
		var name = $(this).attr('dish');
    	var quantity = parseInt($(this).val());
    	var max = parseInt($(this).attr('max'));
    	// alert(max)
        // alert(quantity)

    	if(quantity <= 0 || isNaN(quantity)){
    		quantity = 1;
            $('#' + temp).val(quantity)
    		alert(name + " Quantity not valid. \nPlease click on remove if you do not want this item!")
    	}
    	else if(quantity > max){
    		quantity = max;
            $('#' + temp).val(quantity)
    		alert("Max Available Quantity for " + name + " is " + max + "!!")
    	}
    	else{
    		quantity = $(this).val();
    	}

        var totalQuantity = 0

        $(".cartQuantity").each(function() {
            totalQuantity += parseInt($(this).val())
        });

        $.ajax({
            url: "cartUpdate.php",
            type: "GET",
            dataType: "json",
            data: {
                action : 'update',
                code : id,
                quantity : quantity,
                totalQuantity : totalQuantity,
            },
            success: function(data) {
                $('#' + id).html('<center>' + '$' + data[0] * data[1] + '</center>')
                
                var iP = 0

                $(".itemPrice").each(function() {
                    iP += parseInt($(this).text().replace("$", ""))
                });

                $('#totalPrice').html('<strong>Total: $</strong>' + iP)

                $('.rw-number-notification').text(data[2])
            }
        });

    }
});