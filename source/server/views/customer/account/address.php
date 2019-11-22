<?php include_once 'views/layout/' . $this->layout . 'top.php'; ?>
<div class="main-container col2-left-layout">
    <div class="main container">
        <div class="row">
            <div class="col-left sidebar f-left col-lg-3">
                <div class="block block-account">
                    <?php include_once 'views/customer/' . $this->layout . 'sidebar.php'; ?>
                </div>
            </div>
            <div class="col-main col-lg-9 lg-order-12">
                <div class="my-account">
                    <div class="page-title">
                        <h1>Add New Address</h1>
                    </div>
                    <form action="<?php echo vendor_app_util::url(["area" => "customer", "ctl" => "account", "act" => 'address']); ?>" method="post" id="form-validate">
                        <div class="fieldset">
                            <h2 class="legend">Contact Information</h2>
                            <ul class="form-list">
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
                                            <input type="text" name="user[phone]" value="<?php echo $_SESSION['user']['phone']; ?>" title="Telephone" required class="input-text   required-entry" id="telephone" />
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="fax">Fax</label>
                                        <div class="input-box">
                                            <input type="text" name="fax" id="fax" title="Fax" value="" class="input-text " />
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="fieldset">
                            <h2 class="legend">Address</h2>
                            <ul class="form-list">
                                <li class="wide">
                                    <label for="street_1" class="required"><em>*</em>Street Address</label>
                                    <div class="input-box">
                                        <input type="text" name="street" value="<?php if ($_SESSION['user']['address'] != null) {
                                                                                    echo (explode(',', $_SESSION['user']['address']))[0];
                                                                                } ?>" title="Street Address" id="street_1" class="input-text  required-entry" required placeholder="ex: 11923 NE Sumner St" />
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
                                            <input type="text" name="country" value="<?php if ($_SESSION['user']['address'] != null ) { echo (explode(',', $_SESSION['user']['address']))[3] ;}?>" title="country" id="country-address" class="input-text validate-country-international  required-entry" required placeholder="ex: Newyork" />
                                        </div>
                                </li>
                                <li>
                                    <input type="hidden" name="default_billing" value="1" />
                                </li>
                                <li>
                                    <input type="hidden" name="default_shipping" value="1" />
                                </li>
                            </ul>
                        </div>
                        <div class="buttons-set">
                            <p class="required">* Required Fields</p>
                            <p class="back-link"><a href="javascript:history.back()"><small>&laquo;
                                    </small>Back</a></p>
                            <button data-action="save-customer-address" name="btn_submit" type="submit" title="Save Address" class="button"><span><span>Save Address</span></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'views/layout/' . $this->layout . 'footer.php'; ?>