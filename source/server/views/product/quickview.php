<?php
global $mediaFiles;
array_push($mediaFiles['css'], RootREL . "media/css/categories/colors.css");
?>
<?php include_once 'views/layout/' . $this->layout . 'header.php'; ?>
<?php foreach ($this->products as $product) { ?>

    <div class="main-container col1-layout">
        <div class="main container">
            <div class="col-main">
            <style>
            .etalage_small_thumb {
                width: 126px;
                height: 100px;
                object-fit: cover;
                object-position: center;
            }
            .etalage_small_thumbs ul .etalage_thumb_active {
                object-fit: cover;
                object-position: top;
            }
            #etalage_ODAxYmI4NDJiZTcyOWIyODQ5ODQ0NjYyMzE0MTJkNmM  {
                height: 420px!important;
            }
            #etalage_ODAxYmI4NDJiZTcyOWIyODQ5ODQ0NjYyMzE0MTJkNmM  .etalage_thumb_active .etalage_thumb_image {
                height:400px!important;
                object-position: top!important;
            }
            </style>
                <div id="messages_product_view"></div>
                <div class="product-view custom  ">
                    <div class="product-essential">
                        <input id="product_id" hidden value='<?php echo ($product['id']); ?>' />
                        <input id="product_image" hidden value='<?php echo RootREL . "media/upload/products/" . ($product['oneImage']); ?>' />
                        <input id="product_name" hidden value='<?php echo ($product['name']); ?>' />
                        <input id="product_price" hidden value='<?php echo ($product['price']); ?>' />
                        <input id="product_slug" hidden value='<?php echo ($product['slug']); ?>' />

                        <form action="" method="post" id="">
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
                                            <?php if (isset($this->previousproduct)) {
                                                    foreach ($this->previousproduct as $previousproduct) { ?>
                                                    <a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "view/" .  $previousproduct['slug'] . "-" .  $previousproduct['id']])) ?>" title="Previous Product">
                                                        <i class="fas fa-caret-left"></i>
                                                        <div class="product-pop theme-border-color">
                                                            <img class="product-image" src="<?php echo RootREL . 'media/upload/products/' . $previousproduct['oneImage']; ?>" width="100px" alt="Previous" />
                                                            <h3 class="product-name"><?php echo  $previousproduct['name']; ?></h3>
                                                        </div>
                                                    </a>
                                            <?php }
                                                } ?>
                                        </div>
                                        <div class="product-nav product-next">
                                            <?php if (isset($this->nextproduct)) {
                                                    foreach ($this->nextproduct as $nextproduct) { ?>
                                                    <a class="product-next" href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "view/" .  $nextproduct['slug'] . "-" .   $nextproduct['id']])) ?>" title="Next Product">
                                                        <i class="fas fa-caret-right"></i>
                                                        <div class="product-pop theme-border-color">
                                                            <img class="product-image" src="<?php echo RootREL . 'media/upload/products/' . $nextproduct['oneImage']; ?>" width="100px" alt="Previous" />
                                                            <h3 class="product-name"><?php echo  $nextproduct['name']; ?></h3>
                                                        </div>
                                                    </a>
                                            <?php }
                                                } ?>
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
                                    <div class="short-view ">
                                      
                                        <div class="std"><?php echo "Views: ".$product['num_of_view']; ?></div>
                                    </div>
                                    <div class="product-info">
                                        <div>
                                            <p class="in-stock">Availability: <span class="<?php echo ($product['quantity'] == 0) ? 'out-of-stock' : (($product['quantity'] > 0 && $product['quantity'] < 15) ? 'running-low' : 'availability'); ?>"><?php echo ($product['quantity'] == 0) ? 'Out of stock' : (($product['quantity'] > 0 && $product['quantity'] < 15) ? 'Running low' : 'In stock'); ?></span>
                                            </p>
                                            <div class="price-box">
                                                <span class="regular-price" id="product-price-<?= $product['id'] ?>">
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
                                            <dt>
                                                <h5 class="error-color" style="color:red;display:none">Choose a color!</h5>
                                            </dt><br>
                                            <dd>
                                                <ul class="configurable-swatch-list no-count colors">
                                                    <?php $product['color'] = explode(",", $product['color']); ?>
                                                    <?php foreach ($product['color'] as $color) { ?>
                                                        <label for="id-color-<?php echo $color; ?>">
                                                            <li style=" line-height: 28px;">
                                                                <div class=" swatch-link has-image choose-color" value="<?php echo $color ?>">
                                                                    <span class="swatch-label" style="height:24px; width:24px; line-height: 28px;">
                                                                        <img src="<?php echo RootREL . 'media/img/colors/' . $color . '.png'; ?>" alt="<?php echo $color ?>" title="<?php echo $color ?>" width="24" height="24" />
                                                                    </span>
                                                                </div>
                                                                <input name="colorss" type="radio" class="filter_all color" id="id-color-<?php echo $color; ?>" value="<?php echo $color; ?>" hidden>
                                                            </li>
                                                        </label>
                                                    <?php } ?>
                                                </ul>
                                            </dd>
                                            <dt class="swatch-attr">
                                                <label id="size_label" class="required">
                                                    <em>*</em>Size:
                                                    <span id="select_label_size" class="select-label"></span>
                                                </label>
                                            </dt>
                                             <dt>
                                                <h5 class="error-size" style="color:red;display:none">Choose a size!</h5>
                                            </dt><br>
                                            <dd class="clearfix  last">
                                                <div class="input-box">
                                                   
                                                    <ul id="configurable_swatch_size" class="configurable-swatch-list clearfix sizes">
                                                     <?php $product['size'] = explode(",", $product['size']); ?>
                                                        <?php foreach ($product['size'] as $key=> $size) { ?>
                                                            <label for="id-size-<?php echo $size; ?>" style ="line-height: 2.4;">
                                                                <li  style ="border:1px solid gray" class="clearfix">
                                                                    <span class="clearfix">
                                                                        <span class="swatch-label" style="height:30px; width:30px;">
                                                                            <?= $size ?> </span>
                                                                    </span>
                                                                    <input  name="sizess"  type="radio"  class="filter_all size" id="id-size-<?php echo $size; ?>" value="<?php echo $size; ?>" hidden>
                                                                </li>
                                                            </label>
                                                        <?php }?>
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
                                                <span class="price"></span> </span>
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
                                            <button type="button" title="Add to Cart" supplier ="<?= $product['user_id']; ?>" name="<?= $product['name']; ?>" slug="<?= $product['slug']; ?>" class="button btn-cart"><span><span>Add to
                                                        Cart</span></span></button>
                                            <span id='ajax_loader' style='display:none'><i class="ajax-loader small animate-spin"></i></span>
                                        </div>
                                        <ul class="add-to-links">
                                            <li title="Add to Wish list " class="addWishlistJs" supplier ="<?= $product['user_id']; ?>" ><a href="javascript:void(0)" class="link-wishlist"> <img style="padding-top:10px;" width="50%" src="<?php echo RootREL . 'media/img/wishlist.png'; ?>" alt="Wish list" /><span>Add
                                                        to Wishlist</span></a></li>
                                            <li title="Add to Compare"><a href="javascript:void(0)" onclick="ajaxCompare(this,'https://www.portotheme.com/magento/porto/index.php/demo1_en/catalog/product_compare/add/product/319/uenc/aHR0cHM6Ly93d3cucG9ydG90aGVtZS5jb20vbWFnZW50by9wb3J0by9pbmRleC5waHAvZGVtbzFfZW4vY2F0ZWdvcmllcy9zdHJpcGUtdHJpbS1hdGhsZXRpYy1tZXNoLXRlZS5odG1sP19fX1NJRD1V/form_key/gRxWBEl2ZMe5EQyi/','319'); return false;" class="link-compare"><i class="icon-compare"></i><span>Add
                                                        to Compare</span></a></li>

                                        </ul>
                                    </div>
                                    <div class="clearer"></div>
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
            </div>
        </div>
    </div>
<?php }  ?>
<script src="<?php echo RootREL; ?>media/js/products/zoomimage.js"></script>
<script src="<?php echo RootREL; ?>media/js/products/mylazyLoad.js"></script>
<script src="<?php echo RootREL; ?>media/js/products/addtocart.js"></script>