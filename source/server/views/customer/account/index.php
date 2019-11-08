<?php include_once 'views/layout/' . $this->layout . 'top.php'; ?>

<div class="main-container col2-left-layout">
    <div class="main container">
        <div class="row">
            <div class="col-main col-lg-9 lg-order-12">

                <div class="my-account">
                    <div class="dashboard">
                        <div class="page-title">
                            <h1>My Dashboard</h1>
                        </div>
                        <div class="welcome-msg">
                            <p class="hello"><strong>Hello, <?php if (isset($_SESSION['user'])) {
                                                                echo $_SESSION['user']['lastname'] . ' ' . $_SESSION['user']['lastname'];
                                                            } ?>!</strong></p>
                            <p>From your My Account Dashboard you have the ability to view a snapshot of
                                your recent account activity and update your account information. Select a
                                link below to view or edit information.</p>
                        </div>
                        <div class="box-account box-info">
                            <div class="box-head">
                                <h2>Account Information</h2>
                            </div>
                            <div class="col2-set">
                                <div class="col-1">
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>Contact Information</h3>
                                            <a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'account', 'act' => 'edit')); ?>">Edit</a>
                                        </div>
                                        <div class="box-content clearfix">
                                            <div class="avatar-user" style="width:30%;float:left;margin-right:6px;">
                                                <img src="<?php echo RootREL . "media/upload/users/" . (!empty($_SESSION['user']['avata']) ? $_SESSION['user']['avata'] : 'no_image.png'); ?>" width="100%">
                                            </div>
                                            <div class="info-user clearfix" style="width:70%">
                                                <p>
                                                    <?php if (isset($_SESSION['user'])) {
                                                        echo $_SESSION['user']['lastname'] . " " . $_SESSION['user']['firstname'] . "<br/>" . $_SESSION['user']['email'] . "<br/>" . $_SESSION['user']['phone'] . "<br/>";
                                                    } ?>

                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>Newsletters</h3>
                                            <a href="https://www.portotheme.com/magento/porto/index.php/demo4_en/newsletter/manage/">Edit</a>
                                        </div>
                                        <div class="box-content">
                                            <p>
                                                You are currently subscribed to 'General Subscription'. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2-set">
                                <div class="box">
                                    <div class="box-title">
                                        <h3>Address Book</h3>
                                        <a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'acount', 'ctl' => 'account', 'act' => 'address')); ?>">Manage
                                            Addresses</a>
                                    </div>
                                    <div class="box-content">
                                        <div class="col-1">
                                            <h4>Default Billing Address</h4>
                                            <address>
                                                <?php if ($_SESSION['user']['address'] === '') {
                                                    echo "Yddddou have not set a default shipping address.<br />";
                                                } else { ?>
                                                    <?php echo $_SESSION['user']['address'] ?><br />
                                                <?php } ?>

                                            </address>
                                        </div>
                                        <div class="col-2">
                                            <h4>Default Shipping Address</h4>
                                            <address>
                                                <?php if ($_SESSION['user']['address'] === '') {
                                                    echo "Yddddou have not set a default shipping address.<br />";
                                                } else { ?>
                                                    <?php echo $_SESSION['user']['address'] ?><br />
                                                <?php } ?>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-left sidebar f-left col-lg-3">
                <div class="block block-account">
                    <?php include_once 'views/customer/' . $this->layout . 'sidebar.php'; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'views/layout/' . $this->layout . 'footer.php'; ?>