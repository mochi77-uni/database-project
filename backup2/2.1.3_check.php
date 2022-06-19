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

if (isset($_POST['way'])) {
	session_start();
	$trans_ID;
	$temp = 0;
	$way = $_POST['way'];
	$user_ID = $_SESSION['user_ID'];
	$product[] = $_SESSION['product'];
	$amount[] = $_SESSION['amount'];
	$time = date("Y-m-d H:i:s");
	if( isset($_POST['total']) == 1){
		$total = $_POST['total'];
	}
	else{
		$total = $_SESSION['total'];
	}
	
	$sql_q0 = "select ID from transaction where ID not in (select A.ID from transaction as A, transaction as B where  A.ID<B.ID );";//目前trans的最後一號
	$result0 = mysqli_query($conn,$sql_q0);
	if($result0){
        if($result0->num_rows > 0){
			while($row = $result0->fetch_row()) {
				$trans_ID = $row[0];
			}
		}
	}
	
	$temp = (int)$trans_ID;
	$temp = $temp+1;
	$trans_ID = strval($temp);
	$trans_ID = str_pad($trans_ID, 5, "0", STR_PAD_LEFT);//new ID

	$sql_q2 = "insert into transaction values('$trans_ID', '$way', '$user_ID', '$time', '$total', '0000-00-00 00:00:00');";
	$result2 = mysqli_query($conn,$sql_q2);
	$j = count($product);
	for($i=0 ; $i<$j ; $i++){
		$sql_q3 = "insert into books_trans values('$product[$i]', '$trans_ID', '$amount[$i]');";
		$result3 = mysqli_query($conn,$sql_q3);
	}
	if($result2 && $result3){
		echo "<div align='center'>交易成功";

	}
	else{
		echo "交易失敗<br>";
	}
	echo "		
		<input type='button' value='確定' onclick='window.location.href='2_route.php'/>
	";
echo("</div>");


}else{
	echo "資料不完全";
}
mysqli_free_result($result0);
mysqli_free_result($result2);
mysqli_free_result($result3);
$conn→close();		
?>

