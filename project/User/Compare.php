<?php
include('SessionValidation.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoTracks::Comparison</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #333;
    color: #fff;
    margin: 0;
    padding: 20px;
}
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    background-color: #1e1e1e;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}
h1 {
    text-align: center;
    margin-bottom: 30px;
    color: #4caf50;
}
.form-container {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 30px;
}
form {
    width: 48%;
}
table {
    width: 100%;
    border-collapse: collapse;
}
td, th {
    padding: 15px;
    border: 1px solid #444;
    text-align: center;
}
th {
    background-color: #333;
    color: #4caf50;
}
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #555;
    border-radius: 4px;
    font-size: 16px;
    background-color: #222;
    color: #fff;
}
.result-container {
    display: flex;
    justify-content: space-around;
    margin-top: 20px;
}
.result {
    background-color: #1e1e1e;
    border: 1px solid #444;
    border-radius: 8px;
    padding: 20px;
    width: 45%;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    text-align: center;
}
.result h3 {
    margin-top: 0;
    color: #4caf50;
}
.result p {
    margin: 5px 0;
    color: #ccc;
}
@media (max-width: 768px) {
    .form-container, .result-container {
        flex-direction: column;
        align-items: center;
    }
    form, .result {
        width: 100%;
        margin-bottom: 20px;
    }
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Vehicle Comparison</h1>
        <div class="form-container">
            <form action="" method="post">
                <table>
                    <tr>
                        <th>Category</th>
                    </tr>
                    <tr>
                        <td> <select name="selecategory" id="selecategory" onchange="getBrand(this.value)">
                            <option value="">--Select--</option>
                            <?php
                                include('../Assets/connections/connections.php'); 
                                $selqry = "SELECT * FROM tbl_category";
                                $res = $con->query($selqry);
                                while ($resdata = $res->fetch_assoc()) {
                                    echo "<option value='{$resdata['category_id']}'>{$resdata['category_name']}</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                 </table>
                            </form>
                </div>
                <div class="form-container">
                <form action="" method="post">
                <table>
                    <tr>
                        <th>Brand</th>
                        <th>Model</th>
                    </tr>
                    <tr>
                        <td>
                            <select name="sel_brand1" id="sel_brand1" onchange="getModel(this.value, 1)">
                                <option value="">--Select--</option>
                                <?php
                                // include('../Assets/connections/connections.php'); 
                                // $selqry = "SELECT * FROM tbl_brand";
                                // $res = $con->query($selqry);
                                // while ($resdata = $res->fetch_assoc()) {
                                //     echo "<option value='{$resdata['brand_id']}'>{$resdata['brand_name']}</option>";
                                // }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="seletmodel1" id="seletmodel1" onchange="search(this.value, 1)">
                                <option value="">--Select--</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </form>
            <form action="" method="post">
                <table>
                    <tr>
                        <th>Brand</th>
                        <th>Model</th>
                    </tr>
                    <tr>
                        <td>
                            <select name="sel_brand2" id="sel_brand2" onchange="getModel(this.value, 2)">
                                <option value="">--Select--</option>
                                <?php
                                // include('../Assets/connections/connections.php'); 
                                // $selqry = "SELECT * FROM tbl_brand";
                                // $res = $con->query($selqry);
                                // while ($resdata = $res->fetch_assoc()) {
                                //     echo "<option value='{$resdata['brand_id']}'>{$resdata['brand_name']}</option>";
                                // }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="seletmodel2" id="seletmodel2" onchange="search(this.value, 2)">
                                <option value="">--Select--</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <div class="result-container">
            <div class="result" id="result1">
               <?php
               $se="SELECT * from tbl_cardetails p inner join tbl_model sc on sc.model_id=p.model_id inner join tbl_brand c on c.brand_id=sc.brand_id";
               $d=$con->query($se);
               while($r=$d->fetch_assoc())
               {
                ?>
                <p><img src="../Assets/Files/CarDetails/Photo/<?php echo $r['cardetails_photo'] ?>" width="150" height="150" alt=""></p>
                <h3><?php echo $r["model_name"]?></h3>
                <p>Price: <?php echo $r["cardetails_prize"]?></p>
                
                <!-- <p><a href="#" onclick="addCart(<?php echo $r['cardetails_id']?>)"> Buy</a></p> -->
                <?php
                }
                ?>

              
            </div>
            <div class="result" id="result2">
            <?php
               $se="SELECT * from tbl_cardetails p inner join tbl_model sc on sc.model_id=p.model_id inner join tbl_brand c on c.brand_id=sc.brand_id";
               $d=$con->query($se);
               while($r=$d->fetch_assoc())
               {
                ?>
                <p><img src="../Assets/Files/CarDetails/Photo/<?php echo $r['cardetails_photo'] ?>" width="150" height="150" alt=""></p>
                <h3><?php echo $r["model_name"]?></h3>
                <p>Price: <?php echo $r["cardetails_prize"]?></p>
                
                <!-- <p><a href="#" onclick="addCart(<?php echo $r['cardetails_id']?>)"> Buy</a></p> -->
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <script src="../Assets/JQ/jQuery.js"></script>
    <script>
        function getBrand(categoryId) {
            $.ajax({
                url: "../Assets/AjaxPages/Ajaxbrand.php",
                type: "GET",
                data: { bid: categoryId },
                success: function(result) {
                    $("#sel_brand1").html(result);
                    $("#sel_brand2").html(result);
                }
            });
        }
        function getModel(brandId, formNumber) {
            $.ajax({
                url: "../Assets/AjaxPages/Ajaxmodel.php",
                type: "GET",
                data: { mid: brandId },
                success: function(result) {
                    $("#seletmodel" + formNumber).html(result);
                }
            });
        }

        function search(modelId, formNumber) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxCompare.php",
                type: "GET",
                data: { did: modelId },
                success: function(result) {
                    $("#result" + formNumber).html(result);
                }
            });
        }
    </script>
</body>
<?php
// include('Footer.php');
?>
</html>
