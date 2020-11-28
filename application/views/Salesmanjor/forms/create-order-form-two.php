<div class="flexbox-container" id="createOrderForm2">



    <div class="inputfield">
        <label>Order Description</label>
        <input type="text" id="OrderName"   class="form-contrall" value="" placeholder="eg. uoc batch t shirt">
        <label for="OD"  class="error" style="color: red; display:none" >This Field Required!</label>
    </div>

    <div class="inputfield">
        <label for="SuppliesId2">Estimate Time</label>
        <div class="inputbutton">
            <label for='EstimateTime' class="form-contrall-label"></label>
            <button id="" onclick="location.href" type="button"  class="btn2 input2 cripple">Generate</button>
        </div>
        <label for="ET"  class="error" style="color: red; display:none" >This Field Required!</label>
    </div>


    <div class="inputfield">
        <label for="SuppliesId2">Add Customer</label>
        <div class="inputbutton2">
            <label for='customerLabel' class="form-contrall-label"  style="display: none"></label>
            <label for='customerDetailsLabel' class="form-contrall-label"></label>
            <button id="NewCustomerBtn"   type="button"  class="btn31 input3 cripple">New</button>
            <button id="ExistingCustomerBtn"  type="button"  class="btn32 input3 cripple">Existing</button>
        </div>
        <label for="AC"  class="error" style="color: red; display:none" >This Field Required!</label>
    </div>
    <div class="inputfield">
        <label>Due Date</label>
        <input type="datetime-local" id="DueDate" name="" class="form-contrall">
        <label for="DD"  class="error" style="color: red; display:none" >This Field Required!</label>
    </div>

    <div class="inputfield">
        <label>Estimate Total Price</label>
        <label for='EstimateTotalPrice' class="form-contrall-label"></label>
        <label for="TP"  class="error" style="color: red; display:none" >This Field Required!</label>
    </div>

     <div class="inputfield">
        <label>Estimate Advance</label>
        <label for='EstimateAdvance' class="form-contrall-label"></label>
         <label for="EA"  class="error" style="color: red; display:none" >This Field Required!</label>
    </div>

    <div class="inputfield inputbutton">
        <button type="button" id="CancelOrder" class="model-btn2 cripple">Cancel</button>
        <button type="button" id="saveOrder" class="model-btn cripple">Save Order</button>
    </div>

</div><!-- createOrderForm2-->
