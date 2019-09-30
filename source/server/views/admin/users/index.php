<?php include_once 'views/admin/layout/'.$this->layout.'top.php'; ?>
<link rel="stylesheet" href="<?php echo RootREL; ?>media/libs/bootstrap/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo RootREL; ?>media/libs/bootstrap/css/checkbox-x.min.css">
<link rel="stylesheet" href="<?php echo RootREL; ?>media/admin/css/table.css">
<?php 
global $app;
if(isset($app['prs']['status'])) {
	if($app['prs']['status'])
		$checkboxVal = 1;
	else
		$checkboxVal = NULL;
} else 	$checkboxVal = 0;
?>
<script type="text/javascript">	
	var norecords 	= parseInt(<?php echo $this->records['norecords']; ?>);
	var nocurp 		= parseInt(<?php echo $this->records['nocurp']; ?>);
	var curp 		= parseInt(<?php echo $this->records['curp']; ?>);
	var nopp 		= parseInt(<?php echo $this->records['nopp']; ?>);

	var getDisable  = <?=(isset($app['prs']['status']) && ($app['prs']['status']==='0'))? 1:0;?>
</script>

<?php vendor_html_helper::contentheader('Users <small>management</small>', [['urlp'=>['ctl'=>$app['ctl'], 'act'=>$app['act']]]]); ?>

<br />
<section class="content-header">
	<div class="row">
		<div class="col-xs-12 col-lg-12">
			<div class="row" id="records-header">
				<div class="col-sm-8 col-xs-6">
				<h2 class="box-title">Users</h2>
				</div>
				<div class="col-sm-4 col-xs-6">
					
					<button id="delete-records" class="btn btn-danger pull-right ml-1 mb-1" data-toggle="tooltip" data-placement="top" title="Delete users">
						<i class="fa fa-remove"></i>
					</button>
					<a href="<?php echo vendor_app_util::url(['ctl'=>'users','act'=>'add']); ?>" id="add-record">
						<button class="btn btn-primary pull-right ml-1 mb-1" data-toggle="tooltip" data-placement="top" title="Add user">
						<i class="fa fa-plus"></i>
						</button>
					</a>	
					<button id="export-records" class="btn btn-danger pull-right ml-1 mb-1" data-toggle="tooltip" data-placement="top" title="Delete users">
						<i class="fa fa-download"></i>
					</button>
				</div>
				<div class="col-sm-8 col-xs-6">
					<ul class="list-inline list_all">
						<li>
							<select id="select_list_users_status">
								<option value="all" <?php if(isset($app['prs']['status']) && $app['prs']['status']=='all') echo 'selected' ?>>All status</option>
								<option value="active" <?php if(isset($app['prs']['status']) && $app['prs']['status']=='active') echo 'selected' ?>>Active</option>
								<option value="disable" <?php if(isset($app['prs']['status']) && $app['prs']['status']=='disable') echo 'selected' ?>>Disable</option>
							</select>
							<select id="select_list_users_type">
								<option value="all" <?php if(isset($app['prs']['type']) && $app['prs']['type']=='all') echo 'selected' ?>>All</option>
								<option value="admin" <?php if(isset($app['prs']['type']) && $app['prs']['type']=='admin') echo 'selected' ?>>Admin</option>
								<option value="customer" <?php if(isset($app['prs']['type']) && $app['prs']['type']=='customer') echo 'selected' ?>>Customer</option>
								<option value="supplier" <?php if(isset($app['prs']['type']) && $app['prs']['type']=='suppier') echo 'selected' ?>>Supplier</option>
								<option value="shipper" <?php if(isset($app['prs']['type']) && $app['prs']['type']=='shipper') echo 'selected' ?>>Shipper</option>
								<option value="adsmanager" <?php if(isset($app['prs']['type']) && $app['prs']['type']=='adsmanager') echo 'selected' ?>>Ads manager</option>
							</select>
							<button class="btn btn-apply" id='btn_filter_users_table'>Filter</button></li>
						</li>
					</ul>
				</div>

				<div class="col-sm-4 col-xs-6">
					<div id="example_filter" class="dataTables_filter text-right">
						<form id="form-users-search">
							<label>Search:
								<input type="text" class="search" name='search' placeholder="" aria-controls="example" id='search'>
							</label>
							<button type="submit" class="btn btn-info">Submit</button>
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
					<table  controller="users" class="table table-bordered table-striped no-margin dataTable" style="text-align:center; width:100%;min-width:800px;">
						<thead>
							<tr role="row">
								<th id="checAllTop" class="checkAll" style="width: 10px;">
									<input type="checkbox" name="" id="cb-all-user" style="display:none;">
									<label for="cb-all-user"></label>
								</th>
								<th style="width: 20px;">ID</th>
								<th style="width: 250px;">Full name</th>
								<th class="tabletShow" style="width: 200px;">Email</th>
								<th class="tabletShow" style="width: 100px;">Role</th>
								<th class="tabletShow" style="width: 100px;">Status</th>
								<th style="width: 200px;">Action</th>
							</tr>
						</thead>
						<tbody id="tbody-users" class="records">
						<?php if(count($this->records['data'])) { ?>
							<?php $i=1+($this->records['curp']-1)*$this->records['nopp']; foreach ($this->records['data'] as $record) { ?>
							<tr role="row" id="row<?=$record['id'];?>">

								<td id="<?php echo("checkbox".$record['id']);?>" class="checkboxRecord">
									<input type="checkbox" name="" alt="<?=$record['id'];?>" id="cb-user-<?=$record['id'];?>" class='cb-user'>
									<label for="cb-user-<?=$record['id'];?>"></label>
								</td>

								<td id="<?php echo("fullname".$record['id']);?>">
								<a href="<?php echo (vendor_app_util::url(["ctl"=>"users", "act"=>"view/".$record['id']])) ?>" id="viewUser<?=$record['id'];?>">
									<?php echo $i++; ?>	
								</a>	
								</td>
								<td id="<?php echo("id".$record['id']);?>">
								<a href="<?php echo (vendor_app_util::url(["ctl"=>"users", "act"=>"view/".$record['id']]));?>" id="viewUserReport<?=$record['id'];?>">
									<?=$record['firstname'].' '.$record['lastname']; ?>	
								</a>	
								</td>
								<td class="tabletShow" id="<?php echo("email".$record['id']);?>">
								<?php echo $record['email']; ?> 
								</td>
						
								<td class="tabletShow" id="<?php echo("role".$record['id']);?>">
									<?php echo $app['roles'][$record['role']]; ?>
								</td>

								<td class="tabletShow" id="<?php echo("status".$record['id']);?>">
									<?php echo user_model::$status[$record['status']]; ?>
								</td>

							
								<td  class="btn-act" class="pull-right">
								<a href="<?php echo (vendor_app_util::url(["ctl"=>"users", "act"=>"edit/".$record['id']])) ?>" id="<?php echo("edit".$record['id']);?>" >
									<button data-placement="top" title="Edit user" type="button" class="btn btn-primary edit-record" alt="<?php echo $record['id']; ?>"><i class="fa fa-edit"></i></button>
								</a>

								<button data-placement="right" title="Delete user" id="del<?php echo $record['id']; ?>" type="button" class="btn btn-danger del-record" alt="<?php echo $record['id']; ?>"><i class="fa fa-remove"></i></button>
							
								<button data-placement="right" title="<?php echo ($record['status']==1)?'Deactive':'Active'; ?>" id="toggle<?php echo $record['id']; ?>" type="button" class="btn btn-normal toggle-status-record" alt="<?php echo $record['id'].'_'.$record['status']; ?>"><i class="fa fa-toggle-<?php echo ($record['status']==1)?'on':'off'; ?>"></i></button>
						
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
</section>
<br />

</div>
<script src="<?php echo RootREL; ?>media/libs/bootstrap/js/checkbox-x.min.js"></script>
<script src="<?php echo RootREL; ?>media/admin/js/records_table.js"></script>
<script src="<?php echo RootREL; ?>media/admin/js/users_table.js"></script>
<?php include_once 'views/admin/layout/'.$this->layout.'footer.php'; ?>
