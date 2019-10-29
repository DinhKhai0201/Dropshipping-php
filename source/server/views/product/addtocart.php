<body class="page-empty  ajaxcart-index-options full-width catalog-product-view product-reason-logo-snapback" style="overflow-x: hidden;">
    <div>
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
        <script type="text/javascript">
            jQuery('#finish_and_checkout').click(function() {
                try {
                    parent.location.href = 'https://www.portotheme.com/magento/porto/index.php/demo1_en/checkout/cart/';
                } catch (err) {
                    location.href = 'https://www.portotheme.com/magento/porto/index.php/demo1_en/checkout/cart/';
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
                "productId": "310",
                "productPrice": 28,
                "productOldPrice": 28,
                "priceInclTax": 28,
                "priceExclTax": 28,
                "skipCalculate": 1,
                "defaultTax": 8.25,
                "currentTax": 0,
                "tierPrices": [],
                "tierPricesInclTax": [],
                "swatchPrices": null
            });
        </script>
        <div class="product-view">
            <div class="product-essential">
                <form action="//www.portotheme.com/magento/porto/index.php/demo1_en/checkout/cart/add/uenc/aHR0cHM6Ly93d3cucG9ydG90aGVtZS5jb20vbWFnZW50by9wb3J0by9pbmRleC5waHAvZGVtbzFfZW4vYWpheGNhcnQvaW5kZXgvb3B0aW9ucy9wcm9kdWN0X2lkLzMxMC8,/product/310/form_key/yJRqsXtYUQsl5cLr/" method="post" id="product_addtocart_form">
                    <div class="no-display">
                        <input type="hidden" name="product" value="310">
                        <input type="hidden" name="related_product" id="related-products-field" value="">
                    </div>
                    <script type="text/javascript">
                        var productAddToCartForm = new VarienForm('product_addtocart_form');
                    </script>
                    <div class="product-shop">
                        <div class="product-name">
                            <h1>Reason Logo Snapback</h1>
                        </div>


                        <p class="availability in-stock">Availability: <span>In Stock</span></p>



                        <div class="price-box">
                            <span class="regular-price" id="product-price-310">
                                <span class="price">$28.00</span> </span>

                        </div>



                        <div class="product-options" id="product-options-wrapper">

                            <dl class="last">
                                <dt class="swatch-attr">
                                    <label id="color_label" class="required">
                                        <em>*</em>Color:
                                        <span id="select_label_color" class="select-label"></span>
                                    </label>
                                </dt>
                                <dd class="clearfix swatch-attr">
                                    <div class="input-box">
                                        <select name="super_attribute[92]" id="attribute92" class="required-entry super-attribute-select no-display swatch-select">

                                            <option value="">Choose an Option...</option>
                                            <option value="27" price="0" data-label="black">Black</option>
                                            <option value="26" price="0" data-label="blue">Blue</option>
                                            <option value="23" price="0" data-label="green">Green</option>
                                            <option value="22" price="0" data-label="grey">Grey</option>
                                        </select>
                                        <ul id="configurable_swatch_color" class="configurable-swatch-list clearfix">
                                            <li class="option-black is-media" id="option27">
                                                <a href="javascript:void(0)" name="black" id="swatch27" class="swatch-link swatch-link-92 has-image" title="Black" style="height: 32px; width: 32px;">
                                                    <span class="swatch-label" style="height: 30px; width: 30px; line-height: 30px;">
                                                        <img src="https://www.portotheme.com/magento/porto/media/catalog/swatches/1/30x30/media/black.png" alt="Black" width="30" height="30">
                                                    </span>
                                                    <span class="x">X</span>
                                                </a>
                                            </li>
                                            <li class="option-blue is-media" id="option26">
                                                <a href="javascript:void(0)" name="blue" id="swatch26" class="swatch-link swatch-link-92 has-image" title="Blue" style="height: 32px; width: 32px;">
                                                    <span class="swatch-label" style="height: 30px; width: 30px; line-height: 30px;">
                                                        <img src="https://www.portotheme.com/magento/porto/media/catalog/swatches/1/30x30/media/blue.png" alt="Blue" width="30" height="30">
                                                    </span>
                                                    <span class="x">X</span>
                                                </a>
                                            </li>
                                            <li class="option-green is-media" id="option23">
                                                <a href="javascript:void(0)" name="green" id="swatch23" class="swatch-link swatch-link-92 has-image" title="Green" style="height: 32px; width: 32px;">
                                                    <span class="swatch-label" style="height: 30px; width: 30px; line-height: 30px;">
                                                        <img src="https://www.portotheme.com/magento/porto/media/catalog/swatches/1/30x30/media/green.png" alt="Green" width="30" height="30">
                                                    </span>
                                                    <span class="x">X</span>
                                                </a>
                                            </li>
                                            <li class="option-grey is-media" id="option22">
                                                <a href="javascript:void(0)" name="grey" id="swatch22" class="swatch-link swatch-link-92 has-image" title="Grey" style="height: 32px; width: 32px;">
                                                    <span class="swatch-label" style="height: 30px; width: 30px; line-height: 30px;">
                                                        <img src="https://www.portotheme.com/magento/porto/media/catalog/swatches/1/30x30/media/grey.png" alt="Grey" width="30" height="30">
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

                                            <option value="">Choose an Option...</option>
                                            <option value="43" price="0" data-label="55">55</option>
                                            <option value="42" price="0" data-label="56">56</option>
                                            <option value="41" price="0" data-label="57">57</option>
                                        </select>
                                        <ul id="configurable_swatch_size" class="configurable-swatch-list clearfix">
                                            <li class="option-55" id="option43">
                                                <a href="javascript:void(0)" name="55" id="swatch43" class="swatch-link swatch-link-144" title="55" style="height: 32px; min-width: 32px;">
                                                    <span class="swatch-label" style="height: 30px; min-width: 30px; line-height: 30px;">
                                                        55 </span>
                                                    <span class="x">X</span>
                                                </a>
                                            </li>
                                            <li class="option-56" id="option42">
                                                <a href="javascript:void(0)" name="56" id="swatch42" class="swatch-link swatch-link-144" title="56" style="height: 32px; min-width: 32px;">
                                                    <span class="swatch-label" style="height: 30px; min-width: 30px; line-height: 30px;">
                                                        56 </span>
                                                    <span class="x">X</span>
                                                </a>
                                            </li>
                                            <li class="option-57" id="option41">
                                                <a href="javascript:void(0)" name="57" id="swatch41" class="swatch-link swatch-link-144" title="57" style="height: 32px; min-width: 32px;">
                                                    <span class="swatch-label" style="height: 30px; min-width: 30px; line-height: 30px;">
                                                        57 </span>
                                                    <span class="x">X</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </dd>
                            </dl>
                            <script type="text/javascript">
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
                                                "products": ["320"]
                                            }, {
                                                "id": "26",
                                                "label": "Blue",
                                                "price": "0",
                                                "oldPrice": "0",
                                                "products": ["318", "323"]
                                            }, {
                                                "id": "23",
                                                "label": "Green",
                                                "price": "0",
                                                "oldPrice": "0",
                                                "products": ["322"]
                                            }, {
                                                "id": "22",
                                                "label": "Grey",
                                                "price": "0",
                                                "oldPrice": "0",
                                                "products": ["321"]
                                            }]
                                        },
                                        "144": {
                                            "id": "144",
                                            "code": "size",
                                            "label": "Size",
                                            "options": [{
                                                "id": "43",
                                                "label": "55",
                                                "price": "0",
                                                "oldPrice": "0",
                                                "products": ["318", "322"]
                                            }, {
                                                "id": "42",
                                                "label": "56",
                                                "price": "0",
                                                "oldPrice": "0",
                                                "products": ["320", "323"]
                                            }, {
                                                "id": "41",
                                                "label": "57",
                                                "price": "0",
                                                "oldPrice": "0",
                                                "products": ["321"]
                                            }]
                                        }
                                    },
                                    "template": "$#{price}",
                                    "basePrice": "28",
                                    "oldPrice": "28",
                                    "productId": "310",
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
                            </script>
                            <script type="text/javascript">
                                jQuery(document).ready(function() {
                                    var swatchesConfig = new Product.ConfigurableSwatches(spConfig);
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
                                        if (2 == month && !year) { // leap year assumption for unknown year
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
                                        var month = parseInt($(optionIdPrefix + "_month").value);
                                        var year = parseInt($(optionIdPrefix + "_year").value);
                                        var dayEl = $(optionIdPrefix + "_day");

                                        var days = this.getDaysInMonth(month, year);

                                        //remove days
                                        for (var i = dayEl.options.length - 1; i >= 0; i--) {
                                            if (dayEl.options[i].value > days) {
                                                dayEl.remove(dayEl.options[i].index);
                                            }
                                        }

                                        // add days
                                        var lastDay = parseInt(dayEl.options[dayEl.options.length - 1].value);
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
                                        "wide": ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                                        "abbr": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
                                    }
                                }; // en_US locale reference
                                Calendar._DN = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]; // full day names
                                Calendar._SDN = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"]; // short day names
                                Calendar._FD = 0; // First day of the week. "0" means display Sunday first, "1" means display Monday first, etc.
                                Calendar._MN = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]; // full month names
                                Calendar._SMN = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]; // short month names
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
                            </script>
                            <p class="required">* Required Fields</p>
                        </div>
                        <div class="clearer"></div>
                        <script type="text/javascript">
                            decorateGeneric($$('#product-options-wrapper dl'), ['last']);
                        </script>
                        <div class="product-options-bottom">



                            <div class="price-box">
                                <span class="regular-price" id="product-price-310_clone">
                                    <span class="price">$28.00</span> </span>

                            </div>

                            <div class="add-to-cart">
                                <label for="qty">Qty:</label>
                                <div class="qty-holder">
                                    <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty">
                                    <div class="qty-changer">
                                        <a href="javascript:void(0)" class="qty_inc"><i class="icon-up-dir"></i></a>
                                        <a href="javascript:void(0)" class="qty_dec"><i class="icon-down-dir"></i></a>
                                    </div>
                                </div>
                                <button type="button" title="Add to Cart" class="button btn-cart" onclick="productAddToCartForm.submit(this)"><span><span>Add to Cart</span></span></button>
                                <span id="ajax_loader" style="display:none"><i class="ajax-loader small animate-spin"></i></span>
                            </div>
                        </div>

                    </div>
                    <div class="clearer"></div>
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
                            // Start of our new ajax code
                            if (!url) {
                                url = jQuery('#product_addtocart_form').attr('action');
                            }
                            url = url.replace("checkout/cart", "ajaxcart/index"); // New Code
                            var data = jQuery('#product_addtocart_form').serialize();
                            data += '&isAjax=1';
                            jQuery('#ajax_loader').show();
                            try {
                                jQuery.ajax({
                                    url: url,
                                    dataType: 'json',
                                    type: 'post',
                                    data: data,
                                    success: function(data) {
                                        jQuery('#ajax_loader').hide();
                                        parent.setAjaxData(data, true);
                                    }
                                });
                            } catch (e) {}
                            // End of our new ajax code
                            this.form.action = oldUrl;
                            if (e) {
                                throw e;
                            }
                        }
                    }.bind(productAddToCartForm);
                    productAddToCartForm.submitLight = function(button, url) {
                        if (this.validator) {
                            var nv = Validation.methods;
                            delete Validation.methods['required-entry'];
                            delete Validation.methods['validate-one-required'];
                            delete Validation.methods['validate-one-required-by-name'];
                            if (this.validator.validate()) {
                                if (url) {
                                    this.form.action = url;
                                }
                                this.form.submit();
                            }
                            Object.extend(Validation.methods, nv);
                        }
                    }.bind(productAddToCartForm);
                    //]]>
                </script>
            </div>
        </div>


        <style type="text/css">
            #b_d9e6a7b1_851 {
                display: none;
            }
        </style>


        <script type="text/javascript">
            jQuery(function($) {
                $(".col-left.sidebar").css("position", "relative");
                $(".col-right.sidebar").css("position", "relative");
                var main_area_pos = $(".col-main");
                var main_area_height = $(".col-main").outerHeight();
                var left_side_top = 0;
                var right_side_top = 0;
                var cur_Y = pre_Y = 0;
                $(document).ready(function() {
                    stickySidebar();
                });
                $(window).scroll(function() {
                    stickySidebar();
                });
                $(window).resize(function() {
                    left_side_top = 0;
                    stickySidebar();
                });

                function stickySidebar() {
                    if ($(".col-main").length > 0) {
                        main_area_pos = $(".col-main").offset().top;
                        main_area_height = $(".col-main").outerHeight();
                        margin_top = $(".header-container").hasClass("sticky-header") ? 60 : 10;
                        margin_bottom = 10;
                        var fixedSideTop = fixedSideBottom = fixedSideTop_r = fixedSideBottom_r = 0;
                        cur_Y = $(window).scrollTop();
                        if ($(".col-left.sidebar").outerHeight() < main_area_height) {
                            if ($(window).height() < $(".col-left.sidebar").outerHeight() + margin_top + margin_bottom) {
                                if (main_area_pos >= cur_Y + margin_top) {
                                    left_side_top = 0;
                                } else if (cur_Y >= main_area_pos + main_area_height - $(window).height()) {
                                    left_side_top = main_area_height - $(".col-left.sidebar").outerHeight();
                                } else {
                                    if (cur_Y > pre_Y) {
                                        if (fixedSideTop) {
                                            fixedSideTop = 0;
                                            left_side_top = $(".col-left.sidebar").offset().top - main_area_pos;
                                        } else if (!fixedSideBottom && $(".col-left.sidebar").outerHeight() + $(".col-left.sidebar").offset().top < cur_Y + $(window).height()) {
                                            fixedSideBottom = 1;
                                            left_side_top = cur_Y - (main_area_pos + $(".col-left.sidebar").outerHeight() - $(window).height()) - 10
                                        }
                                    } else {
                                        if (fixedSideBottom) {
                                            fixedSideBottom = 0;
                                            left_side_top = cur_Y - main_area_pos - $(".col-left.sidebar").outerHeight() + $(window).height() - 10;
                                        } else if (!fixedSideTop && $(".col-left.sidebar").offset().top >= cur_Y + margin_top) {
                                            fixedSideTop = 1;
                                            left_side_top = cur_Y - main_area_pos + margin_top;
                                        }

                                    }
                                }
                            } else {
                                if (cur_Y >= (main_area_pos - margin_top) && cur_Y + $(".col-left.sidebar").outerHeight() + margin_top < main_area_pos + main_area_height) {
                                    left_side_top = cur_Y - main_area_pos + margin_top;
                                } else if (cur_Y + $(".col-left.sidebar").outerHeight() + margin_top > main_area_pos + main_area_height) {
                                    left_side_top = main_area_height - $(".col-left.sidebar").outerHeight();
                                } else {
                                    left_side_top = 0;
                                }

                                fixedSideTop = fixedSideBottom = 0;
                            }
                            $(".col-left.sidebar").css("top", left_side_top + "px");
                        }
                        if ($(".col-right.sidebar").outerHeight() < main_area_height) {
                            if ($(window).height() < $(".col-right.sidebar").outerHeight() + margin_top + margin_bottom) {
                                if (main_area_pos >= cur_Y + margin_top) {
                                    right_side_top = 0;
                                } else if (cur_Y >= main_area_pos + main_area_height - $(window).height()) {
                                    right_side_top = main_area_height - $(".col-right.sidebar").outerHeight();
                                } else {
                                    if (cur_Y > pre_Y) {
                                        if (fixedSideTop_r) {
                                            fixedSideTop_r = 0;
                                            right_side_top = $(".col-right.sidebar").offset().top - main_area_pos;
                                        } else if (!fixedSideBottom_r && $(".col-right.sidebar").outerHeight() + $(".col-right.sidebar").offset().top < cur_Y + $(window).height()) {
                                            fixedSideBottom_r = 1;
                                            right_side_top = cur_Y - (main_area_pos + $(".col-right.sidebar").outerHeight() - $(window).height()) - 10
                                        }
                                    } else {
                                        if (fixedSideBottom_r) {
                                            fixedSideBottom_r = 0;
                                            right_side_top = $(".col-right.sidebar").offset().top - main_area_pos;
                                        } else if (!fixedSideTop_r && $(".col-right.sidebar").offset().top >= cur_Y + margin_top) {
                                            fixedSideTop_r = 1;
                                            right_side_top = cur_Y - main_area_pos + margin_top;
                                        }

                                    }
                                }
                            } else {
                                if (cur_Y >= (main_area_pos - margin_top) && cur_Y + $(".col-right.sidebar").outerHeight() + margin_top < main_area_pos + main_area_height) {
                                    right_side_top = cur_Y - main_area_pos + margin_top;
                                } else if (cur_Y + $(".col-right.sidebar").outerHeight() + margin_top > main_area_pos + main_area_height) {
                                    right_side_top = main_area_height - $(".col-right.sidebar").outerHeight();
                                } else {
                                    right_side_top = 0;
                                }

                                fixedSideTop_r = fixedSideBottom_r = 0;
                            }
                            $(".col-right.sidebar").css("top", right_side_top + "px");
                        }
                        pre_Y = cur_Y;
                    }
                }
            });
        </script>
    </div>


    <div class="addthis-smartlayers at4-visually-hidden addthis-smartlayers-desktop" aria-labelledby="at4-share-label" role="region">
        <div id="at4-share-label">AddThis Sharing Sidebar</div>
        <div id="at4-share" class="at4-share addthis_32x32_style atss atss-right addthis-animated slideInRight"><a role="button" tabindex="0" class="at-share-btn at-svc-facebook"><span class="at4-visually-hidden">Share to Facebook</span><span class="at-icon-wrapper" style="background-color: rgb(59, 89, 152);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-facebook-1" class="at-icon at-icon-facebook">
                        <title id="at-svg-facebook-1">Facebook</title>
                        <g>
                            <path d="M22 5.16c-.406-.054-1.806-.16-3.43-.16-3.4 0-5.733 1.825-5.733 5.17v2.882H9v3.913h3.837V27h4.604V16.965h3.823l.587-3.913h-4.41v-2.5c0-1.123.347-1.903 2.198-1.903H22V5.16z" fill-rule="evenodd"></path>
                        </g>
                    </svg></span></a><a role="button" tabindex="0" class="at-share-btn at-svc-twitter"><span class="at4-visually-hidden">Share to Twitter</span><span class="at-icon-wrapper" style="background-color: rgb(29, 161, 242);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-twitter-2" class="at-icon at-icon-twitter">
                        <title id="at-svg-twitter-2">Twitter</title>
                        <g>
                            <path d="M27.996 10.116c-.81.36-1.68.602-2.592.71a4.526 4.526 0 0 0 1.984-2.496 9.037 9.037 0 0 1-2.866 1.095 4.513 4.513 0 0 0-7.69 4.116 12.81 12.81 0 0 1-9.3-4.715 4.49 4.49 0 0 0-.612 2.27 4.51 4.51 0 0 0 2.008 3.755 4.495 4.495 0 0 1-2.044-.564v.057a4.515 4.515 0 0 0 3.62 4.425 4.52 4.52 0 0 1-2.04.077 4.517 4.517 0 0 0 4.217 3.134 9.055 9.055 0 0 1-5.604 1.93A9.18 9.18 0 0 1 6 23.85a12.773 12.773 0 0 0 6.918 2.027c8.3 0 12.84-6.876 12.84-12.84 0-.195-.005-.39-.014-.583a9.172 9.172 0 0 0 2.252-2.336" fill-rule="evenodd"></path>
                        </g>
                    </svg></span></a><a role="button" tabindex="0" class="at-share-btn at-svc-print"><span class="at4-visually-hidden">Share to Print</span><span class="at-icon-wrapper" style="background-color: rgb(115, 138, 141);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-print-3" class="at-icon at-icon-print">
                        <title id="at-svg-print-3">Print</title>
                        <g>
                            <path d="M24.67 10.62h-2.86V7.49H10.82v3.12H7.95c-.5 0-.9.4-.9.9v7.66h3.77v1.31L15 24.66h6.81v-5.44h3.77v-7.7c-.01-.5-.41-.9-.91-.9zM11.88 8.56h8.86v2.06h-8.86V8.56zm10.98 9.18h-1.05v-2.1h-1.06v7.96H16.4c-1.58 0-.82-3.74-.82-3.74s-3.65.89-3.69-.78v-3.43h-1.06v2.06H9.77v-3.58h13.09v3.61zm.75-4.91c-.4 0-.72-.32-.72-.72s.32-.72.72-.72c.4 0 .72.32.72.72s-.32.72-.72.72zm-4.12 2.96h-6.1v1.06h6.1v-1.06zm-6.11 3.15h6.1v-1.06h-6.1v1.06z"></path>
                        </g>
                    </svg></span></a><a role="button" tabindex="0" class="at-share-btn at-svc-compact"><span class="at4-visually-hidden">More AddThis Share options</span><span class="at-icon-wrapper" style="background-color: rgb(255, 101, 80);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-addthis-4" class="at-icon at-icon-addthis">
                        <title id="at-svg-addthis-4">AddThis</title>
                        <g>
                            <path d="M18 14V8h-4v6H8v4h6v6h4v-6h6v-4h-6z" fill-rule="evenodd"></path>
                        </g>
                    </svg></span></a>
            <div id="at4-scc" class="at-share-close-control ats-transparent at4-hide-content at4-show" title="Hide">
                <div class="at4-arrow at-right">Hide</div>
            </div>
        </div>
        <div id="at4-soc" class="at-share-open-control at-share-open-control-right ats-transparent at4-hide" title="Show" style="padding-right: 15px;">
            <div class="at4-arrow at-left">Show</div>
        </div>
    </div>
    <div id="at4-thankyou" class="at4-thankyou at4-thankyou-background at4-hide ats-transparent at4-thankyou-desktop addthis-smartlayers addthis-animated fadeIn at4-show" role="dialog" aria-labelledby="at-thankyou-label">
        <div class="at4lb-inner"><button class="at4x" title="Close">Close</button><a id="at4-palogo">
                <div><a class="at-branding-logo" href="https://www.addthis.com/website-tools/overview?utm_source=AddThis%20Tools&amp;utm_medium=image" title="Powered by AddThis" target="_blank">
                        <div class="at-branding-icon"></div><span class="at-branding-addthis">AddThis</span>
                    </a></div>
            </a>
            <div class="at4-thankyou-inner">
                <div id="at-thankyou-label" class="thankyou-title"></div>
                <div class="thankyou-description"></div>
                <div class="at4-thankyou-layer"></div>
            </div>
        </div>
    </div>
</body>