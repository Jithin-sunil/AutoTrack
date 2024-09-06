<?php
include('../Assets/connections/connections.php');
include('Header.php');
if(isset($_POST['btnadd']))
{
    $insqry="insert into tbl_stock(stock_quantity,spareparts_id,stock_date)values('".$_POST['txtstock']."','".$_GET['sid']."',curdate())";
    if($con->query($insqry))
	{
 ?> 
     	 <script>
		alert('Stock Added')
        window.location="Spareparts.php";
		</script>
        <?php
	}
     
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoTracks::Add Stock</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0d0d0d; /* Dark background */
            color: #ffffff;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #1b1b1b;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            max-width: 300px;
            width: 100%;
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-size: 1em;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 2px solid #1db954;
            background-color: #121212;
            color: #fff;
            font-size: 1em;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #1db954;
            box-shadow: 0 0 8px #1db954;
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #1db954;
            color: #fff;
            padding: 10px;
            font-size: 1em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #16a34a; /* Darker green */
        }
    </style>
</head>
<body>
<div class="form-container">
    <form action="" method="post">
    <div class="form-group">
            <td>Quantity</td>
            <td><input type="text" name="txtstock" id=""></td>
    </div>
<div class="form-group">
            <td colspan="2" align="center"><input type="submit" name="btnadd" value="Add"></td>
            <td></td>
    </div>
    </form>
    </div>
</body>
</html>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include('Footer.php');
?>