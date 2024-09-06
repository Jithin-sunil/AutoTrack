<?php
include('../Assets/connections/connections.php');
include('Header.php');

// if (isset($_GET['id']) && isset($_GET['trial_date'])) {
//     $trial_date = $_GET['trial_date'];
//     $ins = "INSERT INTO tbl_trial (user_id, bikedetails_id, cardetails_id, showroom_id, trial_date)
//             VALUES ('".$_SESSION['uid']."', '".$_GET['bikeid']."', '".$_GET['carid']."', '".$_GET['id']."', '".$trial_date."')";
//     if ($con->query($ins)) {
//         echo "<script>
//                 alert('Trial Booked');
//                 window.location.href='Homepage.php';
//               </script>";
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Trial</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            padding: 20px;
        }

        table {
            width: 100%;
            border: 2px solid #4CAF50;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #333;
        }

        td, th {
            padding: 8px;
            text-align: left;
            border: 1px solid #555;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
            cursor: pointer;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<table border="1" align="center">
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
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $selqry = "SELECT * FROM tbl_showroom u 
                   INNER JOIN tbl_place p ON u.place_id = p.place_id  
                   INNER JOIN tbl_district d ON p.district_id = d.district_id 
                   INNER JOIN tbl_brand b ON u.brand_id = b.brand_id 
                   INNER JOIN tbl_category c ON b.category_id = c.category_id 
                   WHERE u.showroom_status=1 and u.brand_id=".$_GET['bid'];
        $result = $con->query($selqry);
        $i = 0;
        while ($data = $result->fetch_assoc()) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['showroom_showroomname']; ?></td>
                <td><?php echo $data['brand_name']; ?></td>
                <td><?php echo $data['category_name']; ?></td>
                <td><?php echo $data['showroom_contact']; ?></td>
                <td><?php echo $data['showroom_email']; ?></td>
                <td><?php echo $data['district_name']; ?></td>
                <td><?php echo $data['place_name']; ?></td>
                <td><?php echo $data['showroom_address']; ?></td>
                <td>
                    <!-- <a href="javascript:void(0);" onclick="bookTrial('<?php echo $data['showroom_id']; ?>', '<?php echo $_GET['bikeid']; ?>', '<?php echo $_GET['carid']; ?>')">Book Trial</a> -->
                     <a href="TrialDate.php?id=<?php echo $data['showroom_id']; ?>&bikeid=<?php echo $_GET['bikeid']; ?>&carid=<?php echo $_GET['carid']; ?>">Book Trial</a>
                </td>
            </tr>
            <?php
        }
    ?>
    </tbody>
</table>

<script>
function bookTrial(showroom_id, bikeid, carid) {
    let trialDate = prompt("Please enter the trial date (YYYY-MM-DD):");
    
    if (trialDate) {
        // Regex to validate date format (YYYY-MM-DD)
        let datePattern = /^\d{4}-\d{2}-\d{2}$/;

        // Check if the entered date matches the YYYY-MM-DD format
        if (!datePattern.test(trialDate)) {
            alert("Please enter the date in the format YYYY-MM-DD.");
            return;
        }

        let currentDate = new Date();
        let enteredDate = new Date(trialDate);

        // Check if the entered date is a valid date and is in the future
        if (enteredDate instanceof Date && !isNaN(enteredDate) && enteredDate > currentDate) {
            // Redirect to a PHP script with the necessary parameters
            window.location = "ViewShowRoom.php?id=" + showroom_id +
                "&bikeid=" + bikeid +
                "&carid=" + carid +
                "&trial_date=" + trialDate;
        } else {
            alert("Please enter a valid future date.");
        }
    } else {
        alert("Booking cancelled. Please enter a valid date.");
    }
}
</script>

</body>
</html>

<?php include('Footer.php'); ?>
