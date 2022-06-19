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

if (1) {
	$total = 0;
	$product[] = $_POST['product'];
	$amount[] = $_POST['amount'];
	$j = count($product);
	for($i=0 ; $i<$j ; $i++){
		$sql_q1 = "select price from transaction where ID = product[$i];";
		$result1 = mysqli_query($conn,$sql_q1);
		if($result1->num_rows > 0) {//應放在check.html
			while($row = $result1->fetch_row()) {
				$total += $row[0]*$amount[$i];
			}
		}
	}
}else{
	echo "資料不完全";
}
mysqli_free_result($result1);
$conn→close();		
?>

