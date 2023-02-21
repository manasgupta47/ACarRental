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
<h2>Management</h2>
<h3>All Booked Cars</h3>
<table class="styled-table">
    <thead>
        <tr>
            <th>Car Model Name</th>
            <th>Car Number</th>
            <th>Customer Name</th>
            <th>Customer Email</th>
            <th>Days</th>
            <th>Start Date</th>
        </tr>
    </thead>
    <?php
		include 'configg.php';
		$select = "SELECT * FROM booked_cars CROSS JOIN cars_data  where booked_cars.car_id=cars_data.car_id";
		$result = $conn->query($select);
		while($row = $result->fetch_assoc()){
		?>
    <tbody>
        <tr>
            <td><?php echo $row['car_name'] ?></td>
            <td><?php echo $row['car_number'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['days'] ?></td>
            <td><?php echo $row['date'] ?></td>

        </tr>
<?php } ?>

    </tbody>
</table>


            </center>
</body>
</html>