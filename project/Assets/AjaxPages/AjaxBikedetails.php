<?php
include('../Assets/connections/connections.php');
include('Header.php');
$selbike="select * from tbl_bikedetails u inner join tbl_model p on u.model_id = p.model_id inner join tbl_brand w on p.brand_id = w.brand_id inner join tbl_emissionnorms m on u.emissionnorms_id = m.emissionnorms_id inner join tbl_braketype v on u.frontbraketype_id = v.braketype_id inner join tbl_braketype z on u.rearbraketype_id = z.braketype_id  where u.bikedetails_id=".$_GET['bid'];
    $bike=$con->query($selbike);
	$data=$bike->fetch_assoc();
    if (isset($_POST['btntrial'])) 
    {
        header("Location: ViewShowRoom.php?BikeID=".$_GET['BikeID']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoTracks::Bike Details</title>
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
            /* max-width: 500; */
            width: 50%;
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
            width: 50%;
            max-width: 250;
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

        .detail-item p {
            color: #fff;
            font-size: 1.1rem;
            margin-left: auto;
        }
        #btntrial {
    background-color: #4CAF50; /* Green background for the button */
    color: #fff; /* White text */
    border: none; /* No border */
    cursor: pointer; /* Pointer cursor on hover */
    border-radius: 5px; /* Rounded corners */
    font-size: 16px; /* Font size */
    padding: 12px 20px; /* Padding inside the button */
    margin-top: 20px; /* Space above the button */
  }
  
  /* Center align the submit button */
  #btntrial-container {
    text-align: center;
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
        <li><a href="#" onclick="Bikedetails('<?php echo $value['model_id'] ?>')" ><?php echo $value['model_name']?></a></li>
        <?php
   }?>
                </ul>
            </aside>
            <section class="vehicle-details">
                <div class="photo-section">
                    <img src="../Assets/Files/BikeDetails/Photo/<?php echo $data['bikedetails_photo'] ?> " alt="<?php echo $data['bikedetails_photo'] ?>" class="vehicle-photo">
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
                        <h3>bike varient:</h3>
                        <h5><?php echo $data['bikedetails_varient'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Model year:</h3>
                        <h5><?php echo $data['bikedetails_modelyear'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>bike prize:</h3>
                        <h5><?php echo $data['bikedetails_prize'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Displacement(cc):</h3>
                        <h5><?php echo $data['bikedetails_displacement'] ?> CC</h5>
                    </div>
                    <div class="detail-item">
                        <h3>Max power:</h3>
                        <h5><?php echo $data['bikedetails_power'] ?> bhp</h5>
                    </div>
                    <div class="detail-item">
                        <h3>Max Torque:</h3>
                        <h5><?php echo $data['bikedetails_torque'] ?> nq</h5>
                    </div>
                    <div class="detail-item">
                        <h3>No of Cylinders:</h3>
                        <h5><?php echo $data['bikedetails_noofcylinders'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Number of Gears:</h3>
                        <h5><?php echo $data['bikedetails_noofgears'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Fuel Type:</h3>
                        <h5><?php echo $data['bikedetails_fueltype'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Mileage:</h3>
                        <h5><?php echo $data['bikedetails_mileage'] ?> Kmpl</h5>
                    </div>
                    <div class="detail-item">
                        <h3>Fuel Tank Capacity:</h3>
                        <h5><?php echo $data['bikedetails_fuelcapacity'] ?> Liter</h5>
                    </div>
                    <div class="detail-item">
                        <h3>Emission Norms:</h3>
                        <h5><?php echo $data['emissionnorms_name'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Topspeed:</h3>
                        <h5><?php echo $data['bikedetails_topspeed'] ?> Km/H</h5>
                    </div>
                    <div class="detail-item">
                        <h3>Instrument Console:</h3>
                        <h5><?php echo $data['bikedetails_instrumentconsole'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Braking System:</h3>
                        <h5><?php echo $data['bikedetails_brakingsystem'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Front Braketype:</h3>
                        <h5><?php echo $data['braketype_name'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Rear Braketype:</h3>
                        <h5><?php echo $data['braketype_name'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Dimensions:</h3>
                        <h5><?php echo $data['bikedetails_dimensions'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Total Weight:</h3>
                        <h5><?php echo $data['bikedetails_totalweight'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Ground Cleanance:</h3>
                        <h5><?php echo $data['bikedetails_groundcleanance'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Warranty:</h3>
                        <h5><?php echo $data['bikedetails_warranty'] ?></h5>
                    </div>
                    <div class="detail-item">
                        <h3>Other Details:</h3>
                        <h5><?php echo $data['bikedetails_otherdetails'] ?></h5>
                    </div>
                    <input type="submit" name="btntrial" id="btntrial" value="Booked of Trial"/>
                </div>
            </section>
        </div>
    </main>
</form>
</body>
<?php
include('Footer.php');
?>
</html>
