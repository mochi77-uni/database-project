<?php

// ******** update your personal settings ******** 
$servername = "localhost";
$username = "root";
$password = "j4159841598";
$dbname = "db_class";

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

if (isset($_POST['way']) && isset($_POST['user_ID']) && isset($_POST['time']) && isset($_POST['total']) && isset($_POST['book_ID'])) {
	$trans_ID;
	$temp = 0;
	$way = $_POST['way'];
	$user_ID = $_POST['user_ID'];
	$time = $_POST['time'];
	$total = $_POST['total'];
	$book_ID = $_POST['book_ID'];
	
	$sql_q0 = "select max((int)ID) from transaction";//目前trans的最後一號
	$trans_ID = mysqli_query($conn,$sql_q0);
	$temp = (int)$trans_ID;
	$temp = $temp+1;
	$trans_ID = strval($temp);
	$trans_ID = str_pad($trans_ID, 5, "0", STR_PAD_LEFT);//new ID

	$sql_q1 = "select content from promotion;";//應放在check.html
	$sql_q2 = "insert into transaction values('$trans_ID', '$way', '$user_ID', '$time', '$total', NULL);";
	$sql_q3 = "insert into books_trans values('$book_ID', '$trans_ID');";
	$result1 = mysqli_query($conn,$sql_q1); 
	$result2 = mysqli_query($conn,$sql_q2);
	$result3 = mysqli_query($conn,$sql_q3);

	if($result1->num_rows > 0) {//應放在check.html
        while($row = $result1->fetch_assoc()) {
			printf("%s <br>", $row["content"]);
			exit;        
        }
    }
    else {
    printf('無法查看promotion<br>');
    }

	if($result2 && $result3){
		echo "交易成功<br>";
	}
	else{
		echo "交易失敗<br>";
	}


}else{
	echo "資料不完全";
}
mysqli_free_result($result1);
mysqli_free_result($result2);
mysqli_free_result($result3);
$conn→close();		
?>

