<?php
require 'connection.php';
$conn = Connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
