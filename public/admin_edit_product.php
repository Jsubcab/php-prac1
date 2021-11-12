<?php
    include_once '../private/connect.inc.php';

    if(isset($_GET["action"]))
{
 if($_GET["action"] == "edit")
    {
        $id = $_GET['id'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCommerce - Admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/97369f5ca2.js" crossorigin="anonymous"></script>
 
</head>
<body>
<script id="replace_with_navbar" src="../js/nav.js"></script>

<?php

$queryGetProducts = "SELECT * FROM products WHERE id=$id;";
$insertQueryGetProducts = mysqli_query($con, $queryGetProducts);
$resultQueryGetProducts = mysqli_num_rows($insertQueryGetProducts);

?>
<div class="container panel-admin">
<div class="row">
        <div class="col">
            <a href="admin.php" class="btn btn-primary">View products</a>
            <a href="admin_add_product.php" class="btn btn-primary">Add product</a>
            <a href="admin_view_category.php" class="btn btn-primary">View category</a>
            <a href="admin_add_category.php" class="btn btn-primary">Add category</a>
        </div>
    </div>
</div>

<div class="container">
<?php
        if ($resultQueryGetProducts > 0) {
        while ($rowProducts = mysqli_fetch_assoc($insertQueryGetProducts)) {
                        ?>
    <div class="row">
        <form action="../private/insert_edit_product.php?id=<?php echo $rowProducts['id'];?>" method="POST">
            <div class="mb-3">
            <label class="form-label">Id</label>
            <input type="text" class="form-control" id="disabledTextInput" class="product-id" value="<?php echo $rowProducts['id']; ?>" disabled>
            </div>
            <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="product-name" value="<?php echo $rowProducts['name']; ?>" Required>
            </div>
            <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" name="product-description" value="<?php echo $rowProducts['description']; ?>" Required>
            </div>
            <div class="mb-3">
            <label class="form-label">Price </label>
            <input type="double" class="form-control" name="product-price" value="<?php echo $rowProducts['price']; ?>" Required>
            </div>
            <div class="mb-3">
            <label class="form-label">Code </label>
            <input type="text" class="form-control" name="product-code" value="<?php echo $rowProducts['code']; ?>" Required>
            </div>
            <div class="mb-3">
            <label class="form-label">Category </label>
            <?php 
            if (is_null($rowProducts['id_categories'])) {
                ?> <input type="number" class="form-control" name="product-id-categories" value="NULL" Required> <?php
            } else {
                ?>
                <input type="number" class="form-control" name="product-id-categories" value="<?php echo $rowProducts['id_categories']; ?>" Required>
                <?php
            }?>
            </div>
            <div class="mb-3">
            <label class="form-label">Stock </label>
            <input type="text" class="form-control" name="product-stock" value="<?php echo $rowProducts['stock']; ?>" Required>
            </div>
            <div class="mb-3">
            <label class="form-label">Link Image </label>
            <?php 
            if (is_null($rowProducts['link_image'])) {
                ?> <input type="text" class="form-control" name="product-link-image" value="NULL" Required> <?php
            } else {
                ?>
                <input type="text" class="form-control" name="product-link-image" value="<?php echo $rowProducts['link_image']; ?>" Required>
                <?php
            }?>
            </div>
            <div class="mb-3">
            <button name="edit_product" type="submit" class="btn btn-primary">Submit edit</button>
        </div>
            
        </div>
    </div>
    <?php
                    }
                }
                    ?>
</div>


    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>