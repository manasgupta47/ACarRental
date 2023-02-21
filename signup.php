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
<?php include 'navbar.php '?>
<div class="container">
<form  method ="post" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Sign Up For Both Car Agenecy Or Customer</p>
    <hr>

    <label for="Full Name"><b>Full Name :</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>
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
<label for="location"><b>Location :</b></label>
    <input type="text" placeholder="Enter Location" name="location" required>
<label for="Number"><b>Mobile Number :</b></label>
    <input type="text" placeholder="Enter Mobile Number" name="number" required>
    <label for="psw"><b>Password :</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    
    <div class="clearfix">
      
      <button name="save" type="submit" class="signupbtn">Sign Up</button>
    </div>
    
  </div>
</form>
<?php if(isset($_POST['save'])){
  include 'config.php';
  $name=$_POST['name'];
  $email=$_POST['email'];
  $type=$_POST['type'];
  $number=$_POST['number'];
  $location=$_POST['location'];
  $password=$_POST['password'];
  $query = ($type=="Customer")? "SELECT * FROM customer WHERE email = '$email'" : "SELECT * FROM agency WHERE email = '$email' " ;
  $rs = $conn->query($query);
  $num = $rs->num_rows;
 
  if($num > 0){
    echo "<script type = \"text/javascript\">
    alert(\"User Email Already Registered.\");
    window.location = (\"signup.php\")
    </script>";
  }
  else{
  $qry=($type=='Customer') ? "INSERT INTO customer (name,email,number,location,password)
  VALUES('$name','$email','$number','$location','$password')" : "INSERT INTO agency (name,email,number,location,password)
  VALUES('$name','$email','$number','$location','$password')";
  $result=$conn->query($qry);
  if($result==TRUE){
    echo "<script type = \"text/javascript\">
    alert(\"Successfully Registered.\");
    window.location = (\"login.php\")
    </script>";
  }
  else{
    "<script type = \"text/javascript\">
    alert(\"Successfully Registered.\");
    window.location = (\"signup.php\")
    </script>";
  }
}
}
?>
</div>
</body>
</html>