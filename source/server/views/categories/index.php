<?php
global $mediaFiles;
// array_push($mediaFiles['css'], RootREL . "media/css/plusminustoggle.css");
?>
<?php include_once 'views/layout/' . $this->layout . 'top.php'; ?>
<div class="top-container">
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12 a-left">
                    <ul>
                        <li class="home">
                            <a href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => '')); ?>" title="Go to Home Page">Home</a>
                            <span class="breadcrumbs-split">></span>
                        </li>
                        <li class="category142">
                            <strong>Categories</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-container col2-left-layout">
    <div class="main container">
        <div class="row">
            <div class="col-main col-lg-9 lg-order-12">
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
                    var data = "";
                    var active = false;
                    var next_page = "";
                    var loading = false;
                    var infinite_loaded_count = 0;
                    jQuery(function($) {
                        if ($('body').find('#resultLoading').attr('id') != 'resultLoading') {
                            $('.main').append(
                                '<div id="resultLoading" style="display:none"><div><i class="ajax-loader large animate-spin"></i><div></div></div><div class="bg"></div></div>'
                            );
                        }
                        var height = $('.main').outerHeight();
                        var width = $('.main').outerWidth();
                        $('.ui-slider-handle').css('cursor', 'pointer');

                        $('#resultLoading').css({
                            'width': '100%',
                            'height': '100%',
                            'position': 'fixed',
                            'z-index': '10000000',
                            'top': '0',
                            'left': '0'
                        });
                        $('#resultLoading .bg').css({
                            'background': '#ffffff',
                            'opacity': '0.5',
                            'width': '100%',
                            'height': '100%',
                            'position': 'absolute',
                            'top': '0'
                        });
                        $('#resultLoading>div:first').css({
                            'width': '100%',
                            'text-align': 'center',
                            'position': 'absolute',
                            'left': '0',
                            'top': '50%',
                            'margin-top': '-16px',
                            'font-size': '16px',
                            'z-index': '10',
                            'color': '#ffffff'

                        });


                        $('.block-layered-nav #narrow-by-list a').on('click', function(e) {
                            if (!$(this).parent().hasClass('slider-range')) {
                                sliderAjax($(this).attr('href'));
                            }
                            e.preventDefault();
                        });

                        next_page = "";
                        $(".pager li > a.next").each(function() {
                            next_page = $(this).attr("href");
                        });
                        if (!next_page) {
                            $('.infinite-loader .btn-load-more').hide();
                        }
                        $('.toolbar a').on('click', function(e) {
                            if ($(this).attr('href')) {
                                var url = $(this).attr('href');
                                sliderAjax(url);
                            }
                            e.preventDefault();
                        });

                        $('.toolbar select').removeAttr('onchange');
                        $('.toolbar select').on('change', function(e) {
                            var url = $(this).val();
                            sliderAjax(url);
                            e.preventDefault();
                        });


                    });

                    /*DONOT EDIT THIS CODE*/
                    var old_class;

                    function sliderAjax(url) {
                        if (!active) {
                            active = true;
                            jQuery(function($) {
                                if ($(".col-main .products-grid").attr("class"))
                                    old_class = $(".col-main .products-grid").attr("class");
                                oldUrl = url;
                                $('#resultLoading .bg').height('100%');
                                $('#resultLoading').fadeIn(300);
                                infinite_loaded_count = 0;
                                url = url.replace("&infinite=true", "");
                                url = url.replace("?infinite=true&", "?");
                                url = url.replace("?infinite=true", "");
                                var param = "";
                                if (url.indexOf("ajaxcatalog") == -1) {
                                    param = "ajaxcatalog=true";
                                    if (url.indexOf("?") == -1 && url.indexOf("&") > -1)
                                        url = url.replace("&", "?");
                                    if (url.indexOf("?") == -1)
                                        param = "?" + param;
                                    else
                                        param = "&" + param;
                                }

                                try {
                                    $('body').css('cursor', 'wait');
                                    $.ajax({
                                        url: url + param,
                                        dataType: 'json',
                                        type: 'post',
                                        data: data,
                                        success: function(data) {
                                            callback();
                                            if (data.viewpanel) {
                                                if ($('.block-main-layer')) {
                                                    $('.block-main-layer').empty();
                                                    $('.mobile-layer-overlay').remove();
                                                    $('.block-main-layer').replaceWith(data
                                                        .viewpanel)
                                                }
                                            }
                                            if (data.productlist) {
                                                $('.col-main .category-products').empty();
                                                $('.col-main .category-products')
                                                    .replaceWith(data.productlist)
                                            }
                                            if ($(".col-main").has(".category-products")
                                                .length)
                                                $(".col-main .category-products")
                                                .scrollToMe();
                                            $("img.porto-lazyload:not(.porto-lazyload-loaded)")
                                                .lazyload({
                                                    effect: "fadeIn"
                                                });
                                            setTimeout(function() {
                                                $('.porto-lazyload:not(.porto-lazyload-loaded)')
                                                    .trigger('appear');
                                            }, 300);
                                            $(".qty_inc").unbind('click').click(function() {
                                                if ($(this).parent().parent()
                                                    .children("input.qty").is(
                                                        ':enabled')) {
                                                    $(this).parent().parent()
                                                        .children("input.qty").val((
                                                            +$(this).parent()
                                                            .parent().children(
                                                                "input.qty")
                                                            .val() + 1) || 0);
                                                    $(this).parent().parent()
                                                        .children("input.qty")
                                                        .focus();
                                                    $(this).focus();
                                                }
                                            });
                                            $(".qty_dec").unbind('click').click(function() {
                                                if ($(this).parent().parent()
                                                    .children("input.qty").is(
                                                        ':enabled')) {
                                                    $(this).parent().parent()
                                                        .children("input.qty").val((
                                                            $(this).parent()
                                                            .parent().children(
                                                                "input.qty")
                                                            .val() - 1 > 0) ? (
                                                            $(this).parent()
                                                            .parent().children(
                                                                "input.qty")
                                                            .val() - 1) : 0);
                                                    $(this).parent().parent()
                                                        .children("input.qty")
                                                        .focus();
                                                    $(this).focus();
                                                }
                                            });
                                            var hist = url;
                                            if (url.indexOf("p=") > -1) {
                                                var len = url.length - url.indexOf("p=");
                                                var str_temp = url.substr(url.indexOf("p="),
                                                    len);
                                                var page_param = "";
                                                if (str_temp.indexOf("&") == -1) {
                                                    page_param = str_temp;
                                                } else {
                                                    page_param = str_temp.substr(0, str_temp
                                                        .indexOf("&"));
                                                }
                                                hist = url.replace(page_param, "");
                                            }
                                            if (window.history && window.history
                                                .pushState) {
                                                window.history.pushState('GET', data.title,
                                                    hist);
                                            }
                                            $('body').find('.toolbar select').removeAttr(
                                                'onchange');
                                            $('#resultLoading .bg').height('100%');
                                            $('#resultLoading').fadeOut(300);
                                            $('body').css('cursor', 'default');

                                            $('.block-layered-nav #narrow-by-list a').on(
                                                'click',
                                                function(e) {
                                                    if (!$(this).parent().hasClass(
                                                            'slider-range')) {
                                                        sliderAjax($(this).attr(
                                                            'href'));
                                                    }
                                                    e.preventDefault();
                                                });

                                            next_page = "";
                                            $(".pager li > a.next").each(function() {
                                                next_page = $(this).attr("href");
                                            });

                                            $('.toolbar a').on('click', function(e) {
                                                if ($(this).attr('href')) {
                                                    var url = $(this).attr('href');
                                                    sliderAjax(url);
                                                }
                                                e.preventDefault();
                                            });

                                            $('.toolbar select').removeAttr('onchange');
                                            $('.toolbar select').on('change', function(e) {
                                                var url = $(this).val();
                                                sliderAjax(url);
                                                e.preventDefault();
                                            });
                                            $("a.product-image img.defaultImage").each(
                                                function() {
                                                    var default_img = $(this).attr(
                                                        "data-src");
                                                    if (!default_img)
                                                        default_img = $(this).attr(
                                                            "src");
                                                    var thumbnail_img = $(this).parent()
                                                        .children("img.hoverImage")
                                                        .attr("data-src");
                                                    if (!thumbnail_img)
                                                        thumbnail_img = $(this).parent()
                                                        .children("img.hoverImage")
                                                        .attr("src");
                                                    if (default_img) {
                                                        if (default_img.replace(
                                                                "/small_image/",
                                                                "/thumbnail/") ==
                                                            thumbnail_img) {
                                                            $(this).parent().children(
                                                                    "img.hoverImage")
                                                                .remove();
                                                            $(this).removeClass(
                                                                "defaultImage");
                                                        }
                                                    }
                                                });
                                            /* moving action links into product image area */
                                            $(".move-action .item .details-area .actions")
                                                .each(function() {
                                                    $(this).parent().parent().children(
                                                            ".product-image-area")
                                                        .append($(this));
                                                });
                                            if (old_class)
                                                $(".col-main .products-grid").attr("class",
                                                    old_class);
                                        }
                                    })
                                } catch (e) {}
                            });
                            active = false
                        }
                        return false
                    }


                    function callback() {

                    }
                </script>

                <p class="category-image"><img src="https://www.portotheme.com/magento/porto/media/catalog/category/men_category_banner.jpg" alt="Categories" title="Categories" /></p>
                <div class="page-title category-title">
                    <h1>Categories</h1>
                </div>


                <script type="text/javascript">
                    //<![CDATA[
                    var dailydealTimeCountersCategory = new Array();
                    var i = 0;
                    //]]>
                </script>

                <div class="category-products">
                    <div class="toolbar">
                        <div class="sorter">
                            <div class="sort-by">
                                <label>Sort By:</label>
                                <select onchange="setLocation(this.value)">
                                    <option value="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories.html?dir=asc&amp;order=position" selected="selected">
                                        Position </option>
                                    <option value="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories.html?dir=asc&amp;order=name">
                                        Name </option>
                                    <option value="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories.html?dir=asc&amp;order=price">
                                        Price </option>
                                </select>
                                <a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories.html?dir=desc&amp;order=position" title="Set Descending Direction"><i class="icon-up"></i></a>
                            </div>
                            <p class="view-mode">
                                <strong title="Grid" class="grid"><i class="fas fa-th"></i></strong>&nbsp;
                                <a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories.html?mode=list" title="List" class="list"><i class="fas fa-list-ul"></i></a>&nbsp;
                            </p>
                            <div class="pager">
                                <p class="amount">
                                    Items 1 to 12 of 18 total </p>
                                <div class="pages">
                                    <ol>
                                        <li class="current">1</li>
                                        <li><a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories.html?p=2">2</a>
                                        </li>
                                        <li>
                                            <a class="next i-next" href="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories.html?p=2" title="Next">
                                                <i class="icon-right-dir"></i>
                                            </a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="products-grid  columns4 hide-addtocart move-action">
                        <?php foreach ($this->products['data'] as $products) { ?>
                            <li class="item">
                                <div class="item-area product-image-hover">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "quickview/" . $products['slug'] . "-" . $products['id']])) ?>" class="quickview-icon quickview-icon-custom"><i class="icon-export"></i><span>Quick
                                                View</span></a>
                                        <a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "view/" . $products['slug'] . "-" . $products['id']])) ?>" title="<?php echo $products['name']; ?>" class="product-image">
                                            <img id="product-collection-image-310" class="defaultImage porto-lazyload" data-src="<?php echo RootREL . 'media/upload/products/' . $products['oneImage']; ?>" width="300" height="300" />
                                            <img class="hoverImage" src="<?php echo RootREL . 'media/upload/products/' . $products['oneImage']; ?>" width="300" alt="Black" />
                                        </a>
                                        <?php if ($products['best_selling'] == 1) { ?>
                                            <div class="product-label" style="right: 10px; "><span class="new-product-icon">HOT</span></div>
                                        <?php } ?>
                                    </div>
                                    <div class="details-area">
                                        <h2 class="product-name"><a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "view/" . $products['slug'] . "-" . $products['id']])) ?>" title="<?php echo $products['name']; ?>"><?php echo $products['name']; ?></a>
                                        </h2>
                                        <ul class="configurable-swatch-list configurable-swatch-color">
                                            <li class="option-grey is-media" data-product-id="310" data-option-label="grey">
                                                <a href="javascript:void(0)" name="grey" class="swatch-link swatch-link-92 has-image" title="grey" style="height: 17px; width: 17px;">
                                                    <span class="swatch-label" style="height: 15px; width: 15px; line-height: 15px;">
                                                        <img src="https://www.portotheme.com/magento/porto/media/catalog/swatches/1/15x15/media/grey.png" alt="grey" width="15" height="15" />
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="option-green is-media" data-product-id="310" data-option-label="green">
                                                <a href="javascript:void(0)" name="green" class="swatch-link swatch-link-92 has-image" title="green" style="height: 17px; width: 17px;">
                                                    <span class="swatch-label" style="height: 15px; width: 15px; line-height: 15px;">
                                                        <img src="https://www.portotheme.com/magento/porto/media/catalog/swatches/1/15x15/media/green.png" alt="green" width="15" height="15" />
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="option-blue is-media" data-product-id="310" data-option-label="blue">
                                                <a href="javascript:void(0)" name="blue" class="swatch-link swatch-link-92 has-image" title="blue" style="height: 17px; width: 17px;">
                                                    <span class="swatch-label" style="height: 15px; width: 15px; line-height: 15px;">
                                                        <img src="https://www.portotheme.com/magento/porto/media/catalog/swatches/1/15x15/media/blue.png" alt="blue" width="15" height="15" />
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="option-black is-media" data-product-id="310" data-option-label="black">
                                                <a href="javascript:void(0)" name="black" class="swatch-link swatch-link-92 has-image" title="black" style="height: 17px; width: 17px;">
                                                    <span class="swatch-label" style="height: 15px; width: 15px; line-height: 15px;">
                                                        <img src="https://www.portotheme.com/magento/porto/media/catalog/swatches/1/15x15/media/black.png" alt="black" width="15" height="15" />
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="price-box">
                                            <span class="regular-price" id="product-price-<?php echo $products['id']; ?>">
                                                <span class="price"><?php echo "$" . $products['price']; ?></span> </span>
                                        </div>
                                        <div class="actions">
                                            <a href="javascript:showOptions('310')" class="addtocart" title="Add to Cart"><i class="icon-cart"></i><span>&nbsp;Add to
                                                    Cart</span></a>
                                            <a href='https://www.portotheme.com/magento/porto/index.php/demo1_en/ajaxcart/index/options/product_id/310/' class='fancybox' id='fancybox310' style='display:none'>Options</a>
                                            <div class="clearer"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                    <script type="text/javascript">
                        jQuery('.col-main .products-grid li:nth-child(2n)').addClass('nth-child-2n');
                        jQuery('.col-main .products-grid li:nth-child(2n+1)').addClass('nth-child-2np1');
                        jQuery('.col-main .products-grid li:nth-child(3n)').addClass('nth-child-3n');
                        jQuery('.col-main .products-grid li:nth-child(3n+1)').addClass('nth-child-3np1');
                        jQuery('.col-main .products-grid li:nth-child(4n)').addClass('nth-child-4n');
                        jQuery('.col-main .products-grid li:nth-child(4n+1)').addClass('nth-child-4np1');
                        jQuery('.col-main .products-grid li:nth-child(5n)').addClass('nth-child-5n');
                        jQuery('.col-main .products-grid li:nth-child(5n+1)').addClass('nth-child-5np1');
                        jQuery('.col-main .products-grid li:nth-child(6n)').addClass('nth-child-6n');
                        jQuery('.col-main .products-grid li:nth-child(6n+1)').addClass('nth-child-6np1');
                        jQuery('.col-main .products-grid li:nth-child(7n)').addClass('nth-child-7n');
                        jQuery('.col-main .products-grid li:nth-child(7n+1)').addClass('nth-child-7np1');
                        jQuery('.col-main .products-grid li:nth-child(8n)').addClass('nth-child-8n');
                        jQuery('.col-main .products-grid li:nth-child(8n+1)').addClass('nth-child-8np1');
                    </script>
                    <div class="toolbar-bottom">
                        <div class="toolbar">
                            <div class="sorter">
                                <div class="sort-by">
                                    <label>Sort By:</label>
                                    <select onchange="setLocation(this.value)">
                                        <option value="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories.html?dir=asc&amp;order=position" selected="selected">
                                            Position </option>
                                        <option value="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories.html?dir=asc&amp;order=name">
                                            Name </option>
                                        <option value="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories.html?dir=asc&amp;order=price">
                                            Price </option>
                                    </select>
                                    <a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories.html?dir=desc&amp;order=position" title="Set Descending Direction"><i class="icon-up"></i></a>
                                </div>

                                <p class="view-mode">
                                    <strong title="Grid" class="grid"><i class="icon-mode-grid"></i></strong>&nbsp;
                                    <a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories.html?mode=list" title="List" class="list"><i class="icon-mode-list"></i></a>&nbsp;
                                </p>
                                <div class="pager">
                                    <p class="amount">
                                        Items 1 to 12 of 18 total </p>
                                    <div class="pages">
                                        <ol>
                                            <li class="current">1</li>
                                            <li><a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories.html?p=2">2</a>
                                            </li>
                                            <li>
                                                <a class="next i-next" href="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories.html?p=2" title="Next">
                                                    <i class="icon-right-dir"></i>
                                                </a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swatches-js">
                </div>
            </div>
            <div class="col-left sidebar f-left col-lg-3">
                <div class="mobile-layer-overlay close-mobile-layer"></div>
                <div class="block-main-layer">
                    <div class="layer-filter-icon visible-sm visible-xs"><a href="javascript:void(0)"><i class="fas fa-stream"></i></a></div>
                    <h3 class="title-filter visible-sm visible-xs">Filter Your Selection<span class="close-layer"><i class="icon-cancel"></i></span></h3>
                    <div class="block block-category-nav">
                        <div class="block-title">
                            <strong><span>Categories</span></strong>
                        </div>
                        <div class="block-content">
                            <ul class="category-list">


                                <?php foreach ($this->level1 as $category1) { ?>

                                    <?php
                                        $haschild1 = false;

                                        foreach ($this->level2 as $category2) {
                                            if ($category2['parentId'] == $category1['id']) {
                                                $haschild1 = true;
                                            }
                                        } ?>
                                    <li class="<?php echo ($haschild1) ? 'has-children' : 'has-no-children'; ?>">
                                        <a href="<?php echo (vendor_app_util::url(["ctl" => "categories", "act" => "index.html?" . $category1['slug'] . "-" . $category1['id']])) ?>">
                                            <?php echo $category1['categoryName']; ?></a><?php if ($haschild1) { ?><a href="javascript:void(0)" class="plus"><i class="fas fa-plus"></i></i></a><?php } ?>
                                        <ul>
                                            <?php foreach ($this->level2 as $category2) { ?>
                                                <?php if ($category2['parentId'] == $category1['id']) { ?>
                                                    <?php
                                                                $haschild2 = false;

                                                                foreach ($this->level3 as $category3) {
                                                                    if ($category3['parentId'] == $category2['id']) {
                                                                        $haschild2 = true;
                                                                    }
                                                                } ?>
                                                    <li class="<?php echo ($haschild2) ? 'has-children' : 'has-no-children'; ?>">
                                                        <a href="<?php echo (vendor_app_util::url(["ctl" => "categories", "act" => "index.html?" . $category2['slug'] . "-" . $category2['id']])) ?>">
                                                            <?php echo $category2['categoryName']; ?></a><?php if ($haschild2) { ?><a href="javascript:void(0)" class="plus"><i class="fas fa-plus"></i></i></a><?php } ?>
                                                        <ul>
                                                            <?php foreach ($this->level3 as $category3) { ?>

                                                                <?php
                                                                                $haschild3 = false;

                                                                                foreach ($this->level4 as $category4) {
                                                                                    if ($category4['parentId'] == $category3['id']) {
                                                                                        $haschild3 = true;
                                                                                    }
                                                                                } ?>
                                                                <li class="<?php echo ($haschild3) ? 'has-children' : 'has-no-children'; ?>">
                                                                    <a href="<?php echo (vendor_app_util::url(["ctl" => "categories", "act" => "index.html?" . $category3['slug'] . "-" . $category3['id']])) ?>">
                                                                        <?php echo $category3['categoryName']; ?></a><?php if ($haschild3) { ?><a href="javascript:void(0)" class="plus"><i class="fas fa-plus"></i></i></a><?php } ?>
                                                                    <ul>
                                                                        <?php foreach ($this->level4 as $category4) { ?>
                                                                            <?php if ($category4['parentId'] == $category3['id']) { ?>
                                                                                <li class="has-no-children">
                                                                                    <a href="<?php echo (vendor_app_util::url(["ctl" => "categories", "act" => "index.html?" . $category4['slug'] . "-" . $category4['id']])) ?>">
                                                                                        <?php echo $category4['categoryName']; ?></a>

                                                                                </li>

                                                                        <?php }
                                                                                        } ?>
                                                                    </ul>
                                                                </li>


                                                            <?php } ?>
                                                        </ul>
                                                    </li>


                                            <?php }
                                                } ?>
                                        </ul>
                                    </li>


                                <?php } ?>






                            </ul>
                        </div>
                        <script type="text/javascript">
                            jQuery(function($) {
                                $(".block.block-category-nav .block-title").click(function() {
                                    if ($(this).hasClass("closed")) {
                                        $(".block.block-category-nav .block-content")
                                            .slideDown();
                                        $(this).removeClass("closed");
                                    } else {
                                        $(".block.block-category-nav .block-content").slideUp();
                                        $(this).addClass("closed");
                                    }
                                });
                                $(".block.block-category-nav .category-list a.plus").click(function() {
                                    if ($(this).parent().hasClass("opened")) {
                                        $(this).parent().children("ul").slideUp();
                                        $(this).parent().removeClass("opened");
                                        $(this).children("fas fa-minus").removeClass(
                                            "fas fa-minus").addClass(
                                            "fas fa-plus");
                                    } else {
                                        $(this).parent().children("ul").slideDown();
                                        $(this).parent().addClass("opened");
                                        $(this).children("fas fa-plus").removeClass(
                                            "fas fa-plus").addClass(
                                            "fas fa-minus");
                                    }
                                });
                            });
                        </script>
                    </div>
                    <div class="block block-layered-nav">
                        <div class="block-content">
                            <dl id="narrow-by-list">
                                <dt>Price</dt>
                                <dd>
                                    <ol>
                                        <li id="price-1">
                                            <p><span class="price">$0.00</span> - <span class="price">$9.99</span></p>
                                        </li>
                                        <li id="price-2">
                                            <p><span class="price">$10.00</span> - <span class="price">$19.99</span></p>
                                        </li>
                                        <li id="price-3">
                                            <p><span class="price">$20.00</span> - <span class="price">$29.99</span></p>
                                        </li>
                                        <li id="price-4">
                                            <p><span class="price">$30.00</span> - <span class="price">$39.99</span></p>
                                        </li>
                                        <li id="price-5">
                                            <p><span class="price">$50.00</span> and above</p>
                                        </li>
                                    </ol>
                                </dd>
                                <dt>Color</dt>
                                <dd>
                                    <ol class="configurable-swatch-list no-count">
                                        <?php foreach ($app['color'] as $key => $value) { ?>
                                            <li style="line-height: 28px;">
                                                <a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories.html?color=27" class="swatch-link has-image">
                                                    <span class="swatch-label" style="height:26px; width:26px; line-height: 28px;">
                                                        <img src="<?php echo RootREL . 'media/img/colors/' . $value . '.png'; ?>" alt="<?php echo $value ?>" title="<?php echo $value ?>" width="24" height="24" />
                                                    </span>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ol>
                                </dd>
                                <dt>Size</dt>
                                <dd>
                                    <ol class="configurable-swatch-list no-count">
                                        <li>
                                            <span class="swatch-link">
                                                <span class="swatch-label" style="height:26px; min-width:26px; line-height: 28px;">
                                                    S </span>
                                            </span>
                                        </li>
                                        <li>
                                            <a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories.html?size=7" class="swatch-link" style="line-height: 28px;">
                                                <span class="swatch-label" style="height:26px; min-width:26px; line-height: 28px;">
                                                    M </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories.html?size=6" class="swatch-link" style="line-height: 28px;">
                                                <span class="swatch-label" style="height:26px; min-width:26px; line-height: 28px;">
                                                    L </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories.html?size=5" class="swatch-link" style="line-height: 28px;">
                                                <span class="swatch-label" style="height:26px; min-width:26px; line-height: 28px;">
                                                    XL </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories.html?size=4" class="swatch-link" style="line-height: 28px;">
                                                <span class="swatch-label" style="height:26px; min-width:26px; line-height: 28px;">
                                                    2XL </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories.html?size=43" class="swatch-link" style="line-height: 28px;">
                                                <span class="swatch-label" style="height:26px; min-width:26px; line-height: 28px;">
                                                    55 </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories.html?size=42" class="swatch-link" style="line-height: 28px;">
                                                <span class="swatch-label" style="height:26px; min-width:26px; line-height: 28px;">
                                                    56 </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories.html?size=41" class="swatch-link" style="line-height: 28px;">
                                                <span class="swatch-label" style="height:26px; min-width:26px; line-height: 28px;">
                                                    57 </span>
                                            </a>
                                        </li>
                                        <li>
                                            <span class="swatch-link">
                                                <span class="swatch-label" style="height:26px; min-width:26px; line-height: 28px;">
                                                    31 </span>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="swatch-link">
                                                <span class="swatch-label" style="height:26px; min-width:26px; line-height: 28px;">
                                                    32 </span>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="swatch-link">
                                                <span class="swatch-label" style="height:26px; min-width:26px; line-height: 28px;">
                                                    33 </span>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="swatch-link">
                                                <span class="swatch-label" style="height:26px; min-width:26px; line-height: 28px;">
                                                    38 </span>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="swatch-link">
                                                <span class="swatch-label" style="height:26px; min-width:26px; line-height: 28px;">
                                                    39 </span>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="swatch-link">
                                                <span class="swatch-label" style="height:26px; min-width:26px; line-height: 28px;">
                                                    40 </span>
                                            </span>
                                        </li>
                                    </ol>
                                </dd>
                                <dt>Brand</dt>
                                <dd>
                                    <ol>
                                        <?php foreach ($this->brands as $key => $value) { ?>
                                            <li>
                                                <a href="<?php echo (vendor_app_util::url(["ctl" => "categories", "act" => "index.html?brand=" . $value['id']])) ?>"><?php echo $value['name']; ?></a>
                                            </li>
                                        <?php } ?>
                                    </ol>
                                </dd>
                            </dl>
                            <script type="text/javascript">
                                decorateDataList('narrow-by-list');
                            </script>
                            <script type="text/javascript">
                                jQuery(function($) {
                                    jQuery('#price-2').click(function() {
                                        try {
                                            window.history.pushState('', '',
                                                '<?php echo (vendor_app_util::url(["ctl" => "categories", "act" => "index.html?price=10-20"])) ?>'
                                            );

                                        } catch (err) {
                                            window.history.pushState('', '',
                                                '<?php echo (vendor_app_util::url(["ctl" => "categories", "act" => "index.html?price=10-20"])) ?>'
                                            );

                                        }
                                    });
                                    jQuery('#price-1').click(function() {
                                        try {
                                            window.history.pushState('', '',
                                                '<?php echo (vendor_app_util::url(["ctl" => "categories", "act" => "index.html?price=0-10"])) ?>'
                                            );

                                        } catch (err) {
                                            window.history.pushState('', '',
                                                '<?php echo (vendor_app_util::url(["ctl" => "categories", "act" => "index.html?price=0-10"])) ?>'
                                            );

                                        }
                                    });
                                    jQuery('#price-3').click(function() {
                                        try {
                                            window.history.pushState('', '',
                                                '<?php echo (vendor_app_util::url(["ctl" => "categories", "act" => "index.html?price=20-30"])) ?>'
                                            );

                                        } catch (err) {
                                            window.history.pushState('', '',
                                                '<?php echo (vendor_app_util::url(["ctl" => "categories", "act" => "index.html?price=20-30"])) ?>'
                                            );

                                        }
                                    });
                                    jQuery('#price-4').click(function() {
                                        try {
                                            window.history.pushState('', '',
                                                '<?php echo (vendor_app_util::url(["ctl" => "categories", "act" => "index.html?price=30-40"])) ?>'
                                            );

                                        } catch (err) {
                                            window.history.pushState('', '',
                                                '<?php echo (vendor_app_util::url(["ctl" => "categories", "act" => "index.html?price=30-40"])) ?>'
                                            );

                                        }
                                    });
                                    jQuery('#price-5').click(function() {
                                        try {
                                            window.history.pushState('', '',
                                                '<?php echo (vendor_app_util::url(["ctl" => "categories", "act" => "index.html?price=50"])) ?>'
                                            );

                                        } catch (err) {
                                            window.history.pushState('', '',
                                                '<?php echo (vendor_app_util::url(["ctl" => "categories", "act" => "index.html?price=50"])) ?>'
                                            );

                                        }
                                    });
                                    $(".block-layered-nav dt").click(function() {
                                        if ($(this).next("dd").css("display") == "none") {
                                            $(this).next("dd").slideDown(200);
                                            $(this).removeClass("closed");
                                        } else {
                                            $(this).next("dd").slideUp(200);
                                            $(this).addClass("closed");
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    jQuery(function($) {
                        $('.layer-filter-icon, .close-mobile-layer, .close-layer').click(function(
                            event) {
                            if (!$('body').hasClass('mobile-layer-shown')) {
                                $('body').addClass('mobile-layer-shown', function() {
                                    setTimeout(function() {
                                        $(document).one("click", function(e) {
                                            var target = e.target;
                                            if (!$(target).is(
                                                    '.block-main-layer .block'
                                                ) && !$(target)
                                                .parents().is(
                                                    '.block-main-layer .block'
                                                )) {
                                                $('body').removeClass(
                                                    'mobile-layer-shown'
                                                );
                                            }
                                        });
                                    }, 111);
                                });
                            } else {
                                $('body').removeClass('mobile-layer-shown');
                            }
                        });
                    });
                </script>
                <!-- <h2 class="sidebar-title" style="margin-bottom:10px">Featured</h2>
                <div class="sidebar-filterproducts custom-block">
                    <div class="filter-products owl-top-narrow">
                        <div class="products small-list sidebar-list owl-carousel owl-theme">
                            <div class="item">
                                <div class="item-area">
                                    <div class="product-image-area">
                                        <a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/men-sports-watch-brown-2xl.html" title="Men Sports Watch-Brown-2XL" class="product-image">
                                            <img class="porto-lazyload" data-src="https://www.portotheme.com/magento/porto/media/catalog/product/cache/1/small_image/82x/17f82f742ffe127f42dca9de82fb58b1/2/0/20_1_1.jpg" width="82" height="82" />
                                        </a>
                                    </div>
                                    <div class="details-area">
                                        <h2 class="product-name"><a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/men-sports-watch-brown-2xl.html" title="Men Sports Watch-Brown-2XL">Men Sports
                                                Watch-Brown-2XL</a></h2>



                                        <div class="price-box">
                                            <span class="regular-price" id="product-price-140">
                                                <span class="price">$120.00</span> </span>

                                        </div>

                                    </div>
                                    <div class="clearer"></div>
                                </div>
                                <div class="item-area">
                                    <div class="product-image-area">
                                        <a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/candle-company-smell.html" title="Candle Company Smell" class="product-image">
                                            <img class="porto-lazyload" data-src="https://www.portotheme.com/magento/porto/media/catalog/product/cache/1/small_image/82x/17f82f742ffe127f42dca9de82fb58b1/g/i/gift_03.jpg" width="82" height="82" />
                                        </a>
                                    </div>
                                    <div class="details-area">
                                        <h2 class="product-name"><a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/candle-company-smell.html" title="Candle Company Smell">Candle Company Smell</a></h2>



                                        <div class="price-box">
                                            <span class="regular-price" id="product-price-286">
                                                <span class="price">$19.00</span> </span>

                                        </div>

                                    </div>
                                    <div class="clearer"></div>
                                </div>
                                <div class="item-area">
                                    <div class="product-image-area">
                                        <a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/bar-stool-with-backrest-brown-black.html" title="Bar stool with backrest, brown-black" class="product-image">
                                            <img class="porto-lazyload" data-src="https://www.portotheme.com/magento/porto/media/catalog/product/cache/1/small_image/82x/17f82f742ffe127f42dca9de82fb58b1/d/f/df_03.jpg" width="82" height="82" />
                                        </a>
                                    </div>
                                    <div class="details-area">
                                        <h2 class="product-name"><a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/bar-stool-with-backrest-brown-black.html" title="Bar stool with backrest, brown-black">Bar stool with
                                                backrest, brown-black</a></h2>



                                        <div class="price-box">
                                            <span class="regular-price" id="product-price-276">
                                                <span class="price">$129.00</span> </span>

                                        </div>

                                    </div>
                                    <div class="clearer"></div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-area">
                                    <div class="product-image-area">
                                        <a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/camera-bag.html" title="Camera Bag" class="product-image">
                                            <img class="porto-lazyload" data-src="https://www.portotheme.com/magento/porto/media/catalog/product/cache/1/small_image/82x/17f82f742ffe127f42dca9de82fb58b1/h/o/home-9-product7_3.jpg" width="82" height="82" />
                                        </a>
                                    </div>
                                    <div class="details-area">
                                        <h2 class="product-name"><a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/camera-bag.html" title="Camera Bag">Camera Bag</a></h2>



                                        <div class="price-box">
                                            <span class="regular-price" id="product-price-213">
                                                <span class="price">$40.00</span> </span>

                                        </div>

                                    </div>
                                    <div class="clearer"></div>
                                </div>
                                <div class="item-area">
                                    <div class="product-image-area">
                                        <a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/jewellery-bracelets-2xl.html" title="Jewellery Bracelets" class="product-image">
                                            <img class="porto-lazyload" data-src="https://www.portotheme.com/magento/porto/media/catalog/product/cache/1/small_image/82x/17f82f742ffe127f42dca9de82fb58b1/4/_/4_1_2.jpg" width="82" height="82" />
                                        </a>
                                    </div>
                                    <div class="details-area">
                                        <h2 class="product-name"><a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/jewellery-bracelets-2xl.html" title="Jewellery Bracelets">Jewellery Bracelets</a></h2>



                                        <div class="price-box">
                                            <span class="regular-price" id="product-price-111">
                                                <span class="price">$189.00</span> </span>

                                        </div>

                                    </div>
                                    <div class="clearer"></div>
                                </div>
                                <div class="item-area">
                                    <div class="product-image-area">
                                        <a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/pink-fashion-dress.html" title="Pink Fashion Dress" class="product-image">
                                            <img class="porto-lazyload" data-src="https://www.portotheme.com/magento/porto/media/catalog/product/cache/1/small_image/82x/17f82f742ffe127f42dca9de82fb58b1/p/r/product_35__3.jpg" width="82" height="82" />
                                        </a>
                                    </div>
                                    <div class="details-area">
                                        <h2 class="product-name"><a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/pink-fashion-dress.html" title="Pink Fashion Dress">Pink Fashion Dress</a></h2>



                                        <div class="price-box">
                                            <span class="regular-price" id="product-price-168">
                                                <span class="price">$90.00</span> </span>

                                        </div>

                                    </div>
                                    <div class="clearer"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        jQuery(function($) {

                            var sidebar_owl = $(".small-list.sidebar-list.owl-carousel");
                            sidebar_owl.owlCarousel({
                                lazyLoad: true,
                                singleItem: true,
                                responsiveRefreshRate: 50,
                                slideSpeed: 200,
                                paginationSpeed: 500,
                                scrollPerPage: true,
                                stopOnHover: true,
                                rewindNav: true,
                                rewindSpeed: 600,
                                pagination: false,
                                navigation: true,
                                navigationText: ["<i class='icon-left-open'></i>",
                                    "<i class='icon-right-open'></i>"
                                ]
                            });

                        });
                    </script>

                </div> -->
                <h2 style="font-weight:600;font-size:16px;color:#000;line-height:1;">Custom HTML Block</h2>
                <h5 style="font-family:Arial;font-weight:400;font-size:11px;color:#878787;line-height:1;margin-bottom:13px;">
                    This is a custom sub-title.</h5>
                <p style="font-weight:400;font-size:14px;color:#666;line-height:1.42;">Lorem ipsum dolor sit
                    amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non tellus </p>
            </div>
        </div>
    </div>
</div>
<!-- <script type="text/javascript" src="<?php echo RootREL; ?>media/js/product_filter.js"></script> -->
<?php include_once 'views/layout/' . $this->layout . 'footer.php'; ?>