<?php 

include 'connect.inc.php';

if(isset($_POST['submit']))
{
    $idUser = $_POST['id_user'];
    $dateField = date('Y-m-d',strtotime(date("Y-m-d")));

     //GET ID USER
     $queryGetIdUser = "SELECT * FROM users WHERE id='$idUser';";
     $insertQueryGetIdUser = mysqli_query($con, $queryGetIdUser);
     $resultQueryGetIdUser = mysqli_num_rows($insertQueryGetIdUser);

     if ($resultQueryGetIdUser > 0) {
        while ($rowUser = mysqli_fetch_assoc($insertQueryGetIdUser)) {
           //INSERT ORDER
           $createOrder = "INSERT INTO orders (date, id_users) VALUES ('$dateField',$idUser)";
           $insertcreateOrder = mysqli_query($con, $createOrder);
          
        }
     }

    //GET ID ORDER
    $queryGetIdOrder = "SELECT * FROM orders WHERE id_users='$idUser';";
    $insertQueryGetIdOrder = mysqli_query($con, $queryGetIdOrder);
    $resultQueryGetIdOrder = mysqli_num_rows($insertQueryGetIdOrder);

    if ($resultQueryGetIdOrder > 0) {
        while ($rowOrder = mysqli_fetch_assoc($insertQueryGetIdOrder)) {
            $idOrder = $rowOrder['id'];

                //INSERT INVOICE
                foreach($_SESSION["shopping_cart"] as $keys => $values)
                {
                $productId = $values["product_id"];
                $productQuantity = $values["product_quantity"];

                $createInvoice = "INSERT INTO invoice (id_orders, id_products, quantity) VALUES ($idOrder,$productId,$productQuantity)";
                $insertCreateInvoice = mysqli_query($con, $createInvoice);  
            }
        }
    }
        
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
           Your purchased have been accepted!
        </div>
          <?php
          header("Refresh: 3;url=../public/profile.php");
          mysqli_close($con);
          exit();

}
?>