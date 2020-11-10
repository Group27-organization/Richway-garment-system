<div class="flexbox-container">

    <div class="form-header">
        <h3>Add Item</h3>
    </div>




    <div class="inputfield">
        <label for="OrderId">Order Id</label>
        <select id="OrderId" name="orderId"  class="form-contrall">
            <option value="0" selected="" disabled="">--SELECT--</option>
            <?php if(!empty($data)): ?>
                <?php foreach($data  as $c):?>
                    <option data-value="<?php echo $c->order_ID; ?>" value="<?php echo $c->order_ID; ?>"><?php echo $c->order_ID."-".$c->order_name ?></option>
                <?php endforeach;?>
            <?php endif; ?>
        </select>
        <?php linkJS("assets/js/stock-keeper-js/raw-material-form.js"); ?>
        <label for='FM1' class="error"></label>
    </div>




    <div class="inputfield">
        <label for="SuppliesId2">Select Order Item</label>
        <div class="inputbutton">
            <label for='OrderItemsID' class="txtOIField"></label>
            <button id="slt-orderitems" onclick="location.href" type="button"  class="txtWBtn cripple">Find</button>
        </div>
        <label for='FM2' class="error"></label>
    </div>


    <div class="inputfield " id="bfn-btnid">
        <label>Add Material</label>
        <div class="btn3-flex">
            <div><button id="buttonbtn" onclick="location.href" type="button"  class = "btn3 cripple cbn"  >Button</button></div>
            <div><button id="fabricbtn" onclick="location.href" type="button"  class = "btn3 cripple cbn" >Fabric</button></div>
            <div><button id="noolbtn" onclick="location.href" type="button"    class = "btn3 cripple cbn" >Nool</button></div>
        </div>
        <label for='FM3' class="error"></label>
    </div>


    <!--   -----------------------nool fabric button  label box---------------------    -->


<!--table load-->
    <div id="BFNAddTable" class="dynamic-tableInForm">
        <table class="formTable">
            <caption></caption>
            <thead>
            <tr>
                <th scope="col">Order Id</th>
                <th scope="col">Order Item Id</th>
                <th scope="col">Type</th>
                <th scope="col">Style</th>
                <th scope="col">Quantity</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Supplier Id</th>
                <th scope="col"></th>

            </tr>
            </thead>
            <tbody>

            <tr></tr>

            </tbody>
        </table>
    </div>


    <!--   -----------------------nool fabric button in after label box---------------------    -->
    <br><div class="inputfield">
        <button id="submitForm" class="btn cripple" >Submit</button>
    </div>



</div><!--flexbox-container-->