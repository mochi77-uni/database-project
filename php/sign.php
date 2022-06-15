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

if (isset($_POST['account']) && isset($_POST['password'])) {
	$account = $_POST['account'];
	$password = $_POST['password'];

	$sql_q1 = "select password from user where ID = $account;";	// ******** update your personal settings ******** 
	$result = mysqli_query($conn,$sql_q1);
	if ($result == $password) {
        header("Location: main.php");
        exit;
	} else if($result == NULL) {
		echo "<h2 align='center'><font color='antiquewith'>無此帳號!!</font></h2>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>密碼錯誤!!</font></h2>";
	}

}else{
	echo "資料不完全";
}
mysqli_free_result($result);
$conn→close();		
?>

