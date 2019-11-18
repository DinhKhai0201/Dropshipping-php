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
                        <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Date</th>
                                <th>Ship To</th>
                                <th><span class="nobr">Order Total</span></th>
                                <th><span class="nobr">Order Status</span></th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->orders['data'] as $key => $value) { ?>
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
                                    <td class="a-center">
                                        <span class="nobr"><a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'order', 'act' => 'vieworder/'.$value['token'].'-'.$value['id'])); ?>">View
                                                Order</a>
                                            <span class="separator">|</span> <a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'order', 'act' => 'invoice')); ?>" class="link-reorder">Invoice</a>
                                        </span>
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
