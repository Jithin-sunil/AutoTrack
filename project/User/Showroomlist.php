<?php
include('../Assets/connections/connections.php');
include('Header.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoTracks::Showroom List</title>
<style>
  /* General CSS for the body and table */
  body {
    font-family: Arial, sans-serif;
    background-color: #000;
    color: #fff;
    padding: 20px;
  }
  
  table {
    width: 50%;
    border-collapse: collapse;
    margin: 20px auto;
    background-color: #222;
  }
  
  table, th, td {
    border: 1px solid #444;
    padding: 8px;
    text-align: left;
  }
  
  th {
    background-color: #333;
    color: #4CAF50; /* Green text for headers */
  }
  
  /* Style for table rows */
  tr:nth-child(even) {
    background-color: #555;
  }
  
  /* Style for links */
  a {
    color: #4CAF50;
    text-decoration: none;
  }
  
  a:hover {
    text-decoration: underline;
  }
  
  /* Style for photo column */
  .photo-cell {
    width: 100px; /* Changed to width instead of max-width */
    height: 100px; /* Changed to height instead of max-height */
    overflow: hidden; /* Ensures images don't overflow */
  }
  
  .photo-cell img {
    width: 100%; /* Ensures the image fills the cell */
    height: auto; /* Maintains aspect ratio */
    display: block;
    border-radius: 5px;
  }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Category</td>
      <td>Brand Name</td>
      <td>District</td>
      <td>Place</td>
    </tr>
    <tr>
      <td>
        <select name="seletcategory" id="seletcategory" onChange="getbrand(this.value)">
        <option value="select">---select---</option>
        <?php
          $selcategory = "SELECT * FROM tbl_category";
          $category = $con->query($selcategory);
          while ($data1 = $category->fetch_assoc()) {
            ?>
            <option value="<?php echo $data1['category_id']?>"><?php echo $data1['category_name'] ?></option>
            <?php
          }
        ?>
        </select>
      </td>
      <td>
        <select name="seletbrand" id="seletbrand" onChange="filterShowrooms()">
        <option value="select">---select---</option>
        </select>
      </td>
      <td>
        <select name="seletdistrict" id="seletdistrict" onChange="getPlace(this.value)">
        <option value="select">---select---</option>
        <?php
          $seldistrict = "SELECT * FROM tbl_district";
          $district = $con->query($seldistrict);
          while ($data3 = $district->fetch_assoc()) {
            ?>
            <option value="<?php echo $data3['district_id']?>"><?php echo $data3['district_name'] ?></option>
            <?php
          }
        ?>
        </select>
      </td>
      <td>
        <select name="seletplace" id="seletplace" onChange="filterShowrooms()">
        <option value="select">---select---</option>
        </select>
      </td>
    </tr>
  </table>

  <table width="200" border="1" align="center">
    <thead>
      <tr>
        <th>Sno</th>
        <th>Showroom Name</th>
        <th>Brand Name</th>
        <th>Category</th>
        <th>Contact</th>
        <th>Email</th>
        <th>District</th>
        <th>Place</th>
        <th>Address</th>
        <th>Selection</th>
      </tr>
    </thead>
    <tbody>
    <?php

      $selqry = "SELECT * FROM tbl_showroom u 
                 INNER JOIN tbl_place p ON u.place_id = p.place_id  
                 INNER JOIN tbl_district d ON p.district_id = d.district_id 
                 INNER JOIN tbl_brand b ON u.brand_id = b.brand_id 
                 INNER JOIN tbl_category c ON b.category_id=c.category_id 
                 WHERE u.showroom_status=1";
      $result = $con->query($selqry);
      $i = 0;
      while ($data = $result->fetch_assoc()) {
        $i++;
        ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $data['showroom_showroomname'] ?></td>
          <td><?php echo $data['brand_name'] ?></td>
          <td><?php echo $data['category_name'] ?></td>
          <td><?php echo $data['showroom_contact'] ?></td>
          <td><?php echo $data['showroom_email'] ?></td>
          <td><?php echo $data['district_name'] ?></td>
          <td><?php echo $data['place_name'] ?></td>
          <td><?php echo $data['showroom_address'] ?></td>
          <td align="center"><a href="Spareparts.php?showroomID=<?php echo $data['showroom_id'] ?>">Selection</a>
         
          </td>
        </tr>
        <?php
      }
    ?>
    </tbody>
  </table>
</form>
</body>
<?php
include('Footer.php');
?>
</html>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getbrand(bid) {
    $.ajax({
        url: "../Assets/AjaxPages/Ajaxbrand.php?bid=" + bid,
        success: function (result) {
            $("#seletbrand").html(result);
            filterShowrooms();
        }
    });
}

function getPlace(did) {
    $.ajax({
        url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
        success: function (result) {
            $("#seletplace").html(result);
            filterShowrooms();
        }
    });
}

function filterShowrooms() {
    var category = $("#seletcategory").val();
    var brand = $("#seletbrand").val();
    var district = $("#seletdistrict").val();
    var place = $("#seletplace").val();

    $.ajax({
        url: "../Assets/AjaxPages/AjaxShowroomFilter.php",
        data: {
            category: category,
            brand: brand,
            district: district,
            place: place
        },
        success: function (result) {
            $("table:last tbody").html(result);
        }
    });
}

$("#seletcategory, #seletbrand, #seletdistrict, #seletplace").change(function() {
    filterShowrooms();
});
</script>
