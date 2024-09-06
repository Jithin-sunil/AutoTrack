<?php
include('../connections/connections.php');


 $selcar="select * from tbl_cardetails u inner join tbl_model p on u.model_id = p.model_id inner join tbl_brand w on p.brand_id = w.brand_id inner join tbl_transmissiontype d on u.transmissiontype_id = d.transmissiontype_id  inner join tbl_drivetype e on u.drivetype_id = e.drivetype_id  inner join tbl_fueltype n on u.fueltype_id = n.fueltype_id inner join tbl_emissionnorms m on u.emissionnorms_id = m.emissionnorms_id inner join tbl_steeringtype s on u.steeringtype_id = s.steeringtype_id inner join tbl_braketype v on u.frontbraketype_id = v.braketype_id inner join tbl_braketype z on u.rearbraketype_id = z.braketype_id  where u.model_id=".$_GET['cid'];
    $car=$con->query($selcar);
	$data=$car->fetch_assoc();
    if (isset($_POST['btntrial'])) 
    {
        header("Location: ViewShowRoom.php?CarID=" . $_GET['CarID']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoTracks::Car Details</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
        }

        /* Navigation Styling */
        nav {
            background: #1c1c1c;
            padding: 10px;
            display: flex;
            justify-content: center;
        }

        nav a {
            color: #32d57d;
            text-decoration: none;
            margin: 0 15px;
            font-size: 1rem;
        }

        nav a:hover {
            text-decoration: underline;
        }

        /* Main Section Styling */
        main {
            padding: 20px;
            display: flex;
            justify-content: center;
        }

        .container {
            display: flex;
            max-width: 1200px;
            width: 100%;
        }

        .sidebar {
            background: #333;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-right: 20px;
            flex: 1;
        }

        .sidebar h2 {
            font-size: 1.5rem;
            color: #32d57d;
            margin-bottom: 10px;
        }

        .sidebar ul {
            list-style-type: none;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            color: #32d57d;
            text-decoration: none;
        }

        .sidebar ul li a:hover {
            text-decoration: underline;
        }

        .vehicle-details {
            background: #333;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex: 3;
        }

        .photo-section {
            margin-bottom: 20px;
            text-align: center;
        }

        .vehicle-photo {
            width: 100%;
            max-width: 600px;
            border-radius: 8px;
        }

        .details-section {
            width: 100%;
        }

        .details-section h2 {
            color: #32d57d;
            margin-bottom: 20px;
            text-align: center;
        }

        .detail-item {
            background: #444;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .detail-item h3 {
            color: #32d57d;
            margin-bottom: 5px;
        }

        .detail-item h5 {
            color: #fff;
            font-size: 1.1rem;
            margin-left: auto;
        }
    </style>
</head>
<body>
<form id="form" name="form" method="post" action="">
    <main>
        <div class="container">
            <aside class="sidebar">
                <h2>Other Models of <?php echo $data['brand_name'] ?></h2>
                <ul>
                <?php
	       $selmodel="select * from tbl_model u inner join tbl_brand b on u.brand_id = b.brand_id where u.brand_id='".$data['brand_id']."';";
	$result=$con->query($selmodel);
	$i=0;
   while($value=$result->fetch_assoc())
   {
	   $i++;
	   ?>
       <li><a href="#" onclick="cardetails('<?php echo $value['model_id'] ?>')" ><?php echo $value['model_name']?></a></li>
      
                
                    <?php
   }?>
                </ul>
            </aside>
            <section class="vehicle-details">
                <div class="photo-section">
                    <img src="../Assets/Files/CarDetails/Photo/<?php echo $data['cardetails_photo'] ?> " alt="<?php echo $data['cardetails_photo'] ?>" class="vehicle-photo">
                </div>
                <div class="details-section">
                    <h2><?php echo $data['brand_name'].' '. $data['model_name'] ?></h2>
                    <div class="detail-item">
                        <h3>Brand:</h3>
                        <h5><?php echo $data['brand_name'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Model:</h3>
                        <h5><?php echo $data['model_name'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Car varient:</h3>
                        <h5><?php echo $data['cardetails_varient'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Model year:</h3>
                        <h5><?php echo $data['cardetails_modelyear'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Car prize:</h3>
                        <h5><?php echo $data['cardetails_prize'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Engine:</h3>
                        <h5><?php echo $data['cardetails_engine'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Displacement(cc):</h3>
                        <h5><?php echo $data['cardetails_displacement'] ?> CC</h5>
                    </div>
                    <div class="detail-item">
                        <h3>Max power:</h3>
                        <h5><?php echo $data['cardetails_power'] ?> Bhp</h5>
                    </div>
                    <div class="detail-item">
                        <h3>Max Torque:</h3>
                        <h5><?php echo $data['cardetails_torque'] ?> nq</h5>
                    </div>
                    <div class="detail-item">
                        <h3>No of Cylinders:</h3>
                        <h5><?php echo $data['cardetails_noofcylinders'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Transmission Type:</h3>
                        <h5><?php echo $data['transmissiontype_name'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>number of Gear:</h3>
                        <h5><?php echo $data['cardetails_noofgears'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Drive Type:</h3>
                        <h5><?php echo $data['drivetype_name'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Fuel Type:</h3>
                        <h5><?php echo $data['fueltype_name'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Mileage:</h3>
                        <h5><?php echo $data['cardetails_mileage'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Fuel Tank Capacity:</h3>
                        <h5><?php echo $data['cardetails_fuelcapacity'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Topspeed:</h3>
                        <h5><?php echo $data['cardetails_topspeed'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>steering type:</h3>
                        <h5><?php echo $data['steeringtype_name'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Turningradius:</h3>
                        <h5><?php echo $data['cardetails_turningradius'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Front Braketype:</h3>
                        <h5><?php echo $data['braketype_name'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Rear BrakeType:</h3>
                        <h5><?php echo $data['braketype_name'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Emission Norms:</h3>
                        <h5><?php echo $data['emissionnorms_name'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>car dimensions:</h3>
                        <h5><?php echo $data['cardetails_dimensions'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>bootspace:</h3>
                        <h5><?php echo $data['cardetails_bootspace'] ?> Liter</h5>
                    </div>
                    <div class="detail-item">
                        <h3>seating capacity:</h3>
                        <h5><?php echo $data['cardetails_seatingcapacity'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>no of doors:</h3>
                        <h5><?php echo $data['cardetails_noofdoors'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>keyless:</h3>
                        <?php
                        if($data['cardetails_keyless']==1)
                        {
                            ?>
                            <h5>Yes</h5>
                            <?php
                        }
                        else
                        {
                            ?>
                            <h5>No</h5>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="detail-item">
                        <h3>safety:</h3>
                        <h5><?php echo $data['cardetails_safety'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>ABS:</h3>
                        <?php
                        if($data['cardetails_ABS']==1)
                        {
                            ?>
                            <h5>Yes</h5>
                            <?php
                        }
                        else
                        {
                            ?>
                            <h5>No</h5>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="detail-item">
                        <h3>no of airbags:</h3>
                        <h5><?php echo $data['cardetails_noofairbags'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>electronic stability control:</h3>
                        <?php
                        if($data['cardetails_electronicstabilitycontrol']==1)
                        {
                            ?>
                            <h5>Yes</h5>
                            <?php
                        }
                        else
                        {
                            ?>
                            <h5>No</h5>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="detail-item">
                        <h3>360 viewcamera:</h3>
                        <?php
                        if($data['cardetails_360viewcamera']==1)
                        {
                            ?>
                            <h5>Yes</h5>
                            <?php
                        }
                        else
                        {
                            ?>
                            <h5>No</h5>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="detail-item">
                        <h3>other details:</h3>
                        <h5><?php echo $data['cardetails_otherdetails'] ?></h5>
                    </div>
                    <input type="submit" name="btntrial" id="btntrial" value="Booked of Trial"/>
                </div>
            </section>
        </div>
    </main>
</form>
</body>

</html>
