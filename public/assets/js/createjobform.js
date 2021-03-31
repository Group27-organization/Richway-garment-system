
document.getElementById('linAssignbtn').addEventListener("click", function() {
    document.querySelector('#linebgmodal').style.display = "flex";
    document.querySelector('body').style.overflowY = "hidden";

    //let jdata = JSON.parse("{'orderItem':{"order_item_id':122,'quantity':5000,'p_ID':2},'cus_date':'2021-04-19'}");

    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/manageJobController/loadLinesTable",
        data: { key: "manageJobData"},
        success: function(data){
            $("#table-responsive").html(data);
        },
        error       : function() {
            $("#table-responsive").html('<br><p>Something went wrong.</p>');
        }
    });


});

document.getElementById('supAssignbtn').addEventListener("click", function() {
    document.querySelector('#supbgmodal').style.display = "flex";
    document.querySelector('body').style.overflowY = "hidden";
    document.querySelector('#jobFormMsgView').style.display = "none";

    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/manageJobController/loadSupervisorTable",
        data: { key: "manageJobData"},
        success: function(data){
            $("#table-responsive2").html(data);
        },
        error       : function() {
            $("#table-responsive2").html('<br><p>Something went wrong.</p>');
        }
    });


});

function assignLines() {

    let i, lineData, lineIds, jdata, idstr = "[", lineCount, startDate, endDate, lineDataInput;

    lineData = document.getElementById("lineData");
    lineIds = document.getElementById("LineIds");
    lineCount = document.getElementById("lineCount");
    startDate = document.getElementById("startDate");
    endDate = document.getElementById("endDate");

    if(lineData){
        jdata = JSON.parse(lineData.innerText);
        console.log(jdata);
    }else{
        return ;
    }

    console.log(jdata);
    for (i = 0; i < jdata[0].length; i++) {
        idstr += ("LID"+jdata[0][i]+" ");
    }

    idstr = idstr.trimEnd();
    idstr = idstr + "]";

    if(jdata[0].length>0){
        document.querySelector('.model-footer').style.display = "none";
        document.querySelector('.bg-modal').style.display = "none";
        document.querySelector('body').style.overflow = "auto";
        lineIds.value = idstr;
        lineCount.value = jdata[0].length;
        startDate.value = jdata[2];
        endDate.value = jdata[3];

        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/manageJobController/setLineDataSession",
            data: { key: "manageJobData", lineDataJson: jdata},
            success: function(data){
                $("#table-responsive2").html(data);
            },
            error       : function() {
                $("#table-responsive2").html('<br><p>Something went wrong.</p>');
            }
        });

    }
    else {
        document.querySelector('.model-footer').style.display = "block";
    }

}

function assignSupervisor() {

    let i, tblrows, supID = "", act=false, supIDView;

    supIDView = document.getElementById("supervisorId");

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if (tblrows[i].className.includes('active-row')) {
            act = true;
            document.querySelector('#jobFormMsgView').style.display = "none";
            supID = tblrows[i].firstElementChild.innerHTML;

            document.querySelector('#supbgmodal').style.display = "none";
            document.querySelector('body').style.overflow = "auto";
            supIDView.value = supID;
        }
    }
    if(!act){
        document.querySelector('#jobFormMsgView').style.display = "block";
    }

}

function closeModel() {
    document.querySelector('.model-footer').style.display = "none";
    document.querySelector('#linebgmodal').style.display = "none";
    document.querySelector('#supbgmodal').style.display = "none";
    document.querySelector('body').style.overflow = "auto";
}
