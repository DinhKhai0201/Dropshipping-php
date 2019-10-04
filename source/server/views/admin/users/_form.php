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
					<div id="legend">
						<?php if($this->record['role'] == 2) {?>
							<legend class="">List order</legend>
							<div class="box-body">
								<div id="table_wrapper" class="dataTables_wrapper form-inline dt-boostrap">
									<div class="col-sm-12">
										<div class="table-responsive" style='overflow-x:scroll'>
											<table  controller="users" class="table table-bordered table-striped no-margin dataTable" style="text-align:center; width:100%;min-width:800px;">
												<thead>
													<tr role="row">
														<th>STT</th>
														<th >Công việc</th>
														<th >Action</th>
													</tr>
												</thead>
												<tbody id="tbody-users" class="records">
												<?php if(count($this->records['data'])) { ?>
													<?php $i=1+($this->records['curp']-1)*$this->records['nopp']; foreach ($this->records['data'] as $record) { ?>
													<tr role="row" id="row<?=$record['id'];?>">

														<td id="<?php echo("fullname".$record['id']);?>">
															<a href="<?php echo (vendor_app_util::url(["ctl"=>"users", "act"=>"view/".$record['id']])) ?>" id="viewUser<?=$record['id'];?>">
															<?php echo $i++; ?>	
															</a>	
														</td>

														<td class="tabletShow" id="<?php echo("status".$record['id']);?>">
															<?php echo $record['title']; ?>
														</td>

													
														<td  class="btn-act" class="pull-right">
														<a href="<?php echo (vendor_app_util::url(["ctl"=>"jobs", "act"=>"view/".$record['id']])) ?>" id="<?php echo("edit".$record['id']);?>" >
															<button data-placement="top" title="View" type="button" class="btn btn-primary" alt=""><i class="fa fa-view"></i> View</button>
														</a>
														
														</td>

													</tr>
													<?php } ?>
												<?php } else { ?>
													<tr role="row"><td colspan="8"><h3 class="text-danger text-center"> No data </h3></td></tr>
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
						<?php } if($this->record['role'] == 3) { ?> 
							<legend class="">List supplier</legend>
							<div class="row" style="padding-top: 15px; padding-bottom: 15px;">
								<?php if(count($this->cvs)) {?>
					        <?php foreach($this->cvs as $cv) {?>
					        <div class="col-md-6 mb-10">

					            <div class="grid-content cv-background pl-10 pr-10" itemprop="JobPosting" itemscope>
					                <div class="job-item featured-item" style="border-bottom: none;">
					                    <div class="job-image">
					                        <div class="img-avatar thumbnail">
					                            <a href="<?php echo RootREL . 'cv/export_cv/' . $cv['cv_user_id']; ?>" target="_blank">
					                              <img alt="cv" src="<?php echo vendor_app_util::getUrlAws($cv['avatar'], 'cv'); ?>"/>
					                            </a>
					                        </div>
					                    </div>
					                    <div class="job-content-wrap">
					                        <div class="job-info yes-logo">
					                            <h3 class="job-title" itemprop="title">
					                                <a href="<?php echo RootREL . 'cv/export_cv/' . $cv['cv_user_id']; ?>" target="_blank"><?php echo $cv['profile_title']; ?></a>
					                            </h3>
					                            <div class="info-company">
					                                <div class="time-ago">
					                                    <i class="fa fa-calendar theme-color"></i>
					                                    <span itemprop="datePosted">Ngày cập nhật: <?php echo date_format(date_create($cv['updated']), 'd-m-Y'); ?></span>
					                                </div>
					                                <div class="time-ago">
					                                    <i class="fa fa-download theme-color"></i>
					                                    <a href="<?php echo RootREL . 'cv/export_cv/' . $cv['cv_user_id']; ?>" target="_blank">Tải CV</a>
					                                </div>
					                            </div>
					                        </div>
					                    </div>
					                </div>
					            </div>
					        </div>
					        <?php }?>
					      <?php }else {?>
					      	<h5 style="text-align: center; width: 100%">No Data!</h5>
					      <?php }?>
					    </div>
						<?php } ?>
					</div>
				<?php } ?>
		</fieldset>
		</div>
</div>
</div>
</section>