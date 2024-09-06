<?php
include("../connections/connections.php");

$modelId = $_GET['did'];

$se = "SELECT * 
       FROM tbl_cardetails p 
       INNER JOIN tbl_model sc ON sc.model_id = p.model_id 
       INNER JOIN tbl_brand c ON c.brand_id = sc.brand_id 
       WHERE sc.model_id = '$modelId'";

$datac = $con->query($se);

$bse = "SELECT * 
       FROM tbl_bikedetails b
       INNER JOIN tbl_model sc ON sc.model_id = b.model_id 
       INNER JOIN tbl_brand c ON c.brand_id = sc.brand_id 
       WHERE sc.model_id = '$modelId'";

$bdata = $con->query($bse);


if ($datac->num_rows > 0) {
    while ($row0 = $datac->fetch_assoc()) {
        ?>
        <p><img src="../Assets/Files/CarDetails/Photo/<?php echo $row0['cardetails_photo']; ?>" width="150" height="150" alt=""></p>
        <h3><?php echo $row0['model_name']; ?></h3>
        <p>Price: <?php echo $row0['cardetails_prize']; ?></p>
        <p>Variant: <?php echo $row0['cardetails_varient']; ?></p>
        <p>Model Year: <?php echo $row0['cardetails_modelyear']; ?></p>
        <p>Engine: <?php echo $row0['cardetails_engine']; ?></p>
        <p>displacement(CC): <?php echo $row0['cardetails_displacement']; ?></p>
        <p>Power: <?php echo $row0['cardetails_power']; ?></p>
        <p>Torque: <?php echo $row0['cardetails_torque']; ?></p>
        <p>Number Of Cylinders: <?php echo $row0['cardetails_noofcylinders']; ?></p>
        <p>Number Of Gears: <?php echo $row0['cardetails_noofgears']; ?></p>
        <p>Avg Mileage: <?php echo $row0['cardetails_mileage']; ?></p>
        <p>Fuel Tank Capacity: <?php echo $row0['cardetails_fuelcapacity']; ?></p>
        <p>TopSpeed: <?php echo $row0['cardetails_topspeed']; ?></p>
        <p><a href="TrialBooking.php?CarID=<?php echo $row0['cardetails_id'];?>">Booking Trial Drive</a></p>
         
        <?php
    }
} 
else if ($bdata->num_rows > 0) {
    while ($row1 = $bdata->fetch_assoc()) {
        ?>
        <p><img src="../Assets/Files/BikeDetails/Photo/<?php echo $row1['bikedetails_photo']; ?>" width="150" height="150" alt=""></p>
        <h3><?php echo $row1['model_name']; ?></h3>
        <p>Price: <?php echo $row1['bikedetails_prize']; ?></p>
        <p>Variant: <?php echo $row1['bikedetails_varient']; ?></p>
        <p>Model Year: <?php echo $row1['bikedetails_modelyear']; ?></p>
        <p>displacement(CC): <?php echo $row1['bikedetails_displacement']; ?></p>
        <p>Power: <?php echo $row1['bikedetails_power']; ?></p>
        <p>Torque: <?php echo $row1['bikedetails_torque']; ?></p>
        <p>Number Of Cylinders: <?php echo $row1['bikedetails_noofcylinders']; ?></p>
        <p>Number Of Gears: <?php echo $row1['bikedetails_noofgears']; ?></p>
        <p>Fuel Type: <?php echo $row1['bikedetails_fueltype']; ?></p>
        <p>Avg Mileage: <?php echo $row1['bikedetails_mileage']; ?></p>
        <p>Fuel Tank Capacity: <?php echo $row1['bikedetails_fuelcapacity']; ?></p>
        <p>TopSpeed: <?php echo $row1['bikedetails_topspeed']; ?></p>
        <p><a href="TrialBooking.php?BikeID=<?php echo $row1['bikedetails_id'];?>">Booking Trial Drive</a></p>
         
        <?php
    }
}
else {
    echo "<p>No data found</p>";
}
?>
