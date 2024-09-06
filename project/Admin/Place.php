<?php
include('../Assets/connections/connections.php');
include('Header.php');
if(isset($_POST["btnsave"])!=null)
	{
	$placename=$_POST["txtplacename"];
	$pincode=$_POST["txtpincode"];
	$districtid=$_POST["seldistrict"];
	$insqry="insert into tbl_place(place_name,place_pincode,district_id) values('$placename','$pincode','$districtid')";
	if($con->query($insqry))
	{
		echo"record saved";
	}
	else
	{
		echo"error in query";
	}
	}
	
if(isset($_GET["delID"]))
{
	$del=$_GET["delID"];
	$delqry="delete from tbl_place where place_id='$del'";
	if($con->query($delqry))
	
	{
		
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoTracks::Place</title>
<style>
  body {
    background-color: #000;
    color: #fff;
    font-family: Arial, sans-serif;
  }
  
  table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    border: 1px solid #555;
  }

  table th, table td {
    border: 1px solid #555;
    padding: 8px 12px;
    text-align: center;
  }

  table th {
    background-color: #333;
    color: #fff;
  }

  table tr:nth-child(even) {
    background-color: #222;
  }

  table tr:nth-child(odd) {
    background-color: #111;
  }

  table tr:hover {
    background-color: #444;
  }

  input[type="text"], select {
    width: 100%;
    padding: 6px 10px;
    margin: 4px 0;
    box-sizing: border-box;
    border: 1px solid #555;
    border-radius: 4px;
    background-color: #333;
    color: #fff;
  }

  input[type="submit"] {
    background-color: #555;
    border: none;
    color: #fff;
    padding: 10px 20px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;
  }

  a {
    color: #0af;
    text-decoration: none;
  }

  a:hover {
    text-decoration: underline;
  }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="Place.php">
  <table width="200" border="1">
    <tr>
      <td>PlaceName</td>
      <td><label for="txtplacename"></label>
      <input type="text" name="txtplacename" id="txtplacename" /></td>
    </tr>
    <tr>
      <td>District</td>
      <td>
        <select name="seldistrict" id="seldistrict">
        <option value =select>--select--</option>
         <?php
	$selqry="select * from tbl_district";
	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
	{
		$i++;
	?>
     <option value = <?php echo $data['district_id']?>"><?php
	 echo $data['district_name'] ?></option>
     <?php
	}
	?>
        </select>
        </td>
    </tr>
    <tr>
      <td>Pincode</td>
      <td><label for="txtpincode"></label>
      <input type="text" name="txtpincode" id="txtpincode" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsave" id="btnsave" value="Save" />
        <input type="submit" name="btncancel" id="btncancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
  <table width="287" border="1">
    <tr>
      <td width="72">SerialNo</td>
      <td width="90">PlaceName</td>
      <td width="20">Pincode</td>
      <td width="30">District</td>
      <td width="15">Action</td>
      
    </tr>

      <?php
	      $selqry="select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
	{
		$i++;
	?>
        <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data["place_name"]?></td>
        <td><?php echo $data["place_pincode"]?></td>
         <td><?php echo $data["district_name"]?></td>
        <td><a href="Place.php?delID=<?php echo $data["place_id"]?>">delete</a></td>
        
        </tr>
        <?php
	}
	?>
    
  </table>
</form>
</body>
<?php
include('Footer.php');
?>
</html>