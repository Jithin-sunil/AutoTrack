<?php
include('../Assets/connections/connections.php');
include('Header.php');
if(isset($_POST['btnsubmit']))
{
	$category=$_POST['txtcategory'];
	$insqry="insert into tbl_category(category_name) values('$category')";
		if($con->query($insqry))
	{
		echo "insert";
	}
}
	if(isset($_GET['delid']))
	{	
	$delqry="delete from tbl_category where category_id='".$_GET['delid']."'";
	if($con->query($delqry))
	{
		echo "deleted";
	}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoTracks::Category</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Category</td>
      <td><label for="txtcategory"></label>
      <input type="text" name="txtcategory" id="txtcategory" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="204" border="1" align="center">
    <tr>
      <td width="37">Sno</td>
      <td width="86">Category</td>
      <td width="59">Action</td>
    </tr>
    <?php
	$selquery="select *from tbl_category";
	$cate=$con->query($selquery);
	$i=0;
	while($data=$cate->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data['category_name']; ?></td>
      <td><a href="Category.php?delid=<?php echo $data['category_id'] ;?>">delete</a></td>
    </tr>
    <?php
	}
	?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
<?php
include('Footer.php');
?>
</html>
