<section class="content" id="admin-import-page">
  <div class="box">      
    <div class="box-body">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
					<?php if($app['act'] != 'view') { ?>
						<form 
							id="form-addad" 
							action="<?php echo vendor_app_util::url(["ctl"=>"ads", "act"=>$app['act'] == 'edit'?$app['act']."/".$this->record['id']:$app['act']]); ?>" 
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
									<select name="ad[status]" id="input-status" class="form-control">
										<?php foreach (ad_model::$status as $k => $v) { ?>
											<option value="<?=$k;?>" <?=(isset($this->record['status']) && $this->record['status']==$k)? 'selected="selected"':'';?>><?=$v;?></option>
										<?php } ?>
									</select>
								<?php } else { ?>
									<input disabled type="text" id="status" name="ad[status]"  class="form-control" value="<?php if(isset($this->record['status'])) echo ad_model::$status[$this->record['status']]; ?>">
								<?php } ?>
							<?php if( isset($this->errors['status'])) { ?>
								<p class="text-danger"><?=$this->errors['status']; ?></p>
							<?php } ?>
						</div>

						<div class="form-group">
							<label for="name">Title<span style="color:red;">*</span></label>
							<input <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="name" name="ad[title]" placeholder="" class="form-control" value="<?php if(isset($this->record['title'])) echo $this->record['title']; ?>">
								<?php if( isset($this->errors['title'])) { ?>
									<p class="text-danger"><?=$this->errors['title']; ?></p>
								<?php } ?>
						</div>

						<div class="form-group">
							<label for="name">Description<span style="color:red;">*</span></label>
							<input <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="name" name="ad[description]" placeholder="" class="form-control" value="<?php if(isset($this->record['description'])) echo $this->record['description']; ?>">
								<?php if( isset($this->errors['description'])) { ?>
									<p class="text-danger"><?=$this->errors['description']; ?></p>
								<?php } ?>
						</div>

						<div class="form-group">
							<label for="status">Page</label>

								<?php if($app['act']  == 'view' ): ?>
									<select name="ad[page]" id="input-status" class="form-control select-page" disabled>
										<?php global $app; foreach ($app['ads'] as $k => $v) { ?>
											<option value="<?=$k?>" <?=(isset($this->record['page']) && $this->record['page']==$k)? 'selected="selected"':'';?>><?=$v['name'];?></option>
										<?php } ?>
									</select>

								<?php elseif ($app['act']  == 'add' ): ?>
									<select name="ad[page]" id="input-status" class="form-control select-page">
										<?php global $app; foreach ($app['ads'] as $k => $v) { ?>
											<option value="<?=$k?>" ><?=$v['name'];?></option>
										<?php } ?>
									</select>

								<?php elseif ($app['act']  == 'edit' ): ?>
									<select name="ad[page]" id="input-status" class="form-control select-page">
										<?php global $app; foreach ($app['ads'] as $k => $v) { ?>
											<option value="<?=$k?>" <?=(isset($this->record['page']) && $this->record['page']==$k)? 'selected="selected"':'';?>><?=$v['name'];?></option>
										<?php } ?>
									</select>

								<?php endif; ?>

							<?php if( isset($this->errors['page'])) { ?>
								<p class="text-danger"><?=$this->errors['page']; ?></p>
							<?php } ?>
						</div>

						<div class="form-group">
							<label for="status">Position</label>

								<?php if($app['act']  == 'view' ): ?>
									<select name="ad[position]" id="input-status" class="form-control select-page-select" disabled>
										<?php global $app; foreach ($app['ads'][$this->record['page']]['position'] as $k => $v) { ?>
											<option value="<?=$k?>" <?=(isset($this->record['position']) && $this->record['position']==$k)? 'selected="selected"':'';?>><?=$v;?></option>
										<?php } ?>
									</select>

								<?php elseif ($app['act']  == 'add' ): ?>
									<select name="ad[position]" id="input-status" class="form-control select-page-select">
										<?php global $app; foreach ($app['ads'][1]['position'] as $k => $v) { ?>
											<option value="<?=$k?>"><?=$v;?></option>
										<?php } ?>
									</select>

								<?php elseif ($app['act']  == 'edit' ): ?>
									<select name="ad[position]" id="input-status" class="form-control select-page-select">
										<?php global $app; foreach ($app['ads'][$this->record['page']]['position'] as $k => $v) { ?>
											<option value="<?=$k?>" <?=(isset($this->record['position']) && $this->record['position']==$k)? 'selected="selected"':'';?>><?=$v;?></option>
										<?php } ?>
									</select>

								<?php endif; ?>

							<?php if( isset($this->errors['position'])) { ?>
								<p class="text-danger"><?=$this->errors['position']; ?></p>
							<?php } ?>
						</div>

						<div class="form-group row">
							<!-- image -->
							<label class="control-label col-md-3" for="image">Image</label>
							<div class="controls col-md-7">
							<?php if($app['act'] !='add'){ ?>
								<?php if(isset($this->record['image'])) { ?>
									<img src="<?php echo vendor_app_util::getUrlAws($this->record['image'], $app['ctl']); ?>">
								<?php } ?>
							<?php } ?>
							<?php if($app['act'] !='view'){ ?>
								<input type="file" id="image" name="image" placeholder="" class="form-control">
							<?php } ?>
							<?php if( isset($this->errors['image'])) { ?>
								<p class="text-danger"><?=$this->errors['image']; ?></p>
							<?php } ?>
							</div>
						</div>

						<div class="form-group">
							<label for="name">Url<span style="color:red;">*</span></label>
							<input <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="name" name="ad[url]" placeholder="" class="form-control" value="<?php if(isset($this->record['url'])) echo $this->record['url']; ?>">
								<?php if( isset($this->errors['url'])) { ?>
									<p class="text-danger"><?=$this->errors['url']; ?></p>
								<?php } ?>
						</div>
						
						<?php if($app['act'] !='view'){ ?>
							<div class="text-center form-group">
								<input class="btn btn-success" type="submit" name="btn_submit" value="<?php echo ucfirst($app['act']) ?>">
							</div>
						<?php } ?>

						<?php if($app['act'] =='view'){ ?>
							<div class="form-group">
								<label for="created">Created at</label>
								<input disabled type="text" id="created" placeholder="" class="form-control" value="<?php if(isset($this->record['created'])) echo $this->record['created']; ?>">
							</div>

							<div class="form-group">
								<label for="updated">Updated at</label>
								<input disabled type="text" id="updated" placeholder="" class="form-control" value="<?php if(isset($this->record['updated'])) echo $this->record['updated']; ?>">
							</div>

							<div class="form-group text-center">
								<a href="<?php echo (vendor_app_util::url(["ctl"=>"ads", "act"=>"edit/".$this->record['id']])) ?>" id="<?php echo("edit".$record['id']);?>" >
									<button data-placement="top" title="Edit ad" type="button" class="btn btn-primary edit-record" alt="<?php echo $record['id']; ?>"><i class="fa fa-edit"></i></button>
								</a>
							</div>
						<?php } ?>
						<?php if($app['act'] != 'view') { ?>
							</form>
						<?php } ?>
							</div>
						</div>
			</div>
		</div>
	</section>
</div>

<script type="text/javascript">
  var rootUrl   = "<?=RootURL;?>";
</script>  
<script>
  	var ctl   = "<?php global $app; echo $app['act'];?>";
	if(ctl === 'add')
	$.ajax({
		url: rootUrl+"admin/ads/getpage?id=1",
		dataType: "json",
		type: 'POST',
		success: function (data) {
			let html = '';
			Object.keys(data.data.position).map(item=>{
				html += `<option value="${item}">${data.data.position[item]}</option>`
			})
			$('.select-page-select').html(html);

		}
	})

	$('.select-page').on('change', function(e){
		url = rootUrl+"admin/ads/getpage?id="+e.target.value;
		$.ajax({
			url: url,
			dataType: "json",
			type: 'POST',
			success: function (data) {
				let html = '';
				Object.keys(data.data.position).map(item=>{
					html += `<option value="${item}">${data.data.position[item]}</option>`
				})
				$('.select-page-select').html(html);

			}
		})
	})

</script>