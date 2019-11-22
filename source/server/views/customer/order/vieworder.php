<?php
global $mediaFiles;
array_push($mediaFiles['css'], RootREL . "media/css/order/progress_order.css");
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
                                            <li class="">
                                                <a href="<?php echo (vendor_app_util::url(['area'=>'customer',"ctl" => "order"])) ?>" title="My account Dropshipping">My Order</a>
                                                <span class="breadcrumbs-split">></span>
                                            </li>
                                            <li class="product">
                                                <strong>My Detail Order </strong>
                                            </li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-title">
                        <h1>My Orders</h1>
                    </div>
                    <div class="container-fluid">
                    <br /><br />
                    <ul class="list-unstyled multi-steps">
                        <li >Start</li>
                        <li class =" <?php  foreach ($this->order as $key => $value) {if ($value['order_status'] == 0) { echo 'is-active';}}?>">Pedding</li>
                        <li class =" <?php  foreach ($this->order as $key => $value) {if ($value['order_status'] == 2) { echo 'is-active';}}?>"><i class="fas fa-truck"></i><br>Shipping</li>
                        <li class =" <?php  foreach ($this->order as $key => $value) {if ($value['order_status'] == 3) { echo 'is-active';}}?>"></i>Complete</li>
                    </ul>
                    </div>

                    <div class="pager">
                        <p class="amount">
                            Order
                        </p>
                    </div>
                    <table class="data-table" id="my-orders-table">
                        <col width="1" />
                        <col width="1" />
                        <col />
                        <col width="1" />
                        <col width="1" />
                        <col width="1" />
                        <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Date</th>
                                <th>Ship To</th>
                                <th>Info</th>

                                <th><span class="nobr">Total Price</span></th>
                                <th><span class="nobr">Order Status</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->order as $key => $value) { ?>
                                <tr>
                                    <td><?= $value['id'] ?></td>
                                    <td><span class="nobr"><?= $value['created'] ?></span></td>
                                    <td><?= $value['to_address'] ?></td>
                                    <td><?= $value['info'] ?></td>

                                    <td><span class="price"><?php echo '$' . (intval($value['total_price'])) ?></span></td>
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
                                   
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                     <div class="pager">
                        <p class="amount">
                            Detail Order
                        </p>
                    </div>
                    <table class="data-table" id="my-orders-table">
                        <col width="1" />
                        <col width="1" />
                        <col />
                        <col width="1" />
                        <col width="1" />
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Supplier</th>
                                <th>Quantity</th>
                                 <th>Color</th>
                                  <th>Size</th>
                                <th><span class="nobr">Sub Total</span></th>
                                <th><span class="nobr">Status</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->order_item as $key => $value) { ?>
                                <tr>
                                    <td>
                                    <a href ="<?php echo (vendor_app_util::url(['area'=>'',"ctl" => "product", "act" => "view/" . $value['products_slug'] . "-" . $value['product_id']])) ?>" target="_blank">
                                        <?= $value['products_name'] ?>
                                    </a>
                                    </td>
                                    <td><span class="nobr">
                                        <?= $value['users_firstname'] ?>
                                    </span></td>
                                    <td><?= $value['quantity'] ?></td>
                                     <td><?= $value['color'] ?></td>
                                      <td><?= $value['size'] ?></td>
                                    <td><span class="price">
                                        <?php if (isset($value['coupons_type'])) {?>
                                                    <p class="old-price">
                                                        <span class="price-label">Regular Price:</span>
                                                        <span class="price" id="old-price-<?= $value['id'] ?>">
                                                            <?php echo "$".$value['price']; ?> </span>
                                                    </p>
                                                    <p class="special-price">
                                                    <span class="price-label">Special Price</span>
                                                    <?php if (intval($value['coupons_type']) == 0) {?>
                                                         <span class="price" id="value-price-<?= $value['id'] ?>">
                                                            $<?php echo (intval($value['price']) - (intval($value['price'])*(intval($value['coupons_percent_value'])))/100);?>
                                                        </span>
                                                    <?php } else if (intval($value['coupons_type']) == 1) {?>
                                                         <span class="price" id="value-price-<?= $value['id'] ?>">
                                                        $<?php echo (intval($value['price']) - (intval($value['coupons_fix_value'])))?></span>
                                                <?php }?>
                                                </p>
                                                 <?php } else {?>
                                                  <?php echo "$" . $value['price']; ?>
                                                 <?php }?>
                                    </span></td>
                                    <td><em>
                                     <?php if ($value['status'] == 0) {
                                            echo "<p class ='not-process'>Not process</p>";
                                        } else {
                                            echo "<p class ='processed'>Processed</p>";
                                        }
                                        ?>
                                    </td>
                                   
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="buttons-set">
                    <p class="back-link"><a href="javascript:history.back()"><small>&laquo;
                            </small>Back</a></p>
                    
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<?php include_once 'views/layout/' . $this->layout . 'footer.php';
