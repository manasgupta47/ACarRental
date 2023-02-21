
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
 <center>
 <div id="sidebar">
				<div class="box">
					<div class="box-head">
						<h2>Management</h2>
						<a href="add_cars.php" class="addcar"><span>Add new Vehicles</span></a>
				</div>
			</div>
<table class="styled-table">
    <thead>
        <tr>
            <th>Car Model Name</th>
            <th>Car Number</th>
            <th>Seating Capcity</th>
            <th>Rent Per Day</th>
            <th>Content Control</th>
        </tr>
    </thead>
    <?php
		include 'configg.php';
		$select = "SELECT * FROM cars_data";
		$result = $conn->query($select);
		while($row = $result->fetch_assoc()){
		?>
    <tbody>
        <tr>
            <td><h5><?php echo $row['car_name'] ?></h5></td>
            <td><?php echo $row['car_number'] ?></td>
            <td><?php echo $row['capacity'] ?></td>
            <td><?php echo $row['car_cost'] ?></td>
            <td><a class="addcar" href="edit.php?id=<?php echo $row['car_id']?>&name=<?php echo $row['car_name']?>&cost=<?php echo $row['car_cost']?>&capcity=<?php echo $row['capacity']?>&carnumber=<?php echo $row['car_number']?>&image=<?php echo $row['image']?>">Update</a></td>
        </tr>
<?php } ?>

    </tbody>
</table>


            </center>
</body>
</html>