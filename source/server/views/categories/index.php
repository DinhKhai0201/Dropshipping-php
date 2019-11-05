<?php
global $mediaFiles;
array_push($mediaFiles['css'], RootREL . "media/css/filterproduct.css");
array_push($mediaFiles['css'], RootREL . "media/css/textproductresult.css");
array_push($mediaFiles['css'], RootREL . "media/css/pagination.css");



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
                <p class="category-image"><img src="https://www.portotheme.com/magento/porto/media/catalog/category/men_category_banner.jpg" alt="Categories" title="Categories" /></p>
                <div class="page-title category-title">
                    <h1>Categories</h1>
                </div>
                <script type="text/javascript">
                    var dailydealTimeCountersCategory = new Array();
                    var i = 0;
                </script>

                <div class="category-products">
                    <div class="toolbar">
                        <div class="sorter">
                            <div class="sort-by">
                                <label>Sort By:</label>
                                <select class="filter_all sort">
                                    <option value="id" selected="selected">
                                        Position </option>
                                    <option value="name">
                                        Name </option>
                                    <option value="price">
                                        Price </option>
                                </select>
                            </div>
                            <div class="sort-by">
                                <label>Type By:</label>
                                <select class="filter_all type">
                                    <option value="asc" selected="selected">
                                        Top to Bottom </option>
                                    <option value="desc">
                                        Bottom to Top </option>
                                </select>
                            </div>
                            <!-- <p class="view-mode">
                                <strong title="Grid" class="grid"><i class="fas fa-th"></i></strong>&nbsp;
                                <a href="https://www.portotheme.com/magento/porto/index.php/demo1_en/categories.html?mode=list" title="List" class="list"><i class="fas fa-list-ul"></i></a>&nbsp;
                            </p> -->
                        </div>
                    </div>
                    <ul class="products-grid  columns4 hide-addtocart move-action filter_data">
                        <div class="message-result">
                            <p>Result Products</p>
                            <span>Has <span class="number"><?php echo $this->products['norecords']; ?></span> products found. </span>
                        </div>
                        <div class="products-display">
                            <?php foreach ($this->products['data'] as $products) { ?>
                                <li class="item">
                                    <div class="item-area product-image-hover">
                                        <div class="product-image-area ">
                                            <div class="loader-container">
                                                <div class="loader">
                                                    <i class="ajax-loader medium animate-spin"></i>
                                                </div>
                                            </div>
                                            <a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "quickview/" . $products['slug'] . "-" . $products['id']])) ?>" class="quickview-icon quickview-icon-custom"><i class="icon-export"></i><span>Quick
                                                    View</span></a>
                                            <a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "view/" . $products['slug'] . "-" . $products['id']])) ?>" title="<?php echo $products['name']; ?>" class="product-image">
                                                <img id="product-collection-image-<?php echo $products['id']; ?>" class="defaultImage porto-lazyload" data-src="<?php echo RootREL . 'media/upload/products/' . $products['oneImage']; ?>" width="300" height="300" />
                                                <img class="hoverImage" src="<?php echo RootREL . 'media/upload/products/' . $products['oneImage']; ?>" width="300" alt="Black" />
                                            </a>
                                            <?php if ($products['best_selling'] == 1) { ?>
                                                <div class="product-label" style="right: 10px; "><span class="new-product-icon">HOT</span></div>
                                            <?php } ?>
                                        </div>
                                        <div class="details-area">
                                            <h2 class="product-name"><a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "view/" . $products['slug'] . "-" . $products['id']])) ?>" title="<?php echo $products['name']; ?>"><?php echo $products['name'] ?></a>
                                            </h2>
                                            <ul class="configurable-swatch-list configurable-swatch-color">
                                                <?php $products['color'] = explode(",", $products['color']);
                                                    ?>
                                                <?php foreach ($products['color'] as $color) { ?>
                                                    <li class="option-grey is-media" data-product-id="310" data-option-label="<?php echo $color ?>">
                                                        <a href="javascript:void(0)" name="<?php echo $color ?>" class="swatch-link swatch-link-92 has-image" title="<?php echo $color ?>" style="height: 17px; width: 17px;">
                                                            <span class="swatch-label" style="height: 15px; width: 15px; line-height: 15px;">
                                                                <img src="<?php echo RootREL . 'media/img/colors/' . $color . '.png'; ?>" alt="<?php echo $color ?>" width="15" height="15" />
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>


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
                        </div>
                    </ul>
                    <!-- <script type="text/javascript">
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
                    </script> -->
                    <div class="toolbar-bottom">
                        <div class="toolbar">
                            <div class="sorter">
                                <div class="sort-by">
                                    <label>Sort By:</label>
                                    <select class="filter_all sort">
                                        <option value="id" selected="selected">
                                            Position </option>
                                        <option value="name">
                                            Name </option>
                                        <option value="price">
                                            Price </option>
                                    </select>
                                    <a href="" title="Set Descending Direction"><i class="icon-up"></i></a>
                                </div>

                                <div class="pager">
                                    <p class="amount">
                                        Items <?php echo ($this->products['nopp'] * ($this->products['curp'] - 1) + 1); ?> to <?php echo ($this->products['nopp'] * ($this->products['curp'] - 1) + $this->products['nocurp']); ?> of <?php echo $this->products['norecords']; ?> total </p>
                                    <div class="pages">
                                        <ol>
                                            <li>
                                                <span class="precious i-precious" href="" title="Precious">
                                                    <i class="fas fa-chevron-left"></i>
                                                </span>
                                            </li>
                                            <?php for ($i = 1; $i <= ceil($this->products['norecords'] / $this->products['nopp']); $i++) {  ?>
                                                <?php if ($this->products['curp'] == $i) { ?>
                                                    <li class="current"><?php echo $this->products['curp']; ?></li>
                                                <?php } else { ?>
                                                    <li value="<?php echo $i; ?>" class="page page-<?php echo $i ?>"><?php echo $i; ?>
                                                    </li>
                                            <?php }
                                            } ?>
                                            <!-- <li class="current">1</li>
                                            <li><a href="">2</a>
                                            </li> -->
                                            <li>
                                                <span class="next i-next" href="" title="Next">
                                                    <i class="fas fa-chevron-right"></i>
                                                </span>
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
                    <h3 class="title-filter visible-sm visible-xs">Filter Your Selection<span class="close-layer"><i class="fas fa-times"></i></span></h3>
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
                                        <input type="checkbox" class="filter_all cat" value="<?php echo $category1['id']; ?>"><span>
                                            <a href="<?php echo (vendor_app_util::url(["ctl" => "categories", "act" => "index.html?" . $category1['slug'] . "-" . $category1['id']])) ?>">
                                                <?php echo $category1['categoryName']; ?></a><?php if ($haschild1) { ?><a href="javascript:void(0)" class="plus"><i class="fas fa-plus"></i></i></a><?php } ?></span>
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
                                                        <input type="checkbox" class="filter_all  cat" value="<?php echo $category2['id']; ?>"><span>
                                                            <a href="<?php echo (vendor_app_util::url(["ctl" => "categories", "act" => "index.html?" . $category2['slug'] . "-" . $category2['id']])) ?>">
                                                                <?php echo $category2['categoryName']; ?></a><?php if ($haschild2) { ?><a href="javascript:void(0)" class="plus"><i class="fas fa-plus"></i></i></a><?php } ?></span>
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
                                                                    <input type="checkbox" class="filter_all  cat" value="<?php echo $category3['id']; ?>"><span>
                                                                        <a href="<?php echo (vendor_app_util::url(["ctl" => "categories", "act" => "index.html?" . $category3['slug'] . "-" . $category3['id']])) ?>">
                                                                            <?php echo $category3['categoryName']; ?></a><?php if ($haschild3) { ?><a href="javascript:void(0)" class="plus"><i class="fas fa-plus"></i></i></a><?php } ?></span>
                                                                    <ul>
                                                                        <?php foreach ($this->level4 as $category4) { ?>
                                                                            <?php if ($category4['parentId'] == $category3['id']) { ?>
                                                                                <li class="has-no-children">
                                                                                    <input type="checkbox" class="filter_all  cat" value="<?php echo $category4['id']; ?>"><span>
                                                                                        <a href="<?php echo (vendor_app_util::url(["ctl" => "categories", "act" => "index.html?" . $category4['slug'] . "-" . $category4['id']])) ?>">
                                                                                            <?php echo $category4['categoryName']; ?></a></span>
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
                                    // console.log($(this).parent().parent().children("ul"));
                                    if ($(this).parent().hasClass("opened")) {
                                        $(this).parent().parent().children("ul").slideUp();
                                        $(this).parent().removeClass("opened");
                                        $(this).parent().children("fas fa-minus").removeClass(
                                            "fas fa-minus").addClass(
                                            "fas fa-plus");
                                    } else {
                                        $(this).parent().parent().children("ul").slideDown();
                                        $(this).parent().addClass("opened");
                                        $(this).parent().children("fas fa-plus").removeClass(
                                            "fas fa-plus").addClass(
                                            "fas fa-minus");
                                    }
                                });
                                $("input[type='checkbox']").change(function() {
                                    $(this).siblings('ul')
                                        .find("input[type='checkbox']")
                                        .prop('checked', this.checked);
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
                                        <li>
                                            <div class="list-group">
                                                <input type="hidden" id="min_price_hide" value="0" />
                                                <input type="hidden" id="max_price_hide" value="300" />
                                                <p id="price_show">$1 - $300</p>
                                                <div id="price_range"></div>
                                            </div>
                                        </li>
                                    </ol>
                                </dd>
                                <dt>Color</dt>
                                <dd>
                                    <ol class="configurable-swatch-list no-count">
                                        <?php foreach ($app['color'] as $key => $value) { ?>
                                            <label for="id-color-<?php echo $value; ?>">
                                                <li style=" line-height: 28px;">

                                                    <div class=" swatch-link has-image choose-color" value="<?php echo $value ?>">
                                                        <span class="swatch-label" style="height:26px; width:26px; line-height: 28px;">
                                                            <img src="<?php echo RootREL . 'media/img/colors/' . $value . '.png'; ?>" alt="<?php echo $value ?>" title="<?php echo $value ?>" width="24" height="24" />
                                                        </span>
                                                    </div>

                                                    <input type="checkbox" class="filter_all color" id="id-color-<?php echo $value; ?>" value="<?php echo $value; ?>" hidden>

                                                </li>
                                            </label>
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
                                            <li> <input type="checkbox" class="filter_all brand" value="<?php echo $value['id']; ?>"><span>
                                                    <label><?php echo $value['name']; ?></label></span>
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
<script type="text/javascript" src="<?php echo RootREL; ?>media/js/jquery-1.11.1.min.js"></script>

<script type="text/javascript" src="<?php echo RootREL; ?>media/js/jquery-ui.js"></script>
<script>
    $(document).ready(function() {
        $(".pages ol").on("click", ".page", function() {
            let page = $(this).val();
            let url = window.location.href;
            if ((/categories\/page-(.*).html\?s=(.*)/g).test(url)) {
                var searchold = ((/categories\/page-(.*).html\?s=(.*)$/g).exec(url))[2];
            }
            window.history.pushState('', '', rootUrl +
                'categories/page-' + page + '.html?s=' + ((searchold != null) ? searchold : '')
            );
            location.reload();
        });
    });
</script>
<script>
    function tmp_product(product, RootREL, rootUrl) {
        let tmp = '';
        tmp += ` 
                 <li class="item">
                                <div class="item-area product-image-hover">
                                    <div class="product-image-area " style="width: 100%;height: 100%;">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="${rootUrl}product/quickview/${product.slug}-${product.id}" class="quickview-icon quickview-icon-custom"><i class="icon-export"></i><span>Quick
                                                View</span></a>
                                        <a href="${rootUrl}product/view/${product.slug}-${product.id}" title="${product.name}" class="product-image">
                                            <img id="product-collection-image-${product.id}" class="defaultImage porto-lazyload" data-src="${RootREL}media/upload/products/${product.oneImage}" width="300" height="300" src="${RootREL}media/upload/products/${product.oneImage}" />
                                            <img class="hoverImage" src="${RootREL}media/upload/products/${product.oneImage}" width="300" alt="Black" />
                                        </a>`;
        if (product.best_selling == 1) {
            tmp += `<div class="product-label " style="right: 10px;"><span class="new-product-icon">HOT</span></div>`;
        }
        tmp += `                           
                                    </div>
                                    <div class="details-area">
                                        <h2 class="product-name"><a href="${rootUrl}product/view/${product.slug}-${product.id}" title="${product.name}">${product.name}</a>
                                        </h2>
                                        <ul class="configurable-swatch-list configurable-swatch-color">`;
        let colors = product.color.split(",");
        colors.forEach(color => {
            tmp += `                  <li class="option-${color} is-media" data-product-id="${product.id}" data-option-label="${color}">
                                                        <span class="swatch-label" style="height: 15px; width: 15px; line-height: 15px;">
                                                            <img src="${RootREL}media/img/colors/${color}.png" alt="${color}" width="15" height="15" />
                                                        </span>
                                                </li>
            
            `;
        });
        tmp += `                              
           
                                        </ul>
                                        <div class="price-box">
                                            <span class="regular-price" id="product-price-${product.id}; ?>">
                                                <span class="price">$${product.price}</span> </span>
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
            `;
        return tmp;
    }

    function tmp_page(products) {
        let tmp = '';
        tmp += `
                <p class="amount">
                    Items ${products.nopp *( products.curp - 1) + 1 } to ${products.nopp * (products.curp - 1) + products.nocurp} of ${products.norecords} total </p>
                <div class="pages">
                    <ol>
                        <li>
                            <span class="precious i-precious" href="" title="Precious">
                                <i class="fas fa-chevron-left"></i>
                            </span>
                        </li>`;
        for (let index = 1; index <= Math.ceil(products.norecords / products.nopp); index++) {
            if (products.curp == index) {
                tmp += `<li class = "current" > ${products.curp} </li>`;
            } else {
                tmp += `<li value = "${index}" class = "page page-${index}" >${index}</li>`;
            }
        }
        tmp += `<li >
            <span class = "next i-next" href = "" title = "Next" >
            <i class = "fas fa-chevron-right" > </i> </span > </li> </ol > 
            </div>
        `;
        return tmp;
    }


    $(document).ready(function() {
        function get_cat_click() {
            let cat = [];
            $('.cat:checked').each(function() {
                cat.push($(this).val());
            });
            cat = cat.filter((element, indexOfElement) => {
                return indexOfElement === cat.indexOf(element)
            });
            return cat;

        }
        $('.choose-color').click(function() {
            var a = $(this).attr("value");
            console.log(a);
        });

        function filter_data() {
            var search;
            var page;
            if ((/categories\/page-(.*).html\?s=(.*)/g).test(window.location.href)) {
                page = ((/categories\/page-(.*).html\?s=(.*)$/g).exec(window.location.href))[1];
                search = ((/categories\/page-(.*).html\?s=(.*)$/g).exec(window.location.href))[2];
            }
            var minimum_price = $('#min_price_hide').val();
            var maximum_price = $('#max_price_hide').val();
            var brand = get_filter('brand');
            var color = get_filter('color');
            var gender = get_filter('gender');
            var cat = get_cat_click();
            var sort = $('.sort').val();
            var type = $('.type').val();
            $.ajax({
                url: rootUrl + "categories/fetch_data",
                method: "POST",
                data: {
                    minimum_price: minimum_price,
                    maximum_price: maximum_price,
                    brand: brand,
                    color: color,
                    gender: gender,
                    cat: cat,
                    search: search,
                    sort: sort,
                    type: type,
                    page: page
                },
                success: function(data) {
                    // console.log(data);
                    $('.products-display').empty();
                    $('.pager').empty();
                    let product = JSON.parse(data);
                    let products = JSON.parse(data)['data'];
                    // let norecords = JSON.parse(data)['norecords'];
                    let html = '';
                    products.forEach(element => {
                        html += tmp_product(element, RootREL, rootUrl);
                    });
                    $('.products-display').html(html);
                    $(' .message-result span.number').html(product.norecords);
                    $('.pager').html(tmp_page(product));

                }
            });
        }

        function get_filter(class_name) {
            var filter = [];
            $('.' + class_name + ':checked').each(function() {
                filter.push($(this).val());
            });
            return filter;
        }
        $('.filter_all').click(function() {
            filter_data();
        });
        //sort 
        var sort = $('.sort').val();
        var type = $('.type').val();

        $('.sort').on('change', function() {
            sort = $(this).val();
        });
        $('.type').on('change', function() {
            type = $(this).val();

        });
        $('.bt-sort').click(function() {
            filter_data();
        });
        $('#price_range').slider({
            range: true,
            min: 1,
            max: 300,
            values: [1, 300],
            step: 1,
            stop: function(event, ui) {
                $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                $('#min_price_hide').val(ui.values[0]);
                $('#max_price_hide').val(ui.values[1]);
                filter_data();
            }
        });




    });
</script>
<?php include_once 'views/layout/' . $this->layout . 'footer.php'; ?>