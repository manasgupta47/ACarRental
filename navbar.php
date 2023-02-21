<?php session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}



.active {
  background-color: #333;
}
</style>
</head>
<body>

<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="contact.php">Contact</a></li>
  <li><a href="#About">About</a></li>
  <?php
						if(!$_SESSION['email'] && (!$_SESSION['password'])){
					?>
  <li style="float:right"><a class="active" href="signup.php">Sign Up</a></li>
  <li style="float:right"><a class="active" href="login.php">LogIn</a></li>
  <?php } else{ ?>
  <li style="float:right"><a class="active" href="agency/logout.php">LogOut</a></li>
  <?php
						}
					?>
</ul>

</body>
</html>
