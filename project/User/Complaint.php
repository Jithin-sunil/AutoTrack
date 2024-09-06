<?php
include('../Assets/connections/connections.php');
include('Header.php');
// session_start();
if(isset($_POST['btnsubmit']))
{
	$complaint=$_POST['txtcomplaint'];
    $showrooomid=$_GET['sid'];
    $user=$_SESSION['uid'];
	$inscomplaint="insert into tbl_complaint(user_id,complaint_complaints,showroom_id,complaint_date) values('$user','$complaint','$showrooomid',curdate())";
	if($con->query($inscomplaint))
	{
		?>
        <script>
		alert("Complaint is sent sucessfully...");
        window.location='Homepage.php';
		</script>
		<?php
	}
	else
	{?>
    <script>
		alert("Complaint is sent failed...");
		</script>
		<?php
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoTracks::Complaint</title>
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
      <td>complaints</td>
      <td><label for="txtcomplaint"></label>
      <textarea name="txtcomplaint" id="txtcomplaint" cols="45" rows="5"></textarea></td>
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