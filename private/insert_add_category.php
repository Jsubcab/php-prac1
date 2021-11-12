<?php
include 'connect.inc.php';

if(isset($_POST['add_category']))
{
    $name = $_POST['category-name'];

    $queryInsert = "INSERT INTO categories (categoryName)
    VALUES ('$name')";
    
    if ($con->query($queryInsert) === TRUE) {
      echo "New category created successfully";
      header("Refresh: 1;url=../public/admin_view_category.php");
    } else {
      echo "Error: " . $queryInsert . "<br>" . $con->error;
    }

}

    ?>