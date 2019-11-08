<?php global $app; ?>
<div class="block-title">
	<strong><span>My Account</span></strong>
</div>
<div class="block-content">
	<ul>
		<!-- class="current" -->
		<li><a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'account', 'act' => 'index')); ?>">Account Dashboard</a></li>
		<!-- <li><a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'account', 'act' => 'edit')); ?>">Account
				Information</a></li>
		<li><a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'account', 'act' =>'address')); ?>">Address
				Book</a></li> -->
		<li><a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'order')); ?>">My
				Orders</a></li>
		<li><a href="https://www.portotheme.com/magento/porto/index.php/demo4_en/sales/billing_agreement/">Billing
				Agreements</a></li>
		<li><a href="https://www.portotheme.com/magento/porto/index.php/demo4_en/sales/recurring_profile/">Recurring
				Profiles</a></li>
		<li><a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'myreview')); ?>">My
				Product Reviews</a></li>
		<li><a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'tag')); ?>">My
				Tags</a></li>
		<li><a href="<?php echo vendor_app_util::url(array('area' => 'customer', 'ctl' => 'wishlist')); ?>">My
				Wishlist</a></li>
		<li><a href="http://www.portotheme.com/magento/porto/index.php/demo4_en/oauth/customer_token/">My
				Applications</a></li>
		<li><a href="https://www.portotheme.com/magento/porto/index.php/demo4_en/newsletter/manage/">Newsletter
				Subscriptions</a></li>
		<li class="last"><a href="https://www.portotheme.com/magento/porto/index.php/demo4_en/downloadable/customer/products/">My
				Downloadable Products</a></li>
	</ul>
</div>