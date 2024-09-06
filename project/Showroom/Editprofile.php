<?php
include('../Assets/connections/connections.php');
include('Header.php');
// session_start();
if(isset($_POST['btnsubmit']))
{
	$name=$_POST['txtname'];
	$email=$_POST['txtemail'];
	$contact=$_POST['txtcontact'];
	$address=$_POST['txtaddress'];
	
	$upshowroom="update tbl_showroom set showroom_showroomname='$name',showroom_email='$email',showroom_contact='$contact',showroom_address='$address' where showroom_id=".$_SESSION['sid'];
	if($con->query($upshowroom))
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
	$selshowroom="select * from tbl_showroom u inner join tbl_place p on u.place_id = p.place_id  inner join tbl_district d on p.district_id = d.district_id  where u.showroom_id='".$_SESSION['sid']."'";
    $showroom=$con->query($selshowroom);
	$data=$showroom->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoTracks::Edit Profile</title>
<style>
  /* General styling for the body */
  body {
    font-family: Arial, sans-serif;
    background-color: #000; /* Black background */
    color: #fff; /* White text */
    padding: 20px;
  }
  
  /* Styling for the form container */
  .form-container {
	max-width: 76px;
    margin: auto;
    background-color: #222;
    padding: 22px;
    border-radius: 33px;
    box-shadow: 0 0 10px rgba(0,0,0,0.3); /* Dark shadow for the form */
  }
  
  /* Style for the table */
  table {
    width: 25%; /* Full width table */
    border: 2px solid #4CAF50; /* Green border */
    border-collapse: collapse; /* Collapse borders */
    margin-bottom: 20px; /* Space below the table */
    background-color: #333; /* Dark gray background for the table */
  }
  
  /* Style for table cells */
  td, th {
    padding: 8px;
    text-align: left;
    border: 1px solid #555; /* Dark gray border for cells */
  }
  
  /* Style for form elements */
  select, input[type="text"], input[type="date"], input[type="submit"] {
    width: calc(100% - 22px); /* Full width for form elements minus padding and border */
    padding: 8px; /* Reduced padding inside form elements */
    margin-bottom: 10px; /* Space between form elements */
    border: 1px solid #777; /* Dark gray border */
    background-color: #444; /* Dark gray background for form elements */
    color: #fff; /* White text */
    border-radius: 3px; /* Slightly rounded corners */
    box-sizing: border-box; /* Include padding and border in element's total width/height */
    font-size: 14px; /* Reduced font size */
  }
  
  /* Style for the submit button */
  #btnbooknow {
    background-color: #4CAF50; /* Green background for the button */
    color: #fff; /* White text */
    border: none; /* No border */
    cursor: pointer; /* Pointer cursor on hover */
    border-radius: 5px; /* Rounded corners */
    font-size: 16px; /* Font size */
    padding: 12px 20px; /* Padding inside the button */
    margin-top: 20px; /* Space above the button */
  }
  
  /* Center align the submit button */
  #btnbooknow-container {
    text-align: center;
  }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Name</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" value="<?php echo $data['showroom_showroomname'] ?>"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="text" name="txtemail" id="txtemail" value="<?php echo $data['showroom_email'] ?>"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact" value="<?php echo $data['showroom_contact'] ?>"/></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txtaddress"></label>
      <input type="text" name="txtaddress" id="txtaddress" value="<?php echo $data['showroom_address'] ?>"></textarea></td>
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