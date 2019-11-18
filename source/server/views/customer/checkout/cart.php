<?php include_once 'views/layout/' . $this->layout . 'top.php'; ?>
<div class="main-container col2-right-layout">
    <div class="main container">
        <div class="row order_now">
            <div class="col-main col-lg-9">
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

                                <label for="new_address_shipping"><b>New Address</b></label><input type="checkbox" name="new_address_shipping" id="new_address_shipping" title="New address" class="checkbox" />
                                <hr />
                                <ul class="form-list">
                                    <li class="wide">
                                        <label for="shipping-address-select">Default your address.</label>
                                        <div class="input-box">
                                            <select name="shipping_address_id" id="shipping-address-select" class="address-select shipping_select" title="">
                                                <option value="default" selected="selected"><?php if (isset($_SESSION['user']['address'])) {
                                                                                                    echo $_SESSION['user']['address'];
                                                                                                } ?></option>
                                            </select> </div>

                                    </li>
                                    <script>
                                        jQuery(function($) {
                                            $('#new_address_shipping').change(function() {
                                                if (this.checked) {
                                                    $('#checkout-step-shipping .wide').hide();
                                                    $('#shipping-new-address-form').show('slow');
                                                } else {
                                                    $('#shipping-new-address-form').hide();
                                                    $('#checkout-step-shipping .wide').show("slow");
                                                }
                                            });
                                        });
                                    </script>
                                    <li id="shipping-new-address-form" style="display:none">
                                        <fieldset>
                                            <input type="hidden" name="shipping[address_id]" value="102" id="shipping:address_id" />
                                            <ul>
                                                <li class="fields">
                                                    <div class="customer-name">
                                                        <div class="field name-firstname">
                                                            <label for="shipping:firstname" class="required"><em>*</em>First
                                                                Name</label>
                                                            <div class="input-box">
                                                                <input type="text" id="shipping:firstname" name="shipping[firstname]" value="" title="First Name" maxlength="255" class="input-text required-entry" />
                                                            </div>
                                                        </div>
                                                        <div class="field name-lastname">
                                                            <label for="shipping:lastname" class="required"><em>*</em>Last Name</label>
                                                            <div class="input-box">
                                                                <input type="text" id="shipping:lastname" name="shipping[lastname]" value="" title="Last Name" maxlength="255" class="input-text required-entry" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="fields">
                                                    <div class="fields">
                                                        <label for="shipping:company">Company</label>
                                                        <div class="input-box">
                                                            <input type="text" id="shipping:company" name="shipping[company]" value="" title="Company" class="input-text " />
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="wide">
                                                    <label for="shipping:street1" class="required"><em>*</em>Address</label>
                                                    <div class="input-box">
                                                        <input type="text" title="Street Address" name="shipping[street][]" id="shipping:street1" value="" class="input-text  required-entry" />
                                                    </div>
                                                </li>
                                                <li class="wide">
                                                    <div class="input-box">
                                                        <input type="text" title="Street Address 2" name="shipping[street][]" id="shipping:street2" value="" class="input-text " />
                                                    </div>
                                                </li>
                                                <li class="fields">
                                                    <div class="field">
                                                        <label for="shipping:country_id" class="required"><em>*</em>Country</label>
                                                        <div class="input-box">
                                                            <select name="shipping[country_id]" id="shipping:country_id" class="validate-select" title="Country">
                                                                <option value=""> </option>
                                                                <option value="AF">Afghanistan</option>
                                                                <option value="AX">Åland Islands</option>
                                                                <option value="AL">Albania</option>
                                                                <option value="DZ">Algeria</option>
                                                                <option value="AS">American Samoa</option>
                                                                <option value="AD">Andorra</option>
                                                                <option value="AO">Angola</option>
                                                                <option value="AI">Anguilla</option>
                                                                <option value="AQ">Antarctica</option>
                                                                <option value="AG">Antigua and Barbuda
                                                                </option>
                                                                <option value="AR">Argentina</option>
                                                                <option value="AM">Armenia</option>
                                                                <option value="AW">Aruba</option>
                                                                <option value="AU">Australia</option>
                                                                <option value="AT">Austria</option>
                                                                <option value="AZ">Azerbaijan</option>
                                                                <option value="BS">Bahamas</option>
                                                                <option value="BH">Bahrain</option>
                                                                <option value="BD">Bangladesh</option>
                                                                <option value="BB">Barbados</option>
                                                                <option value="BY">Belarus</option>
                                                                <option value="BE">Belgium</option>
                                                                <option value="BZ">Belize</option>
                                                                <option value="BJ">Benin</option>
                                                                <option value="BM">Bermuda</option>
                                                                <option value="BT">Bhutan</option>
                                                                <option value="BO">Bolivia</option>
                                                                <option value="BA">Bosnia and Herzegovina
                                                                </option>
                                                                <option value="BW">Botswana</option>
                                                                <option value="BV">Bouvet Island</option>
                                                                <option value="BR">Brazil</option>
                                                                <option value="IO">British Indian Ocean
                                                                    Territory</option>
                                                                <option value="VG">British Virgin Islands
                                                                </option>
                                                                <option value="BN">Brunei</option>
                                                                <option value="BG">Bulgaria</option>
                                                                <option value="BF">Burkina Faso</option>
                                                                <option value="BI">Burundi</option>
                                                                <option value="KH">Cambodia</option>
                                                                <option value="CM">Cameroon</option>
                                                                <option value="CA">Canada</option>
                                                                <option value="CV">Cape Verde</option>
                                                                <option value="KY">Cayman Islands</option>
                                                                <option value="CF">Central African Republic
                                                                </option>
                                                                <option value="TD">Chad</option>
                                                                <option value="CL">Chile</option>
                                                                <option value="CN">China</option>
                                                                <option value="CX">Christmas Island</option>
                                                                <option value="CC">Cocos (Keeling) Islands
                                                                </option>
                                                                <option value="CO">Colombia</option>
                                                                <option value="KM">Comoros</option>
                                                                <option value="CG">Congo - Brazzaville
                                                                </option>
                                                                <option value="CD">Congo - Kinshasa</option>
                                                                <option value="CK">Cook Islands</option>
                                                                <option value="CR">Costa Rica</option>
                                                                <option value="CI">Côte d’Ivoire</option>
                                                                <option value="HR">Croatia</option>
                                                                <option value="CU">Cuba</option>
                                                                <option value="CY">Cyprus</option>
                                                                <option value="CZ">Czech Republic</option>
                                                                <option value="DK">Denmark</option>
                                                                <option value="DJ">Djibouti</option>
                                                                <option value="DM">Dominica</option>
                                                                <option value="DO">Dominican Republic
                                                                </option>
                                                                <option value="EC">Ecuador</option>
                                                                <option value="EG">Egypt</option>
                                                                <option value="SV">El Salvador</option>
                                                                <option value="GQ">Equatorial Guinea
                                                                </option>
                                                                <option value="ER">Eritrea</option>
                                                                <option value="EE">Estonia</option>
                                                                <option value="ET">Ethiopia</option>
                                                                <option value="FK">Falkland Islands</option>
                                                                <option value="FO">Faroe Islands</option>
                                                                <option value="FJ">Fiji</option>
                                                                <option value="FI">Finland</option>
                                                                <option value="FR">France</option>
                                                                <option value="GF">French Guiana</option>
                                                                <option value="PF">French Polynesia</option>
                                                                <option value="TF">French Southern
                                                                    Territories</option>
                                                                <option value="GA">Gabon</option>
                                                                <option value="GM">Gambia</option>
                                                                <option value="GE">Georgia</option>
                                                                <option value="DE">Germany</option>
                                                                <option value="GH">Ghana</option>
                                                                <option value="GI">Gibraltar</option>
                                                                <option value="GR">Greece</option>
                                                                <option value="GL">Greenland</option>
                                                                <option value="GD">Grenada</option>
                                                                <option value="GP">Guadeloupe</option>
                                                                <option value="GU">Guam</option>
                                                                <option value="GT">Guatemala</option>
                                                                <option value="GG">Guernsey</option>
                                                                <option value="GN">Guinea</option>
                                                                <option value="GW">Guinea-Bissau</option>
                                                                <option value="GY">Guyana</option>
                                                                <option value="HT">Haiti</option>
                                                                <option value="HM">Heard &amp; McDonald
                                                                    Islands</option>
                                                                <option value="HN">Honduras</option>
                                                                <option value="HK">Hong Kong SAR China
                                                                </option>
                                                                <option value="HU">Hungary</option>
                                                                <option value="IS">Iceland</option>
                                                                <option value="IN">India</option>
                                                                <option value="ID">Indonesia</option>
                                                                <option value="IR">Iran</option>
                                                                <option value="IQ">Iraq</option>
                                                                <option value="IE">Ireland</option>
                                                                <option value="IM">Isle of Man</option>
                                                                <option value="IL">Israel</option>
                                                                <option value="IT">Italy</option>
                                                                <option value="JM">Jamaica</option>
                                                                <option value="JP">Japan</option>
                                                                <option value="JE">Jersey</option>
                                                                <option value="JO">Jordan</option>
                                                                <option value="KZ">Kazakhstan</option>
                                                                <option value="KE">Kenya</option>
                                                                <option value="KI">Kiribati</option>
                                                                <option value="KW">Kuwait</option>
                                                                <option value="KG">Kyrgyzstan</option>
                                                                <option value="LA">Laos</option>
                                                                <option value="LV">Latvia</option>
                                                                <option value="LB">Lebanon</option>
                                                                <option value="LS">Lesotho</option>
                                                                <option value="LR">Liberia</option>
                                                                <option value="LY">Libya</option>
                                                                <option value="LI">Liechtenstein</option>
                                                                <option value="LT">Lithuania</option>
                                                                <option value="LU">Luxembourg</option>
                                                                <option value="MO">Macau SAR China</option>
                                                                <option value="MK">Macedonia</option>
                                                                <option value="MG">Madagascar</option>
                                                                <option value="MW">Malawi</option>
                                                                <option value="MY">Malaysia</option>
                                                                <option value="MV">Maldives</option>
                                                                <option value="ML">Mali</option>
                                                                <option value="MT">Malta</option>
                                                                <option value="MH">Marshall Islands</option>
                                                                <option value="MQ">Martinique</option>
                                                                <option value="MR">Mauritania</option>
                                                                <option value="MU">Mauritius</option>
                                                                <option value="YT">Mayotte</option>
                                                                <option value="MX">Mexico</option>
                                                                <option value="FM">Micronesia</option>
                                                                <option value="MD">Moldova</option>
                                                                <option value="MC">Monaco</option>
                                                                <option value="MN">Mongolia</option>
                                                                <option value="ME">Montenegro</option>
                                                                <option value="MS">Montserrat</option>
                                                                <option value="MA">Morocco</option>
                                                                <option value="MZ">Mozambique</option>
                                                                <option value="MM">Myanmar (Burma)</option>
                                                                <option value="NA">Namibia</option>
                                                                <option value="NR">Nauru</option>
                                                                <option value="NP">Nepal</option>
                                                                <option value="NL">Netherlands</option>
                                                                <option value="AN">Netherlands Antilles
                                                                </option>
                                                                <option value="NC">New Caledonia</option>
                                                                <option value="NZ">New Zealand</option>
                                                                <option value="NI">Nicaragua</option>
                                                                <option value="NE">Niger</option>
                                                                <option value="NG">Nigeria</option>
                                                                <option value="NU">Niue</option>
                                                                <option value="NF">Norfolk Island</option>
                                                                <option value="MP">Northern Mariana Islands
                                                                </option>
                                                                <option value="KP">North Korea</option>
                                                                <option value="NO">Norway</option>
                                                                <option value="OM">Oman</option>
                                                                <option value="PK">Pakistan</option>
                                                                <option value="PW">Palau</option>
                                                                <option value="PS">Palestinian Territories
                                                                </option>
                                                                <option value="PA">Panama</option>
                                                                <option value="PG">Papua New Guinea</option>
                                                                <option value="PY">Paraguay</option>
                                                                <option value="PE">Peru</option>
                                                                <option value="PH">Philippines</option>
                                                                <option value="PN">Pitcairn Islands</option>
                                                                <option value="PL">Poland</option>
                                                                <option value="PT">Portugal</option>
                                                                <option value="PR">Puerto Rico</option>
                                                                <option value="QA">Qatar</option>
                                                                <option value="RE">Réunion</option>
                                                                <option value="RO">Romania</option>
                                                                <option value="RU">Russia</option>
                                                                <option value="RW">Rwanda</option>
                                                                <option value="BL">Saint Barthélemy</option>
                                                                <option value="SH">Saint Helena</option>
                                                                <option value="KN">Saint Kitts and Nevis
                                                                </option>
                                                                <option value="LC">Saint Lucia</option>
                                                                <option value="MF">Saint Martin</option>
                                                                <option value="PM">Saint Pierre and Miquelon
                                                                </option>
                                                                <option value="WS">Samoa</option>
                                                                <option value="SM">San Marino</option>
                                                                <option value="ST">São Tomé and Príncipe
                                                                </option>
                                                                <option value="SA">Saudi Arabia</option>
                                                                <option value="SN">Senegal</option>
                                                                <option value="RS">Serbia</option>
                                                                <option value="SC">Seychelles</option>
                                                                <option value="SL">Sierra Leone</option>
                                                                <option value="SG">Singapore</option>
                                                                <option value="SK">Slovakia</option>
                                                                <option value="SI">Slovenia</option>
                                                                <option value="SB">Solomon Islands</option>
                                                                <option value="SO">Somalia</option>
                                                                <option value="ZA">South Africa</option>
                                                                <option value="GS">South Georgia &amp; South
                                                                    Sandwich Islands</option>
                                                                <option value="KR">South Korea</option>
                                                                <option value="ES">Spain</option>
                                                                <option value="LK">Sri Lanka</option>
                                                                <option value="VC">St. Vincent &amp;
                                                                    Grenadines</option>
                                                                <option value="SD">Sudan</option>
                                                                <option value="SR">Suriname</option>
                                                                <option value="SJ">Svalbard and Jan Mayen
                                                                </option>
                                                                <option value="SZ">Swaziland</option>
                                                                <option value="SE">Sweden</option>
                                                                <option value="CH">Switzerland</option>
                                                                <option value="SY">Syria</option>
                                                                <option value="TW">Taiwan</option>
                                                                <option value="TJ">Tajikistan</option>
                                                                <option value="TZ">Tanzania</option>
                                                                <option value="TH">Thailand</option>
                                                                <option value="TL">Timor-Leste</option>
                                                                <option value="TG">Togo</option>
                                                                <option value="TK">Tokelau</option>
                                                                <option value="TO">Tonga</option>
                                                                <option value="TT">Trinidad and Tobago
                                                                </option>
                                                                <option value="TN">Tunisia</option>
                                                                <option value="TR">Turkey</option>
                                                                <option value="TM">Turkmenistan</option>
                                                                <option value="TC">Turks and Caicos Islands
                                                                </option>
                                                                <option value="TV">Tuvalu</option>
                                                                <option value="UG">Uganda</option>
                                                                <option value="UA">Ukraine</option>
                                                                <option value="AE">United Arab Emirates
                                                                </option>
                                                                <option value="GB">United Kingdom</option>
                                                                <option value="US" selected="selected">
                                                                    United States</option>
                                                                <option value="UY">Uruguay</option>
                                                                <option value="UM">U.S. Outlying Islands
                                                                </option>
                                                                <option value="VI">U.S. Virgin Islands
                                                                </option>
                                                                <option value="UZ">Uzbekistan</option>
                                                                <option value="VU">Vanuatu</option>
                                                                <option value="VA">Vatican City</option>
                                                                <option value="VE">Venezuela</option>
                                                                <option value="VN">Vietnam</option>
                                                                <option value="WF">Wallis and Futuna
                                                                </option>
                                                                <option value="EH">Western Sahara</option>
                                                                <option value="YE">Yemen</option>
                                                                <option value="ZM">Zambia</option>
                                                                <option value="ZW">Zimbabwe</option>
                                                            </select> </div>
                                                    </div>
                                                    <div class="field">
                                                        <label for="shipping:city" class="required"><em>*</em>City</label>
                                                        <div class="input-box">
                                                            <input type="text" title="City" name="shipping[city]" value="" class="input-text  required-entry" id="shipping:city" />
                                                        </div>
                                                    </div>


                                                </li>
                                                <li class="fields">
                                                    <div class="field">
                                                        <label for="shipping:region" class="required"><em>*</em>State/Province</label>
                                                        <div class="input-box">
                                                            <select id="shipping:region_id" name="shipping[region_id]" title="State/Province" class="validate-select">
                                                                <option value="">Please select region, state
                                                                    or province</option>
                                                            </select>
                                                            <input type="text" id="shipping:region" name="shipping[region]" value="" title="State/Province" class="input-text " />
                                                        </div>
                                                    </div>
                                                    <div class="field">
                                                        <label for="shipping:postcode" class="required"><em>*</em>Zip/Postal
                                                            Code</label>
                                                        <div class="input-box">
                                                            <input type="text" title="Zip/Postal Code" name="shipping[postcode]" id="shipping:postcode" value="" class="input-text validate-zip-international  required-entry" />
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="fields">
                                                    <div class="field">
                                                        <label for="shipping:telephone" class="required"><em>*</em>Telephone</label>
                                                        <div class="input-box">
                                                            <input type="text" name="shipping[telephone]" value="" title="Telephone" class="input-text  required-entry" id="shipping:telephone" />
                                                        </div>
                                                    </div>
                                                    <div class="field">
                                                        <label for="shipping:fax">Fax</label>
                                                        <div class="input-box">
                                                            <input type="text" name="shipping[fax]" value="" title="Fax" class="input-text " id="shipping:fax" />
                                                        </div>
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
                                        <div class="discount-form" style="display: block;">
                                            <input type="hidden" name="remove" id="remove-coupone" value="0">
                                            <div class="input-box">
                                                <label for="coupon_code">Enter your coupon code if you have one.</label>
                                                <input class="input-text" id="coupon_code" name="coupon_code" value="">
                                                <button type="button" title="Apply Coupon" class="button" value="Apply Coupon"><span><span>Apply Coupon</span></span></button>

                                            </div>
                                        </div>
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
                                        <table class="data-table" id="checkout-review-table">
                                            <colgroup>
                                                <col>
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
                                                    <th colspan="1" class="a-center">Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr class="first">
                                                    <td style="" class="a-right" colspan="5">Subtotal</td>
                                                    <td style="" class="a-right last">
                                                        <span class="price">$<span class="total_price"><?php $total = 0;
                                                                                                            foreach ($this->carts as $key => $value) {
                                                                                                                $total += (intval($value['price']) * intval($value['quantity']));
                                                                                                            }
                                                                                                            echo  $total; ?></span></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="" class="a-right" colspan="5">
                                                        Shipping &amp; Handling (Flat Rate - Fixed) </td>
                                                    <td style="" class="a-right last">
                                                        <span class="price">$<span class ="shipping_fee">2</span></span> </td>
                                                </tr>
                                                <tr class="last">
                                                    <td style="" class="a-right" colspan="5">
                                                        <strong>Grand Total</strong>
                                                    </td>
                                                    <td style="" class="a-right last">
                                                        <strong><span class="price "><?php $total = 0;
                                                                                        foreach ($this->carts as $key => $value) {
                                                                                            $total += (intval($value['price']) * intval($value['quantity']));
                                                                                        }
                                                                                        echo "$" . ($total + 2); ?></span></strong>
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
                                                            <h3 class="product-name"><?= $carts['color'] ?></h3>
                                                        </td>
                                                        <td>
                                                            <h3 class="product-name"><?= $carts['size'] ?></h3>
                                                        </td>
                                                        <td class="a-right">
                                                            <span class="cart-price">
                                                                <span class="price"><?php echo "$" . $carts['price']; ?></span>
                                                            </span>
                                                        </td>
                                                        <td class="a-center"><?= $carts['quantity'] ?></td>
                                                        <!-- sub total starts here -->
                                                        <td class="a-right last">
                                                            <span class="cart-price">
                                                                <span class="price "><?php echo "$" . (intval($carts['price']) * intval($carts['quantity'])); ?></span>
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
            console.log(total_price)
            let order_info = $('#order-info').val();
            $.ajax({
                url: rootUrl + "customer/checkout/orders",
                method: "POST",
                data: {
                    total: total_price + shipping_fee,
                    info: order_info
                },
                success: function(data) {
                    console.log(data)
                    location.replace(`${rootUrl}customer/order/success/${data}`)
                }
            });
        });
    });
</script>
<?php include_once 'views/layout/' . $this->layout . 'footer.php';
