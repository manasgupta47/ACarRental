<?php
	include 'configg.php';
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
    <h1>Enter New Car Data</h1>
    <p>Fill All The Required Details.</p>
    <hr>

    <label for="Car Model Name"><b>Car Model Name :</b></label>
    <input type="text" placeholder="Enter Model Name" name="model_name" required>
    <label for="Car Number"><b>Car Number :</b></label>
    <input type="text" placeholder="Enter Car Number" name="car_number" required>
<label for="capacity"><b>Seating Capacity :</b></label>
    <input type="text" placeholder="Enter Seating Capacity" name="capacity" required>
<label for="rent"><b>Rent Per Day :</b></label>
    <input type="text" placeholder="Enter Rent Per Day" name="rent" required>
    <label for="image"><b>Car Image:</b></label>
    <input type="file" name="image" required>
</br>
    <div class="clearfix">
      
      <button name="submit" type="submit" class="submitbtn">Submit</button>
    </div>
    
  </div>
</form>
<?php
							if(isset($_POST['submit'])){
								$img_name=$_FILES['image']['name'];
                $img_size=$_FILES['image']['size'];
                $tmp_name=$_FILES['image']['tmp_name'];
                $error=$_FILES['image']['error'];
								if($error===0){
                  $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
                  $img_ex_lc=strtolower($img_ex);
                  $allowed_exs=array("jpg","jpeg","png");
                  if(in_array($img_ex_lc,$allowed_exs)){
                    $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
                    $img_upload_path='cars/'.$new_img_name;
                    move_uploaded_file($tmp_name,$img_upload_path);
                  }
                                }
								$car_name = $_POST['model_name'];
								$car_number=$_POST['car_number'];
								$car_cost = $_POST['rent'];
								$capacity = $_POST['capacity'];
								$qr = "INSERT INTO cars_data (image, car_name,car_number,car_cost,capacity) 
													VALUES ('$new_img_name','$car_name','$car_number','$car_cost','$capacity')";
								$res = $conn->query($qr);
								if($res === TRUE){
									echo "<script type = \"text/javascript\">
											alert(\"Vehicle Succesfully Added\");
											window.location = (\"add_vehical.php\")
											</script>";
									}
								}
								else{ 'Failed';
							}
						?>
</body>
</html>