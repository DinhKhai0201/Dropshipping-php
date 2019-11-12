<?php include_once 'views/layout/' . $this->layout . 'top.php'; ?>
<div class="main-container col2-left-layout">
    <div class="main container">
        <div class="row">
            <div class="col-left sidebar f-left col-lg-3">
                <div class="block block-account">
                    <?php include_once 'views/customer/' . $this->layout . 'sidebar.php'; ?>
                </div>
            </div>
            <div class="col-main col-lg-9 lg-order-12">
                <div class="my-account">
                    <div class="my-wishlist ">
                        <div class="page-title title-buttons">
                            <h1>My Wishlist</h1>
                        </div>
                        <?php if ($this->nowishlist > 0) { ?>
                            <fieldset>
                                <table class="data-table" id="wishlist-table">
                                    <thead>
                                        <tr class="first last">
                                            <th>Image</th>
                                            <th>Product Details and Comment</th>
                                            <th>Add to Cart</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($this->products as $product) { ?>
                                            <tr id="item_<?= $product['id'] ?>" user="user_<?= $product['user_id'] ?>" class="item-wishlist">
                                                <td><a class="product-image" href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "view/" . $product['products_slug'] . "-" . $product['product_id']])) ?>" title="<?= $product['products_name'] ?>">
                                                        <img src="<?php echo RootREL . 'media/upload/products/' . $product['image']; ?>" width="80" height="80" alt="<?= $product['products_name'] ?>">
                                                    </a>
                                                </td>
                                                <td>
                                                    <h3 class="product-name"><a href="<?php echo (vendor_app_util::url(["ctl" => "product", "act" => "view/" . $product['products_slug'] . "-" . $product['product_id']])) ?>" title="<?= $product['products_name'] ?>"><?= $product['products_name'] ?></a></h3>
                                                    <div class="description std">
                                                        <div class="inner"><?= $product['products_description'] ?></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="cart-cell">
                                                        <div class="price-box">
                                                            <span class="regular-price" id="product-price-<?= $product['product_id'] ?>">
                                                                <span class="price"><? echo  "$" . $product['price']; ?></span> </span>
                                                        </div>
                                                        <button type="button" title="Add to Cart" class="button btn-cart wishlistToCart" value="<?= $product['id'] ?>"><span><span>Add to Cart</span></span></button>
                                                    </div>
                                                </td>
                                                <td class="last"><a href="javascript:void(0)" title="Remove Item" value="<?= $product['id'] ?>" class="btn-remove remove-wishlist btn-remove2">Remove item</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div class="buttons-set buttons-set2">
                                    <button type="submit" name="do" title="Clear All  Wishlist" id="removeAllWishlist" class="button btn-update"><span><span>Clear all Wishlist</span></span></button>
                                    <button type="button" title="Add All to Cart" class="button btn-add allWishlistToCart"><span><span>Add All to Cart</span></span></button>
                                </div>
                            </fieldset>
                        <?php } else { ?>
                            <p>Nothing in wishlist</p>
                        <?php } ?>
                    </div>
                    <div class="buttons-set">
                        <p class="back-link"><a href="javascript:history.back()"><small>« </small>Back</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(function($) {
        $('.my-wishlist').on('click', '.remove-wishlist', function() {
            let id = ($(this).context.attributes.value.value);

            $.ajax({
                url: rootUrl + "customer/wishlist/removewishlist",
                method: "POST",
                data: {
                    id: id,
                },
                success: function(data) {
                    let id = JSON.parse(data);
                    $('#item_' + id).remove();

                }
            });
        });
        $('.my-wishlist').on('click', '#removeAllWishlist', function() {
            $.ajax({
                url: rootUrl + "customer/wishlist/removewishlistmany",
                method: "POST",
                success: function(data) {
                    if (data) {
                        $('fieldset').remove();
                        $(' <p>Nothing in wishlist</p>').insertAfter('.my-wishlist .page-title');
                    } else {
                        console.log("Error");
                    }
                }
            });
        });
        $('.my-wishlist').on('click', '.wishlistToCart', function() {
            let id = ($(this).context.attributes.value.value);
            $.ajax({
                url: rootUrl + "customer/wishlist/oneWishlistToCart",
                method: "POST",
                data: {
                    id: id,
                },
                success: function(data) {
                    let status = JSON.parse(data);
                    if (status == true) {
                        alert("Added cart Ok.");
                    } else {
                        alert("Error");
                    }

                }
            });
        });
        $('.my-wishlist').on('click', '.allWishlistToCart', function() {
            $.ajax({
                url: rootUrl + "customer/wishlist/allWishlistToCart",
                method: "POST",
                success: function(data) {
                    let status = JSON.parse(data);
                    if (status == true) {
                        alert("Added all cart Ok.");
                    } else {
                        alert("Error");
                    }

                }
            });
        });
    });
</script>
<?php include_once 'views/layout/' . $this->layout . 'footer.php';
