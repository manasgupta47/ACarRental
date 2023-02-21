<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
<?php include 'navbar.php'?>
<div class="container">
<form method="POST" style="border:1px solid #ccc">
  <div class="container">
    <h1>Log In</h1>
<p>Log In For Both Car Agenecy Or Customer</p>
    <hr>
    <label for="email"><b>Email :</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>
    <label for="type"><b>Type :</b></label>
    <select name="type">
      <option>Select Type</option>
      <option>Customer</option>
      <option>Agency</option>
    </select>
</br>
</br>

    <label for="psw"><b>Password :</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    
    <div class="clearfix">
      
      <button name="login" type="submit" class="loginbtn">log In</button>
    </div>
    
  </div>
</form>
<?php
if(isset($_POST['login'])){
  include 'config.php';
  $email=$_POST['email'];
  $password=$_POST['password'];
  $type=$_POST['type'];

  $query = ($type=="Customer")? "SELECT * FROM customer WHERE email = '$email' AND password = '$password'" : "SELECT * FROM agency WHERE email = '$email' AND password = '$password'" ;
  $rs = $conn->query($query);
  $num = $rs->num_rows;
  $rows = $rs->fetch_assoc();
  if($num > 0){
    session_start();
    $_SESSION['email'] = $rows['email'];
    $_SESSION['password'] = $rows['password'];
    if($type=="Customer"){
    echo "<script type = \"text/javascript\">
          alert(\"Login Successful.................\");
          window.location = (\"index.php\")
          </script>";
    }
    else{
      echo "<script type = \"text/javascript\">
      alert(\"Login Successful.................\");
      window.location = (\"agency/add_vehical.php\")
      </script>";
    }
          
  } else{
    echo "<script type = \"text/javascript\">
          alert(\"Login Failed. Try Again................\");
          window.location = (\"login.php\")
          </script>";
  }
}

?>
</div>
</body>
</html>