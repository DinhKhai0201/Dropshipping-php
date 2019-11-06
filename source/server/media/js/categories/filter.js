
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
    $(".pages ol").on("click", ".page", function () {
        let page = $(this).val();
        let url = window.location.href;
        if ((/categories\/page-(.*).html\?s=(.*)/g).test(url)) {
            var searchold = ((/categories\/page-(.*).html\?s=(.*)$/g).exec(url))[2];
        }
        window.history.pushState('', '', rootUrl +
            'categories/page-' + page + '.html?s=' + ((searchold != null) ? searchold : '')
        );
        location.reload();
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
                                            <a href='https://www.portotheme.com/magento/porto/index.php/demo1_en/ajaxcart/index/options/product_id/310/' class='fancybox' id='fancybox310' style='display:none'>Options</a>
                                            <div class="clearer"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
            `;
    return tmp;
}

function tmp_page(products) {
    let tmp = '';
    tmp += `
                <p class="amount">
                    Items ${products.nopp * (products.curp - 1) + 1} to ${products.nopp * (products.curp - 1) + products.nocurp} of ${products.norecords} total </p>
                <div class="pages">
                    <ol>
                        <li>
                            <span class="precious i-precious" href="" title="Precious">
                                <i class="fas fa-chevron-left"></i>
                            </span>
                        </li>`;
    for (let index = 1; index <= Math.ceil(products.norecords / products.nopp); index++) {
        if (products.curp == index) {
            tmp += `<li class = "current" > ${products.curp} </li>`;
        } else {
            tmp += `<li value = "${index}" class = "page page-${index}" >${index}</li>`;
        }
    }
    tmp += `<li >
            <span class = "next i-next" href = "" title = "Next" >
            <i class = "fas fa-chevron-right" > </i> </span > </li> </ol > 
            </div>
        `;
    return tmp;
}


$(document).ready(function () {
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

    function filter_data() {
        var search;
        var page;
        if ((/categories\/page-(.*).html\?s=(.*)/g).test(window.location.href)) {
            page = ((/categories\/page-(.*).html\?s=(.*)$/g).exec(window.location.href))[1];
            search = ((/categories\/page-(.*).html\?s=(.*)$/g).exec(window.location.href))[2];
        }
        var minimum_price = $('#min_price_hide').val();
        var maximum_price = $('#max_price_hide').val();
        var brand = get_filter('brand');
        var color = get_filter('color');
        var size = get_filter('size');
        console.log(size);
        var cat = get_cat_click();
        console.log(cat);
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
                type: type,
                page: page
            },
            success: function (data) {
                // console.log(data);
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
                $('.pager').html(tmp_page(product));
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
    $('#price_range').slider({
        range: true,
        min: 1,
        max: 300,
        values: [1, 300],
        step: 1,
        stop: function (event, ui) {
            $('#price_show').html("$"+ui.values[0] + ' - ' +"$"+ui.values[1]);
            $('#min_price_hide').val(ui.values[0]);
            $('#max_price_hide').val(ui.values[1]);
            filter_data();
        }
    });
});