<?php
global $mediaFiles;
array_push($mediaFiles['css'], RootREL . "media/css/order/progress_order.css");



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
                        <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Date</th>
                                <th>Ship To</th>
                                <th><span class="nobr">Order Total</span></th>
                                <th><span class="nobr">Order Status</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->order as $key => $value) { ?>
                                <tr>
                                    <td><?= $value['id'] ?></td>
                                    <td><span class="nobr"><?= $value['created'] ?></span></td>
                                    <td><?= $value['to_address'] ?></td>
                                    <td><span class="price"><?= (intval($value['total_price'])) ?></span></td>
                                    <td><em>
                                     <?php if ($value['order_status'] == 0) {
                                            echo "Pendding";
                                        } else if ($value['order_status'] == 1) {
                                            echo "Cancel";
                                        } else if ($value['order_status'] == 2) {
                                            echo "Shipping";
                                        } else {
                                            echo "Complete";
                                        }
                                        ?>
                                    </td>
                                   
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
                                <th><span class="nobr">Order Total</span></th>
                                <th><span class="nobr">Order Status</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->order_item as $key => $value) { ?>
                                <tr>
                                    <td><?= $value['product_id'] ?></td>
                                    <td><span class="nobr"><?= $value['supplier_id'] ?></span></td>
                                    <td><?= $value['quantity'] ?></td>
                                     <td><?= $value['color'] ?></td>
                                      <td><?= $value['size'] ?></td>
                                    <td><span class="price"><?= (intval($value['price'])) ?></span></td>
                                    <td><em>
                                     <?php if ($value['status'] == 0) {
                                            echo "Not process";
                                        } else {
                                            echo "Processed";
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
