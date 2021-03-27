<div class="flexbox-container" id="createOrderForm2">



    <div id="saveToOrder">
        <div style="margin-bottom: 30px">
            <ol class="progtrckr" data-progtrckr-steps="5">
                <li class="progtrckr-done">Order Processing</li>
                <li class="progtrckr-done">Order Details</li>
                <li class="progtrckr-done ">Order Schedule</li>
                <li class="step4 progtrckr-todo">Order Invoice</li>
            </ol>
        </div>

        <div class="inputfield">
            <label>Due Date Select</label>

            <div style="display: inline-block;">
                <input class="selectOrderDueDateType" type="radio" id="normal" name="dateType" value="normal" checked="checked">
                <label for="male" style="color: #000000" >Normal</label>
            </div>
            <div style="display: inline-block;">
                <input class="selectOrderDueDateType" type="radio" id="giveDate" name="dateType" value="giveDate">
                <label for="female" style="color: #000000">Customer Give due date</label>
            </div>
        </div>

    <!--customer give date stage -->
        <div id="customerGiveDateDive"  class="inputfield">
            <label>Due Date</label>
            <input type="datetime-local" id="customerGiveDate"  name="" class="form-contrall">
            <label for="CD"  class="error" style="color: red; display:none" >This Field Required!</label>
        </div>
        <div class="inputfield" id="generateOrderStatusDiv">
            <label for="">Generate  Order Status</label>
            <div class="inputbutton">
                <label for='GeneratedOrderStatus' class="form-contrall-label">testing</label>
                <button id="GeneratedOrderStatusBtn"  type="button"  class="btn2 input2 cripple">Generate</button>
            </div>
            <label for="OS"  class="error" style="color: red; display:none" >This Field Required!</label>
        </div>

        <!--normal date stage -->
        <div id="customerNotGiveDateDive" class="inputfield">
            <label>Due Date</label>
            <div class="inputbutton">
                 <label for='GeneratedDueDate' class="form-contrall-label">testing2</label>
                 <button id="generateNormalDueDate"  type="button"  class="btn2 input2 cripple">Generate</button>
            </div>
            <label for="ND"  class="error" style="color: red; display:none" >This Field Required!</label>
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

        <div class="inputfield" >
            <label>Select Customer</label>
            <select id='customer' name="options" style='width: 100%;'>
                            <option  value="0"   selected="" disabled="">--SELECT--</option>
            </select>
            <label for="AC"  class="error" style="color: red; display:none" >This Field Required!</label>
        </div>

        <div class="inputfield">
            <label>Order Description</label>
            <input type="text" id="OrderName"   class="form-contrall" value="" placeholder="eg. uoc batch t shirt">
            <label for="OD"  class="error" style="color: red; display:none" >This Field Required!</label>
        </div>



        <div class="inputfield inputbutton">
            <button type="button" id="backstep2" class="model-btn2 cripple">Back</button>
            <button type="button" id="makeInvoiceBtn" class="model-btn2 cripple">Make Invoice</button>

        </div>
    </div>

<!--/**************************************************/-->

<!--    <style>-->
<!--        #invoiceID {background-color: #DDEEFF;padding: 15px;border-radius:0px; margin: 0;left: calc(50% - 30vw);-->
<!--            width: 60vw;}-->
<!--        #InvoiceHadername {margin:auto;color: white;text-align:center; margin-bottom: 10px;}-->
<!--        #invoiceheader { margin:  3em auto 3em auto;}-->
<!--        #invoiceheader:after { clear: both; content: ""; display: table; }-->
<!---->
<!--        #invoiceheader h1 { background: #172B4D; border-radius: 0.25em; color: #FFF; margin: auto; padding: 0.5em 0; }-->
<!--        header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }-->
<!--        #invoiceheader address p { margin: 0 0 0.25em; }-->
<!--        header span, header img { display: block; float: right; }-->
<!--        header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }-->
<!--        header img { max-height: 100%; max-width: 100%; }-->
<!--        header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }-->
<!---->
<!--        /* article */-->
<!---->
<!--        article, article address, table.meta, table.inventory { margin: 0 0 3em; }-->
<!--        article:after { clear: both; content: ""; display: table; }-->
<!--        article h1 { clip: rect(0 0 0 0); position: absolute; }-->
<!---->
<!--        article address { float: left; font-size: 125%; font-weight: bold; }-->
<!---->
<!--        table.meta, table.balance { float: right; width: 36%; }-->
<!--        table.meta:after, table.balance:after { clear: both; content: ""; display: table; }-->
<!---->
<!--        .tb table { font-size: 40%; table-layout: fixed; width: 100%; }-->
<!--        .tb table { border-collapse: separate; border-spacing: 2px; }-->
<!--        .tb th,.tb td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }-->
<!--        .tb th, .tb td { border-radius: 0.01em; border-style: solid; }-->
<!--        .tb  th { background: #5e72e4; border-color: #172B4D; color: white; }-->
<!--        .tb td { border-color: #172B4D; }-->
<!---->
<!---->
<!---->
<!--        /* table meta */-->
<!---->
<!--        table.meta th { width: 40%; }-->
<!--        table.meta td { width: 60%; }-->
<!---->
<!--        /* table items */-->
<!---->
<!--        table.inventory { clear: both; width: 100%; }-->
<!--        table.inventory th { font-weight: bold; text-align: center; }-->
<!---->
<!--        table.inventory td:nth-child(1) { width: 26%; }-->
<!--        table.inventory td:nth-child(2) { width: 38%; }-->
<!--        table.inventory td:nth-child(3) { text-align: right; width: 12%; }-->
<!--        table.inventory td:nth-child(4) { text-align: right; width: 12%; }-->
<!--        table.inventory td:nth-child(5) { text-align: right; width: 12%; }-->
<!---->
<!--        /* table balance */-->
<!---->
<!--        table.balance th, table.balance td { width: 50%; }-->
<!--        table.balance td { text-align: right; }-->
<!---->
<!---->
<!---->
<!---->
<!--    </style>-->


        <div id="invoiceID"  class="container print"  style="display: none;">



<!--            <header id="invoiceheader">-->
<!--                <center><h1 id="InvoiceHadername">Invoice</h1></center>-->
<!--                <address contenteditable>-->
<!--                    <p>Jonathan Neal</p>-->
<!--                    <p>101 E. Chapman Ave<br>Orange, CA 92866</p>-->
<!--                    <p>(800) 555-1234</p>-->
<!--                </address>-->
<!--                <span><img alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png"><input type="file" accept="image/*"></span>-->
<!--            </header>-->
<!--            <article>-->
<!--                <h1>Recipient</h1>-->
<!--                <address contenteditable>-->
<!--                    <p>Some Company<br>c/o Some Guy</p>-->
<!--                </address>-->
<!---->
<!--                <table class="tb meta">-->
<!--                    <tr>-->
<!--                        <th class="tht"><span contenteditable>Invoice</span></th>-->
<!--                        <td class="tdt"><span contenteditable>101138</span></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <th class="tht"><span contenteditable>Date</span></th>-->
<!--                        <td class="tht"><span contenteditable>January 1, 2012</span></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <th class="tht"><span contenteditable>Amount Due</span></th>-->
<!--                        <td class="tdt"><span id="prefix" contenteditable>$</span><span>600.00</span></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--                <table class="tb inventory">-->
<!--                    <thead>-->
<!--                    <tr>-->
<!--                        <th class="tht"><span contenteditable>Item</span></th>-->
<!--                        <th class="tht"><span contenteditable>Description</span></th>-->
<!--                        <th class="tht"><span contenteditable>Rate</span></th>-->
<!--                        <th class="tht"><span contenteditable>Quantity</span></th>-->
<!--                        <th class="tht"><span contenteditable>Price</span></th>-->
<!--                    </tr>-->
<!--                    </thead>-->
<!--                    <tbody>-->
<!--                    <tr>-->
<!--                        <td><a class="cut">-</a><span contenteditable>Front End Consultation</span></td>-->
<!--                        <td><span contenteditable>Experience Review</span></td>-->
<!--                        <td><span data-prefix>$</span><span contenteditable>150.00</span></td>-->
<!--                        <td><span contenteditable>4</span></td>-->
<!--                        <td><span data-prefix>$</span><span>600.00</span></td>-->
<!--                    </tr>-->
<!--                    </tbody>-->
<!--                </table>-->
<!--                <a class="add">+</a>-->
<!--                <table class="tb balance">-->
<!--                    <tr>-->
<!--                        <th class="tht"><span contenteditable>Total</span></th>-->
<!--                        <td class="tdt"><span data-prefix>$</span><span>600.00</span></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <th class="tht"><span contenteditable>Amount Paid</span></th>-->
<!--                        <td class="tdt"><span data-prefix>$</span><span contenteditable>0.00</span></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <th class="tht"><span contenteditable>Balance Due</span></th>-->
<!--                        <td class="tdt"><span data-prefix>$</span><span>600.00</span></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </article>-->
<!--            <aside>-->
<!--                <h1><span contenteditable>Additional Notes</span></h1>-->
<!--                <div contenteditable>-->
<!--                    <p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>-->
<!--                </div>-->
<!--            </aside>-->






    </div>
    <div id="lastbuttoncupple" style="display: none;">
        <div class="inputfield inputbutton">
            <button type="button" id="backtoStep3" class="model-btn2 cripple">Back</button>
            <button type="button" id="stp4Cancelbtn" class="model-btn2 cripple">Cancel</button>
            <button type="button" id="PrintBtn" class="model-btn2 cripple" onclick="printdiv('invoiceID')">Print</button>
            <button type="button" id="saveOrder" class="model-btn cripple">Purchase Order</button>
        </div>
    </div>
</div><!-- createOrderForm2-->

