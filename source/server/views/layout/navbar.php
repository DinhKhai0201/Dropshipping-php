 <div class="header-container type3 header-newskin">
     <div class="top-links-container">
         <div class="top-links container">
             <div class="top-links-inner">
                 <div class="form-currency top-select">
                     <select id="select-currency" name="currency" title="Select Your Currency" onchange="setLocation(this.value)">
                         <option value="http://www.portotheme.com/magento/porto/index.php/demo4_en/directory/currency/switch/currency/EUR/uenc/aHR0cHM6Ly93d3cucG9ydG90aGVtZS5jb20vbWFnZW50by9wb3J0by9kZW1vNF9lbg,,/">
                             EUR
                         </option>
                         <option value="http://www.portotheme.com/magento/porto/index.php/demo4_en/directory/currency/switch/currency/USD/uenc/aHR0cHM6Ly93d3cucG9ydG90aGVtZS5jb20vbWFnZW50by9wb3J0by9kZW1vNF9lbg,,/" selected="selected">
                             USD
                         </option>
                     </select>
                     <script type="text/javascript">
                         (function($) {
                             $("#select-currency").selectbox();
                         })(jQuery);
                     </script>
                 </div>
                 <span class="split"></span>
                 <div class="form-language top-select">
                     <select id="select-language" title="Your Language" onchange="window.location.href=this.value" style="width:auto;">
                         <option value="http://www.portotheme.com/magento/porto/index.php/demo4_en/?___from_store=demo4_en" data-image="<?php echo RootREL; ?>media/skin/frontend/smartwave/porto/images/flags/demo4_en.png" selected="selected">English</option>
                         <option value="http://www.portotheme.com/magento/porto/index.php/demo4_sa/?___from_store=demo4_en" data-image="<?php echo RootREL; ?>media/skin/frontend/smartwave/porto/images/flags/demo4_sa.png">
                             Arabic
                         </option>
                     </select>
                     <script type="text/javascript">
                         (function($) {
                             $("#select-language").selectbox();
                         })(jQuery);
                     </script>
                 </div>
                 <span class="split"></span>
                 <div class="compare-link">
                     <a href="javascript:void(0)" onclick="popWin('http://www.portotheme.com/magento/porto/index.php/demo4_en/catalog/product_compare/index/uenc/aHR0cHM6Ly93d3cucG9ydG90aGVtZS5jb20vbWFnZW50by9wb3J0by9kZW1vNF9lbg,,/','compare','top:0,left:0,width=820,height=600,resizable=yes,scrollbars=yes')"><i class="icon-compare-link"></i>Compare (0)</a>
                     <div class="compare-popup theme-border-color">
                         <p class="empty">You have no items to compare.</p>
                     </div>
                 </div>
                 <div class="top-links-area">
                     <div class="top-links-icon">
                         <a href="javascript:void(0)">links</a>
                     </div>
                     <ul class="links">
                         <li class="first"><a href="http://www.portotheme.com/magento/porto/index.php/demo4_en/customer/account/" title="My Account">My Account</a></li>
                         <li><a href="http://www.portotheme.com/magento/porto/index.php/demo4_en/dailydeal/" title="Daily deal">Daily deal</a></li>
                         <li><a href="http://www.portotheme.com/magento/porto/index.php/demo4_en/wishlist/" title="My Wishlist">My Wishlist</a></li>
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
         <h1 class="logo"><strong>Drop Shipping</strong><a href="<?php echo vendor_app_util::url(array('ctl' => '')); ?>" title="DropShipping Commerce" class="logo"><img src="<?php echo RootREL; ?>media/skin/frontend/smartwave/porto/images/logo_white_new.png" alt="Magento Commerce" /></a></h1>
         <div class="cart-area">
             <div class="custom-block"><i class="fas fa-phone" style="margin-right: 11px;font-size:30px;color:#40aee5;"></i><span style="margin-top:-2px;">CALL US
                     NOW<br><b style="color:#fff;font-size:18px;font-weight:600;display:block;line-height:27px;">+123
                         5678 890</b></span> </div>
             <div class="mini-cart">
                 <a href="javascript:void(0)" class="mybag-link"><span class="minicart-label">Cart</span><i class="fas fa-shopping-cart"></i><span class="cart-info"><span class="cart-qty">0</span><span>Item(s)</span></span></a>
                 <div class="topCartContent block-content theme-border-color">
                     <div class="inner-wrapper">
                         <p class="cart-empty">
                             You have no items in your shopping cart. </p>
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
         <div class="search-area">
             <a href="javascript:void(0);" class="fa search-icon"><i class="fas fa-search"></i></a>
             <form id="search_mini_form" action="//www.portotheme.com/magento/porto/index.php/demo4_en/catalogsearch/result/" method="get">
                 <div class="form-search ">
                     <label for="search">Search:</label>
                     <input id="search" type="text" name="q" class="input-text" />
                     <select id="cat" name="cat">
                         <option value="">All Categories</option>
                         <option value="196">Fashion</option>
                         <option value="200">- Woman</option>
                         <option value="201">- Jewellery</option>
                         <option value="202">- Men</option>
                         <option value="203">- Kids Fashion</option>
                         <option value="197">Electronics</option>
                         <option value="198">Home & Garden</option>
                         <option value="307">Sports</option>
                         <option value="199">Motors</option>
                         <option value="218">- Cars and Trucks</option>
                         <option value="219">- Motorcycles & Powersports</option>
                         <option value="220">- Parts & Accessories</option>
                         <option value="221">- Auto Tools & Supplies</option>
                         <option value="308">Clothes</option>
                     </select>
                     <button type="submit" title="Search" class="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                     <div id="search_autocomplete" class="search-autocomplete"></div>
                     <div class="clearer"></div>
                 </div>
             </form>
             <script type="text/javascript">
                 //<![CDATA[
                 var searchForm = new Varien.searchForm('search_mini_form', 'search', 'Search...');
                 searchForm.initAutocomplete(
                     'http://www.portotheme.com/magento/porto/index.php/demo4_en/catalogsearch/ajax/suggest/',
                     'search_autocomplete');
                 //]]>
             </script>
         </div>
         <div class="menu-icon"><a href="javascript:void(0)" title="Menu"><i class="fa fa-bars"></i></a>
         </div>
     </div>
     <div class="header-wrapper">
         <div class="main-nav">
             <div class="container">
                 <div class="menu-wrapper">
                     <div class="menu-all-pages-container">
                         <ul class="menu">

                             <li class="">
                                 <a href="<?php echo vendor_app_util::url(array('ctl' => '')); ?>"><span>Home</span></a>
                             </li>
                             <li class="menu-static-width">
                                 <a href="http://www.portotheme.com/magento/porto/index.php/demo4_en/fashion.html/"><span>Categories</span></a>
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
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo5_en/electronics.html"><span>Fullwidth
                                                                                 Banner</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo5_old_en/fashion.html"><span>Boxed
                                                                                 Slider Banner</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo5_en/fashion.html"><span>Boxed
                                                                                 Image Banner</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo5_en/fashion.html"><span>Left
                                                                                 Sidebar</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo11_en/electronics/cameras.html"><span>Right
                                                                                 Sidebar</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo17_en/fashion.html"><span>Product
                                                                                 Flex Grid</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/porto-product-list-types/"><span>Product
                                                                                 List Item Types</span></a>
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
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo5_en/fashion.html"><span>Ajax
                                                                                 Infinite Scroll</span><span class="cat-label cat-label-label1">New</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo14_en/fashion.html"><span>3
                                                                                 Columns Products</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo5_en/fashion.html"><span>4
                                                                                 Columns Products</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo13_en/fashion.html"><span>5
                                                                                 Columns Products</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo16_en/fashion.html"><span>6
                                                                                 Columns Products</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo13_old_en/fashion.html"><span>7
                                                                                 Columns Products</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo13_old_en/electronics.html"><span>8
                                                                                 Columns Products</span></a>
                                                                     </li>
                                                                 </ul>
                                                             </div>
                                                         </li>
                                                     </ul>
                                                 </div>
                                             </div>
                                             <div class="right-mega-block col-sm-4">
                                                 <a href="#"><img style="max-width:100%; width:100%;float:right;" src="http://www.portotheme.com/magento/porto/media/wysiwyg/porto/megamenu/menu-banner-static-width2.jpg" alt=""></a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </li>
                             <li class="menu-full-width">
                                 <a href="http://www.portotheme.com/magento/porto/index.php/demo4_en/product-type-default.html/"><span>Products</span></a>
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
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo5_en/reason-logo-snapback.html"><span>Horizontal
                                                                                 Thumbnails</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/silver-porto-headset.html"><span>Vertical
                                                                                 Thumbnails</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo5_en/reason-logo-snapback.html"><span>Inner
                                                                                 Zoom</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo6_en/reason-logo-snapback.html"><span>Right
                                                                                 Side Zoom</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo10_en/fashion/matte-browline-sunglasses.html"><span>Addtocart
                                                                                 Sticky</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/silver-porto-headset.html"><span>Vertical
                                                                                 Tabs</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo9_en/fashion/men-sports-watch-m.html"><span>Accordion
                                                                                 Tabs</span></a>
                                                                     </li>
                                                                 </ul>
                                                             </div>
                                                         </li>
                                                         <li class="menu-item menu-item-has-children menu-parent-item col-sw-3" style="list-style: none;">
                                                             <a class="level1" href="javascript:void(0)" style="pointer-events: none;"><span>Variations</span></a>
                                                             <div class="nav-sublist level1">
                                                                 <ul>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo5_en/porto-evolution-headset-fullwidth.html"><span>Moved
                                                                                 Tabs</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo8_en/product-type-fullwidth.html"><span>Sticky
                                                                                 Tabs</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/classic-sunglasses.html/"><span>Simple
                                                                                 Product</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/faux-leather-high-top-sneakers.html/"><span>Configurable
                                                                                 Product</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/seiko-bundle.html/"><span>Bundle
                                                                                 Product</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/women-jewellery.html/"><span>Grouped
                                                                                 Product</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/sample-downloadable.html/"><span>Downloadable
                                                                                 Product</span></a>
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
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/product-type-default.html/"><span>Default
                                                                                 Layout</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/product-type-carousel.html/"><span>Extended
                                                                                 Layout</span><span class="cat-label cat-label-label1">New</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/product-type-fullwidth.html/"><span>Full
                                                                                 Width Layout</span><span class="cat-label cat-label-label1">New</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/product-type-grid.html/"><span>Grid
                                                                                 Images Layout</span><span class="cat-label cat-label-label1">New</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/product-type-sticky-left-right.html/"><span>Sticky
                                                                                 Both Side Info</span><span class="cat-label cat-label-label1">New</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/product-type-sticky-right.html/"><span>Sticky
                                                                                 Right Side Info</span><span class="cat-label cat-label-label1">New</span></a>
                                                                     </li>
                                                                     <li class="menu-item " style="list-style: none;">
                                                                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/product-type-wide-grid.html/"><span>Wide
                                                                                 Grid Layout</span><span class="cat-label cat-label-label1">New</span></a>
                                                                     </li>
                                                                 </ul>
                                                             </div>
                                                         </li>
                                                     </ul>
                                                 </div>
                                             </div>
                                             <div class="right-mega-block col-sm-4">
                                                 <a href="#"><img style="max-width:100%; width:100%;padding-right:10px;padding-top:9px;float:right;" src="http://www.portotheme.com/magento/porto/media/wysiwyg/porto/megamenu/menu-banner.jpg" alt=""></a>
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
                                                 <a class="level1" href="<?= vendor_app_util::url(array('area' => 0, 'ctl' => 'about-us')) ?>"><span>About
                                                         Us</span></a>
                                             </li>
                                             <li class="menu-item" style="list-style: none;">
                                                 <a class="level1" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/contacts/"><span>Contact
                                                         Us</span></a>
                                             </li>
                                             <li class="menu-item" style="list-style: none;">
                                                 <a class="level1" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/blog/"><span>Blog</span></a>
                                             </li>
                                             <li class="menu-item" style="list-style: none;">
                                                 <a class="level1" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/blog/post-format-image-gallery-2/"><span>Post</span></a>
                                             </li>
                                             <li class="menu-item" style="list-style: none;">
                                                 <a class="level1" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/checkout/cart/"><span>Shopping
                                                         Cart</span></a>
                                             </li>
                                             <li class="menu-item" style="list-style: none;">
                                                 <a class="level1" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/checkout/"><span>Checkout</span></a>
                                             </li>
                                             <li class="menu-item" style="list-style: none;">
                                                 <a class="level1" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/customer/account/"><span>My
                                                         Account</span></a>
                                             </li>
                                         </ul>
                                     </div>
                                 </div>
                             </li>

                             <li class="fl-right">
                                 <a href="http://www.portotheme.com/magento/porto/index.php/demo4_en/dailydeal/">Special
                                     Offer!</a>
                             </li>
                             <li class="fl-right">
                                 <a href="https://1.envato.market/j61Ob">Buy Porto!</a>
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
                 <a href="http://www.portotheme.com/magento/porto/index.php/demo4_en/"><span>Home</span></a>
             </li>
             <li class="menu-item menu-item-has-children menu-parent-item">
                 <a href="http://www.portotheme.com/magento/porto/index.php/demo4_en/fashion.html/"><span>Categories</span></a>
                 <ul>
                     <li class="menu-item " style="list-style: none;">
                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo5_en/electronics.html"><span>Fullwidth
                                 Banner</span></a>
                     </li>
                     <li class="menu-item " style="list-style: none;">
                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo5_old_en/fashion.html"><span>Boxed
                                 Slider Banner</span></a>
                     </li>
                     <li class="menu-item " style="list-style: none;">
                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo5_en/fashion.html"><span>Boxed
                                 Image Banner</span></a>
                     </li>
                     <li class="menu-item " style="list-style: none;">
                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo5_en/fashion.html"><span>Left
                                 Sidebar</span></a>
                     </li>
                     <li class="menu-item " style="list-style: none;">
                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo11_en/electronics/cameras.html"><span>Right
                                 Sidebar</span></a>
                     </li>
                     <li class="menu-item " style="list-style: none;">
                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo17_en/fashion.html"><span>Product
                                 Flex Grid</span></a>
                     </li>
                     <li class="menu-item " style="list-style: none;">
                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/porto-product-list-types/"><span>Product
                                 List Item Types</span></a>
                     </li>
                     <li class="menu-item " style="list-style: none;">
                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo5_en/fashion.html"><span>Ajax
                                 Infinite Scroll</span><span class="cat-label cat-label-label1">New</span></a>
                     </li>
                     <li class="menu-item " style="list-style: none;">
                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo14_en/fashion.html"><span>3
                                 Columns Products</span></a>
                     </li>
                     <li class="menu-item " style="list-style: none;">
                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo5_en/fashion.html"><span>4
                                 Columns Products</span></a>
                     </li>
                     <li class="menu-item " style="list-style: none;">
                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo13_en/fashion.html"><span>5
                                 Columns Products</span></a>
                     </li>
                     <li class="menu-item " style="list-style: none;">
                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo16_en/fashion.html"><span>6
                                 Columns Products</span></a>
                     </li>
                     <li class="menu-item " style="list-style: none;">
                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo13_old_en/fashion.html"><span>7
                                 Columns Products</span></a>
                     </li>
                     <li class="menu-item " style="list-style: none;">
                         <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo13_old_en/electronics.html"><span>8
                                 Columns Products</span></a>
                     </li>
                 </ul>
             </li>
             <li class="menu-item menu-item-has-children menu-parent-item">
                 <a href="http://www.portotheme.com/magento/porto/index.php/demo4_en/product-type-default.html/"><span>Products</span></a>
                 <ul>
                     <li class="menu-item menu-item-has-children menu-parent-item" style="list-style: none;">
                         <a class="level1" href="javascript:void(0)"><span>Variations</span></a>
                         <ul>
                             <li class="menu-item " style="list-style: none;">
                                 <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo5_en/reason-logo-snapback.html"><span>Horizontal
                                         Thumbnails</span></a>
                             </li>
                             <li class="menu-item " style="list-style: none;">
                                 <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/silver-porto-headset.html"><span>Vertical
                                         Thumbnails</span></a>
                             </li>
                             <li class="menu-item " style="list-style: none;">
                                 <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo5_en/reason-logo-snapback.html"><span>Inner
                                         Zoom</span></a>
                             </li>
                             <li class="menu-item " style="list-style: none;">
                                 <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo6_en/reason-logo-snapback.html"><span>Right
                                         Side Zoom</span></a>
                             </li>
                             <li class="menu-item " style="list-style: none;">
                                 <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo10_en/fashion/matte-browline-sunglasses.html"><span>Addtocart
                                         Sticky</span></a>
                             </li>
                             <li class="menu-item " style="list-style: none;">
                                 <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/silver-porto-headset.html"><span>Vertical
                                         Tabs</span></a>
                             </li>
                             <li class="menu-item " style="list-style: none;">
                                 <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo9_en/fashion/men-sports-watch-m.html"><span>Accordion
                                         Tabs</span></a>
                             </li>
                         </ul>
                     </li>
                     <li class="menu-item menu-item-has-children menu-parent-item" style="list-style: none;">
                         <a class="level1" href="javascript:void(0)"><span>Variations</span></a>
                         <ul>
                             <li class="menu-item " style="list-style: none;">
                                 <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo5_en/porto-evolution-headset-fullwidth.html"><span>Moved
                                         Tabs</span></a>
                             </li>
                             <li class="menu-item " style="list-style: none;">
                                 <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo8_en/product-type-fullwidth.html"><span>Sticky
                                         Tabs</span></a>
                             </li>
                             <li class="menu-item " style="list-style: none;">
                                 <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/classic-sunglasses.html/"><span>Simple
                                         Product</span></a>
                             </li>
                             <li class="menu-item " style="list-style: none;">
                                 <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/faux-leather-high-top-sneakers.html/"><span>Configurable
                                         Product</span></a>
                             </li>
                             <li class="menu-item " style="list-style: none;">
                                 <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/seiko-bundle.html/"><span>Bundle
                                         Product</span></a>
                             </li>
                             <li class="menu-item " style="list-style: none;">
                                 <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/women-jewellery.html/"><span>Grouped
                                         Product</span></a>
                             </li>
                             <li class="menu-item " style="list-style: none;">
                                 <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/sample-downloadable.html/"><span>Downloadable
                                         Product</span></a>
                             </li>
                         </ul>
                     </li>
                     <li class="menu-item menu-item-has-children menu-parent-item" style="list-style: none;">
                         <a class="level1" href="javascript:void(0)"><span>Product Layout Types</span></a>
                         <ul>
                             <li class="menu-item " style="list-style: none;">
                                 <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/product-type-default.html/"><span>Default
                                         Layout</span></a>
                             </li>
                             <li class="menu-item " style="list-style: none;">
                                 <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/product-type-carousel.html/"><span>Extended
                                         Layout</span><span class="cat-label cat-label-label1">New</span></a>
                             </li>
                             <li class="menu-item " style="list-style: none;">
                                 <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/product-type-fullwidth.html/"><span>Full
                                         Width Layout</span><span class="cat-label cat-label-label1">New</span></a>
                             </li>
                             <li class="menu-item " style="list-style: none;">
                                 <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/product-type-grid.html/"><span>Grid
                                         Images Layout</span><span class="cat-label cat-label-label1">New</span></a>
                             </li>
                             <li class="menu-item " style="list-style: none;">
                                 <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/product-type-sticky-left-right.html/"><span>Sticky
                                         Both Side Info</span><span class="cat-label cat-label-label1">New</span></a>
                             </li>
                             <li class="menu-item " style="list-style: none;">
                                 <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/product-type-sticky-right.html/"><span>Sticky
                                         Right Side Info</span><span class="cat-label cat-label-label1">New</span></a>
                             </li>
                             <li class="menu-item " style="list-style: none;">
                                 <a class="level2" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/product-type-wide-grid.html/"><span>Wide
                                         Grid Layout</span><span class="cat-label cat-label-label1">New</span></a>
                             </li>
                         </ul>
                     </li>
                 </ul>
             </li>
             <li class="menu-item menu-item-has-children menu-parent-item ">
                 <a href="javascript:void(0)"><span>Pages</span></a>
                 <ul>
                     <li class="menu-item" style="list-style: none;">
                         <a class="level1" href="<?= vendor_app_util::url(array('area' => 0, 'ctl' => 'about-us')) ?>"><span>About
                                 Us</span></a>
                     </li>
                     <li class="menu-item" style="list-style: none;">
                         <a class="level1" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/contacts/"><span>Contact
                                 Us</span></a>
                     </li>
                     <li class="menu-item" style="list-style: none;">
                         <a class="level1" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/blog/post-format-image-gallery-2/"><span>Post</span></a>
                     </li>
                     <li class="menu-item" style="list-style: none;">
                         <a class="level1" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/checkout/cart/"><span>Shopping
                                 Cart</span></a>
                     </li>
                     <li class="menu-item" style="list-style: none;">
                         <a class="level1" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/checkout/"><span>Checkout</span></a>
                     </li>
                     <li class="menu-item" style="list-style: none;">
                         <a class="level1" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/customer/account/"><span>My
                                 Account</span></a>
                     </li>
                 </ul>
             </li>
             <li class="menu-item menu-item-has-children menu-parent-item ">
                 <a href="javascript:void(0)">Features</a>
                 <ul>
                     <li class="menu-item" style="list-style: none;">
                         <a class="level1" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/porto-header-types/"><span>Header
                                 Types</span></a>
                     </li>
                     <li class="menu-item" style="list-style: none;">
                         <a class="level1" href="http://www.portotheme.com/magento/porto/index.php/demo4_en/porto-footer-types/"><span>Footer
                                 Types</span></a>
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
 </script>
 <!-- 
  end navbar
 -->
 <?php
    global $obMediaFiles;
    global $enableOB;
    $enableOB = true;

    // array_push($obMediaFiles['js'], RootREL . "media/libs/jquery/jquery.min.js");
    // array_push($obMediaFiles['js'], RootREL . "media/js/navbar.js");
    ?>