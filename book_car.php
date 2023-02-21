
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="card.css">
  <link rel="stylesheet" href="form.css">
  
  
  <title>Document</title>
</head>
<body>
<?php include 'navbar.php '?>
  <section class="caption">
				<h2 class="caption" style="text-align: center">Find You Dream Cars For Hire</h2>
				<h3 class="properties" style="text-align: center">Range Rovers - Mercedes Benz - Landcruisers</h3>
			</section>
      <?php
						include 'config.php';
            
						$sel = "SELECT * FROM cars_data where car_id= '$_GET[id]'";
						$rs = $conn->query($sel);
						while($rws = $rs->fetch_assoc()){
			?>
      <div class="container" style="display: flex;
    align-items: center;
    justify-content: center;">
  <div class="card">
  <div class="product_image">
    <img src="agency\cars\<?php echo $rws['image'];?>" alt="">
  </div>
  <div class="product_info">
  <h4><?php echo $rws['car_name'] ?></h4>
  <h4><?php echo 'Rs Per Day : '.$rws['car_cost'];?></h4>
  <h4><?php echo 'Capacity : '.$rws['capacity'];?></h4>
  <h4><?php echo 'Car Number : '.$rws['car_number'];?></h4>
  </div>
  </div>
  
</div>

<?php } ?>
<div class="form">
  <form action="#" method="POST">
    <label for="fname">Full Name</label>
    <input type="text"  name="name" placeholder="Your Name.." required>
    <label for="mail">Email</label>
    <input type="text"  name="email" placeholder="Your Email.." required>
    <label for="days">No. Of Days</label>
    <input type="text"  name="days" placeholder="No. Of Days.." required>
            <br></br>
    <label for="date">Start Date</label>
    <input type="date"  name="date" required>
    <input type="submit" name="submit" value="Rent Car">
  </form>
</div>
<?php
if(isset($_POST['submit'])){
include 'config.php';
$name=$_POST['name'];
$email=$_POST['email'];
$days=$_POST['days'];
$date=$_POST['date'];
$car_id=$_GET['id'];

$qry = "INSERT INTO booked_cars (name,email,days,date,car_id)
VALUES('$name','$email','$days','$date','$car_id')";
$result = $conn->query($qry);
if($result == TRUE){
  echo "<script type = \"text/javascript\">
        alert(\"Successfully Booked.\");
        window.location = (\"index.php\")
        </script>";
} else{
  echo "<script type = \"text/javascript\">
        alert(\"Registration Failed. Try Again\");
        window.location = (\"book_car.php\")
        </script>";
}
}
?>
</body>
</html>