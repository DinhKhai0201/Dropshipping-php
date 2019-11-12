jQuery(function ($) {
    $(".cart-area").on("click", ".remove-cart", function () {
        let id = ($(this).context.attributes.value.value);
        let price = ($(this).context.attributes.price.value);
        let check = confirm('Are you sure you would like to remove this item from the shopping cart?');
        if (check) {
            $.ajax({
            url: rootUrl + "customer/checkout/removecart",
            method: "POST",
            data: {
                id: id,
            },
            success: function (data) {
                let id = JSON.parse(data);
                $('.item_' + id).remove();
                $('#item_' + id).remove();
                // $('.price-total .getPrice').text();
                let price_id = $('.price-total .getPrice').html().substr(1);
                let qty = $('.cart-info .cart-qty').html();
                let new_price = (parseInt(price_id) - parseInt(price));
                if (new_price > 0 ) {
                    $('.price-total .getPrice').html('$' + new_price);
                    $('.cart-info .cart-qty').html(parseInt(qty) - 1)
                } else {
                    $('.inner-wrapper').html('<p class="cart-empty">You have no items in your shopping cart. </p>');
                    $('.cart-info .cart-qty').html('0')
                }
                }
            });
        }
    });
});