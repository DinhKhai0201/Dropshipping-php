<?php include_once 'views/layout/' . $this->layout . 'header.php'; ?>
<?php foreach ($this->products as $product) { ?>

    <div class="main-container col1-layout">
        <div class="main container">
            <div class="col-main">

                <div id="messages_product_view"></div>
                <div class="product-view custom  ">
                    <div class="product-essential">
                        <form method="post" id="product_addtocart_form">
                            <input name="form_key" type="hidden" value="gRxWBEl2ZMe5EQyi" />
                            <input id="product_id" hidden value='<?php echo ($product['id']); ?>' />
                            <input id="product_image" hidden value='<?php echo RootREL . "media/upload/products/" . ($product['oneImage']); ?>' />
                            <input id="product_name" hidden value='<?php echo ($product['name']); ?>' />
                            <input id="product_price" hidden value='<?php echo ($product['price']); ?>' />
                            <input id="product_slug" hidden value='<?php echo ($product['slug']); ?>' />
                            <div class="no-display">
                                <input type="hidden" name="product" value="<?php echo $product['id']; ?>" />
                                <input type="hidden" name="related_product" id="related-products-field" value="" />
                            </div>
                            <div class="row">
                                <div class="product-img-box col-md-6 ">
                                    <ul id="etalage_ODAxYmI4NDJiZTcyOWIyODQ5ODQ0NjYyMzE0MTJkNmM">
                                        <?php foreach ($this->galleries as $gallery) { ?>
                                            <li>
                                                <a rel="gallery" class="fancy-images fancy-images_ODAxYmI4NDJiZTcyOWIyODQ5ODQ0NjYyMzE0MTJkNmM" href="<?php echo RootREL . "media/upload/products/" . $gallery['image']; ?>"><span class="glyphicon glyphicon-search"></span></a>
                                                <img class="etalage_thumb_image" src="<?php echo RootREL . "media/upload/products/" . $gallery['image']; ?>" alt="" />
                                                <img class="etalage_source_image" src="<?php echo RootREL . "media/upload/products/" . $gallery['image']; ?>" alt="" />
                                            </li>
                                        <?php } ?>
                                    </ul>

                                    <div class="etalage-control">
                                        <a href="javascript:void(0)" class="etalage-prev"><i class="fas fa-chevron-left"></i></a>
                                        <a href="javascript:void(0)" class="etalage-next"><i class="fas fa-chevron-right"></i></a>
                                    </div>
                                    <div class="product-view-zoom-area">
                                    </div>
                                    <script type="text/javascript">
                                        var zoom_enabled = false;
                                        var zoom_type = 0;
                                        jQuery(document).ready(function() {
                                            reloadEtalage();
                                            jQuery(".product-img-box .etalage li.etalage_thumb").zoom({
                                                touch: false
                                            });
                                            zoom_enabled = true;
                                            setTimeout(function() {
                                                reloadEtalage();
                                            }, 500);
                                            jQuery(window).resize(function(e) {
                                                reloadEtalage();
                                                var width = jQuery(this).width();
                                            });
                                            jQuery('.etalage-prev').on('click', function() {
                                                etalage_ODAxYmI4NDJiZTcyOWIyODQ5ODQ0NjYyMzE0MTJkNmM_previous();
                                            });
                                            jQuery('.etalage-next').on('click', function() {
                                                etalage_ODAxYmI4NDJiZTcyOWIyODQ5ODQ0NjYyMzE0MTJkNmM_next();
                                            });
                                            jQuery(
                                                "a.fancy-images_ODAxYmI4NDJiZTcyOWIyODQ5ODQ0NjYyMzE0MTJkNmM").fancybox();

                                            function reloadEtalage() {
                                                var src_img_width = 600;
                                                var src_img_height = "auto";
                                                var ratio_width = 600;
                                                var ratio_height = 600;
                                                var width, height, thumb_position, small_thumb_count;
                                                small_thumb_count = 4;
                                                width = jQuery(".product-view .product-img-box").width() -
                                                    8;
                                                height = "auto";
                                                thumb_position = "bottom";

                                                jQuery(
                                                        '#etalage_ODAxYmI4NDJiZTcyOWIyODQ5ODQ0NjYyMzE0MTJkNmM')
                                                    .etalage({
                                                        thumb_image_width: width,
                                                        thumb_image_height: height,
                                                        source_image_width: src_img_width,
                                                        source_image_height: src_img_height,
                                                        zoom_area_width: width,
                                                        zoom_area_height: height,
                                                        zoom_enable: false,
                                                        small_thumbs: small_thumb_count,
                                                        smallthumb_hide_single: false,
                                                        smallthumbs_position: thumb_position,
                                                        smallthumb_inactive_opacity: 1,
                                                        small_thumbs_width_offset: 0,
                                                        show_icon: false,
                                                        autoplay: false
                                                    });
                                                if (jQuery(window).width() < 768) {
                                                    var first_img = jQuery(
                                                        "#etalage_ODAxYmI4NDJiZTcyOWIyODQ5ODQ0NjYyMzE0MTJkNmM img.etalage_thumb_image"
                                                    ).first();
                                                    var tmp_img = jQuery('<img src="" alt=""/>');
                                                    tmp_img.attr("src", first_img.attr("src"));
                                                    tmp_img.unbind("load");
                                                    tmp_img.bind("load", function() {
                                                        jQuery(
                                                                "#etalage_ODAxYmI4NDJiZTcyOWIyODQ5ODQ0NjYyMzE0MTJkNmM")
                                                            .height(Math.round(width * this
                                                                .naturalHeight / this
                                                                .naturalWidth + 8) + "px");
                                                    });
                                                    jQuery(
                                                            '#etalage_ODAxYmI4NDJiZTcyOWIyODQ5ODQ0NjYyMzE0MTJkNmM')
                                                        .removeClass("vertical");
                                                    jQuery(
                                                            ".product-view .product-img-box li.etalage_thumb")
                                                        .css({
                                                            left: 0
                                                        });
                                                }
                                                var first_img = jQuery(
                                                    "#etalage_ODAxYmI4NDJiZTcyOWIyODQ5ODQ0NjYyMzE0MTJkNmM img.etalage_thumb_image"
                                                ).first();
                                                var tmp_img = jQuery('<img src="" alt=""/>');
                                                tmp_img.attr("src", first_img.attr("src"));
                                                tmp_img.unbind("load");
                                                tmp_img.bind("load", function() {
                                                    jQuery(
                                                            "#etalage_ODAxYmI4NDJiZTcyOWIyODQ5ODQ0NjYyMzE0MTJkNmM")
                                                        .height(Math.round(width * this
                                                            .naturalHeight / this.naturalWidth +
                                                            8) + "px");
                                                });
                                            }
                                        });
                                    </script>

                                    <script type="text/javascript">
                                        jQuery(document).ready(function() {
                                            ConfigurableMediaImages.init('base_image');
                                            ConfigurableMediaImages.setImageFallback(319, jQuery.parseJSON(
                                                '{"option_labels":{"black":{"configurable_product":{"small_image":null,"base_image":null},"products":["324","327"]},"grey":{"configurable_product":{"small_image":null,"base_image":null},"products":["325","328"]},"red":{"configurable_product":{"small_image":null,"base_image":null},"products":["326"]},"m":{"configurable_product":{"small_image":null,"base_image":null},"products":["324","328"]},"l":{"configurable_product":{"small_image":null,"base_image":null},"products":["325"]},"xl":{"configurable_product":{"small_image":null,"base_image":null},"products":["326"]},"2xl":{"configurable_product":{"small_image":null,"base_image":null},"products":["327"]}},"small_image":[],"base_image":{"319":"https:\/\/www.portotheme.com\/magento\/porto\/media\/catalog\/product\/cache\/1\/image\/600x\/17f82f742ffe127f42dca9de82fb58b1\/0\/3\/03_3_2.jpg"}}'
                                            ));
                                            jQuery(document).trigger('configurable-media-images-init',
                                                ConfigurableMediaImages);
                                        });
                                    </script>
                                </div>
                                <div class="product-shop col-md-6">
                                    <div class="product-name">
                                        <h1><?php echo $product['name']; ?></h1>
                                    </div>

                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div class="rating" style="width:0"></div>
                                        </div>
                                        <p class="rating-links">
                                            <a href="javascript:void(0)">0 Review(s)</a>
                                        </p>
                                    </div>
                                    <div class="short-description ">
                                        <h2>Quick Overview</h2>
                                        <div class="std"><?php echo $product['description']; ?></div>
                                    </div>
                                    <div class="product-info">
                                        <div>

                                            <p class="availability in-stock">Availability: <span>In stock</span>
                                            </p>



                                            <div class="price-box">
                                                <span class="regular-price" id="product-price-319">
                                                    <span class="price"><?php echo "$" . $product['price']; ?></span> </span>

                                            </div>


                                        </div>
                                        <script type="text/javascript">
                                            var dailydealTimeCounters = new Array();
                                            var i = 0;
                                        </script>
                                    </div>

                                    <div class="product-options" id="product-options-wrapper">

                                        <dl>
                                            <dt class="swatch-attr">
                                                <label id="color_label" class="required">
                                                    <em>*</em>Color:
                                                    <span id="select_label_color" class="select-label"></span>
                                                </label>
                                            </dt>
                                            <dd class="clearfix swatch-attr">
                                                <div class="input-box">
                                                    <select name="super_attribute[92]" id="attribute92" class="required-entry super-attribute-select no-display swatch-select">
                                                        <option>Choose an Option...</option>
                                                    </select>
                                                    <ul id="configurable_swatch_color" class="configurable-swatch-list clearfix">
                                                        <li class="option-black is-media" id="option27">
                                                            <a href="javascript:void(0)" name="black" id="swatch27" class="swatch-link swatch-link-92 has-image" title="Black" style="height: 32px; width: 32px;">
                                                                <span class="swatch-label" style="height: 30px; width: 30px; line-height: 30px;">
                                                                    <img src="https://www.portotheme.com/magento/porto/media/catalog/swatches/1/30x30/media/black.png" alt="Black" width="30" height="30" />
                                                                </span>
                                                                <span class="x">X</span>
                                                            </a>
                                                        </li>
                                                        <li class="option-grey is-media" id="option22">
                                                            <a href="javascript:void(0)" name="grey" id="swatch22" class="swatch-link swatch-link-92 has-image" title="Grey" style="height: 32px; width: 32px;">
                                                                <span class="swatch-label" style="height: 30px; width: 30px; line-height: 30px;">
                                                                    <img src="https://www.portotheme.com/magento/porto/media/catalog/swatches/1/30x30/media/grey.png" alt="Grey" width="30" height="30" />
                                                                </span>
                                                                <span class="x">X</span>
                                                            </a>
                                                        </li>
                                                        <li class="option-red is-media" id="option14">
                                                            <a href="javascript:void(0)" name="red" id="swatch14" class="swatch-link swatch-link-92 has-image" title="Red" style="height: 32px; width: 32px;">
                                                                <span class="swatch-label" style="height: 30px; width: 30px; line-height: 30px;">
                                                                    <img src="https://www.portotheme.com/magento/porto/media/catalog/swatches/1/30x30/media/red.png" alt="Red" width="30" height="30" />
                                                                </span>
                                                                <span class="x">X</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </dd>
                                            <dt class="swatch-attr">
                                                <label id="size_label" class="required">
                                                    <em>*</em>Size:
                                                    <span id="select_label_size" class="select-label"></span>
                                                </label>
                                            </dt>
                                            <dd class="clearfix swatch-attr last">
                                                <div class="input-box">
                                                    <select name="super_attribute[144]" id="attribute144" class="required-entry super-attribute-select no-display swatch-select">
                                                        <option>Choose an Option...</option>
                                                    </select>
                                                    <ul id="configurable_swatch_size" class="configurable-swatch-list clearfix">
                                                        <li class="option-m" id="option7">
                                                            <a href="javascript:void(0)" name="m" id="swatch7" class="swatch-link swatch-link-144" title="M" style="height: 32px; min-width: 32px;">
                                                                <span class="swatch-label" style="height: 30px; min-width: 30px; line-height: 30px;">
                                                                    M </span>
                                                                <span class="x">X</span>
                                                            </a>
                                                        </li>
                                                        <li class="option-l" id="option6">
                                                            <a href="javascript:void(0)" name="l" id="swatch6" class="swatch-link swatch-link-144" title="L" style="height: 32px; min-width: 32px;">
                                                                <span class="swatch-label" style="height: 30px; min-width: 30px; line-height: 30px;">
                                                                    L </span>
                                                                <span class="x">X</span>
                                                            </a>
                                                        </li>
                                                        <li class="option-xl" id="option5">
                                                            <a href="javascript:void(0)" name="xl" id="swatch5" class="swatch-link swatch-link-144" title="XL" style="height: 32px; min-width: 32px;">
                                                                <span class="swatch-label" style="height: 30px; min-width: 30px; line-height: 30px;">
                                                                    XL </span>
                                                                <span class="x">X</span>
                                                            </a>
                                                        </li>
                                                        <li class="option-2xl" id="option4">
                                                            <a href="javascript:void(0)" name="2xl" id="swatch4" class="swatch-link swatch-link-144" title="2XL" style="height: 32px; min-width: 32px;">
                                                                <span class="swatch-label" style="height: 30px; min-width: 30px; line-height: 30px;">
                                                                    2XL </span>
                                                                <span class="x">X</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </dd>
                                        </dl>
                                        <p class="required">* Required Fields</p>
                                    </div>
                                    <div class="clearer"></div>
                                    <script type="text/javascript">
                                        decorateGeneric($$('#product-options-wrapper dl'), ['last']);
                                    </script>
                                    <div class="product-options-bottom">



                                        <div class="price-box">
                                            <span class="regular-price" id="product-price-319_clone">
                                                <span class="price">$15.00</span> </span>

                                        </div>

                                        <div class="add-to-cart">
                                            <label for="qty">Qty:</label>
                                            <div class="qty-holder">
                                                <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty" />
                                                <div class="qty-changer">
                                                    <a style="font-size:18px;text-decoration:none;" href="javascript:void(0)" class="qty_inc">+</a>
                                                    <a style="font-size:24px;text-decoration:none;" href="javascript:void(0)" class="qty_dec">-</a>
                                                </div>
                                            </div>
                                            <button type="button" title="Add to Cart" class="button btn-cart"><span><span>Add to
                                                        Cart</span></span></button>
                                            <span id='ajax_loader' style='display:none'><i class="ajax-loader small animate-spin"></i></span>
                                        </div>
                                        <ul class="add-to-links">
                                            <li><a href="#" onclick="ajaxWishlist(this,'https://www.portotheme.com/magento/porto/index.php/demo1_en/wishlist/index/add/product/319/form_key/gRxWBEl2ZMe5EQyi/','319'); return false;" class="link-wishlist"><i class="icon-wishlist"></i><span>Add
                                                        to Wishlist</span></a></li>
                                            <li><a href="#" onclick="ajaxCompare(this,'https://www.portotheme.com/magento/porto/index.php/demo1_en/catalog/product_compare/add/product/319/uenc/aHR0cHM6Ly93d3cucG9ydG90aGVtZS5jb20vbWFnZW50by9wb3J0by9pbmRleC5waHAvZGVtbzFfZW4vY2F0ZWdvcmllcy9zdHJpcGUtdHJpbS1hdGhsZXRpYy1tZXNoLXRlZS5odG1sP19fX1NJRD1V/form_key/gRxWBEl2ZMe5EQyi/','319'); return false;" class="link-compare"><i class="icon-compare"></i><span>Add
                                                        to Compare</span></a></li>

                                        </ul>
                                    </div>
                                    <div class="clearer"></div>
                                    <!-- Check whether the plugin is enabled -->
                                    <style>
                                        #at3win #at3winheader h3 {
                                            text-align: left !important;
                                        }
                                    </style>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <script type="text/javascript">
                    jQuery(function($) {
                        $("body.quickview-index-view .no-rating a, body.quickview-index-view .ratings a")
                            .off('click').on("click", function(e) {
                                window.parent.location.href = $(this).attr("href");
                                window.parent.jQuery.fancybox.close();
                            });
                    });
                </script>
                <style type="text/css">
                </style>

            </div>
        </div>
    </div>
<?php }  ?>
<script src="<?php echo RootREL; ?>media/js/products/addtocart.js"></script>