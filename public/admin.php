<?php
    include_once '../private/connect.inc.php';
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
    $sql = "SELECT * FROM users;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

?>

<section>
    <div class="container">
        <div class="row">
            <div class="col">
            <a class="btn btn-primary" href="#" role="button">Users</a>
            <a class="btn btn-primary" href="#" role="button">Products</a>
            <a class="btn btn-primary" href="#" role="button">Orders</a>
            <a class="btn btn-primary" href="#" role="button">Categories</a>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="../private/insert.php" method="post">
        <h4>Add users</h4>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputUser">User</label>
                <input type="text" class="form-control" id="inputUser" placeholder="User">
                </div>
                <div class="form-group col-md-6">
                <label for="inputPassword">Password</label>
                <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputName">Name</label>
                <input type="text" class="form-control" id="inputName" placeholder="Name">
                </div>
                <div class="form-group col-md-6">
                <label for="inputSurname">Surname</label>
                <input type="text" class="form-control" id="inputSurname" placeholder="Surname">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Add User</button>
        </form>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
            <?php
           
            while($row = mysqli_fetch_assoc($result)){
                ?>
                echo "<tr>";
                echo "<td>".$row['user']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['surname1']."</td>";
                echo "</tr>";
                <?php
            }
            ?>

            </div>
        </div>
    </div>

    <div class="container">
        <form action="../private/delete.php" method="post">
        <h4>Delete users</h4>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputUser">User</label>
                <input type="text" class="form-control" id="inputUser" placeholder="User">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Delete User</button>
        </form>
    </div>

</section>
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>