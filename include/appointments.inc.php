<?php
if (isset($_POST['submit']))
{
	   require 'db.inc.php';

	$pname = $_POST['pname'];
	$username = $_POST['Username'];
	$email = $_POST['Email'];
	$ph = $_POST['phone'];
	$apt = $_POST['date'];
	$spe = $_POST['spe'];

	if (empty($pname) || empty($username) || empty($email) || empty($ph) || empty($apt) || empty($spe)) 
	{
		header("Location: ../appointment.php?error=emptyfields&uid=".$username,"&mail=".$email);
     	exit();
    }
    elseif ((!filter_var($email, FILTER_VALIDATE_EMAIL)) && (!preg_match("/^[a-zA-Z0-9]*$/"))) 
    {
    	header("Location: ../appointment.php?error=invalidmails&uid");
     	exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
    	header("Location: ../appointment.php?error=invalidmails&uid=".$username);
    	exit();
   	}
   	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username))
   	{
    	header("Location: ../appointment.php?error=invaliduid");
    	exit();
   	}
      elseif ($spe=="---- Select ----")
    {
      header("Location: ../appointment.php?error=invalidspec");
      exit();
    }
  	else
  	{
  		$sql = "INSERT INTO appointments ( ptname, user, email, ph_n, apt_date, spec) VALUES (?, ?, ?, ?, ?, ?)";
      	$stmt = mysqli_stmt_init($conn);
    	if(!mysqli_stmt_prepare($stmt, $sql))
    	{
        	header("Location: ../appointment.php?error=sqlerror");
        	exit();
     	}
      	else
      	{
        	mysqli_stmt_bind_param($stmt, "sssiis", $pname, $username, $email, $ph, $apt, $spe);
        	mysqli_stmt_execute($stmt);
        	header("Location: ../appointment.php?signup=success");
        	exit();
      	}
  	}
}
else
{
	header("Location: ../appointment.php?error=notSubmitted");
	exit();
}
?>