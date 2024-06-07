<?php
// config.php

	session_start(); // start the session
	include 'connection.php'; // DB CONNECTION
	$conn = Connect();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
// admin.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];

    $sql = "SELECT * FROM `admin` WHERE username = '$admin_username' AND password = '$admin_password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $result->fetch_assoc();
        header("Location: admin_dashboard.php");
    } else {
        echo "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body style = background-color:grey;>
    <form action="admin.php" method="post" align="center">
<div style= font-family:algeria; style=font-size:100%; >
        <label for="username" style=background-color:blue; >Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br><br>
        <label for="password" style=background-color:blue;>Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br><br>
</div>
        <button type="submit" style=background-color:blue;>Login</button>
    </form>
</body>
</html>
