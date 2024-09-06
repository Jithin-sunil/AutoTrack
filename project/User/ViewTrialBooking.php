<?php 
include('Header.php');
include('../Assets/connections/connections.php');

 $selcar="select * from tbl_trial t  inner join tbl_showroom s on t.showroom_id=s.showroom_id inner join tbl_place p on 
        s.place_id = p.place_id inner join tbl_district d on p.district_id = d.district_id 
        inner join tbl_cardetails c on t.cardetails_id = c.cardetails_id
        inner join tbl_model m on c.model_id = m.model_id  inner join tbl_brand b on m.brand_id = b.brand_id where t.user_id='".$_SESSION['uid']."'";
    $car=$con->query($selcar);

 $selbike="select * from tbl_trial t  inner join tbl_showroom s on t.showroom_id=s.showroom_id inner join tbl_place p on 
        s.place_id = p.place_id inner join tbl_district d on p.district_id = d.district_id 
        inner join tbl_bikedetails c on t.bikedetails_id = c.bikedetails_id
        inner join tbl_model m on c.model_id = m.model_id inner join tbl_brand b on m.brand_id = b.brand_id  where t.user_id='".$_SESSION['uid']."'";
    $bike=$con->query($selbike);

    if(isset($_GET['tid']))
    {
        $up="update tbl_trial set trial_status=3 where trial_id='".$_GET['tid']."'";
        $con->query($up)
        ?>
        <script>
            alert('Accepted');
            window.location='ViewTrialBooking.php';
        </script>
        <?php
    }
    if(isset($_GET['rid']))
    {
        $up="update tbl_trial set trial_status=4 where trial_id='".$_GET['rid']."'";
        $con->query($up)
        ?>
        <script>
            alert('Rejected');
            window.location='ViewTrialBooking.php';
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
  /* General styling for the body */
  body {
    font-family: Arial, sans-serif;
    background-color: #000; /* Black background */
    color: #fff; /* White text */
    padding: 20px;
  }
  
  /* Styling for the form container */
  .form-container {
	max-width: 476px;
    margin: auto;
    background-color: #222;
    padding: 22px;
    border-radius: 33px;
    box-shadow: 0 0 10px rgba(0,0,0,0.3); /* Dark shadow for the form */
  }
  
  /* Style for the table */
  table {
    width: 100%; /* Full width table */
    border: 2px solid #4CAF50; /* Green border */
    border-collapse: collapse; /* Collapse borders */
    margin-bottom: 20px; /* Space below the table */
    background-color: #333; /* Dark gray background for the table */
  }
  
  /* Style for table cells */
  td, th {
    padding: 8px;
    text-align: left;
    border: 1px solid #555; /* Dark gray border for cells */
  }
  
  /* Style for form elements */
  select, input[type="text"], input[type="date"], input[type="submit"] {
    width: calc(100% - 22px); /* Full width for form elements minus padding and border */
    padding: 8px; /* Reduced padding inside form elements */
    margin-bottom: 10px; /* Space between form elements */
    border: 1px solid #777; /* Dark gray border */
    background-color: #444; /* Dark gray background for form elements */
    color: #fff; /* White text */
    border-radius: 3px; /* Slightly rounded corners */
    box-sizing: border-box; /* Include padding and border in element's total width/height */
    font-size: 14px; /* Reduced font size */
  }
  
  /* Style for the submit button */
  #btnbooknow {
    background-color: #4CAF50; /* Green background for the button */
    color: #fff; /* White text */
    border: none; /* No border */
    cursor: pointer; /* Pointer cursor on hover */
    border-radius: 5px; /* Rounded corners */
    font-size: 16px; /* Font size */
    padding: 12px 20px; /* Padding inside the button */
    margin-top: 20px; /* Space above the button */
  }
  
  /* Center align the submit button */
  #btnbooknow-container {
    text-align: center;
  }
</style>
</head>

<body>
    <table>
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
        if($car->num_rows>0)
        {
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
                <?php echo $c['showroom_showroomname'] ?>
            </td>
            <td>
                <?php echo $c['showroom_contact']?>
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
            <td>
                <?php
                if($c['trial_status']==1)
                {
                    echo "Scheduled to"." ".$c['trial_date'];
                    

                }
                else if($c['trial_status']==2)
                {
                    echo "Scheduled to"." ".$c['trial_slotedate'];
                    ?>
            <a href="ViewTrialBooking.php?tid=<?php echo $c["trial_id"]?>">Accept</a>
            <a href="ViewTrialBooking.php?rid=<?php echo $c["trial_id"]?>">Reject</a>

                    <?php

                }
                else if($c['trial_status']==3)
                {
                    echo "Scheduled to"." ".$c['trial_slotedate'];
                }
                else if($c['trial_status']==4)
                {
                    echo " Canceled ";
                }
                else
                {
                    echo "Trial Request to"." ".$c['trial_date'];
                }
                ?>
            </td>
        </tr>
        <?php
        }
    }
    ?>
    </table>

    <table>
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
        if($bike->num_rows>0)
        {
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
                <?php echo $b['showroom_showroomname'] ?>
            </td>
            <td>
                <?php echo $b['showroom_contact']?>
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
            <td>
                <?php
                if($b['trial_status']==1)
                {
                    echo "Scheduled to"." ".$b['trial_date'];
                    

                }
                else if($b['trial_status']==2)
                {
                    echo "Scheduled to"." ".$b['trial_slotedate'];
                    ?>
            <a href="ViewTrialBooking.php?tid=<?php echo $b["trial_id"]?>">Accept</a>
            <a href="ViewTrialBooking.php?rid=<?php echo $b["trial_id"]?>">Reject</a>

                    <?php

                }
                else if($b['trial_status']==3)
                {
                    echo "Scheduled to"." ".$b['trial_slotedate'];
                }
                else if($b['trial_status']==4)
                {
                    echo " Canceled ";
                }
                else
                {
                    echo "Trial Request to"." ".$b['trial_date'];
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