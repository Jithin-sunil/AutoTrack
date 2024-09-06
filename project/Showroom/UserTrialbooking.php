<?php 
include('Header.php');
include('../Assets/connections/connections.php');

   $selcar="select * from tbl_trial t  inner join tbl_user s on t.user_id=s.user_id inner join tbl_place p on 
        s.place_id = p.place_id inner join tbl_district d on p.district_id = d.district_id 
        inner join tbl_cardetails c on t.cardetails_id = c.cardetails_id
        inner join tbl_model m on c.model_id = m.model_id  inner join tbl_brand b on m.brand_id = b.brand_id where t.showroom_id='".$_SESSION['sid']."'";
    $car=$con->query($selcar);

   $selbike="select * from tbl_trial t  inner join tbl_user s on t.user_id=s.user_id inner join tbl_place p on 
        s.place_id = p.place_id inner join tbl_district d on p.district_id = d.district_id 
        inner join tbl_bikedetails c on t.bikedetails_id = c.bikedetails_id
        inner join tbl_model m on c.model_id = m.model_id inner join tbl_brand b on m.brand_id = b.brand_id  where t.showroom_id='".$_SESSION['sid']."'";
    $bike=$con->query($selbike);


    if(isset($_GET['aid']))
    {
        $id=$_GET['aid'];
        $up="update tbl_trial set trial_status='1' where trial_id=$id";
        $con->query($up);
        ?>
        <script>
            alert('Request Approved');
        </script>
        <?php
    }
    if(isset($_GET['rid']))
    {
        $id=$_GET['rid'];
        $up="update tbl_trial set trial_status='2' where trial_id=$id";
        $con->query($up);
       ?>
        <script>
            alert('Request Rejected');
            window.location='Trialslotdate.php';
        </script>
        <?php

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
  </style>
</head>

<body>
   
    <table>
    <?php

if($car->num_rows>0)
{
    ?>
        <tr>
            <td>#</td>
            <td>Showroom name</td>
            <td>Contact</td>
            <td>District</td>
            <td>place</td>
            <td>Brand</td>
            <td>Model</td>
            <td>Photo</td>
            <td>status</td>
        </tr>
        <?php
        
            $i=0;
            while($c=$car->fetch_assoc())
            {

                $i++;
       
        ?>
        <tr>
            <td>
                <?php echo $i?>
            </td>
            <td>
                <?php echo $c['user_name'] ?>
            </td>
            <td>
                <?php echo $c['user_contact']?>
            </td>
            <td>
                <?php echo $c['place_name']?>
            </td>
            <td>
                <?php echo $c['district_name']?>
            </td>
            <td>
                <?php echo $c['brand_name']?>
            </td>
            <td>
                <?php  echo $c['model_name']?>
            </td>
            <td>
                <img src="../Assets/Files/CarDetails/Photo/<?php echo $c['cardetails_photo']?>" alt="" width="50px" height="50px">
            </td>
            <td><?php
	  if($c['trial_status']==2)
	  {
		  echo "Rescheduled to". " ". $c['trial_slotedate'];
	  }
	  else if($c['trial_status']==1)
      {

        echo " Scheduled to "." ".$c['trial_date'];
      }
      else if($c['trial_status']==3)
      {

        echo " Scheduled to "." ".$c['trial_slotedate'];
      }
      else if($c['trial_status']==4)
      {

        echo " Canceled ";
      }
      else 
                {
                    
                    echo "Requested to"." ".$c['trial_date'];
                    ?>
                    <a href="UserTrialbooking.php?aid=<?php echo $c['trial_id']?>">Accept</a>
                    <a href="Trialslotdate.php?rid=<?php echo $c['trial_id']?>">Reject</a>
                    <?php
                }
                ?>

    
	  
	  
	  </td>
            <!-- <td>
                <?php
                if($c['trial_status']==0)
                {
                    echo "Requested to"." ".$c['trial_date'];
                    ?>
                    <a href="UserTrialbooking.php?aid=<?php echo $c['trial_id']?>">Accept</a>
                    <a href="Trialslotdate.php?rid=<?php echo $c['trial_id']?>">Reject</a>
                    <?php
                }
                ?>
            </td> -->
            
        </tr>
        <?php
        }
    }

    
    
   else if($bike->num_rows>0)
    {
    ?>
        <tr>
            <td>#</td>
            <td>Showroom name</td>
            <td>Contact</td>
            <td>District</td>
            <td>place</td>
            <td>Brand</td>
            <td>Model</td>
            <td>Photo</td>
            <td>Status</td>
        </tr>
        <?php
        
            $i=0;
            while($b=$bike->fetch_assoc())
            {

                $i++;
       
        ?>
        <tr>
            <td>
                <?php echo $i?>
            </td>
            <td>
                <?php echo $b['user_name'] ?>
            </td>
            <td>
                <?php echo $b['user_contact']?>
            </td>
            <td>
                <?php echo $b['place_name']?>
            </td>
            <td>
                <?php echo $b['district_name']?>
            </td>
            <td>
                <?php echo $b['brand_name']?>
            </td>
            <td>
                <?php  echo $b['model_name']?>
            </td>
            <td>
                <img src="../Assets/Files/BikeDetails/Photo/<?php echo $b['bikedetails_photo']?>" alt="" width="50px" height="50px">
            </td>
            <td><?php
	  if($b['trial_status']==2)
	  {
		  echo "Rescheduled to". " ". $b['trial_slotedate'];
	  }
	  else if($b['trial_status']==1)
      {

        echo " Scheduled to "." ".$b['trial_date'];
      }
      else if($b['trial_status']==3)
      {

        echo " Scheduled to "." ".$b['trial_slotedate'];
      }
      else if($b['trial_status']==4)
      {

        echo " Canceled ";
      }
      else 
                {
                    
                    echo "Requested to"." ".$b['trial_date'];
                    ?>
                    <a href="UserTrialbooking.php?aid=<?php echo $b['trial_id']?>">Accept</a>
                    <a href="Trialslotdate.php?rid=<?php echo $b['trial_id']?>">Reject</a>
                    <?php
                }
                ?>

    
	  
	
	  </td>
            
        </tr>
        <?php
        }
    }
    ?>
    </table>
</body>

</html>
<?php
include('Footer.php');
?>