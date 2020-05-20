<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet/header.css">
</head>
<body>

<header>
	<nav class="nav">
		<a href="#" >
			<img class="logo" src="pic/logo.png" alt="logo">
		</a>
		<ul class="links">
			<li><a href="#">Home</a></li>
			<li><a href="#">Portfolio</a></li>
			<li><a href="#">Content</a></li>
			<li><a href="#">About</a></li>
		</ul>

			<?php 
				if (isset($_SESSION['userId'])) {

					echo '<div>
			 	<form class="sbm2" action="include/logout.inc.php">
			 		<input type="submit" name="logout" value="Logout">
			 	</form>
			 </div>';
					
				}
				else
				{
					echo '<div class="login_input">
			<form action="include/login.inc.php" method="Post">
			<input type="text" name="userid" placeholder="userid">
			<input type="password" name="password" placeholder="password">	
			<input type="submit" name="login-submit" value="Login">
			</form>
			</div>
		<div>
			<form class="sbm2" action="signup.php" method="Post">
			<input type="submit" name="signup-submit" value="Signup">
			</form>
		</div>';
				}


			 ?>
			 
			
		
	</nav>
</header>

</body>
</html>