<?php  if (isset($_SESSION['username'])) : ?>


	<?php

	function logout() {
		session_destroy();

		header("Location: index.php");
		
	}

	if(array_key_exists('logout', $_POST)) {
		logout();
	}	

		
	?>


	<div style="display:flex;">
		
		<form method="post">
		<input id="logout-button" type="submit" name="logout" class="button" value="Log Out"/>
		</form>

	</div>

	


<?php endif ?>