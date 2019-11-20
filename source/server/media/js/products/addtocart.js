function tmp(element, rootUrl, RootREL) {
    let tmp = '';
    tmp = `
                    <ol class="mini-products-list" >
                        <li class="item">
                            <div class="clearfix product-details">
                                <div class ="image-cart" style ="margin-right: 20px;width: 40%;float: left;">
                                    <span><a href="${rootUrl}product/view/${element.slug}-${element.product_id}" title="${element.name}" class="product-image"><img src="${RootREL}media/upload/products/${element.image}" alt="${element.name}"></a></span>
                                <div class="clearer"></div>

                                </div>
                                <div class ="info-cart">
                                    <p class="product-name">
                                    <a href="${rootUrl}product/view/${element.slug}-${element.product_id}">
                                    ${element.name}</a>
                                    </p>
                
                                    <p class="qty-price">${element.qty} X <span class="price">$${element.price}</span>
                                    </p>
                                    <a title="Remove This Item" key ="${element.key}"  value ="${element.key}" class="btn-remove remove-key"><i class="icon-cancel"></i></a>
                                </div>
                            </div>
                            <div class="clearer"></div>
                        </li>                                           
                    </ol>
                    `;
    return tmp;
}

jQuery(function ($) {
    let product_id = $('#product_id').val();
    let product_image = $('#product_image').val();
    let product_price = $('#product_price').val();
    var product_qty = $('.qty').val();
    
    function get_filter(class_name) {
        var filter = [];
        $('.' + class_name + ':checked').each(function () {
            filter.push($(this).val());
        });
        return filter;
    }
   
    $('ul.colors').on("click", "li", function () {
        $('.color:checked').parent().addClass('border-choose');
        $('.color:not(:checked)').parent().removeClass('border-choose');
        $('.error-color').hide();
    });
    $('ul.sizes').on("click", "li", function () {
        console.log("a");
        $('.size:checked').parent().addClass('border-choose');
        $('.size:not(:checked)').parent().removeClass('border-choose');

    });
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
    $('.btn-cart').click(function () {
        let color = get_filter('color');
        let size = get_filter('size');
        let name = ($(this).context.attributes.name.value);
        let slug = ($(this).context.attributes.slug.value);
        let supplier = ($(this).context.attributes.supplier.value);
        let qty =$(this).parent().children('.qty-holder').children().val();
        console.log(size);
        if (color.length == 0) {
            console.log("a");
            $('.error-color').show();
            toastr.warning("Choose  a color");
        } else {
            let image_p;
            if ((/upload\/products\/(.*)/g).test(product_image)) {
                image_p = ((/upload\/products\/(.*)/g).exec(product_image))[1];
            }
            $.ajax({
                url: rootUrl + "customer/checkout/addtocart",
                method: "POST",
                data: {
                    id: product_id,
                    color: color.join(),
                    size:size.join(),
                    qty: qty,
                    price: product_price,
                    image: image_p,
                    supplier: supplier
                },
                success: function (data) {
                    let product = JSON.parse(data);
                    let html = tmp(product, name, slug, rootUrl, RootREL);
                    let qty = $('.cart-info .cart-qty').html();
                    // let price_id = $('.price-total .getPrice').html();
                    let new_price;
                    $('.cart-info .cart-qty').empty();
                    if (parseInt(qty) == 0) {
                        price_id = 0;
                        new_price = (parseInt(price_id) + parseInt(product.price));
                        $('.inner-wrapper').empty();
                        html += totals(new_price, rootUrl);
                    } else {
                        price_id = $('.price-total .getPrice').html().substr(1);
                        new_price = (parseInt(price_id) + parseInt(product.price));
                    }
                    $('.price-total .getPrice').html('$' + new_price);
                    $('.cart-info .cart-qty').empty();
                    $('.cart-info .cart-qty').html(parseInt(qty) + 1);
                    $('.inner-wrapper').prepend(html);
                    toastr.success("Successfully add to cart");
                }
            });
           
        }
        
    });
    //ok
    $('.addWishlistJs').click(function() {
        let color = get_filter('color');
        let size = get_filter('size');
        let supplier = ($(this).context.attributes.supplier.value);
        if (color.length == 0) {
            $('.error-color').show();
            toastr.warning("Choose  a color");
        } else {
            let image_p;
            if ((/upload\/products\/(.*)/g).test(product_image)) {
                image_p = ((/upload\/products\/(.*)/g).exec(product_image))[1];
            }
            $.ajax({
                url: rootUrl + "customer/wishlist/addtowishlist",
                method: "POST",
                data: {
                    id: product_id,
                    color: color.join(),
                    size:size.join(),
                    qty: product_qty,
                    price: product_price,
                    image: image_p,
                    supplier_id: supplier
                },
                success: function (data) {
                    let product = JSON.parse(data);
                    let num_wishlist = parseInt($('.no_wishlist').html());
                    $('.no_wishlist').empty();
                    $('.no_wishlist').html(num_wishlist + 1);
                    toastr.success("Successfully add to wishlist");
                    console.log(data);
                    }

            });
        }
    });

});