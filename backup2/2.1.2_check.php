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
	</h1>
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
	session_start();
	$product = $_SESSION['product'];
	$amount = $_SESSION['amount'];
	$content[count($product)];
	$j = count($product);
	// foreach($product as $i){
	// 	echo("id".$i);
	// }
	// echo("len".$j);
	// echo('<div>'.$j.'id'.$product[0].'</div>');
	echo('<table id="table" width="500" border="1" bgcolor="#cccccc" align="center">');

	for($i=0 ; $i<$j ; $i++){
		$sql_q1 = "select price, name from books where ID = product[$i];";
		$sql_q2 = "select A.content from promotion as A, involve as B where B.books_ID = product[$i] and A.ID = B.promotion_ID;";
		$result1 = mysqli_query($conn,$sql_q1);
		$result2 = mysqli_query($conn,$sql_q2);
		$price=0;
		$name="defualt";
		if($result1->num_rows > 0) {//應放在check.html
			while($row = $result1->fetch_row()) {
				$price = $row[0];
				$name = $row[1];
				$total += $row[0]*$amount[$i];
			}
		}
		if($result2->num_rows > 0){
			while($row = $result2->fetch_row()) {
				$content[$i] = $row[0];
			}
		}
		echo '<tr><td>商品名稱'.$name .'</td>'.'<td>商品數量'.$amount[$i] .'</td>'.'<td>商品金額'.$price .'</td></tr>';

	}
	echo('</table>');
	echo("<form action='2.1.2_check' method='post'");
	echo('	<div align="center">
		<p>原始金額'.$total.'
		<p>最終金額<input type="text" name="amount" /></p>
		<p>
			<input type="radio" id="card" name="payment" value="1"/><label for="card">刷卡</label>
			<input type="radio" id="cash" name="payment" value="0"/><label for="cash">現金</label>
		</p>
		<input type="submit" value="確定"/>


		</div>
	');
	
	if( count($content) > 0){
		$_SESSION['total'] = $total;
		foreach($content as $eachCon){
			echo("<p>".$eachCon."<p>");
		}
	}
}
else{
	echo "資料不完全";
}
mysqli_free_result($result1);
$conn→close();		
?>
</body>
	
</html>
