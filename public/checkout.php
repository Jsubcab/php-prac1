<?php
session_start();

if(isset($_POST['add_to_cart']))
{
  if(isset($_SESSION['shopping_cart']))
  {
    $item_array_id = array_column($_SESSION['shopping_cart'], 'product_id');
    if(!in_array($_GET['id'], $item_array_id))
    {
      $count = count($_SESSION['shopping_cart']);
      $item_array = array(
        'product_id'			=>	$_GET['id'],
        'product_name'			=>	$_POST['product_name'],
        'product_price'		=>	$_POST['product_price'],
        'product_quantity'		=>	$_POST['product_quantity']
      );
      $_SESSION["shopping_cart"][$count] = $item_array;
      ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Product added to the cart!
          <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php  
    }
  }
  else
  {
    $item_array = array(
      'product_id'			=>	$_GET['id'],
      'product_name'			=>	$_POST['product_name'],
      'product_price'		=>	$_POST['product_price'],
      'product_quantity'		=>	$_POST['product_quantity']
    );
    $_SESSION["shopping_cart"][0] = $item_array;
  }
}

if(isset($_GET["action"]))
{
 if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["product_id"] == $_GET['id'])
            {
              ?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                The product has been removed from the cart
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
              </div>
              
              <?php
                unset($_SESSION['shopping_cart'][$keys]);
                ?>

                <?php

            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCommerce - Checkout</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/97369f5ca2.js" crossorigin="anonymous"></script>
 
</head>
<body>
<script id="replace_with_navbar" src="../js/nav.js"></script>


 <div class="container">
     <div class="row">
         <div class="col">
            <h3>Order Details</h3>
            <table class="table table-bordered">
                <tr>
                <th width="40%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="20%">Single Price</th>
                <th width="15%">Total</th>
                <th width="5%">Action</th>
                </tr>

                <?php
                if(!empty($_SESSION["shopping_cart"]))
                {
                    $total = 0;
                foreach($_SESSION["shopping_cart"] as $keys => $values)
                {
                ?>
                <tr>
                    
                    <td><?php echo $values["product_name"]; ?></td>
                    <td>
                    <form action="" method="post">
                        <input type="number" class="form-control" name="amount[<?php echo $values["product_id"];?>]" value="<?php echo $_POST['amount'][$values["product_id"]];?>" min="1">
                        <input type="submit" value="Update" name="submit_quantity" class="btn btn-primary btn-sm">
                  </form>

                  <?php
                  if (isset($_POST['submit_quantity']) && isset($_POST['amount'][$values["product_id"]])) {
                    $values["product_quantity"] = $_POST['amount'][$values["product_id"]];
                    } else { 
                      $values["product_quantity"] = 1;
                    }
                  ?>
                    </td>
                    <td><?php echo $values["product_price"]; ?> EUR</td>
                    <td><?php echo number_format($values["product_quantity"] * $values["product_price"], 2);?> EUR</td>
                    <td><a href="checkout.php?action=delete&id=<?php echo $values["product_id"]; ?>"><span class="btn btn-danger"><i class="fas fa-minus-square"></i></span></a></td>
                </tr>

                <?php
                 $total += $values["product_quantity"] * $values["product_price"];
                }
                ?>
                    <tr>
                        <td colspan="3">Total</td>
                        <td><?php echo number_format($total, 2); ?> EUR</td>
                        <td></td>
                    </tr>
                <?php
                }
                ?>
            <table>
        </div>
        <div class="col">
          <a href="confirmation.php" class="btn btn-primary"><i class="fas fa-sign-out-alt"></i> Checkout</a>
        </div>
     </div>

</div>
    
<script>
function refresh() {
  var x = document.getElementById("fname");
  x.value = x.value.toUpperCase();
}
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>