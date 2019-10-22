<?php
global $mediaFiles;
array_push($mediaFiles['css'], RootREL . "media/css/about_page.css");
?>
<?php include_once 'views/layout/' . $this->layout . 'header.php'; ?>
<div class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">

            <div class="page-title">
                <h1>Reset Password</h1>
            </div>
            <?php if ($this->errors) { ?>
                <div class="form-list">
                    <div class="replay-forgotpassword">
                        <?php echo $this->errors['message']; ?>
                    </div>
                </div>
            <?php } ?>
            <form action="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'login', 'act' => 'resetPassWord', 'params' => ['reset_token' => $this->reset_token])); ?>" method="post" id="form-validate">
                <div class="fieldset">

                    <h2 class="legend">Reset your password here</h2>
                    <p>Please enter your new password below. You will reset your
                        password.</p>
                    <ul class="form-list">
                        <li>
                            <label for="email_address" class="required"><em>*</em>Password</label>
                            <div class="input-box">
                                <input type="password" id="newpassword" name="password" placeholder="Password" required class="input-text required-entry validate-email" value=""  />
                            </div>
                        </li>
                    </ul>
                    <ul class="form-list">
                        <li>
                            <label for="email_address" class="required"><em>*</em>Confirm Password</label>
                            <div class="input-box">
                                <input type="password" id="repeatnewpassword" name="confirmpassword" placeholder="confirm Password" required class="input-text required-entry validate-email" value=""  />
                            </div>
                        </li>
                    </ul>

                </div>
                <div class="buttons-set">
                    <p class="required">* Required Fields</p>
                    <button type="submit" title="Submit" name="btn_submit" class="button"><span><span>Submit</span></span></button>
                </div>

            </form>
        </div>
    </div>
</div>
<?php include_once 'views/layout/' . $this->layout . 'footer.php'; ?>