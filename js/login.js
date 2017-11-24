$('#loginFrame').on('shown.bs.modal', function () {
    $('input#email').focus();
})

function login(){
    var email = $("#loginemail").val();
    var password = $("#loginpassword").val();
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
                    //$("#loginFrame .close").click();
                    //alert("Hello "+ json.user + ", welcome back! ");
                    setTimeout(function(){ $('#loginFrame .modal-body').html("Hello "+ json.user + ", welcome back! ")}, 3000);
                    if (json.msg == "01")
                        window.location.href = "all_items.php";
                    else
                        window.location.href = "index.php";
                }
                else { 
                    $('#loginFrame .modal-body').html(json.msg).css("color","#999").appendTo('.sub').fadeOut(2000); 
                    //alert(json.msg);
                    setTimeout(function(){ location.reload()}, 2000);
                    return false; 
                } 
            },
            error: function() {
                 $('#loginFrame .modal-body').html("Connection failure, please try again later. "); 
                 //setTimeout(function(){ location.reload()}, 3000);
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