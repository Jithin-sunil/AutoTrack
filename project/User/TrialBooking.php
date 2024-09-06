<?php
include('../Assets/connections/connections.php');
include('Header.php');
// session_start();
if(isset($_POST['btnbooknow']))
{
	// $category=$_POST['seletcategory'];
	// $brand=$_POST['seletbrand'];
	// $model=$_POST['seletmodel'];
	// $year=$_POST['txtyear'];
	// $place=$_POST['seletplace'];
	$servicecenter=$_POST['seletservicecenter'];
	$user=$_SESSION['uid'];
	$selectyourbookingdate=$_POST['txtselectyourbookingdate'];
  $carid=$_GET['CarID'];
  $bikeid=$_GET['BikeID'];
  if($carid != '0')
  {
    $inscar="insert into tbl_trial(user_id,bikedetails_id,cardetails_id,showroom_id,trial_date,trial_status)values('$user','0','$carid','$servicecenter','$selectyourbookingdate','0')";
	if($con->query($inscar))
	{
		?>
        <script>
		alert("Car Trial Booking sucessfully...");
		</script>
		<?php
	}
	else
	{?>
    <script>
		alert("Booking failed...");
		</script>
		<?php
	}
  }
  else
  {
    $insbike="insert into tbl_trial(user_id,bikedetails_id,cardetails_id,showroom_id,trial_date,trial_status)values('$user','$bikeid','0','$servicecenter','$selectyourbookingdate','0')";
	if($con->query($insbike))
	{
		?>
        <script>
		alert("Bike trial Booking sucessfully...");
		</script>
		<?php
	}
	else
	{?>
    <script>
		alert("Booking failed...");
		</script>
		<?php
	}
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoTracks::Trial Booking</title>
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
<div class="form-container">
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <!-- <tr>
      <td>Category</td>
      <td><label for="seletcategory"></label>
        <select name="seletcategory" id="seletcategory" onChange="getbrand(this.value)">
        <option value="select">---select---</option>
        	<?php
			$selcategory="select * from tbl_category";
			$category=$con->query($selcategory);
			while($data1=$category->fetch_assoc())
			{
				$i++;
				?>
                <option value="<?php echo $data1['category_id']?>"><?php echo $data1['category_name'] ?></option>
                <?php
			}
			?>
      </select></td>
    </tr>
    <tr>
      <td>Brand</td>
      <td><label for="seletbrand"></label>
        <select name="seletbrand" id="seletbrand" onChange="getmodel(this.value)">
      </select></td>
    </tr>
    <tr>
      <td>Model</td>
      <td><label for="seletmodel"></label>
        <select name="seletmodel" id="seletmodel">
      </select></td>
    </tr>
    <tr>
      <td>Year</td>
      <td><label for="txtyear"></label>
      <input type="text" name="txtyear" id="txtyear" /></td>
    </tr> -->
    <tr>
      <td>District</td>
      <td><label for="seletdistrict"></label>
        <select name="seletdistrict" id="seletdistrict" onChange="getPlace(this.value)">
            <option value="select">---select---</option>
        	<?php
			$seldistrict="select * from tbl_district";
			$district=$con->query($seldistrict);
			while($data3=$district->fetch_assoc())
			{
				$i++;
				?>
                <option value="<?php echo $data3['district_id']?>"><?php echo $data3['district_name'] ?></option>
                <?php
			}
			?>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="seletplace"></label>
        <select name="seletplace" id="seletplace" onChange="getshowroom(this.value,document.getElementById('seletbrand').value)">
      </select></td>
    </tr>
    <tr>
      <td>Service Center</td>
      <td><label for="seletservicecenter"></label>
        <select name="seletservicecenter" id="seletservicecenter">
      </select></td>
    </tr>
    <tr>
      <td>Select your trial date</td>
      <td><label for="txtselectyourbookingdate"></label>
      <input type="date" name="txtselectyourbookingdate" id="txtselectyourbookingdate" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnbooknow" id="btnbooknow" value="Book Now" /></td>
    </tr>
  </table>
  </div>
</form>
</body>
<?php
include('Footer.php');
?>
<script src="../Assets/JQ/jQuery.js"></script>
<!-- <script>
function getbrand(bid) {
	$.ajax({
		url:"../Assets/AjaxPages/Ajaxbrand.php?bid=" + bid,
		success: function (result) {
			
			$("#seletbrand").html(result);
		}
	});
}
</script>
<script>
function getmodel(mid) {
	$.ajax({
		url:"../Assets/AjaxPages/Ajaxmodel.php?mid=" + mid,
		success: function (result) {
			
			$("#seletmodel").html(result);
		}
	});
}
</script> -->
<script>
function getPlace(did) {
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?did=" + did,
		success: function (result) {
			
			$("#seletplace").html(result);
		}
	});
}

function getshowroom(pid,bid) {
	$.ajax({
		url:"../Assets/AjaxPages/Ajaxshowroom.php?pid=" + pid +"&bid="+ bid,
		success: function (result) {
			
			$("#seletservicecenter").html(result);
		}
	});
}
</script>
</html>