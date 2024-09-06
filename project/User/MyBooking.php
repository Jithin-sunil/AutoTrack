<?php
ob_start();
include("Header.php");
// session_start();
include("../Assets/connections/connections.php");
	{
		$selQry="select * from tbl_booking b inner join tbl_cart c on c.booking_id = b.booking_id inner join  tbl_spareparts p on p.spareparts_id = c.spareparts_id inner join tbl_showroom k on k.showroom_id=p.showroom_id where user_id='".$_SESSION["uid"]."' and booking_status>0 and cart_status>0"; 
	$res=$con->query($selQry);
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoTracks::My Booking</title>
<style>
  /* General CSS for the body and table */
  body {
    font-family: Arial, sans-serif;
    background-color: #000;
    color: #fff;
    padding: 20px;
  }
  
  table {
    width: 50%;
    border-collapse: collapse;
    margin: 20px auto;
    background-color: #222;
  }
  
  table, th, td {
    border: 1px solid #444;
    padding: 8px;
    text-align: left;
  }
  
  th {
    background-color: #333;
    color: #4CAF50; /* Green text for headers */
  }
  
  /* Style for table rows */
  tr:nth-child(even) {
    background-color: #555;
  }
  
  /* Style for links */
  a {
    color: #4CAF50;
    text-decoration: none;
  }
  
  a:hover {
    text-decoration: underline;
  }
  
  /* Style for photo column */
  .photo-cell {
    width: 100px; /* Changed to width instead of max-width */
    height: 100px; /* Changed to height instead of max-height */
    overflow: hidden; /* Ensures images don't overflow */
  }
  
  .photo-cell img {
    width: 100%; /* Ensures the image fills the cell */
    height: auto; /* Maintains aspect ratio */
    display: block;
    border-radius: 5px;
  }
</style>
</head>

<body>
	<br><br><br><br><br>
	<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
<table border="1">
  <tr>
    <td>SlNo</td>
    <td>Name</td>
    <td>Photo</td>
    <td>Quantity</td>
    <td>Total amount</td>
    <td>Showroom Name</td>
    <td>Status</td>
  </tr>
      <?php
	  $i=0;
	while($row=$res->fetch_assoc())
	{
		$quantity=$row["cart_quantity"];
		$price=$row["spareparts_price"];
		$totalamount=$quantity*$price;
		$i++;
		
  ?>
   <tr>
	<td><?php echo $i;?></td>
    <td><?php echo $row["spareparts_partsname"];?></td>
    <td><img src="../Assets/Files/Spareparts/Photo/<?php echo $row["spareparts_photo"];?>" width="47" /></td>
    <td><?php echo $row["cart_quantity"];?></td>
    <td><?php echo  "$totalamount";?></td>
    <td><?php echo $row["showroom_showroomname"];?></td>
	<td>
    <?php 
	      if($row["booking_status"]==1 && $row["cart_status"]==1)
					{
						?>
                        payment Pending 
                        <?php 
					}
					else if($row["booking_status"]==2 && $row["cart_status"]==1)
					{
						?>
                      Payement Completed
                      
                        <?php 
					}
					else if($row["booking_status"]==1 && $row["cart_status"]==2)
					{
						?>
                       Product Packed
                      
                        <?php 
					}
					else if($row["booking_status"]==1 && $row["cart_status"]==3)
					{
						?>
                      Product Shipped
                        <?php 
					}
					else if($row["booking_status"]==1 && $row["cart_status"]==4)
					{
						?>
                           Order Completed /
                           <a href="ProductRating.php?pid=<?php echo $row["spareparts_id"]; ?>">Review</a>/
                           <!-- <a href="bill.php?id=<?php echo $row["cart_id"]; ?>">Bill</a> -->
                        <?php 
					}
					?>
                    </td>
                    
					
       </tr>
<?php
	}
	}
	
	?>
    
</table>

</form>
	</div>
</body>
<?php
include("Footer.php");
ob_flush();
?>
</html>