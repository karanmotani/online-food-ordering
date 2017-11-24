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
            	// alert(data)
            	// $('#result').addClass('weak')
                $('#exists').html(data).addClass('short')
                // window.location.href = "home.php";
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
                // alert(data)
                // $('#result').addClass('weak')
                $('#exists').html(data).addClass('short')
                // window.location.href = "home.php";
            }
        });
    });

})