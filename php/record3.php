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

if (isset($_POST['trans_ID'])) {
	$trans_ID = $_POST['trans_ID'];
	$sql_q1 = "update transaction set invalid_time = '$now_time' where ID = '$trans_ID';";
	$sql_q2 = "delete from books_trans where transaction_ID = '$trans_ID';";
	$result1 = mysqli_query($conn,$sql_q1);
	$result2 = mysqli_query($conn,$sql_q2);
    if($result1 && $result2){
		echo "作廢成功<br>";
	}
}else{
	echo "資料不完全";
}
mysqli_free_result($result1);
mysqli_free_result($result2);
$conn→close();			
?>

