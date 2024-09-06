<?php
include('../Assets/connections/connections.php');

session_start();
if(isset($_POST['btnsubmit']))
{
	$email=$_POST['txtemail'];
	$password=$_POST['txtpassword'];
	
	$seladmin="select * from tbl_admin where admin_email='".$email."' and admin_password ='".$password."'";
	$resultadmin=$con->query($seladmin);
	
	$seluser="select * from tbl_user where user_email='".$email."' and user_password ='".$password."'";
	$resultuser=$con->query($seluser);
	
	$selshowroom="select * from tbl_showroom where showroom_email='".$email."' and showroom_password ='".$password."'";
	$resultshowroom=$con->query($selshowroom);
	
	if($data=$resultadmin->fetch_assoc())
	{
		$_SESSION['aid']=$data['admin_id'];
		$_SESSION['aname']=$data['admin_name'];
		header('location:../Admin/Homepage.php');
	}
	else if($data=$resultuser->fetch_assoc())
	{
		$_SESSION['uid']=$data['user_id'];
		$_SESSION['uname']=$data['user_name'];
		header('location:../User/Homepage.php');
	}
	else if($data=$resultshowroom->fetch_assoc())
	{

    if($data['showroom_status']==1)
    {
      $_SESSION['sid']=$data['showroom_id'];
		$_SESSION['sname']=$data['showroom_name'];
		header('location:../Showroom/Homepage.php');
    }
    else if($data['showroom_status']==0)
    {
      ?>
      <script>
        alert('Your Request is Pending')
      </script>
      <?php
    }
    else
    {
      ?>
      <script>
        alert('Your Request is Rejected')
      </script>
      <?php
    }
		
	}
	else
	{
		?>
        <script>
		alert("Invalid credentials...");
		</script>
		<?php
	}
}
if(isset($_POST['btnsignup']))
{
  header('location:../Guest/SelectPage.php');
}
	?>
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
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
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
  </table>
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> -->


<link rel="stylesheet" href="../Assets/Templates/Login/snakestyle.css">
<div class="page">
  <div class="container">
    <div class="left">
      <div class="login">Login To AutoTracks</div>
      <div class="eula">By logging in you agree to the ridiculously long terms that you didn't bother to read</div>
    </div>
    <style>
      .right {
    background: #474A59;
    box-shadow: 0px 0px 40px 16px rgba(0, 0, 0, 0.22);
    color: #F1F1F2;
    position: relative;
    width: 50%;
    height: 365px;
}
</style>
    <div class="right">
      <svg viewBox="0 0 320 300">
        <defs>
          <linearGradient
                          inkscape:collect="always"
                          id="linearGradient"
                          x1="13"
                          y1="193.49992"
                          x2="307"
                          y2="193.49992"
                          gradientUnits="userSpaceOnUse">
            <stop
                  style="stop-color:#ff00ff;"
                  offset="0"
                  id="stop876" />
            <stop
                  style="stop-color:#ff0000;"
                  offset="1"
                  id="stop878" />
          </linearGradient>
        </defs>
        <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
      </svg>
      <div class="form">
        <form action="" method="post">
        <label for="txtemail">Email</label>
        <input type="email" id="email" name="txtemail">
        <label for="txtpassword">Password</label>
        <input type="password" id="password" name="txtpassword">
        <input type="submit" id="submit" name="btnsubmit" value="Submit">
        <input type="submit" id="submit" name="btnsignup" value="Sign Up">
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
<script src="../Assets/Templates/Login/snakescript.js"></script>

