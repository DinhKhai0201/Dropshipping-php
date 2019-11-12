<?php include_once 'views/layout/' . $this->layout . 'top.php'; ?>
<div class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
            <div class="cart cart-append-product">
                <div class="page-title title-buttons">
                    <h1>Shopping Cart</h1>

                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-8 col-xl-10">
                        <div class="cart-table-wrap">
                            <?php if ($this->nocart > 0) { ?>
                                <fieldset>
                                    <table id="shopping-cart-table" class="data-table cart-table">
                                        <thead>
                                            <tr>
                                                <th rowspan="1">Delete</th>
                                                <th rowspan="1">Image</th>
                                                <th rowspan="1"><span class="nobr">Product Name</span></th>
                                                <th rowspan="1"><span class="nobr">Add Wishlist</span>
                                                </th>
                                                <th colspan="1"><span class="nobr">Unit Price</span></th>
                                                <th rowspan="1">Qty</th>
                                                <th rowspan="1">Color</th>
                                                <th class="last" colspan="1">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <td colspan="50" class="a-right">
                                                    <button title="Continue Shopping" class="button btn-continue" onclick="window.location.href='<?php echo vendor_app_util::url(array('area' => '', 'ctl' => 'categories')); ?>'"><span><span>Continue
                                                                Shopping</span></span></button>
                                                    <button title="Update Shopping Cart" class="button btn-update"><span><span>Update
                                                                Shopping Cart</span></span></button>
                                                    <button title="Clear Shopping Cart" class="button btn-empty" id="empty_cart_button"><span><span>Clear Shopping
                                                                Cart</span></span></button>

                                                </td>
                                            </tr>
                                        </tfoot>
                                        <tbody class="list-cart">
                                            <?php foreach ($this->products as $product) { ?>
                                                <tr id="item_<?= $product['id']; ?>">
                                                    <td class="action-td"><a href="javascript:void(0)" price="<?= $product['price']; ?>" value="<?= $product['id']; ?>" title="Remove item" class="btn-remove remove-key btn-remove2"></a></td>
                                                    <td class="pr-img-td"><a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "view/" . $product['products_slug'] . "-" . $product['product_id']])) ?>" title="<?= $product['products_name']; ?>" class="product-image"><img src="<?php echo RootREL . "media/upload/products/" . $product['image']; ?>" width="80" height="80" alt="<?= $product['products_name']; ?>" /></a></td>
                                                    <td class="product-name-td">
                                                        <h2 class="product-name">
                                                            <a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "view/" . $product['products_slug'] . "-" . $product['product_id']])) ?>">
                                                                <?= $product['products_name']; ?> </a>
                                                        </h2>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0)" key="<?= $product['id']; ?>" value="<?= $product['product_id']; ?>" colors="<?= $product['color']; ?>" qty="<?= $product['quantity']; ?>" price="<?= $product['price']; ?>" image="<?= $product['image']; ?>" class="link-wishlist towishlist use-ajax">Add</a>
                                                    </td>
                                                    <td>
                                                        <span class="cart-price">
                                                            <span class="price"><?= $product['price']; ?></span>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="qty-holder">
                                                            <a href="javascript:void(0)" class="table_qty_dec">-</a><input value="1" size="4" title="Qty" class="input-text qty" id="qtyValue" maxlength="12" /><a href="javascript:void(0)" class="table_qty_inc">+</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="cart-color">
                                                            <span class="color"><?= $product['color']; ?></span>
                                                        </span>
                                                    </td>
                                                    <td class="td-total">
                                                        <span class="cart-price">
                                                            <span class="price"><?php echo intval($product['price']) * intval($product['quantity']); ?></span>
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <script type="text/javascript">
                                        decorateTable('shopping-cart-table');
                                    </script>
                                    <script type="text/javascript">
                                        jQuery(function($) {
                                            $(".cart .discount h2,.cart .shipping h2").click(function() {
                                                if ($(this).hasClass('opened')) {
                                                    $(this).removeClass('opened');
                                                    $(this).next().slideUp();
                                                } else {
                                                    $(this).addClass('opened');
                                                    $(this).next().slideDown();
                                                }
                                            });
                                        });
                                    </script>
                                </fieldset>
                            <?php } else { ?>
                                <p>Nothing in cart</p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4 col-xl-2">
                        <div class="cart-collaterals">
                            <div class="totals">
                                <h2>Cart Totals</h2>
                                <div>
                                    <table id="shopping-cart-totals-table">
                                        <col />
                                        <col width="1" />
                                        <tfoot>
                                            <tr>
                                                <td style="" class="a-right" colspan="1">
                                                    <strong>Grand Total</strong>
                                                </td>
                                                <td style="" class="a-right">
                                                    <strong><span class="price price-total-list"><?php $total = 0;
                                                                                                    foreach ($this->products as $key => $value) {
                                                                                                        $total += $value['price'];
                                                                                                    }
                                                                                                    echo "$" . $total; ?></span></strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td style="" class="a-right" colspan="1">
                                                    Subtotal </td>
                                                <td style="" class="a-right">
                                                    <span class="price price-total-list"><?php $total = 0;
                                                                                            foreach ($this->products as $key => $value) {
                                                                                                $total += $value['price'];
                                                                                            }
                                                                                            echo "$" . $total; ?></span> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <ul class="checkout-types">
                                        <li> <button type="button" title="Proceed to Checkout" class="button btn-proceed-checkout btn-checkout" onclick="window.location.href='<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'checkout', 'act' => 'cart')); ?>'"><span><span>
                                                        To Checkout</span></span></button>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo RootREL; ?>media/js/checkout/displaycart.js"></script>
<script src="<?php echo RootREL; ?>media/js/checkout/wishlist.js"></script>

<?php include_once 'views/layout/' . $this->layout . 'footer.php';
