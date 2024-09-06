<?php
include('../Assets/connections/connections.php');
include('Header.php');
if(isset($_GET[""])!=null)
{
	$showroom_id=$_GET["Accept"];
	$upqry="update tbl_showroom set showroom_status='1' where showroom_id='$showroom_id'";
	if($con->query($upqry))
	{
		echo "Accept";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoTracks::ShowroomReject</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Sno</td>
      <td>Showroom Name</td>
      <td>Brand Name</td>
      <td>Category</td>
      <td>Contact</td>
      <td>Email</td>
      <td>District</td>
      <td>Place</td>
      <td><p>Address</p></td>
      <td>Photo</td>
      <td>Proof</td>
      <td>Password</td>
      <td>dateofjoin</td>
      <td><p>Status</p></td>
      <td>Action</td>
    </tr>
   <?php
$selqry="select * from tbl_showroom u inner join tbl_place p on u.place_id = p.place_id  inner join tbl_district d on p.district_id = d.district_id inner join tbl_brand b ON u.brand_id = b.brand_id inner join tbl_category c on b.category_id=c.category_id ;";
	$result=$con->query($selqry);
	$i=0;
   while($data=$result->fetch_assoc())
   {
	   $i++;
	   if($data['showroom_status']==2)
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
       <td><a href="showroomverification.php?Accept=<?php echo $data["showroom_id"]?>">Accept</a></td>
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