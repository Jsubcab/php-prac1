<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCommerce - Home</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/97369f5ca2.js" crossorigin="anonymous"></script>
  </head>
<body>

<script id="replace_with_navbar" src="../js/nav.js"></script>

<div class="container">
  <div class="row">
    <div class="col-md-12 col-lg-6">
                <?php
                if (isset($_SESSION['loggedin'])) {
                ?>
                <form action="../private/insert_checkout_logged.php" method="POST">
                <input type="hidden" name="id_user" value="<?php echo $_SESSION['id']; ?>" />
                <button name="submit" type="submit" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Submit order</button>
                </form>
            <?php
                } else {
                    ?>
            <form action="../private/insert_checkout.php" method="POST">
            <div class="mb-3">
                <label for="user-email" class="form-label">Email Address</label>
                <input name="user-email" type="email" class="form-control" id="user-email" aria-describedby="emailHelp required" required>
                <div id="emailHelp" class="form-text">Your email is going to be your user.</div>
            </div>
            <div class="mb-3">
                <label for="user-pass" class="form-label">Password</label>
                <input name="user-pass" type="password" class="form-control" id="user-pass" required>
            </div>
            <div class="mb-3">
                <label for="user-name" class="form-label">Name</label>
                <input name="user-name" type="text" class="form-control" id="user-name" aria-describedby="nameHelp" required>
            </div>
            <div class="mb-3">
                <label for="user-first-surname" class="form-label">First surname</label>
                <input name="user-first-surname" type="text" class="form-control" id="user-first-surname" required>
            </div>
            <div class="mb-3">
                <label for="user-second-surname" class="form-label">Second surname</label>
                <input name="user-second-surname" type="text" class="form-control" id="user-second-surname" required>
            </div>
            <div class="mb-3">
                <label for="user-address" class="form-label">Address</label>
                <input name="user-address" type="text" class="form-control" id="user-address" required>
            </div>
            <div class="mb-3">
                <label for="user-zipcode" class="form-label">Zipcode</label>
                <input name="user-zipcode" type="text" class="form-control" id="user-zipcode" required>
            </div>
            <div class="mb-3">
                <label for="user-city" class="form-label">City</label>
                <input name="user-city" type="text" class="form-control" id="user-city" required>
            </div>
            <div class="mb-3">
                <label for="user-country" class="form-label">Country</label>
                <input name="user-country" type="text" class="form-control" id="user-country" required>
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
                <?php
                }
                ?>
    </div>
    <div class="col-md-12 col-lg-6">
        <div class="container">
            <div class="row">
                <div class="col">
                <?php
                if (isset($_SESSION['loggedin'])) {
                ?>
                <h4><i class="far fa-smile"></i> Thank you for buying with us!</h4>
                        <br>
                        <p>We wish you an amazing day! You can proceed with the order.</p>
                </div>
                <?php
                } else {
                    ?>
                <h4><i class="fas fa-exclamation-circle"></i> Register to checkout</h4>
                        <br>
                        <p>Dear costumer,</p>
                        <span>You will need to create an account to proceed with the checkout of your products.</span>
                </div>
                <?php
                }
                ?>

            </div>
            <div class="row">
                <div class="col">
                    <br>
                <h3>Resume</h3>
            <table class="table table-bordered">
                <tr>
                <th width="40%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="20%">Single Price</th>
                <th width="30%">Total</th>
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
                    <?php echo $values["product_quantity"]; ?>
                    </td>
                    <td><?php echo $values["product_price"]; ?> EUR</td>
                    <td><?php echo number_format($values["product_quantity"] * $values["product_price"], 2);?> EUR</td>
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
            </div>
        </div>

    </div>  
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script></body>
</html>