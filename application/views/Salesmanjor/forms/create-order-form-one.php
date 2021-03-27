<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Alegreya+Sans' rel='stylesheet' type='text/css'>

<form id="form1">
<div class="flexbox-container" id="createOrderForm1" >
    <div style="margin-bottom: 40px;width: 90%">
        <ol class="progtrckr" data-progtrckr-steps="5">
            <li class="progtrckr-done">Order Processing</li>
            <li class="progtrckr-todo">Order Details</li>
            <li class="progtrckr-todo">Order Schedule</li>
            <li class="progtrckr-todo">Order Invoice</li>
        </ol>
    </div>



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

            <label for="itemType" class="error" style="color: red; " >This Field Required!</label>
        </div>



        <div class="inputfield">
            <label for="CollarSize">Collar Size</label>
            <select id="CollarSize" name="options" class="form-contrall"></select>
<!--            <label for="CS" class="error" style="color: red; display:none" >This Field Required!</label>-->
            <label for="collarSize" class="error" style="color: red; display:none" >This Field Required!</label>
        </div>

        <style>
            .modal-contents {
                height: 70vh !important;
            }

            .table-responsive {
                width: 100%;
                background-color: #f8f9fe !important;
            }

            .table-responsive .first-row {
                width: 100%;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
            }

            .table-responsive .second-row{
                width: 100%;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
            }

            .product-container{
                font-family: Poppins-Regular, serif !important;
                display: flex;
                align-items: center;
                flex-direction: row;
                color: black;
                width: 50%;
                margin: 15px;
                height: 180px;
                padding: 0;
                /*padding: 25px 0 25px 0;*/
                background-color: #FFFFFF;
                word-wrap: break-word;
                border: 1px solid rgba(0,0,0,.05);
                border-radius: .375rem;
                background-clip: border-box;
                box-shadow: 0 0 2rem 0 rgba(136,152,170,.15);
                transition: 0.3s;
                overflow: hidden;
                position: relative;
            }

            .product{
                width: 100%;
                height: 100%;
                display: flex;
                flex-direction: row;
                margin: 0;
            }

            .product-preview{
                flex: 4;
                display: flex;
                flex-direction: column;
                align-items: center;
                overflow: hidden;
                background: linear-gradient(87deg,#171717 0,#F7FAFC 100%)!important;
                padding: 5px;
            }

            .product-info{
                height: 180px!important;
                flex: 3;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .product-top{
                width: 100%;
                flex: 3;
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                justify-content: space-around;
                background-color: #FFFFFF !important;
                padding: 15px 10px;
                position: relative;
            }
            .product-top h6{
                position: relative;
                color: #8898aa;
                text-transform: uppercase;
                font-size: 0.65rem;
            }


            .product-bottom{
                padding-right: 10px;
                padding-bottom: 10px;
                width: 100%;
                flex: 1;
                display: flex;
                flex-direction: column;
                align-items: flex-end;
                justify-content: center;
                background-color: #FFFFFF !important;
            }

            .product-bottom .slctbtn{
                padding: 5px;
                font-size: .875rem;
                position: relative;
                transition: all .15s ease;
                letter-spacing: .025em;
                text-transform: none;
                will-change: transform;
                text-align: center;
                cursor: pointer;
                border-radius: .25rem;
                color: #fff;
                border: 1px solid #2dce89;
                background-color: #2dce89;
                box-shadow: 0 4px 6px rgba(50,50,93,0.11), 0 1px 3px rgba(0,0,0,0.08);
                line-height: 1.5;
            }
        </style>


        <div class="inputfield">
            <label for="Material">Choose Template</label>
            <div class="inputbutton" >
                <!--            <label for='ChooseTemplate' class="form-contrall-label" style="display: none;"></label>-->
                <input id="ChooseTemplate" type="text" style="display: none;" value="">
                <label for='TemplateDescription' class="form-contrall-label"></label>
                <button id="ChooseTemplateID" onclick="location.href" type="button"  class="btn2 input2 cripple">Find</button>
            </div>
<!--            <label for="CT" class="error" style="color: red; display:none" >This Field Required!</label>-->
            <label for="templateSelect" class="error" style="color: red; display:none" >This Field Required!</label>
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
            <select id='fabricdesigncode' name="options" style='width: 100%;'>
<!--                <option  value="0" data-value="0" selected="" disabled="">--SELECT--</option>-->
            </select>
<!--            <label for="FDC"  class="error" style="color: red; display:none" >This Field Required!</label>-->
            <label for="fabricDesign"  class="error" style="color: red; display:none" >This Field Required!</label>
        </div>

        <div class="inputfield" id="ButtonDesignDiv">
            <label>Button  Design Code</label>
            <select id='buttondesigncode' name="options" style='width: 100%;'>
                <!--            <option  value="0" selected="" disabled="">--SELECT--</option>-->
            </select>
<!--            <label for="BDC"  class="error" style="color: red; display:none" >This Field Required!</label>-->
            <label for="buttonDesign"  class="error" style="color: red; display:none" >This Field Required!</label>
        </div>


        <div class="inputfield">
            <label>Quantity</label>
            <input type="number" id="orderItemQuantity" name="quantity" class="form-contrall"min="1">
<!--            <label for="Q"  class="error" style="color: red; display:none" >This Field Required!</label>-->
            <label for="quantity"  class="error" style="color: red; display:none" >This Field Required!</label>
        </div>




        <div class="inputfield inputbutton">
            <button type="button" id="addToBucket" class="model-btn2 cripple" style="height: 48px; width:134px ; color: red;border-color: red;">Add To Bucket</button>
            <button type="button" id="nextBtnf1" class="model-btn cripple" style="height: 48px; width:134px ;">Next</button>
        </div>


</div>
</form>