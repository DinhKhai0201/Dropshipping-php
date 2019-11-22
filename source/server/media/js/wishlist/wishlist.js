function tmp(element, name, slug, rootUrl, RootREL) {
    let tmp = '';
    tmp = `
                    <ol class="mini-products-list item_${element.id}" >
                        <li class="item">
                            <div class="clearfix product-details">
                                <div class ="image-cart" style ="margin-right: 20px;width: 40%;float: left;">
                                    <span><a href="${rootUrl}product/view/${slug}-${element.product_id}" title="${name}" class="product-image"><img src="${RootREL}media/upload/products/${element.image}" alt="${name}" style="height: 60px;object-fit: cover;object-position: top;width: 100%;"></a></span>
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
jQuery(function ($) {
    $('.my-wishlist').on('click', '.remove-wishlist', function () {
        let id = ($(this).context.attributes.value.value);

        $.ajax({
            url: rootUrl + "customer/wishlist/removewishlist",
            method: "POST",
            data: {
                id: id,
            },
            success: function (data) {
                let id = JSON.parse(data);
                $('#item_' + id).remove();
                let num_wishlist = parseInt($('.no_wishlist').html());
                $('.no_wishlist').empty();
                $('.no_wishlist').html(num_wishlist - 1);
                toastr.success("Successfully remove wishlist");

            }
        });
    });
    $('.my-wishlist').on('click', '#removeAllWishlist', function () {
        $.ajax({
            url: rootUrl + "customer/wishlist/removewishlistmany",
            method: "POST",
            success: function (data) {
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
    $('.my-wishlist').on('click', '.wishlistToCart', function () {
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
            success: function (data) {
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
    $('.my-wishlist').on('click', '.allWishlistToCart', function () {
        $.ajax({
            url: rootUrl + "customer/wishlist/allWishlistToCart",
            method: "POST",
            success: function (data) {
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