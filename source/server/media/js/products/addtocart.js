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
function totals(a, element, rootUrl) {
    let tmp = '';
    tmp = `
                    <div class="totals">
                        <span class="label">Total: </span>
                        <span class="price-total"><span class="price">$${a}</span></span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-default" href="${rootUrl}"><i class="icon-basket"></i>View Cart</a>
                        <a class="btn btn-default" href="${rootUrl}"><i class="icon-right-thin"></i>Checkout</a>
                    <div class="clearer"></div>
                    </div>
                    `;
    return tmp;
}
jQuery(function ($) {
   

    function addProduct(id, image, price, qty, color) {
        
        // let key = Math.random();
        // let products = [];
        // if (localStorage.getItem('products')) {
        //     products = JSON.parse(localStorage.getItem('products'));
        // }
        // products.push({
        //     key: key,
        //     product_id: id,
        //     name: name,
        //     slug: slug,
        //     image: image_p,
        //     price: price,
        //     qty: qty,
        //     color: color
        // });
        // localStorage.setItem('products', JSON.stringify(products));
    }

    // function display() {
    //     let html = '';
    //     if (localStorage && localStorage.getItem('products')) {
    //         products = JSON.parse(localStorage.getItem('products'));
    //         products.forEach(element => {
    //             html += tmp(element, rootUrl, RootREL);
    //         });
    //         let a = products.reduce(function (r, a) {
    //             return parseInt(r) + parseInt(a['price']);
    //         }, 0);
    //         html += totals(a, products, rootUrl);
    //     }
    //     return html;
    // }

    // if (localStorage && localStorage.getItem('products')) {
    //     let leng = (JSON.parse(localStorage.getItem('products')).length);
    //     if (leng > 0) {
    //         $('.inner-wrapper').empty();
    //         $('.inner-wrapper').html(display());
    //         $('.cart-qty').html(leng);

    //     }
    // }

    // function removeProduct(keyp) {
    //     let check = confirm('Are you sure you would like to remove this item from the shopping cart?');
    //     if (check) {
    //         let storageProducts = JSON.parse(localStorage.getItem('products'));
    //         let products = storageProducts.filter(product => product.key != keyp);
    //         localStorage.setItem('products', JSON.stringify(products));
    //     }

    //     let leng = (JSON.parse(localStorage.getItem('products')).length);
    //     $('.cart-qty').html(leng);
    //     if (leng >= 1) {
    //         $('.inner-wrapper').empty();
    //         $('.inner-wrapper').html(display());

    //     } else {
    //         $('.inner-wrapper').html('<p class="cart-empty">You have no items in your shopping cart. </p>');
    //     }
    // }

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
        $('.size:checked').parent().addClass('border-choose');
        $('.size:not(:checked)').parent().removeClass('border-choose');

    });
    $('.btn-cart').click(function () {
        let color = get_filter('color');
        if (color.length == 0) {
            console.log("a");
            $('.error-color').show();
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
                    qty: product_qty,
                    price: product_price,
                    image: image_p
                },
                success: function (data) {
                    let product = JSON.parse(data);
                    alert("Added to cart");
                    console.log(data);
                }
            });
           
        }
        
    });
    //ok
    $('.addWishlistJs').click(function() {
        let color = get_filter('color');
        if (color.length == 0) {
            $('.error-color').show();
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
                    qty: product_qty,
                    price: product_price,
                    image: image_p
                },
                success: function (data) {
                    let product = JSON.parse(data);
                    alert("Added to wishlist");
                    console.log(data);
                }
            });
        }
    });

});