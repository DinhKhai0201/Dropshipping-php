<?php include_once 'views/layout/' . $this->layout . 'top.php'; ?>
<div class="main-container col2-right-layout">
    <div class="main container">
        <div class="row order_now">
            <div class="col-main col-lg-9">
                <div class="top-container">
                    <div class="breadcrumbs" style="margin-bottom: 20px">
                        <div class="container">
                            <div class="row">
                                <ul>
                                    <li class="home">
                                        <a href="<?php echo (vendor_app_util::url(['area' => '', "ctl" => ""])) ?>" title="Go to Home Page">Home</a>
                                        <span class="breadcrumbs-split">></span>
                                    </li>
                                    <li class="">
                                        <a href="<?php echo (vendor_app_util::url(['area' => 'customer', "ctl" => "account"])) ?>" title="My account Dropshipping">My account</a>
                                        <span class="breadcrumbs-split">></span>
                                    </li>

                                    <li class="product">
                                        <strong>Order </strong>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-title">
                    <h1>Checkout</h1>
                </div>
                <?php if ($this->nocart > 0) { ?>
                    <ol class="opc" id="checkoutSteps">
                        <li id="opc-shipping" class="section">
                            <div class="step-title">
                                <span class="number">1</span>
                                <h2>Shipping Information</h2>
                                <a href="#">Edit</a>
                            </div>
                            <div id="checkout-step-shipping" class="step a-item">
                                <ul class="form-list">
                                    <li id="shipping-new-address-form" style="display:block">
                                        <fieldset>
                                            <ul>
                                                <li class="fields">
                                                    <div class="customer-name">
                                                        <div class="field name-firstname">
                                                            <label for="firstname" class="required"><em>*</em>First
                                                                Name</label>
                                                            <div class="input-box">
                                                                <input type="text" id="firstname" name="user[firstname]" value="<?php echo $_SESSION['user']['firstname']; ?>" required title="First Name" maxlength="255" class="input-text required-entry" />
                                                            </div>
                                                        </div>
                                                        <div class="field name-lastname">
                                                            <label for="lastname" class="required"><em>*</em>Last
                                                                Name</label>
                                                            <div class="input-box">
                                                                <input type="text" id="lastname" name="user[lastname]" value="<?php echo $_SESSION['user']['lastname']; ?>" required title="Last Name" maxlength="255" class="input-text required-entry" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="wide">
                                                    <label for="email">Email</label>
                                                    <div class="input-box">
                                                        <input type="text" name="user[email]" id="email" title="Email" value="<?php echo $_SESSION['user']['email']; ?>" required class="input-text " />
                                                    </div>
                                                </li>
                                                <li class="fields">
                                                    <div class="field">
                                                        <label for="telephone" class="required"><em>*</em>Telephone</label>
                                                        <div class="input-box">
                                                            <input type="text" id="phone" name="user[phone]" value="<?php echo $_SESSION['user']['phone']; ?>" title="Telephone" required class="input-text   required-entry" id="telephone" />
                                                        </div>
                                                    </div>

                                                </li>

                                                <li class="fields">
                                                    <label for="street_1" class="required"><em>*</em>Street Address</label>
                                                    <div class="input-box">
                                                        <input type="text" name="street" value="<?php if ($_SESSION['user']['address'] != null) {
                                                                                                        echo (explode(',', $_SESSION['user']['address']))[0];
                                                                                                    } ?>" title="Street Address" id="street" class="input-text  required-entry" required placeholder="ex: 11923 NE Sumner St" />
                                                    </div>
                                                </li>
                                                <li class="fields">
                                                    <div class="field">
                                                        <label for="region_id" class="required"><em>*</em>State/Province</label>
                                                        <div class="input-box">
                                                            <input type="text" id="region" name="province" value="<?php if ($_SESSION['user']['address'] != null) {
                                                                                                                            echo (explode(',', $_SESSION['user']['address']))[1];
                                                                                                                        } ?>" title="State/Province" class="input-text " required placeholder="ex: Oregon" />
                                                        </div>
                                                    </div>
                                                    <div class="field">
                                                        <label for="city" class="required"><em>*</em>City</label>
                                                        <div class="input-box">
                                                            <input type="text" name="city" value="<?php if ($_SESSION['user']['address'] != null) {
                                                                                                            echo (explode(',', $_SESSION['user']['address']))[2];
                                                                                                        } ?>" title="City" class="input-text  required-entry" id="city" required placeholder="ex: Portland" />
                                                        </div>
                                                    </div>

                                                </li>
                                                <li class="fields">
                                                    <div class="field">
                                                        <label for="zip" class="required"><em>*</em>Zip/Postal Code</label>
                                                        <div class="input-box">
                                                            <input type="text" name="postcode" value="<?php if ($_SESSION['user']['address'] != null) {
                                                                                                                echo (explode(',', $_SESSION['user']['address']))[4];
                                                                                                            } ?>" title="Zip/Postal Code" id="zip" class="input-text validate-zip-international  required-entry" required placeholder="ex: 97220" />
                                                        </div>
                                                    </div>
                                                    <div class="field">
                                                        <label for="country" class="required"><em>*</em>Country</label>
                                                        <div class="input-box">
                                                            <input type="text" name="country" value="<?php if ($_SESSION['user']['address'] != null) {
                                                                                                                echo (explode(',', $_SESSION['user']['address']))[3];
                                                                                                            } ?>" title="country" id="country-address" class="input-text validate-country-international  required-entry" required placeholder="ex: Newyork" />
                                                        </div>
                                                </li>

                                            </ul>
                                        </fieldset>
                                    </li>

                                </ul>
                                <div class="buttons-set" id="shipping-buttons-container">
                                    <p class="required">* Required Fields</p>
                                    <button type="button" class="button continue_address" title="Continue"><span><span>Continue</span></span></button>
                                    <span id="shipping-please-wait" class="please-wait">


                                </div>
                                <input name="form_key" type="hidden" value="oI9yHI5BRnu7ESfo" />

                            </div>
                        </li>
                        <li id="opc-shipping_method" class="section">
                            <div class="step-title">
                                <span class="number">2</span>
                                <h2>Shipping Information</h2>
                                <a href="javascript:void(0)">Edit</a>
                            </div>
                            <div id="checkout-step-shipping_method" class="step a-item" style="display:none">
                                <form id="co-shipping-method-form" action="">
                                    <div id="checkout-shipping-method-load">
                                        <dl class="sp-methods">
                                            <dt>ESTIMATE SHIPPING AND TAX</dt>
                                            <dd>
                                                <ul>
                                                    <li>
                                                        <span class="no-display"><input name="shipping_method" type="radio" value="flatrate_flatrate" id="s_method_flatrate_flatrate" checked="checked"></span>
                                                        <label for="s_method_flatrate_flatrate">Fixed: <span class="price">$2.00</span> </label>
                                                    </li>
                                                </ul>
                                            </dd>
                                        </dl>
                                        <!-- <div class="discount-form" style="display: block;">
                                            <input type="hidden" name="remove" id="remove-coupone" value="0">
                                            <div class="input-box">
                                                <label for="coupon_code">Enter your coupon code if you have one.</label>
                                                <input class="input-text" id="coupon_code" name="coupon_code" value="">
                                                <button type="button" title="Apply Coupon" class="button" value="Apply Coupon"><span><span>Apply Coupon</span></span></button>

                                            </div>
                                        </div> -->
                                    </div>
                                    <div id="onepage-checkout-shipping-method-additional-load">
                                    </div>
                                    <div class="buttons-set" id="shipping-method-buttons-container">
                                        <p class="back-link"><a href="javascript:void(0)" class="back-1"><small>&laquo;
                                                </small>Back</a></p>
                                        <button type="button" class="button continue_shipping"><span><span>Continue</span></span></button>
                                        <span id="shipping-method-please-wait" class="please-wait">


                                    </div>
                                    <input name="form_key" type="hidden" value="oI9yHI5BRnu7ESfo" />
                                </form>
                            </div>
                        </li>
                        <li id="opc-payment" class="section">
                            <div class="step-title">
                                <span class="number">3</span>
                                <h2>Payment Information</h2>
                                <a href="#">Edit</a>
                            </div>
                            <div id="checkout-step-payment" class="step a-item" style="display:none">
                                <form action="" id="co-payment-form">
                                    <fieldset>
                                        <dl class="sp-methods" id="checkout-payment-method-load">
                                            <dt id="dt_method_checkmo">
                                                <span class="">
                                                    <input id="p_method_checkmo" value="checkmo" type="radio" name="payment[method]" checked="checked" class="radio" autocomplete="off">
                                                </span>
                                                <label for="p_method_checkmo">Visa </label>
                                                <span class="">
                                                    <input id="p_method_checkmo" value="checkmo" type="radio" name="payment[method]" checked="checked" class="radio" autocomplete="off">
                                                </span>
                                                <label for="p_method_checkmo">Paypal </label>
                                                <span class="">
                                                    <input id="p_method_checkmo" value="checkmo" type="radio" name="payment[method]" checked="checked" class="radio" autocomplete="off">
                                                </span>
                                                <label for="p_method_checkmo">Direct Payment </label>
                                            </dt>

                                        </dl>
                                    </fieldset>
                                </form>

                                <div class="buttons-set" id="payment-buttons-container">
                                    <p class="required">* Required Fields</p>
                                    <p class="back-link"><a href="javascript:void(0)" class="back-2"><small>&laquo;
                                            </small>Back</a></p>
                                    <button type="button" class="button continue_payment"><span><span>Continue</span></span></button>
                                    <span class="please-wait" id="payment-please-wait">


                                </div>
                            </div>
                        </li>
                        <li id="opc-review" class="section">
                            <div class="step-title">
                                <span class="number">4</span>
                                <h2>Order Review</h2>
                                <a href="javascript:void(0)">Edit</a>
                            </div>
                            <div id="checkout-step-review" class="step a-item" style="display:none">
                                <div class="order-review" id="checkout-review-load">
                                    <div id="checkout-review-table-wrapper">
                                        <table class="data-table" id="checkout-review-table" >
                                            <colgroup>
                                                <col>
                                                <col width="1">
                                                <col width="1">
                                                <col width="1">
                                                <col width="1">
                                                <col width="1">
                                                <col width="1">
                                            </colgroup>
                                            <thead>
                                                <tr class="first last">
                                                    <th rowspan="1">Product Name</th>
                                                    <th colspan="1" class="a-center">Color</th>
                                                    <th colspan="1" class="a-center">size</th>
                                                    <th colspan="1" class="a-center">Price</th>
                                                    <th rowspan="1" class="a-center">Qty</th>
                                                    <th rowspan="1" class="a-center">Discount</th>
                                                    <th colspan="1" class="a-center">Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr class="first">
                                                    <td style="" class="a-right" colspan="6">Subtotal</td>
                                                    <td style="" class="a-right last">
                                                        <span class="price">$<span class="total_price"><?php $total = 0;
                                                                                                            foreach ($this->carts as $key => $carts) {
                                                                                                                if (isset($carts['coupons_type'])) {
                                                                                                                    if (intval($carts['coupons_type']) == 0) {
                                                                                                                        $total += (intval($carts['price']) * intval($carts['quantity']) - ((intval($carts['price']) * intval($carts['quantity'])) * intval($carts['coupons_percent_value'])) / 100);
                                                                                                                    } else if (intval($carts['coupons_type']) == 1) {
                                                                                                                        $total += (intval($carts['price']) * intval($carts['quantity']) - intval($carts['coupons_percent_value']));
                                                                                                                    }
                                                                                                                } else {
                                                                                                                    $total += (intval($carts['price']) * intval($carts['quantity']));
                                                                                                                }
                                                                                                            }
                                                                                                            echo  $total; ?></span></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="" class="a-right" colspan="6">
                                                        Shipping &amp; Handling (Flat Rate - Fixed) </td>
                                                    <td style="" class="a-right last">
                                                        <span class="price">$<span class="shipping_fee">2</span></span> </td>
                                                </tr>

                                                <tr class="last">
                                                    <td style="" class="a-right" colspan="6">
                                                        <strong>Grand Total</strong>
                                                    </td>
                                                    <td style="" class="a-right last">
                                                        <strong><span class="price "><?php echo "$" . ($total + 2); ?></span></strong>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php foreach ($this->carts as $carts) { ?>
                                                    <tr class="first last odd">
                                                        <td>
                                                            <h3 class="product-name"><?= $carts['products_name'] ?></h3>
                                                        </td>
                                                        <td>
                                                            <h3 class="product-color"><?= $carts['color'] ?></h3>
                                                        </td>
                                                        <td>
                                                            <h3 class="product-size"><?= $carts['size'] ?></h3>
                                                        </td>
                                                        <td class="a-right">
                                                            <span class="cart-price">
                                                                <span class="price"><?php echo "$" . $carts['price']; ?></span>
                                                            </span>
                                                        </td>
                                                        <td class="a-center"><?= $carts['quantity'] ?></td>
                                                        <td>
                                                            <h3 class="product-sale">
                                                                <?php if (isset($carts['coupons_type'])) {
                                                                            if (intval($carts['coupons_type']) == 0) {
                                                                                echo $carts['coupons_percent_value'] . '%';
                                                                            } else if (intval($carts['coupons_type']) == 1) {
                                                                                echo '$' . $carts['coupons_fix_value'];
                                                                            }
                                                                        } else {
                                                                            echo "0";
                                                                        } ?>
                                                            </h3>
                                                        </td>
                                                        <!-- sub total starts here -->
                                                        <td class="a-right last">
                                                            <span class="cart-price">
                                                                <span class="price ">
                                                                    <?php if (isset($carts['coupons_type'])) {
                                                                                if (intval($carts['coupons_type']) == 0) {
                                                                                    echo "$" . (intval($carts['price']) * intval($carts['quantity']) - ((intval($carts['price']) * intval($carts['quantity'])) * intval($carts['coupons_percent_value'])) / 100);
                                                                                } else if (intval($carts['coupons_type']) == 1) {
                                                                                    echo "$" . (intval($carts['price']) * intval($carts['quantity']) - intval($carts['coupons_percent_value']));
                                                                                }
                                                                            } else {
                                                                                echo "$" . (intval($carts['price']) * intval($carts['quantity']));
                                                                            } ?>
                                                                </span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="info-order" style='margin-top:30px'>
                                    <p class="label-order">Note more information</p>
                                    <textarea id="order-info" style="width:100%;height:50px;" placeholder="Ex: Ship to me at 9.00 pm at sunday..."></textarea>
                                </div>
                                <div class="buttons-set" id="payment-buttons-container">
                                    <p class="f-left">Forgot an Item? <a href="<?php echo (vendor_app_util::url(['area' => 'customer', "ctl" => "checkout"])) ?>">Edit Your Cart </a></p>
                                    <p class="back-link"> &nbsp;Or<a href="javascript:void(0)" class="back-3"><small>&laquo;</small>Back</a></p>
                                    <button type="button" class="button continue_order"><span><span>Order</span></span></button>
                                </div>
                            </div>
                        </li>
                    </ol>
                <?php } else { ?>
                    <p>Your are not have any products in cart.</p>
                <?php } ?>
            </div>
            <!-- <div class="col-right sidebar col-lg-3">
                <div id="checkout-progress-wrapper">
                    <div class="block block-progress opc-block-progress">
                        <div class="block-title">
                            <strong><span>Your Checkout Progress</span></strong>
                        </div>
                        <div class="block-content">
                            <dl>
                                <div id="billing-progress-opcheckout">
                                    <dt>
                                        Billing Address</dt>
                                </div>

                                <div id="shipping-progress-opcheckout">
                                    <dt>
                                        Shipping Address</dt>

                                </div>

                                <div id="shipping_method-progress-opcheckout">
                                    <dt>
                                        Shipping Method</dt>

                                </div>

                                <div id="payment-progress-opcheckout">
                                    <dt>
                                        Payment Method</dt>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<script>
    jQuery(function($) {
        $('.continue_address').click(function() {
            $('#checkout-step-shipping').hide('slow');
            $('#checkout-step-shipping_method').show('slow');
            let array = [];
            let firstname = $('#firstname').val();
            let lastname = $('#lastname').val();
            let email = $('#email').val();
            let phone = $('#phone').val();
            let street = $('#street').val();
            let region = $('#region').val();
            let city = $('#city').val();
            let country_address = $('#country-address').val();
            let zip = $('#zip').val();
            array.push(firstname + ' ' + lastname, email, phone, street, region, city, country_address, zip);
            localStorage.setItem("address_ship", array.join());
        });
        $('.back-1').click(function() {
            $('#checkout-step-shipping').show('slow');
            $('#checkout-step-shipping_method').hide('slow');
        });
        $('.continue_shipping').click(function() {
            $('#checkout-step-shipping_method').hide('slow');
            $('#checkout-step-payment').show('slow');
        });
        $('.back-2').click(function() {
            $('#checkout-step-payment').hide('slow');
            $('#checkout-step-shipping_method').show('slow');
        });
        $('.continue_payment').click(function() {
            $('#checkout-step-payment').hide('slow');
            $('#checkout-step-review').show('slow');

        });
        $('.back-3').click(function() {
            $('#checkout-step-payment').show('slow');
            $('#checkout-step-review').hide('slow');
        });
        $('.order_now').on('click', '.continue_order', function() {
            let total_price = parseInt($('.total_price').html());
            let shipping_fee = parseInt($('.shipping_fee').html());
            let order_info = $('#order-info').val();
            if ("address_ship" in localStorage) {
                let address = localStorage.getItem('address_ship');
                console.log(address);
                $.ajax({
                    url: rootUrl + "customer/checkout/orders",
                    method: "POST",
                    data: {
                        total: total_price + shipping_fee,
                        address: address,
                        info: order_info
                    },
                    success: function(data) {
                        console.log(data)
                        location.replace(`${rootUrl}customer/order/success/${data}`)
                    }
                });
            } else {
                toastr.erroe("Address not valid!");
            }

        });
    });
</script>
<?php include_once 'views/layout/' . $this->layout . 'footer.php';
