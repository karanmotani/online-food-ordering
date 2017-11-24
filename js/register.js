$(function() {

    $("#contactForm input,#contactForm textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
            var password = $("input#password").val();
            var confirmpassword = $("input#confirmpassword").val();
            var name = $("input#name").val();
            var email = $("input#email").val();
            var phone = $("input#phone").val();
            var address = $("textarea#address").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            
                $.ajax({
                    url: "././ajax/register.php",
                    type: "POST",
                    data: {
                        password: password,
                        name: name,
                        phone: phone,
                        email: email,
                        address: address
                    },
                    cache: false,
                    success: function(receivedata) {
                        // Enable button & show success message
                        $("#btnSubmit").attr("disabled", false);
                        alert(receivedata);
                        if (receivedata === "Registration successful, redirecting to the homepage."){
                            window.setTimeout(function(){
                                window.location.href = "index.php";
                            }, 5000);
                            $('#success')
                                .html("<div class='alert alert-success'>");
                            $('#success > .alert-success')
                                .html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                                .append("</button>");
                            $('#success > .alert-success')
                                .append(receivedata);
                            $('#success > .alert-success')
                                .append('</div>');
                            $('#contactForm').trigger("reset");
                            $('#exists').removeClass('short')
                        }
                    else {
                            $('#success')
                                .html("<div class='alert alert-danger'>");
                            $('#success > .alert-danger')
                                .html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                                .append("</button>");
                            $('#success > .alert-danger')
                                .append('Failed to Register!');
                            $('#success > .alert-danger')
                                .append('</div>');
                            $('#contactForm').trigger("reset");
                            $('#exists').removeClass()
                            $('#exists').html('')
                            $('#result').html('')
                            $('#result').removeClass()
                    }

                    }
                });

        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

// When clicking on Full hide fail/success boxes
$('#name').focus(function() {
    $('#success').html('');
});