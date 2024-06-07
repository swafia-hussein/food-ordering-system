<!DOCTYPE html>
<html>

<head>
	<title>Login Action Page With Embeded Loin Form</title>
</head>

<body style = background-color:grey;>
	<?php
	session_start(); // start the session
	include 'connection.php'; // DB CONNECTION
	$conn = Connect();

		if (isset($_POST['submit'])) {
			$username = $_POST['username'];
			$pass = $_POST['password'];
            //secure password 
    
			$hash = sha1($pass);

			$sql = "SELECT * FROM users WHERE email = '$username' AND password = '$hash'";
			 $query = mysqli_query($conn, $sql);

			if ($query) {
				if (mysqli_num_rows($query) > 0) {
					$row = mysqli_fetch_array($query);
//session creation to support AUTHORIZATION process
$_SESSION['id'] = $row['uid']; // this session id will store uid of the user from a db
$_SESSION['role'] = $row['role']; // this session role will store role of the user from a db
$_SESSION['username'] = $row['username']; // this session number will store enroll no of the user from a db
$_SESSION['first_name'] = $row['first_name']; // this session first will store fname of the user from a db
$_SESSION['last_name'] = $row['last_name']; // this session middle will store mname of the user from a db
$_SESSION['phonenumber'] = $row['phonenumber']; // this session phonenumber will store phonenumber of the user from a db




                    // AUTHORIZAION SUPPORTED BY SESSION AND REDIRECT TO DIFFERENT PAGES
                    
                    //if the role is === to admin then go to....... 
					if ($_SESSION['role'] === 'admin') {
						header("location: admin.php");
					} 
                    //if the role is === to legal_expert then go to....... 
                    else if ($_SESSION['role'] === 'customer') {
						header("location: areas.php");
					} 
                    //if the role is === to user then go to....... 
                    else if ($_SESSION['role'] === 'restaurantowner') {
						header("location: restaurantowner.php");
					}
				} 
                else {
					echo "<div><strong>Error:</strong><h5> Wrong PASSWORD or USERNAME.</h5></div>";
				}
			} 
            else {
				die(mysqli_error($con));
			}
		}
		?>

<!-- LOGIN FORM -->
<center>
		<form class="mt-4" method="post" action="login.php">
			<br>
				<input type="text" name="username" required placeholder="Username" />
			<br>

			<br>
			<br>
				<input type="password" name="password" required placeholder="Password" />
			<br>
			<br>

			<br>
			<br>
				<button type="submit" class="btn btn-login" name="submit" >Login</button>


		</form>
	</center>
</body>

</html>