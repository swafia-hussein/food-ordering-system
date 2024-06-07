<?php
// Step 1: Connect to the database
include ('connection.php');
$conn = Connect();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve areas
$sql = "SELECT id, name FROM areas";
$result = $conn->query($sql);

// Initialize restaurants array
$restaurants = [];

if (isset($_GET['area_id'])) {
    $area_id = intval($_GET['area_id']);
    
    $sql = "SELECT r.name 
            FROM restaurants r 
            JOIN areas a ON r.area_id = a.id 
            WHERE a.id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $area_id);
    $stmt->execute();
    $result_restaurants = $stmt->get_result();
    
    if ($result_restaurants->num_rows > 0) {
        while($row = $result_restaurants->fetch_assoc()) {
            $restaurants[] = $row['name'];
        }
    }
    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="dashboard">
        <h1>Areas</h1>
        
       
       <?php
       if ($result->num_rows > 0) {
           while($row = $result->fetch_assoc()) {
               //echo "<li><a href='BABA.php?area_id=" . $row['id'] . "'>" . htmlspecialchars($row['name']) . "</a></li>";
               echo "<div class='area'>
               <a href='restaurant.php?area_id=" . $row['id'] . "'>" . htmlspecialchars($row['name']) . "</a>
              </div>";
            }
       } else {
           echo "<li>No areas found.</li>";
       }
       ?>
   
    </div>
</body>
</html>
