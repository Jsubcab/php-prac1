<?php
include '../private/connect.inc.php';


$queryUserInfo = $con->prepare('SELECT id, name FROM users WHERE id = ?');

$queryUserInfo->bind_param('i', $_SESSION['id']);
$queryUserInfo->execute();
$queryUserInfo->bind_result($userId, $userName);
$queryUserInfo->fetch();
$queryUserInfo->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCommerce - Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/97369f5ca2.js" crossorigin="anonymous"></script>
 
</head>
<body>
<script id="replace_with_navbar" src="../js/nav.js"></script>

    <div class="container">
    <p>Welcome back, <?php echo $userName?>!</p>
		<div class="row">
			<div class="col">
			<h3>Past orders</h3>

			<?php
				 $queryGetOrders = "SELECT * FROM orders WHERE id_users='$userId';";
				 $insertQueryGetOrders = mysqli_query($con, $queryGetOrders);
				 $resultQueryGetOrders = mysqli_num_rows($insertQueryGetOrders);

			
				 if ($resultQueryGetOrders > 0) {
					while ($rowOrder = mysqli_fetch_assoc($insertQueryGetOrders)) {
						$orderId = $rowOrder['id'];
						?>
						<span>Order number: </span> <?php echo $orderId; ?>
						<table>
							<tr>
								<th width="20%">Product Name</th>
								<th width="20%">Quantity</th>
								<th width="30%">Single Price</th>
								<th width="30%">Total</th>
							</tr>
							
								<?php
								
									$queryGetInvoiceProducts = "SELECT * FROM invoice WHERE id_orders='$orderId';";
									$insertQueryGetInvoiceProducts = mysqli_query($con, $queryGetInvoiceProducts);
									$resultQueryGetInvoiceProducts = mysqli_num_rows($insertQueryGetInvoiceProducts);
								
							
							if ($resultQueryGetInvoiceProducts > 0) {
								$total = 0;
								while ($rowInvoice = mysqli_fetch_assoc($insertQueryGetInvoiceProducts)) {
									
									
									
										$stmt=$con->prepare("SELECT name, price FROM products WHERE id = ?");
										$stmt->bind_param("s", $rowInvoice['id_products']);
										$stmt->execute();
										$stmt->bind_result($productName, $priceProduct);
										$stmt->fetch();
										$stmt->close();
								
								?>
								<tr>
									<td><?php echo $productName;?></td>
									<td><?php echo $rowInvoice['quantity'];?></td>
									<td><?php echo $priceProduct;?> EUR</td>
									<td><?php echo number_format($priceProduct * $rowInvoice['quantity'], 2);?> EUR</td>
									
								</tr>
						
								<?php
                 					$total += $rowInvoice['quantity'] * $priceProduct;
								?>

								
							<?php
								}
							}
							?>
							<tr>
									<td colspan="3">Total</td>
									<td><?php echo number_format($total, 2); ?> EUR</td>
									<td></td>
								</tr>
								
						</table>
						<br>
						<?php
						

					}
				 } else {
					?>
					<p>There is not orders yet!</p>
					<?php
				 }

			?>
			</div>
		</div>

    </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>