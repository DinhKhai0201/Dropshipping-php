<?php
global $mediaFiles;
array_push($mediaFiles['css'], RootREL . "media/css/filterproduct.css");
array_push($mediaFiles['css'], RootREL . "media/css/textproductresult.css");
array_push($mediaFiles['css'], RootREL . "media/css/pagination.css");
array_push($mediaFiles['css'], RootREL . "media/css/categories/colors.css");
array_push($mediaFiles['css'], RootREL . "media/css/foot_page.css");
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
                <p class="category-image"><img src="<?php echo RootREL; ?>media/catalog/men_category_banner.jpg" alt="Categories" title="Categories" /></p>
                <div class="page-title category-title">
                    <h1>Categories</h1>
                </div>
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
                            <div class="sort-cat-products">
                                <button class="bt-sort-cat-products">Sort</button>
                            </div>
                        </div>
                    </div>
                    <ul class="products-grid  columns4 hide-addtocart move-action filter_data">
                        <div class="message-result">
                            <p>Result Products</p>
                            <span>Has <span class="number"><?php echo $this->products['norecords']; ?></span> products found. </span>
                        </div>
                        <div class="products-display clearfix">
                            <?php foreach ($this->products['data'] as $products) { ?>
                                <li class="item">
                                    <div class="item-area product-image-hover">
                                        <div class="product-image-area ">
                                            <div class="loader-container">
                                                <div class="loader">
                                                    <i class="ajax-loader medium animate-spin"></i>
                                                </div>
                                            </div>
                                            <a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "quickview/" . $products['slug'] . "-" . $products['id']])) ?>" class="quickview-icon quickview-icon-custom click-view-bt" key="<?= $products['id'] ?>" ><i class="icon-export"></i><span>Quick
                                                    View</span></a>
                                            <a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "view/" . $products['slug'] . "-" . $products['id']])) ?>" title="<?php echo $products['name']; ?>" class="product-image click-view-bt" key="<?= $products['id'] ?>">
                                                <img id="product-collection-image-<?php echo $products['id']; ?>" class="defaultImage porto-lazyload" data-src="<?php echo RootREL . 'media/upload/products/' . $products['oneImage']; ?>" width="300" height="300" />
                                                <img class="hoverImage" src="<?php echo RootREL . 'media/upload/products/' . $products['oneImage']; ?>" width="300" alt="Black" style="object-fit: cover;object-position: center;" />
                                            </a>
                                            <?php if (isset($products['coupons_type'])) {
                                                    if (intval($products['coupons_type']) == 0) {
                                                        echo
                                                            '<div class="product-label" style="right: 10px;position: absolute;font-size: 14px;font-weight: 700;color: #fff;line-height: 1;top: 39px;z-index: 3;"><span class="sale-product-icon" style ="padding: 6px;">-' . $products['coupons_percent_value'] . "%</span></div>";
                                                    } else if (intval($products['coupons_type']) == 1) {
                                                        echo '<div class="product-label" style="right: 10px;position: absolute;font-size: 14px;font-weight: 700;color: #fff;line-height: 1;top: 39px;z-index: 3;"><span class="sale-product-icon " padding: 6px;>-$' . $products['coupons_fix_value'] . "</span></div>";
                                                    }
                                                } ?>
                                            <?php if ($products['best_selling'] == 1) { ?>
                                                <div class="product-label" style="right: 10px; "><span class="new-product-icon">HOT</span></div>
                                            <?php } ?>
                                        </div>
                                        <div class="details-area">
                                            <h2 class="product-name"><a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "view/" . $products['slug'] . "-" . $products['id']])) ?>" key="<?= $products['id'] ?>" class="click-view-bt"><?php echo $products['name'] ?></a>
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
                                                <a href='' class='fancybox' id='fancybox310' style='display:none'>Options</a>
                                                <div class="clearer"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </div>
                    </ul>
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

                                <?php vendor_html_helper::paginationajax($this->products['norecords'], $this->products['nocurp'], $this->products['curp'], $this->products['nopp']); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swatches-js">
                </div>
            </div>
            <div class="col-left sidebar f-left col-lg-3 top-fix">
                <div class="mobile-layer-overlay close-mobile-layer"></div>
                <div class="block-main-layer">
                    <div class="layer-filter-icon visible-sm visible-xs"><a href="javascript:void(0)"><i class="fas fa-angle-double-right"></i></a></div>
                    <h3 class="title-filter visible-sm visible-xs">Filter Your Selection<span class="close-layer"><i class="fas fa-times"></i></span></h3>
                </div>
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
                                    <input type="checkbox" class="filter_all_cat cat" value="<?php echo $category1['id']; ?>"><span>
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
                                                    <input type="checkbox" class="filter_all_cat  cat" value="<?php echo $category2['id']; ?>"><span>
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
                                                                <input type="checkbox" class="filter_all_cat  cat" value="<?php echo $category3['id']; ?>"><span>
                                                                    <a href="<?php echo (vendor_app_util::url(["ctl" => "categories", "act" => "index.html?" . $category3['slug'] . "-" . $category3['id']])) ?>">
                                                                        <?php echo $category3['categoryName']; ?></a><?php if ($haschild3) { ?><a href="javascript:void(0)" class="plus"><i class="fas fa-plus"></i></i></a><?php } ?></span>
                                                                <ul>
                                                                    <?php foreach ($this->level4 as $category4) { ?>
                                                                        <?php if ($category4['parentId'] == $category3['id']) { ?>
                                                                            <li class="has-no-children">
                                                                                <input type="checkbox" class="filter_all_cat  cat" value="<?php echo $category4['id']; ?>"><span>
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
                        <div class="filter-cat">
                            <button class="bt-filter-cat">Filter category</button>
                        </div>
                    </div>

                </div>
                <div class="block block-layered-nav">
                    <div class="block-content">
                        <dl id="narrow-by-list">
                            <dt>Price</dt>
                            <dd class="odd">
                                <div class="price price-filter-slider">
                                    <div>
                                        <div class="slider-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                            <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 49.4048%; width: 50.5952%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 49.4048%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span>
                                        </div>
                                        <div class="text-box">
                                            <span>from</span> <input type="text" name="min" id="min_price_hide" class="priceTextBox minPrice" value="1" style="border:solid 1px #eee; color: #a3a2a2; padding: 2px 5px; font-size: 14px; margin: 0 2px; width: 50px;">
                                            <span>to</span> <input type="text" name="max" id="max_price_hide" class="priceTextBox maxPrice" value="300" style="border:solid 1px #eee; color: #a3a2a2; padding: 2px 5px; font-size: 14px; margin: 0 2px; width: 50px;">
                                            <input type="button" value="GO" name="go" class="go" style="">
                                            <input type="hidden" id="amount" class="price-amount" style="background:none; border:none;" value="$115 - $200">
                                        </div>

                                    </div>
                                    <div class="clearer"></div>
                                </div>

                            </dd>
                            <dt>Color</dt>
                            <dd>
                                <ol class="configurable-swatch-list no-count colors">
                                    <?php foreach ($app['color'] as $key => $value) { ?>
                                        <label for="id-color-<?php echo $value; ?>">
                                            <li style=" line-height: 28px;">
                                                <div class=" swatch-link has-image choose-color" value="<?php echo $value ?>">
                                                    <span class="swatch-label" style="height:24px; width:24px; line-height: 28px;">
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
                                <ol class="configurable-swatch-list no-count sizes">
                                    <?php foreach ($app['size'] as $key => $value) { ?>
                                        <label for="id-size-<?php echo $value; ?>">
                                            <li>
                                                <span class="swatch-link">
                                                    <span class="swatch-label" style="height:26px; min-width:26px; line-height: 28px;">
                                                        <?= $value ?> </span>
                                                </span>
                                                <input type="checkbox" class="filter_all size" id="id-size-<?php echo $value; ?>" value="<?php echo $value; ?>" hidden>
                                            </li>
                                        </label>
                                    <?php } ?>

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

                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src="<?php echo RootREL; ?>media/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo RootREL; ?>media/js/jquery-ui.js"></script>
<script src="<?php echo RootREL; ?>media/js/jquery.twbsPagination.min.js"></script>
<script src="<?php echo RootREL; ?>media/js/categories/filter.js"></script>
<script src="<?php echo RootREL; ?>media/js/products/addtocart.js"></script>
<script src="<?php echo RootREL; ?>media/js/products/view.js"></script>
<?php include_once 'views/layout/' . $this->layout . 'footer.php'; ?>