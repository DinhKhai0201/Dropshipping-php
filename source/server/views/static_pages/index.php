<?php
global $mediaFiles;
array_push($mediaFiles['css'], RootREL . "media/css/page/pages.css");
?>
<?php include_once 'views/layout/' . $this->layout . 'top.php'; ?>

<?php if ($app['prs'][1] == 'contact-us') { ?>
    <div class="top-container">
        <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?v=3.17"></script>
        <script type="text/javascript">
            function initialize() {
                var pos = new google.maps.LatLng(16.079453, 108.157645);
                var mapOptions = {
                    center: pos,
                    panControl: true,
                    zoomControl: true,
                    mapTypeControl: true,
                    scaleControl: true,
                    streetViewControl: true,
                    overviewMapControl: true,
                    zoom: 18
                };
                var map = new google.maps.Map(document.getElementById("store_map"), mapOptions);
                var marker = new google.maps.Marker({
                    position: pos,
                    map: map,
                    title: 'Porto Store'
                });
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        <div id="store_map" style="min-height: 300px; width: 100%;"></div>
    </div>
    <div class="main-container col1-layout">
        <div class="main container">
            <div class="col-main">
                <div class="row">
                    <div class="col-md-8">
                        <form action="<?php echo vendor_app_util::url(["area" => "", "ctl" => "static_pages", "act" => 'sendmailcontact']); ?>" method="post">
                            <h2 class="legend">Leave a <b>Message</b></h2>
                            <div class="row">
                                <ul class="form-list col-md-6">
                                    <li>
                                        <label for="name" class="required"><em>*</em>Name</label>
                                        <div class="input-box">
                                            <input name="name" id="name" title="Name" value="" class="input-text required-entry" type="text" required />
                                        </div>
                                    </li>
                                    <li>
                                        <label for="email" class="required"><em>*</em>Email</label>
                                        <div class="input-box">
                                            <input name="email" id="email" title="Email" value="" required class="input-text required-entry validate-email" type="text" />
                                        </div>
                                    </li>
                                    <li>
                                        <label for="telephone">Telephone</label>
                                        <div class="input-box">
                                            <input name="telephone" id="telephone" title="Telephone" value="" required class="input-text" type="text" />
                                        </div>
                                    </li>
                                </ul>
                                <ul class="form-list col-md-6">
                                    <li>
                                        <label for="comment" class="required"><em>*</em>Comment</label>
                                        <div class="input-box input-textarea">
                                            <textarea name="comment" id="comment" title="Comment" required class="required-entry input-text" cols="5" rows="3" placeholder="Comment"></textarea>
                                        </div>
                                    </li>
                                    <li>
                                        <input type="text" name="hideit" id="hideit" value="" style="display:none !important;" />
                                        <button type="submit" title="Submit" class="button" name="btn-submit"><span><span>Submit</span></span></button>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                    <style>

                    </style>
                    <div class="col-md-4 contact-info">
                        <h2 class="legend">Contact <b>Details</b></h2>
                        <div class="row">
                            <div class="col-md-12">
                                <i class="fas fa-phone contact-p"></i>
                                <span>0201 203 2032</span>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <i class="fas fa-mobile-alt contact-p"></i>
                                <span>201-123-3922</span>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <i class="far fa-envelope contact-p"></i>
                                <span>pscd@gmail.com</span>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <i class="fab fa-skype contact-p"></i>
                                <span>pscd_skype</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else if ($app['prs'][1] == 'about-us') { ?>
    <div class="top-container">
        <div style="background:url(<?php echo RootREL; ?>media/wysiwyg/porto/top-bg.jpg) right no-repeat;background-size: cover;text-align: left;padding: 80px 0;">
            <div class="container">
                <em style="font-family:'Open Sans';font-size:18px;font-weight: 700;color: #1e3636;font-style: normal;line-height: 1;display: block;margin-bottom: 5px;">
                    <?php echo $this->record['title'] ?>
                </em>
                <h2 style="font-family:'Open Sans';font-size:36px;font-weight: 800;color: #1e3636;font-style: normal;line-height: 1;margin: 0;margin-bottom: 30px;">
                    OUR COMPANY
                </h2>
                <button class="btn" style="font-family:'Oswald';font-size:14px;font-weight:400;line-height:1;color:#fff;background-color: #010204;padding: 13px 25px;border-radius: 2px;">
                    CONTACT
                </button>
            </div>
        </div>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 a-left">
                        <ul>
                            <li class="home">
                                <a href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => '')); ?>" title="Go to Home Page">
                                    Home
                                </a>
                                <span class="breadcrumbs-split">
                                    >
                                </span>
                            </li>
                            <li class="cms_page">
                                <strong>
                                    <?php echo $this->record['title'] ?>
                                </strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-container col1-layout">
        <div class="main container">
            <div class="col-main">
                <div class="std">
                    <div class="content-row" style="padding: 40px 0 60px;">
                        <?php echo $this->record['content'] ?>
                    </div>
                    <div class="content-row fullwidth-row" style="background-color:#efefef;padding:50px 0 57px;">
                        <div class="container">
                            <h2>
                                WHY CHOOSE US
                            </h2>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="service-block">
                                        <i class="fa fa-truck" aria-hidden="true" style="font-size:35px;"></i>
                                        <h3>
                                            Free Shipping
                                        </h3>
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industr.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="service-block">
                                        <i class="fa fa-usd" aria-hidden="true" style="font-size:37px;"></i>
                                        <h3>
                                            100% money back guarantee.
                                        </h3>
                                        <p>
                                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="service-block">
                                        <i class="fa fa-phone" aria-hidden="true" style="font-size:37px;"></i>
                                        <h3>
                                            Online Support 24/7
                                        </h3>
                                        <p>
                                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content-row fullwidth-row" style="background-color:#efefef;">
                        <div class="container">
                            <div class="counters">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-6">
                                        <div class="counter counter-primary" data-appear-animation="bounceIn" data-appear-animation-delay="300">
                                            <strong data-append="+" data-to="200">
                                                200+
                                            </strong>
                                            <label>
                                                MILLION CUSTOMERS
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-6">
                                        <div class="counter counter-primary" data-appear-animation="bounceIn" data-appear-animation-delay="600">
                                            <strong data-append="+" data-to="1800">
                                                1800+
                                            </strong>
                                            <label>
                                                TEAM MEMBERS
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-6">
                                        <div class="counter counter-primary" data-appear-animation="bounceIn" data-appear-animation-delay="900">
                                            <strong data-append="<span>HR</span>" data-to="24">
                                                24
                                                <span>
                                                    HR
                                                </span>
                                            </strong>
                                            <label>
                                                SUPPORT AVAILABLE
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-6">
                                        <div class="counter counter-primary" data-appear-animation="bounceIn" data-appear-animation-delay="1200">
                                            <strong data-append="+" data-to="265">
                                                265+
                                            </strong>
                                            <label>
                                                CUP OF COFFEE
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-6">
                                        <div class="counter counter-primary" data-appear-animation="bounceIn" data-appear-animation-delay="1200">
                                            <strong data-append="<span>%</span>" data-to="99">
                                                99
                                                <span>
                                                    %
                                                </span>
                                            </strong>
                                            <label>
                                                POSITIVE REVIEWS
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <style type="text/css">

                    </style>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // Counter
        (function($) {
            'use strict';
            if ($.isFunction($.fn['themePluginCounter'])) {
                $(function() {
                    $('[data-plugin-counter]:not(.manual), .counters [data-to]').each(function() {
                        var $this = $(this),
                            opts;
                        var pluginOptions = $this.data('plugin-options');
                        if (pluginOptions)
                            opts = pluginOptions;
                        $this.themePluginCounter(opts);
                    });
                });
            }
        }).apply(this, [jQuery]);
    </script>
<?php } else if ($app['prs'][1] == 'introduce') { ?>
    <div class="top-container">
        <div style="background:url(<?php echo RootREL; ?>media/wysiwyg/porto/top-bg.jpg) right no-repeat;background-size: cover;text-align: left;padding: 80px 0;">
            <div class="container">
                <em style="font-family:'Open Sans';font-size:18px;font-weight: 700;color: #1e3636;font-style: normal;line-height: 1;display: block;margin-bottom: 5px;">
                    <?php echo $this->record['title'] ?>
                </em>
                <h2 style="font-family:'Open Sans';font-size:36px;font-weight: 800;color: #1e3636;font-style: normal;line-height: 1;margin: 0;margin-bottom: 30px;">
                    OUR COMPANY
                </h2>
                <button class="btn" style="font-family:'Oswald';font-size:14px;font-weight:400;line-height:1;color:#fff;background-color: #010204;padding: 13px 25px;border-radius: 2px;">
                    CONTACT
                </button>
            </div>
        </div>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 a-left">
                        <ul>
                            <li class="home">
                                <a href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => '')); ?>" title="Go to Home Page">
                                    Home
                                </a>
                                <span class="breadcrumbs-split">
                                    >
                                </span>
                            </li>
                            <li class="cms_page">
                                <strong>
                                    <?php echo $this->record['title'] ?>
                                </strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-container col1-layout">
        <div class="main container">
            <div class="col-main">
                <div class="std">
                    <div class="content-row" style="padding: 40px 0 60px;">
                        <h2>

                            <?php echo $this->record['title'] ?>
                        </h2>
                        <?php echo $this->record['content'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else if ($app['prs'][1] == 'support') { ?>
    <div class="top-container">
        <div style="background:url(<?php echo RootREL; ?>media/wysiwyg/porto/top-bg.jpg) right no-repeat;background-size: cover;text-align: left;padding: 80px 0;">
            <div class="container">
                <em style="font-family:'Open Sans';font-size:18px;font-weight: 700;color: #1e3636;font-style: normal;line-height: 1;display: block;margin-bottom: 5px;">
                    <?php echo $this->record['title'] ?>
                </em>
                <h2 style="font-family:'Open Sans';font-size:36px;font-weight: 800;color: #1e3636;font-style: normal;line-height: 1;margin: 0;margin-bottom: 30px;">
                    OUR COMPANY
                </h2>
                <button class="btn" style="font-family:'Oswald';font-size:14px;font-weight:400;line-height:1;color:#fff;background-color: #010204;padding: 13px 25px;border-radius: 2px;">
                    CONTACT
                </button>
            </div>
        </div>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 a-left">
                        <ul>
                            <li class="home">
                                <a href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => '')); ?>" title="Go to Home Page">
                                    Home
                                </a>
                                <span class="breadcrumbs-split">
                                    >
                                </span>
                            </li>
                            <li class="cms_page">
                                <strong>
                                    <?php echo $this->record['title'] ?>
                                </strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-container col1-layout">
        <div class="main container">
            <div class="col-main">
                <div class="std">
                    <div class="content-row" style="padding: 40px 0 60px;">
                        <h2>

                            <?php echo $this->record['title'] ?>
                        </h2>
                        <?php echo $this->record['content'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else if ($app['prs'][1] == 'term-of-service') { ?>
    <div class="top-container">
        <div style="background:url(<?php echo RootREL; ?>media/wysiwyg/porto/top-bg.jpg) right no-repeat;background-size: cover;text-align: left;padding: 80px 0;">
            <div class="container">
                <em style="font-family:'Open Sans';font-size:18px;font-weight: 700;color: #1e3636;font-style: normal;line-height: 1;display: block;margin-bottom: 5px;">
                    <?php echo $this->record['title'] ?>
                </em>
                <h2 style="font-family:'Open Sans';font-size:36px;font-weight: 800;color: #1e3636;font-style: normal;line-height: 1;margin: 0;margin-bottom: 30px;">
                    OUR COMPANY
                </h2>
                <button class="btn" style="font-family:'Oswald';font-size:14px;font-weight:400;line-height:1;color:#fff;background-color: #010204;padding: 13px 25px;border-radius: 2px;">
                    CONTACT
                </button>
            </div>
        </div>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 a-left">
                        <ul>
                            <li class="home">
                                <a href="<?php echo vendor_app_util::url(array('area' => '', 'ctl' => '')); ?>" title="Go to Home Page">
                                    Home
                                </a>
                                <span class="breadcrumbs-split">
                                    >
                                </span>
                            </li>
                            <li class="cms_page">
                                <strong>
                                    <?php echo $this->record['title'] ?>
                                </strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-container col1-layout">
        <div class="main container">
            <div class="col-main">
                <div class="std">
                    <div class="content-row" style="padding: 40px 0 60px;">
                        <h2>

                            <?php echo $this->record['title'] ?>
                        </h2>
                        <?php echo $this->record['content'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php include_once 'views/layout/' . $this->layout . 'footer.php'; ?>