<?php
include('../Assets/connections/connections.php');
// session_start();
include('Header.php');
$selprodect="select * from tbl_spareparts where spareparts_id='".$_GET['orderID']."'";
    $product=$con->query($selprodect);
	$productdata=$product->fetch_assoc();
if(isset($_POST['btnsubmit']))
{
	$name=$_POST['txtname'];
	$contact=$_POST['txtcontact'];
	$address=$_POST['txtaddress'];
	$pincode=$_POST['txtpincode'];
	$price=$productdata['spareparts_price'];
	$paymentmethod=$_POST['selepaymentmethod'];
	$partsname=$productdata['spareparts_partsname'];
	$quantity=$_POST['txtquantity'];
  $showrooms=$_GET['showroomID'];
	$insert="insert into tbl_orderdeatils(orderdeatils_name,showroom_id,orderdeatils_contact,orderdeatils_address,orderdeatils_pincode,orderdeatils_price,orderdeatils_payment,orderdeatils_productname,orderdeatils_quantity)values('$name','$showrooms','$contact','$address','$pincode','$price','$paymentmethod','$partsname','$quantity')";
	if($con->query($insert))
	{
		$selpay="select * from tbl_orderdeatils";
    $user=$con->query($selpay);
	$pay=$user->fetch_assoc();
  if($paymentmethod=="Cash on delivery")
  {
    ?>
        <script>
		alert("Booking sucessfully...");
		window.location="Homepage.php";
		</script>
		<?php
  }
  else{
		?>
        <script>
		alert("Booking sucessfully...");
		window.location="Payment.php?payID=<?php echo $pay["orderdeatils_id"]?>";
		</script>
		<?php
    
	}
}
	else
	{?>
    <script>
		alert("Booking failed...");
		</script>
		<?php
	}
}
$seluser="select * from tbl_user where user_id='".$_SESSION['uid']."'";
    $user=$con->query($seluser);
	$data=$user->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoTracks::Order Details</title>
<style>
  /* General CSS for the body and table */
  body {
    font-family: Arial, sans-serif;
    background-color: #000;
    color: #fff;
    padding: 20px;
  }
  
  table {
    width: 350px; /* Adjust width as needed */
    border-collapse: collapse;
    margin: 20px auto;
    background-color: #222;
    border: 2px solid #4CAF50; /* Green border for table */
  }
  
  table td, table th {
    border: 1px solid #444;
    padding: 10px;
    text-align: left;
  }
  
  table th {
    background-color: #333;
    color: #4CAF50; /* Green text for headers */
  }
  
  /* Input field styles */
  input[type="date"] {
    padding: 8px;
    width: 100%;
    box-sizing: border-box;
  }
  
  /* Submit button styles */
  input[type="submit"] {
    background-color: #4CAF50; /* Green background for button */
    color: #fff;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    margin-top: 10px;
  }
  
  input[type="submit"]:hover {
    background-color: #45a049; /* Darker green on hover */
  }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center" >
    <tr>
      <td>Name </td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" value="<?php echo $data['user_name'] ?>"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact" value="<?php echo $data['user_contact'] ?>" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><p>
        <label for="txtaddress"></label>
        <input type="text" name="txtaddress" id="txtaddress" value="<?php echo $data['user_address'] ?>"/>
      </p></td>
    </tr>
    <tr>
      <td>Pin Code</td>
      <td><label for="txtpincode"></label>
      <input type="text" name="txtpincode" id="txtpincode" /></td>
    </tr>
    <tr>
      <td>Price</td>
      <td><?php echo $productdata['spareparts_price'] ?></td>
    </tr>
    <tr>
      <td>Payment Method</td>
      <td><label for="selepaymentmethod"></label>
        <select name="selepaymentmethod" id="selepaymentmethod">
          <option value="-----select------">-----select------</option>
          <option value="Cash on delivery">Cash on delivery</option>
          <option value="UPI">Online Banking</option>
      </select></td>
    </tr>
    <tr>
      <td>Product name</td>
      <td><?php echo $productdata['spareparts_partsname'] ?></td>
    </tr>
    <tr>
      <td>Quantity</td>
      <td><label for="txtquantity"></label>
      <input type="text" name="txtquantity" id="txtquantity" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
<?php
include('Footer.php');
?>
</html>