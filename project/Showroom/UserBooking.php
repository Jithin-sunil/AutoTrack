<?php
ob_start();
include("Header.php");
// session_start();
include("../Assets/connections/connections.php");
$selQry="select *from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_spareparts p on p.spareparts_id=c.spareparts_id inner join tbl_user u on u.user_id=b.user_id where p.showroom_id='".$_SESSION["sid"]."' and b.booking_status!='0' and c.cart_status!='0'";

$res=$con->query($selQry);
if(isset($_GET["cid"]))

	{
		$upQry="update tbl_cart set cart_status='".$_GET["sts"]."' where cart_id='".$_GET["cid"]."' ";
		if($con->query($upQry))
		{
			?>
            <script>
				window.location="UserBooking.php";
			</script>
            <?php
		}
	}
	?>
    
            	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoTracks::Booking</title>
<style type="text/css">
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
  </style>
</head>


<body>
	<br><br><br><br><br>
<h1 align="center">Order Details</h1>
<div id="tab" align="center">
<div align="center">
  <table  border="1">
    <tr>
      <td>SlNo</td>
	  <td>User</td>
      <td>Name</td>
      <td>Photo</td>
      <td>Quantity</td>
      <td>Price</td>
      <td>Total Amount</td>
      <td>Action</td>
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
			<td><?php echo $row['user_name']?></td>
            <td><?php echo $row["spareparts_partsname"];?></td> 
            <td><img src="../Assets/Files/Spareparts/Photo/<?php echo $row["spareparts_photo"];?>" width="47" /></td>
            <td><?php echo $row["cart_quantity"];?></td>
            <td><?php echo $row["spareparts_partsname"];?></td>
            <td><?php echo $totalamount;?></td>
	        <td>
                <?php 
					if($row["booking_status"]==0 && $row["cart_status"]==0)
					{
						echo "payment pending....";
					}
					else if($row["booking_status"]==1 && $row["cart_status"]==1)
					{
						
						?>
                        payment completed /
                        <a href="UserBooking.php?cid=<?php echo $row ["cart_id"];?>&sts=2">Pack product</a>
                        <?php 
					}
					else if($row["booking_status"]==1 && $row["cart_status"]==2)
					{
						?>
                        product packed /
                        <a href="UserBooking.php?cid=<?php echo $row ["cart_id"];?>&sts=3">Ship Product</a>
                        <?php 
					}
					else if($row["booking_status"]==1 && $row["cart_status"]==3)
					{
						?>
                        product shipped /
                        <a href="UserBooking.php?cid=<?php echo $row ["cart_id"];?>&sts=4">Product Delivered</a>
                        <?php 
					}
					else if($row["booking_status"]==1 && $row["cart_status"]==4)
					{
						?>
                       Order Completed
                        <?php 
					}
					?>
                    </td>
                    
				
       </tr>
<?php
	}
	?>
  </table>
</div>
</div>
</body>
<?php 
include("Footer.php");
ob_flush();
?>
</html>