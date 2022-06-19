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

if (isset($_POST['product']) && isset($_POST['amount'])) {
	$product[] = $_POST['product'];
    $amount[] = $_POST['amount'];
    $store_ID = 0;//need to confirm
	$sql_q1 = "select ID from books where '$book_ID' = ID;";
    $sql_q2 = "select number from storage where store_ID = $store_ID and books_ID = $product;";
	$result1 = mysqli_query($conn,$sql_q1);
    $result2 = mysqli_query($conn,$sql_q2);
    if ($result1->num_rows > 0 && $result2->num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
            if($row[number] > $amount){
                header("Location: check2.php");
                exit;
            }
            else{
                printf("庫存不足". $amount. "，僅有". $row["number"]. "個<br>");    
            }           
        }
    }
    else {
    printf('沒有這本書<br>');
    }

}else{
	echo "資料不完全";
}
mysqli_free_result($result1);
mysqli_free_result($result2);
$conn→close();	
				
?>

