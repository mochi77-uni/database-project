<!--localhost/database-project/html/2.1.2_check.php -->

<html>
<head>
	<title>結帳</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script lang="JavaScript">
	function setTable(){
		var table = document.getElementById("table")
		var obj = table.insertRow(-1);
		obj.innerHTML = 
		'<th >商品<input type="text" name="product"/></th>'+
		'<th >數量<input type="text" name="amount"/></th>'

	}
</script>

<body>
	
	<h1 align="center">結帳
		<input type="submit" value="上一頁"/>
	</h1>
	<!-- <form action="create.php" method="post">	 -->
	<table id="table" width="500" border="1" bgcolor="#cccccc" align="center">
	<th >商品名稱: abc</th>  
	<th >數量:1</th>
	<th >金額:333</th>
	</table>
	<div align="center">
		<p>最終金額<input type="text" name="amount"/></p>
		<p>
			<input type="radio" id="card" name="payment"/><label for="card">刷卡</label>
			<input type="radio" id="cash" name="payment"/><label for="cash">現金</label>
		</p>
		<input type="submit" value="確定"/>


	</div>
	</form>
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
	$product[] = $_SESSION['product'];
	$amount[] = $_SESSION['amount'];
	$j = count($product);
	echo('<table id="table" width="500" border="1" bgcolor="#cccccc" align="center">');

	for($i=0 ; $i<$j ; $i++){
		$sql_q1 = "select price from books where ID = product[$i];";
		$result1 = mysqli_query($conn,$sql_q1);
		$price=0;
		$name="defualt";
		if($result1->num_rows > 0) {//應放在check.html
			while($row = $result1->fetch_row()) {
				$price = $row[0];
				$total += $row[0]*$amount[$i];
			}
		}
		echo('<td>'.$name .'</td>'.'<td>'.$amount[$i] .'</td>'.'<td>'.$price .'</td>'.);

	}

	echo('	<div align="center">
		<p>最終金額<input type="text" name="amount" value='. $total.'/></p>
		<p>
			<input type="radio" id="card" name="payment"/><label for="card">刷卡</label>
			<input type="radio" id="cash" name="payment"/><label for="cash">現金</label>
		</p>
		<input type="submit" value="確定"/>


		</div>
	')
}else{
	echo "資料不完全";
}
mysqli_free_result($result1);
$conn→close();		
?>
</body>
	
</html>
