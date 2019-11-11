<?php global $app; ?>
<div class="block-title">
	<strong><span>Menu</span></strong>
</div>
<div class="block-content">
	<ul>
		<!-- class="current" -->
		<li><a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'account', 'act' => 'index')); ?>">Account Dashboard</a></li>
		<li><a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'order')); ?>">My
				Orders</a></li>
		<li><a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'wishlist')); ?>">My
				Wishlist</a></li>
		<li><a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'checkout')); ?>">Check Out</a></li>
	</ul>
</div>