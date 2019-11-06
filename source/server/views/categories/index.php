<?php
global $mediaFiles;
array_push($mediaFiles['css'], RootREL . "media/css/filterproduct.css");
array_push($mediaFiles['css'], RootREL . "media/css/textproductresult.css");
array_push($mediaFiles['css'], RootREL . "media/css/pagination.css");
array_push($mediaFiles['css'], RootREL . "media/css/categories/colors.css");

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
                <p class="category-image"><img src="https://www.portotheme.com/magento/porto/media/catalog/category/men_category_banner.jpg" alt="Categories" title="Categories" /></p>
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
                    <div class="layer-filter-icon visible-sm visible-xs"><a href="javascript:void(0)"><i class="fas fa-angle-double-right"></i></a></div>
                    <h3 class="title-filter visible-sm visible-xs">Filter Your Selection<span class="close-layer"><i class="fas fa-times"></i></span></h3>
                    <!-- <div class="block block-category-nav filter-choose">
                        <div class="block-title">
                            <strong><span>Filter</span></strong>
                        </div>
                        <div class="block-content  ">
                            <div class="list-group filter-choose-content">

                            </div>
                        </div>
                    </div> -->
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
                        <script type="text/javascript">
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
                <script type="text/javascript">
                    jQuery(function($) {

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
<script src="<?php echo RootREL; ?>media/js/categories/filter.js"></script>
<script src="<?php echo RootREL; ?>media/js/products/addtocart.js"></script>
<?php include_once 'views/layout/' . $this->layout . 'footer.php'; ?>