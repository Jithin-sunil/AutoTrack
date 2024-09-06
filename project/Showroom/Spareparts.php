<?php
include('../Assets/connections/connections.php');
include('Header.php');
// session_start();
if(isset($_POST['btnsubmit']))
{
	$showroomid=$_SESSION['sid'];
	$brand=$_POST['txtbrand'];
	$model=$_POST['txtmodel'];
	$year=$_POST['txtyear'];
	$partsname=$_POST['txtpartsname'];
	$colour=$_POST['selecolour'];
	$stock=$_POST['txtstock'];
	$price=$_POST['txtprice'];
	$photo=$_FILES['file_photo']['name'];
	$tempphoto=$_FILES['file_photo']['tmp_name'];
	move_uploaded_file($tempphoto,'../Assets/Files/Spareparts/Photo/'.$photo);
	$insQry="insert into tbl_spareparts(showroom_id,spareparts_brand,spareparts_model,spareparts_year,spareparts_partsname,spareparts_colour,spareparts_stock,spareparts_price,spareparts_photo) values('$showroomid','$brand','$model','$year','$partsname','$colour','$stock','$price','$photo')";
if($con->query($insQry))
	{
 ?> 
     	 <script>
		alert('Spare Deatils Added Succesfully')
		</script>
        <?php
	}}
        
if(isset($_GET["delID"])!=null)
{
	$spareparts_id=$_GET["delID"];
	$delqry="delete from tbl_spareparts where spareparts_id='$spareparts_id'";
	if($con->query($delqry))
	{
		echo "delete";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoTracks::SpareParts</title>
<style>
  table {
    width: 35%;
    margin: 50px auto;
    border-collapse: collapse;
    background-color: #111;
    box-shadow: 0 0 15px rgba(0, 255, 0, 0.5);
    border-radius: 8px;
    overflow: hidden;
  }
  th, td {
    padding: 10px 15px;
    text-align: center;
    border-bottom: 1px solid #333;
  }
  th {
    background-color: #006600;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 0.1em;
  }
  tr {
    transition: background-color 0.3s, color 0.3s;
  }
  tr:hover {
    background-color: #1a1a1a;
  }
  tr:nth-child(even) {
    background-color: #1e1e1e;
  }
  tr:nth-child(odd) {
    background-color: #151515;
  }
  tr:last-child td {
    border-bottom: none;
  }
  input[type="text"], input[type="submit"] {
    margin: 20px auto;
    padding: 10px;
    width: 90%;
    border: none;
    border-radius: 5px;
  }
  input[type="text"] {
    background-color: #333;
    color: #0f0;
    box-shadow: inset 0 0 5px #0f0;
  }
  input[type="submit"] {
    background: linear-gradient(45deg, #0f0, #005500);
    color: #fff;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s ease;
  }
  input[type="submit"]:hover {
    background: linear-gradient(45deg, #005500, #0f0);
  }
  /* a {
    color: #0f0;
    text-decoration: none;
    font-weight: bold;
    margin: 0 5px;
    padding: 5px 10px;
    border: 1px solid #0f0;
    border-radius: 5px;
    transition: color 0.3s ease, background-color 0.3s ease;
  }
  a:hover {
    background-color: #0f0;
    color: #000;
  } */
</style>

</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1" align="center">
    <tr>
      <td>Brand</td>
      <td><label for="txtbrand"></label>
      <input type="text" name="txtbrand" id="txtbrand" /></td>
    </tr>
    <tr>
      <td>Model</td>
      <td><label for="txtmodel"></label>
      <input type="text" name="txtmodel" id="txtmodel" /></td>
    </tr>
    <tr>
      <td>Year</td>
      <td><label for="txtyear"></label>
      <input type="text" name="txtyear" id="txtyear" /></td>
    </tr>
    <tr>
      <td>Parts Name</td>
      <td><label for="txtpartsname"></label>
      <input type="text" name="txtpartsname" id="txtpartsname" /></td>
    </tr>
    <tr>
      <td>Colour </td>
      <td><label for="selecolour"></label>
        <select name="selecolour" id="selecolour">
          <option value="-----select-----">----select-----</option>
          <option value="Red">Red</option>
          <option value="Black">Black</option>
          <option value="White">White</option>
          <option value="Grey">Grey</option>
          <option value="Blue">Blue</option>
      </select></td>
    </tr>
    <!-- <tr>
      <td>Stock</td>
      <td><label for="txtstock"></label>
      <input type="text" name="txtstock" id="txtstock" /></td>
    </tr> -->
    <tr>
      <td>Price</td>
      <td><label for="txtprice"></label>
      <input type="text" name="txtprice" id="txtprice"  pattern="^\d+(\.\d{1,2})?$" required ></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="file_photo"></label>
      <input type="file" name="file_photo" id="file_photo" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
  </table>
  <table width="200" border="1" align="center">
    <tr>
      <td>SINO</td>
      <td>Brand</td>
      <td>Model</td>
      <td>Year</td>
      <td>Parts Name</td>
      <td>Colour</td>
      <td>Stock</td>
      <td>Price</td>
      <td>Photo</td>
      <td>Action</td>
    </tr>
    <?php
   $selqury="select * from tbl_spareparts where showroom_id=".$_SESSION['sid'];
   $user=$con->query($selqury);
   $i=0;
   while($data=$user->fetch_assoc())
   {
	   $i++;
	   ?>
    <tr>
       <td><?php echo $i ?></td>
       <td><?php echo $data['spareparts_brand'] ?></td>
       <td><?php echo $data['spareparts_model'] ?></td>
       <td><?php echo $data['spareparts_year'] ?></td>
       <td><?php echo $data['spareparts_partsname'] ?></td>
       <td><?php echo $data['spareparts_colour'] ?></td>
       <td><?php
          if($data['stock_quantity'] == 0)
          {
             echo "Out of Stock";
          }
          else{
             echo $data['spareparts_stock'];
          }
          ?></td>
       <td><?php echo $data['spareparts_price'] ?></td>
       <td><?php echo $data['spareparts_photo'] ?></td>
       <td><a href="Spareparts.php?delID=<?php echo $data["spareparts_id"]?>">delete</a>
       <a href="AddStock.php?sid=<?php echo $data["spareparts_id"]?>">Add Stock</a></td>

    </tr>
	<?php
   }
	?>
  </table>
  <p>&nbsp;</p>
</form>
<?php
include('Footer.php');
?>
</body>
</html>