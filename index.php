<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="card.css">
  <title>Document</title>
</head>
<body>
  
  <?php include 'navbar.php'?>
  <section class="caption">
				<h2 class="caption" style="text-align: center">Find You Dream Cars For Hire</h2>
				<h3 class="properties" style="text-align: center">Range Rovers - Mercedes Benz - Landcruisers</h3>
			</section>
  <?php
						include 'config.php';
						$sel = "SELECT * FROM cars_data";
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
  <div class="btn">
  <?php
						if(!$_SESSION['email'] && (!$_SESSION['password'])){
					?>
  <a href="login.php"><button type="button" style="margin-left:250px;">Rent Car</button></a>
  <?php } 
  else{ ?>
    <a href="book_car.php?id=<?php echo $rws['car_id'] ?>"><button style="margin-left:250px;" type="button">Rent Car</button></a>
    <?php } ?>
  </div>
  </div>
  
</div>

<?php } ?>

</body>
</html>