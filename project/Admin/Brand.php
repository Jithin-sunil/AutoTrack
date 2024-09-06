<?php
include('../Assets/connections/connections.php');
include('Header.php');
if(isset($_POST['btnsubmit']))
{
	$brand=$_POST['txtbrand'];
	$category=$_POST['selecategory'];
	$insqry="insert into tbl_brand(brand_name,category_id) values('$brand','$category')";
		if($con->query($insqry))
	{
		echo "insert";
	}
}
	if(isset($_GET['delid']))
	{	
	$delqry="delete from tbl_brand where brand_id='".$_GET['delid']."'";
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
<title>AutoTracks::Brand</title>
<style>
  body {
    background-color: #000;
    color: #fff;
    font-family: Arial, sans-serif;
  }
  
  table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    border: 1px solid #555;
  }

  table th, table td {
    border: 1px solid #555;
    padding: 8px 12px;
    text-align: center;
  }

  table th {
    background-color: #333;
    color: #fff;
  }

  table tr:nth-child(even) {
    background-color: #222;
  }

  table tr:nth-child(odd) {
    background-color: #111;
  }

  table tr:hover {
    background-color: #444;
  }

  input[type="text"], select {
    width: 100%;
    padding: 6px 10px;
    margin: 4px 0;
    box-sizing: border-box;
    border: 1px solid #555;
    border-radius: 4px;
    background-color: #333;
    color: #fff;
  }

  input[type="submit"] {
    background-color: #555;
    border: none;
    color: #fff;
    padding: 10px 20px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;
  }

  a {
    color: #0af;
    text-decoration: none;
  }

  a:hover {
    text-decoration: underline;
  }
</style>
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Brand</td>
      <td><label for="txtbrand"></label>
      <input type="text" name="txtbrand" id="txtbrand" /></td>
    </tr>
    <tr>
      <td align="center">Category</td>
      <td>
       <select name="selecategory" id="selecategory">
        <option value = select>--select--</option>
         <?php
	$selqry="select * from tbl_category";
	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
	{
		$i++;
	?>
     <option value ="<?php echo $data['category_id']?>"><?php echo $data['category_name'] ?></option>
     <?php
	}
	?>
      </select>
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="269" border="1" align="center">
    <tr>
      <td width="37">Sno</td>
      <td width="86">Brand</td>
      <td width="59">Category</td>
      <td width="59">Action</td>
    </tr>
    <?php
	$selquery="select *from tbl_brand u inner join tbl_category d on u.category_id=d.category_id";
	$cate=$con->query($selquery);
	$i=0;
	while($data=$cate->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data['brand_name']; ?></td>
      <td><?php echo $data['category_name']; ?></td>
      <td><a href="Brand.php?delid=<?php echo $data['brand_id'] ;?>">delete</a></td>
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
