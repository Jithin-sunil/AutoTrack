<?php
include('../Assets/connections/connections.php');
if(isset($_POST['btnsubmit']))
{
	$showroomname=$_POST['txtshowroomname'];
	$brandname=$_POST['selebrand'];
	$categorysection=$_POST['selecategory'];
	$email=$_POST['txtemail'];
	$contact=$_POST['txtcontact'];
	$district=$_POST['seldistrict'];
	$place=$_POST['selplace'];
	$address=$_POST['txtaddress'];
	$dateofjoin=$_POST['txtdoj'];
	$password=$_POST['txtpassword'];
	$confirm=$_POST['txtconfirm'];
	$photo=$_FILES['filephoto']['name'];
	$tempphoto=$_FILES['filephoto']['tmp_name'];
	move_uploaded_file($tempphoto,'../Assets/Files/Showroom/Photo/'.$photo);
	$proof=$_FILES['fileproof']['name'];
	$tempproof=$_FILES['fileproof']['tmp_name'];
	move_uploaded_file($tempproof,'../Assets/Files/showroom/Proof/'.$proof);
	$insQry="insert into tbl_showroom(showroom_showroomname,brand_id,showroom_email,showroom_contact,place_id,showroom_address,showroom_dateofjoin,showroom_password,showroom_photo,showroom_proof,showroom_status)
values('$showroomname','$brandname','$email','$contact','$place','$address','$dateofjoin','$password','$photo','$proof','0')";
	if($confirm==$password){
		if($con->query($insQry))
	{
 ?>      
 	   	 <script>
		alert('Showroom Registration Successfull')
		</script>
        <?php
	}
	else{
		?>
        <script>
		alert('Showroom Registration Failed')
		</script>
        <?php
	}
	}
	else{
		?>
        <script>
        alert("Password Doesn't Match")
        </script>
        <?php
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #fff; /* Fallback background color */
        background-image: url('../Assets/Templates/Main/img/intro-carousel/1.jpg'); /* Path to your background image */
        background-size: cover;
        background-position: center;
        margin: 0;
        padding: 0;
    }

    form {
      width: 400px;
      margin: 20px auto;
        background-color: #4CAF50;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table {
      width: 100%;
        background-color: black; /* Change table background color to black */
        color: white; /* Text color for table cells */
    }

    table,
    th,
    td {
        border: 1px solid #ccc;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    input[type="text"],
    input[type="password"],
    textarea,
    select {
        width: calc(100% - 12px);
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        font-size: 14px;
    }

    input[type="date"],
    input[type="file"] {
        width: calc(100% - 12px);
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        font-size: 14px;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="533" height="511" border="1" align="center">
    <tr>
      <td>Showroom Name</td>
      <td><label for="txtshowroomname"></label>
      <input type="text" name="txtshowroomname" id="txtshowroomname" required/></td>
    </tr>
    <tr>
      <td>Category Section</td>
      <td>
            <select name="selecategory">
          <option value=select>------select------</option>
           <?php
  				$selqry="select *from tbl_category";
  				$cate=$con->query($selqry);
  				while($data=$cate->fetch_assoc())
  				{
	  				
  			?>
            <option value="<?php echo $data['category_id']?>"><?php
			echo $data['category_name'] ?></option>
        	
        	<?php
				}
			?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Brand Name</td>
      <td>
        <select name="selebrand">
          <option value=select>------select------</option>
           <?php
  				$selqry="select *from tbl_brand";
  				$brand=$con->query($selqry);
  				while($data=$brand->fetch_assoc())
  				{
	  				
  			?>
            <option value="<?php echo $data['brand_id']?>"><?php
			echo $data['brand_name'] ?></option>
        	
        	<?php
				}
			?>
        </select>   
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="text" name="txtemail" id="txtemail" pattern="/^[a-zA-Z0-9.!#$%&*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/"></td></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact" required="required" pattern="[0-9]{10,10}" title="Enter Correct Contact Number" autocomplete="off"></td>
    </tr>
    <tr>
      <td>District</td>
      <td><label for="seldistrict"></label>
        <select name="seldistrict" id="seldistrict" onChange="getPlace(this.value)">
        <option value="select">---select---</option>
        	<?php
			$selqry="select * from tbl_district";
			$district=$con->query($selqry);
			while($data=$district->fetch_assoc())
			{
				$i++;
				?>
                <option value="<?php echo $data['district_id']?>"><?php echo $data['district_name'] ?></option>
                <?php
			}
			?>
            
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="selplace"></label>
        <select name="selplace" id="selplace">
      </select></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txtaddress"></label>
      <textarea name="txtaddress" id="txtaddress" cols="45" rows="5" required></textarea></td>
    </tr>
    <tr>
      <td>Date of Join</td>
      <td><input type="date" name="txtdoj" id="txtdoj" min="<?php echo date('Y-m-d'); ?>"></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="filephoto"></label>
      <input type="file" name="filephoto" id="filephoto" required/></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><label for="fileproof"></label>
      <input type="file" name="fileproof" id="fileproof" required/></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpassword"></label>
      <input type="password" name="txtpassword" id="txtpassword" required="required" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"></td>
    </tr>
    <tr>
      <td>Cofirm Password</td>
      <td><label for="txtconfirm"></label>
      <input type="password" name="txtconfirm" id="txtconfirm" required/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did) {
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?did=" + did,
		success: function (result) {
			
			$("#selplace").html(result);
		}
	});
}
</script>
</html>