<div class="bg-modal" id="rawmaterialformpopup">
    <div class="modal-contents">

        <div id="close-orderitemtable" class="close" onclick="closeOrderItemModel()">+</div>

        <div class="model-header">
            <h2 id="h3-tag"></h2>
        </div>
        <div class="flexbox-container-popup" >
            <div class="inputfield2 ">
                <label for="slt1" id="lbl1">#</label>
                <select id="slt1" name="buttonstyle"  class="form-contrall2" required>
                    <!--                    <option value="0" selected="" disabled="">--SELECT--</option>-->
                </select>
            </div>



            <div class="inputfield2">
                <label for="Quantity" id="lbl4"></label>
                <input type="text" id="Quantity" name="quantity" palaceholder="" class="form-contrall2">
            </div>

            <div class="inputfield2">
                <label for="UnitPrice" id="lbl5"></label>
                <input type="text" id="UnitPrice" name="unitprice" class="form-contrall2">
            </div>

            <div class="inputfield2 second" id="selectSupplier">
                <label for="SuppliesId">Assign Supplies</label>
                <div class="inputbutton">
<!--                    <label for='SuppliesIdLabel' class="form-contrall"></label>-->
                    <input type="text" id="SuppliesId" name="" class="form-contrall2">
                    <button id="findsupbtn" onclick="location.href" type="button"  class="btn2 input2 cripple">Find</button>
                </div>
            </div>
            <div id="supplierWap" >
                <div class="flex-row-tab">
                    <div class="SearchBtnWap">
                        <div class="search">
                            <input type="text" class="searchTerm" placeholder="What are you looking for?">
                            <button type="submit" class="searchButton">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>

                </div><!--flex row-->

                <div id="tableParent-suppliresTable" class="table-responsive">

                </div>
            </div>

        </div><!--   flexbox-container-popup  -->
        <div class="model-footer" id="rawmaterial-error">
            <h5>* Something  to assign!</h5>
        </div>
        <div class="bottom-row2">
            <div class="BtnWap2">
            <button id="closePopup" class="model-btn2-popup cripple" onclick="closeOrderItemModel()" >Close</button>
            <button id="addBFNBtn2" class="model-btn-popup cripple">Add</button>
        </div>
        </div>
    </div><!--    modal-contents-->
</div><!--bg-modal-->