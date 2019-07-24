<?php

	function adminsidebar()
	{
		?>
		<div class="bg-light border-right" id="sidebar-wrapper">
			<div class="list-group list-group-flush">
				<a href="/BikeLabs/pages/admin/admindash.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
				<a href="/BikeLabs/pages/admin/admin-jobs.php" class="list-group-item list-group-item-action bg-light">Pending Jobs</a>
				<a href="/BikeLabs/pages/admin/admin-orders.php" class="list-group-item list-group-item-action bg-light">Pending Orders</a>
				<a href="/BikeLabs/pages/admin/admin-vendor.php" class="list-group-item list-group-item-action bg-light">Vendor management</a>
				<a href="/BikeLabs/pages/admin/admin-sales.php" class="list-group-item list-group-item-action bg-light">Sales</a>
				<a href="/BikeLabs/pages/admin/admin-bikes.php" class="list-group-item list-group-item-action bg-light">Add new Bikes</a>
				<a href="/BikeLabs/pages/admin/admin-parts.php" class="list-group-item list-group-item-action bg-light">Add new Parts</a>
				<a href="/BikeLabs/pages/admin/admin-bike-parts.php" class="list-group-item list-group-item-action bg-light">Bikes/Parts Posted</a>
				<a href="/BikeLabs/pages/admin/admin-modaltpkg.php" class="list-group-item list-group-item-action bg-light">Edit Mod/Alt packages</a>
			</div>
		</div>
		<?php
	}
	function vendorsidebar()
	{
		?>
		<div class="bg-light border-right" id="sidebar-wrapper">
			<div class="list-group list-group-flush">
				<a href="/BikeLabs/pages/vendor/vendordash.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
				<a href="/BikeLabs/pages/vendor/vendor-orders.php" class="list-group-item list-group-item-action bg-light">Pending Orders</a>
				<a href="/BikeLabs/pages/vendor/vendor-modalt.php" class="list-group-item list-group-item-action bg-light">Pending Mod/Alt Orders</a>
				<a href="/BikeLabs/pages/vendor/vendor-modaltprocessed.php" class="list-group-item list-group-item-action bg-light">Processed Mod/Alt Orders</a>
				<a href="/BikeLabs/pages/vendor/vendor-sales.php" class="list-group-item list-group-item-action bg-light">Sales</a>
				<a href="/BikeLabs/pages/vendor/vendor-bikes.php" class="list-group-item list-group-item-action bg-light">Add new Bikes</a>
				<a href="/BikeLabs/pages/vendor/vendor-parts.php" class="list-group-item list-group-item-action bg-light">Add new Parts</a>
				<a href="/BikeLabs/pages/vendor/vendor-modaltpkg.php" class="list-group-item list-group-item-action bg-light">View Mod/Alt packages</a>
			</div>
		</div>
		<?php
	}
	function usersidebar()
	{
		?>
		<div class="bg-light border-right" id="sidebar-wrapper">
			<div class="list-group list-group-flush">
				<a href="/BikeLabs/pages/user/userdash.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
				<a href="/BikeLabs/pages/user/user-ads.php" class="list-group-item list-group-item-action bg-light">Posted Adverts.</a>
				<a href="/BikeLabs/pages/user/user-purchases.php" class="list-group-item list-group-item-action bg-light">Past Purchases</a>
				<a href="/BikeLabs/pages/user/user-pending-orders.php" class="list-group-item list-group-item-action bg-light">Pending Orders</a>
			</div>
		</div>
		<?php
	}