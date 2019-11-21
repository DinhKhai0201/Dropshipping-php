<button class="download" onclick="printPDF()">
    Download
</button>
<div id="invoice-POS" class="invoice-POS">

    <center id="top">
        <div class="logo"></div>
        <div class="info">
            <h2>PSCD Inc</h2>
        </div>
    </center>

    <div id="mid">
        <div class="info">
            <h2>Contact Info</h2>
            <p> Address : street city, state 0000</br>
                Email : pscd@gmail.com</br>
                Phone : 555-555-5555</br>
            </p>
        </div>
    </div>
    <div id="mid">
        <div class="info">
            <h2>To Address</h2>
            <p>

                <?php foreach ($this->order as $key => $value) {
                    echo ' Address : ' . $value['to_address'];
                } ?>
            </p>
        </div>
    </div>
    <!--End Invoice Mid-->

    <div id="bot">

        <h2>Order Info: <?php foreach ($this->order as $key => $value) {
                            echo '#' . $value['id'];
                        } ?></h2>
        <p><?php foreach ($this->order as $key => $value) {
                echo  $value['created'];
            } ?></p>
        <p><?php foreach ($this->order as $key => $value) {
                echo  $value['info'];
            } ?></p>
        <div id="table">
            <table>
                <tr class="tabletitle">
                    <td class="item">
                        <h2>Item</h2>
                    </td>
                    <td class="Hours">
                        <h2>Qty</h2>
                    </td>
                    <td class="Rate">
                        <h2>Sub Total</h2>
                    </td>
                </tr>
                <?php foreach ($this->order_item as $key => $value) { ?>
                    <tr class="service">
                        <td class="tableitem">
                            <p class="itemtext"><?= $value['products_name'] ?></p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtext"><?= $value['quantity'] ?></p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtext">
                               <?php if (isset($value['coupons_type'])) {?>
                                            <?php echo "$<strike>".$value['price']."</strike>"; ?> </span>
                                    <?php if (intval($value['coupons_type']) == 0) {?>
                                            $<?php echo (intval($value['price']) - (intval($value['price'])*(intval($value['coupons_percent_value'])))/100);?>
                                    <?php } else if (intval($value['coupons_type']) == 1) {?>
                                        $<?php echo (intval($value['price']) - (intval($value['coupons_fix_value'])))?>
                                <?php }?>
                                </p>
                                    <?php } else {?>
                                    <?php echo "$" . $value['price']; ?>
                                    <?php }?>
                            </p>
                        </td>
                    </tr>
                <?php } ?>
                <tr class="tabletitle">
                    <td></td>
                    <td class="Rate">
                        <h2>Ship</h2>
                    </td>
                    <td class="payment">
                        <h2>$2</h2>
                    </td>
                </tr>
                <tr class="tabletitle">
                    <td></td>
                    <td class="Rate">
                        <h2>Total</h2>
                    </td>
                    <td class="payment">
                        <h2>$<?php foreach ($this->order as $key => $value) {
                                    echo $value['total_price'];
                                } ?></h2>
                    </td>
                </tr>

            </table>
        </div>
        <!--End Table-->

        <div id="legalcopy">
            <p class="legal"><strong>Thank you for your business!</strong>  Payment is expected within 31 days; please process this invoice within that time. There will be a 5% interest charge per month on late invoices.
            </p>


        </div>

    </div>
    <!--End InvoiceBot-->
</div>
<!--End Invoice-->

<style>
    #invoice-POS {
        box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
        padding: 2mm;
        margin: 0 auto;
        max-width: 400px;
        background: #fff;
    }

    #invoice-POS ::selection {
        background: #f31544;
        color: #fff;
    }

    #invoice-POS ::moz-selection {
        background: #f31544;
        color: #fff;
    }

    #invoice-POS h1 {
        font-size: 20px;
        color: #222;
    }

    #invoice-POS h2 {
        /* font-size: 0.9em; */
    }

    #invoice-POS h3 {
        /* font-size: 1.2em; */
        font-weight: 300;
        line-height: 2em;
    }

    #invoice-POS p {
        /* font-size: 0.7em; */
        color: #666;
        line-height: 1.2em;
    }

    #invoice-POS #top,
    #invoice-POS #mid,
    #invoice-POS #bot {
        /* Targets all id with 'col-' */
        border-bottom: 1px solid #eee;
    }

    #invoice-POS #top {
        min-height: 100px;
    }

    #invoice-POS #mid {
        min-height: 80px;
    }

    #invoice-POS #bot {
        min-height: 50px;
    }

    #invoice-POS #top .logo {
        height: 60px;
        width: 60px;
        background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
        background-size: 60px 60px;
    }

    #invoice-POS .clientlogo {
        float: left;
        height: 60px;
        width: 60px;
        background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
        background-size: 60px 60px;
        border-radius: 50px;
    }

    #invoice-POS .info {
        display: block;
        margin-left: 0;
    }

    #invoice-POS .title {
        float: right;
    }

    #invoice-POS .title p {
        text-align: right;
    }

    #invoice-POS table {
        width: 100%;
        border-collapse: collapse;
    }

    #invoice-POS .tabletitle {
        /* font-size: 0.5em; */
        background: #eee;
    }

    #invoice-POS .service {
        border-bottom: 1px solid #eee;
    }

    #invoice-POS .item {
        width: 24mm;
    }

    #invoice-POS .itemtext {
        /* font-size: 0.5em; */
    }

    #invoice-POS #legalcopy {
        margin-top: 5mm;
    }

    .download {
        background-color: red;
        font-size: 20px;
        color: white;
        border: 1px solid;
        border-radius: 4px;
    }
</style>
<script src="<?php echo RootREL; ?>media/js/invoice/html2df.js"></script>
<script src="<?php echo RootREL; ?>media/js/invoice/jspdf.js"></script>
<script>
    var w = 3 / 4 * (document.getElementById("invoice-POS").clientWidth);
    var h = 3 / 4 * (document.getElementById("invoice-POS").clientHeight);
    console.log(w)
    var printPDF = function printPDF() {
        var quality = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;
        var filename = 'invoice-<?php foreach ($this->order as $key => $value) {
                                    echo '#' . $value['id'];
                                } ?>.pdf';
        html2canvas(document.querySelector('.invoice-POS'), {
            scale: quality
        }).then(function(canvas) {
            var pdf = new jsPDF('p', 'pt', [w, h]);
            //pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, 211, 298);
            pdf.addImage(canvas.toDataURL('image/jpeg', 1.0), 'JPEG', 0, 0, 0, 0);
            pdf.save(filename);
        });
    };
</script>