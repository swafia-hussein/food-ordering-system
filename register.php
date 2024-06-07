 <?php


require 'connection.php';
$conn = Connect();

?>

<!DOCTYPE html>
<html>

<head>
    <title>REGISTER PAGE (IT CONSISTS OF FORM AND ACTION PAGE)</title>

</head>

<body style = background-color:grey;>

<center>

<form method="post" action="register.php">

<br>
<br>
    <label>First Name</label>
    <input type="text" required placeholder="First name" name="first">


<br>
<br>
    <label>Middle Name</label>
    <input type="text" required placeholder="Middle name" name="middle">

<br>
<br>
    <label>Last Name</label>
    <input type="text" required placeholder="Last Name" name="last">

<br>
<br>
<label>Place</label>
    <input type="text" required placeholder="place" name="place">

<br>
<br>
    <label>phonenumber</label>
    <input type="number" required placeholder="phonenumber" name="phonenumber">


<br>
<br>
    <label>Email</label>
    <input type="email" required placeholder="Email" name="email">


<br>
<br>
    <label>Password</label>
    <input type="password" required placeholder="Password" name="password">

<br>
<br>

    <select name="role">
        <option>Select role..</option>
        <option>customer</option>
        <option>restaurantowner</option>
        
    </select>

    <br>
    <br>
                            <input type="submit" name="register" value="REGISTER">
                </form>

                        <p> if you hav an account <a href="login.php">press here </a>to loginin</p>

                        </center>
</body>
</html>

<?php
                if (isset($_POST['register'])) {

                    // get data from a form
                    $fname = $_POST['first'];
                    $mname = $_POST['middle'];
                    $lname = $_POST['last'];
                    $place = $_POST['place'];
                    $phonenumber = $_POST['phonenumber'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $role = $_POST['role'];

                    //secure password
                    $hash = sha1($password);

                    $sql = "INSERT INTO users ( fname, mname, lname, place, phonenumber, email, password, role) 
											VALUES ( '$fname', '$mname', '$lname', '$place', '$phonenumber', '$email', '$hash', '$role')";
                    $query = mysqli_query($conn, $sql);
                if ($role ==='restaurantowner' && $_SESSION['role'] !== 'admin'){
                    echo "Only admin can register restaurantowner.";
                }else{
                     echo"Registration successful!";
                }
                    if ($query) {
                        echo "<b>SUCCESSFUL REGISTER</b>";
                    }

                    else{
                        echo "<b>FAIL TO REGISTER REGISTER</b>";
                    }
                }
                ?>


