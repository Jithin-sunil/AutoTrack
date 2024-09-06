<option value="">select showroom</option>
<?php
include('../connections/connections.php');
$selshowroom="select * from tbl_showroom where brand_id=".$_GET['bid']." and place_id=".$_GET['pid'];
$result=$con->query($selshowroom);
while($showroom=$result->fetch_assoc())
{
	?>
	<option value="<?php echo $showroom['showroom_id'] ?>"><?php echo $showroom['showroom_showroomname']?></option>
    <?php
}
?>