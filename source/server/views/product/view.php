<?php
global $mediaFiles;
array_push($mediaFiles['css'], RootREL . "media/css/categories/colors.css");
array_push($mediaFiles['css'], RootREL . "media/css/product/comment.css");
array_push($mediaFiles['css'], RootREL . "media/css/product/rate.css");


?>
<?php include_once 'views/layout/' . $this->layout . 'top.php'; ?>
<?php foreach ($this->products as $product) { ?>
    <div class="modaly">
        <div class="modal-contenty">
            <span class="close-button">&times;</span>
            <h3 class="modaly-title">Notification!</h3>
            <hr>
            <div class="row modaly-body">
                <p style="color:blue">Review successfully </p>
            </div>
        </div>
    </div>
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

                                        <div class="row" style="margin-left:0px">
                                            <p class="star-one"><?= $this->avenge ?>/5</p>
                                            <div id="156" class="ratingbar" data-rating-value="<?= round($this->avenge) ?>">
                                                <i id="1" class="ratingstar far fa-star"></i>
                                                <i id="2" class="ratingstar far fa-star"></i>
                                                <i id="3" class="ratingstar far fa-star"></i>
                                                <i id="4" class="ratingstar far fa-star"></i>
                                                <i id="5" class="ratingstar far fa-star"></i>
                                            </div>
                                            <p class="rating-links">
                                                <a href="javascript:void(0)"><?= $this->one + $this->two + $this->three + $this->four + $this->five ?> Review(s)</a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="short-description ">
                                        <h2>Quick Overview</h2>
                                        <div class="std"><?php echo $product['description']; ?></div>
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
                                                                <input type="checkbox" class="filter_all color" id="id-color-<?php echo $color; ?>" value="<?php echo $color; ?>" hidden>
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
                                            <button type="button" title="Add to Cart" supplier="<?= $product['user_id']; ?>" name="<?= $product['name']; ?>" slug="<?= $product['slug']; ?>" class="button btn-cart"><span><span>Add to
                                                        Cart</span></span></button>
                                            <span id='ajax_loader' style='display:none'><i class="ajax-loader small animate-spin"></i></span>
                                        </div>
                                        <ul class="add-to-links">
                                            <li title="Add to Wish list " class="addWishlistJs" supplier="<?= $product['user_id']; ?>"><a href="javascript:void(0)" class="link-wishlist"> <img style="padding-top:10px;" width="50%" src="<?php echo RootREL . 'media/img/wishlist.png'; ?>" alt="Wish list" /><span>Add
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
                    <div class="product-collateral">
                        <div class="collateral-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="product-tabs horizontal">
                                        <ul>
                                            <li id="tab_description_tabbed" class=" active first"><a href="#">Description</a>
                                            </li>
                                            <li id="tab_tags_tabbed" class=""><a href="#">Comment</a></li>
                                            <li id="tab_review_tabbed" class=""><a href="#">Reviews</a></li>
                                        </ul>
                                        <div class="clearer"></div>
                                        <div class="tab-content" id="tab_description_tabbed_contents">
                                            <h2>Details</h2>
                                            <div class="std">
                                                <?php echo $product['description']; ?>
                                            </div>
                                        </div>
                                        <div class="tab-content" id="tab_tags_tabbed_contents">
                                            <div class="box-collateral box-tags">
                                                <div class="col-md-9 col-md-offset-3 comments-section comment-append">
                                                    <div class="clearfix" id="comment_form">
                                                        <h4>Post a comment:</h4>
                                                        <textarea type="text" placeholder="Post your comment" id="comment_text" class="form-control" cols="30" rows="3"></textarea>
                                                        <?php if (isset($_SESSION['user'])) { ?>
                                                            <a key_p="<?php echo $product['id']; ?>" href="javascript:void(0)" class="btn btn-primary btn-sm pull-right comment-bt" id="submit_comment">Submit comment</a>
                                                        <?php } else { ?>
                                                            <a href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'login')); ?>" class="btn btn-primary btn-sm pull-right comment-bt">Submit comment</a>
                                                        <?php } ?>
                                                    </div>

                                                    <h2><span id="comments_count"><?= $this->comment['norecords'] ?></span> Comment(s)</h2>
                                                    <hr>
                                                    <?php foreach ($this->comment['data'] as $comment) { ?>
                                                        <div id="comments-wrapper-<?= $comment['id'] ?>">
                                                            <div class="comment clearfix">
                                                                <img src=" <?php echo RootREL . "media/upload/users/" . (!empty($comment['user_avata']) ? $comment['user_avata'] : 'no_image.png'); ?>" alt="" class="profile_pic">
                                                                <div class="comment-details">
                                                                    <span class="comment-name"><?= $comment['users_firstname'] ?></span>
                                                                    <span class="comment-date"><?= date("F j, Y ", strtotime($comment["created"])); ?></span>
                                                                    <p><?= $comment['contents'] ?></p>
                                                                    <a class="reply-btn" href="javascript:void(0)">reply</a> <br>
                                                                    <div class="clearfix show-reply show-replay-<?= $comment['id'] ?>" style="display:none">
                                                                        <textarea type="text" placeholder="Post your reply" id="comment_reply" class="comment_reply_<?= $comment['id'] ?> form-control input-text" cols="30" rows="3"></textarea>
                                                                        <?php if (isset($_SESSION['user'])) { ?>
                                                                            <a key_p="<?php echo $product['id']; ?>" key_c="<?php echo $comment['id']; ?>" href="javascript:void(0)" class="button btn btn-primary btn-sm pull-right reply-bt" id="submit_reply">Submit reply</a>
                                                                        <?php } else { ?>
                                                                            <a href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'login')); ?>" class="btn btn-primary btn-sm pull-right comment-bt">Submit reply</a>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <?php foreach ($this->reply  as $rely) {
                                                                                if ($rely['comment_id'] == $comment['id']) {
                                                                                    ?>
                                                                            <div class="comment reply-c reply-<?= $comment['id'] ?> clearfix">

                                                                                <div class="clearfix cm-rl-<?= $rely['id'] ?>">
                                                                                    <img src="<?php echo RootREL . "media/upload/users/" . (!empty($rely['user_avata']) ? $rely['user_avata'] : 'no_image.png'); ?>" alt="" class="profile_pic">
                                                                                    <div class="comment-details">
                                                                                        <span class="comment-name"><?= $rely['users_firstname'] ?></span>
                                                                                        <span class="comment-date"><?= date("F j, Y ", strtotime($rely["created"])); ?></span>
                                                                                        <p><?= $rely['content'] ?></p>
                                                                                    </div>
                                                                                </div>


                                                                            </div>
                                                                    <?php }
                                                                            } ?>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content" id="tab_review_tabbed_contents">
                                            <div class="collateral-box" id="product-customer-reviews">
                                                <ol>
                                                    <li>Rating information</li>
                                                </ol>
                                                <div class="row">
                                                    <p class="star-one">1<i id="1" class="ratingstar fa-star fab fas"></i></p>
                                                    <div id="123" class="ratingbar" data-rating-value="1">
                                                        <i id="1" class="ratingstar far fa-star"></i>
                                                        <i id="2" class="ratingstar far fa-star"></i>
                                                        <i id="3" class="ratingstar far fa-star"></i>
                                                        <i id="4" class="ratingstar far fa-star"></i>
                                                        <i id="5" class="ratingstar far fa-star"></i>
                                                    </div>
                                                    <p class="length-star"><?= $this->one ?> Review(s)</p>
                                                </div>
                                                <div class="row">
                                                    <p class="star-one">2<i id="1" class="ratingstar fa-star fab fas"></i></p>
                                                    <div id="456" class="ratingbar" data-rating-value="2">
                                                        <i id="1" class="ratingstar far fa-star"></i>
                                                        <i id="2" class="ratingstar far fa-star"></i>
                                                        <i id="3" class="ratingstar far fa-star"></i>
                                                        <i id="4" class="ratingstar far fa-star"></i>
                                                        <i id="5" class="ratingstar far fa-star"></i>
                                                    </div>
                                                    <p class="length-star"><?= $this->two ?> Review(s)</p>
                                                </div>
                                                <div class="row">
                                                    <p class="star-one">3<i id="1" class="ratingstar fa-star fab fas"></i></p>
                                                    <div id="789" class="ratingbar" data-rating-value="3">
                                                        <i id="1" class="ratingstar far fa-star"></i>
                                                        <i id="2" class="ratingstar far fa-star"></i>
                                                        <i id="3" class="ratingstar far fa-star"></i>
                                                        <i id="4" class="ratingstar far fa-star"></i>
                                                        <i id="5" class="ratingstar far fa-star"></i>
                                                    </div>
                                                    <p class="length-star"><?= $this->three ?> Review(s)</p>
                                                </div>
                                                <div class="row">
                                                    <p class="star-one">4<i id="1" class="ratingstar fa-star fab fas"></i></p>
                                                    <div id="188" class="ratingbar" data-rating-value="4">
                                                        <i id="1" class="ratingstar far fa-star"></i>
                                                        <i id="2" class="ratingstar far fa-star"></i>
                                                        <i id="3" class="ratingstar far fa-star"></i>
                                                        <i id="4" class="ratingstar far fa-star"></i>
                                                        <i id="5" class="ratingstar far fa-star"></i>
                                                    </div>
                                                    <p class="length-star"><?= $this->four ?> Review(s)</p>
                                                </div>
                                                <div class="row">
                                                    <p class="star-one">5<i id="1" class="ratingstar fa-star fab fas"></i></p>
                                                    <div id="154" class="ratingbar" data-rating-value="5">
                                                        <i id="1" class="ratingstar far fa-star"></i>
                                                        <i id="2" class="ratingstar far fa-star"></i>
                                                        <i id="3" class="ratingstar far fa-star"></i>
                                                        <i id="4" class="ratingstar far fa-star"></i>
                                                        <i id="5" class="ratingstar far fa-star"></i>
                                                    </div>
                                                    <p class="length-star"><?= $this->five ?> Review(s)</p>
                                                </div>
                                                <ol>
                                                    <a href="javascript:void(0)" type="submit" title="Submit Review" class="button btn open-bt"><span><span>
                                                                Please take a Review </span></span></a>
                                                </ol>
                                            </div>
                                            <div class="add-review" style="display:none">
                                                <div id="ratingSection">
                                                    <div class="row">
                                                        <div class="col-sm-12">

                                                            <form id="ratingForm" method="POST">
                                                                <div class="form-group">
                                                                    <h4>Rate this product</h4>
                                                                    <p id="error-rating" style="color:red;display:none">Choice a rating first!</p>
                                                                    <div id="<?php echo $product['id']; ?>" class="ratingbar" data-rating-value="0" data-userid="111">
                                                                        <i id="1" class="ratingstar far fa-star" title="Bad"></i>
                                                                        <i id="2" class="ratingstar far fa-star" title="So so"></i>
                                                                        <i id="3" class="ratingstar far fa-star" title="Medium"></i>
                                                                        <i id="4" class="ratingstar far fa-star" title="Good"></i>
                                                                        <i id="5" class="ratingstar far fa-star" title="WOnderful"></i>
                                                                    </div>
                                                                </div>

                                                                <ul class="form-list">
                                                                    <li>
                                                                        <label for="review_field" class="required"><em>*</em>Review</label>
                                                                        <div class="input-box">
                                                                            <textarea name="detail" id="review_field" cols="5" rows="3" class="required-entry"></textarea>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <div class="buttons-set">
                                                                    <a href="javascript:void(0)" type="submit" title="Submit Review" class="button btn rating-bt"><span><span>Submit
                                                                                Review</span></span></a>
                                                                </div>
                                                                <!-- <div class="form-group">
                                                                    <button type="submit" class="btn btn-info" id="saveReview">Save Review</button> <button type="button" class="btn btn-info" id="cancelReview">Cancel</button>
                                                                </div>			 -->
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            new Varien.Tabs('.product-tabs > ul');
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
                            <?php foreach ($this->alsoproducts as $alsoproduct) { ?>
                                <div class="item">
                                    <div class="item-area">
                                        <div class="product-image-area">
                                            <a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "view/" . $alsoproduct['slug'] . "-" . $alsoproduct['id']])) ?>" title="<?php echo $alsoproduct['name']; ?>" class="product-image">
                                                <img class="defaultImage" src="<?php echo RootREL . 'media/upload/products/' . $alsoproduct['oneImage']; ?>" alt="<?php echo $alsoproduct['name']; ?>" />
                                                <img class="hoverImage" src="<?php echo RootREL . 'media/upload/products/' . $alsoproduct['oneImage']; ?>" alt="<?php echo $alsoproduct['name']; ?>" />
                                            </a>
                                            <div class="product-label" style="right: 10px;"><span class="sale-product-icon">-30%</span></div>
                                        </div>
                                        <div class="details-area">
                                            <h2 class="product-name"><a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "view/" . $alsoproduct['slug'] . "-" . $alsoproduct['id']])) ?>" title="<?php echo $alsoproduct['name']; ?>"><?php echo $alsoproduct['name']; ?></a>
                                            </h2>
                                            <div class="price-box">
                                                <p class="old-price">
                                                    <span class="price-label">Regular Price:</span>
                                                    <span class="price" id="old-price-<?= $alsoproduct['id'] ?>">
                                                        <?php echo $alsoproduct['price']; ?> </span>
                                                </p>

                                                <p class="special-price">
                                                    <span class="price-label">Special Price</span>
                                                    <span class="price" id="product-price-<?= $alsoproduct['id'] ?>">
                                                        $20.99 </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }  ?>
<script src="<?php echo RootREL; ?>media/js/products/zoomimage.js"></script>
<script src="<?php echo RootREL; ?>media/js/products/mylazyLoad.js"></script>
<script>
    jQuery(function($) {
        let product_id = $('#product_id').val();

        let product_image = $('#product_image').val();
        let product_name = $('#product_name').val();
        let product_price = $('#product_price').val();
        let product_slug = $('#product_slug').val();
        var product_qty = $('.qty').val();


    });
</script>
<script src="<?php echo RootREL; ?>media/js/products/addtocart.js"></script>
<script src="<?php echo RootREL; ?>media/js/products/comment.js"></script>
<script src="<?php echo RootREL; ?>media/js/products/rate.js"></script>



<?php include_once 'views/layout/' . $this->layout . 'footer.php'; ?>