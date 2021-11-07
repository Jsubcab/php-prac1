<?php
    include_once '../private/connect.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCommerce - Games</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/97369f5ca2.js" crossorigin="anonymous"></script>
  </head>
<body>

<script id="replace_with_navbar" src="../js/nav.js"></script>
<?php
$var_value = $_GET['varname'];
$sqlProduct = "SELECT * FROM products where id=$var_value;";
$sqlCategory = "SELECT * FROM categories c LEFT JOIN products p ON p.id_categories = c.categoryId where p.id=$var_value;";
$result = mysqli_query($con, $sqlProduct);
$resultCategory = mysqli_query($con, $sqlCategory);
$rowProduct = mysqli_fetch_assoc($result);
$rowCategory = mysqli_fetch_assoc($resultCategory);
?>

<div class="container">
  <div class="row">
      <div class="col-product-img col-xs-12 col-md-4">
        <img src="<?php echo $rowProduct['link_image'];?>" alt="img-<?php echo $rowProduct['name'];?>">
      </div>
      <div class="col-product-info col">
        <form method="post" action="checkout.php?action=add&id=<?php echo $rowProduct["id"]; ?>">
          <h4><?php echo $rowProduct['name'];?></h4>
          <h6 class="product-info-category"><?php echo $rowCategory['categoryName'];?></h6>
          <span><?php echo $rowProduct['description'];?></span>
          <p><?php echo $rowProduct['price'];?> EUR</p>

          <input type="text" name="product_quantity" value="1" class="form-control" />

          <input type="hidden" name="product_name" value="<?php echo $rowProduct["name"]; ?>" />
 
          <input type="hidden" name="product_price" value="<?php echo $rowProduct["price"]; ?>" />

          <input type="submit" name="add_to_cart" class="btn btn-primary" value="Add to Cart" />
        </form>
      </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script></body>
</html>