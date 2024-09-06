<?php
include('../Assets/connections/connections.php');
include('Header.php');
// session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoTracks::SparePartsBooking</title>
<style>
  /* General CSS for the body and table */
  body {
    font-family: Arial, sans-serif;
    background-color: #000;
    color: #fff;
    padding: 20px;
  }
  
  table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px auto;
    background-color: #222;
  }
  
  table, th, td {
    border: 1px solid #444;
    padding: 8px;
    text-align: center;
  }
  
  th {
    background-color: #333;
  }
  
  /* Style for table rows */
  tr:nth-child(even) {
    background-color: #555;
  }
  
  /* Style for images in table cells */
  .part-image {
    max-width: 100px;
    max-height: 100px;
    border: 1px solid #777;
    border-radius: 5px;
    display: block;
    margin: 0 auto; /* Centers the image horizontally */
  }
  
  /* Style for links */
  a {
    color: #4CAF50;
    text-decoration: none;
  }
  
  a:hover {
    text-decoration: underline;
  }
</style>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1" align="center">
  <tr>
      <td>Number</td>
      <td>orderdeatils_name</td>
      <td>orderdeatils_contact</td>
      <td>orderdeatils_address</td>
      <td>orderdeatils_pincode</td>
      <td>orderdeatils_price</td>
      <td>orderdeatils_payment</td>
      <td>orderdeatils_productname</td>
      <td>orderdeatils_quantity</td>
  </tr>
    <?php
   $selqury="select * from tbl_orderdeatils where showroom_id='".$_SESSION['sid']."'";
   $user=$con->query($selqury);
   $i=0;
   while($data=$user->fetch_assoc())
   {
	   $i++;
	   ?>
    <tr>
       <td><?php echo $i ?></td>
       <td><?php echo $data['orderdeatils_name'] ?></td>
       <td><?php echo $data['orderdeatils_contact'] ?></td>
       <td><?php echo $data['orderdeatils_address'] ?></td>
       <td><?php echo $data['orderdeatils_pincode'] ?></td>
       <td><?php echo $data['orderdeatils_price'] ?></td>
       <td><?php echo $data['orderdeatils_payment'] ?></td>
       <td><?php echo $data['orderdeatils_productname'] ?></td>
       <td><?php echo $data['orderdeatils_quantity'] ?></td>
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