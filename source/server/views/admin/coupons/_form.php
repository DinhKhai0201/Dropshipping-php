
<section class="content" id="admin-import-page">
  <div class="box">      
    <div class="box-body">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
				<div id="legend" style="margin: 20px auto;display: table;font-weight: 700;">
					<legend class="" ><?php echo ucwords($app['act'].' '.$app['ctl']); ?></legend>
				</div>
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
							<label for="name">Name<span style="color:red;">*</span></label>
							<input <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="name" name="coupon[name]" placeholder="" class="form-control" value="<?php if(isset($this->record['name'])) echo $this->record['name']; ?>">
								<?php if( isset($this->errors['name'])) { ?>
									<p class="text-danger"><?=$this->errors['name']; ?></p>
								<?php } ?>
						</div>
						<div class="form-group">
							<label for="slug">Slug<span style="color:red;">*</span></label>
							<input <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="slug" name="coupon[slug]" placeholder="" class="form-control" value="<?php if(isset($this->record['slug'])) echo $this->record['slug']; ?>">
								<?php if( isset($this->errors['slug'])) { ?>
									<p class="text-danger"><?=$this->errors['slug']; ?></p>
								<?php } ?>
						</div>
						<div class="form-group ">
							<label class="control-label " for="decription">Coupon descriptipn<span style="color:red;">*</span></label>					
								<?php if($app['act']=='view'){ ?>
									<div class="form-group" style="padding: 10px;background-color: #e9ecef">
									<p><?php if(isset($this->record['decription'])) echo(($this->record['decription'])); ?></p>
									</div>
									

								<?php }else{ ?>
									<textarea <?php if($app['act']=='view') echo "disabled"; ?> cols='50' rows='15' type="text" id="editor1" name="coupon[decription]" placeholder="" class="form-control" value=""><?php if(isset($this->record['decription'])) echo(($this->record['decription'])); ?></textarea>
								<?php } ?>
								<?php if( isset($this->errors['decription'])) { ?>
									<p class="text-danger"><?=$this->errors['decription']; ?></p>
								<?php } ?>
							
						</div>
						<div class="form-group">
							<label for="coupon_code">Coupon code<span style="color:red;">*</span></label>
							<input <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="coupon_code" name="coupon[coupon_code]" placeholder="" class="form-control" value="<?php if(isset($this->record['coupon_code'])) echo $this->record['coupon_code']; ?>">
								<?php if( isset($this->errors['coupon_code'])) { ?>
									<p class="text-danger"><?=$this->errors['coupon_code']; ?></p>
								<?php } ?>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-3" for="status">Type coupon<span style="color:red;">*</span></label>
							<div class="controls col-md-7">
								<?php if($app['act'] !='view'){ ?>
									<select name="coupon[type]" id="input-type" class="form-control ">
										<?php foreach (coupon_model::$type as $k => $v) { ?>
									<option value="<?=$k;?>" <?=(isset($this->record['type']) && $this->record['type']==$k)? 'selected="selected"':'';?>><?=$v;?></option>
								<?php } ?>
							</select>
						<?php } else { ?>
							<input disabled type="text" id="type" name="coupon[type]"  class="form-control" value="<?php if(isset($this->record['type'])) echo coupon_model::$type[$this->record['type']]; ?>">
						<?php } ?>
								<?php if( isset($this->errors['status'])) { ?>
									<p class="text-danger"><?=$this->errors['status']; ?></p>
								<?php } ?>
							</div>
						</div>
						<?php if($app['act']=='view') { if ($this->record['type'] == 0) {?>
							<div class="form-group process-type-percent-js" >
								<label for="type">Percent value (%)<span style="color:red;">*</span></label>
								<input disabled type="text" id="type" name="coupon[percent_value]" placeholder="" class="form-control" value="<?php if(isset($this->record['percent_value'])) echo $this->record['percent_value']; ?>">
									<?php if( isset($this->errors['type'])) { ?>
										<p class="text-danger"><?=$this->errors['type']; ?></p>
									<?php } ?>
							</div>
						<?php } else { ?>
							<div class="form-group process-type-fixvalue-js">
							<label for="coupon_code">Fix value<span style="color:red;">*</span></label>
							<input disabled type="text" id="fix_value" name="coupon[fix_value]" placeholder="" class="form-control" value="<?php if(isset($this->record['fix_value']))  echo $this->record['fix_value']; ?>">
								<?php if( isset($this->errors['fix_value'])) { ?>
									<p class="text-danger"><?=$this->errors['fix_value']; ?></p>
								<?php } ?>
						</div>
						<?php }} ?>
						<?php if($app['act']=='add' OR $app['act']=='edit')  {?>
							<div class="form-group process-type-percent-js" >
								<label for="type">Percent value (%)<span style="color:red;">*</span></label>
								<input  type="number" id="type" name="coupon[percent_value]" min="0" max="100" placeholder="" class="form-control" value="<?php if(isset($this->record['percent_value'])) {echo $this->record['percent_value'];} else {echo "0";}  ?>">
									<?php if( isset($this->errors['type'])) { ?>
										<p class="text-danger"><?=$this->errors['type']; ?></p>
									<?php } ?>
							</div>
							<div class="form-group process-type-fixvalue-js" >
								<label for="coupon_code">Fix value<span style="color:red;">*</span></label>
								<input  type="number" id="fix_value" name="coupon[fix_value]" min ="0" placeholder="" class="form-control" value="<?php if(isset($this->record['fix_value'])) { echo $this->record['fix_value'];} else {  echo "0";} ?>">
									<?php if( isset($this->errors['fix_value'])) { ?>
										<p class="text-danger"><?=$this->errors['fix_value']; ?></p>
									<?php } ?>
							</div>
						<?php } else { ?>
							
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
						<div class="row">
							<div class="form-group col-sm-6">
								<label for="time_start">Time start<span style="color:red;">*</span></label>
								<div class='input-group date' >
									<input <?php if($app['act']=='view') echo "disabled"; ?> type='text' class="form-control" id='datetimepicker1' value="<?php if(isset($this->record['time_start'])){echo ($this->record['time_start']);}?>" name="coupon[time_start]" required="required" placeholder=""/>
									<?php if( isset($this->errors['time_start'])) { ?>
										<p class="text-danger"><?=$this->errors['time_start']; ?></p>
									<?php } ?>
								</div>
							</div>
							<div class="form-group col-sm-6">
								<label for="time_end">Time end<span style="color:red;">*</span></label>
								<div class='input-group date' >
									<input <?php if($app['act']=='view') echo "disabled"; ?> type='text' class="form-control" id='datetimepicker2' value="<?php if(isset($this->record['time_start'])){echo ($this->record['time_start']);}?>" name="coupon[time_start]" required="required" placeholder=""/>
									<?php if( isset($this->errors['time_start'])) { ?>
										<p class="text-danger"><?=$this->errors['time_start']; ?></p>
									<?php } ?>
								</div>
							</div>
						</div>
						<?php if($app['act'] !='view'){ ?>
							<div class="text-center form-group">
								<input class="btn btn-success" type="submit" name="btn_submit" value="<?php echo ucfirst($app['act']) ?>">
							</div>
						<?php } ?>

						<?php if($app['act'] =='view'){ ?>
							<div class="form-group">
								<label for="created">Created</label>
								<input disabled type="text" id="created" placeholder="" class="form-control" value="<?php if(isset($this->record['created'])) echo $this->record['created']; ?>">
							</div>

							<div class="form-group">
								<label for="updated">Update</label>
								<input disabled type="text" id="updated" placeholder="" class="form-control" value="<?php if(isset($this->record['updated'])) echo $this->record['updated']; ?>">
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
<script type="text/javascript" src="<?php echo RootREL; ?>media/admin/js/process_type_coupon.js"></script>
<script type="text/javascript" src="<?php echo RootREL; ?>media/libs/ckeditor_v4_full/ckeditor.js"></script>
<script type="text/javascript">
	CKEDITOR.replace( 'editor1', {} );
	CKEDITOR.config.baseFloatZIndex = 100001;
</script>
<script type="text/javascript">
	$("#name").keyup(function(){
		$("#slug").val(slugify($(this).val()));
	});
	$(document).ready(function () {
		$(function() {
        $('#datetimepicker1').datetimepicker();
        $('#datetimepicker2').datetimepicker({
			useCurrent: false 
		});
		$("#datetimepicker1").on("dp.change", function(e) {
		$('#datetimepicker2').data("DateTimePicker").minDate(e.date);
		});
		$("#datetimepicker2").on("dp.change", function(e) {
		$('#datetimepicker1').data("DateTimePicker").maxDate(e.date);
		});
	});
    });
</script>