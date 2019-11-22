<?php
global $mediaFiles;
array_push($mediaFiles['css'], RootREL . "media/css/login.css");
?>
<?php include_once 'views/layout/' . $this->layout . 'top.php'; ?>
<div class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
            <div class="page-title">
                <h1>Forgot Your Password?</h1>
            </div>
            <?php if ($this->errors) { ?>
                <div class="form-list">
                    <div class="replay-forgotpassword">
                        <?php echo $this->errors['message']; ?>
                    </div>
                </div>
            <?php } ?>
            <form action="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'login', 'act' => 'forgotPassWord')); ?>" method="post" id="form-validate">
                <div class="fieldset">

                    <h2 class="legend">Retrieve your password here</h2>
                    <p>Please enter your email address below. You will receive a link to reset your
                        password.</p>
                    <ul class="form-list">
                        <li>
                            <label for="email_address" class="required"><em>*</em>Email Address</label>
                            <div class="input-box">
                                <input type="text" name="email" alt="email" id="email_address" class="input-text required-entry validate-email" value="" required />
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="buttons-set">
                    <p class="required">* Required Fields</p>
                    <p class="back-link"><a href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'login')); ?>"><small>&laquo;
                            </small>Back to Login</a></p>
                    <button type="submit" title="Submit" name="btn_submit" class="button"><span><span>Submit</span></span></button>
                </div>

            </form>
        </div>
    </div>
</div>
<?php include_once 'views/layout/' . $this->layout . 'footer.php'; ?>