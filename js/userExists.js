$(document).ready(function() {
	$('#email').on('keyup', function() {
		var email = $('#email').val();
		$.ajax({
            url: "register2.php",
            type: "POST",
            data: {
            	"email": email
            },
            success: function(data){
                $('#exists').html(data).addClass('short')
            }
		});
	})
    .on('blur', function() {
        var email = $('#email').val();
        $.ajax({
            url: "register2.php",
            type: "POST",
            data: {
                "email": email
            },
            success: function(data){
                $('#exists').html(data).addClass('short')
                $('button').attr('disabled', 'disabled');
            }
        });
    });

})