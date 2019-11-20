<section class="content" id="admin-import-page">
	<div class="row">
		<div class="box">
			<div class="box-body">
				<!-- <div class="col-md-6"> -->
				<div id="legend" style="margin: 20px auto;display: table;font-weight: 700;">
					<legend class=""><?php echo ucwords($app['act'] . ' ' . $app['ctl']); ?></legend>
				</div>
				
				<?php if ($app['act'] != 'view') { ?>
					<form id="form-addproduct" action="<?php echo vendor_app_util::url(["ctl" => "products", "act" => $app['act'] == 'edit' ? $app['act'] . "/" . $this->record['id'] : $app['act']]); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
					<?php } ?>
					<?php if (isset(($this->errors['database']))) { ?>
						<div class="alert alert-danger  alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
							<h4>Oh snap! You got an error!</h4>
							<p><?= $this->errors['database']; ?></p>
						</div>
					<?php } ?>
					<div class="form-group row">
						<label class="control-label col-md-3" for="name">Name<span style="color:red;">*</span></label>
						<div class="controls col-md-7">
							<input <?php if ($app['act'] == 'view') echo "disabled"; ?> type="text" id="name" name="product[name]" placeholder="" class="form-control" value="<?php if (isset($this->record['name'])) echo $this->record['name']; ?>">
							<?php if (isset($this->errors['name'])) { ?>
								<p class="text-danger"><?= $this->errors['name']; ?></p>
							<?php } ?>
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-md-3" for="sku">SKU<span style="color:red;">*</span></label>
						<div class="controls col-md-7">
							<input <?php if ($app['act'] == 'view') echo "disabled"; ?> type="text" id="sku" name="product[sku]" placeholder="" class="form-control" value="<?php if (isset($this->record['sku'])) echo $this->record['sku']; ?>">
							<?php if (isset($this->errors['sku'])) { ?>
								<p class="text-danger"><?= $this->errors['sku']; ?></p>
							<?php } ?>
						</div>
					</div>

					<div class="form-group row">
						<label class="control-label col-md-3" for="slug">Slug<span style="color:red;">*</span></label>
						<div class="controls col-md-7">
							<input <?php if ($app['act'] == 'view') echo "disabled"; ?> type="text" id="slug" name="product[slug]" placeholder="" class="form-control" value="<?php if (isset($this->record['slug'])) echo $this->record['slug']; ?>">
							<?php if (isset($this->errors['slug'])) { ?>
								<p class="text-danger"><?= $this->errors['slug']; ?></p>
							<?php } ?>
						</div>
					</div>

					<?php if ($app['act'] == 'view') { ?>
						<div class="form-group row">
							<label class="control-label col-md-3" for="categories_name">Category name</label>
							<div class="controls col-md-7">
								<input required <?php if ($app['act'] == 'view') echo "disabled"; ?> type="text" id="brands_name" name="product[category_type_id]" placeholder="" class="form-control" value="<?php
																																																					$record['category_type_id'] = explode(",", $this->record['category_type_id']);
																																																					foreach ($record['category_type_id']  as $categoryname) {
																																																						// echo ($categoryname)." /";
																																																						foreach ($this->recordsCategories as $category) {
																																																							if ($categoryname == $category['id']) {
																																																								echo ($category['categoryName']) . " / ";
																																																							}
																																																						}
																																																					}
																																																					?>
							">
							</div>
						</div>
					<?php } else { ?>
						<div class="form-group row">
							<label class="control-label col-md-3" for="categories_name">Category level 1</label>
							<div class="controls col-md-7">
								<select name="category1" id="category1" class="form-control select2 w-p100">
									<option value="0">None</option>
									<?php foreach ($this->level1 as $category1) { ?>
										<option value="<?= $category1['id'] ?>" <?= (isset($this->record['category_type_id']) && $this->record['category_type_id'] == $category1['id']) ? 'selected="selected"' : ''; ?>><?= $category1['categoryName'] ?></option>
									<?php }  ?>
								</select>
							</div>
						</div>
						<div id='appendCat1'>
						</div>
						<div id='appendCat2'>
						</div>
						<div id='appendCat3'>
						</div>
					<?php } ?>

					<?php if ($app['act'] == 'view') { ?>
						<div class="form-group row">
							<label class="control-label col-md-3" for="brands_name">Brands name</label>
							<div class="controls col-md-7">
								<input required <?php if ($app['act'] == 'view') echo "disabled"; ?> type="text" id="brands_name" name="product[brand_id]" placeholder="" class="form-control" value="<?php foreach ($this->recordsBrands as $brand) {
																																																				echo (isset($this->record['brand_id']) && $this->record['brand_id'] == $brand['id']) ? $brand['name'] : '';
																																																			} ?>">
							</div>
						</div>
					<?php } else { ?>
						<div class="form-group row">
							<label class="control-label col-md-3" for="brands_name">Brands name</label>
							<div class="controls col-md-7">
								<select name="product[brand_id]" id="" class="form-control select2 w-p100">
									<?php foreach ($this->recordsBrands as $brand) { ?>
										<option value="<?= $brand['id'] ?>" <?= (isset($this->record['brand_id']) && $this->record['brand_id'] == $brand['id']) ? 'selected="selected"' : ''; ?>><?= $brand['name'] ?></option>
									<?php }  ?>
								</select>
							</div>
						</div>
					<?php } ?>

					<div class="form-group row">
						<label class="control-label col-md-3" for="status">Status<span style="color:red;">*</span></label>
						<div class="controls col-md-7">
							<?php if ($app['act'] != 'view') { ?>
								<select name="product[status]" id="input-status" class="form-control">
									<?php foreach (product_model::$status as $k => $v) { ?>
										<option value="<?= $k; ?>" <?= (isset($this->record['status']) && $this->record['status'] == $k) ? 'selected="selected"' : ''; ?>><?= $v; ?></option>
									<?php } ?>
								</select>
							<?php } else { ?>
								<input disabled type="text" id="status" name="product[status]" class="form-control" value="<?php if (isset($this->record['status'])) echo product_model::$status[$this->record['status']]; ?>">
							<?php } ?>
							<?php if (isset($this->errors['status'])) { ?>
								<p class="text-danger"><?= $this->errors['status']; ?></p>
							<?php } ?>
						</div>
					</div>

					<div class="form-group row">
						<label class="control-label col-md-3" for="price">Price<span style="color:red;">*</span></label>
						<div class="controls col-md-7">
							<input <?php if ($app['act'] == 'view') echo "disabled"; ?> type="number" id="price" name="product[price]" placeholder="" class="form-control" value="<?php if (isset($this->record['price'])) {
																																														echo $this->record['price'];
																																													} else {
																																														echo "0";
																																													}  ?>">
							<?php if (isset($this->errors['price'])) { ?>
								<p class="text-danger"><?= $this->errors['price']; ?></p>
							<?php } ?>
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-md-3" for="quanlity">Quantity<span style="color:red;">*</span></label>
						<div class="controls col-md-7">
							<input <?php if ($app['act'] == 'view') echo "disabled"; ?> type="number" id="type" name="product[quantity]" min="0" max="100" placeholder="" class="form-control" value="<?php if (isset($this->record['quanlity'])) {
																																																			echo $this->record['quanlity'];
																																																		} else {
																																																			echo "0";
																																																		}  ?>">
							<?php if (isset($this->errors['quantity'])) { ?>
								<p class="text-danger"><?= $this->errors['quanlity']; ?></p>
							<?php } ?>
						</div>
					</div>
					<?php if ($app['act'] != 'view') { ?>
						<div class="form-group row">
							<label class="control-label col-md-3" for="image">Image<span style="color:red;">*</span></label>
							<div class="controls col-md-7">
								<input type="file" id="image" name="image[]" multiple placeholder="" class="form-control">
								<?php if (isset($this->errors['image'])) { ?>
									<p class="text-danger"><?= $this->errors['image']; ?></p>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
					<?php if ($app['act'] == 'view') { ?>
						<div class="form-group row">
							<label class="control-label col-md-3" for="color_name">Color</label>
							<div class="controls col-md-7">
								<ul class="configurable-swatch-list no-count" style="list-style-type: none;">

									<?php if (isset($this->record['color'])) {
											$record['color'] = explode(",", $this->record['color']);
											foreach ($record['color'] as $color) { ?>
											<label for="id-color-<?php echo $color; ?>">
												<li style=" line-height: 28px;cursor:pointer;border:1px solid black">

													<div class=" swatch-link has-image choose-color" value="<?php echo $color ?>">
														<span class="swatch-label" style="height:26px; width:26px; line-height: 28px;">
															<img src="<?php echo RootREL . 'media/img/colors/' . $color . '.png'; ?>" alt="<?php echo $color ?>" title="<?php echo $color ?>" width="24" height="24" />
														</span>
													</div>

													<input type="checkbox" class="filter_all color" id="id-color-<?php echo $color; ?>" value="<?php echo $color; ?>" hidden>

												</li>
											</label>
									<?php }
										} ?>
								</ul>

							</div>
						</div>
					<?php } else if ($app['act'] == 'add') { ?>

						<div class="form-group row">
							<label class="control-label col-md-3" for="color_name">Color</label>
							<div class="controls col-md-7">
								<input hidden id="colors-choose" name="product[color]" value="">
								<ul class="configurable-swatch-list no-count" style="list-style-type: none;">
									<?php foreach ($app['color'] as $key => $value) { ?>
										<label for="id-color-<?php echo $value; ?>">
											<li style=" line-height: 28px;cursor:pointer;border:1px solid black">

												<div class=" swatch-link has-image choose-color" value="<?php echo $value ?>">
													<span class="swatch-label" style="height:26px; width:26px; line-height: 28px;">
														<img src="<?php echo RootREL . 'media/img/colors/' . $value . '.png'; ?>" alt="<?php echo $value ?>" title="<?php echo $value ?>" width="24" height="24" />
													</span>
												</div>

												<input type="checkbox" class="filter_all color" id="id-color-<?php echo $value; ?>" value="<?php echo $value; ?>" hidden>

											</li>
										</label>
									<?php } ?>
								</ul>
							</div>
						</div>
					<?php } else { ?>
						<div class="form-group row">
							<label class="control-label col-md-3" for="categories_name">Color</label>
							<div class="controls col-md-7">
								<input id="colors-choose" name="product[color]" value="<?php if (isset($this->record['color'])) {
																								echo  $this->record['color'];
																							} ?>">
								<ul class="configurable-swatch-list no-count" style="list-style-type: none;">
									<?php
										foreach ($app['color'] as $key => $value) { ?>
										<label for="id-color-<?php echo $value; ?>">
											<li style=" line-height: 28px;cursor:pointer;<?php if (isset($this->record['color'])) {
																										$record['color'] = explode(",", $this->record['color']);
																										foreach ($record['color'] as $color) {
																											if ($color == $value) {
																												echo "border:2px solid red;";
																											} else {
																												echo "border:1px solic black;";
																											}
																										}
																									} ?>">

												<div class=" swatch-link has-image choose-color" value="<?php echo $value ?>">
													<span class="swatch-label" style="height:26px; width:26px;line-height: 28px;">
														<img src="<?php echo RootREL . 'media/img/colors/' . $value . '.png'; ?>" alt="<?php echo $value ?>" title="<?php echo $value ?>" width="24" height="24" />
													</span>
												</div>

												<input type="checkbox" class="filter_all color" id="id-color-<?php echo $value; ?>" value="<?php echo $value; ?>" hidden <?php if (isset($this->record['color'])) {
																																														$record['color'] = explode(",", $this->record['color']);
																																														foreach ($record['color'] as $color) {
																																															if ($color == $value) {
																																																echo "checked";
																																															} else {
																																																echo "";
																																															}
																																														}
																																													} ?>>

											</li>
										</label>
									<?php } ?>
								</ul>
							</div>
						</div>
					<?php } ?>
					<!-- size -->
					<?php if ($app['act'] == 'view') { ?>
						<div class="form-group row">
							<label class="control-label col-md-3" for="color_name">Size</label>
							<div class="controls col-md-7">
								<ul class="configurable-swatch-list no-count" style="list-style-type: none;">

									<?php if (isset($this->record['size'])) {
											$record['size'] = explode(",", $this->record['size']);
											foreach ($record['size'] as $size) { ?>
											 <label for="id-size-<?php echo $size; ?>">
                                                <li style ="border:1px solid black">
                                                    <span class="swatch-link">
                                                        <span class="swatch-label" style="height:26px; min-width:26px; line-height: 28px;padding: 10px;margin:2px;">
                                                            <?= $size ?> </span>
                                                    </span>
                                                    <input type="checkbox" class="filter_all size" id="id-size-<?php echo $size; ?>" value="<?php echo $size; ?>" hidden>
                                                </li>
                                            </label>
									<?php }
										} ?>
								</ul>

							</div>
						</div>
					<?php } else if ($app['act'] == 'add') { ?>

						<div class="form-group row">
							<label class="control-label col-md-3" for="size_name">Size</label>
							<div class="controls col-md-7">
								<input hidden id="sizes-choose" name="product[size]" value="">
								<ul class="configurable-swatch-list size-p no-count" style="list-style-type: none;">
									<?php foreach ($app['size'] as $key => $size) { ?>
										 <label for="id-size-<?php echo $size; ?>">
                                                <li style ="border:1px solid black">
                                                    <span class="swatch-link">
                                                        <span class="swatch-label" style="height:26px; min-width:26px; line-height: 28px;padding: 10px;margin:4px;">
                                                            <?= $size ?> </span>
                                                    </span>
                                                    <input type="checkbox" class="filter_all size" id="id-size-<?php echo $size; ?>" value="<?php echo $size; ?>" hidden>
                                                </li>
                                            </label>
									<?php } ?>
								</ul>
							</div>
						</div>
					<?php } else { ?>
						<div class="form-group row">
							<label class="control-label col-md-3" for="size_name">Size</label>
							<div class="controls col-md-7">
								<input id="sizes-choose" name="product[size]" value="<?php if (isset($this->record['size'])) {
																								echo  $this->record['size'];
																							} ?>">
								<ul class="configurable-swatch-list size-p no-count" style="list-style-type: none;">
									<?php
										foreach ($app['size'] as $key => $size) { ?>
											<label for="id-size-<?php echo $size; ?>">
                                                <li style ="<?php if (isset($this->record['size'])) {
																										$record['size'] = explode(",", $this->record['size']);
																										foreach ($record['size'] as $sizez) {
																											if ($sizez == $size) {
																												echo "border:2px solid red;";
																											} else {
																												echo "border:1px solic black;";
																											}
																										}
																									} ?>">
                                                    <span class="swatch-link">
                                                        <span class="swatch-label" style="height:26px; min-width:26px; line-height: 28px;padding: 10px;margin:4px;">
                                                            <?= $size ?> </span>
                                                    </span>
                                                    <input type="checkbox" class="filter_all size" id="id-size-<?php echo $size; ?>" value="<?php echo $size; ?>" hidden <?php if (isset($this->record['size'])) {
																																														$record['size'] = explode(",", $this->record['size']);
																																														foreach ($record['size'] as $sizez) {
																																															if ($sizez == $size) {
																																																echo "checked";
																																															} else {
																																																echo "";
																																															}
																																														}
																																													} ?>>
                                                </li>
                                            </label>
										
									<?php } ?>
								</ul>
							</div>
						</div>
					<?php } ?>
					<!-- end size -->
					<?php if ($app['act'] == 'view') { ?>
						<div class="form-group  row">
							<label class="control-label col-md-3" for="description">Product descriptipn</label>
							<div class="controls  col-md-7">
								<div style="padding: 10px;background-color: #e9ecef">
									<?php if (isset($this->record['description'])) echo (($this->record['description'])); ?>
								</div>

							</div>
							<?php if (isset($this->errors['description'])) { ?>
								<p class="text-danger"><?= $this->errors['description']; ?></p>
							<?php } ?>
						</div>
					<?php } ?>
					<?php if ($app['act'] == 'add' || $app['act'] == 'edit') { ?>
						<div class="form-group  row">
							<label class="control-label  col-md-3 " for="description">Product descriptipn<span style="color:red;">*</span></label>
							<div class="controls  col-md-7">
								<textarea cols='50' rows='15' type="text" id="editor1" name="product[description]" placeholder="" class="form-control" value=""><?php if (isset($this->record['description'])) echo (($this->record['description'])); ?></textarea>
								<?php if (isset($this->errors['decription'])) { ?>
									<p class="text-danger"><?= $this->errors['decription']; ?></p>
								<?php } ?>
							</div>
						</div>
					<?php } ?>

					<?php if ($app['act'] == 'view') { ?>
						<div class="form-group row">
							<label class="control-label col-md-3" for="image">Image<span style="color:red;">*</span></label>
							<div class="controls col-md-7">
								<div class="flexslider">
									<ul class="slides carousel">
										<?php foreach ($this->recordGalleries as $gallery) { ?>
											<li data-thumb='<?php echo RootREL . "media/upload/products/" . $gallery['image'] ?>'>
												<img id='gallery-id-<?php echo $gallery['id']; ?>' src='<?php echo RootREL . "media/upload/products/" . $gallery['image']; ?>' data-imagezoom='true' class='img-responsive' alt=''>
											</li>

										<?php } ?>

									</ul>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-3" for="created">Created at</label>
							<div class="controls col-md-7">
								<input disabled type="text" id="created" placeholder="" class="form-control" value="<?php if (isset($this->record['created'])) echo $this->record['created']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-3" for="updated">Updated at<span style="color:red;">*</span></label>
							<div class="controls col-md-7">
								<input disabled type="text" id="updated" placeholder="" class="form-control" value="<?php if (isset($this->record['updated'])) echo $this->record['updated']; ?>">
							</div>
						</div>
						<div class="form-group text-center">
							<a href="<?php echo (vendor_app_util::url(["ctl" => "products", "act" => "edit/" . $this->record['id']])) ?>" id="<?php echo ("edit" . $this->record['id']); ?>">
								<button data-placement="top" title="Edit product" type="button" class="btn btn-primary edit-this->record" alt="<?php echo $record['id']; ?>"><i class="fa fa-edit"></i></button>
							</a>
						</div>
					<?php } ?>
					<?php if ($app['act'] != 'view') { ?>
						<div class="text-center form-group" style="margin-top: 50px;">
							<input class="btn btn-success" type="submit" name="btn_submit" value="<?php echo ucfirst($app['act']) ?>">
						</div>
					<?php } ?>


					<?php if ($app['act'] != 'view') { ?>
					</form>
				<?php } ?>
			</div>
		</div>
		<table class="table">
			<tbody id="list-data">

			</tbody>
		</table>
		<div class="loading hide" id="loading" style="">
			<i class="fa fa-spinner fa-spin"></i>
		</div>
		<!-- </div> -->
	</div>

</section>
</div>
<script type="text/javascript" src="<?php echo RootREL; ?>media/admin/js/slugify.js"></script>
<script type="text/javascript" src="<?php echo RootREL; ?>media/libs/ckeditor_v4_full/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo RootREL; ?>media/admin/js/okzoom.js"></script>

<script>
	
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
		$('.size-p').on("click", "li", function() {
			let size = get_filter('size');
			$('.size:checked').parent().css({
				"border": "2px solid red"
			});
			$('.size:not(:checked)').parent().css({
				"border": "1px solid black"
			});
			$('#sizes-choose').val(size.join());
		});

	});
</script>