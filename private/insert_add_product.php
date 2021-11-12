<?php
include 'connect.inc.php';

if(isset($_POST['add_product']))
{
    $name = $_POST['product-name'];
    $description = $_POST['product-description'];
    $price = $_POST['product-price'];
    $code = $_POST['product-code'];
    $id_categories = $_POST['product-id-categories'];
    $stock = $_POST['product-stock'];
    $link_image = $_POST['product-link-image'];

    $queryInsert = "INSERT INTO products (name, description, price, code, id_categories, stock, link_image)
    VALUES ('$name', '$description', '$price', '$code', '$id_categories', '$stock', '$link_image')";
    
    if ($con->query($queryInsert) === TRUE) {
      echo "New record created successfully";
      header("Refresh: 1;url=../public/admin_add_product.php");
    } else {
      echo "Error: " . $queryInsert . "<br>" . $con->error;
    }

}

    ?>