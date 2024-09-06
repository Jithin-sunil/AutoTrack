<?php
include('../Assets/connections/connections.php');
include('Header.php');
if(isset($_GET["Accept"])!=null)
{
	$showroom_id=$_GET["Accept"];
	$upqry="update tbl_showroom set showroom_status='1' where showroom_id='$showroom_id'";
	if($con->query($upqry))
	{
		echo "Accept";
	}
}
if(isset($_GET["Reject"])!=null)
{
	$showroom_id=$_GET["Reject"];
	$upqry="update tbl_showroom set showroom_status='2' where showroom_id='$showroom_id'";
	if($con->query($upqry))
	{
		echo "Reject";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoTracks::Showroom</title>
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
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      <th>Sno</th>
      <th>Showroom Name</th>
      <th>Brand Name</th>
      <th>Category</th>
      <th>Contact</th>
      <th>Email</th>
      <th>District</th>
      <th>Place</th>
      <th>Address</th>
      <th>Photo</th>
      <th>Proof</th>
      <th>Password</th>
      <th>Date of Join</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
   <?php
$selqry="select * from tbl_showroom u inner join tbl_place p on u.place_id = p.place_id  inner join tbl_district d on p.district_id = d.district_id inner join tbl_brand b ON u.brand_id = b.brand_id inner join tbl_category c on b.category_id=c.category_id;";
	$result=$con->query($selqry);
	$i=0;
   while($data=$result->fetch_assoc())
   {
	   $i++;
	   if($data['showroom_status']==0)
	   {
	   ?>
       <tr>
       <td><?php echo $i ?></td>
       <td><?php echo $data['showroom_showroomname'] ?></td>
       <td><?php echo $data['brand_id'] ?></td>
       <td><?php echo $data['category_id'] ?></td>
       <td><?php echo $data['showroom_contact'] ?></td>
       <td><?php echo $data['showroom_email'] ?></td>
       <td><?php echo $data['district_id'] ?></td>
       <td><?php echo $data['place_id'] ?></td>
       <td><?php echo $data['showroom_address'] ?></td>
       <td><?php echo $data['showroom_photo'] ?></td>
       <td><?php echo $data['showroom_proof'] ?></td>
       <td><?php echo $data['showroom_password'] ?></td>
       <td><?php echo $data['showroom_dateofjoin'] ?></td>
       <td><?php echo $data['showroom_status'] ?></td>
       <td><a href="Showroomverification.php?Accept=<?php echo $data["showroom_id"]?>">Accept</a><a href="Showroomverification.php?Reject=<?php echo $data["showroom_id"]?>">Reject</a></td>
       </tr>
        <?php
	   }
	}?>
  </table>
</form>
</body>
<?php
include('Footer.php');
?>
</html>
