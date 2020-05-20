<?php
 if(isset($_POST['signup-submit'])) {

   require 'db.inc.php';

   $fname = $_POST['Fullname'];
   $username = $_POST['Username'];
   $email = $_POST['Email'];
   $password = $_POST['password'];
   $repassword = $_POST['repassword'];
   $dob = $_POST['Date'];
   $gen = $_POST['Gender'];
   $addr = $_POST['Address'];
   $file = $_POST['file'];
   $edu = $_POST['Education'];


   if(empty($username) || empty($email) || empty($password) || empty($repassword)) {

     header("Location: ../signup.php?error=emptyfields&uid=".$username,"&mail=".$email);
     exit();
   }
   elseif ((!filter_var($email, FILTER_VALIDATE_EMAIL)) && (!preg_match("/^[a-zA-Z0-9]*$/"))) {
     header("Location: ../signup.php?error=invalidmails&uid");
     exit();
   }
   elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     header("Location: ../signup.php?error=invalidmails&uid=".$username);
     exit();
   }
   elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
     header("Location: ../signup.php?error=invaliduid");
     exit();
   }
  elseif ($password !== $repassword) {
    header("Location: ../signup.php?error=passwordCheck&uid=".$username,"&mail=".$email);
    exit();
   }
   else {

    $sql = "SELECT user FROM users WHERE user=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../signup.php?error=sqlerror1");
      exit();
    }
    else {
    mysqli_stmt_bind_param($stmt, "s", $Username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultCheck = mysqli_stmt_num_rows($stmt);

    if($resultCheck > 0)
    {
      header("Location: ../signup.php?error=usertaken&mail=".$email);
      exit();
    }
    else{

      $sql = "INSERT INTO users ( fname, user, email, pwd, repwd, dob, gen, addr, photo, edu) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../signup.php?error=sqlerror2");
        exit();
      }
      else {
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sssssissis", $fname, $username, $email, $hashedPwd, $repassword, $dob, $gen, $addr, $file, $edu);
        mysqli_stmt_execute($stmt);
        header("Location: ../index.php?signup=success");
        exit();
      }
    }
   }
  }
mysqli_stmt_close($stmt);
mysqli_close($conn);

 }
else {
  header("Location: ../signup.php");
  exit();
}
