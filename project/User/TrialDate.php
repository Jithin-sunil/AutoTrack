<?php
include('../Assets/connections/connections.php');
include('Header.php');

if (isset($_POST['btn_submit'])) {
    $trial_date = $_POST['txtdate'];
    $ins = "INSERT INTO tbl_trial (user_id, bikedetails_id, cardetails_id, showroom_id, trial_date)
            VALUES ('".$_SESSION['uid']."', '".$_GET['bikeid']."', '".$_GET['carid']."', '".$_GET['id']."', '".$trial_date."')";
    if ($con->query($ins)) {
        echo "<script>
                alert('Trial Booked');
                window.location.href='Homepage.php';
              </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
  /* General CSS for the body and table */
  body {
    font-family: Arial, sans-serif;
    background-color: #000;
    color: #fff;
    padding: 20px;
  }
  
  table {
    width: 300px; /* Adjust width as needed */
    border-collapse: collapse;
    margin: 20px auto;
    background-color: #222;
    border: 2px solid #4CAF50; /* Green border for table */
  }
  
  table td, table th {
    border: 1px solid #444;
    padding: 10px;
    text-align: left;
  }
  
  table th {
    background-color: #333;
    color: #4CAF50; /* Green text for headers */
  }
  
  /* Input field styles */
  input[type="date"] {
    padding: 8px;
    width: 100%;
    box-sizing: border-box;
  }
  
  /* Submit button styles */
  input[type="submit"] {
    background-color: #4CAF50; /* Green background for button */
    color: #fff;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    margin-top: 10px;
  }
  
  input[type="submit"]:hover {
    background-color: #45a049; /* Darker green on hover */
  }
</style>
</head>
<body>
    <form action="" method="post">  

    <table>
        <tr>
            <td>Date</td>
            <td><input type="date" name="txtdate" min="<?php echo date('Y-m-d')?>" id=""></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="btn_submit" value="Submit"></td>
            
        </tr>
    </table>
    </form>
</body>
</html>