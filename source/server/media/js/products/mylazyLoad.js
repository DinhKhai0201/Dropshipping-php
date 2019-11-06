jQuery(function ($) {
    $("#block-upsell").owlCarousel({
        lazyLoad: true,
        itemsCustom: [
            [0, 2],
            [320, 2],
            [480, 2],
            [768, 3],
            [992, 3],
            [1200, 5]
        ],
        responsiveRefreshRate: 50,
        slideSpeed: 200,
        paginationSpeed: 500,
        scrollPerPage: false,
        stopOnHover: true,
        rewindNav: true,
        rewindSpeed: 600,
        pagination: true,
        navigation: false,
        autoPlay: true,
        navigationText: ["<i class='icon-left-open'></i>",
            "<i class='icon-right-open'></i>"
        ]
    });
    $("body.quickview-index-view .no-rating a, body.quickview-index-view .ratings a")
        .off('click').on("click", function (e) {
            window.parent.location.href = $(this).attr("href");
            window.parent.jQuery.fancybox.close();
        });
});