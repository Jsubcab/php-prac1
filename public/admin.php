<?php
    include_once '../private/connect.inc.php';

if(isset($_GET["action"]))
{
 if($_GET["action"] == "delete")
    {
        $id = $_GET['id'];

                $deleteQuery = "DELETE FROM products WHERE id=$id";

                if ($con->query($deleteQuery) === TRUE) {
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                The product has been removed from the database
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php
                } else {
                echo "Error deleting record: " . $con->error;
                }
              ?>
                <?php

            
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

$queryGetProducts = "SELECT * FROM products;";
$insertQueryGetProducts = mysqli_query($con, $queryGetProducts);
$resultQueryGetProducts = mysqli_num_rows($insertQueryGetProducts);

?>
<div class="container panel-admin">
<div class="row">
        <div class="col">
            <a href="admin.php" class="btn btn-primary">View products</a>
            <a href="admin_add_product.php" class="btn btn-primary">Add product</a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <p>Id</p>
        </div>
        <div class="col">
            <p>Name</p>
        </div>
        <div class="col">
            <p>Description</p>
        </div>
        <div class="col">
            <p>Price</p>
        </div>
        <div class="col">
            <p>Code</p>
        </div>
        <div class="col">
            <p>Id Categories</p>
        </div>
        <div class="col">
            <p>Stock</p>
        </div>
        <div class="col">
            <p>Link_image</p>
        </div>
        <div class="col">
            <p>Delete</p>
        </div>
    </div>
<?php
        if ($resultQueryGetProducts > 0) {
        while ($rowProducts = mysqli_fetch_assoc($insertQueryGetProducts)) {
                        ?>
    <div class="row">
        <div class="col">
            <?php echo $rowProducts['id']; ?>
        </div>
        <div class="col">
        <?php echo $rowProducts['name']; ?>
        </div>
        <div class="col">
        <?php echo $rowProducts['description']; ?>
        </div>
        <div class="col">
        <?php echo $rowProducts['price']; ?>
        </div>
        <div class="col">
        <?php echo $rowProducts['code']; ?>
        </div>
        <div class="col">
        <?php echo $rowProducts['id_categories']; ?>
        </div>
        <div class="col">
        <?php echo $rowProducts['stock']; ?>
        </div>
        <div class="col">
        <?php echo $rowProducts['link_image']; ?>
        </div>
        <div class="col">
        <a href="admin.php?action=delete&id=<?php echo $rowProducts['id']; ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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