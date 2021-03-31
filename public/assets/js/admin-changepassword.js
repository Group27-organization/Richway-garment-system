
$(document).ready(function(){
    $("#changePasswordForm").submit(function(e){

        const new_psw = document.getElementById('new_password').value;
        const confirm_psw = document.getElementById('confirm_password').value;

        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/manageUserController/changePassword",
            data: { key: "changePasswordData", new_psw: new_psw, confirm_psw: confirm_psw },
            dataType: "json",
            success: function(data){
                console.log(data);
                switch (data['status']){
                    case 1:
                    case 2:
                    case 3:
                        $("#msgv1").css("display","flex");
                        $("#msgv2").css("display","none");
                        $("#error_msg1").html(data['msg']);
                        break;
                    case 4:
                    case 5:
                    case 6:
                        $("#msgv1").css("display","none");
                        $("#msgv2").css("display","flex");
                        $("#error_msg2").html(data['msg']);
                        break;
                    case 7:
                        if(!alert(data['msg'])) {
                            window.location.href = "http://localhost/Richway-garment-system/manageUserController/changePassword"
                        }
                        break;
                    case 8:
                        if(!alert(data['msg'])) {
                            window.location.href = "http://localhost/Richway-garment-system/loginController/logout"
                        }
                        break;
                }
            },
            error       : function() {
                if(!alert("Something went wrong.")) {
                    window.location.href = "http://localhost/Richway-garment-system/manageUserController/changePassword"
                }
            }
        });

        e.preventDefault();

    });
});

