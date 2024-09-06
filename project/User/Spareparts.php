<?php
include('../Assets/connections/connections.php');
include('Header.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<title>AutoTracks::SpareParts</title>
<style>
  /* General CSS for the body and table */
  body {
    font-family: Arial, sans-serif;
    background-color: #000;
    color: #fff;
    padding: 20px;
  }
  
  table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px auto;
    background-color: #222;
  }
  
  table, th, td {
    border: 1px solid #444;
    padding: 8px;
    text-align: center;
  }
  
  th {
    background-color: #333;
  }
  
  /* Style for table rows */
  tr:nth-child(even) {
    background-color: #555;
  }
  
  /* Style for images in table cells */
  .part-image {
    max-width: 100px;
    max-height: 100px;
    border: 1px solid #777;
    border-radius: 5px;
    display: block;
    margin: 0 auto; /* Centers the image horizontally */
  }
  
  /* Style for links */
  a {
    color: #4CAF50;
    text-decoration: none;
  }
  
  a:hover {
    text-decoration: underline;
  }
  .custom-alert-box{
				z-index:1;
                width: 20%;
                height: 10%;
                position: fixed;
                bottom: 0;
                right: 0;
                left: auto;
            }

            .success {
                color: #3c763d;
                background-color: #dff0d8;
                border-color: #d6e9c6;
                display: none;
            }

            .failure {
                color: #a94442;
                background-color: #f2dede;
                border-color: #ebccd1;
                display: none;
            }

            .warning {
                color: #8a6d3b;
                background-color: #fcf8e3;
                border-color: #faebcc;
                display: none;
            }
            .card {
    width: 300px;
    border: 1px solid #ccc;
    border-radius: 8px;
    margin: 10px;
    padding: 10px;
    display: inline-block;
    vertical-align: top;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    background-color: #000;
  }
  
  .card img {
    max-width: 100%;
    height: auto;
    border-radius: 4px;
  }
  
  .card-title {
    font-weight: bold;
    margin-bottom: 8px;
  }
  
  .card-text {
    margin-bottom: 8px;
  }
  
  .btn {
    display: block;
    width: 100%;
    text-align: center;
    padding: 8px;
    margin-top: 10px;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
  }
  
  .btn-success {
    background-color: #28a745;
    color: #fff;
  }
  
  .btn-danger {
    background-color: #dc3545;
    color: #fff;
  }
  
  .btn-warning {
    background-color: #ffc107;
    color: #212529;
  }
</style>
</head>
<body >
        <div class="custom-alert-box">
            <div class="alert-box success">Successful Added to Cart !!!</div>
            <div class="alert-box failure">Failed to Add Cart !!!</div>
            <div class="alert-box warning">Already Added to Cart !!!</div>
        </div>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<div class="container">
<?php
  $selquery = "select * from tbl_spareparts ";
  $user = $con->query($selquery);
  while ($data = $user->fetch_assoc()) {
    // Extract data
    $spareparts_brand = $data['spareparts_brand'];
    $spareparts_model = $data['spareparts_model'];
    $spareparts_year = $data['spareparts_year'];
    $spareparts_partsname = $data['spareparts_partsname'];
    $spareparts_colour = $data['spareparts_colour'];
    $spareparts_price = $data['spareparts_price'];
    $spareparts_photo = $data['spareparts_photo'];
    
    // Calculate stock
    $stock_query = "select sum(stock_quantity) as stock from tbl_stock where spareparts_id = '" . $data["spareparts_id"] . "'";
    $result_stock = $con->query($stock_query);
    $row_stock = $result_stock->fetch_assoc();
    
    $cart_query = "select sum(cart_quantity) as cart from tbl_cart where spareparts_id = '" . $data["spareparts_id"] . "'";
    $result_cart = $con->query($cart_query);
    $row_cart = $result_cart->fetch_assoc();
    
    $available_stock = $row_stock["stock"] - $row_cart["cart"];
    
    // Determine button type
    if ($available_stock > 0) {
      $button_class = "btn-success";
      $button_text = "Add to Cart";
    } elseif ($available_stock == 0) {
      $button_class = "btn-danger";
      $button_text = "Out of Stock";
    } else {
      $button_class = "btn-warning";
      $button_text = "Stock Not Found";
    }
    ?>
    
    <div class="card">
      <?php if (!empty($spareparts_photo)): ?>
        <img src="../Assets/Files/Spareparts/Photo/<?php echo $spareparts_photo ?>" alt="Part Image" class="part-image">
      <?php else: ?>
        <div>No Image Available</div>
      <?php endif; ?>
      <div class="card-title"><?php echo $spareparts_brand . ' ' . $spareparts_model ?></div>
      <div class="card-text">
        <strong>Year:</strong> <?php echo $spareparts_year ?><br>
        <strong>Parts Name:</strong> <?php echo $spareparts_partsname ?><br>
        <strong>Colour:</strong> <?php echo $spareparts_colour ?><br>
        <strong>Price:</strong> $<?php echo $spareparts_price ?><br>
        <!-- <strong>Stock:</strong> <?php echo $available_stock ?><br> -->
      </div>
      <a href="javascript:void(0)" onclick="addCart('<?php echo $data['spareparts_id'] ?>')" class="btn <?php echo $button_class ?>"><?php echo $button_text ?></a>


      <?php
										
											
                    $average_rating = 0;
                    $total_review = 0;
                    $five_star_review = 0;
                    $four_star_review = 0;
                    $three_star_review = 0;
                    $two_star_review = 0;
                    $one_star_review = 0;
                    $total_user_rating = 0;
                    $review_content = array();
                  
                    $query = "SELECT * FROM tbl_review where spareparts_id = '".$data["spareparts_id"]."' ORDER BY review_id DESC";
                  
                    $result = $con->query($query);
                  
                    while($row = $result->fetch_assoc())
                    {
                      
                  
                      if($row["user_rating"] == '5')
                      {
                        $five_star_review++;
                      }
                  
                      if($row["user_rating"] == '4')
                      {
                        $four_star_review++;
                      }
                  
                      if($row["user_rating"] == '3')
                      {
                        $three_star_review++;
                      }
                  
                      if($row["user_rating"] == '2')
                      {
                        $two_star_review++;
                      }
                  
                      if($row["user_rating"] == '1')
                      {
                        $one_star_review++;
                      }
                  
                      $total_review++;
                  
                      $total_user_rating = $total_user_rating + $row["user_rating"];
                  
                    }
                    
                    
                    if($total_review==0 || $total_user_rating==0 )
                    {
                      $average_rating = 0 ; 			
                    }
                    else
                    {
                      $average_rating = $total_user_rating / $total_review;
                    }
                    
                    ?>
                                          <p align="center" style="color:#F96;font-size:20px">
                                         <?php
                     if($average_rating==5 || $average_rating==4.5)
                     {
                       ?>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                             <?php
                     }
                     if($average_rating==4 || $average_rating==3.5)
                     {
                       ?>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                             <?php
                     }
                     if($average_rating==3 || $average_rating==2.5)
                     {
                       ?>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                             <?php
                     }
                     if($average_rating==2 || $average_rating==1.5)
                     {
                       ?>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                             <?php
                     }
                     if($average_rating==1)
                     {
                       ?>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                             <?php
                     }
                     if($average_rating==0)
                     {
                       ?>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                              <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                             <?php
                     }
                     ?>
                                         
                                      </p>
                                          <?php
                  
                    $output = array(
                      'average_rating'	=>	number_format($average_rating, 1),
                      'total_review'		=>	$total_review,
                      'five_star_review'	=>	$five_star_review,
                      'four_star_review'	=>	$four_star_review,
                      'three_star_review'	=>	$three_star_review,
                      'two_star_review'	=>	$two_star_review,
                      'one_star_review'	=>	$one_star_review,
                      'review_data'		=>	$review_content
                    );
                  
           ?>       
    </div>
    



    
  <?php } ?>


    
</div>
  <p>&nbsp;</p>
</form>
</body>

</html>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
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
</script>

<?php
include('Footer.php');
?>