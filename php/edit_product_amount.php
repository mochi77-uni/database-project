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

if (isset($_POST['new_amount'])) {
    $new_amount = $_POST['new_amount'];
    $stroe_ID = 0;
    $book_ID = 0;

    $sql_q1 = "update storage set number = $new_amount where books_ID = '$book_ID' and store_ID = '$stroe_ID';";
	$result1 = mysqli_query($conn,$sql_q1);
    if($result1){
        echo "修改成功<br>";
    }

}else{
	echo "資料不完全<br>";
}
mysqli_free_result($result1);
$conn→close();	
				
?>

