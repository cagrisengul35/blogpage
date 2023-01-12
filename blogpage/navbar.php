<html>
<head>

<link rel="stylesheet" href="css/navbar.css">
<script src="https://kit.fontawesome.com/c90ca88446.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Sevillana&display=swap" rel="stylesheet">
<style> @import url('https://fonts.googleapis.com/css2?family=Sevillana&display=swap'); </style>

</head>
<body>

    <div class="navbar">
			<nav >
			
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="contactform.php">Contact</a></li>

			</ul>
			

			</nav>

			<p id="title" style="position:absolute; left:50%; font-size: 20px; font-family: 'Sevillana', cursive; transform: translateX(-50%);"><i class="fa-solid fa-landmark"></i>&nbsp TravelBlog</p>

			<div class="logbuttons">
			<?php if ( !isset($_SESSION['username']) ) 
			{
				
				echo "<form action='login.php'>
					<input class='button' type='submit' value='Log In' />
				</form>";
			}
			else
			{
				require_once('logout.php');
				echo "<p style='color:white; width:100%;'> Welcome <strong>" . $_SESSION['username'] ."</strong></p>";
			}
			
			?>
			</div>	
	</div>


</body>


</html>