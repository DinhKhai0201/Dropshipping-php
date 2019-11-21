<?php include_once 'views/layout/' . $this->layout . 'top.php'; ?>
<!-- start container -->
<div class="top-container">
    <div id="slideshow">
        <div class="container" style="padding:26px 15px 15px;">
            <div class="row" style="margin:0 -10px;">
                <div class="col-lg-9 lg-order-12" style="padding:0 10px;">
                    <div id="banner-slider-demo-4" class="owl-carousel owl-theme owl-bottom-narrow owl-banner-carousel sm-xs-margin-bottom">
                        <div class="item" style="border-radius:1px;overflow:hidden;">
                            <img src="<?php echo RootREL; ?>media/wysiwyg/porto/homepage/slider/04/slide1.jpg" alt="" />
                            <div class="content content-slide-1" style="position:absolute;z-index:1;top:23%;left:8%;text-align:left;">
                                <span style="color: #fff;font-size:18px;">Get up to <b style="font-size:26px;font-family:'Oswald';">60%</b> off</span>
                                <h2 style="color: #fff;">Summer Sale</h2>
                                <p style="font-size:14px;color:#fff;font-weight:300;">Limited items
                                    available at this price.</p>
                                <a href="<?php echo (vendor_app_util::url(["ctl" => "categories", "act" => ""])) ?>" class="btn btn-default" style="background-color:#010204;color:#fff;font-family:'Oswald';font-size:14px;letter-spacing:0.025em;font-weight:400;">shop
                                    now</a>
                            </div>
                        </div>
                        <div class="item" style="border-radius:1px;overflow:hidden;">
                            <img src="<?php echo RootREL; ?>media/wysiwyg/porto/homepage/slider/04/slide2.jpg" alt="" />
                            <div class="content content-slide-2" style="position:absolute;z-index:1;top:23%;left:8%;text-align:left;">
                                <span style="color: #2c373c;font-size:18px;">OVER <b style="font-size:26px;font-family:'Oswald';">200+</b></span>
                                <h2 style="color: #2c373c;">GREAT DEALS</h2>
                                <p style="font-size:14px;color:#585b5f;font-weight:300;">While they last!
                                </p>
                                <a href="<?php echo (vendor_app_util::url(["ctl" => "categories", "act" => ""])) ?>" class="btn btn-default" style="background-color:#010204;color:#fff;font-family:'Oswald';font-size:14px;letter-spacing:0.025em;font-weight:400;">shop
                                    now</a>
                            </div>
                        </div>
                        <div class="item" style="border-radius:1px;overflow:hidden;">
                            <img src="<?php echo RootREL; ?>media/wysiwyg/porto/homepage/slider/04/slide3.jpg" alt="" />
                            <div class="content content-slide-3" style="position:absolute;z-index:1;top:23%;left:8%;text-align:left;">
                                <span style="color: #2c373c;font-size:18px;">up to <b style="font-size:26px;font-family:'Oswald';">40%</b> off</span>
                                <h2 style="color: #2c373c;">NEW ARRIVALS</h2>
                                <p style="font-size:14px;color:#585b5f;font-weight:300;">Starting at $9</p>
                                <a href="<?php echo (vendor_app_util::url(["ctl" => "categories", "act" => ""])) ?>" class="btn btn-default" style="background-color:#010204;color:#fff;font-family:'Oswald';font-size:14px;letter-spacing:0.025em;font-weight:400;">shop
                                    now</a>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        jQuery(function($) {
                            $("#banner-slider-demo-4").owlCarousel({
                                autoPlay: true,
                                lazyLoad: true,
                                stopOnHover: true,
                                pagination: true,
                                autoPlay: true,
                                navigation: false,
                                slideSpeed: 500,
                                paginationSpeed: 500,
                                singleItem: true
                            });
                        });
                    </script>
                </div>
                <div class="col-lg-3" style="padding:0 10px;">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="side-custom-menu" style="margin-bottom:11px;">
                                <h2 style="font-size:14px;letter-spacing:0.01em;color:#465157;font-weight:700;">
                                    <a href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'categories')); ?>"> TOP CATEGORIES<a></h2>
                                <ul>
                                    <?php foreach ($this->categories as $category) { ?>
                                        <li id="category-<?= $category['id'] ?>"><a href=""> <?= $category['categoryName'] ?></a></li>
                                    <?php }  ?>

                                </ul>
                                <div class="action">
                                    <a href="#" class="btn btn-default">HUGE SALE - 70% Off</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="background-color:#f4f4f4;margin-bottom: 27px;">
            <div class="container">
                <div class="homepage-bar" style="margin:0;">
                    <div class="row">
                        <div class="col-lg-4" style="text-align:left;">
                            <i class="fa fa-truck" aria-hidden="true" style="font-size:35px;"></i>
                            <div class="text-area">
                                <h3>FREE SHIPPING & RETURN</h3>
                                <p>Free shipping on all orders over $99.</p>
                            </div>
                        </div>
                        <div class="col-lg-4" style="text-align:center;">
                            <i class="fa fa-usd" aria-hidden="true" style="font-size:37px;"></i>
                            <div class="text-area">
                                <h3>MONEY BACK GUARANTEE</h3>
                                <p>100% money back guarantee.</p>
                            </div>
                        </div>
                        <div class="col-lg-4" style="text-align:center;">
                            <i class="fa fa-phone" aria-hidden="true" style="font-size:37px;"></i>
                            <div class="text-area">
                                <h3>ONLINE SUPPORT 24/7</h3>
                                <p>Lorem ipsum dolor sit amet.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row" style="padding-bottom:10px;margin:0 -10px;">
                <div class="col-md-3 col-6" style="padding:0 10px;padding-bottom:20px;">
                    <div style="margin-bottom:15px;">
                        <a class="image-link" href="#"><img src="<?php echo RootREL; ?>media/wysiwyg/porto/homepage/slider/04/image01.jpg" alt="" /></a>
                    </div>
                    <div style="margin-bottom:15px;">
                        <a class="image-link" href="#"><img src="<?php echo RootREL; ?>media/wysiwyg/porto/homepage/slider/04/image02.jpg" alt="" /></a>
                    </div>
                    <div style="margin-bottom:0px;">
                        <a class="image-link" href="#"><img src="<?php echo RootREL; ?>media/wysiwyg/porto/homepage/slider/04/image03.jpg" alt="" /></a>
                    </div>
                </div>
                <div class="col-md-3 col-6 md-order-12" style="padding:0 10px;padding-bottom:20px;">
                    <div style="margin-bottom:15px;">
                        <a class="image-link" href="#"><img src="<?php echo RootREL; ?>media/wysiwyg/porto/homepage/slider/04/image11.jpg" alt="" /></a>
                    </div>
                    <div style="margin-bottom:15px;">
                        <a class="image-link" href="#"><img src="<?php echo RootREL; ?>media/wysiwyg/porto/homepage/slider/04/image12.jpg" alt="" /></a>
                    </div>
                    <div style="margin-bottom:0px;">
                        <a class="image-link" href="#"><img src="<?php echo RootREL; ?>media/wysiwyg/porto/homepage/slider/04/image13.jpg" alt="" /></a>
                    </div>
                </div>
                <div class="col-md-6" style="padding:0 10px;padding-bottom:20px;">
                    <div style="margin-bottom:28px;">
                        <a class="image-link" href="#"><img src="<?php echo RootREL; ?>media/wysiwyg/porto/homepage/slider/04/image21.jpg" alt="" /></a>
                    </div>
                    <div style="margin-bottom:28px;">
                        <a class="image-link" href="#"><img src="<?php echo RootREL; ?>media/wysiwyg/porto/homepage/slider/04/image22.jpg" alt="" /></a>
                    </div>
                    <div style="margin-bottom:0px;">
                        <a class="image-link" href="#"><img src="<?php echo RootREL; ?>media/wysiwyg/porto/homepage/slider/04/image23.jpg" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <style>
            #banner-slider-demo-4 .content h2 {
                font-size: 44px;
                font-weight: 900;
                letter-spacing: -0.025em;
                text-transform: uppercase;
                line-height: 38px;
                margin-bottom: 10px;
            }

            #banner-slider-demo-4 .content span {
                font-size: 18px;
                line-height: 38px;
                font-weight: 700;
                text-transform: uppercase;
            }

            #banner-slider-demo-4 .content p {
                font-size: 14px;
                font-weight: 300;
                margin-bottom: 10;
            }

            #banner-slider-demo-4 .content .btn-default {
                font-size: 14px;
                line-height: 25px;
                letter-spacing: 0.025em;
                padding: 10px 34px;
                border-radius: 3px;
                background-color: #010204;
                color: #fff;
                font-family: 'Oswald';
                text-transform: uppercase;
                margin-top: 28px;
            }

            @media(max-width:767px) {
                #banner-slider-demo-4 .owl-controls {
                    display: none !important;
                }

                #banner-slider-demo-4 .content {
                    top: 15% !important;
                }

                #banner-slider-demo-4 .content h2 {
                    font-size: 24px;
                    line-height: 1;
                    margin-bottom: 5px;
                }

                #banner-slider-demo-4 .content span {
                    font-size: 11px !important;
                    line-height: 23px;
                }

                #banner-slider-demo-4 .content span b {
                    font-size: 15px !important;
                }

                #banner-slider-demo-4 .content p {
                    font-size: 11px !important;
                    margin-bottom: 10px;
                }

                #banner-slider-demo-4 .content .btn-default {
                    font-size: 10px !important;
                    line-height: 20px;
                    padding: 3px 13px;
                    border-radius: 3px;
                    margin-top: 0px;
                }
            }
        </style>
    </div>
</div>
<div class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
            <div class="std">
                <h2 class="filter-title" style="margin-top:24px;"><span class="content"><strong>Best Selling</strong></span></h2>
                <div id="new_product" class="owl-top-narrow">
                    <div class="filter-products category-products">
                        <div class="products products-grid owl-carousel">
                            <?php foreach ($this->products as $product) { ?>
                                <div class="item">
                                    <div class="item-area type3">
                                        <div class="product-image-area">
                                            <div class="loader-container">
                                                <div class="loader">
                                                    <i class="ajax-loader medium animate-spin"></i>
                                                </div>
                                            </div>
                                            <a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "quickview/" . $product['slug'] . "-" . $product['id']])) ?>" class="quickview-icon  quickview" id="product-<?php echo $product['id']; ?>" product_id="<?php echo $product['id']; ?>"><i class="icon-export"></i><span>Quick
                                                    View</span></a>
                                            <a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "view/" . $product['slug'] . "-" . $product['id']])) ?>" title="<?php echo $product['name']; ?>" class="product-image">
                                                <img class="defaultImage porto-lazyload" data-src="<?php echo RootREL . 'media/upload/products/' . $product['oneImage']; ?>" width="250" height="250" />
                                                <img class="hoverImage" src="<?php echo RootREL . 'media/upload/products/' . $product['oneImage']; ?>" width="250" height="250" alt="IdeaPad" />
                                            </a>

                                            <div class="product-label" style="right: 10px; "><span class="new-product-icon">Hot</span></div>
                                           
                                        </div>
                                        <div class="details-area">
                                            <h2 class="product-name"><a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "view/" . $product['slug'] . "-" . $product['id']])) ?>" title="<?php echo $product['name']; ?>"><?php echo $product['name']; ?></a></h2>
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating" style="width:0"></div>
                                                </div>
                                            </div>
                                            <div class="price-box">
                                                <span class="regular-price" id="product-price-<?= $product['id']?>">
                                                    <span class="price"><?php echo "$" . $product['price']; ?></span> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php }  ?>
                        </div>
                    </div>

                </div>
                <script type="text/javascript">

                </script>

                <script type="text/javascript">
                    jQuery(function($) {
                      
                        $("#new_product .filter-products .owl-carousel").owlCarousel({
                            lazyLoad: true,
                            itemsCustom: [
                                [0, 2],
                                [320, 2],
                                [480, 2],
                                [768, 3],
                                [992, 4],
                                [1280, 5]
                            ],
                            responsiveRefreshRate: 50,
                            slideSpeed: 200,
                            paginationSpeed: 500,
                            scrollPerPage: false,
                            stopOnHover: true,
                            rewindNav: true,
                            rewindSpeed: 600,
                            pagination: true,
                            navigation: false,
                            autoPlay: true,
                            navigationText: ["<i class='icon-left-open'></i>",
                                "<i class='icon-right-open'></i>"
                            ]
                        });
                    });
                </script>
                <style>
                    .main-container {
                        background-color: #f4f4f4;
                        margin-top: 48px;
                        padding-bottom: 20px;
                    }
                </style>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo RootREL; ?>media/js/products/addtocart.js"></script>

<!-- start foooter -->
<?php include_once 'views/layout/' . $this->layout . 'footer.php'; ?>