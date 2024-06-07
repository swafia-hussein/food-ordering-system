<?php
session_start();
// Check if not logged in, return to login
if(!isset($_SESSION['id']) || !isset($_SESSION['role'])){
	header('location: login.php');
}
// To check if the user who access the page is correct one 
//for example in this page user who suppose to access this web page is student
	if($_SESSION['role'] !== 'customer'){ 
        header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title> page to show how to use session to welcome someone</title>
</head>
<body>
<h1>Welcome  <?php echo $_SESSION['id'] ;?></b></h1>
</body>

</html>