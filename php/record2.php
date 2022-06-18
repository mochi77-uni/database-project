<?php

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

//整段放在2.2.2
if (isset($_POST['trans_ID'])) {
	$trans_ID = $_POST['trans_ID'];
	$sql_q1 = "select * from transaction  where ID = '$trans_ID';";
    $sql_q2 = "select A.book_ID, A.transaction_ID, A.amount, B.name from books_trans as A, books as B where A.transaction_ID = '$trans_ID' and B.ID = A.book_ID;";
	$result1 = mysqli_query($conn,$sql_q1);
    $result2 = mysqli_query($conn,$sql_q2);
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
    if($result2->num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
            echo $row["book_ID"]. $row[" transaction_ID"]. $row["amount"]. $row["name"];    
        }
    }
    
	echo "<br> <a href='record3.php'>作廢</a>";
}else{
	echo "資料不完全";
}
mysqli_free_result($result1);
mysqli_free_result($result2);
$conn→close();			
?>

