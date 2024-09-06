<?php
include('..\Assets\connections\connections.php');
include('Header.php');
if(isset($_POST['btnregister']))
{
	$name=$_POST["txtname"];
	$email=$_POST["txtemail"];
	$password=$_POST["txtpassword"];
  $confirm=$_POST['txtconfirm'];
  $photo=$_FILES['filephoto']['name'];
	$tempphoto=$_FILES['filephoto']['tmp_name'];
	move_uploaded_file($tempphoto,'../Assets/Files/Admin/Photo/'.$photo);
  $selemail="select * from tbl_admin where admin_email='".$email."'";
  $res=$con->query($selemail);
  if($datamail=$res->fetch_assoc())
  {
  ?>
  <script>
    alert('Already Exisit');
  </script>
  <?php
  }
  else
  {
	$insqry="insert into tbl_admin(admin_name,admin_email,admin_password,admin_photo) values('$name','$email','$password','$photo')";
    if($confirm == $password)
    {
      if($con->query($insqry))
      {
   ?>      
      <script>
      alert('user Registration Successfull')
      </script>
          <?php
      }
    }
    else{
      ?>
          <script>
          alert("Password Doesn't Match")
          </script>
          <?php
    }
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoTracks::Admin Registration</title>
<style>
body {
    font-family: 'Roboto', Arial, sans-serif;
    background-color: #1a1a1a; /* dark background */
    color: #ffffff; /* light text */
    margin: 0;
    padding: 0;
}

form {
    background-color: #333333; /* dark background for form */
    width: 49%;
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* stronger shadow */
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
    margin-bottom: 15px;
}

table, th, td {
    border: 1px solid #333333; /* dark border */
    padding: 10px;
}

th {
    background-color: #005580; /* dark blue header */
    color: #ffffff; /* white text */
    text-align: left;
}

td {
    background-color: #1a1a1a; /* dark background for cells */
    color: #ffffff; /* white text */
}

input[type=text],
input[type=password],
input[type=file],
textarea,
select {
    width: calc(100% - 20px);
    padding: 10px;
    border: 1px solid #333333; /* dark border */
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 5px;
    margin-bottom: 10px;
    background-color: #333333; /* dark input background */
    color: #ffffff; /* light text */
    font-size: 14px;
}

input[type=submit] {
    background-color: #00d25bdb; /* dark red button */
    color: #ffffff; /* white text */
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

input[type=submit]:hover {
    background-color: #a30000; /* darker red on hover */
}

label {
    font-weight: bold;
    color: #ffffff; /* light text */
}

textarea {
    height: 120px;
    resize: vertical;
}
</style>
</head>

<body>
<form id="form1" name="form1" enctype="multipart/form-data" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Name</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="filephoto"></label>
      <input type="file" name="filephoto" id="filephoto" required/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="text" name="txtemail" id="txtemail" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpassword"></label>
      <input type="password" name="txtpassword" id="txtpassword" /></td>
    </tr>
    <tr>
      <td>Cofirm Password</td>
      <td><label for="txtconfirm"></label>
      <input type="password" name="txtconfirm" id="txtmail" required/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnregister" id="btnregister" value="Register" /></td>
    </tr>
  </table>
</form>
</body>
<?php
include('Footer.php');
?>
</html>