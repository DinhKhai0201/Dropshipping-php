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
        <li class="treeview <?=($app['ctl']=='users')? 'active menu-open':'';?>">
          <a href="#">
            <i class="icon-people"></i>
            <span>Users management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?=($app['ctl']=='users' && $app['act']=='index')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'users')); ?>"><i class="fas fa-user-circle"></i> List Users</a></li>
            <li <?=($app['ctl']=='users' && $app['act']=='add')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'users', 'act'=>'add')); ?>"><i class="fas fa-user-plus"></i> Add User</a></li>
          </ul>
        </li>
        <li class="treeview <?=($app['ctl']=='static_pages')? 'active menu-open':'';?>">
          <a href="#">
            <i class="fas fa-info-circle"></i>
            <span>Static page</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?=($app['ctl']=='static_pages' && $app['act']=='index')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'static_pages', 'act'=>'index')); ?>"><i class="fas fa-info"></i> List page</a></li>
          </ul>
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
        <li class="treeview <?=($app['ctl']=='coupons')? 'active menu-open':'';?>">
          <a href="#">
          <i class="fa fa-check-square-o" aria-hidden="true"></i> <span>Coupons</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?=($app['ctl']=='coupons')? 'class="active"':'';?>>
              <a href="<?=vendor_app_util::url(array('ctl'=>'coupons', 'act'=>'index')); ?>">
              <i class="fas fa-align-left"></i> Show all Coupons
              </a>
            </li>
            <li <?=($app['ctl']=='coupons')? 'class="active"':'';?>>
              <a href="<?=vendor_app_util::url(array('ctl'=>'coupons', 'act'=>'add')); ?>">
                <i class="fas fa-plus"></i> Add a Coupons
              </a>
            </li>
          </ul>
        </li>
        <li class="treeview <?=($app['ctl']=='categories')? 'active menu-open':'';?>">
          <a href="#">
            <i class="fas fa-filter"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?=($app['ctl']=='categories')? 'class="active"':'';?>>
              <a href="<?=vendor_app_util::url(array('ctl'=>'categories', 'act'=>'index')); ?>">
                <i class="fas fa-align-left"></i> Show all
              </a>
              <!-- <a href="<?=vendor_app_util::url(array('ctl'=>'categories', 'act'=>'add')); ?>">
                <i class="fas fa-plus"></i> Add category
              </a> -->
            </li>
          </ul>
        </li>
        
        <!-- <li class="treeview <?=($app['ctl']=='ads')? 'active menu-open':'';?>">
          <a href="#">
          <i class="fab fa-adversal"></i> <span>Advertisement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?=($app['ctl']=='ads')? 'class="active"':'';?>>
              <a href="<?=vendor_app_util::url(array('ctl'=>'ads', 'act'=>'index')); ?>">
                <i class="fas fa-align-left"></i> Show all
              </a>
              <a href="<?=vendor_app_util::url(array('ctl'=>'ads', 'act'=>'add')); ?>">
                <i class="fas fa-plus"></i> Add advertisement
              </a>
            </li>
          </ul>
        </li> -->

        <li class="treeview <?=($app['ctl']=='users')? 'active menu-open':'';?>">
          <a href="#">
            <i class="icon-equalizer"></i> <span>Account</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?=($app['ctl']=='users')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'users', 'act'=>'profile')); ?>"><i class="fas fa-user-circle"></i> Profile</a></li>
            <li><a href="<?php echo vendor_app_util::url(['area'=> 0, 'ctl'=>'login','act'=>'logout']); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
          </ul>
        </li>  
      </ul>
    </section>
  </aside>
  