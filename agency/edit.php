<?php
	include 'configg.php';
 
  $vaname=$_GET['name'];
  $vcost=$_GET['cost'];
  $vcap=$_GET['capcity'];
  
  $vnumber=$_GET['carnumber'];
  $vimage=$_GET['image'];
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Document</title>
</head>
<body>
<?php
  include 'agencynavbar.php'; 
 ?>
<center> <div id="sidebar">
				<div class="box">
					<div class="box-head">
						<h2>Management</h2>
						<a href="add_vehical.php" class="addcar"><span>View Vehicles</span></a>
				</div>
			</div></center>
</br>
 <div class="container">
  
<form  method ="post" enctype="multipart/form-data" style="border:1px solid #ccc">
  <div class="container">
    <h1>Update Car Data</h1>
    <p>Fill All The Required Details.</p>
    <hr>

    <label for="Car Model Name"><b>Car Model Name :</b></label>
    <input type="text" placeholder="Enter Model Name" name="model_name" value="<?php echo "$vaname" ?>" required>
    <label for="Car Number"><b>Car Number :</b></label>
    <input type="text" placeholder="Enter Car Number" name="car_number" value="<?php echo "$vnumber" ?>" required>
<label for="capacity"><b>Seating Capacity :</b></label>
    <input type="text" placeholder="Enter Seating Capacity" name="capacity" value="<?php echo "$vcap" ?>" required>
<label for="rent"><b>Rent Per Day :</b></label>
    <input type="text" placeholder="Enter Rent Per Day" name="rent" value="<?php echo "$vcost" ?>" required>

    <div class="clearfix">
      <button name="submit" type="submit" class="submitbtn">Submit</button>
    </div>
    
  </div>
</form>
<?php
							if(isset($_POST['submit'])){
								$car_name = $_POST['model_name'];
								$car_id = $_GET['id'];
								$car_cost = $_POST['rent'];
								$capacity = $_POST['capacity'];
								$car_number=$_POST['car_number'];
								$qr = "UPDATE cars_data SET car_name = '$car_name' ,capacity = '$capacity',car_cost = '$car_cost' WHERE car_id = '$car_id'" ;
								$res = $conn->query($qr);
								if($res === TRUE){
									echo "<script type = \"text/javascript\">
											alert(\"Vehicle Succesfully Updated\");
											window.location = (\"add_vehical.php\")
											</script>";
									}
								}
								else 'Failed';
						?>
</body>
</html>