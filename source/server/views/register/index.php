<?php include_once 'views/layout/' . $this->layout . 'top.php'; ?>
<div class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
            <div class="account-create">
                <div class="page-title">
                    <h1>Create an Account</h1>
                </div>
                <?php if (($this->errors)) { ?>
                    <div class="form-list" >
                        <div class="replay-forgotpassword" style ="padding: 10px;background-color: beige;">
                            <?php echo $this->errors; ?>
                        </div>
                    </div>
                <?php } ?>
                <form action="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'register')); ?>" method="post" id="form-validate">
                    <div class="fieldset">
                        <h2 class="legend">Personal Information</h2>
                        <ul class="form-list">
                            <li class="fields">
                                <div class="customer-name">
                                    <div class="field name-firstname">
                                        <label for="firstname" class="required"><em>*</em>First Name</label>
                                        <div class="input-box">
                                            <input type="text" id="firstname" name="user[firstname]" value="" title="First Name" required maxlength="255" class="input-text required-entry" />
                                        </div>
                                    </div>
                                    <div class="field name-lastname">
                                        <label for="lastname" class="required"><em>*</em>Last Name</label>
                                        <div class="input-box">
                                            <input type="text" id="lastname" name="user[lastname]" value="" title="Last Name" required maxlength="255" class="input-text required-entry" />
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="fields">
                                <div class="">
                                    <div class="field ">
                                        <label for="email" class="required"><em>*</em>Email Name</label>
                                        <div class="input-box">
                                            <input type="text" id="email" name="user[email]" value="" title="Email" required maxlength="255" class="input-text required-entry" />
                                            <?php if (isset($this->errors['email'])) { ?>
                                                <p class="text-danger"><?= $this->errors['email']; ?></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="field ">
                                        <label for="phone" class="required"><em>*</em>Phone number</label>
                                        <div class="input-box">
                                            <input type="text" id="phone" name="user[phone]" value="" required title="Phone Number" maxlength="255" class="input-text required-entry" />
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="fieldset">
                        <h2 class="legend">Login Information</h2>
                        <ul class="form-list">
                            <li class="fields">
                                <div class="field">
                                    <label for="password" class="required"><em>*</em>Password</label>
                                    <div class="input-box">
                                        <input type="password" name="user[password]" id="password" title="Password" required class="input-text required-entry validate-password" />
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="confirmation" class="required"><em>*</em>Confirm
                                        Password</label>
                                    <div class="input-box">
                                        <input type="password" name="user[password_confirm]" title="Confirm Password" required id="confirmation" class="input-text required-entry validate-cpassword" />
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div id="window-overlay" class="window-overlay" style="display:none;"></div>
                    </div>
                    <div class="buttons-set">
                        <p class="required">* Required Fields</p>
                        <p class="back-link"><a href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'login')); ?>" class="back-link"><small>&laquo; </small>Back</a></p>
                        <button type="submit" name="btn_submit" title="Submit" class="button"><span><span>Submit</span></span></button>
                    </div>
                </form>
                <script type="text/javascript">
                    //<![CDATA[
                    var dataForm = new VarienForm('form-validate', true);
                    //]]>
                </script>
            </div>
        </div>
    </div>
</div>
<?php include_once 'views/layout/' . $this->layout . 'footer.php'; ?>