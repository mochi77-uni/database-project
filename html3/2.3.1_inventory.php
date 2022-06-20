<!--localhost/database-project/html/2.3.1_inventory.php -->

<html>
<head>
	<title>庫存量</title>
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

	function nextpage(str){
		window.location.href=str;
		// console.log("123")
	}

</script>

</script>

<body>
	
	<h1 align="center">各商品庫存量
		
	</h1>
	<form action="2.3.2_inventory.php" method="post">	

		<div align="center">
			<p></p>
			<label for="search">搜尋詳情(輸入商品ID)</label>
			<input type="text" name="books_ID"/>
			<input type="submit" value="查詢">
			<p></p>
			<input type="button" value="上一頁" onclick="nextpage('2_route.php')"/>
			<p></p>
		</div>	

	</form>

<?php

// ******** update your personal settings ******** 
$servername = "140.122.184.126";
$username = "team17";
$password = "k1PEco";
$dbname = "team17";

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

if (1) {
	$sql_q1 = "select A.books_ID, B.name, A.number from storage as A, books as B where A.books_ID = B.ID;";
	$result1 = mysqli_query($conn,$sql_q1);
    if($result1){
        if($result1->num_rows > 0){
            echo('<table id="table" width="500" border="1" bgcolor="#cccccc" align="center">');
            echo('<tr><th>商品ID</th><th>商品名稱</th><th>剩餘數量</th></tr>');
        
            while($row = $result1->fetch_row()) {
                printf("<td>%s</td> <td>%s</td> <td>%s</td></tr> ", 
                $row[0] , 
                $row[1] , 
                $row[2]);
            }
            echo('</table>');
        }
    }
    else{
    printf('error input<br>');
    }

}else{
	echo "資料不完全";
}
mysqli_free_result($result1);
$conn→close();	
				
?>
</body>
	
</html>
