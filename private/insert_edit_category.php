<?php

include "connect.inc.php"; 

$id = $_GET['id'];

$querySelectCategory = mysqli_query($con,"SELECT * FROM categories WHERE categoryId='$id'");

$data = mysqli_fetch_array($querySelectCategory);

if(isset($_POST['edit_category'])) 
{
    $name = $_POST['category-name'];
	
    $editCategory = mysqli_query($con,"UPDATE categories SET categoryName='$name' WHERE categoryId='$id'");
	
    if($editCategory)
    {
        mysqli_close($con);
        echo "Category edited successfully";
        header("Refresh: 1;url=../public/admin_view_category.php");
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>