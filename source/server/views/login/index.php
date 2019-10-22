<?php
global $mediaFiles;
array_push($mediaFiles['css'], RootREL . "media/css/login.css");
?>
<?php include_once 'views/layout/' . $this->layout . 'top.php'; ?>
<div class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
            <div id="loading-mask">
                <div class="background-overlay"></div>
                <p id="loading_mask_loader" class="loader">
                    <i class="ajax-loader large animate-spin"></i>
                </p>
            </div>
            <div id="after-loading-success-message">
                <div class="background-overlay"></div>
                <div id="success-message-container" class="loader">
                    <div class="msg-box">Product was successfully added to your shopping cart.</div>
                    <button type="button" name="finish_and_checkout" id="finish_and_checkout" class="button btn-cart"><span><span>
                                Shopping Cart </span></span></button>
                    <button type="button" name="continue_shopping" id="continue_shopping" class="button btn-cart">
                        <span><span>
                                Continue </span></span></button>
                </div>
            </div>
            <script type='text/javascript'>
                jQuery('#finish_and_checkout').click(function() {
                    try {
                        parent.location.href =
                            'http://www.portotheme.com/magento/porto/index.php/demo4_en/checkout/cart/';
                    } catch (err) {
                        location.href =
                            'http://www.portotheme.com/magento/porto/index.php/demo4_en/checkout/cart/';
                    }
                });
                jQuery('#continue_shopping').click(function() {
                    jQuery('#after-loading-success-message').fadeOut(200);
                    clearTimeout(ajaxcart_timer);
                    setTimeout(function() {
                        jQuery('#after-loading-success-message .timer').text(ajaxcart_sec);
                    }, 1000);
                });
            </script>

            <div class="account-login">
                <div class="page-title">
                    <h1>Login or Create an Account</h1>
                </div>
                <?php if ($this->errors) { ?>
                    <div class="form-list">
                        <div class="replay-forgotpassword">
                            <?php echo $this->errors['input']; ?>
                        </div>
                    </div>
                <?php } ?>
                <form method="post" action="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'login')); ?>" id="login-form">
                    <div class="col2-set">
                        <div class="col-1 new-users">
                            <div class="content">
                                <h2 style="text-align: center;">New Customers</h2>
                                <p>By creating an account with our store, you will be able to move through
                                    the checkout process faster, store multiple shipping addresses, view and
                                    track your orders in your account and more.</p>
                            </div>
                            <div class="buttons-set button-register">
                                <a title="Create an Account" class="button" href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'register')); ?>"><span><span>Create
                                            an Account</span></span></a>
                            </div>
                        </div>
                        <div class="col-2 registered-users">
                            <div class="content">
                                <h2 id="tilte-login">Login</h2>
                                <p>If you have an account with us, please log in.</p>
                                <ul class="form-list">
                                    <li>
                                        <label for="email" class="required"><em>*</em>Email Address</label>
                                        <div class="input-box">
                                            <input type="text" name="user[email]" value="" id="email" class="input-text required-entry validate-email" title="Email Address" />
                                        </div>
                                    </li>
                                    <li>
                                        <label for="pass" class="required"><em>*</em>Password</label>
                                        <div class="input-box">
                                            <input type="password" name="user[password]" class="input-text required-entry validate-password" id="pass" title="Password" />
                                        </div>
                                    </li>
                                </ul>
                                <div id="window-overlay" class="window-overlay" style="display:none;"></div>
                                <label class="containerlogin">Remember me
                                    <input type="checkbox" name="remember" value="single" id="remember">
                                    <span class="checkmarklogin"></span>
                                </label>
                                <p class="required">* Required Fields</p>
                            </div>
                            <div class="buttons-set">
                                <a href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'login', 'act' => 'forgotPassWord')); ?>" class="f-left">Forgot Your Password?</a>
                                <button type="submit" class="btn btn-primary " name="btn_submit"><span><span>Login</span></span></button>
                            </div>
                        </div>
                    </div>

                </form>
                <script type="text/javascript">
                    //<![CDATA[
                    var dataForm = new VarienForm('login-form', true);
                    //]]>
                </script>
            </div>
        </div>
    </div>
</div>
<?php include_once 'views/layout/' . $this->layout . 'footer.php'; ?>