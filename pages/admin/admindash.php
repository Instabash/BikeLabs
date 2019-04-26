<?php
session_start();
include '../../includes/restrictions.inc.php';
admin_protect();
include '../../includes/header.php';
?>
<!-- Sidebar -->

<div class="d-flex" id="wrapper">
	<div class="bg-light border-right" id="sidebar-wrapper">
		<div class="list-group list-group-flush">
			<a href="/BikeLabs/pages/admin/admindash.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
			<a href="/BikeLabs/pages/admin/.php#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>
			<a href="/BikeLabs/pages/admin/.php#" class="list-group-item list-group-item-action bg-light">Overview</a>
			<a href="/BikeLabs/pages/admin/.php#" class="list-group-item list-group-item-action bg-light">Events</a>
			<a href="/BikeLabs/pages/admin/.php#" class="list-group-item list-group-item-action bg-light">Profile</a>
			<a href="/BikeLabs/pages/admin/.php#" class="list-group-item list-group-item-action bg-light">Status</a>
		</div>
	</div>
	<section id="modify" class="section modsection content">
		<div class="container">
			<p>sggs</p>
		</div>
	</section>
</div>

<script>
	$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
	});
</script>
<?php
include_once '../../includes/footer.php';
?>