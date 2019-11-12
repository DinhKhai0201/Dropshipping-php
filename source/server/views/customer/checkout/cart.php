<?php include_once 'views/layout/' . $this->layout . 'top.php'; ?>
<div class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <div class="col-main col-lg-9">
                <div class="page-title">
                    <h1>Checkout</h1>
                </div>
                <ol class="opc" id="checkoutSteps">
                    <li id="opc-billing" class="section allow">
                        <div class="step-title">
                            <span class="number">1</span>
                            <h2>Billing Information</h2>
                            <a href="#">Edit</a>
                        </div>
                        <div id="checkout-step-billing" class="step a-item" style="display:none;">
                            <form id="co-billing-form" action="">
                                <fieldset>
                                    <ul class="form-list">
                                        <li class="wide">
                                            <label for="billing-address-select">Select a billing address
                                                from your address book or enter a new address.</label>
                                            <div class="input-box">
                                                <select name="billing_address_id" id="billing-address-select" class="address-select" title="">
                                                    <option value="514" selected="selected"><?php if (isset($_SESSION['user']['address'])) {
                                                                                                echo $_SESSION['user']['address'];
                                                                                            } ?></option>
                                                    <option value="">New Address</option>
                                                </select> </div>
                                        </li>
                                        <li id="billing-new-address-form" style="display:none;">
                                            <fieldset>
                                                <input type="hidden" name="billing[address_id]" value="101" id="billing:address_id" />
                                                <ul>
                                                    <li class="fields">
                                                        <div class="customer-name">
                                                            <div class="field name-firstname">
                                                                <label for="billing:firstname" class="required"><em>*</em>First
                                                                    Name</label>
                                                                <div class="input-box">
                                                                    <input type="text" id="billing:firstname" name="billing[firstname]" value="a" title="First Name" maxlength="255" class="input-text required-entry" />
                                                                </div>
                                                            </div>
                                                            <div class="field name-lastname">
                                                                <label for="billing:lastname" class="required"><em>*</em>Last
                                                                    Name</label>
                                                                <div class="input-box">
                                                                    <input type="text" id="billing:lastname" name="billing[lastname]" value="a" title="Last Name" maxlength="255" class="input-text required-entry" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="fields">
                                                        <div class="field">
                                                            <label for="billing:company">Company</label>
                                                            <div class="input-box">
                                                                <input type="text" id="billing:company" name="billing[company]" value="dfd" title="Company" class="input-text " />
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="wide">
                                                        <label for="billing:street1" class="required"><em>*</em>Address</label>
                                                        <div class="input-box">
                                                            <input type="text" title="Street Address" name="billing[street][]" id="billing:street1" value="324234" class="input-text  required-entry" />
                                                        </div>
                                                    </li>
                                                    <li class="wide">
                                                        <div class="input-box">
                                                            <input type="text" title="Street Address 2" name="billing[street][]" id="billing:street2" value="asd" class="input-text " />
                                                        </div>
                                                    </li>
                                                    <li class="fields">
                                                        <div class="field">
                                                            <label for="billing:city" class="required"><em>*</em>City</label>
                                                            <div class="input-box">
                                                                <input type="text" title="City" name="billing[city]" value="sdf" class="input-text  required-entry" id="billing:city" />
                                                            </div>
                                                        </div>
                                                        <div class="field">
                                                            <label for="billing:region_id" class="required"><em>*</em>State/Province</label>
                                                            <div class="input-box">
                                                                <select id="billing:region_id" name="billing[region_id]" title="State/Province" class="validate-select" style="display:none;">
                                                                    <option value="">Please select region,
                                                                        state or province</option>
                                                                </select>
                                                                <script type="text/javascript">
                                                                    //<![CDATA[
                                                                    $('billing:region_id').setAttribute('defaultValue', "16");
                                                                    //]]>
                                                                </script>
                                                                <input type="text" id="billing:region" name="billing[region]" value="District of Columbia" title="State/Province" class="input-text " style="display:none;" />
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="fields">
                                                        <div class="field">
                                                            <label for="billing:postcode" class="required"><em>*</em>Zip/Postal
                                                                Code</label>
                                                            <div class="input-box">
                                                                <input type="text" title="Zip/Postal Code" name="billing[postcode]" id="billing:postcode" value="55554" class="input-text validate-zip-international  required-entry" />
                                                            </div>
                                                        </div>
                                                        <div class="field">
                                                            <label for="billing:country_id" class="required"><em>*</em>Country</label>
                                                            <div class="input-box">
                                                                <select name="billing[country_id]" id="billing:country_id" class="validate-select" title="Country">
                                                                    <option value=""> </option>
                                                                    <option value="AF">Afghanistan</option>
                                                                    <option value="AX">Åland Islands
                                                                    </option>
                                                                    <option value="AL">Albania</option>
                                                                    <option value="DZ">Algeria</option>
                                                                    <option value="AS">American Samoa
                                                                    </option>
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
                                                                    <option value="BA">Bosnia and
                                                                        Herzegovina</option>
                                                                    <option value="BW">Botswana</option>
                                                                    <option value="BV">Bouvet Island
                                                                    </option>
                                                                    <option value="BR">Brazil</option>
                                                                    <option value="IO">British Indian Ocean
                                                                        Territory</option>
                                                                    <option value="VG">British Virgin
                                                                        Islands</option>
                                                                    <option value="BN">Brunei</option>
                                                                    <option value="BG">Bulgaria</option>
                                                                    <option value="BF">Burkina Faso</option>
                                                                    <option value="BI">Burundi</option>
                                                                    <option value="KH">Cambodia</option>
                                                                    <option value="CM">Cameroon</option>
                                                                    <option value="CA">Canada</option>
                                                                    <option value="CV">Cape Verde</option>
                                                                    <option value="KY">Cayman Islands
                                                                    </option>
                                                                    <option value="CF">Central African
                                                                        Republic</option>
                                                                    <option value="TD">Chad</option>
                                                                    <option value="CL">Chile</option>
                                                                    <option value="CN">China</option>
                                                                    <option value="CX">Christmas Island
                                                                    </option>
                                                                    <option value="CC">Cocos (Keeling)
                                                                        Islands</option>
                                                                    <option value="CO">Colombia</option>
                                                                    <option value="KM">Comoros</option>
                                                                    <option value="CG">Congo - Brazzaville
                                                                    </option>
                                                                    <option value="CD">Congo - Kinshasa
                                                                    </option>
                                                                    <option value="CK">Cook Islands</option>
                                                                    <option value="CR">Costa Rica</option>
                                                                    <option value="CI">Côte d’Ivoire
                                                                    </option>
                                                                    <option value="HR">Croatia</option>
                                                                    <option value="CU">Cuba</option>
                                                                    <option value="CY">Cyprus</option>
                                                                    <option value="CZ">Czech Republic
                                                                    </option>
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
                                                                    <option value="FK">Falkland Islands
                                                                    </option>
                                                                    <option value="FO">Faroe Islands
                                                                    </option>
                                                                    <option value="FJ">Fiji</option>
                                                                    <option value="FI">Finland</option>
                                                                    <option value="FR">France</option>
                                                                    <option value="GF">French Guiana
                                                                    </option>
                                                                    <option value="PF">French Polynesia
                                                                    </option>
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
                                                                    <option value="GW">Guinea-Bissau
                                                                    </option>
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
                                                                    <option value="LI">Liechtenstein
                                                                    </option>
                                                                    <option value="LT">Lithuania</option>
                                                                    <option value="LU">Luxembourg</option>
                                                                    <option value="MO">Macau SAR China
                                                                    </option>
                                                                    <option value="MK">Macedonia</option>
                                                                    <option value="MG">Madagascar</option>
                                                                    <option value="MW">Malawi</option>
                                                                    <option value="MY">Malaysia</option>
                                                                    <option value="MV">Maldives</option>
                                                                    <option value="ML">Mali</option>
                                                                    <option value="MT">Malta</option>
                                                                    <option value="MH">Marshall Islands
                                                                    </option>
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
                                                                    <option value="MM">Myanmar (Burma)
                                                                    </option>
                                                                    <option value="NA">Namibia</option>
                                                                    <option value="NR">Nauru</option>
                                                                    <option value="NP">Nepal</option>
                                                                    <option value="NL">Netherlands</option>
                                                                    <option value="AN">Netherlands Antilles
                                                                    </option>
                                                                    <option value="NC">New Caledonia
                                                                    </option>
                                                                    <option value="NZ">New Zealand</option>
                                                                    <option value="NI">Nicaragua</option>
                                                                    <option value="NE">Niger</option>
                                                                    <option value="NG">Nigeria</option>
                                                                    <option value="NU">Niue</option>
                                                                    <option value="NF">Norfolk Island
                                                                    </option>
                                                                    <option value="MP">Northern Mariana
                                                                        Islands</option>
                                                                    <option value="KP">North Korea</option>
                                                                    <option value="NO">Norway</option>
                                                                    <option value="OM">Oman</option>
                                                                    <option value="PK">Pakistan</option>
                                                                    <option value="PW">Palau</option>
                                                                    <option value="PS">Palestinian
                                                                        Territories</option>
                                                                    <option value="PA">Panama</option>
                                                                    <option value="PG">Papua New Guinea
                                                                    </option>
                                                                    <option value="PY">Paraguay</option>
                                                                    <option value="PE">Peru</option>
                                                                    <option value="PH">Philippines</option>
                                                                    <option value="PN">Pitcairn Islands
                                                                    </option>
                                                                    <option value="PL">Poland</option>
                                                                    <option value="PT">Portugal</option>
                                                                    <option value="PR">Puerto Rico</option>
                                                                    <option value="QA">Qatar</option>
                                                                    <option value="RE">Réunion</option>
                                                                    <option value="RO">Romania</option>
                                                                    <option value="RU">Russia</option>
                                                                    <option value="RW">Rwanda</option>
                                                                    <option value="BL">Saint Barthélemy
                                                                    </option>
                                                                    <option value="SH">Saint Helena</option>
                                                                    <option value="KN">Saint Kitts and Nevis
                                                                    </option>
                                                                    <option value="LC">Saint Lucia</option>
                                                                    <option value="MF">Saint Martin</option>
                                                                    <option value="PM">Saint Pierre and
                                                                        Miquelon</option>
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
                                                                    <option value="SB">Solomon Islands
                                                                    </option>
                                                                    <option value="SO">Somalia</option>
                                                                    <option value="ZA">South Africa</option>
                                                                    <option value="GS">South Georgia &amp;
                                                                        South Sandwich Islands</option>
                                                                    <option value="KR">South Korea</option>
                                                                    <option value="ES">Spain</option>
                                                                    <option value="LK">Sri Lanka</option>
                                                                    <option value="VC">St. Vincent &amp;
                                                                        Grenadines</option>
                                                                    <option value="SD">Sudan</option>
                                                                    <option value="SR">Suriname</option>
                                                                    <option value="SJ">Svalbard and Jan
                                                                        Mayen</option>
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
                                                                    <option value="TC">Turks and Caicos
                                                                        Islands</option>
                                                                    <option value="TV">Tuvalu</option>
                                                                    <option value="UG">Uganda</option>
                                                                    <option value="UA">Ukraine</option>
                                                                    <option value="AE">United Arab Emirates
                                                                    </option>
                                                                    <option value="GB">United Kingdom
                                                                    </option>
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
                                                                    <option value="EH">Western Sahara
                                                                    </option>
                                                                    <option value="YE">Yemen</option>
                                                                    <option value="ZM">Zambia</option>
                                                                    <option value="ZW">Zimbabwe</option>
                                                                </select> </div>
                                                        </div>
                                                    </li>
                                                    <li class="fields">
                                                        <div class="field">
                                                            <label for="billing:telephone" class="required"><em>*</em>Telephone</label>
                                                            <div class="input-box">
                                                                <input type="text" name="billing[telephone]" value="02348687832" title="Telephone" class="input-text  required-entry" id="billing:telephone" />
                                                            </div>
                                                        </div>
                                                        <div class="field">
                                                            <label for="billing:fax">Fax</label>
                                                            <div class="input-box">
                                                                <input type="text" name="billing[fax]" value="asdasd" title="Fax" class="input-text " id="billing:fax" />
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="control">
                                                        <input type="checkbox" name="billing[save_in_address_book]" value="1" title="Save in address book" id="billing:save_in_address_book" class="checkbox" /><label for="billing:save_in_address_book">Save in
                                                            address book</label>
                                                    </li>
                                                </ul>
                                                <div id="window-overlay" class="window-overlay" style="display:none;"></div>
                                                <div id="remember-me-popup" class="remember-me-popup" style="display:none;">
                                                    <div class="remember-me-popup-head">
                                                        <h3>What's this?</h3>
                                                        <a href="#" class="remember-me-popup-close" title="Close">Close</a>
                                                    </div>
                                                    <div class="remember-me-popup-body">
                                                        <p>Checking &quot;Remember Me&quot; will let you
                                                            access your shopping cart on this computer when
                                                            you are logged out</p>
                                                        <div class="remember-me-popup-close-button a-right">
                                                            <a href="#" class="remember-me-popup-close button" title="Close"><span>Close</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </li>
                                        <li class="control">
                                            <input type="radio" name="billing[use_for_shipping]" id="billing:use_for_shipping_yes" value="1" checked="checked" title="Ship to this address" onclick="$('shipping:same_as_billing').checked = true;" class="radio" /><label for="billing:use_for_shipping_yes">Ship to this
                                                address</label></li>
                                        <li class="control">
                                            <input type="radio" name="billing[use_for_shipping]" id="billing:use_for_shipping_no" value="0" title="Ship to different address" onclick="$('shipping:same_as_billing').checked = false;" class="radio" /><label for="billing:use_for_shipping_no">Ship to different
                                                address</label>
                                        </li>
                                    </ul>
                                    <div class="buttons-set" id="billing-buttons-container">
                                        <p class="required">* Required Fields</p>
                                        <button type="button" title="Continue" class="button" onclick="billing.save()"><span><span>Continue</span></span></button>
                                        <span class="please-wait" id="billing-please-wait" style="display:none;">
                                            <img src="<?php echo RootREL;?>/media/skin/frontend/smartwave/porto/images/opc-ajax-loader.gif" alt="Loading next step..." title="Loading next step..." class="v-middle" /> Loading next step... </span>
                                    </div>
                                    <input name="form_key" type="hidden" value="oI9yHI5BRnu7ESfo" />
                                </fieldset>
                            </form>
                        </div>
                    </li>
                    <li id="opc-shipping" class="section">
                        <div class="step-title">
                            <span class="number">2</span>
                            <h2>Shipping Information</h2>
                            <a href="#">Edit</a>
                        </div>
                        <div id="checkout-step-shipping" class="step a-item" style="display:none;">
                            <form action="" id="co-shipping-form">
                                <ul class="form-list">
                                    <li class="wide">
                                        <label for="shipping-address-select">Select a shipping address from
                                            your address book or enter a new address.</label>
                                        <div class="input-box">
                                            <select name="shipping_address_id" id="shipping-address-select" class="address-select" title="">
                                                <option value="514" selected="selected"><?php if (isset($_SESSION['user']['address'])) {
                                                                                            echo $_SESSION['user']['address'];
                                                                                        } ?></option>
                                                <option value="new">New Address</option>
                                            </select> </div>
                                    </li>
                                    <li id="shipping-new-address-form" style="display:none;">
                                        <fieldset>
                                            <input type="hidden" name="shipping[address_id]" value="102" id="shipping:address_id" />
                                            <ul>
                                                <li class="fields">
                                                    <div class="customer-name">
                                                        <div class="field name-firstname">
                                                            <label for="shipping:firstname" class="required"><em>*</em>First
                                                                Name</label>
                                                            <div class="input-box">
                                                                <input type="text" id="shipping:firstname" name="shipping[firstname]" value="a" title="First Name" maxlength="255" class="input-text required-entry" onchange="shipping.setSameAsBilling(false)" />
                                                            </div>
                                                        </div>
                                                        <div class="field name-lastname">
                                                            <label for="shipping:lastname" class="required"><em>*</em>Last Name</label>
                                                            <div class="input-box">
                                                                <input type="text" id="shipping:lastname" name="shipping[lastname]" value="a" title="Last Name" maxlength="255" class="input-text required-entry" onchange="shipping.setSameAsBilling(false)" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="fields">
                                                    <div class="fields">
                                                        <label for="shipping:company">Company</label>
                                                        <div class="input-box">
                                                            <input type="text" id="shipping:company" name="shipping[company]" value="dfd" title="Company" class="input-text " onchange="shipping.setSameAsBilling(false);" />
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="wide">
                                                    <label for="shipping:street1" class="required"><em>*</em>Address</label>
                                                    <div class="input-box">
                                                        <input type="text" title="Street Address" name="shipping[street][]" id="shipping:street1" value="324234" class="input-text  required-entry" onchange="shipping.setSameAsBilling(false);" />
                                                    </div>
                                                </li>
                                                <li class="wide">
                                                    <div class="input-box">
                                                        <input type="text" title="Street Address 2" name="shipping[street][]" id="shipping:street2" value="asd" class="input-text " onchange="shipping.setSameAsBilling(false);" />
                                                    </div>
                                                </li>
                                                <li class="fields">
                                                    <div class="field">
                                                        <label for="shipping:city" class="required"><em>*</em>City</label>
                                                        <div class="input-box">
                                                            <input type="text" title="City" name="shipping[city]" value="sdf" class="input-text  required-entry" id="shipping:city" onchange="shipping.setSameAsBilling(false);" />
                                                        </div>
                                                    </div>
                                                    <div class="field">
                                                        <label for="shipping:region" class="required"><em>*</em>State/Province</label>
                                                        <div class="input-box">
                                                            <select id="shipping:region_id" name="shipping[region_id]" title="State/Province" class="validate-select" style="display:none;">
                                                                <option value="">Please select region, state
                                                                    or province</option>
                                                            </select>
                                                            <script type="text/javascript">
                                                                //<![CDATA[
                                                                $('shipping:region_id').setAttribute('defaultValue', "16");
                                                                //]]>
                                                            </script>
                                                            <input type="text" id="shipping:region" name="shipping[region]" value="District of Columbia" title="State/Province" class="input-text " style="display:none;" />
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="fields">
                                                    <div class="field">
                                                        <label for="shipping:postcode" class="required"><em>*</em>Zip/Postal
                                                            Code</label>
                                                        <div class="input-box">
                                                            <input type="text" title="Zip/Postal Code" name="shipping[postcode]" id="shipping:postcode" value="55554" class="input-text validate-zip-international  required-entry" onchange="shipping.setSameAsBilling(false);" />
                                                        </div>
                                                    </div>
                                                    <div class="field">
                                                        <label for="shipping:country_id" class="required"><em>*</em>Country</label>
                                                        <div class="input-box">
                                                            <select name="shipping[country_id]" id="shipping:country_id" class="validate-select" title="Country" onchange="if(window.shipping)shipping.setSameAsBilling(false);">
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
                                                </li>
                                                <li class="fields">
                                                    <div class="field">
                                                        <label for="shipping:telephone" class="required"><em>*</em>Telephone</label>
                                                        <div class="input-box">
                                                            <input type="text" name="shipping[telephone]" value="02348687832" title="Telephone" class="input-text  required-entry" id="shipping:telephone" onchange="shipping.setSameAsBilling(false);" />
                                                        </div>
                                                    </div>
                                                    <div class="field">
                                                        <label for="shipping:fax">Fax</label>
                                                        <div class="input-box">
                                                            <input type="text" name="shipping[fax]" value="asdasd" title="Fax" class="input-text " id="shipping:fax" onchange="shipping.setSameAsBilling(false);" />
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="control">
                                                    <input type="checkbox" name="shipping[save_in_address_book]" value="1" title="Save in address book" id="shipping:save_in_address_book" onchange="shipping.setSameAsBilling(false);" class="checkbox" /><label for="shipping:save_in_address_book">Save in address
                                                        book</label></li>
                                            </ul>
                                        </fieldset>
                                    </li>
                                    <li class="control">
                                        <input type="checkbox" name="shipping[same_as_billing]" id="shipping:same_as_billing" value="1" checked="checked" title="Use Billing Address" onclick="shipping.setSameAsBilling(this.checked)" class="checkbox" /><label for="shipping:same_as_billing">Use
                                            Billing Address</label>
                                    </li>
                                </ul>
                                <div class="buttons-set" id="shipping-buttons-container">
                                    <p class="required">* Required Fields</p>
                                    <p class="back-link"><a href="#" onclick="checkout.back(); return false;"><small>&laquo;
                                            </small>Back</a></p>
                                    <button type="button" class="button" title="Continue" onclick="shipping.save()"><span><span>Continue</span></span></button>
                                    <span id="shipping-please-wait" class="please-wait" style="display:none;">
                                        <img src="<?php echo RootREL;?>/media/skin/frontend/smartwave/porto/images/opc-ajax-loader.gif" alt="Loading next step..." title="Loading next step..." class="v-middle" /> Loading next step... </span>
                                </div>
                                <input name="form_key" type="hidden" value="oI9yHI5BRnu7ESfo" />
                            </form>
                        </div>
                    </li>
                    <li id="opc-shipping_method" class="section">
                        <div class="step-title">
                            <span class="number">3</span>
                            <h2>Shipping Method</h2>
                            <a href="#">Edit</a>
                        </div>
                        <div id="checkout-step-shipping_method" class="step a-item" style="display:none;">
                            <form id="co-shipping-method-form" action="">
                                <div id="checkout-shipping-method-load">
                                    <!-- Content loaded dynamically -->
                                </div>
                                <div id="onepage-checkout-shipping-method-additional-load">
                                </div>
                                <div class="buttons-set" id="shipping-method-buttons-container">
                                    <p class="back-link"><a href="#" onclick="checkout.back(); return false;"><small>&laquo;
                                            </small>Back</a></p>
                                    <button type="button" class="button" onclick="shippingMethod.save()"><span><span>Continue</span></span></button>
                                    <span id="shipping-method-please-wait" class="please-wait" style="display:none;">
                                        <img src="<?php echo RootREL;?>/media/skin/frontend/smartwave/porto/images/opc-ajax-loader.gif" alt="Loading next step..." title="Loading next step..." class="v-middle" /> Loading next step... </span>
                                </div>
                                <input name="form_key" type="hidden" value="oI9yHI5BRnu7ESfo" />
                            </form>
                        </div>
                    </li>
                    <li id="opc-payment" class="section">
                        <div class="step-title">
                            <span class="number">4</span>
                            <h2>Payment Information</h2>
                            <a href="#">Edit</a>
                        </div>
                        <div id="checkout-step-payment" class="step a-item" style="display:none;">
                            <form action="" id="co-payment-form">
                                <fieldset>
                                    <dl class="sp-methods" id="checkout-payment-method-load">
                                        <!-- Content dynamically loaded. Content from the methods.phtml is loaded during the ajax call -->
                                    </dl>
                                </fieldset>
                                <input name="form_key" type="hidden" value="oI9yHI5BRnu7ESfo" />
                            </form>
                            <div class="tool-tip" id="payment-tool-tip" style="display:none;">
                                <div class="btn-close"><a href="#" id="payment-tool-tip-close" title="Close">Close</a></div>
                                <div class="tool-tip-content"><img src="<?php echo RootREL;?>/media/skin/frontend/base/default/images/cvv.gif" alt="Card Verification Number Visual Reference" title="Card Verification Number Visual Reference" /></div>
                            </div>
                            <div class="buttons-set" id="payment-buttons-container">
                                <p class="required">* Required Fields</p>
                                <p class="back-link"><a href="#" onclick="checkout.back(); return false;"><small>&laquo;
                                        </small>Back</a></p>
                                <button type="button" class="button" onclick="payment.save()"><span><span>Continue</span></span></button>
                                <span class="please-wait" id="payment-please-wait" style="display:none;">
                                    <img src="<?php echo RootREL;?>/media/skin/frontend/smartwave/porto/images/opc-ajax-loader.gif" alt="Loading next step..." title="Loading next step..." class="v-middle" /> Loading next step... </span>
                            </div>
                        </div>
                    </li>
                    <li id="opc-review" class="section">
                        <div class="step-title">
                            <span class="number">5</span>
                            <h2>Order Review</h2>
                            <a href="#">Edit</a>
                        </div>
                        <div id="checkout-step-review" class="step a-item" style="display:none;">
                            <div class="order-review" id="checkout-review-load">
                                <!-- Content loaded dynamically -->
                            </div>
                        </div>
                    </li>
                </ol>
            </div>
            <div class="col-right sidebar col-lg-3">
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
            </div>
        </div>
    </div>
</div>
<script>

</script>
<?php include_once 'views/layout/' . $this->layout . 'footer.php';
