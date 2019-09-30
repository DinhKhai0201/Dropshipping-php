<section class="content" id="admin-import-page">
  <div class="box">      
    <div class="box-body">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
					<?php if($app['act'] != 'view') { ?>
						<form 
							id="form-addcoupon" 
							action="<?php echo vendor_app_util::url(["ctl"=>"coupons", "act"=>$app['act'] == 'edit'?$app['act']."/".$this->record['id']:$app['act']]); ?>" 
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
							<div class="form-group">
							<label for="status">Status</label>
								<?php if($app['act'] !='view'){ ?>
									<select name="coupon[status]" id="input-status" class="form-control">
										<?php foreach (coupon_model::$status as $k => $v) { ?>
											<option value="<?=$k;?>" <?=(isset($this->record['status']) && $this->record['status']==$k)? 'selected="selected"':'';?>><?=$v;?></option>
										<?php } ?>
									</select>
								<?php } else { ?>
									<input disabled type="text" id="status" name="coupon[status]"  class="form-control" value="<?php if(isset($this->record['status'])) echo coupon_model::$status[$this->record['status']]; ?>">
								<?php } ?>
							<?php if( isset($this->errors['status'])) { ?>
								<p class="text-danger"><?=$this->errors['status']; ?></p>
							<?php } ?>
						</div>

						<div class="form-group">
							<label for="name">Name<span style="color:red;">*</span></label>
							<input <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="name" name="coupon[name]" placeholder="" class="form-control" value="<?php if(isset($this->record['name'])) echo $this->record['name']; ?>">
								<?php if( isset($this->errors['name'])) { ?>
									<p class="text-danger"><?=$this->errors['name']; ?></p>
								<?php } ?>
						</div>

						<div class="form-group">
							<label for="coupon_code">Coupon code<span style="color:red;">*</span></label>
							<input <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="coupon_code" name="coupon[coupon_code]" placeholder="" class="form-control" value="<?php if(isset($this->record['coupon_code'])) echo $this->record['coupon_code']; ?>">
								<?php if( isset($this->errors['coupon_code'])) { ?>
									<p class="text-danger"><?=$this->errors['coupon_code']; ?></p>
								<?php } ?>
						</div>
						<div class="form-group">
							<label for="coupon_code">Type coupon<span style="color:red;">*</span></label>
							<input <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="type" name="coupon[type]" placeholder="" class="form-control" value="<?php if(isset($this->record['type']))  echo $this->record['type']; ?>">
								<?php if( isset($this->errors['type'])) { ?>
									<p class="text-danger"><?=$this->errors['type']; ?></p>
								<?php } ?>
						</div>
						
						<?php if($app['act'] !='view'){ ?>
							<div class="text-center form-group">
								<input class="btn btn-success" type="submit" name="btn_submit" value="<?php echo ucfirst($app['act']) ?>">
							</div>
						<?php } ?>

						<?php if($app['act'] =='view'){ ?>
							<div class="form-group">
								<label for="created">Time start</label>
								<input disabled type="text" id="time_start" placeholder="" class="form-control" value="<?php if(isset($this->record['time_start'])) echo $this->record['time_start']; ?>">
							</div>

							<div class="form-group">
								<label for="time_end">Time end</label>
								<input disabled type="text" id="time_end" placeholder="" class="form-control" value="<?php if(isset($this->record['time_end'])) echo $this->record['time_end']; ?>">
							</div>

							<div class="form-group text-center">
								<a href="<?php echo (vendor_app_util::url(["ctl"=>"coupons", "act"=>"edit/".$this->record['id']])) ?>" id="<?php echo("edit".$record['id']);?>" >
									<button data-placement="top" title="Edit coupon" type="button" class="btn btn-primary edit-record" alt="<?php echo $record['id']; ?>"><i class="fa fa-edit"></i></button>
								</a>
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
    </div>
  </div>
</section>
</div>
<script type="text/javascript" src="<?php echo RootREL; ?>media/admin/js/slugify.js"></script>
<script>
	$("#name").keyup(function(){
		$("#slug").val(slugify($(this).val()));
	});
</script>