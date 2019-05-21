<?php
include_once '../../../includes/header.php';
?>

<section id="postad" class="section postadsection content">
	<div class="container">
		<?php
		$bike1 = $_GET['bike1'];
		$bike2 = $_GET['bike2'];
		// print_r($_SESSION['bikespecs']);
		foreach($_SESSION['bikespecs'] as $bike1 => $item)
		{?>
			<p><?php echo $item['eng_type']; ?></p>	
			<p><?php echo $item['bore_str']; ?></p>	
			<p><?php echo $item['trans']; ?></p>	
			<p><?php echo $item['starting']; ?></p>	
			<p><?php echo $item['frame']; ?></p>	
			<p><?php echo $item['dimensions']; ?></p>	
			<p><?php echo $item['petrol_cap']; ?></p>	
			<p><?php echo $item['f_tyre']; ?></p>	
			<p><?php echo $item['b_tyre']; ?></p>	
			<p><?php echo $item['dry_weight']; ?></p>	
			<?php
			
		}
		foreach($_SESSION['bikespecs'] as $bike2 => $item)
		{?>
			<p><?php echo $item['eng_type']; ?></p>	
			<p><?php echo $item['bore_str']; ?></p>	
			<p><?php echo $item['trans']; ?></p>	
			<p><?php echo $item['starting']; ?></p>	
			<p><?php echo $item['frame']; ?></p>	
			<p><?php echo $item['dimensions']; ?></p>	
			<p><?php echo $item['petrol_cap']; ?></p>	
			<p><?php echo $item['f_tyre']; ?></p>	
			<p><?php echo $item['b_tyre']; ?></p>	
			<p><?php echo $item['dry_weight']; ?></p>	
			<?php
			unset($_SESSION['bikespecs']);
		}
		?>

	</div>
</section>

<?php
include '../../../includes/footer.php';
?>