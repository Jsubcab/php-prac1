<?php 

include 'connect.inc.php';

if(isset($_POST['submit']))
{    
     //ACTUAL DATE 
     $dateField = date('Y-m-d',strtotime(date("Y-m-d")));
     $idUser;

     $email = $_POST['user-email'];
     $pass = $_POST['user-pass'];
     $name = $_POST['user-name'];
     $firstSurname = $_POST['user-first-surname'];
     $secondSurname = $_POST['user-second-surname'];
     $address = $_POST['user-address'];
     $zipcode = $_POST['user-zipcode'];
     $city = $_POST['user-city'];
     $country = $_POST['user-country'];

     //INSERT USER
     $insertUser = "INSERT INTO users (user,pass,name,surname1,surname2,address,zipcode,city,country)
     VALUES ('$email','$pass','$name', '$firstSurname','$secondSurname','$address', '$zipcode','$city','$country')";
     
     
     if (mysqli_query($con, $insertUser)) {

     //GET ID USER
     $queryGetIdUser = "SELECT * FROM users WHERE user='$email';";
     $insertQueryGetIdUser = mysqli_query($con, $queryGetIdUser);
     $resultQueryGetIdUser = mysqli_num_rows($insertQueryGetIdUser);

     if ($resultQueryGetIdUser > 0) {
        while ($rowUser = mysqli_fetch_assoc($insertQueryGetIdUser)) {
           $idUser = $rowUser['id'];
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
           Please, login to check your order.
        </div>
          <?php
          header("Refresh: 3;url=../public/login.php");
          exit();
     } else {
      echo "Error: " . $insertUser . ":-" . mysqli_error($con);
   }


 

   //PEGAR AQUI LO DE INSERTAR EL USER
     mysqli_close($con);
}

?>