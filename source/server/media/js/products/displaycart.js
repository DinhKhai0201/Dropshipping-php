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
                        <a class="btn btn-default" href="${rootUrl}customer/checkout"><i class="icon-basket"></i>View Cart</a>
                        <a class="btn btn-default" href="${rootUrl}customer/checkout/cart"><i class="icon-right-thin"></i>Checkout</a>
                    <div class="clearer"></div>
                    </div>
                    `;
    return tmp;
}
jQuery(function ($) {

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

//     $(".cart-area").on("click", ".btn-remove", function () {
//         let keyp = ($(this).context.attributes.value.value);
//         let check = confirm('Are you sure you would like to remove this item from the shopping cart?');
//         if (check) {
//             let storageProducts = JSON.parse(localStorage.getItem('products'));
//             let products = storageProducts.filter(product => product.key != keyp);
//             localStorage.setItem('products', JSON.stringify(products));
//         }

//         let leng = (JSON.parse(localStorage.getItem('products')).length);
//         $('.cart-qty').html(leng);
//         if (leng >= 1) {
//             $('.inner-wrapper').empty();
//             $('.inner-wrapper').html(display());

//         } else {
//             $('.inner-wrapper').html('<p class="cart-empty">You have no items in your shopping cart. </p>');
//         }
//     });
// });