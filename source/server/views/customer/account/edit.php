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
                    <?php if (isset($this->errors['database'])) { ?>
                        <div class="alert alert-danger  alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4>Oh snap! You got an error!</h4>
                            <p><?= $this->errors['database']; ?></p>
                        </div>
                    <?php } ?>
                    <div class="page-title">
                        <h1>Edit Account Information</h1>
                    </div>
                    <form action="<?php echo vendor_app_util::url(["area" => "customer", "ctl" => "account", "act" => 'edit']); ?>" method="post" id="form-validate" enctype="multipart/form-data" autocomplete="off">
                        <div class="fieldset change-pass-display">
                            <h2 class="legend">Account Information</h2>
                            <ul class="form-list">
                                <li class="fields">
                                    <div class="customer-name">
                                        <div class="field name-firstname">
                                            <label for="firstname" class="required"><em>*</em>First
                                                Name</label>
                                            <div class="input-box">
                                                <input type="text" id="firstname" name="user[firstname]" value="<?php if (isset($_SESSION['user']['firstname'])) echo $_SESSION['user']['firstname']; ?>" title="First Name" maxlength="255" class="input-text required-entry" />
                                                <?php if (isset($this->errors['firstname'])) { ?>
                                                    <p class="text-danger"><?= $this->errors['firstname']; ?></p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="field name-lastname">
                                            <label for="lastname" class="required"><em>*</em>Last
                                                Name</label>
                                            <div class="input-box">
                                                <input type="text" id="lastname" name="user[lastname]" value="<?php if (isset($_SESSION['user']['lastname'])) echo $_SESSION['user']['lastname']; ?>" title="Last Name" maxlength="255" class="input-text required-entry" />
                                                <?php if (isset($this->errors['lastname'])) { ?>
                                                    <p class="text-danger"><?= $this->errors['lastname']; ?></p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <label for="email" class="required"><em>*</em>Email Address</label>
                                    <div class="input-box">
                                        <input type="text" name="user[email]" id="email" value="<?php if (isset($_SESSION['user']['email'])) echo $_SESSION['user']['email']; ?>" title="Email Address" class="input-text required-entry validate-email" />
                                        <?php if (isset($this->errors['email'])) { ?>
                                            <p class="text-danger"><?= $this->errors['email']; ?></p>
                                        <?php } ?>
                                    </div>
                                </li>
                                <li>
                                    <label for="current_password" class="required"><em>*</em>Current
                                        Password</label>
                                    <div class="input-box">
                                        <input type="password" title="Current Password" class="input-text required-entry" name="user[password]" id="current_password" />
                                    </div>
                                </li>
                                <li class="control">
                                    <input type="checkbox" name="change_password" id="change_password" title="Change Password" class="checkbox" /><label for="">Change Password</label>
                                </li>
                            </ul>
                        </div>
                        <div class="fieldset change-pass-new" style="display:none;">
                            <h2 class="legend">Change Password</h2>
                            <ul class="form-list">
                                <li class="fields">
                                    <div class="field">
                                        <label for="password" class="required"><em>*</em>New
                                            Password</label>
                                        <div class="input-box">
                                            <input type="password" title="New Password" class="input-text required-entry validate-password" name="new_password" id="password" />
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="confirmation" class="required"><em>*</em>Confirm New
                                            Password</label>
                                        <div class="input-box">
                                            <input type="password" title="Confirm New Password" class="input-text required-entry validate-cpassword" name="confirmation_password" id="confirmation" />
                                        </div>
                                    </div>
                                </li>
                                <?php if (isset($this->errors['pass_confirm'])) { ?>
                                    <p class="text-danger"><?= $this->errors['pass_confirm']; ?></p>
                                <?php } ?>
                            </ul>
                        </div>
                        <script>
                            jQuery(function($) {
                                $('#change_password').change(function() {
                                    if (this.checked) {
                                        $('.change-pass-new').show('slow');
                                    } else {
                                        $('.change-pass-new').hide('slow');
                                    }
                                });
                            });
                        </script>
                        <div class="buttons-set">
                            <p class="required">* Required Fields</p>
                            <p class="back-link"><a href="javascript:history.back()"><small>&laquo;
                                    </small>Back</a></p>
                            <button type="submit" title="Save" class="button " name="btn_submit"><span><span>Save</span></span></button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include_once 'views/layout/' . $this->layout . 'footer.php'; ?>