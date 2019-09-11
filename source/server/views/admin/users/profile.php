<?php include_once 'views/admin/layout/'.$this->layout.'top.php'; ?>

<?php vendor_html_helper::contentheader('Users <small>management</small>', [
    [
      'title' =>  'Users',
      'urlp'=>['ctl'=>$app['ctl']]],
    [
      'title' =>  'Detail of '.$this->record['firstname']." ".$this->record['lastname'],
      'urlp'  =>  ['ctl'=>$app['ctl'], 'act'=>$app['act']]
    ]
]); ?>
<?php $id = $_SESSION['user']['id']; ?>

	<div class="row content">
		<div class="box">
			<div class="box-header">
				<div class="row" id="requests-header">
					<div class="col-sm-8 col-xs-6">
						<h2 class="box-title">Profile</h2>
					</div>

					<div class="col-sm-4 col-xs-6">
						<a href="<?php echo (vendor_app_util::url(["ctl"=>"users", "act"=>"edit/".$id])) ?>" id="<?php echo("edit".$id);?>" class=" pull-right">
							<button class="btn btn-primary" data-placement="top" title="Edit user">
								<i class="fa fa-edit"></i>
							</button>
						</a>
					</div>
				</div>
			</div>
			<!-- /.box-header -->
			
			<div class="row">
				<div class="col-md-2 col-sm-12 col-xs-12"></div>
				<div class="col-md-6 col-sm-12 col-xs-12">	   
					<div class="box-body profile-body">
						<fieldset>
							<table class="profile-table">
								<tr>
									<td class="title">Full name :</td>
									<td><?php echo $this->record['firstname']; ?> <?php echo $this->record['lastname']; ?></td>
								</tr>
								<tr>
									<td class="title">Email :</td>
									<td><?php echo $this->record['email']; ?></td>
								</tr>
								<tr>
									<td class="title">Password :</td>
									<td><input disabled type="Password" name="password" value="<?php echo $this->record['password']; ?>" ></td>
								</tr>
								<tr>
									<td class="title">Role :</td>
									<td><?php echo $app['roles'][$this->record['role']]; ?> </td>
								</tr>
								<tr>
									<td class="title">Status :</td>
									<td><?php if(isset($this->record['status'])) echo user_model::$status[$this->record['status']]; ?> </td>
								</tr>
								<tr>
									<td class="title">Phone :</td>
									<td><?php echo $this->record['phone']; ?> </td>
								</tr>
								<tr>
									<td class="title">Address :</td>
									<td><?php echo $this->record['address']; ?></td>
								</tr>

							</table>
						</fieldset>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 text-center">	
					<div class="img-profile">
						<img src="<?php echo vendor_app_util::getUrlAws($this->record['avata'], $app['ctl']); ?>">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include_once 'views/admin/layout/'.$this->layout.'footer.php'; ?>
