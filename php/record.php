<?php
// http://localhost/database-project/php/record.php
// ******** update your personal settings ******** 
$servername = "localhost";
$username = "root";
$password = "db_project";
$dbname = "db_project";

// Connecting to and selecting a MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql_q1 = "select * from transaction;";
$result1 = mysqli_query($conn,$sql_q1);
if($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {
        printf("%s %d %s %d %s %s<br>", 
        $row["ID"],
        $row["way"],
        $row["user_ID"],
        $row["time"],
        $row["total"],
        $row["invalid_time"]);    
    }
}

mysqli_free_result($result1);
$conn→close();		
?>

