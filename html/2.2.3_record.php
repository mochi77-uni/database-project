<script>
	function nextpage(str){
		window.location.href=str;
		// console.log("123")
	}

</script>

<?php

// ******** update your personal settings ******** 
$servername = "localhost";
$username = "root";
$password = "db_project";
$dbname = "db_project";

// Connecting to and selecting a MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

if (!mysqli_set_charset($conn,"utf8")) {
    printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
session_start();
$trans_ID = $_SESSION['trans_ID'];
echo('<div align="center" >');
if ($trans_ID != 0) {

	$now_time = date("Y-m-d H:i:s");
	$sql_q1 = "update transaction set invalid_time = '$now_time' where ID = '$trans_ID';";
	$sql_q2 = "delete from books_trans where transaction_ID = '$trans_ID';";
	$result2 = mysqli_query($conn,$sql_q2);
	$result1 = mysqli_query($conn,$sql_q1);
    if($result1 && $result2){
		echo("<div>成功刪除 ".$trans_ID.$now_time);
	}
	else{
		echo("<div>操作失敗");
	}

	echo('<p></p><input type="button" value="確定" onclick="nextpage(\'2.2_record.php\')"/>');
	echo("</div>");
}else{
	echo "資料不完全";
}
echo('</div>');

mysqli_free_result($result1);
mysqli_free_result($result2);
$conn→close();			
?>

