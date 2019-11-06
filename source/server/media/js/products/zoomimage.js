    var zoom_enabled = false;
    var zoom_type = 0;
    jQuery(document).ready(function() {
    reloadEtalage();
    jQuery(".product-img-box .etalage li.etalage_thumb").zoom({
    touch: false
    });
    zoom_enabled = true;
    setTimeout(function() {
    reloadEtalage();
    }, 500);
    jQuery(window).resize(function(e) {
    reloadEtalage();
    var width = jQuery(this).width();
    });
    jQuery('.etalage-prev').on('click', function() {
    etalage_ODAxYmI4NDJiZTcyOWIyODQ5ODQ0NjYyMzE0MTJkNmM_previous();
    });
    jQuery('.etalage-next').on('click', function() {
    etalage_ODAxYmI4NDJiZTcyOWIyODQ5ODQ0NjYyMzE0MTJkNmM_next();
    });
    jQuery(
    "a.fancy-images_ODAxYmI4NDJiZTcyOWIyODQ5ODQ0NjYyMzE0MTJkNmM")
    .fancybox();

    function reloadEtalage() {
    var src_img_width = 600;
    var src_img_height = "auto";
    var ratio_width = 600;
    var ratio_height = 600;
    var width, height, thumb_position, small_thumb_count;
    small_thumb_count = 4;
    width = jQuery(".product-view .product-img-box").width() -
    8;
    height = "auto";
    thumb_position = "bottom";

    jQuery(
    '#etalage_ODAxYmI4NDJiZTcyOWIyODQ5ODQ0NjYyMzE0MTJkNmM')
    .etalage({
    thumb_image_width: width,
    thumb_image_height: height,
    source_image_width: src_img_width,
    source_image_height: src_img_height,
    zoom_area_width: width,
    zoom_area_height: height,
    zoom_enable: false,
    small_thumbs: small_thumb_count,
    smallthumb_hide_single: false,
    smallthumbs_position: thumb_position,
    smallthumb_inactive_opacity: 1,
    small_thumbs_width_offset: 0,
    show_icon: false,
    autoplay: false
    });
    if (jQuery(window).width()
    < 768) { var first_img=jQuery( "#etalage_ODAxYmI4NDJiZTcyOWIyODQ5ODQ0NjYyMzE0MTJkNmM img.etalage_thumb_image"
        ).first(); var tmp_img=jQuery('<img src="" alt="" />');
    tmp_img.attr("src", first_img.attr("src"));
    tmp_img.unbind("load");
    tmp_img.bind("load", function() {
    jQuery(
    "#etalage_ODAxYmI4NDJiZTcyOWIyODQ5ODQ0NjYyMzE0MTJkNmM"
    )
    .height(Math.round(width * this
    .naturalHeight / this
    .naturalWidth + 8) + "px");
    });
    jQuery(
    '#etalage_ODAxYmI4NDJiZTcyOWIyODQ5ODQ0NjYyMzE0MTJkNmM')
    .removeClass("vertical");
    jQuery(
    ".product-view .product-img-box li.etalage_thumb")
    .css({
    left: 0
    });
    }
    var first_img = jQuery(
    "#etalage_ODAxYmI4NDJiZTcyOWIyODQ5ODQ0NjYyMzE0MTJkNmM img.etalage_thumb_image"
    ).first();
    var tmp_img = jQuery('<img src="" alt="" />');
    tmp_img.attr("src", first_img.attr("src"));
    tmp_img.unbind("load");
    tmp_img.bind("load", function() {
    jQuery(
    "#etalage_ODAxYmI4NDJiZTcyOWIyODQ5ODQ0NjYyMzE0MTJkNmM"
    )
    .height(Math.round(width * this
    .naturalHeight / this.naturalWidth +
    8) + "px");
    });
    }
    });