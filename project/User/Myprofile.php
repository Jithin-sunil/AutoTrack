<?php
include('../Assets/connections/connections.php');
include('Header.php');


?>
 <?php
	$seluser="select * from tbl_user u inner join tbl_place p on u.place_id = p.place_id  inner join tbl_district d on p.district_id = d.district_id  where u.user_id='".$_SESSION['uid']."'";
    $user=$con->query($seluser);
	$data=$user->fetch_assoc();
  if(isset($_POST['btnlogout']))
  {
    ?>
    <script>
            let userResponse = confirm("Do you want to Log Out?");
            if (userResponse) {
              window.location='../Logout.php';
            } else {

            }
    </script>
    <?php
  }
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoTracks::My Profile</title>
</head>

<body>

<style>
  .profile-section {
    background-color: #000; /* Bootstrap green color */
    padding: 20px; /* Add padding for spacing */
    border-radius: 10px; /* Optional: Add rounded corners */
    color: #fff; /* Optional: Set text color to white for better contrast */
  }
  .custom-card-body {
    background-color: #393939; /* Black background color */
    color: #fff; /* White text color */
    border-radius: 8px; /* Optional: Add rounded corners */
    padding: 20px; /* Add padding for spacing */
  }
  /*.profile-section img {
    max-width: 100%;
    height: auto;
    border-radius: 50%; /* Make the image round */
  }
</style>

<form id="form1" name="form1" method="post" action="">
  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
        <div class="custom-card-body">
          <div class="profile-section">
            <div class="text-center mb-4">
              <img src="../Assets/Files/User/Photo/<?php echo $data['user_photo'] ?>" class="img-fluid rounded" alt="Profile Photo">
            </div>
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <th>Name</th>
                  <td><?php echo $data['user_name'] ?></td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td><?php echo $data['user_email'] ?></td>
                </tr>
                <tr>
                  <th>Contact</th>
                  <td><?php echo $data['user_contact'] ?></td>
                </tr>
                <tr>
                  <th>Address</th>
                  <td><?php echo $data['user_address'] ?></td>
                </tr>
                <tr>
                  <th>District</th>
                  <td><?php echo $data['district_name'] ?></td>
                </tr>
                <tr>
                  <th>Place</th>
                  <td><?php echo $data['place_name'] ?></td>
                </tr>
              </tbody>
            </table>
            <div class="text-center">
              <a href="Editprofile.php" class="btn btn-primary mr-3">Edit Profile</a>
              <a href="Changepassword.php" class="btn btn-secondary">Change Password</a>
              <br><br>
              <input type="submit" name="btnlogout" class="btn btn-secondary" value="Log Out" /></td>
            </div>
          </div>
</div>
        </div>
      </div>
    </div>
  </div>
</form>

</body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include('Footer.php');
?>
</html>