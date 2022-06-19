<!--localhost/database-project/html/2.1.1_check.php -->

<html>
<head>
	<title>結帳</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script>
    function insertRow() {
        var table = document.getElementById("table")
        // table.insertRow();
        var obj = table.insertRow(-1);
        obj.innerHTML = 
		'<th >'+
			'商品編號<input type="text" name="product[]"/>'+
		'</th>'+
		'<th >'+
			'數量<input type="text" name="amount[]"/>'+
		'</th>'
        console.log(obj.attributes)
    }
</script>

<body>
	
	<h1 align="center">結帳
		<input type="button" value="上一頁" onclick="window.history.go(-1)"/>
	</h1>
	<form method="post">
	<table id = "table" width="500" border="1" bgcolor="#cccccc" align="center">
		<tr>
			<th colspan="2">
				<input type="button" value="新增品項" onclick="insertRow()"/>
					<input type="submit" value="確定" name='submit'/>
			</th>
		</tr>    
		<tr>
				<th >商品編號<input type="text" name="product[]"/></th>
				<th >數量<input type="text" name="amount[]"/></th>
		</tr>
	</table>

</body>
<?php
if (isset($_POST['submit'])){	
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
		session_start();
		$product = $_POST['product'];
		$amount = $_POST['amount'];
		if($_SESSION["store_ID"] == NULL){
			echo("沒有登入資料。請先登入。");
		}
		$store_ID = $_SESSION["store_ID"];//need to confirm
		$j = count($product);
		echo ("<div align='center'>j=".$j. "</div>");
		$success = 0;
		for($i=0 ; $i<$j ; $i++){
			$sql_q1 = "select ID from books where '$product[$i]' = ID;";
			$result1 = mysqli_query($conn,$sql_q1);
			if($result1->num_rows > 0){
				$sql_q2 = "select number from storage where store_ID = $store_ID and books_ID = $product[$i];";
				$result2 = mysqli_query($conn,$sql_q2);
				while($row = $result2->fetch_assoc()) {
					if($row[number] > $amount[$i]){
						$success++;
					}
					else{
						echo ("<div align='center'>$store_ID". "店庫存僅有". $row["number"]. "，少". ($amount[$i]-$row["number"]) . "個</div>");    
					}           
					
				}
			}
			else {
				echo ("<div align='center'>沒有". $product[$i]. "這本書</div>");
			}
		}
		if( $success == $j ){
			$_SESSION['product'] = $product;
			$_SESSION['amount'] = $amount;
			header("Location: 2.1.2_check.php");
			exit;
		}
		

	}else{
		echo "資料不完全";
	}
	mysqli_free_result($result1);
	mysqli_free_result($result2);
	$conn→close();	
}				
?>

<div align="center">
	<p></p>
	<input type="submit" value="確定" name="submit" />
</div>
</form>
</html>
