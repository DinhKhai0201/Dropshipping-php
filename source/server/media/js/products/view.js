jQuery(function ($) { 
    $('.container').on('click','.click-view-bt', function(){
        let key = $(this).attr('key');
        console.log(key)
        $.ajax({
            url: rootUrl + "product/click",
            method: "POST",
            data: {
                product_id: key,
            },
            success: function (data) {
                console.log(data)
            }
        });
    });
})