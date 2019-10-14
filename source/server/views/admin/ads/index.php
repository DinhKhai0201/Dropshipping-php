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

<?php vendor_html_helper::contentheader('Advertisements <small>management</small>', [['urlp'=>['ctl'=>$app['ctl'], 'act'=>$app['act']]]]); ?>

<br />
<section class="content-header">
	<div class="row">
		<div class="col-xs-12 col-lg-12">
			<div class="row" id="records-header">
				<div class="col-sm-8 col-xs-6">
				<h2 class="box-title">Advertisements</h2>
				</div>
				<div class="col-sm-4 col-xs-6">
					<button id="delete-records" class="btn btn-danger pull-right ml-1 mb-1" data-toggle="tooltip" data-placement="top" title="Delete ads">
						<i class="fa fa-remove"></i>
					</button>
					<a href="<?php echo vendor_app_util::url(['ctl'=>'ads','act'=>'add']); ?>" id="add-record">
						<button class="btn btn-primary pull-right ml-1 mb-1" data-toggle="tooltip" data-placement="top" title="Add ad">
						<i class="fa fa-plus"></i>
						</button>
					</a>	
				</div>
				<div class="col-sm-8 col-xs-6">
					<ul class="list-inline list_all">
						<li>
							<select id="select_list_ads_status">
								<option value="all" <?php if(isset($app['prs']['status']) && $app['prs']['status']=='all') echo 'selected' ?>>All status</option>
								<option value="active" <?php if(isset($app['prs']['status']) && $app['prs']['status']=='active') echo 'selected' ?>>Active</option>
								<option value="disable" <?php if(isset($app['prs']['status']) && $app['prs']['status']=='disable') echo 'selected' ?>>Disable</option>
							</select>
							<select id="select_list_ads_page" class="select-page">
								<option value="all" <?php if(isset($app['prs']['page']) && $app['prs']['page']=='all') echo 'selected' ?>>All page</option>
								<?php global $app; foreach($app['ads'] as $key => $value){ ?>
									<option value="<?=$key?>" <?php if(isset($app['prs']['page']) && $app['prs']['page']==$key) echo 'selected' ?>><?=$value['name']?></option>
								<?php } ?>
							</select>
							<select id="select_list_ads_position" class="select-page-select">
								<option value="all">All position</option>
								<?php global $app; foreach($app['ads'][1]['position'] as $key => $value){ ?>
									<option value="<?=$key?>" <?php if(isset($app['prs']['position']) && $app['prs']['position']==$key) echo 'selected' ?>><?=$value?></option>
								<?php } ?>
							</select>
							
							<button class="btn btn-apply" id='btn_filter_ads_table'>Filter</button></li>
						</li>
					</ul>
				</div>

				<div class="col-sm-4 col-xs-6">
					<div id="example_filter" class="dataTables_filter text-right">
						<form id="form-ads-search">
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
					<table  controller="ads" class="table table-bordered table-striped no-margin dataTable" style="text-align:center; width:100%;min-width:800px;">
						<thead>
							<tr role="row">
								<th id="checAllTop" class="checkAll" style="width: 10px;">
									<input type="checkbox" name="" id="cb-all-ad" style="display:none;">
									<label for="cb-all-ad"></label>
								</th>
								<th style="width: 20px;">No. </th>
								<th style="width: 170px;">Title</th>
								<th class="tabletShow" style="width: 260px;">Description</th>
								<th class="tabletShow" style="width: 80px;">Page</th>
								<th class="tabletShow" style="width: 70px;">Position</th>
								<th style="width: 170px;">Action</th>
							</tr>
						</thead>
						<tbody id="tbody-ads" class="records">
						<?php if(count($this->records['data'])) { ?>
							<?php $i=1+($this->records['curp']-1)*$this->records['nopp']; foreach ($this->records['data'] as $record) { ?>
							<tr role="row" id="row<?=$record['id'];?>">

								<td id="<?php echo("checkbox".$record['id']);?>" class="checkboxRecord">
									<input type="checkbox" name="" alt="<?=$record['id'];?>" id="cb-ad-<?=$record['id'];?>" class='cb-user'>
									<label for="cb-ad-<?=$record['id'];?>"></label>
								</td>

								<td id="<?php echo("fullname".$record['id']);?>">
                                    <a href="<?php echo (vendor_app_util::url(["ctl"=>"ads", "act"=>"view/".$record['id']])) ?>" id="viewad<?=$record['id'];?>">
                                        <?php echo $i++; ?>	
                                    </a>	
								</td>
								<td id="<?php echo("id".$record['id']);?>">
								<a href="<?php echo (vendor_app_util::url(["ctl"=>"ads", "act"=>"view/".$record['id']]));?>" id="viewad<?=$record['id'];?>">
									<?=$record['title']; ?>	
								</a>	
								</td>
                                <td class="tabletShow" id="<?php echo("description".$record['id']);?>">
									<?php global $app; echo $record['description'];
									
									?> 
								</td>
						
								<td class="tabletShow" id="<?php echo("page".$record['id']);?>">
									<?php global $app; echo $app['ads'][$record['page']]['name']; 
									
									?> 
								</td>

								<td class="tabletShow" id="<?php echo("position".$record['id']);?>">
                                    <?php global $app; echo $app['ads'][$record['page']]['position'][$record['position']]; ?> 
								</td>

								<td  class="btn-act" class="pull-right">
								<a href="<?php echo (vendor_app_util::url(["ctl"=>"ads", "act"=>"edit/".$record['id']])) ?>" id="<?php echo("edit".$record['id']);?>" >
									<button data-placement="top" title="Edit ad" type="button" class="btn btn-primary edit-record" alt="<?php echo $record['id']; ?>"><i class="fa fa-edit"></i></button>
								</a>

								<button data-placement="right" title="Delete ad" id="del<?php echo $record['id']; ?>" type="button" class="btn btn-danger del-record" alt="<?php echo $record['id']; ?>"><i class="fa fa-remove"></i></button>
								
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
<?php include_once 'views/admin/layout/'.$this->layout.'footer.php'; ?>
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
		if(e.target.value === 'all'){
			let html = '<option value="all">All position</option>';
			$('.select-page-select').html(html);
		}else{
			url = rootUrl+"admin/ads/getpage?id="+e.target.value;
			$.ajax({
				url: url,
				dataType: "json",
				type: 'POST',
				success: function (data) {
					let html = '<option value="all">All position</option>';
					Object.keys(data.data.position).map(item=>{
						html += `<option value="${item}">${data.data.position[item]}</option>`
					})
					$('.select-page-select').html(html);

				}
			})
		}
	})

</script>