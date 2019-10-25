<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Drop Shipping</title>
    <meta name="description" content="Default Description" />
    <meta name="keywords" content="Drop Shipping, E-commerce" />
    <meta name="robots" content="INDEX,FOLLOW" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="<?php echo RootREL; ?>media/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php echo RootREL; ?>media/favicon.ico" type="image/x-icon" />
    <!-- <link href="<?php echo RootREL; ?>media/css_secure/font-awesome/css/all.css" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo RootREL; ?>media/css_secure/f88342096cf89fd57d043d509d14e567.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo RootREL; ?>media/css_secure/ed4137a989c52609c4613d6c0bcacd3a.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo RootREL; ?>media/css_secure/9c353ad7c3c57ca26c5f27068d2cafe5.css" media="print" />
    <script type="text/javascript" src="<?php echo RootREL; ?>media/js/4190df6d2f2903545088c80753c55f73.js"></script>
    <script type="text/javascript" src="<?php echo RootREL; ?>media/js/addthis_widget.js"></script>
    <script type="text/javascript">
        jQuery(function($) {
            var scrolled = false;
            $(window).scroll(function() {
                if (140 < $(window).scrollTop() && !scrolled) {
                    if (!$('.header-container .menu-wrapper .mini-cart').length && !$(
                            '.header-container .menu-wrapper .sticky-logo').length) {
                        $('.header-container').addClass("sticky-header");
                        var minicart = $('.header-container .mini-cart').html();
                        $('.header-container .menu-wrapper').append('<div class="mini-cart">' + minicart +
                            '</div>');
                        var logo_image = $('<div>').append($('.header-container .header > .logo').clone())
                            .html();
                        $('.header-container .menu-wrapper').prepend('<div class="sticky-logo">' +
                            logo_image + '</div>');
                        $('.header-container .header-wrapper > div').each(function() {
                            if ($(this).hasClass("container")) {
                                $(this).addClass("already");
                            } else {
                                $(this).addClass("container");
                            }
                        });
                        scrolled = true;
                    }
                }
                if (140 >= $(window).scrollTop() && scrolled) {
                    $('.header-container').removeClass("sticky-header");
                    $('.header-container .menu-wrapper .mini-cart').remove();
                    $('.header-container .menu-wrapper > .sticky-logo').remove();
                    $('.header-container.type15 .header > .logo img.sticky-logo-image').remove();
                    $('.header-container.type15 .header > .logo img').removeClass("hide");
                    scrolled = false;
                    $('.header-container .header-wrapper > div').each(function() {
                        if ($(this).hasClass("already")) {
                            $(this).removeClass("already");
                        } else {
                            $(this).removeClass("container");
                        }
                    });
                }
            });
        });
    </script>
    <!-- slide -->
    <script type="text/javascript">
        //<![CDATA[
        if (typeof EM == 'undefined') EM = {};
        EM.Quickview = {
            QS_FRM_WIDTH: "1000",
            QS_FRM_HEIGHT: "730"
        };
        //]]	
    </script>
    <style type="text/css">
        .header-wrapper {
            border-bottom: 0;
        }

        .main-nav {
            margin-bottom: 0;
        }
    </style>
    <script type="text/javascript">
        var Translator = new Translate([]);
    </script>
    <script type="text/javascript">
        if (typeof dailydealTimeCountersCategory == 'undefined') {
            var dailydealTimeCountersCategory = new Array();
            var i = 0;
        }
    </script>
</head>
<?php
global $enableOB;
if ($enableOB) {
    ob_start("vendor_html_helper::_media");
    echo "CSSABOVE";
}
echo vendor_html_helper::_cssHeader();
?>

<body class=" cms-index-index cms-porto-home-4">