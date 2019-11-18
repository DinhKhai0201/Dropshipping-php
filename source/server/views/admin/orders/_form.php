<section class="content" id="admin-import-page">
	<div class="row">
		<div class="box">
			<div class="box-body">
				<div class="col-sm-8 col-xs-6">
					<h2 class="box-title">Order code: <?= $this->record['id']; ?></h2>
				</div>
				<div id="table_wrapper" class="dataTables_wrapper form-inline dt-boostrap">
					<div class="col-sm-12">
						<div class="table-responsive" style='overflow-x:scroll'>
							<table controller="orders" class="table table-bordered table-striped no-margin dataTable" style="text-align:center; width:100%;min-width:800px;">
								<thead>
									<tr role="row">

										<th style="width: 20px;">Order code</th>
										<th style="width: 250px;">Customer</th>
										<th class="tabletShow" style="width: 200px;">Order Date</th>
										<th class="tabletShow" style="width: 100px;">Status</th>
										<th class="tabletShow" style="width: 100px;">To Address</th>
										<th class="tabletShow" style="width: 100px;">Total price</th>
										<th class="tabletShow" style="width: 100px;">Detail info</th>
									</tr>
								</thead>
								<tbody id="tbody-orders" class="records">
									<tr role="row" id="row<?= $this->record['id']; ?>">
										<td id="<?php echo ("idcode" .  $this->record['id']); ?>">
											<a href="<?php echo (vendor_app_util::url(["ctl" => "orders", "act" => "view/" .  $this->record['id']])) ?>" id="viewOrder<?= $this->record['id']; ?>">
												<?php echo  $this->record['id']; ?>
											</a>
										</td>
										<td class="tabletShow" id="<?php echo ("users_name" .  $this->record['id']); ?>">
											<a href="<?php echo (vendor_app_util::url(["ctl" => "users", "act" => "view/" . $record['users_id']])); ?>" id="viewUser<?= $record['users_id']; ?>">
												<?php echo $this->record['users_firstname'] . " " . $this->record['users_lastname']; ?>
											</a>
										</td>
										<td class="tabletShow" id="<?php echo ("order-date-" .  $this->record['id']); ?>">
											<?php echo $this->record['created']; ?>
										</td>

										<td class="tabletShow <?php echo 'status-Order' . $this->record['order_status'] ?>" id="<?php echo ("status" .  $this->record['id']); ?>">

											<?php if ($this->record['order_status'] == 0) { ?>
												<button data-placement="right" title="status orders" id="status<?php echo $this->record['id']; ?>" type="button" class="btn btn-warning">Pendding</button>
											<?php } else if ($this->record['order_status'] == 1) { ?>
												<button data-placement="right" title="status orders" id="status<?php echo $this->record['id']; ?>" type="button" class="btn btn-danger">Cancel</button>
											<?php } else if ($this->record['order_status'] == 2) { ?>
												<button data-placement="right" title="status orders" id="status<?php echo $this->record['id']; ?>" type="button" class="btn btn-info">Shipping</button>
											<?php } else { ?>
												<button data-placement="right" title="status orders" id="status<?php echo $this->record['id']; ?>" type="button" class="btn btn-success">Complete</button>
											<?php } ?>
										</td>
										<td class="tabletShow" id="<?php echo ("to-address-" .  $this->record['id']); ?>">
											<?php echo $this->record['to_address']; ?>
										</td>
										<td class="tabletShow" id="<?php echo ("total-price-" .  $this->record['id']); ?>">
											<?php echo $this->record['total_price']; ?>
										</td>
										<td class="tabletShow" id="<?php echo ("detail-" .  $this->record['id']); ?>">
											<?php echo $this->record['info']; ?>
										</td>


									</tr>
								</tbody>

							</table>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>
<section class="content" id="admin-import-page">
	<div class="row">
		<div class="box">
			<div class="box-body">
				<div class="col-sm-8 col-xs-6">
					<h2 class="box-title">Order detail</h2>
				</div>
				<div id="table_wrapper" class="dataTables_wrapper form-inline dt-boostrap">
					<div class="col-sm-12">
						<div class="table-responsive" style='overflow-x:scroll'>
							<table controller="products" class="table table-bordered table-striped no-margin dataTable" style="text-align:center; width:100%;min-width:800px;">
								<thead>
									<tr role="row">
										<th id="checAllTop" class="checkAll" style="width: 10px;">
											<input type="checkbox" name="" id="cb-all-product" style="display:none;">
											<label for="cb-all-product"></label>
										</th>
										<th style="width: 20px;">ID</th>
										<th style="width: 250px;">Product</th>
										<th class="tabletShow" style="width: 200px;">Supplier</th>
										<th class="tabletShow" style="width: 300px;">Quanlity</th>
										<th class="tabletShow" style="width: 100px;">Color</th>
										<th class="tabletShow" style="width: 100px;">Size</th>
										<th class="tabletShow" style="width: 100px;">Price</th>
										<th style="width: 200px;">Action</th>
									</tr>
								</thead>
								<tbody id="tbody-products" class="records">
									<?php if (count($this->records['data'])) { ?>
										<?php $i = 1 + ($this->records['curp'] - 1) * $this->records['nopp'];
											foreach ($this->records['data'] as $record) { ?>
											<tr role="row" id="row<?= $record['id']; ?>">

												<td id="<?php echo ("checkbox" . $record['id']); ?>" class="checkboxRecord">
													<input type="checkbox" name="" alt="<?= $record['id']; ?>" id="cb-product-<?= $record['id']; ?>" class='cb-user'>
													<label for="cb-product-<?= $record['id']; ?>"></label>
												</td>

												<td id="<?php echo ("fullname" . $record['id']); ?>">
													<?php echo $i++; ?>
												</td>
												<td id="<?php echo ("id" . $record['id']); ?>">
													<a href="<?php echo (vendor_app_util::url(["ctl" => "products", "act" => "view/" . $record['products_id']])); ?>" id="viewProduct<?= $record['products_id']; ?>">
														<?= $record['products_name']; ?>
													</a>
												</td>
												<td class="tabletShow" id="<?php echo ("supplier" . $record['users_id']); ?>">
													<a href="<?php echo (vendor_app_util::url(["ctl" => "users", "act" => "view/" . $record['users_id']])); ?>" id="viewProduct<?= $record['users_id']; ?>">
														<?php echo  $record['users_firstname'] . " " . $record['users_lastname']; ?>
													</a>
												</td>
												<td class="tabletShow" id="<?php echo ("quantity" . $record['id']); ?>">
													<?php echo $record['quantity']; ?>
												</td>
												<td class="tabletShow" id="<?php echo ("color" . $record['id']); ?>">
													<?php echo $record['color']; ?>
												</td>
												<td class="tabletShow" id="<?php echo ("size" . $record['id']); ?>">
													<?php echo $record['size']; ?>
												</td>
												<td class="tabletShow" id="<?php echo ("sub_price-" . $record['id']); ?>">
													<?php echo intval($record['price']) * intval($record['quantity']); ?>
												</td>

												<td class="btn-act" class="pull-right">
													<button data-placement="right" title="Process orders" id="process<?php echo $record['id']; ?>" status="<?=$record['status']?>" type="button" class="btn <?php if ($record['status'] == 0) {
																																																					echo "btn-danger";
																																																				} else {
																																																					echo "btn-success";
																																																				} ?> process-record" alt="<?php echo $record['id']; ?>"><?php if ($record['status'] == 0) {
																																																													echo "Not process";
																																																												} else {
																																																													echo "Processed";
																																																												} ?></button>
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
			</div>
			<div class="row text-right">
				<?php vendor_html_helper::pagination($this->records['norecords'], $this->records['nocurp'], $this->records['curp'], $this->records['nopp']); ?>
			</div>
		</div>
	</div>
</section>
</div>
<script type="text/javascript" src="<?php echo RootREL; ?>media/admin/js/slugify.js"></script>
<script type="text/javascript" src="<?php echo RootREL; ?>media/libs/ckeditor_v4_full/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo RootREL; ?>media/admin/js/okzoom.js"></script>
<script src="<?php echo RootREL; ?>media/admin/js/records_table.js"></script>
<script>
	// var modal = document.querySelector(".modaly");
	// var trigger = document.querySelector(".trigger");
	// var closeButton = document.querySelector(".close-button");

	// function toggleModal() {
	// 	modal.classList.toggle("show-modaly");
	// }

	// function windowOnClick(event) {
	// 	if (event.target === modal) {
	// 		toggleModal();
	// 	}
	// }

	// trigger.addEventListener("click", toggleModal);
	// closeButton.addEventListener("click", toggleModal);
	// window.addEventListener("click", windowOnClick);
	$("#name").keyup(function() {
		$("#slug").val(slugify($(this).val()));
	});

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#output').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#image").change(function() {
		readURL(this);
	});
	$(function() {
		$("input[type = 'submit']").click(function() {
			var $fileUpload = $("input[type='file']");
			if (parseInt($fileUpload.get(0).files.length) > 5) {
				alert("You are only allowed to upload a maximum of 5 files");
			}
		});
	});
	$(document).ready(function() {
		$('.flexslider').flexslider({
			animation: "slide",
			animationLoop: true,
			prevText: "Previous",
			nextText: "Next",
		});

		function get_filter(class_name) {
			let filter = [];
			$('.' + class_name + ':checked').each(function() {
				filter.push($(this).val());
			});
			return filter;
		}
		$('ul').on("click", "li", function() {
			let color = get_filter('color');
			$('.color:checked').parent().css({
				"border": "2px solid red"
			});
			$('.color:not(:checked)').parent().css({
				"border": "1px solid black"
			});
			$('#colors-choose').val(color.join());
		});

	});
</script>