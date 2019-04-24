<?php
session_start();
include '../../includes/restrictions.inc.php';
admin_protect();
include '../../includes/header.php';
?>
<!-- Sidebar -->
<section class="content">
	<div class="d-flex" id="wrapper">
		<div class="bg-light border-right" id="sidebar-wrapper">
			<div class="list-group list-group-flush">
				<button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
				<a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
				<a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>
				<a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
				<a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
				<a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
				<a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
			</div>
		</div>
	</div>
</section>
<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
<?php
include_once '../../includes/footer.php';
?>