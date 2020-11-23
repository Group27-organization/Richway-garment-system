<div class="bg-modal" id="newCustomerForm">
    <div class="modal-contents">

        <div id="close" class="close" onclick="closeNewCutomerPopup()">+</div>

        <div class="model-header">
            <h2>Add Customer</h2>
        </div>
        <div class="flexbox-container-popup" >

            <div class="inputfield2">
                <label for="Name">Name</label>
                <input type="text" id="CustomerName" name="Name" palaceholder="" class="form-contrall2">
            </div>

            <div class="inputfield2">
                <label for="ContactNumber" id="lbl5">Contact Number</label>
                <input type="text" id="CustomerContactNumber" name="ContactNumber" class="form-contrall2">
            </div>
            <div class="inputfield2">
                <label for="Email">Email</label>
                <input type="text" id="Email" name="Email" palaceholder="" class="form-contrall2">
            </div>

            <div class="inputfield2">
                <label for="Address" id="lbl5">Address</label>
                <input type="text" id="CustomerAddress" name="Address" class="form-contrall2">
            </div>

        </div><!--   flexbox-container-popup  -->

        <div class="model-footer" id="model-footer-newcustomer">
            <h5>* Something  to assign!</h5>
        </div>
        <div class="bottom-row2">
            <div class="BtnWap2">
                <button  class="model-btn2-popup cripple close" onclick="closeNewCutomerPopup()">Close</button>
                <button id="addnewCustomerBtn" class="model-btn-popup cripple">Add</button>
            </div>
        </div>
    </div><!--    modal-contents-->
</div><!--bg-modal-->
