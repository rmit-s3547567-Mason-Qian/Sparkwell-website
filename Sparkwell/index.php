<?php
	include_once 'header.php'
;?>

<section class="main-container">
	<div class="main-wrapper">	
		<h2>Sparkwell update 3.0</h2>
		<?php
			if (isset($_SESSION['u_id'])) {
				echo "You are logged in, ";
				echo $_SESSION['u_first'];
			}
		?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
