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
                    <div class="top-container">
                        <div class="breadcrumbs" style="margin-bottom: 20px">
                            <div class="container">
                                <div class="row">
                                    <ul>
                                        <li class="home">
                                            <a href="<?php echo (vendor_app_util::url(['area' => '', "ctl" => ""])) ?>" title="Go to Home Page">Home</a>
                                            <span class="breadcrumbs-split">></span>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo (vendor_app_util::url(['area' => 'customer', "ctl" => "account"])) ?>" title="My account Dropshipping">My account</a>
                                            <span class="breadcrumbs-split">></span>
                                        </li>

                                        <li class="product">
                                            <strong>My wishlist </strong>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                        <button type="button" title="Add to Cart" class="button btn-cart wishlistToCart" name="<?= $product['products_name'] ?>" slug="<?= $product['products_slug'] ?>" value="<?= $product['id'] ?>"><span><span>Add to Cart</span></span></button>
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
    function tmp(element, name, slug, rootUrl, RootREL) {
        let tmp = '';
        tmp = `
                    <ol class="mini-products-list item_${element.id}" >
                        <li class="item">
                            <div class="clearfix product-details">
                                <div class ="image-cart" style ="margin-right: 20px;width: 40%;float: left;">
                                    <span><a href="${rootUrl}product/view/${slug}-${element.product_id}" title="${name}" class="product-image"><img src="${RootREL}media/upload/products/${element.image}" alt="${name}"></a></span>
                                <div class="clearer"></div>

                                </div>
                                <div class ="info-cart">
                                    <p class="product-name">
                                    <a href="${rootUrl}product/view/${slug}-${element.product_id}">
                                    ${name}</a>
                                    </p>
                
                                    <p class="qty-price"><span class ="qty_cart_${element.id}">${element.quantity}</span> X <span class="price">$${element.price}</span>
                                    </p>
                                    <a title="Remove This Item" price ="${element.price}"  value ="${element.id}" class="btn-remove remove-cart"><i class="icon-cancel"></i></a>
                                </div>
                            </div>
                            <div class="clearer"></div>
                        </li>                                           
                    </ol>
                    `;
        return tmp;
    }

    function totals(a, rootUrl) {
        let tmp = '';
        tmp = `
                        <div class="totals">
                            <span class="label">Total: </span>
                            <span class="price-total"><span class="price">$${a}</span></span>
                        </div>
                        <div class="actions">
                            <a class="btn btn-default" href="${rootUrl}customer/checkout"><i class="icon-basket"></i>View Cart</a>
                        <div class="clearer"></div>
                        </div>
                        `;
        return tmp;
    }
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
                    let num_wishlist = parseInt($('.no_wishlist').html());
                    $('.no_wishlist').empty();
                    $('.no_wishlist').html(num_wishlist - 1);
                    toastr.success("Successfully remove wishlist");

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
                        $('.no_wishlist').empty();
                        $('.no_wishlist').html('0');
                        toastr.success("Successfully remove all wishlist");
                    } else {
                        alert("Error");
                        toastr.error("Successfully remove all wishlist");
                    }
                }
            });
        });
        $('.my-wishlist').on('click', '.wishlistToCart', function() {
            let id = ($(this).context.attributes.value.value);
            let name = ($(this).context.attributes.name.value);
            let slug = ($(this).context.attributes.slug.value);
            let qty = $('.cart-info .cart-qty').text();
            $.ajax({
                url: rootUrl + "customer/wishlist/oneWishlistToCart",
                method: "POST",
                data: {
                    id: id,
                },
                success: function(data) {
                    let datas = JSON.parse(data);
                    let html = tmp(datas, name, slug, rootUrl, RootREL);
                    let qty = $('.cart-info .cart-qty').html();
                    let price_id = $('.price-total .getPrice').html();
                    let new_price;
                    if (parseInt(qty) == 0) {
                        price_id = 0;
                        new_price = (parseInt(price_id) + parseInt(datas.price));
                        $('.inner-wrapper').empty();
                        html += totals(new_price, rootUrl);
                    } else {
                        price_id = price_id.substr(1);
                        new_price = (parseInt(price_id) + parseInt(datas.price));
                    }
                    toastr.success("Successfully add to cart");
                    $('.price-total .getPrice').html('$' + new_price);
                    $('.cart-info .cart-qty').empty();
                    $('.cart-info .cart-qty').html(parseInt(qty) + 1);
                    $('.inner-wrapper').prepend(html);
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
                        toastr.success("Successfully add all to cart");
                    } else {
                        toastr.error("Failed");
                    }

                }
            });
        });
    });
</script>
<?php include_once 'views/layout/' . $this->layout . 'footer.php';
