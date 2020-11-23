<div class="flexbox-container" id="createOrderForm2">

    <div class="inputfield">
        <h2>Create Order</h2>
    </div>

    <div class="inputfield">
        <label>Order Name</label>
        <input type="text" id="OrderName"   class="form-contrall" value="" placeholder="eg. uoc batch t shirt">
    </div>
    <div class="inputfield">
        <label>Item Count</label>
        <label for='ItemCount' class="form-contrall-label"></label>
    </div>

    <div class="inputfield">
        <label for="SuppliesId2">Estimate Time</label>
        <div class="inputbutton">
            <label for='EstimateTime' class="form-contrall-label"></label>
            <button id="" onclick="location.href" type="button"  class="btn2 input2 cripple">Generate</button>
        </div>
        <label for='FM2' class="error"></label>
    </div>

    <div class="inputfield">
        <label>Due Date</label>
        <input type="datetime-local" id="DueDate" name="" class="form-contrall">
<!--        <input type="date" data-date="" data-date-format="DD-MM-YYYY" value="" class="form-contrall">-->
    </div>
    <div class="inputfield">
        <label>Estimate Total Price</label>
        <label for='EstimateTotalPrice' class="form-contrall-label"></label>
<!--        <input type="text" id="EstimateTotalPrice" name="astimatetotalprice" class="form-contrall-readonly" >-->
    </div>
    <div class="inputfield">
        <label>Estimate Advance</label>
<!--        <input type="text" id="EstimateAdvance" name="astimateadvance" class="form-contrall-readonly" readonly>-->
        <label for='EstimateAdvance' class="form-contrall-label"></label>
    </div>
<!--    <div class="inputfield">-->
<!--        <label>Add Customer</label>-->
<!--        <div class="btn2-contrall">-->
<!--            <button type="button" class="btn">New Customer </button>-->
<!--            <button type="button" class="btn">Existing Customer</button>-->
<!--        </div>-->
<!--    </div>-->
    <div class="inputfield">
        <label for="SuppliesId2">Add Customer</label>
        <div class="inputbutton2">
            <label for='customerLabel' class="form-contrall-label"></label>
            <button id="NewCustomerBtn"   type="button"  class="btn31 input3 cripple">New</button>
            <button id="ExistingCustomerBtn"  type="button"  class="btn32 input3 cripple">Existing</button>
        </div>
        <label for='FM2' class="error"></label>
    </div>
    <div class="inputfield">
        <label id="ItemType2">Order Status</label>
        <select id="OrderStatus" name="satus" class="form-contrall">
            <option value="Not Conform">Not Conform</option>
            <option value="Pending">Pending</option>
            <option value="OnGoing">OnGoing</option>
            <option value="Start">Start</option>
            <option value="End">End</option>
        </select>
    </div>
    <div class="inputfield">
        <label for="Description">Description</label>
        <textarea id="Description" name="description" rows="4" cols="50"  class="form-contrall"></textarea>
    </div>
    
    <div class="inputfield inputbutton">
        <button type="button" id="CancelOrder" class="model-btn2 cripple">Cancel</button>
        <button type="button" id="saveOrder" class="model-btn cripple">Save Order</button>
    </div>

</div><!-- createOrderForm2-->
