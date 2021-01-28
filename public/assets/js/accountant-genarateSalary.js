
document.getElementById('generate-salary-btn').addEventListener("click", function() {
    document.querySelector('.bg-modal').style.display = "flex";
    document.querySelector('body').style.overflowY = "hidden";

    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/manageUserController/loadEmployeeTable",
        data: { key: "manageUserData"},
        success: function(data){
            $("#table-emptxt").html(data);
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

    let i, tblrows, empID="";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if(tblrows[i].className.includes('active-row')){
            empID = tblrows[i].firstElementChild.innerHTML;
        }
    }

    if(empID.length>0){
        document.querySelector('.model-footer').style.display = "none";
        document.getElementById("EmployeeId").value = empID;
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
