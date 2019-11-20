<section class='content'>
<div class="row">
	<div class="box">		   
		<div class="box-body">
			<fieldset>
				<div id="legend" style="margin: 20px auto;display: table;font-weight: 700;">
					<legend class="" ><?php echo ucwords($app['act'].' '.$app['ctl']); ?></legend>
				</div>
					<?php if($app['act'] != 'view') { ?>
						<form 
						
						
						id="form-adduser" 
						action="<?php echo vendor_app_util::url(["ctl"=>"users", "act"=>$app['act'] == 'edit'?$app['act']."/".$this->record['id']:$app['act']]); ?>" 
						method="post" enctype="multipart/form-data" class="form-horizontal"
						
						
						>
					<?php } ?>
					<?php if(isset($this->errors['database'])) { ?>
						<div class="alert alert-danger  alert-dismissible fade in" role="alert"> 
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
							<h4>Oh snap! You got an error!</h4> 
							<p><?=$this->errors['database'];?></p> 
						</div>
					<?php } ?>

						<div class="form-group row">
							<label class="control-label col-md-3" for="firstname">First Name<span style="color:red;">*</span></label>
							<div class="controls col-md-7">
								<input <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="firstname" name="user[firstname]" placeholder="" class="form-control" value="<?php if(isset($this->record['firstname'])) echo $this->record['firstname']; ?>">
								<?php if( isset($this->errors['firstname'])) { ?>
									<p class="text-danger"><?=$this->errors['firstname']; ?></p>
								<?php } ?>
							</div>
						</div>

						<div class="form-group row">
							<label class="control-label col-md-3" for="lastname">Last Name<span style="color:red;">*</span></label>
							<div class="controls col-md-7">
								<input <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="lastname" name="user[lastname]" placeholder="" class="form-control" value="<?php if(isset($this->record['lastname'])) echo($this->record['lastname']); ?>">
								<?php if( isset($this->errors['lastname'])) { ?>
									<p class="text-danger"><?=$this->errors['lastname']; ?></p>
								<?php } ?>
							</div>
						</div>
					
						<div class="form-group row">
							<label class="control-label col-md-3" for="phone">Phone<span style="color:red;">*</span></label>
							<div class="controls col-md-7">
								<input <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="phone" name="user[phone]" placeholder="" class="form-control" value="<?php if(isset($this->record['phone']) && $this->record['phone'] != '') echo($this->record['phone']);else if(isset($this->cv_user) ) echo $this->cv_user['phone'];else if(isset($this->company)) echo $this->company['phone']; ?>">
								<?php if( isset($this->errors['phone'])) { ?>
									<p class="text-danger"><?=$this->errors['phone']; ?></p>
								<?php } ?>
							</div>
						</div>
					
						<div class="form-group row">
							<label class="control-label col-md-3" for="email">E-mail<span style="color:red;">*</span></label>
							<div class="controls col-md-7">
								<input <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="email" name="user[email]" placeholder="" class="form-control" value="<?php if(isset($this->record['email'])) echo($this->record['email']); ?>">
								<?php if( isset($this->errors['email'])) { ?>
									<p class="text-danger"><?=$this->errors['email']; ?></p>
								<?php } ?>
							</div>
						</div>
					<?php if($app['act'] !='view'){ ?>
						<div class="form-group row">
							<label class="control-label col-md-3" for="password">Password<span style="color:red;">*</span></label>
							<div class="controls col-md-7">
								<input type="password" id="password" name="user[password]" placeholder="" class="form-control">
								<?php if( isset($this->errors['password'])) { ?>
									<p class="text-danger"><?=$this->errors['password']; ?></p>
								<?php } ?>
							</div>
						</div>
					
						<div class="form-group row">
							<label class="control-label col-md-3"  for="password_confirm">Password (Confirm)<span style="color:red;">*</span></label>
							<div class="controls col-md-7">
								<input type="password" id="password_confirm" name="user[password_confirm]" placeholder="" class="form-control">
									<p class="text-danger"></p>
								<?php if( isset($this->errors['password_confirm'])) { ?>
									<p class="text-danger"><?=$this->errors['password_confirm']; ?></p>
								<?php } ?>
							</div>
						</div>
					<?php } ?>

						<div class="form-group row">
							<!-- Avatar -->
							<label class="control-label col-md-3" for="avata">Avata</label>
							<div class="controls col-md-7">
							<?php if($app['act'] !='add'){ ?>
								<?php //if(isset($this->record['avata'])) { ?>
				  <img src="<?php 
				  	//aws
                    // if(preg_match('/https{0,1}:\/\/.*/', $this->record['avata'])){
                    //   echo $this->record['avata'];
                    // }else{
					//   echo vendor_app_util::getUrlAws($this->record['avata'], $app['ctl']); 
					//} 
					echo RootREL."media/upload/users/".(!empty($this->record['avata'])? $this->record['avata']: 'no_image.png');
					?>" width="200px">
								<?php //} ?>
							<?php } ?>
							<?php if($app['act'] !='view'){ ?>
								<input type="file" id="avata" name="image" placeholder="" class="form-control">
							<?php } ?>
							<?php if( isset($this->errors['avata'])) { ?>
								<p class="text-danger"><?=$this->errors['avata']; ?></p>
							<?php } ?>
							<div id = "imageDisplayjs">
								<img id='output' width="100%" height="100%"/>
							</div>
							</div>
							
						</div>

						<div class="form-group row">
							<label class="control-label col-md-3" for="role">Role</label>
							<div class="controls col-md-7">
								<?php if($app['act'] !='view'){ ?>
									<select name="user[role]" id="input-role" class="form-control">
										<?php foreach ($app['roles'] as $k => $v) { ?>
									<option value="<?=$k;?>" <?=(isset($this->record['role']) && $this->record['role']==$k)? 'selected="selected"':'';?>><?=$v;?></option>
								<?php } ?>
							</select>
						<?php } else { ?>
							<input disabled type="text" id="role" name="user[role]"  class="form-control" value="<?php if(isset($this->record['role'])) echo $app['roles'][$this->record['role']]; ?>">
						<?php } ?>
								<?php if( isset($this->errors['role'])) { ?>
									<p class="text-danger"><?=$this->errors['role']; ?></p>
								<?php } ?>
							</div>
						</div>

						<div class="form-group row">
							<label class="control-label col-md-3" for="status">Status</label>
							<div class="controls col-md-7">
								<?php if($app['act'] !='view'){ ?>
									<select name="user[status]" id="input-status" class="form-control">
										<?php foreach (user_model::$status as $k => $v) { ?>
									<option value="<?=$k;?>" <?=(isset($this->record['status']) && $this->record['status']==$k)? 'selected="selected"':'';?>><?=$v;?></option>
								<?php } ?>
							</select>
						<?php } else { ?>
							<input disabled type="text" id="status" name="user[status]"  class="form-control" value="<?php if(isset($this->record['status'])) echo user_model::$status[$this->record['status']]; ?>">
						<?php } ?>
								<?php if( isset($this->errors['status'])) { ?>
									<p class="text-danger"><?=$this->errors['status']; ?></p>
								<?php } ?>
							</div>
						</div>
						

						<?php if($app['act'] !='view'){ ?>
							<div class="form-group row">
								<div class="controls " style="margin: 10px auto;display: table">
									<input class="btn btn-success pull-right" type="submit" name="btn_submit" value="<?php echo ucfirst($app['act']) ?>">
								</div>
							</div>
						<?php } ?>
				<?php if($app['act'] != 'view') { ?>
					</form>
				<?php } ?>

				<?php if($app['act'] === 'view') { ?>
					<hr>
					
				<?php } ?>
		</fieldset>
		</div>
</div>
</div>
</section>