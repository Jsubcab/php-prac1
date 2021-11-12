<?php

include "connect.inc.php"; 

$id = $_GET['id'];

$querySelectProduct = mysqli_query($con,"SELECT * FROM products WHERE id='$id'");

$data = mysqli_fetch_array($querySelectProduct);

if(isset($_POST['edit_product'])) 
{
    $name = $_POST['product-name'];
    $description = $_POST['product-description'];
    $price = $_POST['product-price'];
    $code = $_POST['product-code'];
    $category = $_POST['product-id-categories'];
    $stock = $_POST['product-stock'];
    $link_image = $_POST['product-link-image'];
	
    $editProduct = mysqli_query($con,"UPDATE products SET name='$name', description='$description', price='$price',
    code='$code', id_categories='$category', stock='$stock', link_image='$link_image' WHERE id='$id'");
	
    if($editProduct)
    {
        mysqli_close($con);
        echo "Product edited successfully";
        header("Refresh: 1;url=../public/admin.php");
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>