<?php
include('../Assets/connections/connections.php');
include('Header.php');
if(isset($_GET["delID"])!=null)
{
	$showroom_id=$_GET["delID"];
	$delqry="delete from tbl_showroom where showroom_id='$showroom_id'";
	if($con->query($delqry))
	{
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoTracks::ShowroomList</title>
<style>
  table {
    width: 90%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #1a1a1a;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
  }

  table th, table td {
    padding: 15px 20px;
    text-align: center;
    border-bottom: 1px solid #333;
  }

  table th {
    background-color: #00284d;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    font-weight: bold;
  }

  table tr {
    transition: background-color 0.3s, color 0.3s;
  }

  table tr:hover {
    background-color: #303030;
  }

  table tr:nth-child(even) {
    background-color: #242424;
  }

  table tr:nth-child(odd) {
    background-color: #1e1e1e;
  }

  table tr:last-child td {
    border-bottom: none;
  }

  /* a {
    color: #006699;
    text-decoration: none;
    padding: 8px 12px;
    border: 1px solid #006699;
    border-radius: 6px;
    transition: background-color 0.3s, color 0.3s;
  }

  a:hover {
    background-color: #006699;
    color: #fff;
  } */
</style>
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
      <td>dateofjoin</td>
      <td><p>Status</p></td>
      <td>Action</td>
    </tr>
   <?php
	      $selqry="select * from tbl_showroom u inner join tbl_place p on u.place_id = p.place_id  inner join tbl_district d on p.district_id = d.district_id inner join tbl_brand b ON u.brand_id = b.brand_id inner join tbl_category c on b.category_id=c.category_id;";
	$result=$con->query($selqry);
	$i=0;
   while($data=$result->fetch_assoc())
   {
	   $i++;
	   ?>
       <tr>
       <td><?php echo $i ?></td>
       <td><?php echo $data['showroom_showroomname'] ?></td>
       <td><?php echo $data['brand_name'] ?></td>
       <td><?php echo $data['category_name'] ?></td>
       <td><?php echo $data['showroom_contact'] ?></td>
       <td><?php echo $data['showroom_email'] ?></td>
       <td><?php echo $data['district_name'] ?></td>
       <td><?php echo $data['place_name'] ?></td>
       <td><?php echo $data['showroom_address'] ?></td>
       <td><img src="../Assets/Files/Showroom/Photo/<?php echo $data['showroom_photo'] ?>" height="50px" width="70px"></td>
       <td><img src="../Assets/Files/Showroom/Proof/<?php echo $data['showroom_proof'] ?>" height="50px" width="70px"></td>
        <td><?php echo $data['showroom_dateofjoin'] ?></td>
        <td><?php echo $data['showroom_status'] ?></td>
       <td><a href="Showroomlist.php?delID=<?php echo $data["showroom_id"]?>">delete</a></td>
        </tr>
        <?php
	}?>
  </table>
</form>
</body>
<?php
include('Footer.php');
?>
</html>