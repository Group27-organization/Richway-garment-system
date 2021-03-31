
document.getElementById('findbtn').addEventListener("click", function() {
    document.querySelector('.bg-modal').style.display = "flex";
    document.querySelector('body').style.overflowY = "hidden";

    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/manageUserController/loadEmployeeTable",
        data: { key: "manageUserData"},
        success: function(data){
            $("#table-responsive").html(data);
        },
        error       : function() {
            $("#table-responsive").html('<br><p>Something went wrong.</p>');
        }
    });


});

document.querySelector('.close').addEventListener("click", function() {
    document.querySelector('.bg-modal').style.display = "none";
    document.querySelector('body').style.overflowY = "auto";
});


function assignEmployee() {

    let i, tblrows, empID="", email="";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if(tblrows[i].className.includes('active-row')){
            empID = tblrows[i].firstElementChild.innerHTML;
            email = tblrows[i].lastElementChild.innerHTML;
        }
    }

    if(empID.length>0){
        document.querySelector('.model-footer').style.display = "none";
        document.getElementById("EmployeeId").value = empID;
        document.getElementById("UserName").value = email;
        document.querySelector('.bg-modal').style.display = "none";
        document.querySelector('body').style.overflow = "auto";
    }
    else {
        document.querySelector('.model-footer').style.display = "block";
    }

}

function closeModel() {
    document.querySelector('.model-footer').style.display = "none";
    document.querySelector('.bg-modal').style.display = "none";
    document.querySelector('body').style.overflow = "auto";
}

function createAccount(){
    document.getElementById("create_account_btn").innerHTML = "<i class=\"fas fa-spinner fa-spin\"></i>" + "Create account";
    document.getElementById("create_account_btn").style.opacity = '0.8';
    document.getElementById("create_account_btn").style.cursor = 'default';
    document.getElementById("create_account_btn").disabled = true;
}