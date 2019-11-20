<?php include_once 'views/admin/layout/' . $this->layout . 'top.php'; ?>
<link rel="stylesheet" href="<?php echo RootREL; ?>media/libs/bootstrap/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo RootREL; ?>media/libs/bootstrap/css/checkbox-x.min.css">
<link rel="stylesheet" href="<?php echo RootREL; ?>media/admin/css/table.css">
<?php
global $app;
if (isset($app['prs']['status'])) {
	if ($app['prs']['status'])
		$checkboxVal = 1;
	else
		$checkboxVal = NULL;
} else 	$checkboxVal = 0;
?>
<script type="text/javascript">
	var norecords = parseInt(<?php echo $this->records['norecords']; ?>);
	var nocurp = parseInt(<?php echo $this->records['nocurp']; ?>);
	var curp = parseInt(<?php echo $this->records['curp']; ?>);
	var nopp = parseInt(<?php echo $this->records['nopp']; ?>);

	// var getDisable  = <?= (isset($app['prs']['status']) && ($app['prs']['status'] === '0')) ? 1 : 0; ?>
</script>

<?php vendor_html_helper::contentheader('Orders <small>management</small>', [['urlp' => ['ctl' => $app['ctl'], 'act' => $app['act']]]]); ?>

<br />
<section class="content-header">
	<div class="row">
		<div class="col-xs-12 col-lg-12">
			<div class="row" id="records-header">
				<div class="col-sm-8 col-xs-6">
					<h2 class="box-title">Order</h2>
				</div>
				<div class="col-sm-4 col-xs-6">
					<button id="delete-records" class="btn btn-danger pull-right ml-1 mb-1" data-toggle="tooltip" data-placement="top" title="Delete many orders">
						<i class="fa fa-remove"></i>
					</button>
				</div>
				<div class="col-sm-8 col-xs-6">
					<ul class="list-inline list_all">
						<li>
							<select id="select_list_orders_status">
								<option value="all" <?php if (isset($app['prs']['status']) && $app['prs']['status'] == 'all') echo 'selected' ?>>All</option>
								<option value="pendding" <?php if (isset($app['prs']['status']) && $app['prs']['status'] == 'pendding') echo 'selected' ?>>Pedding</option>
								<option value="cancel" <?php if (isset($app['prs']['status']) && $app['prs']['status'] == 'cancel') echo 'selected' ?>>Cancel</option>
								<option value="shipping" <?php if (isset($app['prs']['status']) && $app['prs']['status'] == 'shipping') echo 'selected' ?>>Shipping</option>
								<option value="complete" <?php if (isset($app['prs']['status']) && $app['prs']['status'] == 'complete') echo 'selected' ?>>Complete</option>

							</select>
							<button class="btn btn-apply" id='btn_filter_orders_table'>Filter</button>
						</li>
					</ul>
				</div>

				<div class="col-sm-4 col-xs-6">
					<div id="example_filter" class="dataTables_filter text-right">
						<form id="form-orders-search">
							<label>Search:
								<input type="text" class="search" name='search' placeholder="" aria-controls="example" id='search'>
							</label>
							<button type="submit" class="btn btn-info">Search</button>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="box-body">
		<div id="table_wrapper" class="dataTables_wrapper form-inline dt-boostrap">
			<div class="col-sm-12">
				<div class="table-responsive" style='overflow-x:scroll'>
					<table controller="orders" class="table table-bordered table-striped no-margin dataTable" style="text-align:center; width:100%;min-width:800px;">
						<thead>
							<tr role="row">
								<th id="checAllTop" class="checkAll" style="width: 10px;">
									<input type="checkbox" name="" id="cb-all-order" style="display:none;">
									<label for="cb-all-order"></label>
								</th>
								<th style="width: 20px;">Order code</th>
								<th style="width: 250px;">Customer</th>
								<th class="tabletShow" style="width: 200px;">Order Date</th>
								<th class="tabletShow" style="width: 300px;">Status</th>
								<th class="tabletShow" style="width: 100px;">To Address</th>
								<th class="tabletShow" style="width: 100px;">Total price</th>
								<th class="tabletShow" style="width: 100px;">Detail info</th>
								<th style="width: 200px;">Action</th>
							</tr>
						</thead>
						<tbody id="tbody-orders" class="records">
							<?php if (count($this->records['data'])) { ?>
								<?php $i = 1 + ($this->records['curp'] - 1) * $this->records['nopp'];
									foreach ($this->records['data'] as $record) { ?>
									<tr role="row" id="row<?= $record['id']; ?>">

										<td id="<?php echo ("checkbox" . $record['id']); ?>" class="checkboxRecord">
											<input type="checkbox" name="" alt="<?= $record['id']; ?>" id="cb-order-<?= $record['id']; ?>" class='cb-user'>
											<label for="cb-order-<?= $record['id']; ?>"></label>
										</td>

										<td id="<?php echo ("idcode" . $record['id']); ?>">
											<a href="<?php echo (vendor_app_util::url(["ctl" => "orders", "act" => "view/" . $record['id']])) ?>" id="viewOrder<?= $record['id']; ?>">
												<?php echo $record['id']; ?>
											</a>
										</td>
										<td class="tabletShow" id="<?php echo ("users_lastname" . $record['id']); ?>">
											<a href="<?php echo (vendor_app_util::url(["ctl" => "users", "act" => "view/" . $record['users_id']])); ?>" id="viewUser<?= $record['users_id']; ?>">
												<?php echo $record['users_firstname'] . " " . $record['users_lastname']; ?>
											</a>
											<?php echo $record['users_phone'] ;?>
										</td>
										<td class="tabletShow" id="<?php echo ("order-date-" . $record['id']); ?>">
											<?php echo $record['created']; ?>
										</td>

										<td class="tabletShow <?php echo 'status-Order' . $record['order_status'] ?>" id="<?php echo ("status" . $record['id']); ?>">
											<?php if ($record['order_status'] == 0) {
														echo "<p style ='color:orange'>Pendding<p>";
													} else if ($record['order_status'] == 1) {
														echo "<p style ='color:red'>Cancel<p>";
													} else if ($record['order_status'] == 2) {
														echo "<p style ='color:blue'>Shipping<p>";
													} else {
														echo "<p style ='color:green'>Complete<p>";
													}

													?>
										</td>
										<td class="tabletShow" id="<?php echo ("to-address-" . $record['id']); ?>">
											<?php echo $record['to_address']; ?>
										</td>
										<td class="tabletShow" id="<?php echo ("total-price-" . $record['id']); ?>">
											<?php echo $record['total_price']; ?>
										</td>
										<td class="tabletShow" id="<?php echo ("detail-" . $record['id']); ?>">
											<?php echo $record['info']; ?>
										</td>
										<td class="btn-act" class="pull-right">
											<button data-placement="right" title="Delete order" id="del<?php echo $record['id']; ?>" type="button" class="btn btn-danger del-record" alt="<?php echo $record['id']; ?>"><i class="fa fa-remove"></i></button>
										</td>

									</tr>
								<?php } ?>
							<?php } else { ?>
								<tr role="row">
									<td colspan="8">
										<h3 class="text-danger text-center"> No data </h3>
									</td>
								</tr>
							<?php } ?>
						</tbody>
						<tfoot>
						</tfoot>
					</table>
				</div>
			</div>

		</div>
		<div class="row text-right">
			<?php vendor_html_helper::pagination($this->records['norecords'], $this->records['nocurp'], $this->records['curp'], $this->records['nopp']); ?>
		</div>
	</div>
</section>
<br />

</div>
<script src="<?php echo RootREL; ?>media/libs/bootstrap/js/checkbox-x.min.js"></script>
<script src="<?php echo RootREL; ?>media/admin/js/records_table.js"></script>
<?php include_once 'views/admin/layout/' . $this->layout . 'footer.php'; ?>