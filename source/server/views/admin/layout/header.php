 <?php if(isset($_SESSION['user']) && !($_SESSION['user']['role']=='2' || $_SESSION['user']['role'] == '3' )) { ?>
  <header class="main-header">
    
    <a href="<?php echo vendor_app_util::url(['ctl'=>'dashboard']); ?>" class="logo">
	  <b class="logo-mini"></b>
    <span class="logo-lg">Drop Shipping</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <i class="fas fa-bars"></i>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Hi <?=user_model::getFullnameLogined();?>
            </a>
            <ul class="dropdown-menu scale-up">
              <li class="user-header">
                  <?=user_model::getFullnameLogined();?>
                  <small class="mb-5"><?=isset($_SESSION['user'])?$_SESSION['user']['email']:'';?></small><br/><br/>
                  <a href="<?php echo vendor_app_util::url(array('ctl'=>'users', 'act'=>'profile')); ?>" class="btn btn-danger btn-sm btn-rounded">View Profile</a>
              </li>
              
              <li class="user-footer">
                <div class="pull-right">
                    <a href="<?php echo vendor_app_util::url(['ctl'=>'login','act'=>'logout']); ?>" class="btn btn-default btn-flat"><i class="ti-face-smile"></i> Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-cog fa-spin"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
 <?php } ?>