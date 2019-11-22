<?php
global $mediaFiles;
array_push($mediaFiles['css'], RootREL . "media/css/order/color_progress.css");

?>
<?php include_once 'views/layout/' . $this->layout . 'top.php'; ?>

<div class="main-container col2-left-layout">
    <div class="main container">
        <div class="row">
            <div class="col-left sidebar f-left col-lg-3">
                <div class="block block-account">
                    <?php include_once 'views/customer/' . $this->layout . 'sidebar.php'; ?>

                </div>
            </div>
            <div class="col-main col-lg-9 lg-order-12">

                <div class="my-account">
                    <div class="top-container">
                        <div class="breadcrumbs" style ="margin-bottom: 20px">
                            <div class="container">
                                <div class="row">
                                        <ul>
                                            <li class="home">
                                                <a href="<?php echo (vendor_app_util::url(['area'=>'',"ctl" => ""])) ?>" title="Go to Home Page">Home</a>
                                                <span class="breadcrumbs-split">></span>
                                            </li>
                                           
                                          
                                            <li class="product">
                                                <strong>My Account </strong>
                                            </li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        <?php if($this->recordsorder['norecords']  > 0) {?>
                        <div class="box-account box-recent">
                            <div class="box-head">
                                <h2>Recent Orders</h2>
                                <a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'order')); ?>">View All</a>
                            </div>
                            <table class="data-table" id="my-orders-table" style="word-break:break-word;">
                                <colgroup>
                                    <col width="1">
                                    <col width="1">
                                    <col>
                                    <col width="1">
                                    <col width="1">
                                    <col width="1">
                                    <col width="1">
                                </colgroup>
                                <thead>
                                    <tr class="first last">
                                        <th>Order #</th>
                                        <th>Date</th>
                                        <th>Ship To</th>
                                        <th>Info</th>
                                        <th><span class="nobr">Order Total</span></th>
                                        <th>Status</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($this->recordsorder['data'] as $key => $value) { ?>
                                        <tr class="order_<?= $value['id'] ?>">
                                            <td><?= $value['id'] ?></td>
                                            <td><span class="nobr"><?= $value['created'] ?></span></td>
                                            <td><?= $value['to_address'] ?></td>
                                            <td><?= $value['info'] ?></td>
                                            <td><span class="price"><?php echo  "$".(intval($value['total_price'])) ?></span></td>
                                            <td><em>
                                            <?php if ($value['order_status'] == 0) {
                                                    echo "<p class ='pendding'>Pendding</p>";
                                                } else if ($value['order_status'] == 1) {
                                                    echo "<p class ='cancel'>Cancel</p>";
                                                } else if ($value['order_status'] == 2) {
                                                    echo "<p class ='shipping'>Shipping</p>";
                                                } else {
                                                    echo "<p class ='complete'>Complete</p>";
                                                }
                                                ?>
                                            </em></td>
                                            <td class="a-center">
                                                <span class="nobr"><a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'order', 'act' => 'vieworder/'.$value['token'].'-'.$value['id'])); ?>">View
                                                        Order</a>
                                                    <span class="separator">|</span> <a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'invoice', 'act' => 'view/' . $value['token'] . '-' . $value['id'])); ?>" class="link-reorder">Invoice</a>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php } ?>


                                </tbody>
                            </table>
                        </div>
                        <?php } ?>
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
                                            <div class="avatar-user" style="width:30%;float:left;margin-right:6px;border:2px solid gray;">
                                                <img src="<?php echo RootREL . "media/upload/users/" . (!empty($_SESSION['user']['avata']) ? $_SESSION['user']['avata'] : 'no_image.png'); ?>" width="100%">
                                            </div>
                                            <div class="info-user clearfix" >
                                                <p>
                                                    <?php if (isset($_SESSION['user'])) {
                                                        echo "Name: ".$_SESSION['user']['lastname'] . " " . $_SESSION['user']['firstname'] . "<br/>" . "Email: " . $_SESSION['user']['email'] . "<br/>" . "Phone: " . $_SESSION['user']['phone'] . "<br/>";
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
                                            <a href="">Edit</a>
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
                                                <?php if ($_SESSION['user']['address'] == '') {
                                                    echo "You have not set a default shipping address.<br />";
                                                } else { ?>
                                                    <?php echo $_SESSION['user']['address'] ?><br />
                                                <?php } ?>

                                            </address>
                                        </div>
                                        <div class="col-2">
                                            <h4>Default Shipping Address</h4>
                                            <address>
                                                <?php if ($_SESSION['user']['address'] == '') {
                                                    echo "You have not set a default shipping address.<br />";
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

        </div>
    </div>
</div>
<?php include_once 'views/layout/' . $this->layout . 'footer.php'; ?>