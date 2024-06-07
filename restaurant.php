<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>restaurant</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="dashboard">
        <h1>Restaurants</h1>
        <?php
// Step 1: Connect to the database
include ('connection.php');
$conn = Connect();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['area_id'])) {
    $area_id = intval($_GET['area_id']);
    
    $sql = "SELECT r.name 
            FROM restaurants r 
            JOIN areas a ON r.area_id = a.id 
            WHERE a.id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $area_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
       
        
        while($row = $result->fetch_assoc()) {
           // echo "<li>" . htmlspecialchars($row['name']) . "</li>";
            echo "<div class='area'>
            <a href='menu.php ?area_id=" .  "'>" . htmlspecialchars($row['name']) . "</a>
           </div>";
        
        }
    } else {
        echo "No restaurants found for the selected area.";
    }
    
    $stmt->close();
}

$conn->close();
?>

    </div>
</body>
</html>

