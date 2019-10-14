  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <p><img src="<?php echo RootREL; ?>media/img/logods.png" alt="" style="margin: 5px auto;display: table;"></p>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="active">
          <a href="<?=vendor_app_util::url(array('ctl'=>'dashboard')); ?>">
            <i class="icon-home"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview <?=($app['ctl']=='products')? 'active menu-open':'';?>">
          <a href="#">
            <i class="icon-organization"></i> <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?=($app['ctl']=='products')? 'class="active"':'';?>>
              <a href="<?=vendor_app_util::url(array('ctl'=>'products', 'act'=>'index')); ?>">
              <i class="fas fa-align-left"></i> Show all Product
              </a>
            </li>
            <li <?=($app['ctl']=='products')? 'class="active"':'';?>>
              <a href="<?=vendor_app_util::url(array('ctl'=>'products', 'act'=>'add')); ?>">
                <i class="fas fa-plus"></i> Add a Product
              </a>
            </li>
          </ul>
        </li>
        <li class="treeview <?=($app['ctl']=='orders')? 'active menu-open':'';?>">
          <a href="#">
          <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> <span>Order</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?=($app['ctl']=='orders')? 'class="active"':'';?>>
              <a href="<?=vendor_app_util::url(array('ctl'=>'orders', 'act'=>'index')); ?>">
              <i class="fas fa-align-left"></i> Show all Order
              </a>
            </li>
            <li <?=($app['ctl']=='orders')? 'class="active"':'';?>>
              <a href="<?=vendor_app_util::url(array('ctl'=>'orders', 'act'=>'add')); ?>">
                <i class="fas fa-plus"></i> Add a Order
              </a>
            </li>
          </ul>
        </li>
        <li class="treeview <?=($app['ctl']=='managers')? 'active menu-open':'';?>">
          <a href="#">
            <i class="icon-equalizer"></i> <span>Account</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?=($app['ctl']=='managers')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'managers', 'act'=>'profile')); ?>"><i class="fas fa-user-circle"></i> Profile</a></li>
            <li><a href="<?php echo vendor_app_util::url(['area'=> 0, 'ctl'=>'login','act'=>'logout']); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
          </ul>
        </li>  
      </ul>
    </section>
  </aside>
  