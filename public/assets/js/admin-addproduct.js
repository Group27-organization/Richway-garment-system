
document.querySelector('#selectbtn').addEventListener("click", function() {
    document.querySelector('.bg-modal').style.display = "flex";
    document.querySelector('body').style.overflowY = "hidden";

    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/manageProductController/loadDesignTemplates",
        data: { key: "loadDesignTemplateData"},
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

function selectPID(evt,pid,desc,sizes) {

    if(evt != null){

        document.getElementById('Select_Design_Category').value = "PID" + pid + " - " + desc;

        document.querySelector('.bg-modal').style.display = "none";
        document.querySelector('body').style.overflowY = "auto";

        let tmphtml = " <option value=\"\" disabled selected>Select Size</option>";
        var arr = sizes.split(',');
        arr.forEach(function(item) {
            tmphtml += "<option value=\"?\">?</option>".replaceAll("?",item);
        });

        console.log(tmphtml);
        document.getElementById('size').innerHTML = tmphtml;

    }

}


function closeModel() {
    document.querySelector('.model-footer').style.display = "none";
    document.querySelector('.bg-modal').style.display = "none";
    document.querySelector('body').style.overflow = "auto";
}
