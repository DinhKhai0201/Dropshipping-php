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
                <form action="http://www.portotheme.com/magento/porto/index.php/demo4_en/customer/account/loginPost/" method="post" id="login-form">
                    <input name="form_key" type="hidden" value="vMLzpoNW87ssM52L" />
                    <div class="col2-set">
                        <div class="col-1 new-users">
                            <div class="content">
                                <h2>New Customers</h2>
                                <p>By creating an account with our store, you will be able to move through
                                    the checkout process faster, store multiple shipping addresses, view and
                                    track your orders in your account and more.</p>
                            </div>
                        </div>
                        <div class="col-2 registered-users">
                            <div class="content">
                                <h2>Registered Customers</h2>
                                <p>If you have an account with us, please log in.</p>
                                <ul class="form-list">
                                    <li>
                                        <label for="email" class="required"><em>*</em>Email Address</label>
                                        <div class="input-box">
                                            <input type="text" name="login[username]" value="" id="email" class="input-text required-entry validate-email" title="Email Address" />
                                        </div>
                                    </li>
                                    <li>
                                        <label for="pass" class="required"><em>*</em>Password</label>
                                        <div class="input-box">
                                            <input type="password" name="login[password]" class="input-text required-entry validate-password" id="pass" title="Password" />
                                        </div>
                                    </li>
                                </ul>
                                <div id="window-overlay" class="window-overlay" style="display:none;"></div>
                                <div id="remember-me-popup" class="remember-me-popup" style="display:none;">
                                    <div class="remember-me-popup-head">
                                        <h3>What's this?</h3>
                                        <a href="#" class="remember-me-popup-close" title="Close">Close</a>
                                    </div>
                                    <div class="remember-me-popup-body">
                                        <p>Checking &quot;Remember Me&quot; will let you access your
                                            shopping cart on this computer when you are logged out</p>
                                        <div class="remember-me-popup-close-button a-right">
                                            <a href="#" class="remember-me-popup-close button" title="Close"><span>Close</span></a>
                                        </div>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    //<![CDATA[
                                    function toggleRememberMepopup(event) {
                                        if ($('remember-me-popup')) {
                                            var viewportHeight = document.viewport.getHeight(),
                                                docHeight = $$('body')[0].getHeight(),
                                                height = docHeight > viewportHeight ? docHeight :
                                                viewportHeight;
                                            $('remember-me-popup').toggle();
                                            $('window-overlay').setStyle({
                                                height: height + 'px'
                                            }).toggle();
                                        }
                                        Event.stop(event);
                                    }

                                    document.observe("dom:loaded", function() {
                                        new Insertion.Bottom($$('body')[0], $('window-overlay'));
                                        new Insertion.Bottom($$('body')[0], $('remember-me-popup'));

                                        $$('.remember-me-popup-close').each(function(element) {
                                            Event.observe(element, 'click',
                                                toggleRememberMepopup);
                                        })
                                        $$('#remember-me-box a').each(function(element) {
                                            Event.observe(element, 'click',
                                                toggleRememberMepopup);
                                        });
                                    });
                                    //]]>
                                </script>
                                <p class="required">* Required Fields</p>
                            </div>
                        </div>
                    </div>
                    <div class="col2-set">
                        <div class="col-1 new-users">
                            <div class="buttons-set">
                                <button type="button" title="Create an Account" class="button" onclick="window.location='http://www.portotheme.com/magento/porto/index.php/demo4_en/customer/account/create/';"><span><span>Create
                                            an Account</span></span></button>
                            </div>
                        </div>
                        <div class="col-2 registered-users">
                            <div class="buttons-set">
                                <a href="http://www.portotheme.com/magento/porto/index.php/demo4_en/customer/account/forgotpassword/" class="f-left">Forgot Your Password?</a>
                                <button type="submit" class="button" title="Login" name="send" id="send2"><span><span>Login</span></span></button>
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