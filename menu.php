  <?php
require 'connection.php';
$conn = Connect();
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>cafterier</title>
    <style>
        .container {
            display:flex;
           
        }
    .photo{
        margin-right:20px;
    }
    </style>
</head>
<body style="background-color:grey;">
  <?php

 if (isset($_POST['orderfood'])) {
    session_start();
    $user_uid = $_SESSION['user_uid'];
    $restaurant_id = $_POST['restaurant_id'];



    $sql = "INSERT INTO orders (user_id, restaurant_id,order_date) VALUES ('$user_id', '$restaurant_id', NOW())";

    if ($conn->query($sql) === TRUE) {
        $order_id = $conn->insert_id;

        // Assuming order items come in the following format
        // $_POST['items'] = [['menu_id' => 1, 'quantity' => 2, 'price' => 10.00], ...];
        foreach ($_POST['menu_items'] as $item) {
            $menu_items_id = $item['menu_items_id'];
           
            $amount = $item['amount'];

            $sql_item = "INSERT INTO order_items (order_id, menu_items_id,amount) VALUES ('$order_id', '$menu_items_id', '$amount')";
            $conn->query($sql_item);
        }

        echo "Order placed successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<h1>HI!WELCOME</h1>
<div class="container">
    <div class = "photo">
	<img src="chipsi.jpg" style="height:250px"><br>
<p><label>Name:chipsi Amount:TZS3,000</label><br><br>
<label>Enter the amount of money:</label>
<input type="number" name="number" placeholder="amount">
<button class="order_button" onclick="orderfood()" style="background-color: blue;">orderfood</button><br><br>
</div>
<div class = "photo">
<img src="kuku.png"style="height:250px" ><br>
<p><label>Name:kuku: Amount:TZS7,000</label><br><br>
<label>Enter the amount of money:</label>
<input type="number" name="number" placeholder="amount">
<button class="order_button" onclick="orderfood()" style="background-color: blue;">orderfood</button><br><br></p>
</div>
</div>
<div class="container">
    <div class = "photo">
<img src="chapati.jpg" style="height:250px"><br>
<p><label>Name:chapati: Amount:TZS3,000</label><br><br> 
<label>Enter the amount of money:</labelore>
<input type="number" name="number" placeholder="amount">
<button class="order_button" onclick="orderfood()" style="background-color: blue;">orderfood</button><br><br></p>
</div>
<div class = "photo">
<img src="ndizi.jpg"style="height:250px"><br>
 <p><label>Name:ndizi: Amount:TZS3,000</label><br><br>
<label>Enter the amount of money:</label>
<input type="number" name="number" placeholder="amount">
<button class="order_button" onclick="orderfood()" style="background-color: blue;">orderfood</button><br><br></p>
</div>
</div>
<div class="container">
    <div class = "photo">
<img src="mchanganyo.png"style="height:250px" ><br>
<p><label>Name:mchanganyo: Amount:TZS7,000</label><br><br>
<label>Enter the amount of money:</label>
<input type="number" name="number" placeholder="amount">
<button class="order_button" onclick="orderfood()" style="background-color: blue;">orderfood</button><br><br></p>
</div>
<div class = "photo">
<img src="pilau.jpg"style="height:250px"><br>
<p><label>Name:pilau: Amount:TZS3,000</label><br><br>
<label>Enter the amount of money:</label>
<input type="number" name="number" placeholder="amount">
<button class="order_button" onclick="orderfood()" style="background-color: blue;">orderfood</button><br><br></P>
</div>
</div>
<div class="container">
    <div class = "photo">
<img src="tambi.jpg"style="height:250px" ><br>
<p><label>Name:tambi: Amount:TZS3,000</label><br><br>
<label>Enter the amount of money:</label>
<input type="number" name="number" placeholder="amount">
<button class="order_button" onclick="orderfood()" style="background-color: blue;">orderfood</button><br><br></P>
<div class = "photo">
<img src="ugali na nyama.jpg"style="height:250px"><br>
<p><label>Name:ugali na nyama: Amount:TZS3,000</label><br><br>
<label>Enter the amount of money:</label>
<input type="number" name="number" placeholder="amount">
<button class="order_button" onclick="orderfood()" style="background-color: blue;">orderfood</button><br><br></P>
</div>
</div>
<div class="container">
<div class = "photo">
<img src="ugali na samaki.jpg" style="height:250px"><br>
<label>Name:ugali na samaki: Amount:TZS3,000</label><br><br>
<label>Enter the amount of money:</label>
<input type="number" name="number" placeholder="amount">
<button class="order_button" onclick="orderfood()" style="background-color: blue;">
orderfood</button><br><br>
<div class = "photo">
 <img src="wali.jpg"style="height:250px" ><br>
<label>Name:wali: Amount:TZS3,000</label><br><br>
<label>Enter the amount of money:</label>
<input type="number" name="number" placeholder="amount">
<button class="order_button" onclick="orderfood()" style="background-color: blue;">orderfood</button><br><br></p>
</div>
</div>


</body>
</html>