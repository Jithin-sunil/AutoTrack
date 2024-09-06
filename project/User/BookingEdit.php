<?php
include('../Assets/connections/connections.php');
include('Header.php');
if(isset($_POST['btnsubmit']))
{
	$date=$_POST['txtdate'];
	$update="update tbl_service set service_date='$date',service_status=0 where user_id=".$_GET['uid'];
	if($con->query($update))
	{
		?>
        <script>
		alert("Update sucessfully...");
		</script>
		<?php
	}
	else
	{?>
    <script>
		alert("Update failed...");
		</script>
		<?php
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoTracks::Booking Edit</title>
<style>
  /* General CSS for the body and table */
  body {
    font-family: Arial, sans-serif;
    background-color: #000;
    color: #fff;
    padding: 20px;
  }
  
  table {
    width: 300px; /* Adjust width as needed */
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
<form name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Change Schedule Date</td>
      <td><label for="txtdate"></label>
      <input type="date" name="txtdate" id="txtdate" value=""/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Update" /></td>
    </tr>
  </table>
</form>
</body>
<?php
include('Footer.php');
?>
</html>