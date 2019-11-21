 <?php $navbar = $this->cart_popup();?>
 <div class="header-container type3 header-newskin">
     <div class="top-links-container">
         <div class="top-links container">
             <div class="top-links-inner">
                 <div class="form-currency top-select">
                     <div class="contact" style="color:white;display: block;float: left;font-size: 11px;line-height: 26px;margin-left: 5px;">
                         <span>
                             <i class="fas fa-phone"></i>
                             <span>Hotline: 0123.456.789 - 0987.654.321</span>
                         </span>
                         <span>
                             <i class="far fa-envelope"></i>
                             <span>contact@dropshipping.com</span>
                         </span>
                     </div>
                 </div>
                 <span class="split"></span>

                 <span class="split"></span>
                
                 <div class="top-links-area">
                     <div class="top-links-icon">
                         <a href="javascript:void(0)">Menu</a>
                     </div>
                     <ul class="links">
                         <li class="first"><a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'account')) ?>" title="My Account">My Account</a></li>
                         <li><a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'wishlist')); ?>" title="My Wishlist">(<span class="no_wishlist"><?= $navbar['nowishlist'] ?></span>)My Wishlist</a></li>
                         <?php if (isset($_SESSION['user'])) { ?>
                             <li class=" last"><a href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'login', 'act' => 'logout')); ?>" title="Log In">Log out</a></li>
                         <?php } else { ?>
                             <li class=" last"><a href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'login')); ?>" title="Log In">Log In</a></li>
                         <?php } ?>
                     </ul>
                 </div>
                 <p class="welcome-msg">Welcome <?php if (isset($_SESSION['user'])) {
                                                    echo "," . $_SESSION['user']['firstname'];
                                                } ?></p>
                 <div class="clearer"></div>
             </div>
         </div>
     </div>
     <div class="header container">
         <h1 class="logo"><strong>Drop Shipping</strong><a href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => '')); ?>" title="DropShipping Commerce" class="logo"><img src="<?php echo RootREL; ?>media/skin/frontend/smartwave/porto/images/logo_white_new.png" alt="Magento Commerce" /></a></h1>
         <div class="cart-area">
             <div class="custom-block"><i class="fas fa-phone" style="margin-right: 11px;font-size:30px;color:#40aee5;"></i><span style="margin-top:-2px;">CALL US
                     NOW<br><b style="color:#fff;font-size:18px;font-weight:600;display:block;line-height:27px;">+123
                         5678 890</b></span> </div>
             <div class="mini-cart">
                 <a href="javascript:void(0)" class="mybag-link"><span class="minicart-label">Cart</span><i class="fas fa-shopping-cart"></i><span class="cart-info"><span class="cart-qty"><?= $navbar['nocart'] ?></span><span>Item(s)</span></span></a>
                 <div class="topCartContent block-content theme-border-color" style="max-height:500px;overflow:hidden;overflow-y: scroll;">
                     <div class="inner-wrapper">

                         <?php if (isset($navbar['nocart']) && isset($_SESSION['user']) && $navbar['nocart'] > 0) { ?>
                             <?php foreach ($navbar['data'] as $key => $value) { ?>
                                 <ol class="mini-products-list item_<?= $value['id']; ?>">
                                     <li class="item">
                                         <div class="clearfix product-details">
                                             <div class="image-cart" style="margin-right: 20px;width: 40%;float: left;">
                                                 <span><a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "view/" . $value['products_slug'] . "-" . $value['product_id']])) ?>" title="<?= $value['products_name']; ?>" class="product-image"><img src="<?php echo RootREL . "media/upload/products/" . $value['image']; ?>" alt="<?= $value['products_name']; ?>"></a></span>
                                                 <div class="clearer"></div>

                                             </div>
                                             <div class="info-cart">
                                                 <p class="product-name">
                                                     <a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "view/" . $value['products_slug'] . "-" . $value['product_id']])) ?>">
                                                         <?= $value['products_name']; ?></a>
                                                 </p>

                                                 <p class="qty-price"><span class ="qty_cart_<?= $value['id']; ?>"><?= $value['quantity']; ?></span> X <span class="price">$<?= $value['price']; ?></span>
                                                 </p>
                                                 <a title="Remove This Item" price="<?= $value['price']; ?>" value="<?= $value['id']; ?>" class="btn-remove remove-cart"><i class="icon-cancel"></i></a>
                                             </div>
                                         </div>
                                         <div class="clearer"></div>
                                     </li>
                                 </ol>

                             <?php } ?>
                             <div class="totals">
                                 <span class="label">Total: </span>
                                 <span class="price-total"><span class="price getPrice"><?php $total = 0;
                                                                                            foreach ($navbar['data'] as $key => $value) {
                                                                                                $total += (intval($value['price']) * intval($value['quantity']));
                                                                                            }
                                                                                            echo "$" . $total; ?></span></span>
                             </div>
                             <div class="actions">
                                 <a class="btn btn-default" href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'checkout')); ?>"><i class="icon-basket"></i>View Cart</a>
                                 <div class="clearer"></div>
                             </div>

                         <?php } else { ?>
                             <p class="cart-empty">
                                 You have no items in your shopping cart. </p>
                         <?php } ?>
                     </div>
                 </div>
                 <script type="text/javascript">
                     jQuery(function($) {
                         $('.mini-cart').mouseover(function(e) {
                             $(this).children('.topCartContent').fadeIn(200);
                             return false;
                         }).mouseleave(function(e) {
                             $(this).children('.topCartContent').fadeOut(200);
                             return false;
                         });
                     });
                 </script>
             </div>
         </div>
         <div class="search-area-c">
             <a href="javascript:void(0);" class="fa search-icon search-mini"><i class="fas fa-search"></i></a>
             <form id="search_mini_form_c">
                 <div class="form-search ">
                     <label for="search">Search:</label>
                     <input id="search" type="text" name="s" class="input-text" />
                     <button type="submit" title="Search" class="button bt-search"><i class="fa fa-search" aria-hidden="true"></i></button>
                     <div class="clearer"></div>
                 </div>
             </form>
         </div>
         <div class="menu-icon"><a href="javascript:void(0)" title="Menu"><i class="fa fa-bars"></i></a>
         </div>
         <script>
             jQuery('.bt-search').click(function() {
                 try {
                     window.history.pushState('', '', rootUrl +
                         'categories/page-1.html'
                     );

                 } catch (err) {
                     window.history.pushState('', '', rootUrl +
                         'categories/page-1.html'
                     );

                 }
             });
         </script>
     </div>
     <div class="header-wrapper">
         <div class="main-nav">
             <div class="container">
                 <div class="menu-wrapper">
                     <div class="menu-all-pages-container">
                         <ul class="menu">

                             <li class="">
                                 <a href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => '')); ?>"><span>Home</span></a>
                             </li>
                             <li class="menu-static-width">
                                 <a href=""><span>Categories</span></a>
                                 <div class="nav-sublist-dropdown" style="display: none; list-style: none; width: 610px;">
                                     <div class="container">
                                         <div class="mega-columns row">
                                             <div class="block1 col-sm-8">
                                                 <div class="sw-row">
                                                     <ul>
                                                         <li class="menu-item menu-item-has-children menu-parent-item col-sw-2" style="list-style: none;">
                                                             <a class="level1" href="javascript:void(0)" style="pointer-events: none;"><span>Variations
                                                                     1</span></a>
                                                             <div class="nav-sublist level1">
                                                                 <ul>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href=""><span>Fullwidth
                                                                                 Banner</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href=""><span>Boxed
                                                                                 Slider Banner</span></a>
                                                                     </li>
                                                                 </ul>
                                                             </div>
                                                         </li>
                                                         <li class="menu-item menu-item-has-children menu-parent-item col-sw-2" style="list-style: none;">
                                                             <a class="level1" href="javascript:void(0)" style="pointer-events: none;"><span>Variations
                                                                     2</span></a>
                                                             <div class="nav-sublist level1">
                                                                 <ul>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href=""><span>Ajax
                                                                                 Infinite Scroll</span><span class="cat-label cat-label-label1">New</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href=""><span>3
                                                                                 Columns Products</span></a>
                                                                     </li>
                                                                  
                                                                 </ul>
                                                             </div>
                                                         </li>
                                                     </ul>
                                                 </div>
                                             </div>
                                             <div class="right-mega-block col-sm-4">
                                                 <a href="#"><img style="max-width:100%; width:100%;float:right;" src="<?php echo RootREL ?>media/wysiwyg/porto/homepage/menu-banner-static-width2.jpg" alt=""></a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </li>
                             <li class="menu-full-width">
                                 <a href=""><span>Products</span></a>
                                 <div class="nav-sublist-dropdown" style="display: none; list-style: none;">
                                     <div class="container">
                                         <div class="mega-columns row">
                                             <div class="block1 col-sm-8">
                                                 <div class="sw-row">
                                                     <ul>
                                                         <li class="menu-item menu-item-has-children menu-parent-item col-sw-3" style="list-style: none;">
                                                             <a class="level1" href="javascript:void(0)" style="pointer-events: none;"><span>Variations</span></a>
                                                             <div class="nav-sublist level1">
                                                                 <ul>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href=""><span>Horizontal
                                                                                 Thumbnails</span></a>
                                                                     </li>
                                                                    

                                                                 </ul>
                                                             </div>
                                                         </li>
                                                         <li class="menu-item menu-item-has-children menu-parent-item col-sw-3" style="list-style: none;">
                                                             <a class="level1" href="javascript:void(0)" style="pointer-events: none;"><span>Variations</span></a>
                                                             <div class="nav-sublist level1">
                                                                 <ul>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href=""><span>Moved
                                                                                 Tabs</span></a>
                                                                     </li>
                                                                  
                                                                 </ul>
                                                             </div>
                                                         </li>
                                                         <li class="menu-item menu-item-has-children menu-parent-item col-sw-3" style="list-style: none;">
                                                             <a class="level1" href="javascript:void(0)" style="pointer-events: none;"><span>Page
                                                                     Layout Types</span></a>
                                                             <div class="nav-sublist level1">
                                                                 <ul>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href=""><span>Default
                                                                                 Layout</span></a>
                                                                     </li>

                                                                 </ul>
                                                             </div>
                                                         </li>
                                                     </ul>
                                                 </div>
                                             </div>
                                             <div class="right-mega-block col-sm-4">
                                                 <a href="#"><img style="max-width:100%; width:100%;padding-right:10px;padding-top:9px;float:right;" src="<?php echo RootREL ?>media/wysiwyg/porto/homepage/menu-banner.jpg" alt=""></a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </li>
                             <li class="menu-item menu-item-has-children menu-parent-item ">
                                 <a href="javascript:void(0)"><span>Pages</span></a>
                                 <div class="nav-sublist-dropdown" style="display: none;">
                                     <div class="container">
                                         <ul>
                                             <li class="menu-item" style="list-style: none;">
                                                 <a class="level1" href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'introduce')); ?>"><span>Introduce
                                                        </span></a>
                                             </li>
                                             <li class="menu-item" style="list-style: none;">
                                                 <a class="level1" href="<?= vendor_app_util::url(array('area' => '', 'ctl' => 'about-us')) ?>"><span>About
                                                         Us</span></a>
                                             </li>
                                             <li class="menu-item" style="list-style: none;">
                                                 <a class="level1" href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'contact-us')); ?>"><span>Contact
                                                         </span></a>
                                             </li>
                                              <li class="menu-item" style="list-style: none;">
                                                 <a class="level1" href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'support')); ?>"><span>Support
                                                        </span></a>
                                             </li>
                                              <li class="menu-item" style="list-style: none;">
                                                 <a class="level1" href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'term-of-service')); ?>"><span>Term of Service
                                                         </span></a>
                                             </li>
                                            
                                             <li class="menu-item" style="list-style: none;">
                                                 <a class="level1" href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'checkout')); ?>"><span>Checkout</span></a>
                                             </li>
                                             <li class="menu-item" style="list-style: none;">
                                                 <a class="level1" href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'account')); ?>"><span>My
                                                         Account</span></a>
                                             </li>
                                         </ul>
                                     </div>
                                 </div>
                             </li>
                          
                         </ul>
                     </div>
                 </div>
             </div>
         </div>

     </div>

     <script type="text/javascript">
         var SW_MENU_POPUP_WIDTH = 0;
         jQuery(function($) {
             $(document).ready(function() {
                 $('.main-nav .menu').et_menu({
                     type: "default",
                     delayTime: 0
                 });
             });
         });
     </script>
 </div>
 <div class="mobile-nav side-block container">
     <span class="close-sidebar-menu"><i class="fas fa-times"></i></span>
     <div class="menu-all-pages-container">
         <ul class="menu">

             <li class="menu-item">
                 <a href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => '')); ?>"><span>Home</span></a>
             </li>
             <li class="menu-item menu-item-has-children menu-parent-item">
                 <a href=""><span>Categories</span></a>
                 <ul>
                     <li class="menu-item " style="list-style: none;">
                         <a class="level2" href=""><span>Fullwidth
                                 Banner</span></a>
                     </li>
                  
                 </ul>
             </li>
             <li class="menu-item menu-item-has-children menu-parent-item">
                 <a href=""><span>Products</span></a>
                 <ul>
                     <li class="menu-item menu-item-has-children menu-parent-item" style="list-style: none;">
                         <a class="level1" href="javascript:void(0)"><span>Variations</span></a>
                         <ul>
                             <li class="menu-item " style="list-style: none;">
                                 <a class="level2" href=""><span>Horizontal
                                         Thumbnails</span></a>
                             </li>

                         </ul>
                     </li>
                     <li class="menu-item menu-item-has-children menu-parent-item" style="list-style: none;">
                         <a class="level1" href="javascript:void(0)"><span>Variations</span></a>
                         <ul>
                             <li class="menu-item " style="list-style: none;">
                                 <a class="level2" href=""><span>Moved
                                         Tabs</span></a>
                             </li>
                         </ul>
                     </li>
                     <li class="menu-item menu-item-has-children menu-parent-item" style="list-style: none;">
                         <a class="level1" href="javascript:void(0)"><span>Product Layout Types</span></a>
                         <ul>
                             <li class="menu-item " style="list-style: none;">
                                 <a class="level2" href=""><span>Default
                                         Layout</span></a>
                             </li>
                         </ul>
                     </li>
                 </ul>
             </li>
             <li class="menu-item menu-item-has-children menu-parent-item ">
                 <a href="javascript:void(0)"><span>Pages</span></a>
                 <ul>
                    <li class="menu-item" style="list-style: none;">
                        <a class="level1" href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'introduce')); ?>"><span>Introduce
                            </span></a>
                    </li>
                    <li class="menu-item" style="list-style: none;">
                        <a class="level1" href="<?= vendor_app_util::url(array('area' => '', 'ctl' => 'about-us')) ?>"><span>About
                                Us</span></a>
                    </li>
                    <li class="menu-item" style="list-style: none;">
                        <a class="level1" href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'contact-us')); ?>"><span>Contact
                                </span></a>
                    </li>
                    <li class="menu-item" style="list-style: none;">
                        <a class="level1" href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'support')); ?>"><span>Support
                            </span></a>
                    </li>
                    <li class="menu-item" style="list-style: none;">
                        <a class="level1" href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'term-of-service')); ?>"><span>Term of Service
                                </span></a>
                    </li>
                
                    <li class="menu-item" style="list-style: none;">
                        <a class="level1" href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'checkout')); ?>"><span>Checkout</span></a>
                    </li>
                    <li class="menu-item" style="list-style: none;">
                        <a class="level1" href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'account')); ?>"><span>My
                                Account</span></a>
                    </li>
                </ul>
             </li>
            
         </ul>
     </div>
     <div class="custom-block">
         <div class="social-icons">
             <a href="https://www.facebook.com/" title="Facebook" target="_blank">
                 <i class="fab fa-facebook"></i>
             </a>
             <a href="https://twitter.com/" title="Twitter" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a>
             <a href="https://instagram.com/" title="Linkedin" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a>
         </div>
     </div>
 </div>
 <div class="mobile-nav-overlay close-mobile-nav"></div>
 <script type="text/javascript">
     jQuery(function($) {
         $('.search-mini').click(function() {
             $('#search_mini_form_c').toggle('slow');
         });
     });
 </script>
 <!-- 
  end navbar
 -->
 <?php
    global $obMediaFiles;
    global $enableOB;
    $enableOB = true;
    ?>