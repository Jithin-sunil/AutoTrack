<?php
include('../Assets/connections/connections.php');
include('Header.php');
// session_start();
if(isset($_GET["Accept"])!=null)
{
	$service_id=$_GET["Accept"];
	$upqry="update tbl_service set service_status='1' where service_id='$service_id'";
	if($con->query($upqry))
	{
		echo "Accept";
	}
}
// if(isset($_GET["Reject"])!=null)
// {
// 	$service_id=$_GET["Reject"];
// 	$upqry="update tbl_service set service_status='2' where service_id='$service_id'";
// 	if($con->query($upqry))
// 	{
// 		echo "Reject";
// 	}
// }


if(isset($_GET['aid']))
{
    $id=$_GET['aid'];
    $up="update tbl_service set service_status='1' where service_id=$id";
    $con->query($up);
    ?>
    <script>
        alert('Request Approved');
    </script>
    <?php
}
// if(isset($_GET['rid']))
// {
//     $id=$_GET['rid'];
//     $up="update tbl_service set service_status='2' where service_id=$id";
//     $con->query($up);
//    ?>
   <script>
//         alert('Request Rejected');
//         // window.location='Serviceslotdate.php';
//     </script>
   <?php

// }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoTracks::ServiceDetails</title>
<style type="text/css">
   table {
    width: 90%;
    margin: 50px auto;
    border-collapse: collapse;
    background-color: #111;
    box-shadow: 0 0 15px rgba(0, 255, 0, 0.5);
    border-radius: 8px;
    overflow: hidden;
  }
  th, td {
    padding: 15px 20px;
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
  /* a {
    color: #0f0;
    text-decoration: none;
    font-weight: bold;
    margin: 0 5px;
    padding: 5px 10px;
    border: 1px solid #0f0;
    border-radius: 5px;
    transition: color 0.3s ease, background-color 0.3s ease;
  }
  a:hover {
    background-color: #0f0;
    color: #000;
  } */
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      <th>Sno</th>
      <th>UserId</th>
      <th>Username</th>
      <th>Category</th>
      <th>Brand</th>
      <th>Model</th>
      <th>Year</th>
      <th>Booking Date</th>
      <th>Service Status</th>
      <th>Action</th>
    </tr>
     <?php
       $selqury="select * from tbl_service u inner join tbl_user p on u.user_id=p.user_id inner join tbl_category c on u.category_id=c.category_id inner join tbl_brand b on u.brand_id=b.brand_id inner join tbl_model m on u.model_id=m.model_id where showroom_id='".$_SESSION['sid']."'";
       $showroom=$con->query($selqury);
       $i=0;
       while($data=$showroom->fetch_assoc())
       {
           $i++;
           ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $data['user_id'] ?></td>
          <td><?php echo $data['user_name'] ?></td>
          <td><?php echo $data['category_name'] ?></td>
          <td><?php echo $data['brand_name'] ?></td>
          <td><?php echo $data['model_name'] ?></td>
          <td><?php echo $data['service_year'] ?></td>
          <td><?php echo $data['service_date'] ?></td>
          <td><?php echo $data['service_status'] == 2 ? "Reject" : "Accept"; ?></td>
          <td>
            <!-- <a href="ServiceDetails.php?Accept=<?php echo $data["service_id"]?>">Accept</a><a href="Serviceslotdate.php?Reject=<?php echo $data["service_id"]?>">Reject</a> -->
            <?php
	  if($data['service_status']==2)
	  {
		  echo "Rescheduled to". " ". $data['service_slotedate'];
	  }
	  else if($data['service_status']==1)
      {

        echo " Scheduled to "." ".$data['service_date'];
      }
      else if($data['service_status']==3)
      {

        echo " Scheduled to "." ".$data['service_slotedate'];
      }
      else if($data['service_status']==4)
      {

        echo " Canceled ";
      }
      else 
                {
                    
                    echo "Requested to"." ".$data['service_date'];
                    ?>
                    <a href="ServiceDetails.php?aid=<?php echo $data['service_id']?>">Accept</a>
                    <a href="Serviceslotdate.php?rid=<?php echo $data['service_id']?>">Reject</a>
                    <?php
                }
                ?>
          </td>
        </tr>
        <?php
       }
       ?>
  </table>
</form>
</body>
</html>

<?php
include('Footer.php');
?>
</body>
</html>