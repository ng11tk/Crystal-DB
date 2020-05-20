<!DOCTYPE html>
<html>
<head>
	<title>Make a appointment</title>
	<link rel="stylesheet" type="text/css" href="stylesheet/appointment.css">
</head>
<body class="bd">
	<div class="container">
		<table>
			<form action="include/appointments.inc.php" method="post">

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
				elseif ($_GET["error"] == "invalidspec") {
				echo '<p class="signuperror">Invalid Spactialist!</p>';
				}
			}
			elseif (isset($_GET["signup"] )){
                if($_GET["signup"]  == "success"){
				echo '<p class="signupsuccess">Appointment Recorded!</p>';
			}
            }
			 ?>

					<tr>
						<td><label>Patient Name:</label></td>
						<td><input type="text" name="pname" placeholder="Patient Name"></td>
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
						<td><label>Phone No.</label></td>
						<td><input type="Phone" name="phone"></td>
					</tr>
					<tr>
						<td><label>Date of Appointment:</label></td>
						<td><input type="Date" name="date"></td>	
					</tr>	
					<tr>
						<td><label>Spectialist</label></td>
						<td><select id="spe" name="spe">
								<option >
									---- Select ----
								</option>
								<option>
									General Physician
								</option>
								<option>
									Ayurveda
								</option>
								<option>
									Dentist
								</option>
								<option>
									Dermatologist
								</option>
								<option>
									Ear-Nose-Throat Specialist
								</option>
								<option>
									Gynecologist/Obstetrician
								</option>
								<option>
									Homoeopath
								</option>
							</select></td>	
					</tr>
					<tr>
						<td><input id="submit" type="submit" name="submit"></td>
					</tr>
			</form>
		</table>
	</div>
</body>
</html>