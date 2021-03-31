
$(document).ready(function(){
    $("#forgotPasswordForm").submit(function(e){

        const email = document.getElementById('email').value;

        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/loginController/forgotPassword",
            data: { key: "forgotPasswordData", email: email },
            dataType: "json",
            success: function(data){
                console.log(data);
                switch (data['status']){
                    case 1:
                    case 2:
                        $("#msgv1").css("display","flex");
                        $("#error_msg1").html(data['msg']);
                        break;
                    case 3:
                        if(!alert(data['msg'])) {
                            window.location.href = "http://localhost/Richway-garment-system/loginController/forgotPasswordView"
                        }
                        break;
                    case 4:
                        if(!alert(data['msg'])) {
                            window.location.href = "http://localhost/Richway-garment-system/loginController/logout"
                        }
                        break;
                }
            },
            error       : function() {
                if(!alert("Something went wrong.")) {
                    window.location.href = "http://localhost/Richway-garment-system/loginController/forgotPasswordView"
                }
            }
        });

        e.preventDefault();

    });
});

function forgotPassword(){
    document.getElementById("forgot_password_btn").innerHTML = "<i class=\"fas fa-spinner fa-spin\"></i>" + "Create account";
    document.getElementById("forgot_password_btn").style.opacity = '0.8';
    document.getElementById("forgot_password_btn").style.cursor = 'default';
    document.getElementById("forgot_password_btn").disabled = true;
}
