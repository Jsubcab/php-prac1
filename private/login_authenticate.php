<?php
session_start();

$dbserverName = "localhost";
$dbuserName = "root";
$dbpassword = "";
$dbName = "shop";

$con = mysqli_connect($dbserverName, $dbuserName, $dbpassword, $dbName);
if ( mysqli_connect_errno() ) {

	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ( !isset($_POST['username'], $_POST['password']) ) {
	exit('Please fill both the username and password fields!');
}

if ($stmt = $con->prepare('SELECT id, pass, id_permissions FROM users WHERE user = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password, $id_permissions);
        $stmt->fetch();
      if (($_POST['password'] === $password) && ($id_permissions == 3)){
           session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['user'] = $_POST['username'];
            $_SESSION['permissions'] = $id_permissions;
            $_SESSION['id'] = $id;
            header('Location: ../public/profile.php');
        } else if (($_POST['password'] === $password) && ($id_permissions == 1)) {
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['user'] = $_POST['username'];
        $_SESSION['permissions'] = $id_permissions;
        $_SESSION['id'] = $id;
        header('Location: ../public/admin.php');
        }else {
            echo 'Incorrect username and/or password!';
        }
    } else {

        echo 'Incorrect username and/or password!';
        header("Refresh: 1;url=../public/login.php");
        exit();
    }


	$stmt->close();
}