
prdname = document.getElementById("firsttab").innerHTML.toString().toLowerCase();
addNewDesignBtn = document.getElementById("add_new_design");
updateNewDesignBtn=document.getElementById("update_design");
openProduct(null,prdname);

function openProduct(evt,product) {
    let i, tablinks, addProductBtn ,addnewdesignbtn, updatedesignbtn;

    if(evt != null){
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        evt.currentTarget.className += " active";

    }

        addnewdesignbtn = document.getElementById("add_new_design_text");
        updatedesignbtn = document.getElementById("update_design_text");
        addnewdesignbtn.innerText = "Add New " + product.replaceAll("_","-") + " Design";
        updatedesignbtn.innerText = "Update " + product.replaceAll("_","-") + " Properties";
        addnewdesignbtn.style.textTransform = "capitalize";
        updatedesignbtn.style.textTransform = "capitalize";

        addProductBtn = document.getElementById("addproduct");
        addProductBtn.onclick = function() {

            $.ajax({
                type: 'POST',
                url: "http://localhost/Richway-garment-system/manageProductController/setNewSession",
                data: { productName: product,  key: "manageProductData"},
                success: function(data,status){
                    location.href = "http://localhost/Richway-garment-system/manageProductController/addProductView";
                },
                error       : function() {
                }
            });

        }



        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/manageProductController/loadTable",
            data: { tableName: product,  key: "manageProductData"},
            dataType: 'html',
            success: function(data){
                $("#table-responsive").html(data);
                selectRow(null,"",);

            },
            error       : function() {
                $("#table-responsive").html('<br><p>Something went wrong.</p>');
            }
        });

    addNewDesignBtn.onclick = function() {

        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/manageProductController/setNewSession",
            data: { productName:product ,  key: "manageProductData"},
            success: function(data,status){
                location.href = "http://localhost/Richway-garment-system/manageProductController/addPredefineView";
            },
            error       : function() {
            }
        });

    }


    updateNewDesignBtn.onclick=function(){
        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/manageProductController/setNewSession",
            data: { productName:product ,  key: "manageProductData"},
            success: function(data,status){
                location.href = "http://localhost/Richway-garment-system/manageProductController/updatePredefineView";
            },
            error       : function() {
            }
        });
    }



}


function selectRow(evt,url,size) {
    let i, tblrows;

    tblrows = document.getElementsByClassName("tblrow");

    if (evt != null) {

        for (i = 0; i < tblrows.length; i++) {
            tblrows[i].className = tblrows[i].className.replace(" active-row", "");
        }
        evt.currentTarget.className += " active-row";

       // console.log("url:"+url);

    }
    else{
        for (i = 0; i < tblrows.length; i++) {
            if (tblrows[i].className.includes('active-row')) {
                url = tblrows[i].lastElementChild.innerHTML;
                size = tblrows[i].children.item(2).innerHTML;
                //console.log("url:"+url);
            }
        }
    }

    $("#product_img").html("<img class='easeload'  onload=\"this.style.opacity=1\" src=\"http://localhost/Richway-garment-system/public/assets/img/" + url + "\" style=\"width: 100%; height: 100%; object-fit: scale-down;\">");

    $("#product_size").html(size);

}
