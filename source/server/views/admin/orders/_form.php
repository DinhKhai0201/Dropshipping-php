<section class="content" id="admin-import-page">
	<div class="row">
		<div class="box">
			<div class="box-body">
				<div class="col-sm-8 col-xs-6">
					<h2 class="box-title">Order code: <?php foreach ($this->record as $key => $record) {
															echo $record['id'];
														} ?></h2>
					<a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'invoice', 'act' => 'view/' . $record['token'] . '-' . $record['id'])); ?>">Print invoice</a>
					<div class="modaly">
						<div class="modal-contenty">
							<span class="close-button">&times;</span>
							<h3 class="modaly-title">Choose Process!</h3>
							<hr>
							<div class="row modaly-body">
								<button data-placement="right" status="0" key=" <?php foreach ($this->record as $key => $record) {
																					echo $record['id'];
																				} ?>" title="status orders" type="button" class="modaly-bt btn btn-warning">Pendding</button>
								<button data-placement="right" status="1" key=" <?php foreach ($this->record as $key => $record) {
																					echo $record['id'];
																				} ?>" title="status orders" type="button" class="modaly-bt btn btn-danger">Cancel</button><br>
								<button data-placement="right" status="2" key=" <?php foreach ($this->record as $key => $record) {
																					echo $record['id'];
																				} ?>" title="status orders" type="button" class="modaly-bt btn btn-info">Shipping</button>
								<button data-placement="right" status="3" key=" <?php foreach ($this->record as $key => $record) {
																					echo $record['id'];
																				} ?>" title="status orders" type="button" class="modaly-bt btn btn-success">Complete</button>
							</div>

						</div>
					</div>
					<style>
						.modaly-title {
							text-align: center;
						}

						.modaly-body {}

						.modaly-bt {
							margin: 2px;
						}

						.modaly {
							position: fixed;
							left: 0;
							top: 0;
							width: 100%;
							height: 100%;
							background-color: rgba(0, 0, 0, 0.5);
							opacity: 0;
							z-index: 9999;
							visibility: hidden;
							transform: scale(1.1);
							transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
						}

						.modal-contenty {
							position: absolute;
							top: 50%;
							left: 50%;
							transform: translate(-50%, -50%);
							background-color: white;
							padding: 1rem 1.5rem;
							/* width: 24rem; */
							border-radius: 0.5rem;
						}

						.close-button {
							float: right;
							width: 1.5rem;
							line-height: 1.5rem;
							text-align: center;
							cursor: pointer;
							border-radius: 0.25rem;
							background-color: lightgray;
						}

						.close-button:hover {
							background-color: darkgray;
						}

						.show-modaly {
							opacity: 1;
							visibility: visible;
							transform: scale(1.0);
							transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
						}
					</style>
				</div>
				<div id="table_wrapper" class="dataTables_wrapper form-inline dt-boostrap">
					<div class="col-sm-12">
						<div class="table-responsive" style='overflow-x:scroll'>
							<table controller="orders" class="table table-bordered table-striped no-margin dataTable" style="text-align:center; width:100%;min-width:800px;">
								<thead>
									<tr role="row">

										<th style="width: 20px;">Order code</th>
										<th style="width: 100px;">Customer</th>
										<th class="tabletShow" style="width: 100px;">Order Date</th>
										<th class="tabletShow" style="width: 100px;">Status</th>
										<th class="tabletShow" style="width: 200px;">To Address</th>
										<th class="tabletShow" style="width: 100px;">Total price</th>
										<th class="tabletShow" style="width: 200px;">Detail info</th>
									</tr>
								</thead>
								<tbody id="tbody-orders" class="records-order">
									<?php foreach ($this->record as $key => $record) { ?>
										<tr role="row" id="row<?= $record['id']; ?>">
											<td id="<?php echo ("idcode" .  $record['id']); ?>">
												<a href="<?php echo (vendor_app_util::url(["ctl" => "orders", "act" => "view/" .  $record['id']])) ?>" id="viewOrder<?= $record['id']; ?>">
													<?php echo  $record['id']; ?>
												</a>
											</td>
											<td class="tabletShow" id="<?php echo ("users_name" .  $record['id']); ?>">
												<a href="<?php echo (vendor_app_util::url(["ctl" => "users", "act" => "view/" . $record['users_id']])); ?>" id="viewUser<?= $record['users_id']; ?>">
													<?php echo $record['users_firstname'] . " " . $record['users_lastname']; ?>

												</a>
												<?php echo '<i>' . $record['users_phone'] . '</i>'; ?>
											</td>
											<td class="tabletShow" id="<?php echo ("order-date-" .  $record['id']); ?>">
												<?php echo $record['created']; ?>
											</td>

											<td class="tabletShow <?php echo 'status-Order' . $record['order_status'] ?>" id="<?php echo ("status" .  $record['id']); ?>">

												<?php if ($record['order_status'] == 0) { ?>
													<button data-placement="right" title="status orders" status="<?= $record['order_status'] ?>" id="status<?php echo $record['id']; ?>" type="button" class="trigger btn btn-warning">Pendding</button>
												<?php } else if ($record['order_status'] == 1) { ?>
													<button data-placement="right" title="status orders" status="<?= $record['order_status'] ?>" id="status<?php echo $record['id']; ?>" type="button" class="trigger btn btn-danger">Cancel</button>
												<?php } else if ($record['order_status'] == 2) { ?>
													<button data-placement="right" title="status orders" status="<?= $record['order_status'] ?>" id="status<?php echo $record['id']; ?>" type="button" class="trigger btn btn-info">Shipping</button>
												<?php } else { ?>
													<button data-placement="right" title="status orders" status="<?= $record['order_status'] ?>" id="status<?php echo $record['id']; ?>" type="button" class="trigger btn btn-success">Complete</button>
												<?php } ?>
											</td>
											<td class="tabletShow" id="<?php echo ("to-address-" .  $record['id']); ?>">
												<?php echo $record['to_address']; ?>
											</td>
											<td class="tabletShow" id="<?php echo ("total-price-" .  $record['id']); ?>">
												<?php echo '$'.$record['total_price']; ?>
											</td>
											<td class="tabletShow" id="<?php echo ("detail-" .  $record['id']); ?>">
												<?php echo $record['info']; ?>
											</td>


										</tr>
									<?php } ?>

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
												<td id="<?php echo ("fullname" . $record['id']); ?>">
													<?php echo $i++; ?>
												</td>
												<td id="<?php echo ("id" . $record['id']); ?>">
													<a href="<?php echo (vendor_app_util::url(["ctl" => "products", "act" => "view/" . $record['products_id']])); ?>" id="viewProduct<?= $record['products_id']; ?>">
														<?= $record['products_id']; ?> <br>
													</a>
													<?= $record['products_name']; ?>
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
													<?php echo '$'.intval($record['price']) * intval($record['quantity']); ?>
												</td>

												<td class="btn-act" class="pull-right">
													<button data-placement="right" title="Process orders" id="process<?php echo $record['id']; ?>" status="<?= $record['status'] ?>" type="button" class="btn <?php if ($record['status'] == 0) {
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