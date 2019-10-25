<?php include_once 'views/layout/' . $this->layout . 'top.php'; ?>
<?php foreach ($this->products as $product) { ?>
    <div class="top-container">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 a-left">
                        <ul>
                            <li class="home">
                                <a href="<?php echo (vendor_app_util::url(["ctl" => ""])) ?>" title="Go to Home Page">Home</a>
                                <span class="breadcrumbs-split">></span>
                            </li>
                            <li class="category142">
                                <a href="<?php echo (vendor_app_util::url(["ctl" => "categories", "act" => ""])) ?>" title="Categories Dropshipping">Categories</a>
                                <span class="breadcrumbs-split">></span>
                            </li>
                            <li class="product">
                                <strong> Product: <?php echo "<b>" . $product['name'] . "</b>"; ?></strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                'https://www.portotheme.com/magento/porto/index.php/demo1_en/checkout/cart/';
                        } catch (err) {
                            location.href =
                                'https://www.portotheme.com/magento/porto/index.php/demo1_en/checkout/cart/';
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
                <script type="text/javascript">
                    var optionsPrice = new Product.OptionsPrice({
                        "priceFormat": {
                            "pattern": "$%s",
                            "precision": 2,
                            "requiredPrecision": 2,
                            "decimalSymbol": ".",
                            "groupSymbol": ",",
                            "groupLength": 3,
                            "integerRequired": 1
                        },
                        "includeTax": "false",
                        "showIncludeTax": false,
                        "showBothPrices": false,
                        "idSuffix": "_clone",
                        "oldPlusDisposition": 0,
                        "plusDisposition": 0,
                        "plusDispositionTax": 0,
                        "oldMinusDisposition": 0,
                        "minusDisposition": 0,
                        "productId": "319",
                        "productPrice": 15,
                        "productOldPrice": 15,
                        "priceInclTax": 15,
                        "priceExclTax": 15,
                        "skipCalculate": 1,
                        "defaultTax": 8.25,
                        "currentTax": 0,
                        "tierPrices": [],
                        "tierPricesInclTax": [],
                        "swatchPrices": null
                    });
                </script>
                <div id="messages_product_view"></div>
                <div class="product-view custom  ">
                    <div class="product-essential">
                        <form action="https://www.portotheme.com/magento/porto/index.php/demo1_en/checkout/cart/add/uenc/aHR0cHM6Ly93d3cucG9ydG90aGVtZS5jb20vbWFnZW50by9wb3J0by9pbmRleC5waHAvZGVtbzFfZW4vY2F0ZWdvcmllcy9zdHJpcGUtdHJpbS1hdGhsZXRpYy1tZXNoLXRlZS5odG1sP19fX1NJRD1V/product/319/form_key/gRxWBEl2ZMe5EQyi/" method="post" id="product_addtocart_form">
                            <input name="form_key" type="hidden" value="gRxWBEl2ZMe5EQyi" />
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
                                    <div class="prev-next-products">

                                        <div class="product-nav product-prev">
                                            <a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories/classic-crew-neck-sweatshirt.html" title="Previous Product">
                                                <i class="icon-left-open"></i> </a>
                                            <div class="product-pop theme-border-color">
                                                <img class="product-image" src="https://www.portotheme.com/magento/porto/media/catalog/product/cache/1/image/80x/17f82f742ffe127f42dca9de82fb58b1/0/4/04_2_1.jpg" alt="Previous" />
                                                <h3 class="product-name">Classic Neck Sweatshirt</h3>
                                            </div>
                                        </div>
                                        <div class="product-nav product-next">
                                            <a class="product-next" href="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories/classic-sunglasses.html" title="Next Product"><i class="icon-right-open"></i></a>
                                            <div class="product-pop theme-border-color">
                                                <img class="product-image" src="https://www.portotheme.com/magento/porto/media/catalog/product/cache/1/image/80x/17f82f742ffe127f42dca9de82fb58b1/0/2/02_2_1.jpg" alt="Previous" />
                                                <h3 class="product-name">Faux Leather Slides</h3>
                                            </div>
                                        </div>
                                    </div>
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
                                        <!-- <script type="text/javascript">
                                            var spConfig = new Product.Config({
                                                "attributes": {
                                                    "92": {
                                                        "id": "92",
                                                        "code": "color",
                                                        "label": "Color",
                                                        "options": [{
                                                            "id": "27",
                                                            "label": "Black",
                                                            "price": "0",
                                                            "oldPrice": "0",
                                                            "products": ["324", "327"]
                                                        }, {
                                                            "id": "22",
                                                            "label": "Grey",
                                                            "price": "0",
                                                            "oldPrice": "0",
                                                            "products": ["325", "328"]
                                                        }, {
                                                            "id": "14",
                                                            "label": "Red",
                                                            "price": "0",
                                                            "oldPrice": "0",
                                                            "products": ["326"]
                                                        }]
                                                    },
                                                    "144": {
                                                        "id": "144",
                                                        "code": "size",
                                                        "label": "Size",
                                                        "options": [{
                                                            "id": "7",
                                                            "label": "M",
                                                            "price": "0",
                                                            "oldPrice": "0",
                                                            "products": ["324", "328"]
                                                        }, {
                                                            "id": "6",
                                                            "label": "L",
                                                            "price": "0",
                                                            "oldPrice": "0",
                                                            "products": ["325"]
                                                        }, {
                                                            "id": "5",
                                                            "label": "XL",
                                                            "price": "0",
                                                            "oldPrice": "0",
                                                            "products": ["326"]
                                                        }, {
                                                            "id": "4",
                                                            "label": "2XL",
                                                            "price": "0",
                                                            "oldPrice": "0",
                                                            "products": ["327"]
                                                        }]
                                                    }
                                                },
                                                "template": "$#{price}",
                                                "basePrice": "15",
                                                "oldPrice": "15",
                                                "productId": "319",
                                                "chooseText": "Choose an Option...",
                                                "taxConfig": {
                                                    "includeTax": false,
                                                    "showIncludeTax": false,
                                                    "showBothPrices": false,
                                                    "defaultTax": 8.25,
                                                    "currentTax": 0,
                                                    "inclTaxTitle": "Incl. Tax"
                                                }
                                            });
                                        </script> -->
                                        <!-- <script type="text/javascript">
                                            jQuery(document).ready(function() {
                                                var swatchesConfig = new Product.ConfigurableSwatches(
                                                    spConfig);
                                            });
                                        </script>
                                        <script type="text/javascript">
                                            //<![CDATA[
                                            var DateOption = Class.create({

                                                getDaysInMonth: function(month, year) {
                                                    var curDate = new Date();
                                                    if (!month) {
                                                        month = curDate.getMonth();
                                                    }
                                                    if (2 == month && !
                                                        year) { // leap year assumption for unknown year
                                                        return 29;
                                                    }
                                                    if (!year) {
                                                        year = curDate.getFullYear();
                                                    }
                                                    return 32 - new Date(year, month - 1, 32).getDate();
                                                },

                                                reloadMonth: function(event) {
                                                    var selectEl = event.findElement();
                                                    var idParts = selectEl.id.split("_");
                                                    if (idParts.length != 3) {
                                                        return false;
                                                    }
                                                    var optionIdPrefix = idParts[0] + "_" + idParts[1];
                                                    var month = parseInt($(optionIdPrefix + "_month")
                                                        .value);
                                                    var year = parseInt($(optionIdPrefix + "_year")
                                                        .value);
                                                    var dayEl = $(optionIdPrefix + "_day");

                                                    var days = this.getDaysInMonth(month, year);

                                                    //remove days
                                                    for (var i = dayEl.options.length - 1; i >=
                                                        0; i--) {
                                                        if (dayEl.options[i].value > days) {
                                                            dayEl.remove(dayEl.options[i].index);
                                                        }
                                                    }

                                                    // add days
                                                    var lastDay = parseInt(dayEl.options[dayEl.options
                                                        .length - 1].value);
                                                    for (i = lastDay + 1; i <= days; i++) {
                                                        this.addOption(dayEl, i, i);
                                                    }
                                                },

                                                addOption: function(select, text, value) {
                                                    var option = document.createElement('OPTION');
                                                    option.value = value;
                                                    option.text = text;

                                                    if (select.options.add) {
                                                        select.options.add(option);
                                                    } else {
                                                        select.appendChild(option);
                                                    }
                                                }
                                            });
                                            dateOption = new DateOption();
                                            //]]>
                                        </script>


                                        <script type="text/javascript">
                                            //<![CDATA[
                                            enUS = {
                                                "m": {
                                                    "wide": ["January", "February", "March", "April", "May",
                                                        "June", "July", "August", "September", "October",
                                                        "November", "December"
                                                    ],
                                                    "abbr": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul",
                                                        "Aug", "Sep", "Oct", "Nov", "Dec"
                                                    ]
                                                }
                                            }; // en_US locale reference
                                            Calendar._DN = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday",
                                                "Friday", "Saturday"
                                            ]; // full day names
                                            Calendar._SDN = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri",
                                                "Sat"
                                            ]; // short day names
                                            Calendar._FD =
                                                0; // First day of the week. "0" means display Sunday first, "1" means display Monday first, etc.
                                            Calendar._MN = ["January", "February", "March", "April", "May", "June",
                                                "July", "August", "September", "October", "November", "December"
                                            ]; // full month names
                                            Calendar._SMN = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug",
                                                "Sep", "Oct", "Nov", "Dec"
                                            ]; // short month names
                                            Calendar._am = "AM"; // am/pm
                                            Calendar._pm = "PM";

                                            // tooltips
                                            Calendar._TT = {};
                                            Calendar._TT["INFO"] = 'About the calendar';

                                            Calendar._TT["ABOUT"] =
                                                'DHTML Date/Time Selector\n' +
                                                "(c) dynarch.com 2002-2005 / Author: Mihai Bazon\n" +
                                                'For latest version visit: http://www.dynarch.com/projects/calendar/\n' +
                                                'Distributed under GNU LGPL. See http://gnu.org/licenses/lgpl.html for details.' +
                                                '\n\n' +
                                                'Date selection:\n' +
                                                '- Use the \xab, \xbb buttons to select year\n' +
                                                '- Use the \u2039 buttons to select month\n' +
                                                '- Hold mouse button on any of the above buttons for faster selection.';
                                            Calendar._TT["ABOUT_TIME"] = '\n\n' +
                                                'Time selection:\n' +
                                                '- Click on any of the time parts to increase it\n' +
                                                '- or Shift-click to decrease it\n' +
                                                '- or click and drag for faster selection.';

                                            Calendar._TT["PREV_YEAR"] = 'Prev. year (hold for menu)';
                                            Calendar._TT["PREV_MONTH"] = 'Prev. month (hold for menu)';
                                            Calendar._TT["GO_TODAY"] = 'Go Today';
                                            Calendar._TT["NEXT_MONTH"] = 'Next month (hold for menu)';
                                            Calendar._TT["NEXT_YEAR"] = 'Next year (hold for menu)';
                                            Calendar._TT["SEL_DATE"] = 'Select date';
                                            Calendar._TT["DRAG_TO_MOVE"] = 'Drag to move';
                                            Calendar._TT["PART_TODAY"] = ' (' + "today" + ')';

                                            // the following is to inform that "%s" is to be the first day of week
                                            Calendar._TT["DAY_FIRST"] = 'Display %s first';

                                            // This may be locale-dependent. It specifies the week-end days, as an array
                                            // of comma-separated numbers. The numbers are from 0 to 6: 0 means Sunday, 1
                                            // means Monday, etc.
                                            Calendar._TT["WEEKEND"] = "0,6";

                                            Calendar._TT["CLOSE"] = 'Close';
                                            Calendar._TT["TODAY"] = "today";
                                            Calendar._TT["TIME_PART"] = '(Shift-)Click or drag to change value';

                                            // date formats
                                            Calendar._TT["DEF_DATE_FORMAT"] = "%b %e, %Y";
                                            Calendar._TT["TT_DATE_FORMAT"] = "%B %e, %Y";

                                            Calendar._TT["WK"] = "Week";
                                            Calendar._TT["TIME"] = 'Time:';
                                            //]]>
                                        </script> -->
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
                                            <button type="button" title="Add to Cart" class="button btn-cart" onclick="productAddToCartForm.submit(this)"><span><span>Add to
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
                        <script type="text/javascript">
                            //<![CDATA[
                            var productAddToCartForm = new VarienForm('product_addtocart_form');
                            productAddToCartForm.submit = function(button, url) {
                                if (this.validator.validate()) {
                                    var form = this.form;
                                    var oldUrl = form.action;

                                    if (url) {
                                        form.action = url;
                                    }
                                    var e = null;
                                    if (!url) {
                                        url = jQuery('#product_addtocart_form').attr('action');
                                    }
                                    if (url.indexOf("wishlist/index/cart") != -1) {
                                        url = url.replace("wishlist/index/cart",
                                            "ajaxcart/index/add"); // New Code
                                    } else {
                                        url = url.replace("checkout/cart", "ajaxcart/index"); // New Code
                                    }
                                    url = url.replace("http://", "//");
                                    url = url.replace("https://", "//");
                                    var data = jQuery('#product_addtocart_form').serialize();
                                    data += '&isAjax=1';
                                    var is_quickview = false;
                                    if (jQuery("body").hasClass("quickview-index-view")) {
                                        is_quickview = true;
                                    }
                                    if (is_quickview)
                                        window.parent.jQuery("#loading-mask").show();
                                    else
                                        jQuery('#loading-mask').show();
                                    try {
                                        jQuery.ajax({
                                            url: url,
                                            dataType: 'json',
                                            type: 'post',
                                            data: data,
                                            success: function(data) {
                                                if (is_quickview)
                                                    window.parent.jQuery('#loading-mask').hide();
                                                else
                                                    jQuery('#loading-mask').hide();
                                                if (data.status == 'ERROR') {
                                                    if (is_quickview)
                                                        window.parent.alert(data.message.replace(
                                                            "<br/>", ""));
                                                    else
                                                        alert(data.message.replace("<br/>", ""));
                                                } else {
                                                    if (is_quickview) {
                                                        if (window.parent.jQuery(
                                                                '.header-container .mini-cart')) {
                                                            window.parent.jQuery(
                                                                    '.header-container .mini-cart')
                                                                .replaceWith(data.toplink);
                                                        }
                                                        if (window.parent.jQuery(
                                                                '.fixed-header .mini-cart')) {
                                                            window.parent.jQuery(
                                                                    '.fixed-header .mini-cart')
                                                                .replaceWith(data.toplink);
                                                        }
                                                        if (window.parent.jQuery(
                                                                '.sticky-header .mini-cart')) {
                                                            window.parent.jQuery(
                                                                    '.sticky-header .mini-cart')
                                                                .replaceWith(data.toplink);
                                                        }
                                                        if (window.parent.jQuery(
                                                                '.col-right .block.block-cart')) {
                                                            window.parent.jQuery(
                                                                    '.col-right .block.block-cart')
                                                                .replaceWith(data.cart_sidebar);
                                                        }
                                                        window.parent.jQuery(
                                                            '#after-loading-success-message #success-message-container .msg-box'
                                                        ).html(data.message);
                                                        ajaxcart_sec = 5;
                                                        timer_sec = ajaxcart_sec;
                                                        window.parent.jQuery(
                                                                '#after-loading-success-message')
                                                            .fadeIn(200);
                                                        ajaxcart_timer = setInterval(function() {
                                                            timer_sec--;
                                                            window.parent.jQuery(
                                                                '#after-loading-success-message .timer'
                                                            ).html(timer_sec);
                                                        }, 1000)
                                                        setTimeout(function() {
                                                            window.parent.jQuery(
                                                                '#after-loading-success-message'
                                                            ).fadeOut(200);
                                                            clearTimeout(ajaxcart_timer);
                                                            setTimeout(function() {
                                                                window.parent
                                                                    .jQuery(
                                                                        '#after-loading-success-message .timer'
                                                                    ).html(
                                                                        ajaxcart_sec
                                                                    );
                                                            }, 1000);
                                                        }, ajaxcart_sec * 1000);
                                                    } else {
                                                        if (jQuery(
                                                                '.header-container .mini-cart')) {
                                                            jQuery('.header-container .mini-cart')
                                                                .replaceWith(data.toplink);
                                                        }
                                                        if (jQuery('.fixed-header .mini-cart')) {
                                                            jQuery('.fixed-header .mini-cart')
                                                                .replaceWith(data.toplink);
                                                        }
                                                        if (jQuery('.sticky-header .mini-cart')) {
                                                            jQuery('.sticky-header .mini-cart')
                                                                .replaceWith(data.toplink);
                                                        }
                                                        if (jQuery(
                                                                '.col-right .block.block-cart')) {
                                                            jQuery('.col-right .block.block-cart')
                                                                .replaceWith(data.cart_sidebar);
                                                        }
                                                        jQuery(
                                                                '#after-loading-success-message #success-message-container .msg-box')
                                                            .html(data.message);
                                                        ajaxcart_sec = 5;
                                                        timer_sec = ajaxcart_sec;
                                                        jQuery('#after-loading-success-message')
                                                            .fadeIn(200);
                                                        ajaxcart_timer = setInterval(function() {
                                                            timer_sec--;
                                                            jQuery(
                                                                    '#after-loading-success-message .timer')
                                                                .html(timer_sec);
                                                        }, 1000)
                                                        setTimeout(function() {
                                                            jQuery(
                                                                    '#after-loading-success-message')
                                                                .fadeOut(200);
                                                            clearTimeout(ajaxcart_timer);
                                                            setTimeout(function() {
                                                                jQuery(
                                                                        '#after-loading-success-message .timer')
                                                                    .html(
                                                                        ajaxcart_sec
                                                                    );
                                                            }, 1000);
                                                        }, ajaxcart_sec * 1000);
                                                    }
                                                }
                                            }
                                        });
                                    } catch (e) {}
                                    this.form.action = oldUrl;
                                    if (e) {
                                        throw e;
                                    }
                                } else {
                                    if (jQuery('#product-options-wrapper'))
                                        jQuery('#product-options-wrapper').scrollToMe();
                                }
                            }.bind(productAddToCartForm);
                            //]]>
                        </script>
                        <script type="text/javascript">
                            productAddToCartForm.submitLight = function(button, url) {
                                if (this.validator) {
                                    var nv = Validation.methods;
                                    delete Validation.methods['required-entry'];
                                    delete Validation.methods['validate-one-required'];
                                    delete Validation.methods['validate-one-required-by-name'];
                                    // Remove custom datetime validators
                                    for (var methodName in Validation.methods) {
                                        if (methodName.match(/^validate-datetime-.*/i)) {
                                            delete Validation.methods[methodName];
                                        }
                                    }

                                    if (this.validator.validate()) {
                                        if (url) {
                                            this.form.action = url;
                                        }
                                        this.form.submit();
                                    }
                                    Object.extend(Validation.methods, nv);
                                } else {
                                    if (jQuery('#product-options-wrapper'))
                                        jQuery('#product-options-wrapper').scrollToMe();
                                }
                            }.bind(productAddToCartForm);
                        </script>
                    </div>
                    <div class="product-collateral">
                        <div class="collateral-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="product-tabs horizontal">
                                        <ul>
                                            <li id="tab_description_tabbed" class=" active first"><a href="#">Description</a></li>
                                            <li id="tab_tags_tabbed" class=""><a href="#">Tags</a></li>
                                            <li id="tab_review_tabbed" class=""><a href="#">Reviews</a></li>
                                        </ul>
                                        <div class="clearer"></div>
                                        <div class="tab-content" id="tab_description_tabbed_contents">
                                            <h2>Details</h2>
                                            <div class="std">
                                                <?php echo $product['description'];?>
                                            </div>
                                        </div>
                                        <div class="tab-content" id="tab_tags_tabbed_contents">
                                            <div class="box-collateral box-tags">
                                                <h2>Product Tags</h2>
                                                <form id="addTagForm" action="https://www.portotheme.com/magento/porto/index.php/demo1_en/tag/index/save/product/319/uenc/aHR0cHM6Ly93d3cucG9ydG90aGVtZS5jb20vbWFnZW50by9wb3J0by9pbmRleC5waHAvZGVtbzFfZW4vY2F0ZWdvcmllcy9zdHJpcGUtdHJpbS1hdGhsZXRpYy1tZXNoLXRlZS5odG1sP19fX1NJRD1V/" method="get">
                                                    <div class="form-add">
                                                        <label for="productTagName">Add Your Tags:</label>
                                                        <div class="input-box">
                                                            <input type="text" class="input-text required-entry" name="productTagName" id="productTagName" />
                                                        </div>
                                                        <button type="button" title="Add Tags" class="button" onclick="submitTagForm()">
                                                            <span>
                                                                <span>Add Tags</span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </form>
                                                <p class="note">Use spaces to separate tags. Use single quotes
                                                    (') for phrases.</p>
                                                <script type="text/javascript">
                                                    //<![CDATA[
                                                    var addTagFormJs = new VarienForm('addTagForm');

                                                    function submitTagForm() {
                                                        if (addTagFormJs.validator.validate()) {
                                                            addTagFormJs.form.submit();
                                                        }
                                                    }
                                                    //]]>
                                                </script>
                                            </div>
                                        </div>
                                        <div class="tab-content" id="tab_review_tabbed_contents">
                                            <div class="collateral-box" id="product-customer-reviews">
                                                <ol>
                                                    <li>Be the first to review this product</li>
                                                </ol>
                                            </div>

                                            <div class="add-review">
                                                <div class="form-add">
                                                    <h3>Write Your Own Review</h3>
                                                    <div class="block-content">
                                                        <form action="https://www.portotheme.com/magento/porto/index.php/demo1_en/review/product/post/id/319/" method="post" id="review-form">
                                                            <input name="form_key" type="hidden" value="gRxWBEl2ZMe5EQyi" />
                                                            <fieldset>
                                                                <h4>How do you rate this product? <em class="required">*</em></h4>
                                                                <span id="input-message-box"></span>
                                                                <table class="data-table ratings-table" id="product-review-table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="a-center">&nbsp;</th>
                                                                            <th class="a-center"><span class="nobr">1 star</span>
                                                                            </th>
                                                                            <th class="a-center"><span class="nobr">2 stars</span>
                                                                            </th>
                                                                            <th class="a-center"><span class="nobr">3 stars</span>
                                                                            </th>
                                                                            <th class="a-center"><span class="nobr">4 stars</span>
                                                                            </th>
                                                                            <th class="a-center"><span class="nobr">5 stars</span>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th>Quality</th>
                                                                            <td class="value a-center"><input type="radio" name="ratings[1]" id="Quality_1" value="1" class="radio" /></td>
                                                                            <td class="value a-center"><input type="radio" name="ratings[1]" id="Quality_2" value="2" class="radio" /></td>
                                                                            <td class="value a-center"><input type="radio" name="ratings[1]" id="Quality_3" value="3" class="radio" /></td>
                                                                            <td class="value a-center"><input type="radio" name="ratings[1]" id="Quality_4" value="4" class="radio" /></td>
                                                                            <td class="value a-center"><input type="radio" name="ratings[1]" id="Quality_5" value="5" class="radio" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Value</th>
                                                                            <td class="value a-center"><input type="radio" name="ratings[2]" id="Value_1" value="6" class="radio" /></td>
                                                                            <td class="value a-center"><input type="radio" name="ratings[2]" id="Value_2" value="7" class="radio" /></td>
                                                                            <td class="value a-center"><input type="radio" name="ratings[2]" id="Value_3" value="8" class="radio" /></td>
                                                                            <td class="value a-center"><input type="radio" name="ratings[2]" id="Value_4" value="9" class="radio" /></td>
                                                                            <td class="value a-center"><input type="radio" name="ratings[2]" id="Value_5" value="10" class="radio" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Price</th>
                                                                            <td class="value a-center"><input type="radio" name="ratings[3]" id="Price_1" value="11" class="radio" /></td>
                                                                            <td class="value a-center"><input type="radio" name="ratings[3]" id="Price_2" value="12" class="radio" /></td>
                                                                            <td class="value a-center"><input type="radio" name="ratings[3]" id="Price_3" value="13" class="radio" /></td>
                                                                            <td class="value a-center"><input type="radio" name="ratings[3]" id="Price_4" value="14" class="radio" /></td>
                                                                            <td class="value a-center"><input type="radio" name="ratings[3]" id="Price_5" value="15" class="radio" /></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <input type="hidden" name="validate_rating" class="validate-rating" value="" />
                                                                <script type="text/javascript">
                                                                    decorateTable('product-review-table');
                                                                </script>
                                                                <ul class="form-list">
                                                                    <li>
                                                                        <label for="nickname_field" class="required"><em>*</em>Nickname</label>
                                                                        <div class="input-box">
                                                                            <input type="text" name="nickname" id="nickname_field" class="input-text required-entry" value="" />
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <label for="summary_field" class="required"><em>*</em>Summary
                                                                            of Your Review</label>
                                                                        <div class="input-box">
                                                                            <input type="text" name="title" id="summary_field" class="input-text required-entry" value="" />
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <label for="review_field" class="required"><em>*</em>Review</label>
                                                                        <div class="input-box">
                                                                            <textarea name="detail" id="review_field" cols="5" rows="3" class="required-entry"></textarea>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </fieldset>
                                                            <div class="buttons-set">
                                                                <button type="submit" title="Submit Review" class="button"><span><span>Submit
                                                                            Review</span></span></button>
                                                            </div>
                                                        </form>
                                                        <script type="text/javascript">
                                                            var dataForm = new VarienForm('review-form');
                                                            Validation.addAllThese(
                                                                [
                                                                    ['validate-rating',
                                                                        'Please select one of each of the ratings above',
                                                                        function(v) {
                                                                            var trs = $('product-review-table')
                                                                                .select('tr');
                                                                            var inputs;
                                                                            var error = 1;

                                                                            for (var j = 0; j < trs
                                                                                .length; j++) {
                                                                                var tr = trs[j];
                                                                                if (j > 0) {
                                                                                    inputs = tr.select('input');

                                                                                    for (i in inputs) {
                                                                                        if (inputs[i].checked ==
                                                                                            true) {
                                                                                            error = 0;
                                                                                        }
                                                                                    }

                                                                                    if (error == 1) {
                                                                                        return false;
                                                                                    } else {
                                                                                        error = 1;
                                                                                    }
                                                                                }
                                                                            }
                                                                            return true;
                                                                        }
                                                                    ]
                                                                ]
                                                            );
                                                            //]]>
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            //<![CDATA[
                                            new Varien.Tabs('.product-tabs > ul');
                                            //]]>
                                        </script>
                                        <div class="clearer"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-collateral box-up-sell category-products owl-top-narrow">
                        <h2><span>Also Purchased</span></h2>
                        <div class="owl-carousel owl-theme" id="block-upsell">
                            <div class="item">
                                <div class="item-area">
                                    <div class="product-image-area">
                                        <a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/classic-woven-dress-pants.html" title="Classic Woven Dress Pants" class="product-image">
                                            <img class="defaultImage" src="https://www.portotheme.com/magento/porto/media/catalog/product/cache/1/small_image/300x/17f82f742ffe127f42dca9de82fb58b1/0/9/09_1_3.jpg" alt="Classic Woven Dress Pants" />
                                            <img class="hoverImage" src="https://www.portotheme.com/magento/porto/media/catalog/product/cache/1/thumbnail/300x/17f82f742ffe127f42dca9de82fb58b1/0/9/09_1_3.jpg" alt="Classic Woven Dress Pants" />
                                        </a>
                                        <div class="product-label" style="right: 10px;"><span class="sale-product-icon">-30%</span></div>
                                    </div>
                                    <div class="details-area">
                                        <h2 class="product-name"><a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/classic-woven-dress-pants.html" title="Classic Woven Dress Pants">Classic Woven Dress Pants</a>
                                        </h2>



                                        <div class="price-box">

                                            <p class="old-price">
                                                <span class="price-label">Regular Price:</span>
                                                <span class="price" id="old-price-343">
                                                    $29.90 </span>
                                            </p>

                                            <p class="special-price">
                                                <span class="price-label">Special Price</span>
                                                <span class="price" id="product-price-343">
                                                    $20.99 </span>
                                            </p>


                                        </div>

                                        <div class="actions">
                                            <a href="javascript:void(0)" onclick="ajaxWishlist(this,'https://www.portotheme.com/magento/porto/index.php/demo1_en/wishlist/index/add/product/343/form_key/gRxWBEl2ZMe5EQyi/','343');" class="addtowishlist" title="Add to Wishlist"><i class="icon-wishlist"></i></a>
                                            <div class="clearer"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-area">
                                    <div class="product-image-area">
                                        <a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/men-ettika-leather-bracelet.html" title="Men Ettika Leather Bracelet" class="product-image">
                                            <img class="defaultImage" src="https://www.portotheme.com/magento/porto/media/catalog/product/cache/1/small_image/300x/17f82f742ffe127f42dca9de82fb58b1/1/1/11_1_1_1.jpg" alt="Men Ettika Leather Bracelet" />
                                            <img class="hoverImage" src="https://www.portotheme.com/magento/porto/media/catalog/product/cache/1/thumbnail/300x/17f82f742ffe127f42dca9de82fb58b1/1/1/11_1_1_1.jpg" alt="Men Ettika Leather Bracelet" />
                                        </a>
                                    </div>
                                    <div class="details-area">
                                        <h2 class="product-name"><a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/men-ettika-leather-bracelet.html" title="Men Ettika Leather Bracelet">Men Ettika Leather
                                                Bracelet</a></h2>



                                        <div class="price-box">
                                            <span class="regular-price" id="product-price-345">
                                                <span class="price">$28.00</span> </span>

                                        </div>

                                        <div class="actions">
                                            <a href="javascript:void(0)" onclick="ajaxWishlist(this,'https://www.portotheme.com/magento/porto/index.php/demo1_en/wishlist/index/add/product/345/form_key/gRxWBEl2ZMe5EQyi/','345');" class="addtowishlist" title="Add to Wishlist"><i class="icon-wishlist"></i></a>
                                            <div class="clearer"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-area">
                                    <div class="product-image-area">
                                        <a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/men-frayed-scarf.html" title="Men Frayed Scarf" class="product-image">
                                            <img class="defaultImage" src="https://www.portotheme.com/magento/porto/media/catalog/product/cache/1/small_image/300x/17f82f742ffe127f42dca9de82fb58b1/1/6/16_1_2.jpg" alt="Men Frayed Scarf" />
                                            <img class="hoverImage" src="https://www.portotheme.com/magento/porto/media/catalog/product/cache/1/thumbnail/300x/17f82f742ffe127f42dca9de82fb58b1/1/6/16_1_2.jpg" alt="Men Frayed Scarf" />
                                        </a>
                                    </div>
                                    <div class="details-area">
                                        <h2 class="product-name"><a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/men-frayed-scarf.html" title="Men Frayed Scarf">Men Frayed Scarf</a></h2>



                                        <div class="price-box">
                                            <span class="regular-price" id="product-price-351">
                                                <span class="price">$12.00</span> </span>

                                        </div>

                                        <div class="actions">
                                            <a href="javascript:void(0)" onclick="ajaxWishlist(this,'https://www.portotheme.com/magento/porto/index.php/demo1_en/wishlist/index/add/product/351/form_key/gRxWBEl2ZMe5EQyi/','351');" class="addtowishlist" title="Add to Wishlist"><i class="icon-wishlist"></i></a>
                                            <div class="clearer"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-area">
                                    <div class="product-image-area">
                                        <a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/faux-leather-high-top-sneakers-395.html" title="Brown" class="product-image">
                                            <img class="defaultImage" src="https://www.portotheme.com/magento/porto/media/catalog/product/cache/1/small_image/300x/17f82f742ffe127f42dca9de82fb58b1/2/0/20_2_2.jpg" alt="Brown" />
                                            <img class="hoverImage" src="https://www.portotheme.com/magento/porto/media/catalog/product/cache/1/thumbnail/300x/17f82f742ffe127f42dca9de82fb58b1/2/0/20_2_2.jpg" alt="Brown" />
                                        </a>
                                    </div>
                                    <div class="details-area">
                                        <h2 class="product-name"><a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/faux-leather-high-top-sneakers-395.html" title="Faux Leather  Sneakers">Faux Leather Sneakers</a></h2>



                                        <div class="price-box">
                                            <span class="regular-price" id="product-price-359">
                                                <span class="price">$12.80</span> </span>

                                        </div>

                                        <div class="actions">
                                            <a href="javascript:void(0)" onclick="ajaxWishlist(this,'https://www.portotheme.com/magento/porto/index.php/demo1_en/wishlist/index/add/product/359/form_key/gRxWBEl2ZMe5EQyi/','359');" class="addtowishlist" title="Add to Wishlist"><i class="icon-wishlist"></i></a>
                                            <div class="clearer"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            jQuery(function($) {
                                $("#block-upsell").owlCarousel({
                                    lazyLoad: true,
                                    itemsCustom: [
                                        [0, 2],
                                        [320, 2],
                                        [480, 2],
                                        [768, 3],
                                        [992, 3],
                                        [1200, 5]
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
                <script type="text/javascript">
                    var lifetime = 3600;
                    var expireAt = Mage.Cookies.expires;
                    if (lifetime > 0) {
                        expireAt = new Date();
                        expireAt.setTime(expireAt.getTime() + lifetime * 1000);
                    }
                    Mage.Cookies.set('external_no_cache', 1, expireAt);
                </script>
            </div>
        </div>
    </div>
<?php }  ?>
<?php include_once 'views/layout/' . $this->layout . 'footer.php'; ?>