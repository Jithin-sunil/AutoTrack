<?php
include('../Assets/connections/connections.php');
include('Header.php');
// session_start();
?>
 <?php
	$selshowroom="select * from tbl_showroom u inner join tbl_place p on u.place_id = p.place_id  inner join tbl_district d on p.district_id = d.district_id  inner join tbl_brand b on u.brand_id = b.brand_id  inner join tbl_category c on b.category_id = c.category_id where u.showroom_id='".$_SESSION['sid']."'";
    $showroom=$con->query($selshowroom);
	$data=$showroom->fetch_assoc();
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
<title>AutoTracks::MyProfile</title>
<style type="text/css">
<style>
  .profile-section {
    background-color: #006600; /* Green color */
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

  .profile-section img {
    max-width: 100%;
    height: auto;
    border-radius: 50%; /* Make the image round */
  }
  
  table {
    width: 35%;
    margin: 50px auto;
    border-collapse: collapse;
    background-color: #111;
    box-shadow: 0 0 15px rgba(0, 255, 0, 0.5);
    border-radius: 8px;
    overflow: hidden;
  }

  th, td {
    padding: 10px 15px;
    text-align: center;
    border-bottom: 1px solid #333;
  }

  th {
    background-color: #006600;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 0.1em;
  }

  tr {
    transition: background-color 0.3s, color 0.3s;
  }

  tr:hover {
    background-color: #1a1a1a;
  }

  tr:nth-child(even) {
    background-color: #1e1e1e;
  }

  tr:nth-child(odd) {
    background-color: #151515;
  }

  tr:last-child td {
    border-bottom: none;
  }

  input[type="text"], input[type="submit"] {
    margin: 20px auto;
    padding: 10px;
    width: 90%;
    border: none;
    border-radius: 5px;
  }

  input[type="text"] {
    background-color: #333;
    color: #0f0;
    box-shadow: inset 0 0 5px #0f0;
  }

  input[type="submit"] {
    background: linear-gradient(45deg, #0f0, #005500);
    color: #fff;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s ease;
  }

  input[type="submit"]:hover {
    background: linear-gradient(45deg, #005500, #0f0);
  }
</style>

</style>

</head>

<body>

<!-- <style>
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
</style> -->

<form id="form1" name="form1" method="post" action="">
  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
        <div class="custom-card-body">
          <div class="profile-section">
            <div class="text-center mb-4">
              <img src="../Assets/Files/Showroom/Photo/<?php echo $data['showroom_photo'] ?>" class="img-fluid rounded" alt="Profile Photo">
            </div>
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <th>showroom Name</th>
                  <td><?php echo $data['showroom_showroomname'] ?></td>
                </tr>
                <tr>
                  <th>brand</th>
                  <td><?php echo $data['brand_name'] ?></td>
                </tr>
                <tr>
                  <th>category</th>
                  <td><?php echo $data['category_name'] ?></td>
                </tr>
                <tr>
                  <th>Address</th>
                  <td><?php echo $data['showroom_address'] ?></td>
                </tr>
                <tr>
                  <th>District</th>
                  <td><?php echo $data['district_name'] ?></td>
                </tr>
                <tr>
                  <th>Place</th>
                  <td><?php echo $data['place_name'] ?></td>
                </tr>
                <tr>
                  <th>email</th>
                  <td><?php echo $data['showroom_email'] ?></td>
                </tr>
                <tr>
                  <th>contact</th>
                  <td><?php echo $data['showroom_contact'] ?></td>
                </tr>
                <tr>
                  <th>date of join</th>
                  <td><?php echo $data['showroom_dateofjoin'] ?></td>
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