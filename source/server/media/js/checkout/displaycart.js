// function tmplist(element, rootUrl, RootREL) {
//     let tmp = '';
//     tmp = `         <tr>
//                         <td class="action-td"><a href="javascript:void(0)" value =${element.key} title="Remove item" class="btn-remove remove-key btn-remove2"></a></td>
//                         <td class="pr-img-td"><a href="${rootUrl}product/view/${element.slug}-${element.product_id}" title="${element.name}" class="product-image"><img src="${RootREL}media/upload/products/${element.image}" width="80" height="80" alt="${element.name}" /></a></td>
//                         <td class="product-name-td">
//                             <h2 class="product-name">
//                                 <a href="${rootUrl}product/view/${element.slug}-${element.product_id}">
//                                    ${element.name} </a>
//                             </h2>
//                         </td>
//                         <td>
//                             <a href="javascript:void(0)" key ="${element.key}" value ="${element.product_id}" colors ="${element.color}" qty ="${element.qty}" price = "${element.price}" image ="${element.image}" class="link-wishlist towishlist use-ajax">Move</a>
//                         </td>
//                         <td>
//                             <span class="cart-price">
//                                 <span class="price">${element.price}</span>
//                             </span>
//                         </td>
//                         <td>
//                             <div class="qty-holder">
//                                 <a href="javascript:void(0)" class="table_qty_dec">-</a><input  value="1" size="4" title="Qty" class="input-text qty" maxlength="12" /><a href="javascript:void(0)" class="table_qty_inc">+</a>
//                             </div>
//                         </td>
//                         <td>
//                             <span class="cart-color">
//                                 <span class="color">${element.color}</span>
//                             </span>
//                         </td>
//                         <td class="td-total">
//                             <span class="cart-price">
//                                 <span class="price">${parseInt(element.price) *parseInt(element.qty)}</span>
//                             </span>
//                         </td>
//                     </tr>
                   
//                     `;
//     return tmp;
// }
jQuery(function ($) {

    $(".cart-append-product").on("click", ".btn-remove", function () {
        let id = ($(this).context.attributes.value.value);
        $.ajax({
            url: rootUrl + "customer/checkout/removecart",
            method: "POST",
            data: {
                id: id,
            },
            success: function (data) {
                let id = JSON.parse(data);
                $('#item_' + id).remove();
                

            }
        });
    });
    $('#empty_cart_button').click(function() {
        $.ajax({
            url: rootUrl + "customer/checkout/removecartmany",
            method: "POST",
            success: function (data) {
                if (data) {
                    $('fieldset').remove();
                    $('.cart-table-wrap').html('<p>Nothing in cart</p>');
                } else {
                    console.log("Error");
                }
            }
        });
    });
});