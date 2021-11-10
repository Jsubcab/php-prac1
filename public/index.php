<?php
    include_once '../private/connect.inc.php';
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
<?php
$sql = "SELECT * FROM categories;";
$result = mysqli_query($con, $sql);
$resultCheck = mysqli_num_rows($result);
?>

<div class="container">
  <div class="row">
    <div class="col-12 categories-title">
      <h3>Categories availables</h3>
    </div>
<?php
    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
?>
    <div class="col">
    <a class="btn btn-primary" href="categories.php?varname=<?php echo $row['categoryName'];?>"><?php  echo $row['categoryName']; ?></a>
           
    </div>

          <!--  <div class="col-md-6 col-xs-12 button-col">
            <a class="btn btn-primary" href="categories.php?varname=<?php echo $row['categoryName'];?>"><?php  echo $row['categoryName']; ?></a>
             <div class="rounded d-flex justify-content-center align-items-center button-category">
                <p class="noselect">   </p>
              </div> 
          </div>-->
<?php
        }
    }
?>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script></body>
</html>