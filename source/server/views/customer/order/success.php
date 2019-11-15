<?php include_once 'views/layout/' . $this->layout . 'top.php'; ?>
<div class="main-container col1-layout">
    <div class="main container">
        <div class="row">
            <div class=" col-main col-lg-9">
                <div class="page-title">
                    <h1>Your order has been received.</h1>
                </div>
                <div class="form-wrap">
                    <h2 class="sub-title">Thank you for your purchase!</h2>

                    <p>Your order is: <a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'order')); ?>"><?php echo $this->id_order['id']; ?></a>.
                    </p>
                    <p>You will receive an order confirmation email with details of your order and a link to
                        track its progress.</p>
                    <p>
                        Click <a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'order', 'act' => 'invoice')); ?>" onclick="this.target='_blank'">here to print</a> a copy of your order
                        confirmation. </p>

                    <div class="buttons-set">
                        <button type="button" class="button" title="Continue Shopping" onclick="window.location='<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'categories')); ?>'"><span><span>Continue
                                    Shopping</span></span></button>
                    </div>
                </div>
            </div>
            <div class="col-right sidebar col-lg-3" style="position: relative;">
                <div class="block block-list block-viewed">
                    <div class="block-title">
                        <strong><span>Recently Viewed Products</span></strong>
                    </div>
                    <div class="block-content">
                        <ol id="recently-viewed-items">
                            <li class="item odd">
                                <p class="product-name"><a href="">NTX01
                                        - Headphone</a></p>
                            </li>
                           
                        </ol>
                        <script type="text/javascript">
                            decorateList('recently-viewed-items');
                        </script>
                    </div>
                </div>

                <div class="block block-wishlist">
                    <div class="block-title">
                        <strong><span>My Wishlist <small>(<?= $this->recordswishlist['norecords'] ?>)</small></span></strong>
                    </div>
                    <div class="block-content">
                        <p class="block-subtitle">Last Added Items</p>
                        <ol class="mini-products-list" id="wishlist-sidebar">
                            <?php foreach ($this->recordswishlist['data'] as $key => $value) { ?>
                                <li class="item last odd item_wishlist_<?= $value['id'] ?>">
                                    <a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "view/" . $value['products_slug'] . "-" . $value['product_id']])) ?>" title="<?= $value['products_name'] ?>" class="product-image"><img src="<?php echo RootREL . 'media/upload/products/' . $value['image']; ?>" width="50" height="50" alt="<?= $value['products_name'] ?>"></a>
                                    <div class="product-details">
                                        <a href="javascript:void(0)" title="Remove This Item" class="btn-remove remove_wishlist_in_success_order">Remove This Item</a>
                                        <p class="product-name"><a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "view/" . $value['products_slug'] . "-" . $value['product_id']])) ?>"><?= $value['products_name'] ?></a></p>
                                        <div class="price-box">
                                            <span class="regular-price" id="product-price-421-wishlist">
                                                <span class="price">$<?= $value['price'] ?></span> </span>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>

                        </ol>
                        <script type="text/javascript">
                            decorateList('wishlist-sidebar');
                        </script>
                        <div class="actions">
                            <a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'wishlist')); ?>">See more</a>
                        </div>
                    </div>
                </div>
                <!-- <div class="block block-reorder">
                    <div class="block-title">
                        <strong><span>My Orders</span></strong>
                    </div>
                    <form method="post" action="https://www.portotheme.com/magento/porto/index.php/demo4_en/checkout/cart/addgroup/" id="reorder-validate-detail">
                        <input name="form_key" type="hidden" value="xh4jQM1OosEy0YID">
                        <div class="block-content">
                            <p class="block-subtitle">Last Ordered Items</p>
                            <ol id="cart-sidebar-reorder">
                                <li class="item last odd">
                                    <input type="checkbox" name="order_items[]" id="reorder-item-2" value="2" title="Add to Cart" class="checkbox validate-one-required-by-name">

                                    <p class="product-name"><a href="http://www.portotheme.com/magento/porto/index.php/demo4_en/headphone-sj.html">Headphone
                                            SJ</a></p>
                                </li>
                            </ol>

                            <div id="cart-sidebar-reorder-advice-container"></div>
                            <div class="actions">
                                <button type="submit" title="Add to Cart" class="button btn-cart"><span><span>Add to Cart</span></span></button>
                                <a href="https://www.portotheme.com/magento/porto/index.php/demo4_en/customer/account/">View
                                    All</a>
                            </div>
                        </div>
                    </form>
                </div> -->
            </div>
        </div>
    </div>
</div>
<?php include_once 'views/layout/' . $this->layout . 'footer.php'; ?>