var windowScroll_t;
jQuery(window).scroll(function () {
    clearTimeout(windowScroll_t);
    windowScroll_t = setTimeout(function () {
        if (jQuery(this).scrollTop() > 100) {
            jQuery('#totop').fadeIn();
        } else {
            jQuery('#totop').fadeOut();
        }
    }, 500);
});
jQuery('#totop').click(function () {
    jQuery('html, body').animate({
        scrollTop: 0
    }, 600);
    return false;
});
jQuery(function ($) {
    $(".cms-index-index .footer-container.fixed-position .footer-top,.cms-index-index .footer-container.fixed-position .footer-middle")
        .remove();
});
jQuery(function ($) {
    $(".col-left.sidebar").css("position", "relative");
    $(".col-right.sidebar").css("position", "relative");
    var main_area_pos = $(".col-main");
    var main_area_height = $(".col-main").outerHeight();
    var left_side_top = 0;
    var right_side_top = 0;
    var cur_Y = pre_Y = 0;
    $(document).ready(function () {
        stickySidebar();
    });
    $(window).scroll(function () {
        stickySidebar();
    });
    $(window).resize(function () {
        left_side_top = 0;
        stickySidebar();
    });

    function stickySidebar() {
        if ($(".col-main").length > 0) {
            main_area_pos = $(".col-main").offset().top;
            main_area_height = $(".col-main").outerHeight();
            margin_top = $(".header-container").hasClass("sticky-header") ? 60 : 10;
            margin_bottom = 10;
            var fixedSideTop = fixedSideBottom = fixedSideTop_r = fixedSideBottom_r = 0;
            cur_Y = $(window).scrollTop();
            if ($(".col-left.sidebar").outerHeight() < main_area_height) {
                if ($(window).height() < $(".col-left.sidebar").outerHeight() + margin_top +
                    margin_bottom) {
                    if (main_area_pos >= cur_Y + margin_top) {
                        left_side_top = 0;
                    } else if (cur_Y >= main_area_pos + main_area_height - $(window).height()) {
                        left_side_top = main_area_height - $(".col-left.sidebar").outerHeight();
                    } else {
                        if (cur_Y > pre_Y) {
                            if (fixedSideTop) {
                                fixedSideTop = 0;
                                left_side_top = $(".col-left.sidebar").offset().top - main_area_pos;
                            } else if (!fixedSideBottom && $(".col-left.sidebar").outerHeight() + $(
                                ".col-left.sidebar").offset().top < cur_Y + $(window)
                                    .height()) {
                                fixedSideBottom = 1;
                                left_side_top = cur_Y - (main_area_pos + $(".col-left.sidebar")
                                    .outerHeight() - $(window).height()) - 10
                            }
                        } else {
                            if (fixedSideBottom) {
                                fixedSideBottom = 0;
                                left_side_top = cur_Y - main_area_pos - $(".col-left.sidebar")
                                    .outerHeight() + $(window).height() - 10;
                            } else if (!fixedSideTop && $(".col-left.sidebar").offset().top >=
                                cur_Y + margin_top) {
                                fixedSideTop = 1;
                                left_side_top = cur_Y - main_area_pos + margin_top;
                            }

                        }
                    }
                } else {
                    if (cur_Y >= (main_area_pos - margin_top) && cur_Y + $(".col-left.sidebar")
                        .outerHeight() + margin_top < main_area_pos + main_area_height) {
                        left_side_top = cur_Y - main_area_pos + margin_top;
                    } else if (cur_Y + $(".col-left.sidebar").outerHeight() + margin_top >
                        main_area_pos + main_area_height) {
                        left_side_top = main_area_height - $(".col-left.sidebar").outerHeight();
                    } else {
                        left_side_top = 0;
                    }

                    fixedSideTop = fixedSideBottom = 0;
                }
                $(".col-left.sidebar").css("top", left_side_top + "px");
            }
            if ($(".col-right.sidebar").outerHeight() < main_area_height) {
                if ($(window).height() < $(".col-right.sidebar").outerHeight() + margin_top +
                    margin_bottom) {
                    if (main_area_pos >= cur_Y + margin_top) {
                        right_side_top = 0;
                    } else if (cur_Y >= main_area_pos + main_area_height - $(window).height()) {
                        right_side_top = main_area_height - $(".col-right.sidebar").outerHeight();
                    } else {
                        if (cur_Y > pre_Y) {
                            if (fixedSideTop_r) {
                                fixedSideTop_r = 0;
                                right_side_top = $(".col-right.sidebar").offset().top -
                                    main_area_pos;
                            } else if (!fixedSideBottom_r && $(".col-right.sidebar").outerHeight() +
                                $(".col-right.sidebar").offset().top < cur_Y + $(window).height()) {
                                fixedSideBottom_r = 1;
                                right_side_top = cur_Y - (main_area_pos + $(".col-right.sidebar")
                                    .outerHeight() - $(window).height()) - 10
                            }
                        } else {
                            if (fixedSideBottom_r) {
                                fixedSideBottom_r = 0;
                                right_side_top = $(".col-right.sidebar").offset().top -
                                    main_area_pos;
                            } else if (!fixedSideTop_r && $(".col-right.sidebar").offset().top >=
                                cur_Y + margin_top) {
                                fixedSideTop_r = 1;
                                right_side_top = cur_Y - main_area_pos + margin_top;
                            }

                        }
                    }
                } else {
                    if (cur_Y >= (main_area_pos - margin_top) && cur_Y + $(".col-right.sidebar")
                        .outerHeight() + margin_top < main_area_pos + main_area_height) {
                        right_side_top = cur_Y - main_area_pos + margin_top;
                    } else if (cur_Y + $(".col-right.sidebar").outerHeight() + margin_top >
                        main_area_pos + main_area_height) {
                        right_side_top = main_area_height - $(".col-right.sidebar").outerHeight();
                    } else {
                        right_side_top = 0;
                    }

                    fixedSideTop_r = fixedSideBottom_r = 0;
                }
                $(".col-right.sidebar").css("top", right_side_top + "px");
            }
            pre_Y = cur_Y;
        }
    }
});