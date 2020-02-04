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
                                                <img class="etalage_thumb_image" src="<?php echo RootREL . "media/upload/products/" . $gallery['image']; ?>" alt="" style="object-fit: cover;object-position: center;height:200px;" />
                                                <img class="etalage_source_image" src="<?php echo RootREL . "media/upload/products/" . $gallery['image']; ?>" alt="" style="object-fit: cover;object-position: center;height:200px;" />
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
                                                    <a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "view/" .  $previousproduct['slug'] . "-" .  $previousproduct['id']])) ?>" title="Previous Product" key="<?= $previousproduct['id'] ?>" class="click-view-bt">
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
                                                    <a class="product-next click-view-bt" href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "view/" .  $nextproduct['slug'] . "-" .   $nextproduct['id']])) ?>"  title="Next Product" key="<?= $nextproduct['id'] ?>">
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

                                    <div class="short-view ">
                                        <div class="std"><?php echo "Views: " . $product['num_of_view']; ?></div>
                                    </div>
                                    <div class="product-info">
                                        <div>
                                            <p class="in-stock">Availability: <span class="<?php echo ($product['quantity'] == 0) ? 'out-of-stock' : (($product['quantity'] > 0 && $product['quantity'] < 15) ? 'running-low' : 'availability'); ?>"><?php echo ($product['quantity'] == 0) ? 'Out of stock' : (($product['quantity'] > 0 && $product['quantity'] < 15) ? 'Running low' : 'In stock'); ?></span>
                                            </p>
                                            <div class="price-box">
                                                <span class="regular-price" id="product-price-<?= $product['id'] ?>">
                                                    <span class="price">

                                                        <?php if (isset($product['coupons_type'])) { ?>
                                                            <p class="old-price">
                                                                <span class="price-label">Regular Price:</span>
                                                                <span class="price" id="old-price-<?= $product['id'] ?>">
                                                                    <?php echo "$" . $product['price']; ?> </span>
                                                            </p>
                                                            <p class="special-price">
                                                                <span class="price-label">Special Price</span>
                                                                <?php if (intval($product['coupons_type']) == 0) { ?>
                                                                    <span class="price" id="product-price-<?= $product['id'] ?>">
                                                                        $<?php echo (intval($product['price']) - (intval($product['price']) * (intval($product['coupons_percent_value']))) / 100); ?>
                                                                    </span>
                                                                <?php } else if (intval($product['coupons_type']) == 1) { ?>
                                                                    <span class="price" id="product-price-<?= $product['id'] ?>">
                                                                        $<?php echo (intval($product['price']) - (intval($product['coupons_fix_value']))) ?></span>
                                                                <?php } ?>
                                                            </p>
                                                        <?php } else { ?>
                                                            <?php echo "$" . $product['price']; ?>
                                                        <?php } ?>
                                                    </span> </span>
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
                                                                <input name="colorss" type="radio" class="filter_all color" id="id-color-<?php echo $color; ?>" value="<?php echo $color; ?>" hidden>
                                                            </li>
                                                        </label>
                                                    <?php } ?>
                                                </ul>
                                            </dd>
                                            <?php if (isset($product['size']) && $product['size'] != '') { ?>
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
                                                            <?php foreach ($product['size'] as $key => $size) { ?>
                                                                <label for="id-size-<?php echo $size; ?>" style="line-height: 2.4;">
                                                                    <li style="border:1px solid gray" class="clearfix">
                                                                        <span class="clearfix">
                                                                            <span class="swatch-label" style="height:30px; width:30px;">
                                                                                <?= $size ?> </span>
                                                                        </span>
                                                                        <input  name="sizess"  type="radio" class="filter_all size" id="id-size-<?php echo $size; ?>" value="<?php echo $size; ?>" hidden>
                                                                    </li>
                                                                </label>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                </dd>
                                            <?php } ?>
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
                                                        <textarea type="text" placeholder="Post your comment" id="comment_text" class="form-control" cols="30" rows="3" required></textarea>
                                                        <?php if (isset($_SESSION['user'])) { ?>
                                                            <a key_p="<?php echo $product['id']; ?>" href="javascript:void(0)" class="btn btn-primary btn-sm pull-right comment-bt" id="submit_comment">Submit comment</a>
                                                        <?php } else { ?>
                                                            <a href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'login')); ?>" class="btn btn-primary btn-sm pull-right comment-bt">Submit comment</a>
                                                        <?php } ?>
                                                    </div>

                                                    <h2><span id="comments_count"><?= $this->comment['norecords'] ?></span> Comment(s) | <a href="javascript:void(0)" type="submit" title="Expand comment" class="button btn open-bt-cm"><span><span>
                                                                    Show comments </span></span></a></h2>
                                                    <hr>
                                                    <div id="href-comment" class="comment-display" style="display:none">
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
                                                                            <textarea type="text" placeholder="Post your reply" id="comment_reply" class="comment_reply_<?= $comment['id'] ?> form-control input-text" cols="30" rows="3" required></textarea>
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
                                                        <?php vendor_html_helper::paginationajax($this->comment['norecords'], $this->comment['nocurp'], $this->comment['curp'], $this->comment['nopp']); ?>
                                                    </div>

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

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rating-display" style="border-top: 1px solid #eee;">
                                                <?php foreach ($this->rating['data'] as $key => $rating) { ?>
                                                    <div id="comments-wrapper-<?= $rating['id'] ?>" style="padding-top: 20px;">
                                                        <div class="comment clearfix">
                                                            <img src="<?php echo RootREL . "media/upload/users/" . (!empty($rating['user_avata']) ? $rating['user_avata'] : 'no_image.png'); ?>" alt="" class="profile_pic">
                                                            <div class="comment-details">
                                                                <span class="comment-name"><?= $rating['users_firstname'] ?></span>
                                                                <span class="comment-date"><?= $rating['created'] ?></span>
                                                                <div class="row" style="margin-left:0px">
                                                                    <div id="156<?= $rating['id'] ?>" class="ratingbar" data-rating-value="<?= $rating['rating'] ?>">
                                                                        <i id="1" class="ratingstar far fa-star"></i>
                                                                        <i id="2" class="ratingstar far fa-star"></i>
                                                                        <i id="3" class="ratingstar far fa-star"></i>
                                                                        <i id="4" class="ratingstar far fa-star"></i>
                                                                        <i id="5" class="ratingstar far fa-star"></i>
                                                                    </div>
                                                                </div>
                                                                <p><?= $rating['contents'] ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <?php vendor_html_helper::paginationajax($this->rating['norecords'], $this->rating['nocurp'], $this->rating['curp'], $this->rating['nopp']); ?>
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
                                            <a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "view/" . $alsoproduct['slug'] . "-" . $alsoproduct['id']])) ?>" title="<?php echo $alsoproduct['name']; ?>" class="product-image click-view-bt" key="<?= $alsoproduct['id'] ?>">
                                                <img class="defaultImage" src="<?php echo RootREL . 'media/upload/products/' . $alsoproduct['oneImage']; ?>" alt="<?php echo $alsoproduct['name']; ?>" />
                                                <img class="hoverImage" src="<?php echo RootREL . 'media/upload/products/' . $alsoproduct['oneImage']; ?>" alt="<?php echo $alsoproduct['name']; ?>" />
                                            </a>
                                            <?php if (isset($alsoproduct['coupons_type'])) { ?>

                                                <?php if (intval($alsoproduct['coupons_type']) == 0) {
                                                                echo '<div class="product-label" style="right: 10px;"><span class="sale-product-icon">-' . $alsoproduct['coupons_percent_value'] . "%";
                                                            } else if (intval($alsoproduct['coupons_type']) == 1) {
                                                                echo '<div class="product-label" style="right: 10px;"><span class="sale-product-icon">-' . $alsoproduct['coupons_fix_value'] . " USD";
                                                            } ?> </div> <?php } ?></span>
                                    </div>

                                    <div class="details-area">
                                        <h2 class="product-name"><a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "view/" . $alsoproduct['slug'] . "-" . $alsoproduct['id']])) ?>" title="<?php echo $alsoproduct['name']; ?>" key="<?= $alsoproduct['id'] ?>" class="click-view-bt"><?php echo $alsoproduct['name']; ?></a>
                                        </h2>
                                        <div class="price-box">

                                            <?php if (isset($alsoproduct['coupons_type'])) { ?>
                                                <p class="old-price">
                                                    <span class="price-label">Regular Price:</span>
                                                    <span class="price" id="old-price-<?= $alsoproduct['id'] ?>">
                                                        <?php echo "$" . $alsoproduct['price']; ?> </span>
                                                </p>
                                                <p class="special-price">
                                                    <span class="price-label">Special Price</span>
                                                    <?php if (intval($alsoproduct['coupons_type']) == 0) { ?>
                                                        <span class="price" id="product-price-<?= $alsoproduct['id'] ?>">
                                                            $<?php echo (intval($alsoproduct['price']) - (intval($alsoproduct['price']) * (intval($alsoproduct['coupons_percent_value']))) / 100); ?>
                                                        </span>
                                                    <?php } else if (intval($alsoproduct['coupons_type']) == 1) { ?>
                                                        <span class="price" id="product-price-<?= $alsoproduct['id'] ?>">
                                                            $<?php echo (intval($alsoproduct['price']) - (intval($alsoproduct['coupons_fix_value']))) ?></span>
                                                    <?php } ?>
                                                </p>
                                            <?php } else { ?>
                                                <p class="special-price">
                                                    <span class="price-label"> Price</span>
                                                    <span class="price" id="product-price-<?= $alsoproduct['id'] ?>">
                                                        $<?php echo intval($alsoproduct['price']); ?>
                                                    </span>
                                                <?php } ?>
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
<script src="<?php echo RootREL; ?>media/js/products/view.js"></script>
<?php include_once 'views/layout/' . $this->layout . 'footer.php'; ?>
