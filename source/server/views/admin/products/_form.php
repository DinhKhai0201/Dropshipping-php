<section class="content" id="admin-import-page">
<div class="row">
  <div class="box">      
    <div class="box-body">
      
        <!-- <div class="col-md-3"></div> -->
        <!-- <div class="col-md-6"> -->
				<div id="legend" style="margin: 20px auto;display: table;font-weight: 700;">
					<legend class="" ><?php echo ucwords($app['act'].' '.$app['ctl']); ?></legend>
				</div>
					<?php if($app['act'] != 'view') { ?>
						<form 
							id="form-addproduct" 
							action="<?php echo vendor_app_util::url(["ctl"=>"products", "act"=>$app['act'] == 'edit'?$app['act']."/".$this->record['id']:$app['act']]); ?>" 
							method="post" enctype="multipart/form-data" class="form-horizontal"
						>
					<?php } ?>
						<?php if(isset(($this->errors['database']))) { ?>
							<div class="alert alert-danger  alert-dismissible fade in" role="alert"> 
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
								<h4>Oh snap! You got an error!</h4> 
								<p><?=$this->errors['database'];?></p> 
							</div>
					<?php } ?>
					<div class="form-group row">
							<label class="control-label col-md-3" for="name">Name<span style="color:red;">*</span></label>
							<div class="controls col-md-7">
								<input <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="name" name="product[name]" placeholder="" class="form-control" value="<?php if(isset($this->record['name'])) echo $this->record['name']; ?>">
									<?php if( isset($this->errors['name'])) { ?>
										<p class="text-danger"><?=$this->errors['name']; ?></p>
									<?php } ?>
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-3" for="sku">SKU<span style="color:red;">*</span></label>
							<div class="controls col-md-7">
								<input <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="sku" name="product[sku]" placeholder="" class="form-control" value="<?php if(isset($this->record['sku'])) echo $this->record['sku']; ?>">
									<?php if( isset($this->errors['sku'])) { ?>
										<p class="text-danger"><?=$this->errors['sku']; ?></p>
									<?php } ?>
							</div>
						</div>
						
						<div class="form-group row">
							<label class="control-label col-md-3" for="slug">Slug<span style="color:red;">*</span></label>
							<div class="controls col-md-7">
								<input <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="slug" name="product[slug]" placeholder="" class="form-control" value="<?php if(isset($this->record['name'])) echo $this->record['name']; ?>">
									<?php if( isset($this->errors['slug'])) { ?>
										<p class="text-danger"><?=$this->errors['slug']; ?></p>
									<?php } ?>
							</div>
						</div>
						<?php if($app['act'] =='view'){ ?>
								<div class="form-group row">
									<label class="control-label col-md-3" for="categories_name">Category name</label>
									<div class="controls col-md-7">
										<input required <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="brands_name" name="product[category_id]" placeholder="" class="form-control" value="<?php foreach( $this->recordsCategories as $category){ echo (isset($this->record['category_id']) && $this->record['category_id']==$category['id'])? $category['name']:''; } ?>">
									</div>
								</div>
							<?php } else{ ?>
								<div class="form-group row">
									<label class="control-label col-md-3" for="categories_name">Category name</label>
									<div class="controls col-md-7">
										<select name="product[category_id]" id="" class="form-control select2 w-p100">
											<?php foreach( $this->recordsCategories as $category){ ?>
												<option value="<?=$category['id']?>" <?=(isset($this->record['category_id']) && $this->record['category_id']==$category['id'])? 'selected="selected"':'';?>><?=$category['name']?></option>
											<?php }  ?>
										</select>
									</div>
								</div>
						<?php } ?>
						<?php if($app['act'] =='view'){ ?>
								<div class="form-group row">
									<label class="control-label col-md-3" for="brands_name">Brands name</label>
									<div class="controls col-md-7">
										<input required <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="brands_name" name="product[brand_id]" placeholder="" class="form-control" value="<?php foreach( $this->recordsBrands as $brand){ echo (isset($this->record['brand_id']) && $this->record['brand_id']==$brand['id'])? $brand['name']:''; } ?>">
									</div>
								</div>
							<?php } else{ ?>
								<div class="form-group row">
									<label class="control-label col-md-3" for="brands_name">Brands name</label>
									<div class="controls col-md-7">
										<select name="product[brand_id]" id="" class="form-control select2 w-p100">
											<?php foreach( $this->recordsBrands as $brand){ ?>
												<option value="<?=$brand['id']?>" <?=(isset($this->record['brand_id']) && $this->record['brand_id']==$brand['id'])? 'selected="selected"':'';?>><?=$brand['name']?></option>
											<?php }  ?>
										</select>
									</div>
								</div>
						<?php } ?>
						<?php if($app['act'] =='view'){ ?>
								<div class="form-group row">
									<label class="control-label col-md-3" for="Stores_name">Stores name</label>
									<div class="controls col-md-7">
										<input required <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="stores_name" name="product[store_id]" placeholder="" class="form-control" value="<?php foreach( $this->recordsStores as $store){ echo ($store['name']); } ?>">
									</div>
								</div>
							<?php } else{ ?>
								<div class="form-group row">
									<label class="control-label col-md-3" for="brands_name">Stores name</label>
									<div class="controls col-md-7">
										<select name="product[store_id]" id="" class="form-control select2 w-p100">
											<?php foreach( $this->recordsStores as $store){ ?>
												<option value="<?=$store['id']?>" <?=(isset($this->record['store_id']) && $this->record['store_id']==$store['id'])? 'selected="selected"':'';?>><?=$store['name']?></option>
											<?php } ?>
										</select>
									</div>
								</div>
						<?php } ?>
							<div class="form-group row">
							<label class="control-label col-md-3" for="status">Status<span style="color:red;">*</span></label>
							<div class="controls col-md-7">
								<?php if($app['act'] !='view'){ ?>
										<select name="product[status]" id="input-status" class="form-control">
											<?php foreach (product_model::$status as $k => $v) { ?>
												<option value="<?=$k;?>" <?=(isset($this->record['status']) && $this->record['status']==$k)? 'selected="selected"':'';?>><?=$v;?></option>
											<?php } ?>
										</select>
									<?php } else { ?>
										<input disabled type="text" id="status" name="product[status]"  class="form-control" value="<?php if(isset($this->record['status'])) echo product_model::$status[$this->record['status']]; ?>">
									<?php } ?>
								<?php if( isset($this->errors['status'])) { ?>
									<p class="text-danger"><?=$this->errors['status']; ?></p>
								<?php } ?>
							</div>
						</div>
						
						<div class="form-group row">
							<label class="control-label col-md-3" for="price">Price<span style="color:red;">*</span></label>
							<div class="controls col-md-7">
								<input <?php if($app['act']=='view') echo "disabled"; ?> type="number" id="price" name="product[price]" placeholder="" class="form-control" value="<?php if(isset($this->record['price'])) {echo $this->record['price'];} else {echo "0";}  ?>">
									<?php if( isset($this->errors['price'])) { ?>
										<p class="text-danger"><?=$this->errors['price']; ?></p>
									<?php } ?>
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-3" for="quanlity">Quantity<span style="color:red;">*</span></label>
							<div class="controls col-md-7">
								<input  <?php if($app['act']=='view') echo "disabled"; ?> type="number" id="type" name="product[quantity]" min="0" max="100" placeholder="" class="form-control" value="<?php if(isset($this->record['quanlity'])) {echo $this->record['quanlity'];} else {echo "0";}  ?>">
									<?php if( isset($this->errors['quantity'])) { ?>
										<p class="text-danger"><?=$this->errors['quanlity']; ?></p>
									<?php } ?>
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-3" for="image">Image<span style="color:red;">*</span></label>
							<div class="controls col-md-7">
								<input  type="file" id="image" name="image[]" multiple accept=".jpg, .png, .gif" placeholder="" class="form-control">
									<?php if( isset($this->errors['image'])) { ?>
										<p class="text-danger"><?=$this->errors['image']; ?></p>
									<?php } ?>
							</div>
						</div>
						<div class="form-group ">
							<label class="control-label " for="description">Product descriptipn<span style="color:red;">*</span></label>					
								<?php if($app['act']=='view'){ ?>
									<div class="form-group" style="padding: 10px;background-color: #e9ecef">
									<p><?php if(isset($this->record['description'])) echo(($this->record['description'])); ?></p>
									</div>
								<?php }else{ ?>
									<textarea <?php if($app['act']=='view') echo "disabled"; ?> cols='50' rows='15' type="text" id="editor1" name="product[description]" placeholder="" class="form-control" value=""><?php if(isset($this->record['description'])) echo(($this->record['description'])); ?></textarea>
								<?php } ?>
								<?php if( isset($this->errors['decription'])) { ?>
									<p class="text-danger"><?=$this->errors['decription']; ?></p>
								<?php } ?>
							
						</div>
						<?php if($app['act'] =='view'){ ?>
							<div class="form-group row">
								<label class="control-label col-md-3" for="created">Created at</label>
								<div class="controls col-md-7">
									<input disabled type="text" id="created" placeholder="" class="form-control" value="<?php if(isset($this->record['created'])) echo $this->record['created']; ?>">
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-3" for="updated">Updated at<span style="color:red;">*</span></label>
								<div class="controls col-md-7">
									<input disabled type="text" id="updated" placeholder="" class="form-control" value="<?php if(isset($this->record['updated'])) echo $this->record['updated']; ?>">
								</div>
							</div>
							<div class="form-group text-center">
								<a href="<?php echo (vendor_app_util::url(["ctl"=>"products", "act"=>"edit/".$this->record['id']])) ?>" id="<?php echo("edit".$this->record['id']);?>" >
									<button data-placement="top" title="Edit product" type="button" class="btn btn-primary edit-this->record" alt="<?php echo $record['id']; ?>"><i class="fa fa-edit"></i></button>
								</a>
							</div>
						<?php } ?>
						
						
						
						
						
						<?php if($app['act'] !='view'){ ?>
							<div class="text-center form-group">
								<input class="btn btn-success" type="submit" name="btn_submit" value="<?php echo ucfirst($app['act']) ?>">
							</div>
						<?php } ?>

						
						<?php if($app['act'] != 'view') { ?>
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
<script type="text/javascript">
	CKEDITOR.replace( 'editor1', {} );
	CKEDITOR.config.baseFloatZIndex = 100001;
</script>
<script>
	$("#name").keyup(function(){
		$("#slug").val(slugify($(this).val()));
	});
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#output').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
	$("#image").change(function () {
        readURL(this);
	});
</script>