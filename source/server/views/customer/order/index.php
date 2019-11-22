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
                                            <li class="">
                                                <a href="<?php echo (vendor_app_util::url(['area'=>'customer',"ctl" => "account"])) ?>" title="My account Dropshipping">My account</a>
                                                <span class="breadcrumbs-split">></span>
                                            </li>
                                            <li class="product">
                                                <strong>My Order </strong>
                                            </li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-title">
                        <h1>My Orders</h1>
                    </div>
                     <?php if($this->orders['norecords']  > 0) {?>
                        <div class="pager">
                        <p class="amount">
                            <strong><?= $this->orders['norecords'] ?> Item(s)</strong>
                        </p>
                    </div>
                    <table class="data-table" id="my-orders-table">
                        <col width="1" />
                        <col width="1" />
                        <col />
                        <col width="1" />
                        <col width="1" />
                        <col width="1" />

                        <col width="1" />
                        <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Date</th>
                                <th>Ship To</th>
                                <th>Info</th>
                                <th><span class="nobr">Total</span></th>
                                <th><span class="nobr">Status</span></th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->orders['data'] as $key => $value) { ?>
                                <tr>
                                    <td><?= $value['id'] ?></td>
                                    <td><span class="nobr"><?= $value['created'] ?></span></td>
                                    <td><?= $value['to_address'] ?></td>
                                    <td><?= $value['info'] ?></td>

                                    <td><span class="price"><?= (intval($value['total_price'])) ?></span></td>
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
                                    </td>
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
                     <?php } else {?>
                        <p> You not no order </p>
                     <?php }?>
                    
                </div>
                <div class="buttons-set">
                    <p class="back-link"><a href="javascript:history.back()"><small>&laquo;
                            </small>Back</a></p>
                    <?php vendor_html_helper::paginationuser($this->orders['norecords'], $this->orders['nocurp'], $this->orders['curp'], $this->orders['nopp']); ?>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- </div> -->
<!-- <p>a</p> -->
<?php include_once 'views/layout/' . $this->layout . 'footer.php';?>
