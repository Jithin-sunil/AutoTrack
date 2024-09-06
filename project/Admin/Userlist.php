<?php
include('../Assets/connections/connections.php');
include('Header.php');
if(isset($_GET["delID"])!=null)
{
	$district_id=$_GET["delID"];
	$delqry="delete from tbl_user where user_id='$district_id'";
	if($con->query($delqry))
	{
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoTracks::UserList</title>
<style>
body {
    background-color: #000;
    color: #fff;
    font-family: Arial, sans-serif;
  }
  
  table {
    width: 90%;
    margin: 20px auto;
    border-collapse: collapse;
    border: 1px solid #444;
  }

  table th, table td {
    border: 1px solid #444;
    padding: 8px 12px;
    text-align: center;
  }

  table th {
    background-color: #222;
    color: #0f0;
  }

  table tr:nth-child(even) {
    background-color: #111;
  }

  table tr:nth-child(odd) {
    background-color: #1a1a1a;
  }

  table tr:hover {
    background-color: #333;
  }

  a {
    color: #0f0;
    text-decoration: none;
  }

  a:hover {
    text-decoration: underline;
  }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
  <table width="200" border="1" align="center">
    <tr>
      <td>Sno</td>
      <td>Name</td>
      <td>Email</td>
      <td>Place</td>
      <td>Address</td>
      <td>Photo</td>
      <td>Proof</td>
      <td>Password</td>
      <td>Action</td>
    </tr>
   <?php
   $selqury="select * from tbl_user";
   $user=$con->query($selqury);
   $i=0;
   while($data=$user->fetch_assoc())
   {
	   $i++;
	   ?>
       <tr>
       <td><?php echo $i ?></td>
       <td><?php echo $data['user_name'] ?></td>
       <td><?php echo $data['user_email'] ?></td>
       <td><?php echo $data['place_id'] ?></td>
       <td><?php echo $data['user_address'] ?></td>
       <td><?php echo $data['user_photo'] ?></td>
       <td><?php echo $data['user_proof'] ?></td>
       <td><?php echo $data['user_password'] ?></td>
       <td><a href="Userlist.php?delID=<?php echo $data["user_id"]?>">delete</a></td>
        </tr>
        <?php
	}?>
  </table>
</form>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</body>
<?php
include('Footer.php');
?>
</html>