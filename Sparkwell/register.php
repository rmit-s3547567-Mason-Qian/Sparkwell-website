<?php
	include_once 'header.php'
;?>

<section class="main-container">
	<div class="main-wrapper">	
		<h2>Register</h2>
		<?php
			if (isset($_GET['register']) == "success") {
				echo 'Thank you for registering!';
			} else {
				echo '<form class="register-form" action="includes/register.inc.php" method="POST">
				<input type="text" name="serial"  placeholder="Serial Number">
				<input type="text" name="first"  placeholder="Firstname">
				<input type="text" name="last"  placeholder="Lastname">
				<input type="text" name="email"  placeholder="E-mail">
				<input type="text" name="uname"  placeholder="Username">
				<input type="password" name="pword"  placeholder="Password">
				<button type="submit" name="submit">Register</button>
				</form>';
			}
		?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
