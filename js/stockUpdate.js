$(document).ready(function() {
	$('.nature').on('change', stockUpdate)

	function stockUpdate() {
		var stockID = $(this).attr('id');
		var stock = $(this).val()

		$.ajax({
			url: "stockUpdate.php",
            type: "POST",
            data: {
            	"stockID": stockID,
            	"stock": stock
            },
            success: function(data){
                alert(data)            
            }
		});
	}
})