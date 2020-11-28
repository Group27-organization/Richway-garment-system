<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>



<div class="flexbox-container" id="createOrderForm1" >


        <div class="inputfield">
            <label>Item Type</label>
            <select id="ItemType" name="options" class="form-contrall">
            <option  value="0" selected="" disabled="">--SELECT--</option>
            <?php if(!empty($data)): ?>
                <?php foreach($data  as $c):?>
                    <option data-value="<?php echo $c->type; ?>"><?php echo $c->type ; ?></option>
                <?php endforeach;?>
            <?php endif; ?>
            </select>
            <label for="IT" class="error" style="color: red; display:none" >This Field Required!</label>
        </div>



        <div class="inputfield">
            <label for="CollarSize">Collar Size</label>
            <select id="CollarSize" name="options" class="form-contrall"></select>
            <label for="CS" class="error" style="color: red; display:none" >This Field Required!</label>
        </div>



    <div class="inputfield">
        <label for="Material">Choose Template</label>
        <div class="inputbutton" >
            <label for='ChooseTemplate' class="form-contrall-label" style="display: none;"></label>
            <label for='TemplateDescription' class="form-contrall-label"></label>
            <button id="ChooseTemplateID" onclick="location.href" type="button"  class="btn2 input2 cripple">Find</button>
        </div>
        <label for="CT" class="error" style="color: red; display:none" >This Field Required!</label>
    </div>

    <style>
        .dropdownimage{
            width:50px;
            height:60px;
            display: inline-block;
        }
        .dropdownList{
            margin-top:-10px;
            padding-top: 0px;

        }
    </style>

        <div class="inputfield" >
            <label>Fabric Design Code</label>
            <select id='fabricdesigncode' name="options" style='width: 100%;'></select>
            <label for="FDC"  class="error" style="color: red; display:none" >This Field Required!</label>
        </div>

    <div class="inputfield" id="ButtonDesignDiv">
        <label>Button  Design Code</label>
        <select id='buttondesigncode' name="options" style='width: 100%;'></select>
        <label for="BDC"  class="error" style="color: red; display:none" >This Field Required!</label>
    </div>

     <div class="inputfield">
        <label>Quantity</label>
        <input type="text" id="Quantity" name="quantity" class="form-contrall">
         <label for="Q"  class="error" style="color: red; display:none" >This Field Required!</label>
    </div>




        <div class="inputfield inputbutton">
            <button type="button" id="addToBucket" class="model-btn2 cripple" style="height: 48px; width:134px ; color: red;border-color: red;">Add To Bucket</button>
            <button type="button" id="nextBtnf1" class="model-btn cripple" style="height: 48px; width:134px ;">Next</button>
        </div>

</div>