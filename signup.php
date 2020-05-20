	<!doctype html>
<head>
	<title>Signup Form</title>
	<link rel="stylesheet" href="stylesheet/signup.css">
</head>
<body class="a">
	<div class="container">
		<table>
			<form action="include/signup.inc.php" method="post">
				<?php
			if (isset($_GET["error"])){
				if ($_GET["error"] == "emptyfields") {
					echo '<p class="signuperror">Fill in all fields!</p>';
				}
				elseif ($_GET["error"] == "invalidmails&uid") {
				echo '<p class="signuperror">Invalid username and e-mail!</p>';
				}
				elseif ($_GET["error"] == "invaliduid") {
				echo '<p class="signuperror">Invalid username!</p>';
				}
				elseif ($_GET["error"] == "invalidmails") {
				echo '<p class="signuperror">Invalid e-mails!</p>';
				}
				elseif ($_GET["error"] == "passwordCheck") {
				echo '<p class="signuperror">Password do not match!</p>';
				}
				elseif ($_GET["error"] == "usertaken") {
				echo '<p class="signuperror">Userid is already taken!</p>';
				}
			}
			elseif (isset($_GET["signup"] )){
                if($_GET["signup"]  == "success"){
				echo '<p class="signupsuccess">Signup successful!</p>';
			}
            }
			 ?>
				<tr>
					<td><label>Fullname:</label></td>
					<td><input type="text" name="Fullname" placeholder="Fullname"></td>
				</tr>
				<tr>
					<td><lable>Username:</label></td>
					<td><input type="text" name="Username" placeholder="Username"></td>
				</tr>
				<tr>
					<td><label>Email:</label></td>
					<td><input type="Email" name="Email" placeholder="Email"></td>
				</tr>
				<tr>
					<td><label>Password:</label></td>
					<td><input type="password" name="password" placeholder="Password"></td>
				</tr>
				<tr>
					<td><label>Re-password:</label></td>
					<td><input type="password" name="repassword" placeholder="Re-password"></td>
				</tr>	
				<tr>
					<td><label>Date of birth:</label></td>
					<td><input type="Date" name="Date"></td>	
				</tr>
				<tr>
					<td><label>Gender:</label></td>
					<td><input id="radio" type="radio" name="Gender"><label>Male</label>
						<input id="radio" type="radio" name="Gender"><label>Female</label>
						<input id="radio" type="radio" name="Gender"><label>other</label></td>
				</tr>
				<tr>
					<td><label>Address:</label></td>
					<td><textarea name="Address" rows="5" cols="15"></textarea></td>	
				</tr>								
				<tr>
					<td><label>Photo:</label></td>
					<td><input type="file" name="file"></td>	
				</tr>
				<tr>
					<td><label>Education:</label></td>
					<td><select id="edu" name="Education" >
							<option>
								B.E.
							</option>
							<option>
								MCA
							</option>
						</select></td>	
				</tr>
				<tr>
					<td><input id="submit" type="submit" name="signup-submit"></td>
				</tr>
				
			</form>
		</table>	
	</div>
</body>