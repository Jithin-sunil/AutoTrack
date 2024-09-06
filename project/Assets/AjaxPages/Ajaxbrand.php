<option value="select">--Select--</option>
<?php
include('../connections/connections.php');
$selbrand="select * from tbl_brand where category_id=".$_GET['bid'];
$result=$con->query($selbrand);
while($brand=$result->fetch_assoc())
{
	?>
	<option value="<?php echo $brand['brand_id'] ?>"><?php echo $brand['brand_name']?></option>
    <?php
}
?>