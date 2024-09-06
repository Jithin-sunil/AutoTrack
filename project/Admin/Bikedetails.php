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
	    move_uploaded_file($tempphoto,'../Assets/Files/BikeDetails/Photo/'.$photo);
		$prize=$_POST["txtprize"];
		$cc=$_POST["txtcc"];
		$power=$_POST["txtpower"];
		$torque=$_POST["txttorque"];
		$cylinderno=$_POST["txtcylinderno"];
		$gearbox=$_POST["selegearbox"];
		$fueltype=$_POST["selefueltype"];
		$mileage=$_POST["txtmileage"];
		$tankcapacity=$_POST["txttankcapacity"];
		$emission=$_POST["seleemission"];
		$speed=$_POST["txtspeed"];
		$instrument=$_POST["seleinstrument"];
		$brakingsystem=$_POST["selebrakingsystem"];
		$frontbrake=$_POST["selefrontbraketype"];
		$rearbrake=$_POST["selerearbraketype"];
		$dimensions=$_POST["txtdimensions"];
    $totalweight=$_POST["txttotalweight"];
    $groundcleanance=$_POST["txtgroundcleanance"];
    $warranty=$_POST["txtwarranty"];
		$otherdetails=$_POST["txtotherdetails"];
	$insqry="insert into tbl_bikedetails(model_id,bikedetails_varient,bikedetails_modelyear,bikedetails_photo,bikedetails_prize,bikedetails_displacement,bikedetails_power,bikedetails_torque,bikedetails_noofcylinders,bikedetails_noofgears,bikedetails_fueltype,bikedetails_mileage,bikedetails_fuelcapacity,emissionnorms_id,bikedetails_topspeed,bikedetails_instrumentconsole,bikedetails_brakingsystem,frontbraketype_id,rearbraketype_id,bikedetails_dimensions,bikedetails_totalweight,bikedetails_groundcleanance,bikedetails_warranty,bikedetails_otherdetails) values('$model','$varient','$modelyear','$photo','$prize','$cc','$power','$torque','$cylinderno','$gearbox','$fueltype','$mileage','$tankcapacity','$emission','$speed','$instrument','$brakingsystem','$frontbrake','$rearbrake','$dimensions','$totalweight','$groundcleanance','$warranty','$otherdetails')";
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
<title>AutoTracks::BikeDetails</title>
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
  <table width="374" border="1" align="center">
    <tr>
      <td width="111">Bike Brand :</td>
      <td width="247"><label for="selebrand"></label>
        <select name="selebrand" id="selebrand" onchange="getmodel(this.value)">
        <option value = select>--select--</option>
         <?php
	$selqry="select * from tbl_brand u inner join tbl_category d on u.category_id=d.category_id";
	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
	{
		$i++;
		if($data['category_name']=="Motorcycles")
		{
	?>
     <option value ="<?php echo $data['brand_id']?>"><?php echo $data['brand_name'] ?></option>
     <?php
	}
	}
	?>
      </select></td>
    </tr>
    <tr>
      <td>Bike Model :</td>
      <td><label for="selemodel"></label>
        <select name="selemodel" id="seletmodel">
        <option value = select>--select--</option>
      </select></td>
    </tr>
    <tr>
      <td>Bike varient :</td>
      <td><label for="txtvarient"></label>
      <input type="text" name="txtvarient" id="txtvarient" /></td>
    </tr>
    <tr>
      <td>Bike year :</td>
      <td><label for="txtmodelyear"></label>
      <input type="text" name="txtmodelyear" id="txtmodelyear" /></td>
    </tr>
    <tr>
      <td>Bike photos :</td>
      <td><label for="filephoto"></label>
      <input type="file" name="filephoto" id="filephoto" /></td>
    </tr>
    <tr>
      <td>Bike prize :</td>
      <td><label for="txtprize"></label>
      <input type="text" name="txtprize" id="txtprize" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"> Bike Specifications</td>
    </tr>
   
    <tr>
      <td>Displacement(cc) :</td>
      <td><label for="txtcc"></label>
      <input type="text" name="txtcc" id="txtcc" /></td>
    </tr>
    <tr>
      <td>Max power :</td>
      <td><label for="txtpower"></label>
      <input type="text" name="txtpower" id="txtpower" /></td>
    </tr>
    <tr>
      <td>Max Torque :</td>
      <td><label for="txttorque"></label>
      <input type="text" name="txttorque" id="txttorque" /></td>
    </tr>
    <tr>
      <td>No of Cylinders :</td>
      <td><label for="txtcylinderno"></label>
      <input type="text" name="txtcylinderno" id="txtcylinderno" /></td>
    </tr>
    <tr>
      <td>Gear box :</td>
      <td><label for="selegearbox"></label>
        <select name="selegearbox" id="selegearbox">
          <option value="--select--">--select--</option>
          <option value="4Speed">4 Speed Gearbox</option>
          <option value="5Speed">5 Speed Gearbox</option>
          <option value="6Speed">6 Speed Gearbox</option>
          <option value="7Speed">7 Speed Gearbox</option>
      </select></td>
    </tr>
    <tr>
      <td>Fuel Systeam :</td>
      <td><label for="selefueltype"></label>
        <select name="selefueltype" id="selefueltype">
        <option value = select>--select--</option>
        <option value="Fuelinjection">Fuel injection</option>
        <option value="Carburetor">Carburetor</option></td>
    </tr>
   
    <tr>
      <td>Mileage :</td>
      <td><label for="txtmileage"></label>
      <input type="text" name="txtmileage" id="txtmileage" /></td>
    </tr>
    <tr>
      <td><p>Fuel Tank Capacity :</p></td>
      <td><input type="text" name="txttankcapacity" id="txttankcapacity" /></td>
    </tr>
    <tr>
      <td>Emission Standard :</td>
      <td><select name="seleemission" id="seleemission">
        <option value = select>--select--</option>
         <?php
	$selqry="select * from tbl_emissionnorms";
	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
	{
		$i++;
	?>
     <option value = "<?php echo $data['emissionnorms_id']?>" > <?php echo $data['emissionnorms_name'] ?></option>
     <?php
	}
	?>
      </select></td>
    </tr>
    <tr>
      <td>Top speed :</td>
      <td><label for="txtspeed"></label>
      <input type="text" name="txtspeed" id="txtspeed" /></td>
    </tr>
    <tr>
      <td>Instrument Console :</td>
      <td><label for="seleinstrument"></label>
        <select name="seleinstrument" id="seleinstrument">
        <option value="--select--">--select--</option>
        <option value="analoge">Analoge</option>
        <option value="digitel">Digital</option>
      </select></td>
    </tr>
    <tr>
      <td>Braking System :</td>
      <td><label for="selebrakingsystem"></label>
        <select name="selebrakingsystem" id="selebrakingsystem">
          <option value="--select--">--select--</option>
          <option value="combibrakesystem">Combi brake system</option>
          <option value="abs">ABS</option>
      </select></td>
    </tr>
  
    <tr>
      <td>Front brake Type :</td>
      <td><select name="selefrontbraketype" id="selefrontbraketype">
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
      </select></td>
    </tr>
    <tr>
      <td>Rear brake Type :</td>
      <td><select name="selerearbraketype" id="selerearbraketype">
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
      </select></td>
    </tr>
    <tr>
      <td>Overall Length :</td>
      <td><input type="text" name="txtdimensions" id="txtdimensions" /></td>
    </tr>
    <tr>
      <td>Kerb Weight :</td>
      <td><input type="text" name="txttotalweight" id="txttotalweight" /></td>
    </tr>
    <tr>
      <td>Ground Cleanance :</td>
      <td><input type="text" name="txtgroundcleanance" id="txtgroundcleanance" /></td>
    </tr>
    <tr>
      <td>Warranty :</td>
      <td><input type="text" name="txtwarranty" id="txtwarranty" /></td>
    </tr>
   
    <tr>
      <td>Other Details :</td>
      <td> <textarea name="txtotherdetails" id="txtotherdetails" cols="45" rows="5"></textarea></td>
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