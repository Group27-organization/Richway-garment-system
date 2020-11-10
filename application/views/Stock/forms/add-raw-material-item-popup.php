<div class="bg-modal">
    <div class="modal-contents">

        <div id="close" class="close" >+</div>

        <div class="model-header">
            <h2 id="h3-tag"></h2>
        </div>
        <div class="flexbox-container-popup" >
            <div class="inputfield2 ">
                <label for="slt1" id="lbl1">#</label>
                <select id="slt1" name="buttonstyle"  class="form-contrall" required>
                    <!--                    <option value="0" selected="" disabled="">--SELECT--</option>-->
                </select>
            </div>



            <div class="inputfield2">
                <label for="Quantity" id="lbl4"></label>
                <input type="text" id="Quantity" name="quantity" palaceholder="" class="form-contrall">
            </div>

            <div class="inputfield2">
                <label for="UnitPrice" id="lbl5"></label>
                <input type="text" id="UnitPrice" name="unitprice" class="form-contrall">
            </div>

            <div class="inputfield2 second" id="selectSupplier">
                <label for="SuppliesId">Assign Supplies</label>
                <div class="inputbutton">
                    <label for='SuppliesIdLabel' class="txtOIField"></label>
<!--                    <input type="text" id="SuppliesId" name="EmployeeId" class="form-contrall txtsupp">-->
                    <button id="findsupbtn" onclick="location.href" type="button"  class="txtWBtn cripple">Find</button>
                </div>
            </div>
            <div id="supplierWap">
                <div class="SearchBtnWap">
                    <div class="search">
                        <input type="text" class="searchTerm" placeholder="What are you looking for?">
                        <button type="submit" class="searchButton">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <div id="tableParent-suppliresTable" class="tableParent-oI-Table">

                </div>
            </div>

        </div><!--   flexbox-container-popup  -->
        <div class="model-footer">
            <h5>* Something  to assign!</h5>
        </div>
        <div class="BtnWap">
            <button id="closePopup" class="audButton2 cripple " >Close</button>
            <button id="addBFNBtn2" class="audButton cripple">Add</button>
        </div>
    </div><!--    modal-contents-->
</div><!--bg-modal-->