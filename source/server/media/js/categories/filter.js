
jQuery(function ($) {
    $(".block.block-category-nav .block-title").click(function () {
        if ($(this).hasClass("closed")) {
            $(".block.block-category-nav .block-content")
                .slideDown();
            $(this).removeClass("closed");
        } else {
            $(".block.block-category-nav .block-content").slideUp();
            $(this).addClass("closed");
        }
    });
    $(".block.block-category-nav .category-list a.plus").click(function () {
        // console.log($(this).parent().parent().children("ul"));
        if ($(this).parent().hasClass("opened")) {
            $(this).parent().parent().children("ul").slideUp();
            $(this).parent().removeClass("opened");
            $(this).parent().children("fas fa-minus").removeClass(
                "fas fa-minus").addClass(
                    "fas fa-plus");
        } else {
            $(this).parent().parent().children("ul").slideDown();
            $(this).parent().addClass("opened");
            $(this).parent().children("fas fa-plus").removeClass(
                "fas fa-plus").addClass(
                    "fas fa-minus");
        }
    });
    // $("input[type='checkbox']").change(function () {
    //     $(this).siblings('ul')
    //         .find("input[type='checkbox']")
    //         .prop('checked', this.checked);
    // });
    $(".block-layered-nav dt").click(function () {
        if ($(this).next("dd").css("display") == "none") {
            $(this).next("dd").slideDown(200);
            $(this).removeClass("closed");
        } else {
            $(this).next("dd").slideUp(200);
            $(this).addClass("closed");
        }
    });
    $('.layer-filter-icon, .close-mobile-layer, .close-layer').click(function (
        event) {
        if (!$('body').hasClass('mobile-layer-shown')) {
            $('body').addClass('mobile-layer-shown', function () {
                setTimeout(function () {
                    $(document).one("click", function (e) {
                        var target = e.target;
                        if (!$(target).is(
                            '.block-main-layer .block'
                        ) && !$(target)
                            .parents().is(
                                '.block-main-layer .block'
                            )) {
                            $('body').removeClass(
                                'mobile-layer-shown'
                            );
                        }
                    });
                }, 111);
            });
        } else {
            $('body').removeClass('mobile-layer-shown');
        }
    });

});
$(document).ready(function () {
    function panigation(page, rootUrl) {
        let url = window.location.href;
        if ((/categories\/page-(.*).html\?s=(.*)/g).test(url)) {
            var searchold = ((/categories\/page-(.*).html\?s=(.*)$/g).exec(url))[2];
        }
        window.history.pushState('', '', rootUrl +
            'categories/page-' + page + '.html?s=' + ((searchold != null) ? searchold : '')
        );
        location.reload();
    }
    $(".category-products").on("click", ".page", function () {
        let page = $(this).children().attr('data-dt-idx');
        panigation(page, rootUrl);
    });
   
});
function tmp_product(product, RootREL, rootUrl) {
    let tmp = '';
    tmp += ` 
                 <li class="item">
                                <div class="item-area product-image-hover">
                                    <div class="product-image-area " style="width: 100%;height: 100%;">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="${rootUrl}product/quickview/${product.slug}-${product.id}" class="quickview-icon quickview-icon-custom"><i class="icon-export"></i><span>Quick
                                                View</span></a>
                                        <a href="${rootUrl}product/view/${product.slug}-${product.id}" title="${product.name}" class="product-image">
                                            <img id="product-collection-image-${product.id}" class="defaultImage porto-lazyload" data-src="${RootREL}media/upload/products/${product.oneImage}" width="300" height="300" src="${RootREL}media/upload/products/${product.oneImage}" />
                                            <img class="hoverImage" src="${RootREL}media/upload/products/${product.oneImage}" width="300" alt="Black" />
                                        </a>`;
    if (product.best_selling == 1) {
        tmp += `<div class="product-label " style="right: 10px;"><span class="new-product-icon">HOT</span></div>`;
    }
    tmp += `                           
                                    </div>
                                    <div class="details-area">
                                        <h2 class="product-name"><a href="${rootUrl}product/view/${product.slug}-${product.id}" title="${product.name}">${product.name}</a>
                                        </h2>
                                        <ul class="configurable-swatch-list configurable-swatch-color">`;
    let colors = product.color.split(",");
    colors.forEach(color => {
        tmp += `                  <li class="option-${color} is-media" data-product-id="${product.id}" data-option-label="${color}">
                                                        <span class="swatch-label" style="height: 15px; width: 15px; line-height: 15px;">
                                                            <img src="${RootREL}media/img/colors/${color}.png" alt="${color}" width="15" height="15" />
                                                        </span>
                                                </li>
            
            `;
    });
    tmp += `                              
           
                                        </ul>
                                        <div class="price-box">
                                            <span class="regular-price" id="product-price-${product.id}; ?>">
                                                <span class="price">$${product.price}</span> </span>
                                        </div>
                                        <div class="actions">
                                            <a href="javascript:showOptions('310')" class="addtocart" title="Add to Cart"><i class="icon-cart"></i><span>&nbsp;Add to
                                                    Cart</span></a>
                                            <a href='' class='fancybox' id='fancybox310' style='display:none'>Options</a>
                                            <div class="clearer"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
            `;
    return tmp;
}



function pagi(data) {
    let tmp = '';
    let nopages = Math.ceil(parseInt(data.norecords) / parseInt(data.nopp));
    tmp += `
        <div class="pager">

        <div class="pages">
            <ol>
                <li class="page previous " id="table_previous" style="cursor:pointer">
                    <span style="display:${(parseInt(data.curp) == 1) ? 'none' : 'block'}" tabindex="" data-dt-idx="${parseInt(data.curp) - 1}"><i class="fas fa-chevron-left"></i></span>
                </li>`;
    let start = 1;
    if (parseInt(data.curp) > 2 && parseInt(nopages) > 3) {
        tmp += `<li class="page" style="cursor:pointer">
                        <span tabindex="0">1</span>
                    </li>
                    <li class="page disabled" style="cursor:pointer">
                        <span href="javascript:void(0);">...</span>
                    </li>`;
    }
    start = (parseInt(data.curp) - 1) < 1 ? 1 : (parseInt(data.curp) - 1);
    let end = (parseInt(data.curp) + 1) > parseInt(nopages) ? parseInt(nopages) : (parseInt(data.curp) + 1);
    for (let index = start; index <= end; index++) {
        tmp += `<li class="page ${(index == parseInt(data.curp)) ? 'current' : ''}" style="cursor:pointer">
                        <span data-dt-idx="${index}" tabindex="0">${index}</span>
                    </li>`;

    }
    end = nopages;
    if (end - parseInt(data.curp) > 1 && parseInt(nopages) > 3) {
        tmp += ` <li class="page disabled">
                        <span href="javascript:void(0);">...</span>
                    </li>
                    <li class="page" style="cursor:pointer">
                        <span tabindex="0" data-dt-idx="${parseInt(nopages)}">${parseInt(nopages)}</span>
                    </li> `;
    }
    tmp += `
                <li class="page next " id="table_next" style="cursor:pointer">
                    <span style="display:${(parseInt(data.curp) == parseInt(nopages)) ? 'none' : 'block'}" aria-controls="example1" data-dt-idx="${parseInt(data.curp) + 1}" tabindex="0"><i class="fas fa-chevron-right"></i>
                    </span>
                </li>

            </ol>
        </div>

    </div>
    `;
    return tmp;
}
$(document).ready(function () {
    var page_filter = null;
        let  pages = $('.pages ol li');
        console.log(pages);
        if (pages.eq(1).hasClass('current')) {
            console.log("1");
            $('#prev').addClass('notallow');
            $('#next').addClass('pointer');
        } else if (pages.eq(pages.size() - 2).hasClass('current')) {
            console.log("last");
            $('#next').addClass('notallow');
            $('#prev').addClass('pointer');
        } else {
            $('#prev').addClass('pointer');
            $('#next').addClass('pointer');
        }
    function get_cat_click() {
        let cat = [];
        $('.cat:checked').each(function () {
            cat.push($(this).val());
        });
        cat = cat.filter((element, indexOfElement) => {
            return indexOfElement === cat.indexOf(element)
        });
        return cat;

    }
    $('.choose-color').click(function () {
        var a = $(this).attr("value");
        console.log(a);
    });
    function animationScroll() {
        jQuery("html, body").animate({
            scrollTop: jQuery(".products-display").offset().top - 60
        }, 1000);
    }
    $(".container").on("click", ".page-filter", function () {
        page_filter = $(this).val();
        filter_data();
        
    });
    function filter_data() {
        var search;
        var page;
        if ((/categories\/page-(.*).html\?s=(.*)/g).test(window.location.href)) {
            page = ((/categories\/page-(.*).html\?s=(.*)$/g).exec(window.location.href))[1];
            search = ((/categories\/page-(.*).html\?s=(.*)$/g).exec(window.location.href))[2];
        }
        if (page_filter) {
            page = page_filter;
        }
        var minimum_price = $('#min_price_hide').val();
        var maximum_price = $('#max_price_hide').val();
        var brand = get_filter('brand');
        var color = get_filter('color');
        var size = get_filter('size');
        console.log(size);
        var cat = get_cat_click();
        console.log(page);
        var sort = $('.sort').val();
        var type = $('.type').val();
        //filter 

        // 
        $.ajax({
            url: rootUrl + "categories/fetch_data",
            method: "POST",
            data: {
                minimum_price: minimum_price,
                maximum_price: maximum_price,
                brand: brand,
                color: color,
                cat: cat,
                search: search,
                sort: sort,
                size: size,
                type: type,
                page: page
            },
            success: function (data) {
                // console.log(data);
                toastr.success("Successfully filter");
                $('.products-display').empty();
                $('.pager').empty();
                let product = JSON.parse(data);
                let products = JSON.parse(data)['data'];
                let html = '';
                products.forEach(element => {
                    html += tmp_product(element, RootREL, rootUrl);
                });
                $('.products-display').html(html);
                $(' .message-result span.number').html(product.norecords);
                $('.pager').html(pagi(product));
                animationScroll();
            }
        });
    }

    function get_filter(class_name) {
        var filter = [];
        $('.' + class_name + ':checked').each(function () {
            filter.push($(this).val());
        });
        return filter;
    }
    $('.filter_all').click(function () {
        filter_data();
    });
    //sort 
    var sort = $('.sort').val();
    var type = $('.type').val();

    // $('.filter_all').on('change', function() {
    //     $(this).parent().parent().clone().appendTo('.filter-choose-content');
    // });
    $('.sort').on('change', function () {
        sort = $(this).val();
    });
    $('.type').on('change', function () {
        type = $(this).val();

    });
    $('.bt-filter-cat').click(function () {
        filter_data();
    });
    $('ol.colors').on("click", "li", function () {
        $('.color:checked').parent().addClass('border-choose');
        $('.color:not(:checked)').parent().removeClass('border-choose');
    });
    $('ol.sizes').on("click", "li", function () {
        $('.size:checked').parent().addClass('border-choose');
        $('.size:not(:checked)').parent().removeClass('border-choose');
    });
    // $('#price_range').slider({
    //     range: true,
    //     min: 1,
    //     max: 300,
    //     values: [1, 300],
    //     step: 1,
    //     stop: function (event, ui) {
    //         $('#price_show').html("$"+ui.values[0] + ' - ' +"$"+ui.values[1]);
    //         $('#min_price_hide').val(ui.values[0]);
    //         $('#max_price_hide').val(ui.values[1]);
    //         filter_data();
    //     }
    // });
    var newMinPrice, newMaxPrice, url, temp;
    var categoryMinPrice = 1;
    var categoryMaxPrice = 300;
    $(".slider-range").slider({
        range: true,
        min: categoryMinPrice,
        max: categoryMaxPrice,
        values: [1, 300],
        step: 1,
        slide: function (event, ui) {
            newMinPrice = ui.values[0];
            newMaxPrice = ui.values[1];
            $(".price-amount").val("$" + newMinPrice + " - $" + newMaxPrice);
            // Update TextBox Price
            $(".minPrice").val(newMinPrice);
            $(".maxPrice").val(newMaxPrice);
        },
        stop: function (event, ui) {
            // Current Min and Max Price
            var newMinPrice = ui.values[0];
            var newMaxPrice = ui.values[1];
            // Update Text Price
            $(".price-amount").val("$" + newMinPrice + " - $" + newMaxPrice);
            // Update TextBox Price
            $(".minPrice").val(newMinPrice);
            $(".maxPrice").val(newMaxPrice);
            filter_data();
        }
    });

    function isNumber(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    }
    $(".priceTextBox").focus(function () {
        temp = $(this).val();
    });

    $(".priceTextBox").keyup(function () {
        var value = $(this).val();
        if (value != "" && !isNumber(value)) {
            $(this).val(temp);
        }
    });

    $(".priceTextBox").keypress(function (e) {
        if (e.keyCode == 13) {
            var value = $(this).val();
            if (value < categoryMinPrice || value > categoryMaxPrice) {
                $(this).val(temp);
            }
            filter_data();
        }
    });

    $(".priceTextBox").blur(function () {
        var value = $(this).val();
        if (value < categoryMinPrice || value > categoryMaxPrice) {
            $(this).val(temp);
        }
    });
    $('.go').click(function () {
        filter_data();
    });
   
});