<script>
    function myFunction()
    {
        window.print();
    }
</script>

<div id="invoiceID" class="flexbox-container" style="display: none;">
    <div  class="container print" >
        <header>
            <h1>Invoice</h1>
            <address contenteditable>
                <p>Jonathan Neal</p>
                <p>101 E. Chapman Ave<br>Orange, CA 92866</p>
                <p>(800) 555-1234</p>
            </address>
            <span><img alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png"><input type="file" accept="image/*"></span>
        </header>
        <article>
            <h1>Recipient</h1>
            <address contenteditable>
                <p>Some Company<br>c/o Some Guy</p>
            </address>

            <table class="meta">
                <tr>
                    <th class="tht"><span contenteditable>Invoice #</span></th>
                    <td class="tdt"><span contenteditable>101138</span></td>
                </tr>
                <tr>
                    <th class="tht"><span contenteditable>Date</span></th>
                    <td class="tht"><span contenteditable>January 1, 2012</span></td>
                </tr>
                <tr>
                    <th class="tht"><span contenteditable>Amount Due</span></th>
                    <td class="tdt"><span id="prefix" contenteditable>$</span><span>600.00</span></td>
                </tr>
            </table>
            <table class="inventory">
                <thead>
                <tr>
                    <th class="tht"><span contenteditable>Item</span></th>
                    <th class="tht"><span contenteditable>Description</span></th>
                    <th class="tht"><span contenteditable>Rate</span></th>
                    <th class="tht"><span contenteditable>Quantity</span></th>
                    <th class="tht"><span contenteditable>Price</span></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><a class="cut">-</a><span contenteditable>Front End Consultation</span></td>
                    <td><span contenteditable>Experience Review</span></td>
                    <td><span data-prefix>$</span><span contenteditable>150.00</span></td>
                    <td><span contenteditable>4</span></td>
                    <td><span data-prefix>$</span><span>600.00</span></td>
                </tr>
                </tbody>
            </table>
            <a class="add">+</a>
            <table class="balance">
                <tr>
                    <th class="tht"><span contenteditable>Total</span></th>
                    <td class="tdt"><span data-prefix>$</span><span>600.00</span></td>
                </tr>
                <tr>
                    <th class="tht"><span contenteditable>Amount Paid</span></th>
                    <td class="tdt"><span data-prefix>$</span><span contenteditable>0.00</span></td>
                </tr>
                <tr>
                    <th class="tht"><span contenteditable>Balance Due</span></th>
                    <td class="tdt"><span data-prefix>$</span><span>600.00</span></td>
                </tr>
            </table>
        </article>
        <aside>
            <h1><span contenteditable>Additional Notes</span></h1>
            <div contenteditable>
                <p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
            </div>
        </aside>



    <input style="padding:5px;" value="Print Document" type="button" onclick="myFunction()" class="button">
    </div>
</div>
