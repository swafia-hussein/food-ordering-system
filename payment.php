<?php

require('connection.php');
$conn = Connect();
?>

<!DOCTYPE html>
<html>

<head>
    <title>payment(IT CONSISTS OF FORM AND ACTION PAGE)</title>

</head>

<body>


                <?php
                if (isset($_POST['payment'])) {
                    

                    // get data from a form
                    session_start();
                    $order_id = $_SESSION['order_id'];
                    $amount = $_POST['amount'];
                 $sql = "INSERT INTO payments (amount,order_id, payment_date) 
											VALUE ( '$amount','$order_id',NOW())";
                    $query = mysqli_query($conn, $sql);

                    if ($query) {
                        echo "<b>SUCCESSFUL PAYMENT</b>";
                    }

                    else{
                        echo "<b>FAIL TO MAKE PAYMENT</b>";
                    }
                }
                ?>




<form method="POST" action="payment.php">

<br>
<br>
<label>amount:</label>

    <input type="number" required placeholder="amount" name="amount">


    <br>
    <br>
                            <input type="submit" name="payment" value="PAYMENT">
                </form>
                       


</body>
</html>