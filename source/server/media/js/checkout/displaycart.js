
jQuery(function ($) {
    $(".cart-append-product").on("click", ".btn-remove", function () {
        let id = ($(this).context.attributes.value.value);
        let price = ($(this).context.attributes.price.value);

        $.ajax({
            url: rootUrl + "customer/checkout/removecart",
            method: "POST",
            data: {
                id: id,
            },
            success: function (data) {
                let id = JSON.parse(data);
                let qty = $('.cart-info .cart-qty').html();
                let price_id = $('.price-total .getPrice').html();
                if (parseInt(qty) == 0) {
                    price_id = 0;
                } else {
                    price_id = price_id.substr(1);
                }
                let new_price = (parseInt(price_id) - parseInt(price));
                if (new_price > 0 ) {
                    $('.price-total .getPrice').html('$' + new_price);
                    $('.cart-info .cart-qty').html(parseInt(qty) - 1)
                } else {
                    $('.inner-wrapper').html('<p class="cart-empty">You have no items in your shopping cart. </p>');
                    $('.cart-info .cart-qty').html('0')
                }
                $('.price-total-list').html('$' + new_price);
                $('#item_' + id).remove();
                $('.item_' + id).remove();
                
            }
        });
    });
    $('#empty_cart_button').click(function() {
        $.ajax({
            url: rootUrl + "customer/checkout/removecartmany",
            method: "POST",
            success: function (data) {
                let status = JSON.parse(data);
                if (status) {
                    $('fieldset').remove();
                    $('.cart-table-wrap').html('<p>Nothing in cart</p>');
                    $('.cart-info .cart-qty').html('0')
                    $('.price-total-list').html('$0');
                    $('.inner-wrapper').html('<p class="cart-empty">You have no items in your shopping cart. </p>');
                } else {
                    console.log("Error");
                }
            }
        });
    });
});