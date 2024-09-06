<?php
ob_start();

include("../Assets/connections/connections.php");
include('SessionValidation.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoTracks::::Search Vehicle</title>
<link rel="stylesheet" href="../Assets/Templates/Search/bootstrap.min.css">
<style>
    body {
        background-color: #121212; /* Dark background for the body */
        color: #e0e0e0; /* Light text color */
    }
    
    .custom-alert-box {
        z-index: 1;
        width: 20%;
        height: 10%;
        position: fixed;
        bottom: 0;
        right: 0;
        left: auto;
    }

    .alert-box {
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 10px;
        display: none;
    }

    .success {
        color: #d4edda;
        background-color: #155724; /* Dark green background */
        border-color: #c3e6cb;
    }

    .failure {
        color: #f8d7da;
        background-color: #721c24; /* Dark red background */
        border-color: #f5c6cb;
    }

    .warning {
        color: #856404;
        background-color: #fff3cd; /* Light yellow background */
        border-color: #ffeeba;
    }

    .container-fluid {
        background-color: #1e1e1e; /* Darker background for the container */
        padding: 20px;
        border-radius: 8px;
    }

    .list-group-item {
        background-color: #333; /* Dark background for list items */
        color: #e0e0e0; /* Light text color */
    }

    .form-check-input {
        margin-right: 10px;
    }

    .text-info {
        color: #18d26e !important; /* Green color for section titles */
    }

    .text-center {
        color: #e0e0e0; /* Light text color for centered text */
    }

    .alert-box img {
        display: block;
        margin: 0 auto;
    }
    .bg-info {
    background-color: #18d26e !important;
    }
    .card{
        background-color: #1b1e21;
    }
</style>
</head>

<body onload="productCheck()">
        <div class="custom-alert-box">
            <div class="alert-box success">Successful Added to Cart !!!</div>
            <div class="alert-box failure">Failed to Add Cart !!!</div>
            <div class="alert-box warning">Already Added to Cart !!!</div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <h2>AutoTrack</h2>
                    <hr>
                    <h6 class="text-info"> Name</h6>
                    <ul class="list-group">
                       
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="text" onkeyup="productCheck()" class="product_check" id="txt_name">
                                </label>
                            </div>
                        </li>
                    </ul>
                    <br />
                    <h6 class="text-info"> Select Brand</h6>
                    <ul class="list-group">
                        <?php                           
						 $selCat = "SELECT * from tbl_brand";
                            $result = $con->query($selCat);
                            while ($row=$result->fetch_assoc()) {
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" onclick="changeSub(),productCheck()" class="form-check-input product_check" value="<?php echo $row["brand_id"]; ?>" id="brand"><?php echo $row["brand_name"]; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <br />
                    <!-- <h6 class="text-info"> Select Model</h6> -->
                    <ul class="list-group" id="subcat">
                       
                    </ul>
                </div>
                <div class="col-lg-9">
                    <h5 class="text-center" id="textChange">All Products</h5>
                    <hr>
                    <div class="text-center">
                        <img src="../Assets/Templates/Search/loader.gif" id='loder' width="200" style="display: none"/>
                    </div>
                    <div class="row" id="result">
                    </div>

                </div>

            </div>
                        </div>
<script src="../Assets/Templates/Search/jquery.min.js"></script>
        <script src="../Assets/Templates/Search/bootstrap.min.js"></script>
<script src="../Assets/Templates/Search/popper.min.js"></script>
        <script>


function changeSub()
            {
                var cat = get_filter_text('brand');
                if (cat.length !== 0)
                {
                    $.ajax({
                        url: "../Assets/AjaxPages/Ajaxmodel.php?mid=" + cat,
                        success: function(response) {
                            $("#subcat").html(response);
                        }
                    });

                }
                else
                {
                    $("#subcat").html("");
                }


                function get_filter_text(text_id)
                {
                    var filterData = [];

                    $('#' + text_id + ':checked').each(function() {
                        filterData.push("\'" + $(this).val() + "\'");
                    });
                    return filterData;
                }
            }

            function addCart(id)
            {
                $.ajax({
                    url: "../Assets/AjaxPages/AjaxAddCart.php?id=" + id,
                    success: function(response) {
                        if (response.trim() === "Added to Cart")
                        {
                            $("div.success").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else if (response.trim() === "Already Added to Cart")
                        {
                            $("div.warning").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else
                        {
                            $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
                        }
                    }
                });
            }


            function productCheck(){
                    $("#loder").show();

                    var action = 'data';
                    var brand = get_filter_text('brand');
                    var model = get_filter_text('model');
					var name = document.getElementById('txt_name').value;
					
					
					


                    $.ajax({
                        url: "../Assets/AjaxPages/AjaxSearchCar.php?action=" + action +"&brand=" + brand+"&model=" + model+"&name=" + name ,
                        success: function(response) {
                            $("#result").html(response);
                            $("#loder").hide();
                            $("#textChange").text("Filtered Vehicles");
                        }
                    });


                }



                function get_filter_text(text_id)
                {
                    var filterData = [];

                    $('#' + text_id + ':checked').each(function() {
                        filterData.push($(this).val());
                    });
                    return filterData;
                }
            
        </script>
    </body>
<?php

ob_flush();
?>
</html>