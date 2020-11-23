


    <div class="flexbox-container" id="createOrderForm1" >


        <div class="inputfield">
            <label>Item Type</label>
            <select id="ItemType" name="itemtype" class="form-contrall">
            <option value="0" selected="" disabled="">--SELECT--</option>
            <?php if(!empty($data)): ?>
                <?php foreach($data  as $c):?>
                    <option data-value="<?php echo $c->type; ?>"><?php echo $c->type ; ?></option>
                <?php endforeach;?>
            <?php endif; ?>
            </select>
        </div>



<!--        <div class="inputfield">-->
<!--            <label for="ItemType">Item Style</label>-->
<!--            <select id="ItemStyle" name="itemstyle" class="form-contrall">-->

<!--        </select>-->
<!--        </div>-->

        <div class="inputfield">
            <label for="CollarSize">Collar Size</label>
            <select id="CollarSize" name="collarsize" class="form-contrall">
<!--                <option value="volvo">15.5</option>-->
<!--                <option value="saab">16.5</option>-->
            </select>
        </div>

    <div class="inputfield">
        <label for="Material">Choose Template</label>
        <div class="inputbutton" >
            <label for='ChooseTemplate' class="form-contrall-label"></label>
            <button id="ChooseTemplateID" onclick="location.href" type="button"  class="btn2 input2 cripple">Find</button>
        </div>
    </div>
        <div class="inputfield">
            <label for="Material">Fabric Type</label>
            <select id="FabricType" name="FabricType" class="form-contrall">
                <option value="0" selected="" disabled="">--SELECT--</option>
                <option value="Cotton">Cotton</option>
                <option value="Silk" >Silk</option>
            </select>
        </div>

<!--        <div class="inputfield">-->
<!--            <label>Fabric Design</label>-->
<!--            <input type="text" id="MaterialDesign" name="materialDesign" class="form-contrall">-->
<!--        </div>-->

    <div class="inputfield">
           <label>Fabric Design</label>
        <select id="FabricDesign" name="itemtype" class="form-contrall">
            <option value="0" selected="" disabled="">--SELECT--</option>
            <option value="Plane">Plane</option>
            <option value="Custom" >Custom</option>
        </select>
   </div>



<!--        <div class="inputfield" id="addFabricDesign">-->
<!--            <label>Add Fabric Design</label>-->
<!--            <div class="inputbutton" style="justify-content: left; width: 100%;">-->
<!--               <form id="uploadFabric" onsubmit="return false" style="justify-content: left; width: 100%;" >-->
<!--                    <input type="file" class="form-contrall" style="">-->
<!--                  <button id="" type="button" onclick="uploadFabric()" class="">OK</button>-->
<!--                </form>-->
<!--           </div>-->
<!--        </div>-->
<style>
    [type="file"] {
        height: 0;
        overflow: hidden;
        width: 0;
    }

    [type="file"] + label {
        background: #5e72e4;
        border: none;
        border-radius: 5px;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        font-family: 'Rubik', sans-serif;
        font-size: inherit;
        font-weight: 500;
        margin-bottom: 1rem;
        outline: none;
        padding: 1rem 50px;
        position: relative;
        transition: all 0.3s;
        vertical-align: middle;

    &:hover {
         background-color: #5e72e4(#5e72e4, 10%);
     }

    &.btn-1 {
         background-color: #5e72e4;
         box-shadow: 0 6px #5e72e4(#5e72e4, 10%);
         transition: none;

    &:hover {
         box-shadow: 0 4px #5e72e4(#5e72e4, 10%);
         top: 2px;
     }
    }
</style>
        <div class="inputfield" id="addFabricDesign">
            <label>Add Fabric Design</label>

            <form id="uploadFabric" onsubmit="return false" style="justify-content: left; width: 100%;" >
                <input type="file" id="file">
                <label for="file" class="btn-1">upload file</label>

            </form>

        </div>



        <div class="inputfield" id="FabricDesignCodeDiv">
            <label for="FabricDesignCode">Fabric Design Code</label>
            <input type="text" id="FabricDesignCode" name="FabricDesignCode" class="form-contrall">
        </div>

        <div class="inputfield" id="FabricColorDiv">
            <label for="FabricColor">Fabric Color</label>
            <input type="text" id="FabricColor" name="materialColor" class="form-contrall">
        </div>


        <div class="inputfield" id="ButtonDesignDiv">
            <label>Button Design</label>

            <select id="ButtonDesign" name="buttonDesign" class="form-contrall">
                <option value="0" selected="" disabled="">--SELECT--</option>
                <option value="Plane">Flat</option>
                <option value="Custom" >Bubble</option>
            </select>
        </div>



        <div class="inputfield" id="ButtonColorDiv">
            <label for="MatiralColor">Button Color</label>
            <input type="text" id="ButtonColor" name="matiralcolor" class="form-contrall">
        </div>

        <div class="inputfield" id="NoolColorDiv">
            <label for="MatiralColor">Nool Color</label>
            <input type="text" id="NoolColor" name="noolColor" class="form-contrall">
        </div>



    <div class="inputfield">
        <label>Quantity</label>
        <input type="text" id="Quantity" name="quantity" class="form-contrall">
    </div>




        <div class="inputfield inputbutton">
            <button type="button" id="addToBucket" class="model-btn2 cripple" style="height: 48px; width:134px ; color: red;border-color: red;">Add To Bucket</button>
            <button type="button" id="nextBtnf1" class="model-btn cripple" style="height: 48px; width:134px ;">Next</button>
        </div>

</div>