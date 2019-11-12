jQuery(function ($) {
    $(".container").on("click", ".towishlist", function () {
        let id = ($(this).context.attributes.value.value);
        let key = ($(this).context.attributes.key.value);
        let color = ($(this).context.attributes.colors.value);
        let qty = ($(this).context.attributes.qty.value);
        let price = ($(this).context.attributes.price.value);
        let image = ($(this).context.attributes.image.value);
        $.ajax({
            url: rootUrl + "customer/wishlist/addtowishlist",
            method: "POST",
            data: {
                id: id,
                color: color,
                qty: qty,
                price:price,
                image: image
            },
            success: function (data) {
                // console.log(data);
                let product = JSON.parse(data);
                let html =`<ul class="messages"><li class="success-msg"><ul><li><span>${product.name} has been added to Wishlist</span></li></ul></li></ul>`; 
                $(html).insertAfter('.cart-append-product .page-title');

            }
        });

    });
       
});
