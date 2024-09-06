<?php
include('../connections/connections.php');

$category = isset($_GET['category']) ? $_GET['category'] : 'select';
$brand = isset($_GET['brand']) ? $_GET['brand'] : 'select';
$district = isset($_GET['district']) ? $_GET['district'] : 'select';
$place = isset($_GET['place']) ? $_GET['place'] : 'select';

$query = "SELECT * FROM tbl_showroom u 
          INNER JOIN tbl_place p ON u.place_id = p.place_id  
          INNER JOIN tbl_district d ON p.district_id = d.district_id 
          INNER JOIN tbl_brand b ON u.brand_id = b.brand_id 
          INNER JOIN tbl_category c ON b.category_id=c.category_id 
          WHERE u.showroom_status = 1";

if ($category != 'select') {
    $query .= " AND b.category_id = '$category'";
}

if ($brand != 'select') {
    $query .= " AND u.brand_id = '$brand'";
}

if ($district != 'select') {
    $query .= " AND p.district_id = '$district'";
}

if ($place != 'select') {
    $query .= " AND u.place_id = '$place'";
}

$result = $con->query($query);


if ($result->num_rows > 0) {
    $i = 0;
    while ($data = $result->fetch_assoc()) {
        $i++;
        echo "<tr>";
        echo "<td>{$i}</td>";
        echo "<td>{$data['showroom_showroomname']}</td>";
        echo "<td>{$data['brand_name']}</td>";
        echo "<td>{$data['category_name']}</td>";
        echo "<td>{$data['showroom_contact']}</td>";
        echo "<td>{$data['showroom_email']}</td>";
        echo "<td>{$data['district_name']}</td>";
        echo "<td>{$data['place_name']}</td>";
        echo "<td>{$data['showroom_address']}</td>";
        echo "<td align='center'><a href='Spareparts.php?showroomID={$data["showroom_id"]}'>Selection</a></td>";
        echo "</tr>";
    }
} 
?>
