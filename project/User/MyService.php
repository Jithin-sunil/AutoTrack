<?php
include('../Assets/connections/connections.php');
include('Header.php');

if(isset($_GET['tid']))
    {
        $up="update tbl_service set service_status=3 where service_id='".$_GET['tid']."'";
        $con->query($up)
        ?>
<script>
  alert('Accepted');
  window.location = 'MyService.php';
</script>
<?php
    }
    if(isset($_GET['rid']))
    {
        $up="update tbl_service set service_status=4 where service_id='".$_GET['rid']."'";
        $con->query($up)
        ?>
<script>
  alert('Rejected');
  window.location = 'MyService.php';
</script>
<?php
    }

// session_start();
?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>AutoTracks::My Service</title>
  <style>
    /* General body styles */
    body {
      font-family: Arial, sans-serif;
      background-color: #222;
      color: #fff;
      padding: 20px;
    }

    /* Table styles */
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px auto;
      background-color: #444;
      border: 2px solid #4CAF50;
      /* Green border */
    }

    table th,
    table td {
      border: 1px solid #555;
      padding: 10px;
      text-align: left;
    }

    /* Header styles */
    th {
      background-color: #333;
      color: #4CAF50;
      /* Green text */
    }

    /* Alternate row styles */
    tr:nth-child(even) {
      background-color: #555;
    }

    /* Link styles */
    a {
      color: #4CAF50;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    /* Status column styles */
    .status {
      font-weight: bold;
    }
  </style>
</head>

<body>
  <form id="form1" name="form1" method="post" action="">
    <table width="200" border="1" align="center">
      <tr>
        <td>Sno</td>
        <td>username</td>
        <td>Category</td>
        <td>Brand</td>
        <td>Model</td>
        <td>Year</td>
        <td>bookingdate</td>
        <td>service status</td>
        
      </tr>
      <?php
   $selqury="select * from tbl_service u inner join tbl_user p on u.user_id=p.user_id inner join tbl_category c on u.category_id=c.category_id inner join tbl_brand b on u.brand_id=b.brand_id inner join tbl_model m on u.model_id=m.model_id where u.user_id='".$_SESSION['uid']."'";
   $showroom=$con->query($selqury);
   $i=0;
   while($data=$showroom->fetch_assoc())
   {
	   $i++;
	   ?>
      <tr>
        <td>
          <?php echo $i ?>
        </td>
        <td>
          <?php echo $data['user_name'] ?>
        </td>
        <td>
          <?php echo $data['category_name'] ?>
        </td>
        <td>
          <?php echo $data['brand_name'] ?>
        </td>
        <td>
          <?php echo $data['model_name'] ?>
        </td>
        <td>
          <?php echo $data['service_year'] ?>
        </td>
        <td>
          <?php echo $data['service_date'] ?>
        </td>

        <td>
          <?php
                if($data['service_status']==1)
                {
                    echo "Scheduled to"." ".$data['service_date'];
                    

                }
                else if($data['service_status']==2)
                {
                    echo "Scheduled to"." ".$data['service_slotedate'];
                    ?>
          <a href="MyService.php?tid=<?php echo $data["service_id"]?>">Accept</a>
          <a href="MyService.php?rid=<?php echo $data["service_id"]?>">Reject</a>

          <?php

                }
                else if($data['service_status']==3)
                {
                    echo "Scheduled to"." ".$data['service_slotedate'];
                }
                else if($data['service_status']==4)
                {
                    echo " Canceled ";
                }
                else
                {
                    echo "service Request to"." ".$data['service_date'];
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
<?php
include('Footer.php');
?>

</html>