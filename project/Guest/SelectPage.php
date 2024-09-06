<?php
include('../Assets/connections/connections.php');
if(isset($_POST['btnshowroom']))
{
    header('location:../Guest/Showroomregistration.php');
}
	
if(isset($_POST['btnuser']))
{
    header('location:../Guest/Userregistration.php');
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
      <div class="login">SignUp To AutoTracks</div>
      <div class="eula">By SigningUp you agree to the ridiculously long terms that you didn't bother to read</div>
    </div>
    <style>
      .right {
    background: #474A59;
    box-shadow: 0px 0px 40px 16px rgba(0, 0, 0, 0.22);
    color: #F1F1F2;
    position: relative;
    width: 50%;
    height: 330px;
    #submit {
    color: #707075;
    margin-top: 40px;
    height: 61px;
    transition: color 300ms;
}
}
</style>
    <div class="right">
      <!--<svg viewBox="0 0 320 300">
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
      </svg>-->
      <div class="form">
        <form action="" method="post">
        <!--<label for="txtemail">Email</label>
        <input type="email" id="email" name="txtemail">
        <label for="txtpassword">Password</label>
        <input type="password" id="password" name="txtpassword">-->
        <input type="submit" id="submit" name="btnshowroom" value="SignUp As Showroom">
        <input type="submit" id="submit" name="btnuser" value="SignUp As User">
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
<script src="../Assets/Templates/Login/snakescript.js"></script>
