<?php
include('../Assets/connections/connections.php');
include('Header.php');
if(isset($_POST['btnsubmit']))
{
	    $brand=$_POST["selebrand"];
	    $model=$_POST["selemodel"];
	    $varient=$_POST["txtvarient"];
	    $modelyear=$_POST["txtmodelyear"];
		$photo=$_FILES['filephoto']['name'];
	    $tempphoto=$_FILES['filephoto']['tmp_name'];
	    move_uploaded_file($tempphoto,'../Assets/Files/CarDetails/Photo/'.$photo);
		$prize=$_POST["txtprize"];
		$engine=$_POST["txtengine"];
		$cc=$_POST["txtcc"];
		$power=$_POST["txtpower"];
		$torque=$_POST["txttorque"];
		$cylinderno=$_POST["txtcylinderno"];
		$transmission=$_POST["seletransmission"];
		$gearbox=$_POST["selegearbox"];
		$drivetype=$_POST["seledrivetype"];
		$fueltype=$_POST["selefueltype"];
		$mileage=$_POST["txtmileage"];
		$tankcapacity=$_POST["txttankcapacity"];
		$emission=$_POST["seleemission"];
		$speed=$_POST["txtspeed"];
		$steering=$_POST["selesteering"];
		$turning=$_POST["txtturning"];
		$frontbrake=$_POST["selefrontbraketype"];
		$rearbrake=$_POST["selerearbraketype"];
		$dimensions=$_POST["txtdimensions"];
		$bootspace=$_POST["txtbootspace"];
		$seatingcapacity=$_POST["txtseatingcapacity"];
		$nodoors=$_POST["txtnodoors"];
		$keyless=$_POST["btnkeyless"];
		$safety=$_POST["selesafety"];
		$abs=$_POST["btnabs"];
		$noofairbag=$_POST["txtnoofairbag"];
		$electronicstabilitycontrol=$_POST["btnelectronicstabilitycontrol"];
		$viewcamera=$_POST["btnviewcamera"];
		$otherdetails=$_POST["txtotherdetails"];
	$insqry="insert into tbl_cardetails(model_id,cardetails_varient,cardetails_modelyear,cardetails_photo,cardetails_prize,cardetails_engine,cardetails_displacement,cardetails_power,cardetails_torque,cardetails_noofcylinders,transmissiontype_id,cardetails_noofgears,drivetype_id,fueltype_id,cardetails_mileage,cardetails_fuelcapacity,emissionnorms_id,cardetails_topspeed,steeringtype_id,cardetails_turningradius,frontbraketype_id,rearbraketype_id,cardetails_dimensions,cardetails_bootspace,cardetails_seatingcapacity,cardetails_noofdoors,cardetails_keyless,cardetails_safety,cardetails_ABS,cardetails_noofairbags,cardetails_electronicstabilitycontrol,cardetails_360viewcamera,cardetails_otherdetails) values('$model','$varient','$modelyear','$photo','$prize','$engine','$cc','$power','$torque','$cylinderno','$transmission','$gearbox','$drivetype','$fueltype','$mileage','$tankcapacity','$emission','$speed','$steering','$turning','$frontbrake','$rearbrake','$dimensions','$bootspace','$seatingcapacity','$nodoors','$keyless','$safety','$abs','$noofairbag','$electronicstabilitycontrol','$viewcamera','$otherdetails')";
	if($con->query($insqry))
	{
		echo "inserted";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoTracks::CarDetails</title>
<style>
body {
    font-family: 'Roboto', Arial, sans-serif;
    background-color: #1a1a1a; /* dark background */
    color: #ffffff; /* light text */
    margin: 0;
    padding: 0;
}

form {
    background-color: #333333; /* dark background for form */
    width: 49%;
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* stronger shadow */
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
    margin-bottom: 15px;
}

table, th, td {
    border: 1px solid #333333; /* dark border */
    padding: 10px;
}

th {
    background-color: #005580; /* dark blue header */
    color: #ffffff; /* white text */
    text-align: left;
}

td {
    background-color: #1a1a1a; /* dark background for cells */
    color: #ffffff; /* white text */
}

input[type=text],
input[type=file],
textarea,
select {
    width: calc(100% - 20px);
    padding: 10px;
    border: 1px solid #333333; /* dark border */
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 5px;
    margin-bottom: 10px;
    background-color: #333333; /* dark input background */
    color: #ffffff; /* light text */
    font-size: 14px;
}

input[type=submit] {
    background-color: #00d25bdb; /* dark red button */
    color: #ffffff; /* white text */
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

input[type=submit]:hover {
    background-color: #a30000; /* darker red on hover */
}

label {
    font-weight: bold;
    color: #ffffff; /* light text */
}

textarea {
    height: 120px;
    resize: vertical;
}
</style>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="530" border="1" align="center">
    <tr>
      <td width="140">Car Brand</td>
      <td width="374"><label for="selebrand"></label>
        <select name="selebrand" id="selebrand" onchange="getmodel(this.value)">
        <option value = select>--select--</option>
         <?php
	$selqry="select * from tbl_brand u inner join tbl_category d on u.category_id=d.category_id";
	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
	{
		$i++;
		if($data['category_name']=="Cars")
		{
	?>
     <option value ="<?php echo $data['brand_id']?>"><?php echo $data['brand_name'] ?></option>
     <?php
	}
	}
	?>
      </select>
      </td>
    </tr>
    <tr>
      <td>Car Model</td>
      <td><label for="selemodel"></label>
        <select name="selemodel" id="seletmodel">
    <option value = select>--select--</option>
        

      </select>
     </td>
    </tr>
    <tr>
      <td>Car varient</td>
      <td><label for="txtvarient"></label>
      <input type="text" name="txtvarient" id="txtvarient" /></td>
    </tr>
    <tr>
      <td>Model year</td>
      <td><label for="txtmodelyear"></label>
      <input type="text" name="txtmodelyear" id="txtmodelyear" /></td>
    </tr>
    <tr>
      <td>Car photos</td>
      <td><label for="filephoto"></label>
      <input type="file" name="filephoto" id="filephoto" /></td>
    </tr>
    <tr>
      <td>Car prize</td>
      <td><label for="txtprize"></label>
      <input type="text" name="txtprize" id="txtprize" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"> Car Specifications</td>
    </tr>
    <tr>
      <td>Engine</td>
      <td><label for="txtengine"></label>
      <input type="text" name="txtengine" id="txtengine" /></td>
    </tr>
    <tr>
      <td>Displacement(cc)</td>
      <td><label for="txtcc"></label>
      <input type="text" name="txtcc" id="txtcc" /></td>
    </tr>
    <tr>
      <td>Max power</td>
      <td><label for="txtpower"></label>
      <input type="text" name="txtpower" id="txtpower" /></td>
    </tr>
    <tr>
      <td>Max Torque</td>
      <td><label for="txttorque"></label>
      <input type="text" name="txttorque" id="txttorque" /></td>
    </tr>
    <tr>
      <td>No of Cylinders</td>
      <td><label for="txtcylinderno"></label>
      <input type="text" name="txtcylinderno" id="txtcylinderno" /></td>
    </tr>
    <tr>
      <td><p>Transmission Type</p></td>
      <td><label for="seletransmission"></label>
        <select name="seletransmission" id="seletransmission">
    <option value = select>--select--</option>
         <?php
	$selqry="select * from tbl_transmissiontype";
	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
	{
		$i++;
	?>
     <option value = <?php echo $data['transmissiontype_id']?>"><?php echo $data['transmissiontype_name'] ?></option>
     <?php
	}
	?>
      </select>
      </td>
    </tr>
    <tr>
      <td>number of Gear</td>
      <td><label for="selegearbox"></label>
        <select name="selegearbox" id="selegearbox">
          <option value="--select--">--select--</option>
          <option value="5Speed">5 Speed Gearbox</option>
          <option value="6Speed">6 Speed Gearbox</option>
          <option value="7Speed">7 Speed Gearbox</option>
          <option value="8Speed">8 Speed Gearbox</option>
          <option value="9Speed">9 Speed Gearbox</option>
      </select></td>
    </tr>
    <tr>
      <td>Drive Type</td>
      <td><label for="seledrivetype"></label>
        <select name="seledrivetype" id="seledrivetype">
        <option value = select>--select--</option>
         <?php
	$selqry="select * from tbl_drivetype";
	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
	{
		$i++;
	?>
     <option value = <?php echo $data['drivetype_id']?>"><?php echo $data['drivetype_name'] ?></option>
     <?php
	}
	?>
      </select></td>
    </tr>
    <tr>
      <td><p>Fuel Type</p></td>
      <td><label for="selefueltype"></label>
        <select name="selefueltype" id="selefueltype">
        <option value = select>--select--</option>
         <?php
	$selqry="select * from tbl_fueltype";
	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
	{
		$i++;
	?>
     <option value = <?php echo $data['fueltype_id']?>"><?php echo $data['fueltype_name'] ?></option>
     <?php
	}
	?>
      </select></td>
    </tr>
    <tr>
      <td>Mileage</td>
      <td><label for="txtmileage"></label>
      <input type="text" name="txtmileage" id="txtmileage" /></td>
    </tr>
    <tr>
      <td><p>Fuel Tank Capacity</p></td>
      <td><label for="txttankcapacity"></label>
      <input type="text" name="txttankcapacity" id="txttankcapacity" /></td>
    </tr>
    <tr>
      <td>Emission Norms</td>
      <td><label for="seleemission"></label>
        <select name="seleemission" id="seleemission">
        <option value = select>--select--</option>
         <?php
	$selqry="select * from tbl_emissionnorms";
	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
	{
		$i++;
	?>
     <option value = <?php echo $data['emissionnorms_id']?>"><?php echo $data['emissionnorms_name'] ?></option>
     <?php
	}
	?>
      </select></td>
    </tr>
    <tr>
      <td>Top speed</td>
      <td><label for="txtspeed"></label>
      <input type="text" name="txtspeed" id="txtspeed" /></td>
    </tr>
    <tr>
      <td colspan="2">Suspension,Steering &amp; Brakes</td>
    </tr>
    <tr>
      <td>Steering Type</td>
      <td><label for="selesteering"></label>
        <select name="selesteering" id="selesteering"><br />
       <option value = select>--select--</option>
         <?php
	$selqry="select * from tbl_steeringtype";
	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
	{
		$i++;
	?>
     <option value = <?php echo $data['steeringtype_id']?>"><?php echo $data['steeringtype_name'] ?></option>
     <?php
	}
	?>
      </select></td>
    </tr>
    <tr>
      <td>Turning radius</td>
      <td><label for="txtturning"></label>
      <input type="text" name="txtturning" id="txtturning" /></td>
    </tr>
    <tr>
      <td><p>Front brake Type</p></td>
      <td><label for="selefrontbraketype"></label>
        <select name="selefrontbraketype" id="selefrontbraketype">
    <option value = select>--select--</option>
         <?php
	$selqry="select * from tbl_braketype";
	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
	{
		$i++;
	?>
     <option value = <?php echo $data['braketype_id']?>"><?php echo $data['braketype_name'] ?></option>
     <?php
	}
	?>
      </select>
      </td>
    </tr>
    <tr>
      <td>Rear brake Type</td>
      <td><label for="selerearbraketype"></label>
        <select name="selerearbraketype" id="selerearbraketype">
    <option value = select>--select--</option>
         <?php
	$selqry="select * from tbl_braketype";
	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
	{
		$i++;
	?>
     <option value = <?php echo $data['braketype_id']?>"><?php echo $data['braketype_name'] ?></option>
     <?php
	}
	?>
      </select>
      </td>
    </tr>
    <tr>
      <td>Overall length</td>
      <td><label for="txtdimensions"></label>
      <input type="text" name="txtdimensions" id="txtdimensions" /></td>
    </tr>
    <tr>
      <td>Boot space</td>
      <td><label for="txtbootspace"></label>
      <input type="text" name="txtbootspace" id="txtbootspace" /></td>
    </tr>
    <tr>
      <td>Seating Capacity</td>
      <td><label for="txtseatingcapacity"></label>
      <input type="text" name="txtseatingcapacity" id="txtseatingcapacity" /></td>
    </tr>
    <tr>
      <td><p>No.of Doors</p></td>
      <td><label for="txtnodoors"></label>
      <input type="text" name="txtnodoors" id="txtnodoors" /></td>
    </tr>
    <tr>
      <td><p>Keyless Entry</p></td>
      <td><label for="btnkeyless">Yes
          <input type="radio" name="btnkeyless" id="yes" value="1" />
          No
      </label>
        <input type="radio" name="btnkeyless" id="no" value="0" />
      <label for="btnkeyless2"></label></td>
    </tr>
    <tr>
      <td>Safety</td>
      <td><label for="selesafety"></label>
        <select name="selesafety" id="selesafety">
        <option value="--select--">--select--</option>
        <option value="ADAS Level0">ADAS Level0</option>
        <option value="ADAS Level1">ADAS Level1</option>
        <option value="ADAS Level2">ADAS Level2</option>
        <option value="ADAS Level3">ADAS Level3</option>
        <option value="ADAS Level4">ADAS Level4</option>
        <option value="ADAS Level5">ADAS Level5</option>
      </select></td>
    </tr>
    <tr>
      <td>ABS</td>
      <td>Yes 
        <input type="radio" name="btnabs" id="yes" value="1" />
        No
             <label for="btnabs">
        <input type="radio" name="btnabs" id="no" value="0" />
      </label></td>
    </tr>
    <tr>
      <td>No.of Airbags</td>
      <td><label for="txtnoofairbag"></label>
      <input type="text" name="txtnoofairbag" id="txtnoofairbag" /></td>
    </tr>
    <tr>
      <td>Electronic Stability Control</td>
      <td>Yes
        <input type="radio" name="btnelectronicstabilitycontrol" id="yes" value="1" />
        No
        <label for="btnelectronicstabilitycontrol"></label>
      <input type="radio" name="btnelectronicstabilitycontrol" id="no" value="0" />
      <label for="btnelectronicstabilitycontrol2"></label></td>
    </tr>
    <tr>
      <td>360 View Camera</td>
      <td>Yes
        <input type="radio" name="btnviewcamera" id="yes" value="1" />
        No
        <label for="btnviewcamera"></label>
      <input type="radio" name="btnviewcamera" id="no" value="0" />
      <label for="btnviewcamera2"></label></td>
    </tr>
    <tr>
      <td align="center">Other Details</td>
      <td align="center"><label for="txtotherdetails"></label>
      <textarea name="txtotherdetails" id="txtotherdetails" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
  </table>
</form>

</body>
<?php include('Footer.php'); ?>
</html>

<script src="../Assets/JQ/jQuery.js"></script>
    <script>
       
    function getmodel(mid) {
        $.ajax({
            url: "../Assets/AjaxPages/Ajaxmodel.php?mid=" + mid,
            success: function(result) {
                $("#seletmodel").html(result);
                
            }
        });
    }
    </script>