function tmplist(element, rootUrl) {
    let tmp = '';
    tmp = `         <tr>
                        <td class="action-td"><a href="javascript:void(0)" value =${element.key} title="Remove item" class="btn-remove remove-key btn-remove2"></a></td>
                        <td class="pr-img-td"><a href="${rootUrl}product/view/${element.slug}-${element.product_id}" title="${element.name}" class="product-image"><img src="${element.image}" width="80" height="80" alt="${element.name}" /></a></td>
                        <td class="product-name-td">
                            <h2 class="product-name">
                                <a href="${rootUrl}product/view/${element.slug}-${element.product_id}">
                                   ${element.name} </a>
                            </h2>
                        </td>
                        <td>
                            <a href="javascript:void(0)" key ="${element.key}" value ="${element.product_id}" colors ="${element.color}" qty ="${element.qty}" price = "${element.price}" class="link-wishlist towishlist use-ajax">Move</a>
                        </td>
                        <td>
                            <span class="cart-price">
                                <span class="price">${element.price}</span>
                            </span>
                        </td>
                        <td>
                            <div class="qty-holder">
                                <a href="javascript:void(0)" class="table_qty_dec">-</a><input  value="1" size="4" title="Qty" class="input-text qty" maxlength="12" /><a href="javascript:void(0)" class="table_qty_inc">+</a>
                            </div>
                        </td>
                        <td>
                            <span class="cart-color">
                                <span class="color">${element.color}</span>
                            </span>
                        </td>
                        <td class="td-total">
                            <span class="cart-price">
                                <span class="price">${parseInt(element.price) *parseInt(element.qty)}</span>
                            </span>
                        </td>
                    </tr>
                   
                    `;
    return tmp;
}
jQuery(function ($) {

    function displaylist() {
        let html = '';
        if (localStorage && localStorage.getItem('products')) {
            products = JSON.parse(localStorage.getItem('products'));
            products.forEach(element => {
                html += tmplist(element, rootUrl);
            });
            let a = products.reduce(function (r, a) {
                return parseInt(r) + parseInt(a['price']);
            }, 0);

            $('.price-total-list').html("$" + a);
        }
        return html;
    }

    if (localStorage && localStorage.getItem('products')) {
        products = JSON.parse(localStorage.getItem('products'));
        let a = products.reduce(function (r, a) {
            return parseInt(r) + parseInt(a['price']);
        }, 0);
        let leng = products.length;
        $('.price-total-list').html("$" + a);
        if (leng > 0) {
            $('.list-cart').empty();
            $('.list-cart').html(displaylist());
        } else {
            $('.list-cart').html("<h2 style ='text-align:center;'>Nothing in cart!</h2>");
        }
    }

    function removeProduct(keyp) {
        let check = confirm('Are you sure you would like to remove this item from the shopping cart?');
        if (check) {
            let storageProducts = JSON.parse(localStorage.getItem('products'));
            let products = storageProducts.filter(product => product.key != keyp);
            localStorage.setItem('products', JSON.stringify(products));
        }

        let leng = (JSON.parse(localStorage.getItem('products')).length);
        $('.cart-qty').html(leng);
        if (leng >= 1) {
            $('.list-cart').empty();
            $('.list-cart').html(displaylist());

        } else {
           $('.list-cart').html("<h2 style ='text-align:center;'>Nothing in cart!</h2>");
        }
    }

    // let product_id = $('#product_id').val();
    // let product_image = $('#product_image').val();
    // let product_name = $('#product_name').val();
    // let product_price = $('#product_price').val();
    // let product_slug = $('#product_slug').val();
    // var product_qty = $('.qty').val();

    // $('.btn-cart').click(function () {
    //     addProduct(product_id, product_name, product_slug, product_image, product_price, product_qty);
    //     let leng = JSON.parse(localStorage.getItem('products')).length;
    //     if (leng > 0) {
    //         $('.inner-wrapper').empty();
    //         $('.inner-wrapper').html(display());
    //         $('.cart-qty').html(leng);
    //     }
    // });

    $(".container").on("click", ".btn-remove", function () {
        let key = ($(this).context.attributes.value.value);
        removeProduct(key);
    });
    $('#empty_cart_button').click(function() {
        if (localStorage && localStorage.getItem('products')) {
            localStorage.removeItem('products');
        }
        $('.list-cart').html("<h2 style ='text-align:center;'>Nothing in cart!</h2>");
    });
});