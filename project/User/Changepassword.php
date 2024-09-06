<?php
include('../Assets/connections/connections.php');
include('Header.php');
// session_start();
if(isset($_POST['btnsubmit']))
{
	$oldpassword=$_POST['txtold'];
	$resetpassword=$_POST['txtnew'];
	$retypepassword=$_POST['txtretype'];
	$seluser="select * from tbl_user where user_id='".$_SESSION['uid']."'";
 	$user=$con->query($seluser);
	$data=$user->fetch_assoc();
	if($data['user_password']==$oldpassword)
	{
		if($resetpassword==$retypepassword)
		{
			$upsuser="update tbl_user set user_password='$resetpassword' where user_id=".$_SESSION['uid'];
			if($con->query($upsuser))
			{
			?>
       		<script>
			alert("Update sucessfully...");
			</script>
			<?php
			}
		}
		else
		{
			?>
		<script>
			alert("rest password no match retype password...");
		</script>
        <?php
		}
	}
	else
	{
		?>
        <script>
			alert("old password is incorrect...");
		</script>
         <?php
	}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoTracks::Change Password</title>
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
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Old password</td>
      <td><label for="txtold"></label>
      <input type="text" name="txtold" id="txtold" />
      <label for="txtnew"></label></td>
    </tr>
    <tr>
      <td>Reset Password</td>
      <td><label for="txtnew"></label>
      <input type="text" name="txtnew" id="txtnew" /></td>
    </tr>
    <tr>
      <td>Re-Type password</td>
      <td><label for="txtretype"></label>
      <input type="text" name="txtretype" id="txtretype" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnSubmit" value="Submit" />
      <input type="reset" name="btncancel" id="btncancel" value="cancel" /></td>
    </tr>
  </table>
</form>
</body>
<?php
include('Footer.php');
?>
</html>