<option value="">select model</option>
<?php
include('../connections/connections.php');
$selmodel="select * from tbl_model where brand_id=".$_GET['mid'];
$result=$con->query($selmodel);
while($model=$result->fetch_assoc())
{
	?>
	<option value="<?php echo $model['model_id'] ?>"><?php echo $model['model_name']?></option>
    <?php
}
?>