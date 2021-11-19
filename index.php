<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: page1.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}


if (isset($_POST['signup'])) {
$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$cpassword = md5($_POST['cpassword']);

if ($password == $cpassword) {
  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $sql);
  if (!$result->num_rows > 0) {
    $sql = "INSERT INTO users (username, email, password)
        VALUES ('$username', '$email', '$password')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "<script>alert('Wow! User Registration Completed.')</script>";
      $username = "";
      $email = "";
      $_POST['password'] = "";
      $_POST['cpassword'] = "";
    } else {
      echo "<script>alert('Woops! Something Went Wrong.')</script>";
    }
  } else {
    echo "<script>alert('Woops! Email Already Exists.')</script>";
  }
  
} else {
  echo "<script>alert('Password Not Matched.')</script>";
}
}

?>



<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>register page</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->

<input type="checkbox" class="reg-btn" id="reg-btn">
<label for="reg-btn" class="reg-btn-label"><span>Registration</span></label>
<div class="reg-container" id="nav-cont">
  <div class="input-box-cont">
    <h1 class="heading1">IS App registration</h1>
    <form action="index.php" class="form-cont" method="POST">
      <input type="email" class="input-box" required autocomplete="off" name="email" placeholder="Email" id="email">
      <input type="password" class="input-box" required autocomplete="off" name="password" placeholder="Password" id="first-pass">
      <input type="password" class="input-box" required autocomplete="off" name="cpassword" placeholder="Repeat password" id="second-pass">

      <button name="signup" class="submit-btn">SignUp</button>

    </form>
  </div>
</div>
<div class="main-container" id="main-cont">
  <div class="input-box-cont">
    <h1 class="heading1">IS App login</h1>
    <form action="index.php" class="form-cont" method="POST">
      <input type="email" class="input-box" required autocomplete="off" name="email" placeholder="Email">
      <input type="password" class="input-box" required autocomplete="off" name="password" placeholder="Password">
      <input type="submit" name="submit" value="Login" class="submit-btn">
    </form>
  </div>
</div>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
