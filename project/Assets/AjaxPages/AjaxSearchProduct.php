<?php
include("../connections/connections.php");

if (isset($_GET["action"])) {

    $sqlQry = "SELECT * FROM tbl_cardetails p 
               INNER JOIN tbl_model sc ON sc.model_id = p.model_id 
               INNER JOIN tbl_brand c ON c.brand_id = sc.brand_id 
               WHERE 1 = 1";

    $sel = "SELECT * FROM tbl_bikedetails p 
            INNER JOIN tbl_model sc ON sc.model_id = p.model_id 
            INNER JOIN tbl_brand c ON c.brand_id = sc.brand_id 
            WHERE 1 = 1";

    if (!empty($_GET["brand"])) {
        $brand = $con->real_escape_string($_GET["brand"]);
        $sqlQry .= " AND c.brand_id IN ($brand)";
        $sel .= " AND c.brand_id IN ($brand)";
    }
    if (!empty($_GET["model"])) {
        $model_id = $con->real_escape_string($_GET["model"]);
        $sqlQry .= " AND sc.model_id IN ($model_id)";
        $sel .= " AND sc.model_id IN ($model_id)";
    }
    if (!empty($_GET["name"])) {
        $name = $con->real_escape_string($_GET["name"]);
        $sqlQry .= " AND model_name LIKE '$name%'";
        $sel .= " AND model_name LIKE '$name%'";
    }

    $resultS = $con->query($sqlQry);
    $res = $con->query($sel);

    $productsFound = false;

    if ($resultS->num_rows > 0) {
        $productsFound = true;
        while ($rowS = $resultS->fetch_assoc()) {
?>

<div class="col-md-3 mb-2">
    <div class="card-deck">
        <div class="card border-secondary">
            <img src="../Assets/Files/CarDetails/Photo/<?php echo htmlspecialchars($rowS["cardetails_photo"]); ?>" class="card-img-top" height="250">
            <div class="card-img-secondary">
                <h6 class="text-light bg-info text-center rounded p-1">
                    <?php echo htmlspecialchars($rowS["model_name"]); ?>
                </h6>
            </div>
            <div class="card-body">
                <h4 class="card-title text-danger" align="center">
                    Price: <?php echo htmlspecialchars($rowS["cardetails_prize"]); ?>/-
                </h4>
                <p align="center">
                    <?php echo htmlspecialchars($rowS["brand_name"]); ?><br>
                    <?php echo htmlspecialchars($rowS["model_name"]); ?><br>
                    <?php echo htmlspecialchars($rowS["cardetails_varient"]); ?><br>
                    <?php echo htmlspecialchars($rowS["cardetails_modelyear"]); ?><br>
                    <a href="Cardetails.php?CarID=<?php echo urlencode($rowS["cardetails_id"]); ?>">view more</a>
                </p>
            </div>
        </div>
    </div>
</div>

<?php
        }
    }

    if ($res->num_rows > 0) {
        $productsFound = true;
        while ($rowb = $res->fetch_assoc()) {
    ?>

<div class="col-md-3 mb-2">
    <div class="card-deck">
        <div class="card border-secondary">
            <img src="../Assets/Files/BikeDetails/Photo/<?php echo htmlspecialchars($rowb["bikedetails_photo"]); ?>" class="card-img-top" height="250">
            <div class="card-img-secondary">
                <h6 class="text-light bg-info text-center rounded p-1">
                    <?php echo htmlspecialchars($rowb["model_name"]); ?>
                </h6>
            </div>
            <div class="card-body">
                <h4 class="card-title text-danger" align="center">
                    Price: <?php echo htmlspecialchars($rowb["bikedetails_prize"]); ?>/-
                </h4>
                <p align="center">
                    <?php echo htmlspecialchars($rowb["brand_name"]); ?><br>
                    <?php echo htmlspecialchars($rowb["model_name"]); ?><br>
                    <?php echo htmlspecialchars($rowb["bikedetails_varient"]); ?><br>
                    <?php echo htmlspecialchars($rowb["bikedetails_modelyear"]); ?><br>
                    <a href="Bikedetails.php?BikeID=<?php echo urlencode($rowb["bikedetails_id"]); ?>">view more</a>
                </p>
            </div>
        </div>
    </div>
</div>

<?php
        }
    }

    if (!$productsFound) {
        echo "<h4 align='center'>Products Not Found!!!!</h4>";
    }
}
?>
