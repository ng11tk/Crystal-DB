<?php
if(isset($_POST['login-submit']))
{
    require 'db.inc.php';
    $user  = $_POST['userid'];
    $password  = $_POST['password'];

    if(empty($user) || empty($password))
    {
      header("Location: ../index.php?error=emptyfields");
      exit();
    }
    else 
    {
        $sql = "SELECT * FROM users WHERE user=? OR pwd=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../index.php?error=sqlerror1");
            exit();
        }
        else 
        {
            mysqli_stmt_bind_param($stmt, "ss", $user, $password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row= mysqli_fetch_assoc($result))
            {
                $pwdcheck = password_verify($password, $row['pwd']);
                if($pwdcheck == false)
                {
                    header("Location: ../index.php?error=worngpwd1");
                    exit();
                } 
                elseif ($pwdcheck == true)
                {
                    session_start();
                    $_SESSION['userId'] = $row['uid'];
                    $_SESSION['username'] = $row['user'];
                    header("Location: ../index.php?Login=success");
                    exit();
                }
                else 
                {
                    header("Location: ../index.php?error=worngpwd");
                    exit();
                }
            }
            else 
            {
                header("Location: ../signup.php?error=nouser");
                exit(); 
            }
        }
    }
}
else {
  header("Location: ../signup.php");
  exit();
}
