$('#loginFrame').on('shown.bs.modal', function () {
    $('input#email').focus();
})

function login(){
    var email = $("#loginemail").val();
    var password = $("#loginpassword").val();
    var current_page=window.location.href;
    if (email!="" && password!=""){
        $.ajax({
            type: "POST",
            url: "././ajax/login.php?action=login",
            dataType: 'json',
            data: {"email":email, "password":password}, 
            beforeSend: function(){
                $('#loginFrame .modal-body').html("Logging in..."); 
            },
            success: function(json){
                if (json.success==1){
                    setTimeout(function(){ $('#loginFrame .modal-body').html("Hello "+ json.user + ", welcome back! ")}, 3000);
                    if (json.msg == "01")
                        window.location.href = "all_items.php";
                    else
                        window.location.href = "index.php";
                        // window.location.href = 'cart.php';
                }
                else { 
                    $('#loginFrame .modal-body').html(json.msg).css("color","#999").appendTo('.sub').fadeOut(2000); 
                    setTimeout(function(){ 
                        // window.location.reload()
                        window.location.href = 'index.php';
                        // location.reload()
                    }, 2000);
                    return false; 
                } 
            },
            error: function() {
                 $('#loginFrame .modal-body').html("Connection failure, please try again later. "); 
            },
        })
    }


}

function logout(){
    $.post("././ajax/login.php?action=logout",function(msg){ 
        if(msg==1){ 
            // location.reload();
            window.location.href = "index.php";
        } 
    });
}