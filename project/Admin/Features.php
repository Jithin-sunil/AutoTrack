<?php
include('Header.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoTracks::CarFeatures</title>
<style>
    body {
        font-family: Arial, sans-serif;
        /* display: flex; */
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f4f4f4; /* Optional: Light background color for contrast */
    }
    .button-container {
        text-align: center;
    }
    .button {
        display: inline-block;
        padding: 10px 20px;
        margin: 10px;
        font-size: 16px;
        font-weight: bold;
        text-decoration: none;
        color: #fff;
        background-color: #000;
        border: 2px solid #000;
        border-radius: 5px;
        transition: background-color 0.3s, border-color 0.3s;
    }
    .button:hover {
        background-color: #008000; /* Green color */
        border-color: #008000;
    }
</style>
</head>
<body>
    <div class="button-container">
        <a href="Braketype.php" class="button">Different Type of Brakes</a><br>
        <a href="Drivetype.php" class="button">Different Type of Drive</a><br>
        <a href="Emissionnorms.php" class="button">Different Type of Emission norms</a><br>
        <a href="Fueltype.php" class="button">Different Type of Fuel type</a><br>
        <a href="Steeringtype.php" class="button">Different Type of Steering</a><br>
        <a href="Transmissiontype.php" class="button">Different Type of Transmission</a><br>
    </div>
</body>
<?php
include('Footer.php');
?>
</html>
