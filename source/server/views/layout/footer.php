            <div class="footer-container ">
                <div class="footer">
                    <div class="footer-middle">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="block">
                                        <div class="block-title"><strong><span>Contact Information</span></strong></div>
                                        <div class="block-content">
                                            <ul class="contact-info" style="padding-top: 7px;">
                                                <li>
                                                    <p><b style="color: #fff;text-transform:uppercase;">Address</b><br />123
                                                        Street Name, City, Da Nang</p>
                                                </li>
                                                <li>
                                                    <p><b style="color: #fff;text-transform:uppercase;">Phone</b><br />(123)
                                                        456-7890</p>
                                                </li>
                                                <li>
                                                    <p><b style="color: #fff;text-transform:uppercase;">Email</b><br /><a href="mailto:mail@example.com">mail@example.com</a></p>
                                                </li>
                                                <li>
                                                    <p><b style="color: #fff;text-transform:uppercase;">Working
                                                            Days/Hours</b><br />Mon - Sun / 9:00AM - 8:00PM</p>
                                                </li>
                                            </ul>
                                            <div class="social-icons" style="float:left;margin-top: 15px;">
                                                <a href="https://www.facebook.com/" title="Facebook" target="_blank"><i class="fab fa-facebook"></i></a>
                                                <a href="https://twitter.com/" title="Twitter" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                                <a href="https://instagram.com/" title="Instagram" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="block" style="margin-bottom: 20px;">
                                                <div class="block-title"><strong><span>BE THE FIRST TO
                                                            KNOW</span></strong></div>
                                                <div class="block-content">
                                                    <p>Get all the latest information on Events, Sales and
                                                        Offers.<br>Sign up for newsletter today.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="block-content" style="margin-top: 33px;margin-bottom: 37px;width:100%;float:right;">
                                                <form action="" method="post" id="home-footer-newsletter-validate-detail" onsubmit="setNewsletterCookie()">
                                                    <div class="input-box">
                                                        <input type="text" name="email" id="newsletter-footer" title="Sign up for our newsletter" class="input-text required-entry validate-email" placeholder="Email Address" />
                                                        <button type="submit" title="Subscribe" class="button"><span><span>Subscribe</span></span></button>
                                                        <div class="clearer"></div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="block-bottom">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="block">
                                                            <div class="block-title"><strong><span>MY
                                                                        ACCOUNT</span></strong></div>
                                                            <div class="block-content">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <ul class="links">
                                                                            <li><a href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'about-us')); ?>" title="About us">About us</a></li>
                                                                            <li><a href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'contact-us')); ?>" title="Contact Us">Contact us</a>
                                                                            </li>
                                                                            <li><a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'account')); ?>" title="My Account">My Account</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <ul class="links">
                                                                            <li><a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'order')); ?>" title="Order history">Order
                                                                                    history</a></li>

                                                                            <li><a href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'login')); ?>" title="Login">Login</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-bottom">
                        <div class="container">
                            <div class="custom-block f-right"><img src="<?php echo RootREL; ?>media/wysiwyg/smartwave/footer/payment-icon.png" alt="" /></div>
                            <address>© PSCD. 2019. All Rights Reserved</address>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" id="totop"><i class="fas fa-chevron-up"></i></a>
          
            <style type="text/css">
                #newsletter_popup {
                    width: 700px;
                    height: 320px;
                }
            </style>
            <div class="block block-subscribe" id="newsletter_popup">
                <form action="" method="post" id="newsletter-popup-validate-detail">
                    <div class="block-content">
                        <img src="skin/frontend/smartwave/porto/images/logo.png" alt="" />
                        <h2>BE THE FIRST TO KNOW</h2>
                        <p>Subscribe to the Porto eCommerce newsletter to receive timely updates from your favorite
                            products.</p>
                        <div class="input-box">
                            <input type="text" name="email" id="newsletter_popup_email" title="Sign up for our newsletter" class="input-text required-entry validate-email" placeholder="Email Address" />
                            <button type="submit" title="Go!" class="button"><span><span>Go!</span></span></button>
                            <div class="clearer"></div>
                        </div>
                </form>
                <div class="subscribe-bottom">
                    <input type="checkbox" id="newsletter_popup_dont_show_again" />
                    <label for="newsletter_popup_dont_show_again">Don't show this popup again</label>
                </div>
            </div>
            <script src="<?php echo RootREL; ?>media/js/products/removecartpopup.js"></script>
            <script src="<?php echo RootREL; ?>media/js/footer/footer.js"></script>
            </div>
            </div>
            <?php
            if ($enableOB) {
                ob_end_flush();
            }
            echo vendor_html_helper::_jsFooter();
            ?>
            </body>

            </html>